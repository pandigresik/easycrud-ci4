<?php

namespace App\Modules\Api\Models;

use asligresik\easyapi\Models\BaseModel;

class MemberModel extends BaseModel
{
    protected $table         = 'member';
    protected $returnType    = 'App\Modules\Api\Entities\Member';
    protected $primaryKey    = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'name',
        'wilayah_id',
        'code',
        'address',
        'path_logo',
        'path_image',
        'state',
        'created_at',
        'updated_at',
    ];
    protected $validationRules = [
        'id'         => 'numeric|required|is_unique[member.id,id,{id}]',
        'name'       => 'max_length[255]|required',
        'wilayah_id' => 'max_length[15]|required',
        'code'       => 'max_length[18]|required|is_unique[member.code,code,{id}]',
        'address'    => 'max_length[255]|required',
        'path_logo'  => 'max_length[255]',
        'path_image' => 'max_length[255]',
        'created_at' => 'valid_date|required',
        'updated_at' => 'valid_date|required',
    ];
}
