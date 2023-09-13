<?php

namespace App\Models;

use CodeIgniter\Model;

class MSeminario extends Model
{
    protected $table      = 'cursos_seminarios';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_administrador',
        'codigo',
        'id_mencion',
        'costo',
        'tema',
        'lugar',
        'archivo',
        'estado',
        'modalidad'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function listarActivos($activo)
    {
        $this->select('cursos_seminarios.*, m.mencion AS mencion');
        $this->join('mencion AS m', 'cursos_seminarios.id_mencion = m.id');
        $this->where('cursos_seminarios.estado', $activo);
        $this->orderBy('cursos_seminarios.id', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }

    public function listarAdministrador($id)
    {
        $this->select('cursos_seminarios.*, m.mencion AS mencion');
        $this->join('mencion AS m', 'cursos_seminarios.id_mencion = m.id');
        $this->where('cursos_seminarios.id_administrador', $id);
        $this->orderBy('cursos_seminarios.id', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }

    public function listaProfesionales($mencion, $estado)
    {
        $this->select('cursos_seminarios.*, m.mencion AS mencion');
        $this->join('mencion AS m', 'cursos_seminarios.id_mencion = m.id');
        $this->where('cursos_seminarios.estado', $estado);
        if (!empty($mencion)) {
            $this->whereIn('cursos_seminarios.id_mencion', $mencion);
        } else {
            return []; // Retorna un array vacío si $mencion está vacía
        }
        $this->orderBy('cursos_seminarios.id', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }
    
}
