<?php

namespace App\Commands;

use CodeIgniter\CLI\GeneratorTrait;
use CodeIgniter\Commands\Generators\ModelGenerator;

class CrudModelFilterGenerator extends ModelGenerator
{
    use GeneratorTrait {
        parseTemplate as protected traitparseTemplate;
    }

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
    protected $name = 'make:crud-model-filter';

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
    protected $usage = 'make:crud-model-filter [arguments] [options]';

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
    private $table;
    private $fields;
    /**
     * Actually execute a command.
     */
    public function run(array $params)
    {
        $this->db = db_connect();
        $this->table = $params['table'];
        $this->component = 'Model';
        $this->directory = 'Models';
        $this->template  = 'modelfilter.tpl.php';
        $this->fields    = $this->db->getFieldData($this->table);
        $this->classNameLang = 'CLI.generator.className.model';
        $this->generateClass($params);
    }

    /**
     * Performs pseudo-variables contained within view file.
     */
    protected function parseTemplate(string $class, array $search = [], array $replace = [], array $data = []): string
    {
        $controllerName = explode('\\', $class);
        $model          = str_replace('Filter', '', end($controllerName));
        $search[]       = '{model}';
        $search[]       = '{filterStr}';
        $search[]       = '{filterFunctionStr}';
        $replace[]      = $model;
        $replace[]      = $this->prepareDataFilter();
        $replace[]      = $this->prepareFunctionFilter();

        return $this->traitparseTemplate($class, $search, $replace, $data);
    }

    protected function renderTemplate(array $data = []): string
    {
        return view("App\\Commands\\Views\\{$this->template}", $data, ['debug' => false]);
    }

    /**
     * 'active' => [
     *       'title'   => 'Active?',
     *       'options' => [0 => 'Inactive', 1 => 'Active'],
     *   ],
     */
    private function prepareDataFilter()
    {
        $ignoredFields = ['id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by'];
        $filterStr     = [];

        foreach ($this->fields as $field) {
            if (in_array($field->name, $ignoredFields, true)) {
                continue;
            }
            $fieldStr = <<<FIELD
                    '{$field->name}' => [
                        'title' => '{$field->name}?',
                        'options' => ['value' => '{$field->name}'],
                        'type' => 'text'
                    ]
                FIELD;
            $filterStr[] = $fieldStr;
        }
        return implode(',' . PHP_EOL, $filterStr);
    }

    private function prepareFunctionFilter()
    {
        $ignoredFields = ['id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by'];
        $filterStr     = [];

        foreach ($this->fields as $field) {
            if (in_array($field->name, $ignoredFields, true)) {
                continue;
            }
            $fieldStr = <<<FIELD
                    if (isset(\$params['{$field->name}']) && count(\$params['{$field->name}'])) { 
                        \$keyword = \$params['{$field->name}']['value'];
                        \$this->like('{$field->name}', \$keyword);
                    }                    
                FIELD;
            $filterStr[] = $fieldStr;
        }
        $filterStr[] = 'return $this;';
        return implode(PHP_EOL, $filterStr);
    }
}
