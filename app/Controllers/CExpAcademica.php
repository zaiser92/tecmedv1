<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MExpAcademica;
use App\Models\MMencion;
use App\Models\MProfesional;
use App\Models\MTitula;

class CExpAcademica extends BaseController
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
            'prep_academica' => [
                'rules' => 'required|greater_than[0]|less_than[6]',
                'errors' => [
                    'required' => 'La Calificación al campo PREPARACION ACADEMICA es obligatorio.',
                    'greater_than' => 'La Calificación al campo PREPARACION ACADEMICA debe ser un NÚMERO MAYOR a 1.',
                    'less_than' => 'La Calificación al campo PREPARACION ACADEMICA debe ser un NÚMERO MENOR a 5.'
                ]
            ],
            'plan_estudios' => [
                'rules' => 'required|greater_than[0]|less_than[6]',
                'errors' => [
                    'required' => 'La Calificación al campo PLAN DE ESTUDIOS es obligatorio.',
                    'greater_than' => 'La Calificación al campo PLAN DE ESTUDIOS debe ser un NÚMERO MAYOR a 1.',
                    'less_than' => 'La Calificación al campo PLAN DE ESTUDIOS debe ser un NÚMERO MENOR a 5.'
                ]
            ],
            'asignaturas' => [
                'rules' => 'required|greater_than[0]|less_than[6]',
                'errors' => [
                    'required' => 'La Calificación al campo ASIGNATURAS es obligatorio.',
                    'greater_than' => 'La Calificación al campo ASIGNATURAS debe ser un NÚMERO MAYOR a 1.',
                    'less_than' => 'La Calificación al campo ASIGNATURAS debe ser un NÚMERO MENOR a 5.'
                ]
            ],
            'equipamento' => [
                'rules' => 'required|greater_than[0]|less_than[6]',
                'errors' => [
                    'required' => 'La Calificación al campo EQUIPAMENTO es obligatorio.',
                    'greater_than' => 'La Calificación al campo EQUIPAMENTO debe ser un NÚMERO MAYOR a 1.',
                    'less_than' => 'La Calificación al campo EQUIPAMENTO debe ser un NÚMERO MENOR a 5.'
                ]
            ],
            'infraestructura' => [
                'rules' => 'required|greater_than[0]|less_than[6]',
                'errors' => [
                    'required' => 'La Calificación al campo INFRAESTRUCTURA es obligatorio.',
                    'greater_than' => 'La Calificación al campo INFRAESTRUCTURA debe ser un NÚMERO MAYOR a 1.',
                    'less_than' => 'La Calificación al campo INFRAESTRUCTURA debe ser un NÚMERO MENOR a 5.'
                ]
            ],
            'biblioteca' => [
                'rules' => 'required|greater_than[0]|less_than[6]',
                'errors' => [
                    'required' => 'La Calificación al campo BIBLIOTECA es obligatorio.',
                    'greater_than' => 'La Calificación al campo BIBLIOTECA debe ser un NÚMERO MAYOR a 1.',
                    'less_than' => 'La Calificación al campo BIBLIOTECA debe ser un NÚMERO MENOR a 5.'
                ]
            ],
            'tutoria_docente' => [
                'rules' => 'required|greater_than[0]|less_than[6]',
                'errors' => [
                    'required' => 'La Calificación al campo ENSEÑANZA DOCENTE es obligatorio.',
                    'greater_than' => 'La Calificación al campo ENSEÑANZA DOCENTE debe ser un NÚMERO MAYOR a 1.',
                    'less_than' => 'La Calificación al campo ENSEÑANZA DOCENTE debe ser un NÚMERO MENOR a 5.'
                ]
            ],
            'actividades_academicas' => [
                'rules' => 'required|greater_than[0]|less_than[6]',
                'errors' => [
                    'required' => 'La Calificación al campo ACTIVIDADES ACADÉMICAS es obligatorio.',
                    'greater_than' => 'La Calificación al campo ACTIVIDADES ACADÉMICAS debe ser un NÚMERO MAYOR a 1.',
                    'less_than' => 'La Calificación al campo ACTIVIDADES ACADÉMICAS debe ser un NÚMERO MENOR a 5.'
                ]
            ],
            'actividades_extracurriculares' => [
                'rules' => 'required|greater_than[0]|less_than[6]',
                'errors' => [
                    'required' => 'La Calificación al campo ACTIVIDADES EXTRACURRICULARES es obligatorio.',
                    'greater_than' => 'La Calificación al campo ACTIVIDADES EXTRACURRICULARES debe ser un NÚMERO MAYOR a 1.',
                    'less_than' => 'La Calificación al campo ACTIVIDADES EXTRACURRICULARES debe ser un NÚMERO MENOR a 5.'
                ]
            ],
            'sociedad_cientifica' => [
                'rules' => 'required|greater_than[0]|less_than[6]',
                'errors' => [
                    'required' => 'La Calificación al campo SOCIEDAD CIENTÍFICA es obligatorio.',
                    'greater_than' => 'La Calificación al campo SOCIEDAD CIENTÍFICA debe ser un NÚMERO MAYOR a 1.',
                    'less_than' => 'La Calificación al campo SOCIEDAD CIENTÍFICA debe ser un NÚMERO MENOR a 5.'
                ]
            ],
            'internado_rotatorio' => [
                'rules' => 'required|greater_than[0]|less_than[6]',
                'errors' => [
                    'required' => 'La Calificación al campo INTERNADO ROTATORIO es obligatorio.',
                    'greater_than' => 'La Calificación al campo INTERNADO ROTATORIO debe ser un NÚMERO MAYOR a 1.',
                    'less_than' => 'La Calificación al campo INTERNADO ROTATORIO debe ser un NÚMERO MENOR a 5.'
                ]
            ],
            'perfil_profesional' => [
                'rules' => 'required|greater_than[0]|less_than[6]',
                'errors' => [
                    'required' => 'La Calificación al campo PERFIL PROFESIONAL es obligatorio.',
                    'greater_than' => 'La Calificación al campo PERFIL PROFESIONAL debe ser un NÚMERO MAYOR a 1.',
                    'less_than' => 'La Calificación al campo PERFIL PROFESIONAL debe ser un NÚMERO MENOR a 5.'
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

        $titulado = $this->titula->listar($this->session->id_profesional);
        $data = ['titulo' => 'Menciones', 'datos' => $titulado, 'id_prof' => $this->session->id_profesional];

        echo view('menu');
        echo view('titulado/listar', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $menciones_actuales = $this->titula->listar($this->session->id_profesional);
        $menciones_calificadas = $this->expAcademica->where('id_profesional', $this->session->id_profesional)->findAll();
        $data = ['titulo' => 'Calificar Mención', 'id_prof' => $this->session->id_profesional, 'menciones_actuales' => $menciones_actuales, 'menciones_calificadas' => $menciones_calificadas];

        echo view('menu');
        echo view('expAcademica/nuevo', $data);
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

            $this->expAcademica->save([
                'id_profesional' => $this->session->id_profesional,
                'id_mencion' => $this->request->getPost('mencion'),
                'prep_academica' => $this->request->getPost('prep_academica'),
                'plan_estudios' => $this->request->getPost('plan_estudios'),
                'asignaturas' => $this->request->getPost('asignaturas'),
                'equipamento' => $this->request->getPost('equipamento'),
                'infraestructura' => $this->request->getPost('infraestructura'),
                'biblioteca' => $this->request->getPost('biblioteca'),
                'tutoria_docente' => $this->request->getPost('tutoria_docente'),
                'actividades_academicas' => $this->request->getPost('actividades_academicas'),
                'actividades_extracurriculares' => $this->request->getPost('actividades_extracurriculares'),
                'sociedad_cientifica' => $this->request->getPost('sociedad_cientifica'),
                'internado_rotatorio' => $this->request->getPost('internado_rotatorio'),
                'perfil_profesional' => $this->request->getPost('perfil_profesional')
            ]);
            return redirect()->to(base_url() . '/CTitulado')->with("adicionar", ["mensaje" => "ok"]);
        } else {
            $menciones_calificadas = $this->expAcademica->where('id_profesional', $this->session->id_profesional)->findAll();
            $menciones_actuales = $this->titula->listar($this->session->id_profesional);
            $data = ['titulo' => 'Agregar Titulación', 'validation' => $this->validator, 'id_prof' => $this->session->id_profesional, 'menciones_actuales' => $menciones_actuales, 'menciones_calificadas' => $menciones_calificadas];
            echo view('menu');
            echo view('expAcademica/nuevo', $data);
            echo view('footer');
        }
    }

    public function calificacion()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $menciones_actuales = $this->expAcademica->listar($this->session->id_profesional);
        $data = ['titulo' => 'Calificaciones', 'datos' => $menciones_actuales];
        echo view('menu');
        echo view('expAcademica/calificado', $data);
        echo view('footer');
    }
}
