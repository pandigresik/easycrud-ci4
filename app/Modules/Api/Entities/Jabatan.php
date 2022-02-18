<?php

namespace App\Modules\Api\Entities;

use asligresik\easyapi\Entities\BaseEntity;

/**
 * Class Jabatan
 *
 * @OA\Schema(
 *     title="Jabatan",
 *     description="Jabatan"
 * )
 *
 * @OA\Tag(
 *     name="Jabatan",
 *     description="Everything about your Jabatan"
 * )
 */
class Jabatan extends BaseEntity
{
    /**
     * @OA\Property(
     *     description="id",
     *     title="id",
     *     type="integer",
     * 	   format="-",
     * 	   nullable=false,
     * )
     */
    private $id;

    /**
     * @OA\Property(
     *     description="name",
     *     title="name",
     *     type="string",
     * 	   format="-",
     * 	   nullable=false,
     * 	   maxLength=60,
     * )
     */
    private $name;

    /**
     * @OA\Property(
     *     description="description",
     *     title="description",
     *     type="string",
     * 	   format="-",
     * 	   nullable=false,
     * 	   maxLength=255,
     * )
     */
    private $description;

    /**
     * @OA\Property(
     *     description="created_at",
     *     title="created_at",
     *     type="string",
     * 	   format="date",
     * 	   nullable=false,
     * )
     */
    private $created_at;

    /**
     * @OA\Property(
     *     description="updated_at",
     *     title="updated_at",
     *     type="string",
     * 	   format="date",
     * 	   nullable=false,
     * )
     */
    private $updated_at;
}
/**
 * @OA\RequestBody(
 *     request="Jabatan",
 *     description="Jabatan object that needs to be added",
 *     @OA\JsonContent(ref="#/components/schemas/Jabatan"),
 *     @OA\MediaType(
 *         mediaType="application/x-www-form-urlencoded",
 *         @OA\Schema(ref="#/components/schemas/Jabatan")
 *     ),
 *     @OA\MediaType(
 *         mediaType="application/xml",
 *         @OA\Schema(ref="#/components/schemas/Jabatan")
 *     )
 * )
 */
