<?php

namespace App\Modules\Api\Controllers;

use asligresik\easyapi\Controllers\BaseResourceController;

class Wilayahs extends BaseResourceController
{
    protected $modelName = 'App\Modules\Api\Models\WilayahModel';

    /**
     * @OA\Get(
     *     path="/wilayahs",
     *     tags={"Wilayah"},
     *     summary="Find list Wilayah",
     *     description="Returns list of Wilayah",
     *     operationId="getWilayah",
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
     *            @OA\Property(property="data",type="array",@OA\Items(ref="#/components/schemas/Wilayah")),
     *            @OA\Property(property="pagination",type="object",@OA\Property(property="currentPage", type="integer"),@OA\Property(property="totalPage", type="integer")),
     *         ),
     *         @OA\XmlContent(type="object",
     *            @OA\Property(property="data",type="array",@OA\Items(ref="#/components/schemas/Wilayah")),
     *            @OA\Property(property="pagination",type="array",@OA\Items(ref="#/components/schemas/Wilayah")),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Wilayah not found"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     }
     * )
     */

    /**
     * @OA\Get(
     *     path="/wilayahs/{kode}",
     *     tags={"Wilayah"},
     *     summary="Find Wilayah by kode",
     *     description="Returns a single Wilayah",
     *     operationId="getWilayahById",
     *     @OA\Parameter(
     *         name="kode",
     *         in="path",
     *         description="Kode of Wilayah to return",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Wilayah"),
     *         @OA\XmlContent(ref="#/components/schemas/Wilayah"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid Kode wilayah"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Wilayah not found"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     }
     * )
     */

    /**
     * @OA\Post(
     *     path="/wilayahs",
     *     tags={"Wilayah"},
     *     summary="Add a new Wilayah to the store",
     *     operationId="addWilayah",
     *     @OA\Response(
     *         response=201,
     *         description="Created Wilayah",
     *         @OA\JsonContent(ref="#/components/schemas/Wilayah"),
     *         @OA\XmlContent(ref="#/components/schemas/Wilayah"),
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },
     *     requestBody={"$ref": "#/components/requestBodies/Wilayah"}
     * )
     */

    /**
     * @OA\Put(
     *     path="/wilayahs/{kode}",
     *     tags={"Wilayah"},
     *     summary="Update an existing Wilayah",
     *     operationId="updateWilayah",
     *     @OA\Parameter(
     *         name="kode",
     *         in="path",
     *         description="Wilayah kode to update",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid Kode supplied"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Wilayah not found"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Validation exception"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },
     *     requestBody={"$ref": "#/components/requestBodies/Wilayah"}
     * )
     */

    /**
     * @OA\Delete(
     *     path="/wilayahs/{kode}",
     *     tags={"Wilayah"},
     *     summary="Deletes a Wilayah",
     *     operationId="deleteWilayah",
     *     @OA\Parameter(
     *         name="kode",
     *         in="path",
     *         description="Wilayah kode to delete",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
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
