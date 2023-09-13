<?php

namespace App\Models;

use CodeIgniter\Model;

class MPremio extends Model
{
    protected $table      = 'premios_distinciones';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_profesional',
        'nombre',
        'institucion',
        'ciudad',
        'pais',
        'fecha'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
