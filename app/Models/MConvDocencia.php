<?php

namespace App\Models;

use CodeIgniter\Model;

class MConvDocencia extends Model
{
    protected $table      = 'convocatoria_docencia';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_administrador',
        'codigo',
        'id_mencion',
        'archivo',
        'estado',
        'materia',
        'carga_horaria',
        'fecha_entrega_doc'
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
        $this->select('convocatoria_docencia.*, m.mencion AS mencion');
        $this->join('mencion AS m', 'convocatoria_docencia.id_mencion = m.id');
        $this->where('convocatoria_docencia.estado', $activo);
        $this->orderBy('convocatoria_docencia.id', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }

    public function listarAdministrador($id)
    {
        $this->select('convocatoria_docencia.*, m.mencion AS mencion');
        $this->join('mencion AS m', 'convocatoria_docencia.id_mencion = m.id');
        $this->where('convocatoria_docencia.id_administrador', $id);
        $this->orderBy('convocatoria_docencia.id', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }

    public function listaProfesionales($mencion, $estado)
    {
        $this->select('convocatoria_docencia.*, m.mencion AS mencion');
        $this->join('mencion AS m', 'convocatoria_docencia.id_mencion = m.id');
        $this->where('convocatoria_docencia.estado', $estado);
        if (!empty($mencion)) {
            $this->whereIn('convocatoria_docencia.id_mencion', $mencion);
        } else {
            return []; // Retorna un array vacío si $mencion está vacía
        }
        $this->orderBy('convocatoria_docencia.id', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }
}
