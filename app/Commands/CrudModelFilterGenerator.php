<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\Commands\Generators\ModelGenerator;

class CrudModelFilterGenerator extends ModelGenerator
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'CodeIgniter';

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
     *
     * @param array $params
     */
    public function run(array $params)
    {        
        $this->component = 'Model';
        $this->directory = 'Models';
        $this->template  = 'model.tpl.php';

        $this->classNameLang = 'CLI.generator.className.model';
        $this->execute($params);
    }

    /**
     * Performs pseudo-variables contained within view file.
     */
    protected function parseTemplate(string $class, array $search = [], array $replace = [], array $data = []): string
    {           
        $controllerName = explode('\\',$class);
        $model = str_replace('Filter','', end($controllerName));        
        $search[]  = '{model}';
        $replace[] = $model;
        return parent::parseTemplate($class, $search, $replace,$data);        
    }
}
