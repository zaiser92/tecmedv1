<?php

namespace App\Models;

use CodeIgniter\Model;

class MTitula extends Model
{
    protected $table      = 'titula';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_profesional',
        'id_mencion',
        'ingreso',
        'egreso',
        'titulacion',
        'modalidad'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    
    public function listar($id)
    {
        $this->select('titula.*, m.mencion AS mencion');
        $this->join('mencion AS m', 'titula.id_mencion = m.id'); //INNER JOIN
        $this->where('titula.id_profesional', $id);
        $this->orderBy('titula.id', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }
    
    public function reporteIngresoEstado($activo,$mencion,$ingreso)
    {
        $this->select('titula.*, p.*');
        $this->join('profesional AS p', 'titula.id_profesional = p.id_profesional'); 
        $this->join('mencion AS m', 'titula.id_mencion = m.id'); 
        $this->where('p.estado', $activo);
        $this->where('m.id', $mencion);
        $this->where('titula.ingreso', $ingreso);
        $this->orderBy('p.ap_paterno', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }

    public function reporteIngreso($mencion,$ingreso)
    {
        $this->select('titula.*, p.*');
        $this->join('profesional AS p', 'titula.id_profesional = p.id_profesional'); 
        $this->join('mencion AS m', 'titula.id_mencion = m.id'); 
        $this->where('m.id', $mencion);
        $this->where('titula.ingreso', $ingreso);
        $this->orderBy('p.ap_paterno', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }

    public function reporteTitulacionEstado($activo,$mencion,$titulacion)
    {
        $this->select('titula.*, p.*');
        $this->join('profesional AS p', 'titula.id_profesional = p.id_profesional'); 
        $this->join('mencion AS m', 'titula.id_mencion = m.id'); 
        $this->where('p.estado', $activo);
        $this->where('m.id', $mencion);
        $this->where('titula.titulacion', $titulacion);
        $this->orderBy('p.ap_paterno', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }

    public function reporteTitulacion($mencion,$titulacion)
    {
        $this->select('titula.*, p.*');
        $this->join('profesional AS p', 'titula.id_profesional = p.id_profesional'); 
        $this->join('mencion AS m', 'titula.id_mencion = m.id'); 
        $this->where('m.id', $mencion);
        $this->where('titula.titulacion', $titulacion);
        $this->orderBy('p.ap_paterno', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }

    public function reporteGeneroEstado($activo,$mencion,$genero)
    {
        $this->select('titula.*, p.*');
        $this->join('profesional AS p', 'titula.id_profesional = p.id_profesional'); 
        $this->join('mencion AS m', 'titula.id_mencion = m.id'); 
        $this->where('p.estado', $activo);
        $this->where('m.id', $mencion);
        $this->where('p.genero', $genero);
        $this->orderBy('p.ap_paterno', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }

    public function reporteGenero($mencion,$genero)
    {
        $this->select('titula.*, p.*');
        $this->join('profesional AS p', 'titula.id_profesional = p.id_profesional'); 
        $this->join('mencion AS m', 'titula.id_mencion = m.id'); 
        $this->where('m.id', $mencion);
        $this->where('p.genero', $genero);
        $this->orderBy('p.ap_paterno', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }


    public function listarMenciones()
    {
        $query = $this->select('id_mencion')->findAll();
        $menciones = array();

        foreach ($query as $row) {
            $menciones[] = $row['id_mencion'];
        }

        return $menciones;
    }

    public function listarMencionesProfesionales($id_prof)
    {
        $query = $this->select('id_mencion')->where('id_profesional', $id_prof)->findAll();
        $menciones = array();

        foreach ($query as $row) {
            $menciones[] = $row['id_mencion'];
        }

        return $menciones;
    } 
    public function countPersonasEdad($min_edad, $max_edad)
    {
        $this->select('COUNT(*) as total');
        $this->join('profesional', 'profesional.id_profesional = titula.id_profesional');
        $this->where('TIMESTAMPDIFF(YEAR, profesional.fecha_nacimiento, CONCAT(titula.titulacion, \'-01-01\')) BETWEEN ' . $min_edad . ' AND ' . $max_edad);
        $result = $this->get()->getRow();

        return $result ? $result->total : 0;
    }

    public function contMayor55()
    {
        $this->select('COUNT(*) as total');
        $this->join('profesional', 'profesional.id_profesional = titula.id_profesional');
        $this->where('TIMESTAMPDIFF(YEAR, profesional.fecha_nacimiento, CONCAT(titula.titulacion, \'-01-01\')) >= 55');
        $result = $this->get()->getRow();

        return $result ? $result->total : 0;
    }

    public function countPersonasEdadMencion($min_edad, $max_edad, $men)
    {
        $this->select('COUNT(*) as total');
        $this->join('profesional', 'profesional.id_profesional = titula.id_profesional');
        $this->where('titula.id_mencion', $men);
        $this->where('TIMESTAMPDIFF(YEAR, profesional.fecha_nacimiento, CONCAT(titula.titulacion, \'-01-01\')) BETWEEN ' . $min_edad . ' AND ' . $max_edad);
        $result = $this->get()->getRow();

        return $result ? $result->total : 0;
    }

    public function contMayor55Mencion($men)
    {
        $this->select('COUNT(*) as total');
        $this->join('profesional', 'profesional.id_profesional = titula.id_profesional');
        $this->where('titula.id_mencion', $men);
        $this->where('TIMESTAMPDIFF(YEAR, profesional.fecha_nacimiento, CONCAT(titula.titulacion, \'-01-01\')) >= 55');
        $result = $this->get()->getRow();

        return $result ? $result->total : 0;
    }

    public function genero($genero)
    {
        $this->select('titula.id, COUNT(*) as total');
        $this->join('profesional', 'profesional.id_profesional = titula.id_profesional');
        $this->where('profesional.genero', $genero);
        $this->groupBy('profesional.genero');
        $result = $this->get()->getRow();

        return $result ? $result->total : 0;
    }

    public function generoMencion($genero, $mencion)
    {
        $this->select('COUNT(*) as total');
        $this->join('profesional', 'profesional.id_profesional = titula.id_profesional');
        $this->where('profesional.genero', $genero);
        $this->where('titula.id_mencion', $mencion);
        $result = $this->get()->getRow();

        return $result ? $result->total : 0;
    }

    public function contarDiferencia($num)
    {
        $this->selectCount('id');
        $this->where('ABS(titulacion - ingreso)', $num);
        $query = $this->get();
        $cantidad = $query->getRow()->id;
        return $cantidad;
    }

    public function contarDiferenciaMay10()
    {
        $this->selectCount('id');
        $this->where('(ABS(titulacion - ingreso))>=10');
        $query = $this->get();
        $cantidad = $query->getRow()->id;
        return $cantidad;
    }

    public function contarDiferenciaMencion($num, $men)
    {
        $this->selectCount('id');
        $this->where('id_mencion', $men);
        $this->where('ABS(titulacion - ingreso)', $num);
        $query = $this->get();
        $cantidad = $query->getRow()->id;
        return $cantidad;
    }

    public function contarDiferenciaMay10Mencion($men)
    {
        $this->selectCount('id');
        $this->where('id_mencion', $men);
        $this->where('(ABS(titulacion - ingreso))>=10');
        $query = $this->get();
        $cantidad = $query->getRow()->id;
        return $cantidad;
    }

    public function nacional($ciudades)
    {
        $this->select('COUNT(*) as total');
        $this->join('profesional', 'profesional.id_profesional = titula.id_profesional');
        $this->whereIn('profesional.ciudad', $ciudades);
        $result = $this->get()->getRow();

        return $result ? $result->total : 0;
    }

    public function internacional($ciudades)
    {
        $this->select('COUNT(*) as total');
        $this->join('profesional', 'profesional.id_profesional = titula.id_profesional');
        $this->WhereNotIn('profesional.ciudad', $ciudades);
        $result = $this->get()->getRow();

        return $result ? $result->total : 0;
    }

    public function lapaz()
    {
        $this->select('COUNT(*) as total');
        $this->join('profesional', 'profesional.id_profesional = titula.id_profesional');
        $this->where('profesional.ciudad', 'La Paz');
        $result = $this->get()->getRow();

        return $result ? $result->total : 0;
    }

    public function elalto()
    {
        $this->select('COUNT(*) as total');
        $this->join('profesional', 'profesional.id_profesional = titula.id_profesional');
        $this->where('profesional.ciudad', 'El Alto');
        $result = $this->get()->getRow();

        return $result ? $result->total : 0;
    }

    public function lapazMencion($mencion)
    {
        $this->select('COUNT(*) as total');
        $this->join('profesional', 'profesional.id_profesional = titula.id_profesional');
        $this->where('titula.id_mencion', $mencion);
        $this->where('profesional.ciudad', 'La Paz');
        $result = $this->get()->getRow();

        return $result ? $result->total : 0;
    }

    public function elaltoMencion($mencion)
    {
        $this->select('COUNT(*) as total');
        $this->join('profesional', 'profesional.id_profesional = titula.id_profesional');
        $this->where('titula.id_mencion', $mencion);
        $this->where('profesional.ciudad', 'El Alto');
        $result = $this->get()->getRow();

        return $result ? $result->total : 0;
    }

    public function nacionalMencion($mencion, $ciudades)
    {
        $this->select('COUNT(*) as total');
        $this->join('profesional', 'profesional.id_profesional = titula.id_profesional');
        $this->where('titula.id_mencion', $mencion);
        $this->whereIn('profesional.ciudad', $ciudades);
        $result = $this->get()->getRow();

        return $result ? $result->total : 0;
    }

    public function internacionalMencion($mencion, $ciudades)
    {
        $this->select('COUNT(*) as total');
        $this->join('profesional', 'profesional.id_profesional = titula.id_profesional');
        $this->where('titula.id_mencion', $mencion);
        $this->WhereNotIn('profesional.ciudad', $ciudades);
        $result = $this->get()->getRow();

        return $result ? $result->total : 0;
    }
}
