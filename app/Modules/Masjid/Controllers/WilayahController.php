<?php

namespace App\Modules\Masjid\Controllers;

use App\Controllers\AdminCrudController;
use App\Modules\Api\Models\WilayahModel;
use App\Modules\Masjid\Models\WilayahFilter;

class WilayahController extends AdminCrudController
{
    protected $baseController = __CLASS__;
    protected $viewPrefix     = 'App\Modules\Masjid\Views\wilayah\\';
    protected $baseRoute      = 'admin/masjid/wilayah';
    protected $langModel      = 'wilayah';
    protected $modelName      = 'App\Models\WilayahModel';

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
        $model = model(WilayahFilter::class);

        return [
            'headers' => [
                'kode'  => 'kode',
                'nama'  => 'nama',
                'level' => 'level',
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
        $model    = new WilayahModel();

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
