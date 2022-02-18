<?php

namespace App\Modules\Api\Entities;

use asligresik\easyapi\Entities\BaseEntity;

/**
 * Class Users
 *
 * @OA\Schema(
 *     title="Users",
 *     description="Users"
 * )
 *
 * @OA\Tag(
 *     name="Users",
 *     description="Everything about your Users"
 * )
 */
class Users extends BaseEntity
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
     *     description="username",
     *     title="username",
     *     type="string",
     * 	   format="-",
     * 	   nullable=true,
     * 	   maxLength=30,
     * )
     */
    private $username;

    /**
     * @OA\Property(
     *     description="first_name",
     *     title="first_name",
     *     type="string",
     * 	   format="-",
     * 	   nullable=true,
     * 	   maxLength=255,
     * )
     */
    private $first_name;

    /**
     * @OA\Property(
     *     description="last_name",
     *     title="last_name",
     *     type="string",
     * 	   format="-",
     * 	   nullable=true,
     * 	   maxLength=255,
     * )
     */
    private $last_name;

    /**
     * @OA\Property(
     *     description="avatar",
     *     title="avatar",
     *     type="string",
     * 	   format="-",
     * 	   nullable=true,
     * 	   maxLength=255,
     * )
     */
    private $avatar;

    /**
     * @OA\Property(
     *     description="status",
     *     title="status",
     *     type="string",
     * 	   format="-",
     * 	   nullable=true,
     * 	   maxLength=255,
     * )
     */
    private $status;

    /**
     * @OA\Property(
     *     description="status_message",
     *     title="status_message",
     *     type="string",
     * 	   format="-",
     * 	   nullable=true,
     * 	   maxLength=255,
     * )
     */
    private $status_message;

    /**
     * @OA\Property(
     *     description="active",
     *     title="active",
     *     type="integer",
     * 	   format="-",
     * 	   nullable=false,
     * 	   maxLength=1,
     * )
     */
    private $active;

    /**
     * @OA\Property(
     *     description="permissions",
     *     title="permissions",
     *     type="string",
     * 	   format="-",
     * 	   nullable=true,
     * )
     */
    private $permissions;

    /**
     * @OA\Property(
     *     description="last_active",
     *     title="last_active",
     *     type="string",
     * 	   format="date",
     * 	   nullable=true,
     * )
     */
    private $last_active;

    /**
     * @OA\Property(
     *     description="created_at",
     *     title="created_at",
     *     type="string",
     * 	   format="date",
     * 	   nullable=true,
     * )
     */
    private $created_at;

    /**
     * @OA\Property(
     *     description="updated_at",
     *     title="updated_at",
     *     type="string",
     * 	   format="date",
     * 	   nullable=true,
     * )
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     description="deleted_at",
     *     title="deleted_at",
     *     type="string",
     * 	   format="date",
     * 	   nullable=true,
     * )
     */
    private $deleted_at;
}
/**
 * @OA\RequestBody(
 *     request="Users",
 *     description="Users object that needs to be added",
 *     @OA\JsonContent(ref="#/components/schemas/Users"),
 *     @OA\MediaType(
 *         mediaType="application/x-www-form-urlencoded",
 *         @OA\Schema(ref="#/components/schemas/Users")
 *     ),
 *     @OA\MediaType(
 *         mediaType="application/xml",
 *         @OA\Schema(ref="#/components/schemas/Users")
 *     )
 * )
 */
