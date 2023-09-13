<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MConvDocencia;
use App\Models\MMencion;
use App\Models\MTitula;

class CConvDocencia extends BaseController
{
    protected $convDocencia, $reglasCambia, $reglas, $reglas1, $session, $mencion, $titulado;

    public function __construct()
    {
        $this->convDocencia = new MConvDocencia();
        $this->mencion = new MMencion();
        $this->titulado = new MTitula();
        $this->session = session();
        helper(['form']);
        $this->reglas =  [
            'codigo' => [
                'rules' => 'required|is_unique[convocatoria_docencia.codigo]',
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
            'materia' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo MATERIA es obligatorio.'
                ]
            ],
            'carga_horaria' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo CARGA HORARIA es obligatorio.'
                ]
            ],
            'fecha_entrega_doc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo FECHA ENTREGA DOCUMENTOS es obligatorio.'
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
        $convDocencia = $this->convDocencia->listarActivos($activo);
        $data = ['titulo' => 'Convocatoria Docencia', 'datos' => $convDocencia];

        echo view('menu');
        echo view('convDocencia/convDocencia', $data);
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
        $convDocencia = $this->convDocencia->listaProfesionales($menciones, $activo);
        //array_push($menciones, $this->session->mencion, 'Publico General');
        //$convDocencia = $this->convDocencia->where('estado', $activo)->whereIn('mencion', $menciones)->orderBy('id', 'DESC')->findAll();
        $data = ['titulo' => 'Convocatoria Docencia', 'datos' => $convDocencia];

        echo view('menu');
        echo view('convDocencia/vistaProfesionales', $data);
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
        $data = ['titulo' => 'Agregar Convocatoria Docencia', 'menciones' => $menciones];
        echo view('menu');
        echo view('convDocencia/nuevo', $data);
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
            move_uploaded_file($archDoc, "./assets/dist/convocatoria_docencia/" . $nomdoc);

            $this->convDocencia->save([
                'id_administrador' => $this->session->id_administrador,
                'codigo' => $this->request->getPost('codigo'),
                'materia' => $this->request->getPost('materia'),
                'carga_horaria' => $this->request->getPost('carga_horaria'),
                'fecha_entrega_doc' => $this->request->getPost('fecha_entrega_doc'),
                'id_mencion' => $this->request->getPost('mencion'),
                'archivo' => $nomdoc
            ]);
            return redirect()->to(base_url() . '/CConvDocencia')->with("adicionar", ["mensaje" => "ok"]);
        } else {
            $menciones = $this->mencion->findAll();
            $data = ['titulo' => 'Agregar Convocatoria Docencia', 'validation' => $this->validator, 'menciones' => $menciones];
            echo view('menu');
            echo view('convDocencia/nuevo', $data);
            echo view('footer');
        }
    }

    function visualizar($id_doc)
    {
        $data['id_doc'] = $id_doc;
        echo view('menu');
        echo view('convDocencia/documento', $data);
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
        $convDocencia = $this->convDocencia->where('id', $id)->first();
        $data = ['titulo' => 'Editar Convocatoria Docencia', 'datos' => $convDocencia, 'menciones' => $menciones];
        echo view('menu');
        echo view('convDocencia/editar', $data);
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
            'carga_horaria' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo CARGA HORARIA es obligatorio.'
                ]
            ],
            'fecha_entrega_doc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo FECHA ENTREGA DOCUMENTOS es obligatorio.'
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
                    move_uploaded_file($archDoc, "./assets/dist/convocatoria_docencia/" . $nomdoc);
                } else {
                    $ruta_logo = "./assets/dist/convocatoria_docencia/" . $nomdoc;

                    if (file_exists($ruta_logo)) {
                        unlink($ruta_logo);
                    }
                    $nomdoc = $this->request->getPost('cod') . ".pdf";
                    $archDoc = $doc["tmp_name"];
                    move_uploaded_file($archDoc, "./assets/dist/convocatoria_docencia/" . $nomdoc);
                }
            }

            $this->convDocencia->update($this->request->getPost('id'), [
                'materia' => $this->request->getPost('materia'),
                'carga_horaria' => $this->request->getPost('carga_horaria'),
                'fecha_entrega_doc' => $this->request->getPost('fecha_entrega_doc'),
                'id_mencion' => $this->request->getPost('mencion'),
                'archivo' => $nomdoc
            ]);
            return redirect()->to(base_url() . '/CConvDocencia')->with("editar", ["mensaje" => "ok"]);
        } else {
            $menciones = $this->mencion->findAll();
            $convDocencia = $this->convDocencia->where('id', $id)->first();
            $data = ['titulo' => 'Editar Convocatoria Docencia', 'validation' => $this->validator, 'datos' => $convDocencia, 'menciones' => $menciones];
            echo view('menu');
            echo view('convDocencia/editar', $data);
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

        $this->convDocencia->update($id, ['estado' => 0]);
        return redirect()->to(base_url() . '/CConvDocencia')->with("archivar", ["mensaje" => "ok"]);
    }

    public function eliminados($activo = 0)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $menciones = $this->mencion->findAll();
        $convDocencia = $this->convDocencia->listarActivos($activo);
        $data = ['titulo' => 'Convocatorias Docencia Archivados', 'datos' => $convDocencia, 'menciones' => $menciones];

        echo view('menu');
        echo view('convDocencia/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $this->convDocencia->update($id, ['estado' => 1]);
        return redirect()->to(base_url() . '/CConvDocencia/eliminados')->with("reingresar", ["mensaje" => "ok"]);
    }

    public function eliminar_definivamente($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $nomdoc = $this->request->getPost('cod') . ".pdf";
        $ruta_logo = "./assets/dist/convocatoria_docencia/" . $nomdoc;
        if (file_exists($ruta_logo)) {
            unlink($ruta_logo);
        }
        $this->convDocencia->delete($id, 'id');
        return redirect()->to(base_url() . '/CConvDocencia/eliminados')->with("eliminar_def", ["mensaje" => "ok"]);
    }
}
