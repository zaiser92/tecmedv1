<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MAdministrador;
use App\Models\MConvDocencia;
use App\Models\MNnoticias;
use App\Models\MSeminario;
use App\Models\MRol;

class CAdministrador extends BaseController
{
    protected $administradores, $reglasCambia, $reglas, $reglas1, $session, $seminarios, $roles, $noticia, $convocatoria;

    public function __construct()
    {
        $this->administradores = new MAdministrador();
        $this->seminarios = new MSeminario();
        $this->roles = new MRol();
        $this->noticia = new MNnoticias();
        $this->convocatoria = new MConvDocencia();

        $this->session = session();
        helper(['form']);
        $this->reglas =  [
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo NOMBRE(S) es obligatorio.'
                ]
            ],
            'apellido' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo APELLIDO(S) es obligatorio.'
                ]
            ],
            'cargo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione un CARGO.'
                ]
            ],
            'ci' => [
                'rules' => 'required|is_unique[administrador.ci]',
                'errors' => [
                    'required' => 'El campo NRO DE CARNET es obligatorio.',
                    'is_unique' => 'El campo NRO DE CARNET debe ser unico.'
                ]
            ],
            'celular' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo CELULAR es obligatorio.'
                ]
            ],
            'rol' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione un ROL.'
                ]
            ]
        ];
        $this->reglasCambia =  [
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'repassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'matches' => 'Las contraseñas no coninciden.'
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
        $roles = $this->roles->findAll();
        $administradores = $this->administradores->listar();
        $data = ['titulo' => 'ADMINISTRADORES', 'datos' => $administradores, 'roles' => $roles];

        echo view('menu');
        echo view('administradores/administradores', $data);
        echo view('footer');
    }

    public function noticias($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $noticia = $this->noticia->listarAdministrador($id);
        $administrador = $this->administradores->where('id_administrador', $id)->first();

        $data = ['titulo' => 'Noticias publicadas por ', 'datos' => $noticia, 'user' => $administrador];
        echo view('menu');
        echo view('administradores/admin_noticias', $data);
        echo view('footer');
    }

    public function convocatorias($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $convocatoria = $this->convocatoria->listarAdministrador($id);
        $administrador = $this->administradores->where('id_administrador', $id)->first();

        $data = ['titulo' => 'Convocatorias publicadas por ', 'datos' => $convocatoria, 'user' => $administrador];
        echo view('menu');
        echo view('administradores/admin_convocatoria', $data);
        echo view('footer');
    }

    public function cursos($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $seminarios = $this->seminarios->listarAdministrador($id);
        $administrador = $this->administradores->where('id_administrador', $id)->first();

        $data = ['titulo' => 'Cursos/Seminarios publicadas por ', 'datos' => $seminarios, 'user' => $administrador];
        echo view('menu');
        echo view('administradores/admin_cursos', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $roles = $this->roles->findAll();
        $data = ['titulo' => 'Agregar Administrador', 'roles' => $roles];
        echo view('menu');
        echo view('administradores/nuevo', $data);
        echo view('footer');
    }
    /*
    public function insertar()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $hash = password_hash($this->request->getPost('ci'), PASSWORD_DEFAULT);
            $this->administradores->save([
                'nombres' => $this->request->getPost('nombre'),
                'apellido' => $this->request->getPost('apellido'),
                'cargo' => $this->request->getPost('cargo'),
                //'fecha_nacimiento' => $this->request->getPost('fecha_nac'),
                'ci' => $this->request->getPost('ci'),
                'password' => $hash,
                'telefono' => $this->request->getPost('celular'),
                'id_rol' => $this->request->getPost('rol')
            ]);
            return redirect()->to(base_url() . '/CAdministrador')->with("adicionar", ["mensaje" => "ok"]);
        } else {
            $data = ['titulo' => 'Agregar Adminstrador', 'validation' => $this->validator];
            echo view('menu');
            echo view('administradores/nuevo', $data);
            echo view('footer');
        }
    }
    */
    public function insertar()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $hash = password_hash($this->request->getPost('ci'), PASSWORD_DEFAULT);
            $nombres = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $cargo = $this->request->getPost('cargo');
            $ci = $this->request->getPost('ci');
            $telefono = $this->request->getPost('celular');
            $id_rol = $this->request->getPost('rol');
            $login = '';

            $this->administradores->insertarUsuario(
                $login,
                $hash,
                $nombres,
                $apellido,
                $cargo,
                $ci,
                $telefono,
                $id_rol,
            );
            return redirect()->to(base_url() . '/CAdministrador')->with("adicionar", ["mensaje" => "ok"]);
        } else {
            $data = ['titulo' => 'Agregar Administrador', 'validation' => $this->validator];
            echo view('menu');
            echo view('administradores/nuevo', $data);
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

        $administrador = $this->administradores->where('id_administrador', $id)->first();
        $data = ['titulo' => 'Editar Administrador', 'datos' => $administrador];
        echo view('menu');
        echo view('administradores/editar', $data);
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
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo NOMBRE(S) es obligatorio.'
                ]
            ],
            'apellido' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo APELLIDO(S) es obligatorio.'
                ]
            ],
            'cargo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione un CARGO.'
                ]
            ],
            'ci' => [
                'rules' => 'required|is_unique[administrador.ci,id_administrador,' . $id . ']',
                'errors' => [
                    'required' => 'El campo NRO DE CARNET es obligatorio.',
                    'is_unique' => 'El campo NRO DE CARNET debe ser unico.'
                ]
            ],
            'celular' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo CELULAR es obligatorio.'
                ]
            ],
            'rol' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione un ROL.'
                ]
            ]
        ];
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas1)) {
            $nombres = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $cargo = $this->request->getPost('cargo');
            $ci = $this->request->getPost('ci');
            $telefono = $this->request->getPost('celular');
            $id_rol = $this->request->getPost('rol');
            $login = '';

            $this->administradores->editarUsuario(
                $id,
                $login,
                $nombres,
                $apellido,
                $cargo,
                $ci,
                $telefono,
                $id_rol
            );
            return redirect()->to(base_url() . '/CAdministrador')->with("editar", ["mensaje" => "ok"]);
        } else {
            $administrador = $this->administradores->where('id_administrador', $id)->first();
            $data = ['titulo' => 'Editar Administrador', 'validation' => $this->validator, 'datos' => $administrador];
            echo view('menu');
            echo view('administradores/editar', $data);
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
        $this->administradores->update($id, ['estado' => 0]);
        return redirect()->to(base_url() . '/CAdministrador')->with("archivar", ["mensaje" => "ok"]);
    }

    public function eliminados()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $administradores = $this->administradores->eliminados();
        $data = ['titulo' => 'Administradores Archivados', 'datos' => $administradores];

        echo view('menu');
        echo view('administradores/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $this->administradores->update($id, ['estado' => 1]);
        return redirect()->to(base_url() . '/CAdministrador/eliminados')->with("reingresar", ["mensaje" => "ok"]);
    }

    public function eliminar_definivamente($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $this->administradores->delete($id, 'id_administrador');
        return redirect()->to(base_url() . '/CAdministrador/eliminados')->with("eliminar_def", ["mensaje" => "ok"]);
    }

    public function resetear()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $hash = password_hash($this->request->getPost('ci'), PASSWORD_DEFAULT);
        $this->administradores->update($this->request->getPost('id'), [
            'password' => $hash,
            'reset' => '1'
        ]);
        return redirect()->to(base_url() . '/CAdministrador')->with("resetear", ["mensaje" => "ok"]);
    }

    public function perfil($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $decode = base64_decode($id);
        $administrador = $this->administradores->where('id_administrador', $decode)->first();
        $data = ['titulo' => 'Actualizar Datos Personales', 'datos' => $administrador];
        echo view('menu');
        echo view('administradores/perfil', $data);
        echo view('footer');
    }

    public function actualizar_perfil()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $this->administradores->update($this->request->getPost('id'), [
            'telefono' => $this->request->getPost('celular')
        ]);
        return redirect()->to(base_url() . '/Usuarios')->with("editar", ["mensaje" => "ok"]);
    }

    public function act_password()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $administrador = $this->administradores->where('id_administrador', $this->session->id_administrador)->first();
        $data = ['titulo' => 'Cambiar Contraseña', 'datos' => $administrador];
        echo view('menu');
        echo view('administradores/password', $data);
        echo view('footer');
    }

    public function cambia_password_admin()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        if ($this->request->getMethod() == "post" && $this->validate($this->reglasCambia)) {

            $idUsuario = $this->session->id_administrador;
            $password = $this->request->getPost('password');
            // Validar la contraseña
            $error = '';
            if (strlen($password) < 8) {
                $error = 'La contraseña debe tener al menos 8 caracteres.';
            } elseif (!preg_match('/[a-z]/', $password)) {
                $error = 'La contraseña debe contener al menos una letra minúscula.';
            } elseif (!preg_match('/[A-Z]/', $password)) {
                $error = 'La contraseña debe contener al menos una letra mayúscula.';
            } elseif (!preg_match('/[0-9]/', $password)) {
                $error = 'La contraseña debe contener al menos un número.';
            }

            if (!empty($error)) {
                // La contraseña no cumple los requisitos
                return redirect()->to(base_url() . '/CAdministrador/act_password')->with("error", ["password" => $error]);
            }
            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->administradores->update($idUsuario, ['password' => $hash, 'reset' => '0']);

            return redirect()->to(base_url() . '/Usuarios')->with("cambia_pass", ["mensaje" => "ok"]);
        } else {
            return redirect()->to(base_url() . '/CAdministrador/act_password')->with("error", ["password" => "Las Contraseñas no Coinciden"]);
        }
    }
}
