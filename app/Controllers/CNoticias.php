<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MMencion;
use App\Models\MNnoticias;
use App\Models\MTitula;

class CNoticias extends BaseController
{
    protected $noticia, $reglasCambia, $reglas, $reglas1, $session, $mencion, $titulado;

    public function __construct()
    {
        $this->noticia = new MNnoticias();
        $this->mencion = new MMencion();
        $this->titulado = new MTitula();
        $this->session = session();
        helper(['form']);
        $this->reglas =  [
            'codigo' => [
                'rules' => 'required|is_unique[noticias.codigo]',
                'errors' => [
                    'required' => 'El campo CÓDIGO es obligatorio.',
                    'is_unique' => 'El campo CÓDIGO coincide con uno anterior.'
                ]
            ],
            'mencion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione una MENCIÓN.'
                ]
            ],
            'titulo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo TÍTULO es obligatorio.'
                ]
            ],
            'referencia' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo REFERENCIA es obligatorio.'
                ]
            ],
            'archivo' => [
                'rules' => 'uploaded[archivo]',
                'errors' => [
                    'uploaded' => 'El campo ARCHIVO PDF es obligatorio.'
                ]
            ]
        ];
    }

    public function index($activo = 1)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $noticia = $this->noticia->listarActivos($activo);
        $data = ['titulo' => 'Noticias y Comunicados', 'datos' => $noticia];

        echo view('menu');
        echo view('noticias/noticias', $data);
        echo view('footer');
    }

    public function vistaProfesionales($activo = 1)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $menciones = $this->titulado->listarMencionesProfesionales($this->session->id_profesional);
        //array_push($menciones, $this->session->mencion, 'Publico General');
        //$noticia = $this->noticia->where('estado', $activo)->whereIn('mencion', $menciones)->orderBy('id', 'DESC')->findAll();

        $noticia = $this->noticia->listaProfesionales($menciones, $activo);
        $data = ['titulo' => 'Noticias y Comunicados', 'datos' => $noticia];
        //echo var_dump($menciones);
        echo view('menu');
        echo view('noticias/vistaProfesionales', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $menciones = $this->mencion->findAll();
        $data = ['titulo' => 'Agregar Noticia/Comunicado', 'menciones' => $menciones];
        echo view('menu');
        echo view('noticias/nuevo', $data);
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

            $doc = $_FILES["archivo"];
            $nomdoc = $this->request->getPost('codigo') . ".pdf";
            $archDoc = $doc["tmp_name"];
            move_uploaded_file($archDoc, "./assets/dist/noticias/" . $nomdoc);

            $this->noticia->save([
                'id_administrador' => $this->session->id_administrador,
                'codigo' => $this->request->getPost('codigo'),
                'titulo' => $this->request->getPost('titulo'),
                'referencia' => $this->request->getPost('referencia'),
                'id_mencion' => $this->request->getPost('mencion'),
                'archivo' => $nomdoc
            ]);
            return redirect()->to(base_url() . '/CNoticias')->with("adicionar", ["mensaje" => "ok"]);
        } else {
            $menciones = $this->mencion->findAll();
            $data = ['titulo' => 'Agregar Noticia/Comunicado', 'validation' => $this->validator, 'menciones' => $menciones];
            echo view('menu');
            echo view('noticias/nuevo', $data);
            echo view('footer');
        }
    }

    function visualizar($id_doc)
    {
        $data['id_doc'] = $id_doc;
        echo view('menu');
        echo view('noticias/documento', $data);
        echo view('footer');
    }

    public function editar($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $menciones = $this->mencion->findAll();
        $noticia = $this->noticia->where('id', $id)->first();
        $data = ['titulo' => 'Editar Noticia/Comunicado', 'datos' => $noticia, 'menciones' => $menciones];
        echo view('menu');
        echo view('noticias/editar', $data);
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
        $this->reglas1 =  [
            'mencion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione una MENCIÓN.'
                ]
            ],
            'titulo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo TÍTULO es obligatorio.'
                ]
            ],
            'referencia' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo REFERENCIA es obligatorio.'
                ]
            ]
        ];
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas1)) {
            $doc = $_FILES["archivo"];
            if ($doc["name"] == "") {
                $nomdoc = $_POST["archAct"];
            } else {
                $nomdoc = $_POST["archAct"];
                if ($nomdoc == null) {
                    $nomdoc = $this->request->getPost('cod') . ".pdf";
                    $archDoc = $doc["tmp_name"];
                    move_uploaded_file($archDoc, "./assets/dist/noticias/" . $nomdoc);
                } else {
                    $ruta_logo = "./assets/dist/noticias/" . $nomdoc;

                    if (file_exists($ruta_logo)) {
                        unlink($ruta_logo);
                    }
                    $nomdoc = $this->request->getPost('cod') . ".pdf";
                    $archDoc = $doc["tmp_name"];
                    move_uploaded_file($archDoc, "./assets/dist/noticias/" . $nomdoc);
                }
            }

            $this->noticia->update($this->request->getPost('id'), [
                'titulo' => $this->request->getPost('titulo'),
                'referencia' => $this->request->getPost('referencia'),
                'id_mencion' => $this->request->getPost('mencion'),
                'archivo' => $nomdoc
            ]);
            return redirect()->to(base_url() . '/CNoticias')->with("editar", ["mensaje" => "ok"]);
        } else {
            $menciones = $this->mencion->findAll();
            $noticia = $this->noticia->where('id', $id)->first();
            $data = ['titulo' => 'Editar Noticia/Comunicado', 'validation' => $this->validator, 'datos' => $noticia, 'menciones' => $menciones];
            echo view('menu');
            echo view('noticias/editar', $data);
            echo view('footer');
        }
    }

    public function eliminar($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $this->noticia->update($id, ['estado' => 0]);
        return redirect()->to(base_url() . '/CNoticias')->with("archivar", ["mensaje" => "ok"]);
    }

    public function eliminados($activo = 0)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $noticia = $this->noticia->listarActivos($activo);
        $data = ['titulo' => 'Noticas/Comunicados Archivados', 'datos' => $noticia];

        echo view('menu');
        echo view('noticias/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $this->noticia->update($id, ['estado' => 1]);
        return redirect()->to(base_url() . '/CNoticias/eliminados')->with("reingresar", ["mensaje" => "ok"]);
    }

    public function eliminar_definivamente($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $nomdoc = $this->request->getPost('cod') . ".pdf";
        $ruta_logo = "./assets/dist/noticias/" . $nomdoc;
        if (file_exists($ruta_logo)) {
            unlink($ruta_logo);
        }
        $this->noticia->delete($id, 'id');
        return redirect()->to(base_url() . '/CNoticias/eliminados')->with("eliminar_def", ["mensaje" => "ok"]);
    }
}
