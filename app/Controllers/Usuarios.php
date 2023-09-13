<?php

namespace App\Controllers;

use App\Models\MAdministrador;
use App\Models\MProfesional;

class Usuarios extends BaseController
{
    protected $administradores, $profesionales, $reglasCambia;

    public function __construct()
    {
        $this->administradores = new MAdministrador();
        $this->profesionales = new MProfesional();

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

    public function login()
    {
        return view('login');
    }

    public function index()
    {
        $session = session();
        if ((!isset($session->id_profesional))) {
            if (!isset($session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        echo view('menu');
        echo view('panel_control');
        echo view('footer');
    }

    public function valida()
    {
        if ($this->request->getMethod() == "post") {
            $usuario = $this->request->getPost('usuario');
            $password = $this->request->getPost('password');

            $datosUsuario = $this->administradores->where('login', $usuario)->first();
            $datosUsuarioProf = $this->profesionales->where('cedula', $usuario)->first();

            if ($datosUsuario != null && password_verify($password, $datosUsuario['password']) == true && $datosUsuario['estado'] == '1' && $datosUsuario['login'] == $usuario) {
                $session = session();
                $session->set($datosUsuario);
                if (($session->reset) == "0") {
                    return redirect()->to(base_url() . '/Usuarios');
                } else {
                    return redirect()->to(base_url() . '/Usuarios/password_1');
                }
            } else {
                if ($datosUsuarioProf != null && password_verify($password, $datosUsuarioProf['password']) == true && $datosUsuarioProf['estado'] == '1' && $datosUsuarioProf['cedula'] == $usuario) {
                    $session = session();
                    $session->set($datosUsuarioProf);
                    if (($session->reset) == "0") {
                        return redirect()->to(base_url() . '/Usuarios');
                    } else {
                        return redirect()->to(base_url() . '/Usuarios/password_2');
                    }
                } else {
                    return redirect()->to(base_url('/'))->with("error", ["credenciales" => "Ingrese sus Credenciales Nuevamente!!"]);
                }
            }
        } else {
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();  //session_destroy
        return redirect()->to(base_url());
    }

    public function password_1()
    {
        return view('password1');
    }

    public function password_2()
    {
        return view('password2');
    }

    public function cambia_password_1()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglasCambia)) {

            $session = session();
            $idUsuario = $session->id_administrador;

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
                return redirect()->to(base_url() . '/Usuarios/password_1')->with("error", ["password" => $error]);
            }

            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->administradores->update($idUsuario, ['password' => $hash, 'reset' => '0']);

            return redirect()->to(base_url() . '/Usuarios')->with("cambia_pass", ["mensaje" => "ok"]);
        } else {
            return redirect()->to(base_url() . '/Usuarios/password_1')->with("error", ["password" => "Las Contraseñas no Coinciden"]);
        }
    }

    public function cambia_password_2()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasCambia)) {

            $session = session();
            $idUsuario = $session->id_profesional;
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
                return redirect()->to(base_url() . '/Usuarios/password_1')->with("error", ["password" => $error]);
            }
            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->profesionales->update($idUsuario, ['password' => $hash, 'reset' => '0']);

            return redirect()->to(base_url() . '/Usuarios')->with("cambia_pass", ["mensaje" => "ok"]);
        } else {
            return redirect()->to(base_url() . '/Usuarios/password_2')->with("error", ["password" => "Las Contraseñas no Coinciden"]);
        }
    }
}
