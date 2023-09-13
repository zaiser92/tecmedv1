<?php

namespace App\Models;

use CodeIgniter\Model;

class MFormAcademica extends Model
{
    protected $table      = 'formacion_academica ';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_profesional',
        'tipo',
        'titulo',
        'institucion_academica',
        'ciudad',
        'pais',
        'gestion_titulacion'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
