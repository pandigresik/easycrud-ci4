<?php

namespace App\Modules\Api\Models;

use asligresik\easyapi\Models\BaseModel;

class UsersModel extends BaseModel
{
    protected $table         = 'users';
    protected $returnType    = 'App\Modules\Api\Entities\Users';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'username',
        'first_name',
        'last_name',
        'avatar',
        'status',
        'status_message',
        'active',
        'permissions',
        'last_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $validationRules = [
        'id'             => 'numeric|required|is_unique[users.id,id,{id}]',
        'username'       => 'max_length[30]',
        'first_name'     => 'max_length[255]',
        'last_name'      => 'max_length[255]',
        'avatar'         => 'max_length[255]',
        'status'         => 'max_length[255]',
        'status_message' => 'max_length[255]',
        'active'         => 'numeric|max_length[1]|required',
        'last_active'    => 'valid_date',
        'created_at'     => 'valid_date',
        'updated_at'     => 'valid_date',
        'deleted_at'     => 'valid_date',
    ];
}
