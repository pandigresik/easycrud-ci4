<?php

namespace App\Modules\Api\Models;

use asligresik\easyapi\Models\BaseModel;

class WilayahModel extends BaseModel
{
    protected $table         = 'wilayah';
    protected $returnType    = 'App\Modules\Api\Entities\Wilayah';
    protected $primaryKey    = 'kode';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nama',
        'level',
    ];
    protected $validationRules = [
        'kode'  => 'max_length[15]|required|is_unique[wilayah.kode,id,{id}]',
        'nama'  => 'max_length[70]|required',
        'level' => 'required',
    ];
}
