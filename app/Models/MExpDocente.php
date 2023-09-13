<?php

namespace App\Models;

use CodeIgniter\Model;

class MExpDocente extends Model
{
    protected $table      = 'experiencia_docente';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_profesional',
        'materia',
        'universidad',
        'desde',
        'ciudad',
        'pais',
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
