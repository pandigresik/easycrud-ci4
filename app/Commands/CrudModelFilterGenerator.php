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

    /**
     * Actually execute a command.
     */
    public function run(array $params)
    {
        $this->component = 'Model';
        $this->directory = 'Models';
        $this->template  = 'modelfilter.tpl.php';

        $this->classNameLang = 'CLI.generator.className.model';
        $this->execute($params);
    }

    /**
     * Performs pseudo-variables contained within view file.
     */
    protected function parseTemplate(string $class, array $search = [], array $replace = [], array $data = []): string
    {
        $controllerName = explode('\\', $class);
        $model          = str_replace('Filter', '', end($controllerName));
        $search[]       = '{model}';
        $replace[]      = $model;

        return $this->traitparseTemplate($class, $search, $replace, $data);
    }

    protected function renderTemplate(array $data = []): string
    {
        return view("App\\Commands\\Views\\{$this->template}", $data, ['debug' => false]);
    }
}
