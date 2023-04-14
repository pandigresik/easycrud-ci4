<@php

namespace {namespace};

use App\Controllers\AdminCrudController;
use IlluminateAgnostic\Arr\Support\Arr;
use App\Modules\Api\Models\{model}Model;
use {filterNamespace}\Models\{model}Filter;

class {model} extends AdminCrudController
{
    protected $baseController = '\\'.__CLASS__;
    protected $viewPrefix = 'App\Modules\{module}\Views\{table}\\';
    protected $baseRoute = '{route}/{baseRoute}';
    protected $langModel = '{table}';
    protected $modelName = 'App\Modules\Api\Models\{model}Model';
    
    public function index(){
        return parent::index();
    }

    public function edit($id = null){
        return parent::edit($id);
    }

    public function update($id = null){
        return parent::update($id);
    }

    public function show($id = null){
        return parent::show($id);
    }

    public function create(){
        return parent::create();
    }

    public function delete($id = null){
        return parent::delete($id);
    }

    protected function getDataIndex()
    {
        $model = model({model}Filter::class);
        $model->filter($this->request->getPost('filters'));
        return [
            'headers' => [
                {header}
            ],
            'controller' => $this->getBaseController(),
            'viewPrefix' => $this->getViewPrefix(),
			'baseRoute' => $this->getBaseRoute(),
            'showSelectAll' => true,
            'data' => $model->paginate(setting('App.perPage')),
            'pager' => $model->pager
        ];
    }

    protected function getDataEdit($id = null)
    {
        $dataEdit = parent::getDataEdit($id);
        $model = new {model}Model();

        if(!empty($id)){
            $data = $model->find($id);
            if (null === $data) {
                return redirect()->back()->with('error', lang('app.resourceNotFound', [$this->langModel]));
            }
            $dataEdit['data'] = $data;
        }
        {optionItemDropdown}
        return $dataEdit;
    }
}
