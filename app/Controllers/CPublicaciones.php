<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MPublicacion;

class CPublicaciones extends BaseController
{
    protected $publicacion, $reglasCambia, $reglas, $session;

    public function __construct()
    {
        $this->publicacion = new MPublicacion();
        $this->session = session();
        helper(['form']);
        $this->reglas =  [
            'tipo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione un TIPO.'
                ]
            ],
            'colaboracion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione al menos una opción de COLABORACION.'
                ]
            ],
            'titulo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo TITULO PUBLICACION es obligatorio.'
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
            'anio_publicacion' => [
                'rules' => 'required|greater_than[1900]|less_than[3000]',
                'errors' => [
                    'required' => 'El campo AÑO PUBLICACIÓN es obligatorio.',
                    'greater_than' => 'El campo AÑO PUBLICACIÓN debe ser un NÚMERO MAYOR a 1900.',
                    'less_than' => 'El campo AÑO PUBLICACIÓN debe ser un NÚMERO MENOR a 3000.'
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
        $titulado = $this->publicacion->where('id_profesional', $this->session->id_profesional)->orderBy('id', 'DESC')->findAll();
        $data = ['titulo' => 'Publicaciones Realizadas', 'datos' => $titulado];

        echo view('menu');
        echo view('publicaciones/listar', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $data = ['titulo' => 'Agregar Publicación'];
        echo view('menu');
        echo view('publicaciones/nuevo', $data);
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

            $this->publicacion->save([
                'id_profesional' => $this->session->id_profesional,
                'titulo' => $this->request->getPost('titulo'),
                'colaboracion' => implode(',', $this->request->getPost('colaboracion')),
                'tipo' => $this->request->getPost('tipo'),
                'ciudad' => $this->request->getPost('ciudad'),
                'pais' => $this->request->getPost('pais'),
                'anio_publicacion' => $this->request->getPost('anio_publicacion'),
                'nombre_revista' => $this->request->getPost('nombre_revista')
            ]);
            return redirect()->to(base_url() . '/CPublicaciones')->with("adicionar", ["mensaje" => "ok"]);
        } else {
            $data = ['titulo' => 'Agregar Publicación', 'validation' => $this->validator];
            echo view('menu');
            echo view('publicaciones/nuevo', $data);
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
        $docente = $this->publicacion->where('id', $decode)->first();
        $data = ['titulo' => 'Editar Publicación', 'datos' => $docente];
        echo view('menu');
        echo view('publicaciones/editar', $data);
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
        $docente = $this->publicacion->where('id', $id)->first();
        if ($this->request->getMethod() == "post"  && $this->validate($this->reglas)) {
            $this->publicacion->update($this->request->getPost('id'), [
                'titulo' => $this->request->getPost('titulo'),
                'colaboracion' => implode(',', $this->request->getPost('colaboracion')),
                'tipo' => $this->request->getPost('tipo'),
                'ciudad' => $this->request->getPost('ciudad'),
                'pais' => $this->request->getPost('pais'),
                'anio_publicacion' => $this->request->getPost('anio_publicacion'),
                'nombre_revista' => $this->request->getPost('nombre_revista')
            ]);
            return redirect()->to(base_url() . '/CPublicaciones')->with("editar", ["mensaje" => "ok"]);
        } else {
            $data = ['titulo' => 'Editar Publicación', 'validation' => $this->validator, 'datos' => $docente];
            echo view('menu');
            echo view('publicaciones/editar', $data);
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
        $this->publicacion->delete($id, 'id');
        return redirect()->to(base_url() . '/CPublicaciones')->with("eliminar_def", ["mensaje" => "ok"]);
    }
}
