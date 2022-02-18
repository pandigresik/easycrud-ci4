<?php

namespace App\Modules\Api\Controllers;

use asligresik\easyapi\Controllers\BaseResourceController;

class Jabatans extends BaseResourceController
{
    protected $modelName = 'App\Modules\Api\Models\JabatanModel';

    /**
     * @OA\Get(
     *     path="/jabatans",
     *     tags={"Jabatan"},
     *     summary="Find list Jabatan",
     *     description="Returns list of Jabatan",
     *     operationId="getJabatan",
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
     *            @OA\Property(property="data",type="array",@OA\Items(ref="#/components/schemas/Jabatan")),
     *            @OA\Property(property="pagination",type="object",@OA\Property(property="currentPage", type="integer"),@OA\Property(property="totalPage", type="integer")),
     *         ),
     *         @OA\XmlContent(type="object",
     *            @OA\Property(property="data",type="array",@OA\Items(ref="#/components/schemas/Jabatan")),
     *            @OA\Property(property="pagination",type="array",@OA\Items(ref="#/components/schemas/Jabatan")),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Jabatan not found"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     }
     * )
     */

    /**
     * @OA\Get(
     *     path="/jabatans/{id}",
     *     tags={"Jabatan"},
     *     summary="Find Jabatan by ID",
     *     description="Returns a single Jabatan",
     *     operationId="getJabatanById",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of Jabatan to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Jabatan"),
     *         @OA\XmlContent(ref="#/components/schemas/Jabatan"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Jabatan not found"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     }
     * )
     */

    /**
     * @OA\Post(
     *     path="/jabatans",
     *     tags={"Jabatan"},
     *     summary="Add a new Jabatan to the store",
     *     operationId="addJabatan",
     *     @OA\Response(
     *         response=201,
     *         description="Created Jabatan",
     *         @OA\JsonContent(ref="#/components/schemas/Jabatan"),
     *         @OA\XmlContent(ref="#/components/schemas/Jabatan"),
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },
     *     requestBody={"$ref": "#/components/requestBodies/Jabatan"}
     * )
     */

    /**
     * @OA\Put(
     *     path="/jabatans/{id}",
     *     tags={"Jabatan"},
     *     summary="Update an existing Jabatan",
     *     operationId="updateJabatan",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Jabatan id to update",
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
     *         description="Jabatan not found"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Validation exception"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },
     *     requestBody={"$ref": "#/components/requestBodies/Jabatan"}
     * )
     */

    /**
     * @OA\Delete(
     *     path="/jabatans/{id}",
     *     tags={"Jabatan"},
     *     summary="Deletes a Jabatan",
     *     operationId="deleteJabatan",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Jabatan id to delete",
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
