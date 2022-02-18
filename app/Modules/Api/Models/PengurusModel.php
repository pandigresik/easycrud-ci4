<?php

namespace App\Modules\Api\Models;

use asligresik\easyapi\Models\BaseModel;

class PengurusModel extends BaseModel
{
    protected $table         = 'pengurus';
    protected $returnType    = 'App\Modules\Api\Entities\Pengurus';
    protected $primaryKey    = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'name',
        'contact',
        'description',
        'jabatan_id',
        'created_at',
        'updated_at',
    ];
    protected $validationRules = [
        'id'          => 'numeric|required|is_unique[pengurus.id,id,{id}]',
        'name'        => 'max_length[255]|required',
        'contact'     => 'max_length[255]|required',
        'description' => 'required',
        'jabatan_id'  => 'numeric|required',
        'created_at'  => 'valid_date|required',
        'updated_at'  => 'valid_date|required',
    ];
}
