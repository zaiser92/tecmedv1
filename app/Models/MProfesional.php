<?php

namespace App\Models;

use CodeIgniter\Model;

class MProfesional extends Model
{
    protected $table      = 'profesional';
    protected $primaryKey = 'id_profesional';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;


    protected $allowedFields = [
        'password',
        'img_profesional',
        'id_rol',
        'nombres',
        'ap_paterno',
        'ap_materno',
        'cedula',
        'nacionalidad',
        'domicilio',
        'celular',
        'email',
        'fecha_nacimiento',
        'genero',
        'ingreso',
        'egreso',
        'estado',
        'mencion',
        'reset',
        'ciudad'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'fecha_eli';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
