<?php

namespace App\Models;

use CodeIgniter\Model;

class MExpAcademica extends Model
{
    protected $table      = 'experiencia_academia';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;


    protected $allowedFields = [
        'id_profesional',
        'id_mencion',
        'prep_academica',
        'plan_estudios',
        'asignaturas',
        'equipamento',
        'infraestructura',
        'biblioteca',
        'tutoria_docente',
        'actividades_academicas',
        'actividades_extracurriculares',
        'sociedad_cientifica',
        'internado_rotatorio',
        'perfil_profesional'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function listar($id)
    {
        $this->select('experiencia_academia.*, m.mencion AS mencion');
        $this->join('mencion AS m', 'experiencia_academia.id_mencion = m.id');
        $this->where('experiencia_academia.id_profesional', $id);
        $this->orderBy('experiencia_academia.id', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }
}
