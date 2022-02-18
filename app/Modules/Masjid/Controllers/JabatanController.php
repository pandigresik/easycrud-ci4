<?php

namespace App\Modules\Masjid\Controllers;

use App\Controllers\AdminCrudController;
use App\Modules\Api\Models\JabatanModel;
use App\Modules\Masjid\Models\JabatanFilter;

class JabatanController extends AdminCrudController
{
    protected $baseController = __CLASS__;
    protected $viewPrefix     = 'App\Modules\Masjid\Views\jabatan\\';
    protected $baseRoute      = 'admin/masjid/jabatan';
    protected $langModel      = 'jabatan';
    protected $modelName      = 'App\Modules\Api\Models\JabatanModel';

    public function index()
    {
        return parent::index();
    }

    public function edit($id = null)
    {
        return parent::edit($id);
    }

    public function show($id = null)
    {
        return parent::show($id);
    }

    public function create()
    {
        return parent::create();
    }

    public function delete($id = null)
    {
        return parent::delete($id);
    }

    protected function getDataIndex()
    {
        $model = model(JabatanFilter::class);

        return [
            'headers' => [
                'name'        => 'name',
                'description' => 'description',
            ],
            'controller'    => $this->getBaseController(),
            'viewPrefix'    => $this->getViewPrefix(),
            'baseRoute'     => $this->getBaseRoute(),
            'showSelectAll' => true,
            'data'          => $model->paginate(setting('App.perPage')),
        ];
    }

    protected function getDataEdit($id = null)
    {
        $dataEdit = parent::getDataEdit($id);
        $model    = new JabatanModel();

        if (! empty($id)) {
            $data = $model->find($id);
            if (null === $data) {
                return redirect()->back()->with('error', lang('Bonfire.resourceNotFound', [$this->langModel]));
            }
            $dataEdit['data'] = $data;
        }

        return $dataEdit;
    }
}
