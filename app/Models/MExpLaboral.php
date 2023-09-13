<?php

namespace App\Models;

use CodeIgniter\Model;

class MExpLaboral extends Model
{
    protected $table      = 'experiencia_laboral ';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_profesional',
        'empresa_institucion',
        'cargo',
        'actividades',
        'ciudad',
        'pais',
        'desde',
        'hasta'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
