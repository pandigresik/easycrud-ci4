<?php

namespace App\Modules\Masjid\Controllers;

use App\Controllers\AdminCrudController;
use App\Modules\Api\Models\ProfileModel;
use App\Modules\Masjid\Controllers\Models\ProfileFilter;

class ProfileController extends AdminCrudController
{
    protected $baseController = __CLASS__;
    protected $viewPrefix     = 'App\Modules\Masjid\Views\profile\\';
    protected $baseRoute      = 'admin/masjid/profile';
    protected $langModel      = 'profile';
    protected $modelName      = 'App\Modules\Api\Models\ProfileModel';

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
        $model = model(ProfileFilter::class);

        return [
            'headers' => [
                'name'        => 'Nama',
                'description' => 'Deskripsi',
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
        $model    = new ProfileModel();

        $data = $model->find($id);
        if (null === $data) {
            return redirect()->back()->with('error', lang('Bonfire.resourceNotFound', [$this->langModel]));
        }
        $dataEdit['data'] = $data;

        return $dataEdit;
    }
}
