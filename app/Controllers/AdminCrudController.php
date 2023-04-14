<?php

namespace App\Controllers;

use App\Modules\Api\Models\EntityModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use IlluminateAgnostic\Arr\Support\Arr;
use Psr\Log\LoggerInterface;

class AdminCrudController extends AdminController
{
    use ResponseTrait;
    public const BLANK_IMG = 'assets/admin/images/blank.jpg';
    protected $theme      = 'Admin';
    protected $viewPrefix = '';
    protected $baseController;
    protected $baseRoute;
    protected $langModel;

    /**
     * @var string|null The model that holding this resource's data
     */
    protected $modelName;

    /**
     * @var object|null The model that holding this resource's data
     */
    protected $model;
    protected $feature = 'Admin';
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->setModel($this->modelName);
        helper(['form','number','app']);

    }

    /**
     * Display the uses currently in the system.
     *
     * @return string
     */
    public function index()
    {
        /** @var jabatanFilter $jabatanModel */
        // $jabatanModel = model(jabatanFilter::class);

        $view = $this->viewPrefix .  'index';
        $dataIndex = $this->getDataIndex();
        $this->writeLog();        
        $meta = service('viewMeta');
        $meta->setTitle(setting('Site.siteName'). ' - '. $this->getFeature());        

        return $this->render($view, $dataIndex);
    }

    public function list(){
        $view = $this->viewPrefix . '_table';
        $dataIndex = $this->getDataIndex();
        $this->writeLog();
        return $this->render($view, $dataIndex);
    }

    /**
     * Return the properties of a resource object
     *
     * @param mixed|null $id
     *
     * @return array an array
     */
    public function show($id = null)
    {
        $record = $this->model->find($id);
        $this->writeLog();
        if (! $record) {
            return $this->failNotFound(sprintf(
                'item with id %d not found',
                $id
            ));
        }

        return $this->respond($record);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return array an array
     */
    public function new()
    {
        return $this->render($this->viewPrefix . 'form', $this->getDataEdit());
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return array an array
     */
    public function create()
    {        
        $data = $this->request->getPost();
        if (! $this->model->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }
        $this->writeLog();

        return redirect()->to(url_to($this->getBaseController()))->with('message', lang('Bonfire.resourceSaved', [$this->langModel]));
    }

    /**
     * Return the editable properties of a resource object
     *
     * @param mixed|null $id
     *
     * @return array an array
     */
    public function edit($id = null)
    {
        return $this->render($this->viewPrefix . 'form', $this->getDataEdit($id));
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @param mixed|null $id
     *
     * @return array an array
     */
    public function update($id = null)
    {
        $data                                 = $this->request->getPost();
        $updateData                           = array_filter($data);

        if (! $this->model->update($id, $updateData)) {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }
        $this->writeLog();

        return redirect()->to(url_to($this->getBaseController()))->with('message', lang('Bonfire.resourceSaved', [$this->langModel]));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @param mixed|null $id
     *
     * @return array an array
     */
    public function delete($id = null)
    {
        $delete = $this->model->delete($id);
        if ($this->model->db->affectedRows() === 0) {
            if ($this->isHxRequest()) {
                Services::session()->setFlashdata('error', lang('Bonfire.resourceNotFound'));

                return '<aside id="alerts-wrapper" hx-swap-oob="true">{alerts}</aside>';
            }

            return redirect()->back()->with('error', lang('Bonfire.unknownError'));
        }
        $this->writeLog();
        if ($this->isHxRequest()) {
            Services::session()->setFlashdata('message', lang('Bonfire.resourceDeleted', [$this->langModel]));
            return '<aside id="alerts-wrapper" hx-swap-oob="true">{alerts}</aside>';
        }

        return redirect()->back()->with('message', lang('Bonfire.resourceDeleted', [$this->langModel]));
    }

    /**
     * Get the value of baseController
     */
    public function getBaseController()
    {
        return $this->baseController;
    }

    /**
     * Set the value of baseController
     *
     * @param mixed $baseController
     *
     * @return self
     */
    public function setBaseController($baseController)
    {
        $this->baseController = $baseController;

        return $this;
    }

    protected function getDataIndex()
    {
        return [];
    }

    protected function getDataEdit($id = null)
    {
        return [
            'actionUrl' => $id ? url_to($this->getBaseController(), $id) : url_to($this->getBaseController()),
            'backUrl'   => url_to($this->getBaseController()),
            'blank_img' => site_url().self::BLANK_IMG,
        ];
    }

    /**
     * Set or change the model this controller is bound to.
     * Given either the name or the object, determine the other.
     *
     * @param object|string|null $which
     */
    public function setModel($which = null)
    {
        if ($which) {
            $this->model     = is_object($which) ? $which : null;
            $this->modelName = is_object($which) ? null : $which;
        }

        if (empty($this->model) && ! empty($this->modelName) && class_exists($this->modelName)) {
            $this->model = model($this->modelName);
        }

        if (! empty($this->model) && empty($this->modelName)) {
            $this->modelName = get_class($this->model);
        }
    }

    protected function isHxRequest()
    {
        return $this->request->hasHeader('HX-Request');
    }

    /**
     * Get the value of baseRoute
     */
    public function getBaseRoute()
    {
        return $this->baseRoute;
    }

    /**
     * Set the value of baseRoute
     *
     * @param mixed $baseRoute
     *
     * @return self
     */
    public function setBaseRoute($baseRoute)
    {
        $this->baseRoute = $baseRoute;

        return $this;
    }

    /**
     * Get the value of viewPrefix
     */
    public function getViewPrefix()
    {
        return $this->viewPrefix;
    }

    /**
     * Set the value of viewPrefix
     *
     * @param mixed $viewPrefix
     *
     * @return self
     */
    public function setViewPrefix($viewPrefix)
    {
        $this->viewPrefix = $viewPrefix;

        return $this;
    }

    /**
     * Get the value of feature
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     * Set the value of feature
     *
     * @return  self
     */
    public function setFeature($feature)
    {
        $this->feature = $feature;

        return $this;
    }
}
