<?php

namespace App\Modules\Api\Models;

use asligresik\easyapi\Models\BaseModel;

class JabatanModel extends BaseModel
{
    protected $table         = 'jabatan';
    protected $returnType    = 'App\Modules\Api\Entities\Jabatan';
    protected $primaryKey    = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'name',
        'description',
        'created_at',
        'updated_at',
    ];
    protected $validationRules = [
        'id'          => 'numeric|required|is_unique[jabatan.id,id,{id}]',
        'name'        => 'max_length[60]|required',
        'description' => 'max_length[255]|required',
        'created_at'  => 'valid_date|required',
        'updated_at'  => 'valid_date|required',
    ];
}
