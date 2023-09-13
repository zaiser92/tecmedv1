<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MExpLaboral;

class CExpLaboral extends BaseController
{
    protected $expLaboral, $reglasCambia, $reglas, $session;

    public function __construct()
    {
        $this->expLaboral = new MExpLaboral();
        $this->session = session();
        helper(['form']);
        $this->reglas =  [
            'desde' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo FECHA INICIO TRABAJO es obligatorio.'
                ]
            ],
            'hasta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo FECHA FIN TRABAJO es obligatorio.'
                ]
            ],
            'empresa_institucion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo Nombre INSTITUCIÓN/EMPRESA es obligatorio.'
                ]
            ],
            'cargo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo CARGO OCUPADO es obligatorio.'
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
            'actividades' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo ACTIVIDADES REALIZADAS es obligatorio.'
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
        $titulado = $this->expLaboral->where('id_profesional', $this->session->id_profesional)->orderBy('id', 'DESC')->findAll();
        $data = ['titulo' => 'Experiencia Laboral', 'datos' => $titulado];

        echo view('menu');
        echo view('expLaboral/listar', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $data = ['titulo' => 'Agregar Experiencia Laboral'];
        echo view('menu');
        echo view('expLaboral/nuevo', $data);
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

            $this->expLaboral->save([
                'id_profesional' => $this->session->id_profesional,
                'empresa_institucion' => $this->request->getPost('empresa_institucion'),
                'cargo' => $this->request->getPost('cargo'),
                'actividades' => $this->request->getPost('actividades'),
                'ciudad' => $this->request->getPost('ciudad'),
                'pais' => $this->request->getPost('pais'),
                'desde' => $this->request->getPost('desde'),
                'hasta' => $this->request->getPost('hasta')
            ]);
            return redirect()->to(base_url() . '/CExpLaboral')->with("adicionar", ["mensaje" => "ok"]);
        } else {
            $data = ['titulo' => 'Agregar Experiencia Laboral', 'validation' => $this->validator];
            echo view('menu');
            echo view('expLaboral/nuevo', $data);
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
        $docente = $this->expLaboral->where('id', $decode)->first();
        $data = ['titulo' => 'Editar Experiencia Laboral', 'datos' => $docente];
        echo view('menu');
        echo view('expLaboral/editar', $data);
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
        $docente = $this->expLaboral->where('id', $id)->first();
        if ($this->request->getMethod() == "post"  && $this->validate($this->reglas)) {
            $this->expLaboral->update($this->request->getPost('id'), [
                'empresa_institucion' => $this->request->getPost('empresa_institucion'),
                'cargo' => $this->request->getPost('cargo'),
                'actividades' => $this->request->getPost('actividades'),
                'ciudad' => $this->request->getPost('ciudad'),
                'pais' => $this->request->getPost('pais'),
                'desde' => $this->request->getPost('desde'),
                'hasta' => $this->request->getPost('hasta')
            ]);
            return redirect()->to(base_url() . '/CExpLaboral')->with("editar", ["mensaje" => "ok"]);
        } else {
            $data = ['titulo' => 'Editar Experiencia Laboral', 'validation' => $this->validator,'datos' => $docente];
            echo view('menu');
            echo view('expLaboral/editar', $data);
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
        $this->expLaboral->delete($id, 'id');
        return redirect()->to(base_url() . '/CExpLaboral')->with("eliminar_def", ["mensaje" => "ok"]);
    }
}
