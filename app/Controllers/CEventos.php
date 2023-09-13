<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MEvento;

class CEventos extends BaseController
{
    protected $evento, $reglasCambia, $reglas, $session;

    public function __construct()
    {
        $this->evento = new MEvento();
        $this->session = session();
        helper(['form']);
        $this->reglas =  [
            'tipo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione un TIPO.'
                ]
            ],
            'modalidad' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione al menos una MODALIDAD opción.'
                ]
            ],
            'tema' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo TEMA es obligatorio.'
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
            'inicio' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo FECHA INICIO es obligatorio.'
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
        $titulado = $this->evento->where('id_profesional', $this->session->id_profesional)->orderBy('id', 'DESC')->findAll();
        $data = ['titulo' => 'Eventos Asistidos', 'datos' => $titulado];

        echo view('menu');
        echo view('eventos/listar', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $data = ['titulo' => 'Agregar Evento'];
        echo view('menu');
        echo view('eventos/nuevo', $data);
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

            $this->evento->save([
                'id_profesional' => $this->session->id_profesional,
                'tema' => $this->request->getPost('tema'),
                'modalidad' => implode(',', $this->request->getPost('modalidad')),
                'institucion' => $this->request->getPost('institucion'),
                'ciudad' => $this->request->getPost('ciudad'),
                'pais' => $this->request->getPost('pais'),
                'inicio' => $this->request->getPost('inicio'),
                'fin' => $this->request->getPost('fin'),
                'tipo' => $this->request->getPost('tipo'),
            ]);
            return redirect()->to(base_url() . '/CEventos')->with("adicionar", ["mensaje" => "ok"]);
        } else {
            $data = ['titulo' => 'Agregar Evento', 'validation' => $this->validator];
            echo view('menu');
            echo view('eventos/nuevo', $data);
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
        $docente = $this->evento->where('id', $decode)->first();
        $data = ['titulo' => 'Editar Evento', 'datos' => $docente];
        echo view('menu');
        echo view('eventos/editar', $data);
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
        $docente = $this->evento->where('id', $id)->first();
        if ($this->request->getMethod() == "post"  && $this->validate($this->reglas)) {
            $this->evento->update($this->request->getPost('id'), [
                'tema' => $this->request->getPost('tema'),
                'modalidad' => implode(',', $this->request->getPost('modalidad')),
                'institucion' => $this->request->getPost('institucion'),
                'ciudad' => $this->request->getPost('ciudad'),
                'pais' => $this->request->getPost('pais'),
                'inicio' => $this->request->getPost('inicio'),
                'fin' => $this->request->getPost('fin'),
                'tipo' => $this->request->getPost('tipo')
            ]);
            return redirect()->to(base_url() . '/CEventos')->with("editar", ["mensaje" => "ok"]);
        } else {
            $data = ['titulo' => 'Editar Evento', 'validation' => $this->validator, 'datos' => $docente];
            echo view('menu');
            echo view('eventos/editar', $data);
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
        $this->evento->delete($id, 'id');
        return redirect()->to(base_url() . '/CEventos')->with("eliminar_def", ["mensaje" => "ok"]);
    }
}
