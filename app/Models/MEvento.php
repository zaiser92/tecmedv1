<?php

namespace App\Models;

use CodeIgniter\Model;

class MEvento extends Model
{
    protected $table      = 'eventos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_profesional',
        'tema',
        'institucion',
        'modalidad',
        'tipo',
        'ciudad',
        'pais',
        'inicio',
        'fin'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
