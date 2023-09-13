<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MFormAcademica;

class CFormAcademica extends BaseController
{
    protected $formAcademica, $reglasCambia, $reglas, $session;

    public function __construct()
    {
        $this->formAcademica = new MFormAcademica();
        $this->session = session();
        helper(['form']);
        $this->reglas =  [
            'tipo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo TIPO es obligatorio.'
                ]
            ],
            'titulo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo TÍTULO es obligatorio.'
                ]
            ],
            'institucion_academica' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo INSTITUCIÓN ACADÉMICA es obligatorio.'
                ]
            ],
            'gestion_titulacion' => [
                'rules' => 'required|greater_than[1900]|less_than[3000]',
                'errors' => [
                    'required' => 'El campo GESTIÓN CONCLUSIÓN es obligatorio.',
                    'greater_than' => 'El campo GESTIÓN CONCLUSIÓN debe ser un NÚMERO MAYOR a 1900.',
                    'less_than' => 'El campo GESTIÓN CONCLUSIÓN debe ser un NÚMERO MENOR a 3000.'
                ]
            ],
            'ciudad' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo CIUDAD es obligatorio.'
                ]
            ],
            'pais' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo PAÍS es obligatorio.'
                ]
            ],
        ];
    }

    public function index()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $docente = $this->formAcademica->where('id_profesional', $this->session->id_profesional)->orderBy('id', 'DESC')->findAll();
        $data = ['titulo' => 'Formación Académica', 'datos' => $docente];

        echo view('menu');
        echo view('formAcademica/listar', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $data = ['titulo' => 'Agregar Formación Académica'];
        echo view('menu');
        echo view('formAcademica/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        if ($this->request->getMethod() == "post"  && $this->validate($this->reglas)) {

            $this->formAcademica->save([
                'id_profesional' => $this->session->id_profesional,
                'tipo' => $this->request->getPost('tipo'),
                'titulo' => $this->request->getPost('titulo'),
                'institucion_academica' => $this->request->getPost('institucion_academica'),
                'ciudad' => $this->request->getPost('ciudad'),
                'pais' => $this->request->getPost('pais'),
                'gestion_titulacion' => $this->request->getPost('gestion_titulacion')
            ]);
            return redirect()->to(base_url() . '/CFormAcademica')->with("adicionar", ["mensaje" => "ok"]);
        } else {
            $data = ['titulo' => 'Agregar Formación Académica', 'validation' => $this->validator];
            echo view('menu');
            echo view('formAcademica/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $decode = base64_decode($id);
        $docente = $this->formAcademica->where('id', $decode)->first();
        $data = ['titulo' => 'Editar Formación Académica', 'datos' => $docente];
        echo view('menu');
        echo view('formAcademica/editar', $data);
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
        $docente = $this->formAcademica->where('id', $id)->first();
        if ($this->request->getMethod() == "post"  && $this->validate($this->reglas)) {
            $this->formAcademica->update($this->request->getPost('id'), [
                'tipo' => $this->request->getPost('tipo'),
                'titulo' => $this->request->getPost('titulo'),
                'institucion_academica' => $this->request->getPost('institucion_academica'),
                'ciudad' => $this->request->getPost('ciudad'),
                'pais' => $this->request->getPost('pais'),
                'gestion_titulacion' => $this->request->getPost('gestion_titulacion')
            ]);
            return redirect()->to(base_url() . '/CFormAcademica')->with("editar", ["mensaje" => "ok"]);
        } else {
            $data = ['titulo' => 'Editar Formación Académica', 'validation' => $this->validator, 'datos' => $docente];
            echo view('menu');
            echo view('formAcademica/editar', $data);
            echo view('footer');
        }
    }

    public function eliminar_definivamente($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $this->formAcademica->delete($id, 'id');
        return redirect()->to(base_url() . '/CFormAcademica')->with("eliminar_def", ["mensaje" => "ok"]);
    }
}
