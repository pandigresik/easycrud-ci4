<?php

namespace App\Modules\Api\Entities;

use asligresik\easyapi\Entities\BaseEntity;

/**
 * Class Pengurus
 *
 * @OA\Schema(
 *     title="Pengurus",
 *     description="Pengurus"
 * )
 *
 * @OA\Tag(
 *     name="Pengurus",
 *     description="Everything about your Pengurus"
 * )
 */
class Pengurus extends BaseEntity
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
     * 	   maxLength=255,
     * )
     */
    private $name;

    /**
     * @OA\Property(
     *     description="contact",
     *     title="contact",
     *     type="string",
     * 	   format="-",
     * 	   nullable=false,
     * 	   maxLength=255,
     * )
     */
    private $contact;

    /**
     * @OA\Property(
     *     description="description",
     *     title="description",
     *     type="string",
     * 	   format="-",
     * 	   nullable=false,
     * )
     */
    private $description;

    /**
     * @OA\Property(
     *     description="jabatan_id",
     *     title="jabatan_id",
     *     type="integer",
     * 	   format="-",
     * 	   nullable=false,
     * )
     */
    private $jabatan_id;

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
}
/**
 * @OA\RequestBody(
 *     request="Pengurus",
 *     description="Pengurus object that needs to be added",
 *     @OA\JsonContent(ref="#/components/schemas/Pengurus"),
 *     @OA\MediaType(
 *         mediaType="application/x-www-form-urlencoded",
 *         @OA\Schema(ref="#/components/schemas/Pengurus")
 *     ),
 *     @OA\MediaType(
 *         mediaType="application/xml",
 *         @OA\Schema(ref="#/components/schemas/Pengurus")
 *     )
 * )
 */
