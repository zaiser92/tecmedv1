<?php

namespace App\Models;

use CodeIgniter\Model;

$db = \Config\Database::connect();

class MAdministrador extends Model
{
    protected $table      = 'administrador';
    protected $primaryKey = 'id_administrador';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nombres',
        'apellido',
        'ci',
        //'fecha_nacimiento',
        'password',
        'cargo',
        'estado',
        'reset',
        'telefono',
        'id_rol',
        'login'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function listar()
    {
        $this->select('administrador.*, (COUNT(DISTINCT cursos_seminarios.id)) AS cursos, 
        (COUNT(DISTINCT noticias.id)) AS noticias, 
        (COUNT(DISTINCT convocatoria_docencia.id)) AS convocatorias');
        $this->join('cursos_seminarios', 'administrador.id_administrador = cursos_seminarios.id_administrador', 'left');
        $this->join('noticias', 'administrador.id_administrador = noticias.id_administrador', 'left');
        $this->join('convocatoria_docencia', 'administrador.id_administrador = convocatoria_docencia.id_administrador', 'left');
        $this->where('administrador.estado', 1);
        $this->groupBy('administrador.id_administrador');
        $this->orderBy('administrador.id_administrador', 'DESC');

        $results = $this->findAll();
        return $results;
    }

    public function eliminados()
    {
        $this->select('administrador.*, (COUNT(DISTINCT cursos_seminarios.id_administrador)+COUNT(DISTINCT noticias.id)+COUNT(DISTINCT convocatoria_docencia.id)) AS total');
        $this->join('cursos_seminarios', 'administrador.id_administrador = cursos_seminarios.id_administrador', 'left');
        $this->join('noticias', 'administrador.id_administrador = noticias.id_administrador', 'left');
        $this->join('convocatoria_docencia', 'administrador.id_administrador = convocatoria_docencia.id_administrador', 'left');
        $this->where('administrador.estado', 0);
        $this->groupBy('administrador.id_administrador');
        $this->orderBy('administrador.id_administrador', 'DESC');

        $results = $this->findAll();
        return $results;
    }

    public function insertarUsuario($login, $password, $nombre, $apellido, $cargo, $ci, $telefono, $rol)
    {
        $login = strtolower(str_replace(' ', '', $ci)) . substr($nombre, 0, 1);
        $data = [
            'login' => $login,
            'nombres' => $nombre,
            'apellido' => $apellido,
            'cargo' => $cargo,
            'ci' => $ci,
            'password' => $password,
            'telefono' => $telefono,
            'id_rol' => $rol
        ];
        $this->insert($data);
    }

    public function editarUsuario($id, $login, $nombre, $apellido, $cargo, $ci, $telefono, $rol)
    {
        $login = strtolower(str_replace(' ', '', $ci)) . substr($nombre, 0, 1);
        $data = [
            'login' => $login,
            'nombres' => $nombre,
            'apellido' => $apellido,
            'cargo' => $cargo,
            'ci' => $ci,
            'telefono' => $telefono,
            'id_rol' => $rol
        ];
        $this->update($id, $data);
    }
}
