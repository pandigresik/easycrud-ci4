<?php

namespace App\Modules\Api\Entities;

use asligresik\easyapi\Entities\BaseEntity;

/**
 * Class Wilayah
 *
 * @OA\Schema(
 *     title="Wilayah",
 *     description="Wilayah"
 * )
 *
 * @OA\Tag(
 *     name="Wilayah",
 *     description="Everything about your Wilayah"
 * )
 */
class Wilayah extends BaseEntity
{
    /**
     * @OA\Property(
     *     description="kode",
     *     title="kode",
     *     type="string",
     * 	   format="-",
     * 	   nullable=false,
     * 	   maxLength=15,
     * )
     */
    private $kode;

    /**
     * @OA\Property(
     *     description="nama",
     *     title="nama",
     *     type="string",
     * 	   format="-",
     * 	   nullable=false,
     * 	   maxLength=70,
     * )
     */
    private $nama;

    /**
     * @OA\Property(
     *     description="level",
     *     title="level",
     *     type="string",
     * 	   format="-",
     * 	   nullable=false,
     * )
     */
    private $level;
}
/**
 * @OA\RequestBody(
 *     request="Wilayah",
 *     description="Wilayah object that needs to be added",
 *     @OA\JsonContent(ref="#/components/schemas/Wilayah"),
 *     @OA\MediaType(
 *         mediaType="application/x-www-form-urlencoded",
 *         @OA\Schema(ref="#/components/schemas/Wilayah")
 *     ),
 *     @OA\MediaType(
 *         mediaType="application/xml",
 *         @OA\Schema(ref="#/components/schemas/Wilayah")
 *     )
 * )
 */
