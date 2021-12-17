<?php namespace App\Models;

use asligresik\easyapi\Models\BaseModel;

class JabatanModel extends BaseModel
{
    protected $table = 'jabatan';
    protected $returnType = 'App\Entities\Jabatan';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;  
    protected $allowedFields = [
        'id',
		'name',
		'description',
		'created_at',
		'updated_at'
    ];
    protected $validationRules = [
        'id' => 'max_length[32]',
		'name' => 'max_length[60]',
		'description' => 'max_length[255]'
    ];   
}
