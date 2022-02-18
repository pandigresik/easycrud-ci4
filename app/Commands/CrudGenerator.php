<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\GeneratorTrait;

class CrudGenerator extends BaseCommand
{
    use GeneratorTrait;

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
    protected $name = 'make:crud';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Generates full CRUD Admin';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'make:crud <table> [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [
        'table' => 'The table name.',
    ];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [
        '--namespace' => 'Name ex. Bonfire/Masjid',
    ];

    /**
     * Actually execute a command.
     */
    public function run(array $params)
    {
        $table     = $params[0];
        $force     = $this->getOption('force') ?? false;
        $namespace = $this->getOption('namespace') ?? null;
        $name      = ucfirst($table) . 'Controller';
        $modelName = ucfirst($table) . 'Filter';
        // $class = '\\App\\Masjid\\Controllers\\ProfileController';
        $options = ['force' => $force];
        if (! empty($namespace)) {
            $options['namespace'] = $namespace;
            $name                 = str_replace('/', '\\', $namespace) . '\\Controllers\\' . $name;
        }
        CLI::write($name, 'red');

        $this->call('make:crud-controller', array_merge([$name], $options));
        $this->call('make:crud-model-filter', array_merge([$modelName], $options));
        $listFile = [
            '_row_info',
            '_table',
            'form',
            'index',
        ];
        $options['directory'] = $table;

        foreach ($listFile as $file) {
            $this->call('make:crud-view', array_merge([$file], $options));
        }

        /** generate api & models */
        $this->call('api:generate', ['-t' => $table, '-p' => 'Modules/Api/']);
    }
}
