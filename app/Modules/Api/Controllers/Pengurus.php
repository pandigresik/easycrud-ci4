<?php namespace App\Modules\Api\Controllers;
 
use asligresik\easyapi\Controllers\BaseResourceController;
class Pengurus extends BaseResourceController
{
    protected $modelName = 'App\Modules\Api\Models\PengurusModel';  

     /**
     * @OA\Get(
     *     path="/pengurus",
     *     tags={"Pengurus"},
     *     summary="Find list Pengurus",
     *     description="Returns list of Pengurus",
     *     operationId="getPengurus",  
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
     *            @OA\Property(property="data",type="array",@OA\Items(ref="#/components/schemas/Pengurus")),
     *            @OA\Property(property="pagination",type="object",@OA\Property(property="currentPage", type="integer"),@OA\Property(property="totalPage", type="integer")),
     *         ),
     *         @OA\XmlContent(type="object",
     *            @OA\Property(property="data",type="array",@OA\Items(ref="#/components/schemas/Pengurus")),
     *            @OA\Property(property="pagination",type="array",@OA\Items(ref="#/components/schemas/Pengurus")),
     *         ),           
     *     ),     
     *     @OA\Response(
     *         response=404,
     *         description="Pengurus not found"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     }
     * )
     *     
     */

    /**
     * @OA\Get(
     *     path="/pengurus/{id}",
     *     tags={"Pengurus"},
     *     summary="Find Pengurus by ID",
     *     description="Returns a single Pengurus",
     *     operationId="getPengurusById",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of Pengurus to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Pengurus"),
     *         @OA\XmlContent(ref="#/components/schemas/Pengurus"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pengurus not found"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     }
     * )
     *     
     */

    /**
     * @OA\Post(
     *     path="/pengurus",
     *     tags={"Pengurus"},
     *     summary="Add a new Pengurus to the store",
     *     operationId="addPengurus",
     *     @OA\Response(
     *         response=201,
     *         description="Created Pengurus",
     *         @OA\JsonContent(ref="#/components/schemas/Pengurus"),
     *         @OA\XmlContent(ref="#/components/schemas/Pengurus"),
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },     
     *     requestBody={"$ref": "#/components/requestBodies/Pengurus"}
     * )
     */

    /**
     * @OA\Put(
     *     path="/pengurus/{id}",
     *     tags={"Pengurus"},
     *     summary="Update an existing Pengurus",
     *     operationId="updatePengurus",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Pengurus id to update",
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
     *         description="Pengurus not found"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Validation exception"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },     
     *     requestBody={"$ref": "#/components/requestBodies/Pengurus"}
     * )
     */

    /**
     * @OA\Delete(
     *     path="/pengurus/{id}",
     *     tags={"Pengurus"},
     *     summary="Deletes a Pengurus",
     *     operationId="deletePengurus",     
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Pengurus id to delete",
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
} 