<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MMencion;
use App\Models\MSeminario;
use App\Models\MTitula;

class CSeminario extends BaseController
{
    protected $seminarios, $reglasCambia, $reglas, $reglas1, $session, $mencion, $titulado;

    public function __construct()
    {
        $this->seminarios = new MSeminario();
        $this->mencion = new MMencion();
        $this->titulado = new MTitula();
        $this->session = session();
        helper(['form']);
        $this->reglas =  [
            'codigo' => [
                'rules' => 'required|is_unique[cursos_seminarios.codigo]',
                'errors' => [
                    'required' => 'El campo Código es obligatorio.',
                    'is_unique' => 'El campo Código debe ser unico.'
                ]
            ],
            'tema' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo TEMA es obligatorio.'
                ]
            ],
            'costo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo COSTO es obligatorio.'
                ]
            ],
            'lugar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo LUGAR es obligatorio.'
                ]
            ],
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
        $seminarios = $this->seminarios->listarActivos($activo);
        $data = ['titulo' => 'Cursos y Seminarios', 'datos' => $seminarios];

        echo view('menu');
        echo view('seminario/seminarios', $data);
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
        $seminarios = $this->seminarios->listaProfesionales($menciones, $activo);
        //array_push($menciones, $this->session->mencion, 'Publico General');
        //$seminarios = $this->seminarios->where('estado', $activo)->whereIn('mencion', $menciones)->orderBy('id', 'DESC')->findAll();
       
        $data = ['titulo' => 'Cursos y Seminarios', 'datos' => $seminarios];

        echo view('menu');
        echo view('seminario/vistaProfesionales', $data);
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
        $data = ['titulo' => 'Agregar Curso/Seminario', 'menciones' => $menciones];
        echo view('menu');
        echo view('seminario/nuevo', $data);
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
            move_uploaded_file($archDoc, "./assets/dist/doc/" . $nomdoc);

            $this->seminarios->save([
                'id_administrador' => $this->session->id_administrador,
                'codigo' => $this->request->getPost('codigo'),
                'tema' => $this->request->getPost('tema'),
                'costo' => $this->request->getPost('costo'),
                'lugar' => $this->request->getPost('lugar'),
                'id_mencion' => $this->request->getPost('mencion'),
                'modalidad' => $this->request->getPost('modalidad'),
                'archivo' => $nomdoc
            ]);
            return redirect()->to(base_url() . '/CSeminario')->with("adicionar", ["mensaje" => "ok"]);
        } else {
            $menciones = $this->mencion->findAll();
            $data = ['titulo' => 'Agregar Curso/Seminario', 'validation' => $this->validator, 'menciones' => $menciones];
            echo view('menu');
            echo view('seminario/nuevo', $data);
            echo view('footer');
        }
    }

    function visualizar($id_doc)
    {
        $data['id_doc'] = $id_doc;
        echo view('menu');
        echo view('seminario/documento', $data);
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
        $seminarios = $this->seminarios->where('id', $id)->first();
        $data = ['titulo' => 'Editar Curso/Seminario', 'datos' => $seminarios, 'menciones' => $menciones];
        echo view('menu');
        echo view('seminario/editar', $data);
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
            'tema' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo TEMA es obligatorio.'
                ]
            ],
            'costo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo COSTO es obligatorio.'
                ]
            ],
            'lugar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo LUGAR es obligatorio.'
                ]
            ],
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
                    move_uploaded_file($archDoc, "./assets/dist/doc/" . $nomdoc);
                } else {
                    $ruta_logo = "./assets/dist/doc/" . $nomdoc;

                    if (file_exists($ruta_logo)) {
                        unlink($ruta_logo);
                    }
                    $nomdoc = $this->request->getPost('cod') . ".pdf";
                    $archDoc = $doc["tmp_name"];
                    move_uploaded_file($archDoc, "./assets/dist/doc/" . $nomdoc);
                }
            }
            $this->seminarios->update($this->request->getPost('id'), [
                'tema' => $this->request->getPost('tema'),
                'costo' => $this->request->getPost('costo'),
                'lugar' => $this->request->getPost('lugar'),
                'id_mencion' => $this->request->getPost('mencion'),
                'modalidad' => $this->request->getPost('modalidad'),
                'archivo' => $nomdoc
            ]);
            return redirect()->to(base_url() . '/CSeminario')->with("editar", ["mensaje" => "ok"]);
        } else {
            $menciones = $this->mencion->findAll();
            $seminarios = $this->seminarios->where('id', $id)->first();
            $data = ['titulo' => 'Editar Curso/Seminario', 'validation' => $this->validator, 'datos' => $seminarios, 'menciones' => $menciones];
            echo view('menu');
            echo view('seminario/editar', $data);
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

        $this->seminarios->update($id, ['estado' => 0]);
        return redirect()->to(base_url() . '/CSeminario')->with("archivar", ["mensaje" => "ok"]);
    }

    public function eliminados($activo = 0)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $menciones = $this->mencion->findAll();
        $seminarios = $this->seminarios->listarActivos($activo);
        $data = ['titulo' => 'Seminarios/Cursos Archivados', 'datos' => $seminarios, 'menciones' => $menciones];

        echo view('menu');
        echo view('seminario/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $this->seminarios->update($id, ['estado' => 1]);
        return redirect()->to(base_url() . '/CSeminario/eliminados')->with("reingresar", ["mensaje" => "ok"]);
    }

    public function eliminar_definivamente($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $nomdoc = $this->request->getPost('cod') . ".pdf";
        $ruta_logo = "./assets/dist/doc/" . $nomdoc;
        if (file_exists($ruta_logo)) {
            unlink($ruta_logo);
        }
        $this->seminarios->delete($id, 'id');
        return redirect()->to(base_url() . '/CSeminario/eliminados')->with("eliminar_def", ["mensaje" => "ok"]);
    }
}
