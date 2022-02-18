<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\GeneratorTrait;

/**
 * Generates a skeleton seeder file.
 */
class CrudViewGenerator extends BaseCommand
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
    protected $name = 'make:crud-view';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Generates a new view file.';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'make:crud-view <name> [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [
        'name' => 'The view file name.',
    ];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [
        '--namespace' => 'Set root namespace. Default: "APP_NAMESPACE".',
        '--suffix'    => 'Append the component title to the class name (e.g. User => UserSeeder).',
        '--force'     => 'Force overwrite existing file.',
    ];

    private $db;
    private $columnItems;

    /**
     * Actually execute a command.
     */
    public function run(array $params)
    {
        $this->db        = db_connect();
        $this->component = 'View';
        $this->directory = 'Views\\' . $params['directory'];
        $this->template  = $params[0] . '.tpl.php';

        $this->classNameLang = 'CLI.generator.className.seeder';
        $this->execute($params);
    }

    /**
     * Gets the generator view as defined in the `Config\Generators::$views`,
     * with fallback to `$template` when the defined view does not exist.
     */
    protected function renderTemplate(array $data = []): string
    {
        return view("App\\Commands\\Views\\view\\{$this->template}", $data, ['debug' => false]);
    }

    /**
     * Performs pseudo-variables contained within view file.
     */
    protected function parseTemplate(string $class, array $search = [], array $replace = [], array $data = []): string
    {
        $search[]  = '<@x-';
        $search[]  = '{table}';
        $search[]  = '{form-content}';
        $search[]  = '{columnItems}';
        $replace[] = '<x-';
        $replace[] = $this->params['directory'];
        $replace[] = $this->getFieldData($this->params['directory']);
        $replace[] = $this->getColumnItems();

        return $this->traitparseTemplate($class, $search, $replace, $data);
    }

    /**
     * Parses the class name and checks if it is already qualified.
     */
    protected function qualifyClassName(): string
    {
        // Gets the class name from input.
        $class = $this->params[0] ?? CLI::getSegment(2);

        if ($class === null && $this->hasClassName) {
            // @codeCoverageIgnoreStart
            $nameLang = $this->classNameLang ?: 'CLI.generator.className.default';
            $class    = CLI::prompt(lang($nameLang), null, 'required');
            CLI::newLine();
            // @codeCoverageIgnoreEnd
        }

        helper('inflector');

        $component = singular($this->component);

        /**
         * @see https://regex101.com/r/a5KNCR/1
         */
        $pattern = sprintf('/([a-z][a-z0-9_\/\\\\]+)(%s)/i', $component);

        if (preg_match($pattern, $class, $matches) === 1) {
            $class = $matches[1] . ucfirst($matches[2]);
        }

        if ($this->enabledSuffixing && $this->getOption('suffix') && ! strripos($class, $component)) {
            $class .= ucfirst($component);
        }

        // Trims input, normalize separators, and ensure that all paths are in Pascalcase.
        $class = ltrim(implode('\\', explode('\\', str_replace('/', '\\', trim($class)))), '\\/');

        // Gets the namespace from input. Don't forget the ending backslash!
        $namespace = trim(str_replace('/', '\\', $this->getOption('namespace') ?? APP_NAMESPACE), '\\') . '\\';

        if (strncmp($class, $namespace, strlen($namespace)) === 0) {
            return $class; // @codeCoverageIgnore
        }

        return $namespace . $this->directory . '\\' . str_replace('/', '\\', $class);
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

    private function getFieldData($tableName)
    {
        $foreignKey    = $this->mapForeignKey($tableName);
        $fields        = $this->db->getFieldData($tableName);
        $formContent   = [];
        $columnItem    = [];
        $ignoredFields = ['id', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            $objForeignKey = $foreignKey[$field->name] ?? false;
            if (in_array($field->name, $ignoredFields, true)) {
                continue;
            }
            $formContent[] = $this->generateFormInput($field, $objForeignKey);

            $columnItem[] = $this->generateColumnItem($field->name);
        }
        $this->setColumnItems(implode(PHP_EOL, $columnItem));
        $template = implode(PHP_EOL, $formContent);

        return <<<HEAD
            {$template}
            HEAD;
    }

    private function generateColumnItem($name)
    {
        return "<td><?php echo esc(\$item->{$name}) ?></a></td>";
    }

    private function generateFormInput($field, $objForeignKey)
    {
        $name       = $field->name;
        $type       = $objForeignKey ? 'select2' : $field->type;
        $required   = 'required';
        $classInput = 'form-control ' . $type;
        if (property_exists($field, 'nullable')) {
            if ($field->nullable) {
                $required = '';
            }
        }

        $formInput = '';

        switch ($type) {
            case 'text':
                $formInput = <<<FIELD
                    <?= form_textarea('{$name}', old('{$name}', \$data->{$name} ?? ''), "rows='4' class='{$classInput}' {$required}") ?>
                    FIELD;
            break;

            case 'select2':
                $optionItems = $objForeignKey['foreign_table_name'] . 'Items';
                $formInput   = <<<FIELD
                    <?= form_dropdown('{$name}',\${$optionItems} ,old('{$name}', \$data->{$name} ?? ''), "class='{$classInput}' {$required}") ?>
                    FIELD;
            break;

            default:
                $formInput = <<<FIELD
                    <?= form_input('{$name}', old('{$name}', \$data->{$name} ?? ''), "class='{$classInput}' {$required}") ?>
                    FIELD;
        }

        return <<<FIELD
                            <div class="row mb-3">
                                <?= form_label('{$name}','',['for' => '{$name}', 'class' => 'col-form-label col-sm-2']) ?>
                                <div class="col-sm-10">
                                    {$formInput}
                                    <?php if (has_error('{$name}')) { ?>
                                    <p class="text-danger"><?php echo error('{$name}'); ?></p>
                                    <?php } ?>
                                </div>
                            </div>
            FIELD;
    }

    /**
     * Get the value of columnItems
     */
    public function getColumnItems()
    {
        return $this->columnItems;
    }

    /**
     * Set the value of columnItems
     *
     * @param mixed $columnItems
     *
     * @return self
     */
    public function setColumnItems($columnItems)
    {
        $this->columnItems = $columnItems;

        return $this;
    }
}
