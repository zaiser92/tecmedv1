<?php

namespace App\Models;

use CodeIgniter\Model;

class MPublicacion extends Model
{
    protected $table      = 'publicaciones';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_profesional',
        'tipo',
        'colaboracion',
        'titulo',
        'ciudad',
        'pais',
        'anio_publicacion',
        'nombre_revista'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
