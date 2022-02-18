<?php

namespace App\Modules\Masjid\Controllers;

use App\Controllers\AdminCrudController;
use App\Modules\Api\Models\MemberModel;
use App\Modules\Masjid\Models\MemberFilter;

class MemberController extends AdminCrudController
{
    protected $baseController = __CLASS__;
    protected $viewPrefix     = 'App\Modules\Masjid\Views\member\\';
    protected $baseRoute      = 'admin/masjid/member';
    protected $langModel      = 'member';
    protected $modelName      = 'App\Models\MemberModel';

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
        $model = model(MemberFilter::class);

        return [
            'headers' => [
                'name'       => 'name',
                'wilayah_id' => 'wilayah_id',
                'code'       => 'code',
                'address'    => 'address',
                'path_logo'  => 'path_logo',
                'path_image' => 'path_image',
                'state'      => 'state',
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
        $model    = new MemberModel();

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
