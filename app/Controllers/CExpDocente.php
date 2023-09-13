<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MExpDocente;

class CExpDocente extends BaseController
{
    protected $expDocente, $reglasCambia, $reglas, $session;

    public function __construct()
    {
        $this->expDocente = new MExpDocente();
        $this->session = session();
        helper(['form']);
        $this->reglas =  [
            'materia' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo MATERIA es obligatorio.'
                ]
            ],
            'universidad' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo UNIVERSIDAD es obligatorio.'
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
            'desde' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo DESDE es obligatorio.'
                ]
            ],
            'hasta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo HASTA es obligatorio.'
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
        $docente = $this->expDocente->where('id_profesional', $this->session->id_profesional)->orderBy('id', 'DESC')->findAll();
        $data = ['titulo' => 'Experiencia Docente', 'datos' => $docente];

        echo view('menu');
        echo view('expDocente/listar', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $data = ['titulo' => 'Agregar Experiencia Docente'];
        echo view('menu');
        echo view('expDocente/nuevo', $data);
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

            $this->expDocente->save([
                'id_profesional' => $this->session->id_profesional,
                'materia' => $this->request->getPost('materia'),
                'universidad' => $this->request->getPost('universidad'),
                'ciudad' => $this->request->getPost('ciudad'),
                'pais' => $this->request->getPost('pais'),
                'desde' => $this->request->getPost('desde'),
                'hasta' => $this->request->getPost('hasta')
            ]);
            return redirect()->to(base_url() . '/CExpDocente')->with("adicionar", ["mensaje" => "ok"]);
        } else {
            $data = ['titulo' => 'Agregar Experiencia Docente', 'validation' => $this->validator];
            echo view('menu');
            echo view('expDocente/nuevo', $data);
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
        $docente = $this->expDocente->where('id', $decode)->first();
        $data = ['titulo' => 'Editar Experiencia Docente', 'datos' => $docente];
        echo view('menu');
        echo view('expDocente/editar', $data);
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
        $docente = $this->expDocente->where('id', $id)->first();
        if ($this->request->getMethod() == "post"  && $this->validate($this->reglas)) {
            $this->expDocente->update($this->request->getPost('id'), [
                'materia' => $this->request->getPost('materia'),
                'universidad' => $this->request->getPost('universidad'),
                'ciudad' => $this->request->getPost('ciudad'),
                'pais' => $this->request->getPost('pais'),
                'desde' => $this->request->getPost('desde'),
                'hasta' => $this->request->getPost('hasta')
            ]);
            return redirect()->to(base_url() . '/CExpDocente')->with("editar", ["mensaje" => "ok"]);
        } else {
            $data = ['titulo' => 'Editar Experiencia Docente', 'validation' => $this->validator, 'datos' => $docente];
            echo view('menu');
            echo view('expDocente/editar', $data);
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
        $this->expDocente->delete($id, 'id');
        return redirect()->to(base_url() . '/CExpDocente')->with("eliminar_def", ["mensaje" => "ok"]);
    }
}
