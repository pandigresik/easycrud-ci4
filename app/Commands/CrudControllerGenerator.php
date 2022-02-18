<?php

namespace App\Commands;

use CodeIgniter\Commands\Generators\ControllerGenerator;

class CrudControllerGenerator extends ControllerGenerator
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'Generators';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'make:crud-controller';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'make:crud-controller [arguments] [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [];

    private $db;
    private $headers;
    private $itemDropdowns;

    /**
     * Actually execute a command.
     */
    public function run(array $params)
    {
        $this->db = db_connect();
        parent::run($params);
    }

    protected function renderTemplate(array $data = []): string
    {
        return view("App\\Commands\\Views\\{$this->template}", $data, ['debug' => false]);
    }

    /**
     * Performs pseudo-variables contained within view file.
     */
    protected function parseTemplate(string $class, array $search = [], array $replace = [], array $data = []): string
    {
        $controllerName = explode('\\', $class);
        $model          = str_replace('Controller', '', end($controllerName));
        $table          = strtolower($model);
        $this->prepareDataRelation($table);
        $search[]  = '{table}';
        $search[]  = '{model}';
        $search[]  = '{filterNamespace}';
        $search[]  = '{header}';
        $search[]  = '{optionItemDropdown}';
        $replace[] = $table;
        $replace[] = $model;
        $replace[] = implode('\\', array_slice($controllerName, 0, count($controllerName) - 2));
        $replace[] = $this->getHeaders();
        $replace[] = $this->getItemDropdowns();

        return parent::parseTemplate($class, $search, $replace, $data);
    }

    private function mapForeignKey($tableName)
    {
        $result = [];
        $fk     = $this->db->getForeignKeyData($tableName);
        if (! empty($fk)) {
            foreach ($fk as $key => $field) {
                $result[$field->column_name] = ['foreign_table_name' => $field->foreign_table_name, 'foreign_column_name' => $field->foreign_column_name];
            }
        }

        return $result;
    }

    private function prepareDataRelation($tableName)
    {
        $foreignKey    = $this->mapForeignKey($tableName);
        $fields        = $this->db->getFieldData($tableName);
        $ignoredFields = ['id', 'created_at', 'updated_at', 'deleted_at'];
        $headers       = [];
        $itemDropdowns = [];

        foreach ($fields as $field) {
            if (in_array($field->name, $ignoredFields, true)) {
                continue;
            }
            $fieldStr = <<<FIELD
                                '{$field->name}' => '{$field->name}'
                FIELD;
            $headers[] = $fieldStr;
            $fk        = $foreignKey[$field->name] ?? false;
            if ($fk) {
                $tableForeign = $fk['foreign_table_name'];
                $modelForeign = pascalize($fk['foreign_table_name']);
                $dropdownStr  = <<<FIELD
                        \$dataEdit['{$tableForeign}Items'] = Arr::pluck(model('App\\Models\\{$modelForeign}Model')->select(['id as key','name as text'])->asArray()->findAll(), 'text', 'key');
                    FIELD;
                $itemDropdowns[] = $dropdownStr;
            }
        }
        $this->setItemDropdowns(implode(PHP_EOL, $itemDropdowns));
        $template = implode(',' . PHP_EOL, $headers);
        $this->setHeaders(
            <<<HEAD
                    {$template}
                HEAD
        );
    }

    /**
     * Get the value of headers
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Set the value of headers
     *
     * @param mixed $headers
     *
     * @return self
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * Get the value of itemDropdowns
     */
    public function getItemDropdowns()
    {
        return $this->itemDropdowns;
    }

    /**
     * Set the value of itemDropdowns
     *
     * @param mixed $itemDropdowns
     *
     * @return self
     */
    public function setItemDropdowns($itemDropdowns)
    {
        $this->itemDropdowns = $itemDropdowns;

        return $this;
    }
}
