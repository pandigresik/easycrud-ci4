<?php

namespace App\Modules\Api\Entities;

use asligresik\easyapi\Entities\BaseEntity;

/**
 * Class Member
 *
 * @OA\Schema(
 *     title="Member",
 *     description="Member"
 * )
 *
 * @OA\Tag(
 *     name="Member",
 *     description="Everything about your Member"
 * )
 */
class Member extends BaseEntity
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
     *     description="wilayah_id",
     *     title="wilayah_id",
     *     type="string",
     * 	   format="-",
     * 	   nullable=false,
     * 	   maxLength=15,
     * )
     */
    private $wilayah_id;

    /**
     * @OA\Property(
     *     description="code",
     *     title="code",
     *     type="string",
     * 	   format="-",
     * 	   nullable=false,
     * 	   maxLength=18,
     * )
     */
    private $code;

    /**
     * @OA\Property(
     *     description="address",
     *     title="address",
     *     type="string",
     * 	   format="-",
     * 	   nullable=false,
     * 	   maxLength=255,
     * )
     */
    private $address;

    /**
     * @OA\Property(
     *     description="path_logo",
     *     title="path_logo",
     *     type="string",
     * 	   format="-",
     * 	   nullable=true,
     * 	   maxLength=255,
     * )
     */
    private $path_logo;

    /**
     * @OA\Property(
     *     description="path_image",
     *     title="path_image",
     *     type="string",
     * 	   format="-",
     * 	   nullable=true,
     * 	   maxLength=255,
     * )
     */
    private $path_image;

    /**
     * @OA\Property(
     *     description="state",
     *     title="state",
     *     type="string",
     * 	   format="-",
     * 	   nullable=true,
     * )
     */
    private $state;

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
 *     request="Member",
 *     description="Member object that needs to be added",
 *     @OA\JsonContent(ref="#/components/schemas/Member"),
 *     @OA\MediaType(
 *         mediaType="application/x-www-form-urlencoded",
 *         @OA\Schema(ref="#/components/schemas/Member")
 *     ),
 *     @OA\MediaType(
 *         mediaType="application/xml",
 *         @OA\Schema(ref="#/components/schemas/Member")
 *     )
 * )
 */
