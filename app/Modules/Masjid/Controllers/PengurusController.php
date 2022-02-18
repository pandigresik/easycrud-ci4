<?php

namespace App\Modules\Masjid\Controllers;

use App\Controllers\AdminCrudController;
use App\Modules\Api\Models\PengurusModel;
use App\Modules\Masjid\Models\PengurusFilter;
use IlluminateAgnostic\Arr\Support\Arr;

class PengurusController extends AdminCrudController
{
    protected $baseController = __CLASS__;
    protected $viewPrefix     = 'App\Modules\Masjid\Views\pengurus\\';
    protected $baseRoute      = 'admin/masjid/pengurus';
    protected $langModel      = 'pengurus';
    protected $modelName      = 'App\Modules\Api\Models\PengurusModel';

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
        $model = model(PengurusFilter::class);
        $model->select(['pengurus.*', 'jabatan.name as jabatan'])->join('jabatan', 'jabatan.id = pengurus.jabatan_id');

        return [
            'headers' => [
                'name'        => 'name',
                'contact'     => 'contact',
                'description' => 'description',
                'jabatan_id'  => 'jabatan',
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
        $model    = new PengurusModel();

        if (! empty($id)) {
            $data = $model->find($id);
            if (null === $data) {
                return redirect()->back()->with('error', lang('Bonfire.resourceNotFound', [$this->langModel]));
            }
            $dataEdit['data'] = $data;
        }
        $dataEdit['jabatanItems'] = Arr::pluck(model('App\Modules\Api\Models\JabatanModel')->select(['id as key', 'name as text'])->asArray()->findAll(), 'text', 'key');

        return $dataEdit;
    }
}
