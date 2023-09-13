<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MMencion;
use App\Models\MProfesional;
use App\Models\MTitula;
use App\Models\MExpAcademica;

class CTitulado extends BaseController
{
    protected $mencion, $reglasCambia, $reglas, $reglas1, $session, $profesional, $titula, $expAcademica;

    public function __construct()
    {
        $this->mencion = new MMencion();
        $this->titula = new MTitula();
        $this->expAcademica = new MExpAcademica();
        $this->profesional = new MProfesional();
        $this->session = session();
        helper(['form']);
        $this->reglas =  [
            'mencion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione una MENCIÓN.'
                ]
            ],
            'modalidad' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione una MODALIDAD.'
                ]
            ],
            'ingreso' => [
                'rules' => 'required|greater_than[1900]|less_than[3000]',
                'errors' => [
                    'required' => 'El campo GESTIÓN INGRESO es obligatorio.',
                    'greater_than' => 'El campo GESTIÓN INGRESO debe ser un NÚMERO MAYOR a 1900.',
                    'less_than' => 'El campo GESTIÓN INGRESO debe ser un NÚMERO MENOR a 3000.'
                ]
            ],
            'egreso' => [
                'rules' => 'required|greater_than[1900]|less_than[3000]',
                'errors' => [
                    'required' => 'El campo GESTIÓN EGRESO es obligatorio.',
                    'greater_than' => 'El campo GESTIÓN INGRESO debe ser un NÚMERO MAYOR a 1900.',
                    'less_than' => 'El campo GESTIÓN INGRESO debe ser un NÚMERO MENOR a 3000.'
                ]
            ],
            'titulacion' => [
                'rules' => 'required|greater_than[1900]|less_than[3000]',
                'errors' => [
                    'required' => 'El campo GESTIÓN TITULACIÓN es obligatorio.',
                    'greater_than' => 'El campo GESTIÓN TITULACIÓN debe ser un NÚMERO MAYOR a 1900.',
                    'less_than' => 'El campo GESTIÓN TITULACIÓN debe ser un NÚMERO MENOR a 3000.'
                ]
            ]
        ];
    }

    public function index()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        //$profesional = $this->profesional->where('id_profesional', $this->session->id_profesional)->first();
        // $titulado = $this->mencion->where('id_profesional', $this->session->id_profesional)->orderBy('id', 'ASC')->findAll();
        $cantidadcalificadas = $this->expAcademica->where('id_profesional', $this->session->id_profesional)->countAllResults();
        $cantidad = $this->titula->where('id_profesional', $this->session->id_profesional)->countAllResults();
        $titulado = $this->titula->listar($this->session->id_profesional);

        $data = ['titulo' => 'Menciones', 'datos' => $titulado, 'cantidad' => $cantidad, 'id_prof' => $this->session->id_profesional, 'cantidadcalificadas' => $cantidadcalificadas];

        echo view('menu');
        echo view('titulado/listar', $data);
        echo view('footer');
    }

    public function nuevo($id_prof)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $menciones_actuales = $this->titula->distinct()->select('id_mencion')->where('id_profesional', $id_prof)->findAll();
        $menciones = $this->mencion->findAll();
        $data = ['titulo' => 'Agregar Titulación', 'menciones' => $menciones, 'id_prof' => $id_prof, 'menciones_actuales' => $menciones_actuales];

        echo view('menu');
        echo view('titulado/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

            $this->titula->save([
                'id_profesional' => $this->request->getPost('id_prof'),
                'id_mencion' => $this->request->getPost('mencion'),
                'modalidad' => $this->request->getPost('modalidad'),
                'ingreso' => $this->request->getPost('ingreso'),
                'egreso' => $this->request->getPost('egreso'),
                'titulacion' => $this->request->getPost('titulacion')
            ]);
            return redirect()->to(base_url() . '/CProfesional')->with("adicionar", ["mensaje" => "ok"]);
        } else {
            $id_prof = $this->request->getPost('id_prof');
            $menciones_actuales = $this->titula->distinct()->select('id_mencion')->where('id_profesional', $id_prof)->findAll();
            $menciones = $this->mencion->findAll();
            $data = ['titulo' => 'Agregar Titulación', 'validation' => $this->validator, 'menciones_actuales' => $menciones_actuales, 'menciones' => $menciones, 'id_prof' => $id_prof];
            echo view('menu');
            echo view('titulado/nuevo', $data);
            echo view('footer');
        }
    }

    public function nuevoProfesional()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $menciones_actuales = $this->titula->distinct()->select('id_mencion')->where('id_profesional', $this->session->id_profesional)->findAll();
        $menciones = $this->mencion->findAll();
        $data = ['titulo' => 'Agregar Titulación', 'menciones' => $menciones, 'id_prof' => $this->session->id_profesional, 'menciones_actuales' => $menciones_actuales];

        echo view('menu');
        echo view('titulado/nuevoProfesional', $data);
        echo view('footer');
    }

    public function insertarProfesional()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

            $this->titula->save([
                'id_profesional' => $this->session->id_profesional,
                'id_mencion' => $this->request->getPost('mencion'),
                'modalidad' => $this->request->getPost('modalidad'),
                'ingreso' => $this->request->getPost('ingreso'),
                'egreso' => $this->request->getPost('egreso'),
                'titulacion' => $this->request->getPost('titulacion')
            ]);
            return redirect()->to(base_url() . '/CTitulado')->with("adicionar", ["mensaje" => "ok"]);
        } else {
            $menciones_actuales = $this->titula->distinct()->select('id_mencion')->where('id_profesional', $this->session->id_profesional)->findAll();
            $menciones = $this->mencion->findAll();
            $data = ['titulo' => 'Agregar Titulación', 'validation' => $this->validator, 'menciones_actuales' => $menciones_actuales, 'menciones' => $menciones, 'id_prof' => $this->session->id_profesional];
            echo view('menu');
            echo view('titulado/nuevoProfesional', $data);
            echo view('footer');
        }
    }

    public function editar($id, $id_prof)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $menciones_actuales = $this->titula->distinct()->select('id_mencion')->where('id_profesional', $id_prof)->findAll();
        $menciones = $this->mencion->findAll();
        $titulado = $this->titula->where('id', $id)->first();
        $data = ['titulo' => 'Editar Titulación', 'datos' => $titulado, 'menciones' => $menciones, 'menciones_actuales' => $menciones_actuales];
        echo view('menu');
        echo view('titulado/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $id = $this->request->getPost('id');
        $titulado = $this->titula->where('id', $id)->first();
        $this->reglas1 =  [
            'modalidad' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione una MODALIDAD.'
                ]
            ],
            'ingreso' => [
                'rules' => 'required|greater_than[1900]|less_than[3000]',
                'errors' => [
                    'required' => 'El campo GESTIÓN INGRESO es obligatorio.',
                    'greater_than' => 'El campo GESTIÓN INGRESO debe ser un NÚMERO MAYOR a 1900.',
                    'less_than' => 'El campo GESTIÓN INGRESO debe ser un NÚMERO MENOR a 3000.'
                ]
            ],
            'egreso' => [
                'rules' => 'required|greater_than[1900]|less_than[3000]',
                'errors' => [
                    'required' => 'El campo GESTIÓN EGRESO es obligatorio.',
                    'greater_than' => 'El campo GESTIÓN INGRESO debe ser un NÚMERO MAYOR a 1900.',
                    'less_than' => 'El campo GESTIÓN INGRESO debe ser un NÚMERO MENOR a 3000.'
                ]
            ],
            'titulacion' => [
                'rules' => 'required|greater_than[1900]|less_than[3000]',
                'errors' => [
                    'required' => 'El campo GESTIÓN TITULACIÓN es obligatorio.',
                    'greater_than' => 'El campo GESTIÓN TITULACIÓN debe ser un NÚMERO MAYOR a 1900.',
                    'less_than' => 'El campo GESTIÓN TITULACIÓN debe ser un NÚMERO MENOR a 3000.'
                ]
            ]
        ];
        if ($this->request->getMethod() == "post"  && $this->validate($this->reglas1)) {
            $this->titula->update($this->request->getPost('id'), [
                'modalidad' => $this->request->getPost('modalidad'),
                'ingreso' => $this->request->getPost('ingreso'),
                'egreso' => $this->request->getPost('egreso'),
                'titulacion' => $this->request->getPost('titulacion')
            ]);
            return redirect()->to(base_url() . '/CProfesional')->with("editar", ["mensaje" => "ok"]);
        } else {
            $menciones = $this->mencion->findAll();
            $data = ['titulo' => 'Editar Titulación', 'validation' => $this->validator, 'datos' => $titulado, 'menciones' => $menciones];
            echo view('menu');
            echo view('titulado/editar', $data);
            echo view('footer');
        }
    }

    /*  public function eliminar_definivamente($id, $id_mencion,$id_prof)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $id_calificacion = $this->expAcademica->where('id_profesional', $id_prof)->where('id_mencion',$id_mencion)->first();
        $this->expAcademica->delete($id_calificacion['id'], 'id');
        $this->titula->delete($id, 'id');
        return redirect()->to(base_url() . '/cprofesional')->with("eliminar_def", ["mensaje" => "ok"]);
    } */

    public function eliminar_definivamente($id, $id_mencion, $id_prof)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        // Busca el registro en expAcademica
        $id_calificacion = $this->expAcademica->where('id_profesional', $id_prof)->where('id_mencion', $id_mencion)->first();

        // Verifica si $id_calificacion existe antes de intentar eliminarlo
        if ($id_calificacion) {
            $this->expAcademica->delete($id_calificacion['id'], 'id');
        }

        // Elimina el registro en la tabla titula sin verificar si existe
        $this->titula->delete($id, 'id');

        return redirect()->to(base_url() . '/cprofesional')->with("eliminar_def", ["mensaje" => "ok"]);
    }
}
