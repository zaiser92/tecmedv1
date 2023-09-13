<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MPremio;

class CPremios extends BaseController
{
    protected $premio, $reglasCambia, $reglas, $session;

    public function __construct()
    {
        $this->premio = new MPremio();
        $this->session = session();
        helper(['form']);
        $this->reglas =  [
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo PREMIO/DISTINCIÓN es obligatorio.'
                ]
            ],
            'institucion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo INSTITUCIÓN es obligatorio.'
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
            'fecha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo FECHA es obligatorio.'
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
        $titulado = $this->premio->where('id_profesional', $this->session->id_profesional)->orderBy('id', 'DESC')->findAll();
        $data = ['titulo' => 'Premios y Distinciones', 'datos' => $titulado];

        echo view('menu');
        echo view('premios/listar', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $data = ['titulo' => 'Agregar Premio/Distinción'];
        echo view('menu');
        echo view('premios/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        if ($this->request->getMethod() == "post"&& $this->validate($this->reglas)) {

            $this->premio->save([
                'id_profesional' => $this->session->id_profesional,
                'nombre' => $this->request->getPost('nombre'),
                'institucion' => $this->request->getPost('institucion'),
                'ciudad' => $this->request->getPost('ciudad'),
                'pais' => $this->request->getPost('pais'),
                'fecha' => $this->request->getPost('fecha')
            ]);
            return redirect()->to(base_url() . '/CPremios')->with("adicionar", ["mensaje" => "ok"]);
        } else {
            $data = ['titulo' => 'Agregar Premio/Distinción', 'validation' => $this->validator];
            echo view('menu');
            echo view('premios/nuevo', $data);
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
        $docente = $this->premio->where('id', $decode)->first();
        $data = ['titulo' => 'Editar Premio/Distinción', 'datos' => $docente];
        echo view('menu');
        echo view('premios/editar', $data);
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
        $docente = $this->premio->where('id', $id)->first();
        if ($this->request->getMethod() == "post"  && $this->validate($this->reglas)) {
            $this->premio->update($this->request->getPost('id'), [
                'id_profesional' => $this->session->id_profesional,
                'nombre' => $this->request->getPost('nombre'),
                'institucion' => $this->request->getPost('institucion'),
                'ciudad' => $this->request->getPost('ciudad'),
                'pais' => $this->request->getPost('pais'),
                'fecha' => $this->request->getPost('fecha')
            ]);
            return redirect()->to(base_url() . '/CPremios')->with("editar", ["mensaje" => "ok"]);
        } else {
            $data = ['titulo' => 'Editar Premio/Distinción', 'validation' => $this->validator, 'datos' => $docente];
            echo view('menu');
            echo view('premios/editar', $data);
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
        $this->premio->delete($id, 'id');
        return redirect()->to(base_url() . '/CPremios')->with("eliminar_def", ["mensaje" => "ok"]);
    }
}
