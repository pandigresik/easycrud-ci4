<?php

namespace App\Modules\Api\Controllers;

use asligresik\easyapi\Controllers\BaseResourceController;
use RuntimeException;

class Members extends BaseResourceController
{
    protected $modelName = 'App\Modules\Api\Models\MemberModel';
    private $pathLogo;
    private $pathImage;
    private $imageFolder = 'images';
    /**
     * @OA\Get(
     *     path="/members",
     *     tags={"Member"},
     *     summary="Find list Member",
     *     description="Returns list of Member",
     *     operationId="getMember",
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="search by column defined",
     *         @OA\Schema(
     *             type="object"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="order",
     *         in="query",
     *         description="order by column defined",
     *         @OA\Schema(
     *             type="object"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="page to show",
     *         @OA\Schema(
     *             type="int32"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         description="count data display per page",
     *         @OA\Schema(
     *             type="int32"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(type="object",
     *            @OA\Property(property="data",type="array",@OA\Items(ref="#/components/schemas/Member")),
     *            @OA\Property(property="pagination",type="object",@OA\Property(property="currentPage", type="integer"),@OA\Property(property="totalPage", type="integer")),
     *         ),
     *         @OA\XmlContent(type="object",
     *            @OA\Property(property="data",type="array",@OA\Items(ref="#/components/schemas/Member")),
     *            @OA\Property(property="pagination",type="array",@OA\Items(ref="#/components/schemas/Member")),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Member not found"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     }
     * )
     */

    /**
     * @OA\Get(
     *     path="/members/{id}",
     *     tags={"Member"},
     *     summary="Find Member by ID",
     *     description="Returns a single Member",
     *     operationId="getMemberById",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of Member to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Member"),
     *         @OA\XmlContent(ref="#/components/schemas/Member"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Member not found"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     }
     * )
     */

    /**
     * @OA\Post(
     *     path="/members",
     *     tags={"Member"},
     *     summary="Add a new Member to the store",
     *     operationId="addMember",
     *     @OA\Response(
     *         response=201,
     *         description="Created Member",
     *         @OA\JsonContent(ref="#/components/schemas/Member"),
     *         @OA\XmlContent(ref="#/components/schemas/Member"),
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },
     *     requestBody={"$ref": "#/components/requestBodies/Member"}
     * )
     */

    /**
     * @OA\Put(
     *     path="/members/{id}",
     *     tags={"Member"},
     *     summary="Update an existing Member",
     *     operationId="updateMember",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Member id to update",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Member not found"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Validation exception"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },
     *     requestBody={"$ref": "#/components/requestBodies/Member"}
     * )
     */

    /**
     * @OA\Delete(
     *     path="/members/{id}",
     *     tags={"Member"},
     *     summary="Deletes a Member",
     *     operationId="deleteMember",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Member id to delete",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pet not found",
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },
     * )
     */
    public function create()
    {        
        $wilayahId = $this->request->getPost('wilayah_id');
        $this->uploadFile();
        $this->model->set('path_logo', $this->getPathLogo());
        $this->model->set('path_image', $this->getPathImage());
        $this->model->set('code', $this->getCodeUnique($wilayahId));
        log_message("error", json_encode($this->model));
        return parent::create();
    }

    private function uploadFile()
    {
        $logo  = $this->request->getFile('logo');
        $image = $this->request->getFile('image');
        
        if(empty($logo)){
            throw new RuntimeException('file logo is required');
        }

        if(empty($image)){
            throw new RuntimeException('file image is required');
        }

        if (! $logo->isValid()) {
            throw new RuntimeException($logo->getErrorString() . '(' . $logo->getError() . ')');
        }

        if (! $image->isValid()) {
            throw new RuntimeException($image->getErrorString() . '(' . $image->getError() . ')');
        }
        $imageFolder = 'uploads/'.$this->imageFolder;
        if (! $logo->hasMoved()) {
            $newName = $logo->getRandomName();            
            $logo->move(WRITEPATH . $imageFolder, $newName);
            $this->setPathLogo($imageFolder.'/' . $logo->getName());
        }

        if ($image->isValid() && ! $image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(WRITEPATH . $imageFolder, $newName);
            $this->setPathImage($imageFolder.'/' . $image->getName());
        }
    }

    /**
     * Get the value of pathLogo
     */
    public function getPathLogo()
    {
        return $this->pathLogo;
    }

    /**
     * Set the value of pathLogo
     *
     * @param mixed $pathLogo
     *
     * @return self
     */
    public function setPathLogo($pathLogo)
    {
        $this->pathLogo = $pathLogo;

        return $this;
    }

    /**
     * Get the value of pathImage
     */
    public function getPathImage()
    {
        return $this->pathImage;
    }

    /**
     * Set the value of pathImage
     *
     * @param mixed $pathImage
     *
     * @return self
     */
    public function setPathImage($pathImage)
    {
        $this->pathImage = $pathImage;

        return $this;
    }

    private function getCodeUnique($wilayahId){
        $lastSequence = 0;
        $lastMember = $this->model->where('wilayah_id',$wilayahId)->orderBy('id','desc')->first();
        if($lastMember){
            $lastSequence = intval(substr($lastMember->code, -2));
        }
        $lastSequence++;
        return str_replace('.','',$wilayahId).str_pad($lastSequence,2,'0',STR_PAD_LEFT);
    }
}
