<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MEvento;
use App\Models\MProfesional;
use App\Models\MExpDocente;
use App\Models\MExpLaboral;
use App\Models\MFormAcademica;
use App\Models\MMencion;
use App\Models\MPremio;
use App\Models\MPublicacion;
use App\Models\MTitula;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use DateTime;

class CProfesional extends BaseController
{
    protected $profesionales, $reglasCambia, $reglas, $mencion, $session, $titula,
        $expDocente, $reglas1, $reglas2, $formAcademica, $expLaboral, $evento, $premio, $publicacion;

    public function __construct()
    {
        $this->profesionales = new MProfesional();
        $this->titula = new MTitula();
        $this->expDocente = new MExpDocente();
        $this->expLaboral = new MExpLaboral();
        $this->formAcademica = new MFormAcademica();
        $this->evento = new MEvento();
        $this->premio = new MPremio();
        $this->publicacion = new MPublicacion();
        $this->mencion = new MMencion();
        $this->session = session();
        helper(['form']);
        $this->reglas =  [
            'ci' => [
                'rules' => 'required|is_unique[profesional.cedula]',
                'errors' => [
                    'required' => 'El campo CÉDULA DE INDENTIDAD es obligatorio.',
                    'is_unique' => 'El campo CÉDULA DE IDENTIDAD debe ser único.'
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

    public function index($activo = 1)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $profesionales = $this->profesionales->where('estado', $activo)->orderBy('id_profesional', 'DESC')->findAll();
        $data = ['titulo' => 'Lista de Profesionales ACTIVOS', 'datos' => $profesionales];

        echo view('menu');
        echo view('profesional/profesionales', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $mencion = $this->mencion->findAll();
        $data = ['titulo' => 'Agregar Profesional', 'mencion' => $mencion];
        echo view('menu');
        echo view('profesional/nuevo', $data);
        echo view('footer');
    }

    public function nuevosExcel()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $data = ['titulo' => 'Agregar Profesionales por Documento Excel'];
        echo view('menu');
        echo view('profesional/nuevosExcel', $data);
        echo view('footer');
    }

    public function guardarExcel()
    {
        try {
            $archivo_excel = $this->request->getFile('archivo');
            $documento = IOFactory::load($archivo_excel);

            $hojaActual = $documento->getSheet(0);
            $numeroFilas = $hojaActual->getHighestDataRow();
            $letra = $hojaActual->getHighestColumn();
            $data = array();

            $errors = array(); // inicializamos el array de errores
            $registrosInsertados = 0;

            for ($indiceFila = 2; $indiceFila <= $numeroFilas; $indiceFila++) {
                // código existente
                $pass = password_hash($hojaActual->getCellByColumnAndRow(1, $indiceFila), PASSWORD_DEFAULT);

                if (($hojaActual->getCellByColumnAndRow(11, $indiceFila)) == '0') {
                    $genero = 'Femenino';
                } elseif (($hojaActual->getCellByColumnAndRow(11, $indiceFila)) == '1') {
                    $genero = 'Masculino';
                } else {
                    $genero = '';
                }

                if (($hojaActual->getCellByColumnAndRow(12, $indiceFila)) == '1') {
                    $mencion = 'Bioimagenologia';
                } elseif (($hojaActual->getCellByColumnAndRow(12, $indiceFila)) == '2') {
                    $mencion = 'Fisioterapia y Kinesiologia';
                } elseif (($hojaActual->getCellByColumnAndRow(12, $indiceFila)) == '3') {
                    $mencion = 'Laboratorio Clinico';
                } else {
                    $mencion = '';
                }

                $data = array(

                    'nombres' => $hojaActual->getCellByColumnAndRow(3, $indiceFila),
                    'ap_paterno' => $hojaActual->getCellByColumnAndRow(4, $indiceFila),
                    'ap_materno' => $hojaActual->getCellByColumnAndRow(5, $indiceFila),
                    'cedula' => $hojaActual->getCellByColumnAndRow(1, $indiceFila),
                    'nacionalidad' => $hojaActual->getCellByColumnAndRow(7, $indiceFila),
                    'domicilio' => $hojaActual->getCellByColumnAndRow(8, $indiceFila),
                    'celular' => $hojaActual->getCellByColumnAndRow(9, $indiceFila),
                    'email' => $hojaActual->getCellByColumnAndRow(10, $indiceFila),

                    'fecha_nacimiento' => $hojaActual->getCellByColumnAndRow(6, $indiceFila),
                    'genero' => $genero,
                    'ingreso' => $hojaActual->getCellByColumnAndRow(13, $indiceFila),
                    'egreso' => $hojaActual->getCellByColumnAndRow(14, $indiceFila),
                    'matricula' => $hojaActual->getCellByColumnAndRow(2, $indiceFila),
                    'password' => $pass,
                    'mencion' => $mencion
                );

                // validamos si ya existe una entrada con la misma cédula en la base de datos
                $existeMatricula = $this->profesionales->where('matricula', $data['matricula'])->first();
                if ($existeMatricula) {
                    // si existe, almacenamos el error
                    $errors[] = "Error en la fila $indiceFila: la Matrícula {$data['matricula']} ya existe en la base de datos.";
                } else {
                    // si no existe, insertamos los datos en la base de datos
                    $this->profesionales->insert($data);
                    $registrosInsertados++;
                }
            }

            // cargamos la vista con los posibles errores
            echo view('menu');
            echo view('profesional/nuevosExcel', ['errors' => $errors, 'registrosInsertados' => $registrosInsertados]);
            echo view('footer');
        } catch (\Exception $e) {
            // mostramos mensaje de error en caso de excepción
            echo view('menu');
            echo "Error: No se ha podido guardar los datos. Detalles del error: {$e->getMessage()}";
            echo view('footer');
        }
    }

    public function insertar()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $hash = password_hash($this->request->getPost('ci'), PASSWORD_DEFAULT);

            $imagenUsuario = $_FILES["imgUsuario"];
            if ($imagenUsuario["name"] == "") {
                $nomImagen = null;
            } else {
                $imagenUsuario = $_FILES["imgUsuario"];
                $nomImagen = $this->request->getPost('ci') . ".jpg";
                $archImagen = $imagenUsuario["tmp_name"];
                move_uploaded_file($archImagen, "./assets/dist/img/usuario/" . $nomImagen);
            }
            $ciudad = $this->request->getPost('ciudad');
            if ($ciudad == "Otro") {
                $ciudad = $this->request->getPost('otraCiudad');
            }
            $this->profesionales->save([
                'nombres' => $this->request->getPost('nomProfesional'),
                'ap_paterno' => $this->request->getPost('patProfesional'),
                'ap_materno' => $this->request->getPost('matProfesional'),
                'cedula' => $this->request->getPost('ci'),
                'nacionalidad' => $this->request->getPost('nacionalidad'),
                'domicilio' => $this->request->getPost('domicilio'),
                'celular' => $this->request->getPost('celular'),
                'email' => $this->request->getPost('email'),
                'fecha_nacimiento' => $this->request->getPost('fechanacimiento'),
                'genero' => $this->request->getPost('genero'),
                'password' => $hash,
                'img_profesional' => $nomImagen,
                'ciudad' => $ciudad
            ]);
            return redirect()->to(base_url() . '/CProfesional')->with("adicionar", ["mensaje" => "ok"]);
        } else {
            $mencion = $this->mencion->findAll();
            $data = ['titulo' => 'Agregar Profesional', 'validation' => $this->validator, 'mencion' => $mencion];
            echo view('menu');
            echo view('profesional/nuevo', $data);
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

        $profesional = $this->profesionales->where('id_profesional', $id)->first();
        $data = ['titulo' => 'Editar Profesional', 'datos' => $profesional];
        echo view('menu');
        echo view('profesional/editar', $data);
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
            'ci' => [
                'rules' => 'required|is_unique[profesional.cedula,id_profesional,' . $id . ']',
                'errors' => [
                    'required' => 'El campo CÉDULA DE INDENTIDAD es obligatorio.',
                    'is_unique' => 'El campo CÉDULA DE IDENTIDAD debe ser único.'
                ]
            ]
        ];
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas1)) {
            $imagenUsuario = $_FILES["imgUsuario"];
            if ($imagenUsuario["name"] == "") {
                $nomImagen = $_POST["imgActUsuario"];
            } else {
                $nomImagen = $_POST["imgActUsuario"];
                if ($nomImagen == null) {

                    $file = $_FILES['imgUsuario'];
                    $fileName = $file['name'];
                    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                    $nomImagen =  $this->session->cedula . '.' . $fileExt;
                    $archImagen = $imagenUsuario["tmp_name"];
                    $fileTmp = $file['tmp_name'];
                    $uploadDir = './assets/dist/img/usuario/';
                    move_uploaded_file($fileTmp, $uploadDir . $nomImagen);
                } else {
                    $ruta_logo = "./assets/dist/img/usuario/" . $nomImagen;

                    if (file_exists($ruta_logo)) {
                        unlink($ruta_logo);
                    }
                    $file = $_FILES['imgUsuario'];
                    $fileName = $file['name'];
                    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                    $nomImagen =  $this->session->cedula . '.' . $fileExt;
                    $archImagen = $imagenUsuario["tmp_name"];
                    $fileTmp = $file['tmp_name'];
                    $uploadDir = './assets/dist/img/usuario/';
                    move_uploaded_file($fileTmp, $uploadDir . $nomImagen);
                }
                /* $nomImagen = $_POST["imgActUsuario"];
                if ($nomImagen == null) {
                    $nomImagen =  $this->session->cedula . ".jpg";
                    $archImagen = $imagenUsuario["tmp_name"];
                    move_uploaded_file($archImagen, "./assets/dist/img/usuario/" . $nomImagen);
                } else {
                    $ruta_logo = "./assets/dist/img/usuario/" . $nomImagen;

                    if (file_exists($ruta_logo)) {
                        unlink($ruta_logo);
                    }
                    $nomImagen = $this->session->cedula . ".jpg";
                    $archImagen = $imagenUsuario["tmp_name"];
                    move_uploaded_file($archImagen, "./assets/dist/img/usuario/" . $nomImagen);
                } */
            }
            $ciudad = $this->request->getPost('ciudad');
            if ($ciudad == "Otro") {
                $ciudad = $this->request->getPost('otraCiudad');
            }
            $this->profesionales->update($this->request->getPost('id'), [
                'nombres' => $this->request->getPost('nomProfesional'),
                'ap_paterno' => $this->request->getPost('patProfesional'),
                'ap_materno' => $this->request->getPost('matProfesional'),
                'cedula' => $this->request->getPost('ci'),
                'nacionalidad' => $this->request->getPost('nacionalidad'),
                'domicilio' => $this->request->getPost('domicilio'),
                'celular' => $this->request->getPost('celular'),
                'email' => $this->request->getPost('email'),
                'fecha_nacimiento' => $this->request->getPost('fechanacimiento'),
                'genero' => $this->request->getPost('genero'),
                'img_profesional' => $nomImagen,
                'ciudad' => $ciudad
            ]);
            return redirect()->to(base_url() . '/CProfesional')->with("editar", ["mensaje" => "ok"]);
        } else {
            $profesional = $this->profesionales->where('id_profesional', $id)->first();
            $data = ['titulo' => 'Editar Profesional', 'validation' => $this->validator, 'datos' => $profesional];
            echo view('menu');
            echo view('profesional/editar', $data);
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

        $this->profesionales->update($id, ['estado' => 0]);
        return redirect()->to(base_url() . '/CProfesional')->with("archivar", ["mensaje" => "ok"]);
    }

    public function eliminados($activo = 0)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $profesional = $this->profesionales->where('estado', $activo)->findAll();
        $data = ['titulo' => 'Lista de Profesionales INACTIVOS', 'datos' => $profesional];

        echo view('menu');
        echo view('profesional/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $this->profesionales->update($id, ['estado' => 1]);
        return redirect()->to(base_url() . '/CProfesional/eliminados')->with("reingresar", ["mensaje" => "ok"]);
    }

    public function eliminar_definivamente($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $this->profesionales->delete($id, 'id_profesional');
        return redirect()->to(base_url() . '/CProfesional/eliminados')->with("eliminar_def", ["mensaje" => "ok"]);
    }

    public function resetear()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $hash = password_hash($this->request->getPost('ci'), PASSWORD_DEFAULT);
        $this->profesionales->update($this->request->getPost('id'), [
            'password' => $hash,
            'reset' => '1'
        ]);
        return redirect()->to(base_url() . '/CProfesional')->with("resetear", ["mensaje" => "ok"]);
    }

    public function perfil($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $decode = base64_decode($id);
        $profesional = $this->profesionales->where('id_profesional', $decode)->first();
        $data = ['titulo' => 'Actualizar Datos Personales', 'datos' => $profesional];
        echo view('menu');
        echo view('profesional/perfil', $data);
        echo view('footer');
    }

    public function actualizar_perfil()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $id = $this->request->getPost('id');
        $this->reglas2 =  [
            'nomProfesional' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo NOMBRE(S) es obligatorio.'
                ]
            ],
            'nacionalidad' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo NACIONALIDAD es obligatorio.'
                ]
            ],
            'fechanacimiento' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo FECHA DE NACIMIENTO es obligatorio.'
                ]
            ],
            'ciudad' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione un CIUDAD.'
                ]
            ],
            'domicilio' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo DOMICILIO es obligatorio.'
                ]
            ],
            'celular' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo TELEFONO-CELULAR es obligatorio.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'El campo CORREO ELECTRÓNICO es obligatorio.',
                    'valid_email' => 'Ingrese un CORREO ELECTRÓNICO VÁLIDO.',
                ]
            ],
            'genero' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione un GÉNERO.'
                ]
            ]
        ];
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas2)) {
            $imagenUsuario = $_FILES["imgUsuario"];
            if ($imagenUsuario["name"] == "") {
                $nomImagen = $_POST["imgActUsuario"];
            } else {
                $nomImagen = $_POST["imgActUsuario"];
                if ($nomImagen == null) {

                    $file = $_FILES['imgUsuario'];
                    $fileName = $file['name'];
                    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                    $nomImagen =  $this->session->cedula . '.' . $fileExt;
                    $archImagen = $imagenUsuario["tmp_name"];
                    $fileTmp = $file['tmp_name'];
                    $uploadDir = './assets/dist/img/usuario/';
                    move_uploaded_file($fileTmp, $uploadDir . $nomImagen);
                } else {
                    $ruta_logo = "./assets/dist/img/usuario/" . $nomImagen;

                    if (file_exists($ruta_logo)) {
                        unlink($ruta_logo);
                    }
                    $file = $_FILES['imgUsuario'];
                    $fileName = $file['name'];
                    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                    $nomImagen =  $this->session->cedula . '.' . $fileExt;
                    $archImagen = $imagenUsuario["tmp_name"];
                    $fileTmp = $file['tmp_name'];
                    $uploadDir = './assets/dist/img/usuario/';
                    move_uploaded_file($fileTmp, $uploadDir . $nomImagen);
                }

                /* $nomImagen = $_POST["imgActUsuario"];
                if ($nomImagen == null) {
                    $nomImagen =  $this->session->cedula . ".jpg";
                    $archImagen = $imagenUsuario["tmp_name"];
                    move_uploaded_file($archImagen, "./assets/dist/img/usuario/" . $nomImagen);
                } else {
                    $ruta_logo = "./assets/dist/img/usuario/" . $nomImagen;

                    if (file_exists($ruta_logo)) {
                        unlink($ruta_logo);
                    }
                    $nomImagen = $this->session->cedula . ".jpg";
                    $archImagen = $imagenUsuario["tmp_name"];
                    move_uploaded_file($archImagen, "./assets/dist/img/usuario/" . $nomImagen);
                } */
            }
            $ciudad = $this->request->getPost('ciudad');
            if ($ciudad == "Otro") {
                $ciudad = $this->request->getPost('otraCiudad');
            }
            $this->profesionales->update($this->request->getPost('id'), [
                'nombres' => $this->request->getPost('nomProfesional'),
                'ap_paterno' => $this->request->getPost('patProfesional'),
                'ap_materno' => $this->request->getPost('matProfesional'),
                'nacionalidad' => $this->request->getPost('nacionalidad'),
                'domicilio' => $this->request->getPost('domicilio'),
                'celular' => $this->request->getPost('celular'),
                'email' => $this->request->getPost('email'),
                'fecha_nacimiento' => $this->request->getPost('fechanacimiento'),
                'genero' => $this->request->getPost('genero'),
                'img_profesional' => $nomImagen,
                'ciudad' => $ciudad
            ]);
            return redirect()->to(base_url() . '/Usuarios')->with("editar", ["mensaje" => "ok"]);
        } else {
            $profesional = $this->profesionales->where('id_profesional', $id)->first();
            $data = ['titulo' => 'Actualizar Datos Personales', 'validation' => $this->validator, 'datos' => $profesional];
            echo view('menu');
            echo view('profesional/perfil', $data);
            echo view('footer');
        }
    }

    public function act_password()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $profesional = $this->profesionales->where('id_profesional', $this->session->id_profesional)->first();
        $data = ['titulo' => 'Cambiar Contraseña', 'datos' => $profesional];
        echo view('menu');
        echo view('profesional/password', $data);
        echo view('footer');
    }

    public function cambia_password_prof()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        if ($this->request->getMethod() == "post" && $this->validate($this->reglasCambia)) {

            $idUsuario = $this->session->id_profesional;
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
                return redirect()->to(base_url() . '/CProfesional/act_password')->with("error", ["password" => $error]);
            }
            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->profesionales->update($idUsuario, ['password' => $hash, 'reset' => '0']);

            return redirect()->to(base_url() . '/Usuarios')->with("cambia_pass", ["mensaje" => "ok"]);
        } else {
            return redirect()->to(base_url() . '/CProfesional/act_password')->with("error", ["password" => "Las Contraseñas no Coinciden"]);
        }
    }

    public function CurriculumPDF()
    {

        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $data['id_profesional'] = $this->session->id_profesional;
        echo view('menu');
        echo view('profesional/ver_curriculum', $data);
        echo view('footer');
    }

    function generaCurriculum($id_profesional)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $profesional = $this->profesionales->where('id_profesional', $id_profesional)->first();
        ////// EXPERIENCIA DOCENTE /////
        $docente = $this->expDocente->where('id_profesional', $this->session->id_profesional)->orderBy('hasta', 'ASC')->findAll();
        $totalDocente = $this->expDocente->where('id_profesional', $this->session->id_profesional)->countAllResults();
        ////// FORMACION ACADEMICA /////
        $formAcademica0 = $this->formAcademica->where('id_profesional', $this->session->id_profesional)->where('tipo', '0')->orderBy('gestion_titulacion', 'DESC')->findAll();
        $totalformAcademica0 = $this->formAcademica->where('id_profesional', $this->session->id_profesional)->where('tipo', '0')->countAllResults();

        $formAcademica1 = $this->formAcademica->where('id_profesional', $this->session->id_profesional)->where('tipo', '1')->orderBy('gestion_titulacion', 'DESC')->findAll();
        $totalformAcademica1 = $this->formAcademica->where('id_profesional', $this->session->id_profesional)->where('tipo', '1')->countAllResults();

        $formAcademica2 = $this->formAcademica->where('id_profesional', $this->session->id_profesional)->where('tipo', '2')->orderBy('gestion_titulacion', 'DESC')->findAll();
        $totalformAcademica2 = $this->formAcademica->where('id_profesional', $this->session->id_profesional)->where('tipo', '2')->countAllResults();

        $formAcademica3 = $this->formAcademica->where('id_profesional', $this->session->id_profesional)->where('tipo', '3')->orderBy('gestion_titulacion', 'DESC')->findAll();
        $totalformAcademica3 = $this->formAcademica->where('id_profesional', $this->session->id_profesional)->where('tipo', '3')->countAllResults();

        $formAcademica4 = $this->formAcademica->where('id_profesional', $this->session->id_profesional)->where('tipo', '4')->orderBy('gestion_titulacion', 'DESC')->findAll();
        $totalformAcademica4 = $this->formAcademica->where('id_profesional', $this->session->id_profesional)->where('tipo', '4')->countAllResults();

        $totalformAcademica = $totalformAcademica0 + $totalformAcademica1 + $totalformAcademica2 + $totalformAcademica3 + $totalformAcademica4;
        ////// EXPERIENCIA LABORAL /////   
        $expLaboral = $this->expLaboral->where('id_profesional', $this->session->id_profesional)->orderBy('id', 'DESC')->findAll();
        $totalexpLaboral = $this->expLaboral->where('id_profesional', $this->session->id_profesional)->countAllResults();

        ////// EVENTOS ASISTIDOS /////
        $evento0 = $this->evento->where('id_profesional', $this->session->id_profesional)->where('tipo', 'curso')->orderBy('inicio', 'DESC')->findAll();
        $totalEvento0 = $this->evento->where('id_profesional', $this->session->id_profesional)->where('tipo', 'curso')->countAllResults();

        $evento1 = $this->evento->where('id_profesional', $this->session->id_profesional)->where('tipo', 'seminario')->orderBy('inicio', 'DESC')->findAll();
        $totalEvento1 = $this->evento->where('id_profesional', $this->session->id_profesional)->where('tipo', 'seminario')->countAllResults();

        $evento2 = $this->evento->where('id_profesional', $this->session->id_profesional)->where('tipo', 'congreso')->orderBy('inicio', 'DESC')->findAll();
        $totalEvento2 = $this->evento->where('id_profesional', $this->session->id_profesional)->where('tipo', 'congreso')->countAllResults();

        ////// PUBLICACIONES /////   
        $publicacion = $this->publicacion->where('id_profesional', $this->session->id_profesional)->orderBy('anio_publicacion', 'DESC')->findAll();
        $totalPublicacion = $this->publicacion->where('id_profesional', $this->session->id_profesional)->countAllResults();

        ////// PREMIOS Y DISTINCIONES /////   
        $distincion = $this->premio->where('id_profesional', $this->session->id_profesional)->orderBy('id', 'DESC')->findAll();
        $totalDistincion = $this->premio->where('id_profesional', $this->session->id_profesional)->countAllResults();


        $data = [
            'titulo' => 'CURRICULUM VITAE',
            'dat' => $profesional,
            ////// EXPERIENCIA DOCENTE /////
            'datDocente' => $docente,
            'totalDocente' => $totalDocente,
            ////// FORMACION ACADEMICA /////
            'totalformAcademica' => $totalformAcademica,
            'formAcademica0' => $formAcademica0,
            'totalformAcademica0' => $totalformAcademica0,
            'formAcademica1' => $formAcademica1,
            'totalformAcademica1' => $totalformAcademica1,
            'formAcademica2' => $formAcademica2,
            'totalformAcademica2' => $totalformAcademica2,
            'formAcademica3' => $formAcademica3,
            'totalformAcademica3' => $totalformAcademica3,
            'formAcademica4' => $formAcademica4,
            'totalformAcademica4' => $totalformAcademica4,
            ////// EXPERIENCIA LABORAL ///// 
            'expLaboral' => $expLaboral,
            'totalexpLaboral' => $totalexpLaboral,
            ////// EVENTOS ASISTIDOS  ///// 
            'evento0' => $evento0,
            'totalEvento0' => $totalEvento0,
            'evento1' => $evento1,
            'totalEvento1' => $totalEvento1,
            'evento2' => $evento2,
            'totalEvento2' => $totalEvento2,
            ////// PUBLIACIONES ///// 
            'publicacion' => $publicacion,
            'totalPublicacion' => $totalPublicacion,
            ////// PREMIOS Y DISTINCIONES ///// 
            'distincion' => $distincion,
            'totalDistincion' => $totalDistincion,
        ];

        $dompdf = new Dompdf(['isRemoteEnabled' => true]);

        $html = view('PDFCurriculum', $data);
        $dompdf->setPaper('letter', 'portrait');
        $dompdf->loadHtml($html);

        $dompdf->render();
        $dompdf->stream('Hoja de Vida.pdf', ['Attachment' => 0]);
    }


    public function detalleProfesional($id)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        ////// MENCIONES ///////////
        $titulado = $this->titula->listar($id);
        ////// EXPERIENCIA DOCENTE /////
        $docente = $this->expDocente->where('id_profesional', $id)->orderBy('hasta', 'ASC')->findAll();
        $totalDocente = $this->expDocente->where('id_profesional', $id)->countAllResults();
        ////// FORMACION ACADEMICA /////
        $formAcademica0 = $this->formAcademica->where('id_profesional', $id)->where('tipo', '0')->orderBy('gestion_titulacion', 'DESC')->findAll();
        $totalformAcademica0 = $this->formAcademica->where('id_profesional', $id)->where('tipo', '0')->countAllResults();

        $formAcademica1 = $this->formAcademica->where('id_profesional', $id)->where('tipo', '1')->orderBy('gestion_titulacion', 'DESC')->findAll();
        $totalformAcademica1 = $this->formAcademica->where('id_profesional', $id)->where('tipo', '1')->countAllResults();

        $formAcademica2 = $this->formAcademica->where('id_profesional', $id)->where('tipo', '2')->orderBy('gestion_titulacion', 'DESC')->findAll();
        $totalformAcademica2 = $this->formAcademica->where('id_profesional', $id)->where('tipo', '2')->countAllResults();

        $formAcademica3 = $this->formAcademica->where('id_profesional', $id)->where('tipo', '3')->orderBy('gestion_titulacion', 'DESC')->findAll();
        $totalformAcademica3 = $this->formAcademica->where('id_profesional', $id)->where('tipo', '3')->countAllResults();

        $formAcademica4 = $this->formAcademica->where('id_profesional', $id)->where('tipo', '4')->orderBy('gestion_titulacion', 'DESC')->findAll();
        $totalformAcademica4 = $this->formAcademica->where('id_profesional', $id)->where('tipo', '4')->countAllResults();

        $totalformAcademica = $totalformAcademica0 + $totalformAcademica1 + $totalformAcademica2 + $totalformAcademica3 + $totalformAcademica4;
        ////// EXPERIENCIA LABORAL /////   
        $expLaboral = $this->expLaboral->where('id_profesional', $id)->orderBy('id', 'DESC')->findAll();
        $totalexpLaboral = $this->expLaboral->where('id_profesional', $id)->countAllResults();

        ////// EVENTOS ASISTIDOS /////
        $evento0 = $this->evento->where('id_profesional', $id)->where('tipo', 'curso')->orderBy('inicio', 'DESC')->findAll();
        $totalEvento0 = $this->evento->where('id_profesional', $id)->where('tipo', 'curso')->countAllResults();

        $evento1 = $this->evento->where('id_profesional', $id)->where('tipo', 'seminario')->orderBy('inicio', 'DESC')->findAll();
        $totalEvento1 = $this->evento->where('id_profesional', $id)->where('tipo', 'seminario')->countAllResults();

        $evento2 = $this->evento->where('id_profesional', $id)->where('tipo', 'congreso')->orderBy('inicio', 'DESC')->findAll();
        $totalEvento2 = $this->evento->where('id_profesional', $id)->where('tipo', 'congreso')->countAllResults();

        ////// PUBLICACIONES /////   
        $publicacion = $this->publicacion->where('id_profesional', $id)->orderBy('anio_publicacion', 'DESC')->findAll();
        $totalPublicacion = $this->publicacion->where('id_profesional', $id)->countAllResults();

        ////// PREMIOS Y DISTINCIONES /////   
        $distincion = $this->premio->where('id_profesional', $id)->orderBy('id', 'DESC')->findAll();
        $totalDistincion = $this->premio->where('id_profesional', $id)->countAllResults();


        $profesional = $this->profesionales->where('id_profesional', $id)->first();
        $data = [
            'titulo' => 'DATOS PERSONALES',
            'datos' => $profesional,
            'titulado' => $titulado,
            ////// EXPERIENCIA DOCENTE /////
            'datDocente' => $docente,
            'totalDocente' => $totalDocente,
            ////// FORMACION ACADEMICA /////
            'totalformAcademica' => $totalformAcademica,
            'formAcademica0' => $formAcademica0,
            'totalformAcademica0' => $totalformAcademica0,
            'formAcademica1' => $formAcademica1,
            'totalformAcademica1' => $totalformAcademica1,
            'formAcademica2' => $formAcademica2,
            'totalformAcademica2' => $totalformAcademica2,
            'formAcademica3' => $formAcademica3,
            'totalformAcademica3' => $totalformAcademica3,
            'formAcademica4' => $formAcademica4,
            'totalformAcademica4' => $totalformAcademica4,
            ////// EXPERIENCIA LABORAL ///// 
            'expLaboral' => $expLaboral,
            'totalexpLaboral' => $totalexpLaboral,
            ////// EVENTOS ASISTIDOS  ///// 
            'evento0' => $evento0,
            'totalEvento0' => $totalEvento0,
            'evento1' => $evento1,
            'totalEvento1' => $totalEvento1,
            'evento2' => $evento2,
            'totalEvento2' => $totalEvento2,
            ////// PUBLIACIONES ///// 
            'publicacion' => $publicacion,
            'totalPublicacion' => $totalPublicacion,
            ////// PREMIOS Y DISTINCIONES ///// 
            'distincion' => $distincion,
            'totalDistincion' => $totalDistincion
        ];
        echo view('menu');
        echo view('profesional/detalleProfesional', $data);
        echo view('footer');
    }

    function cvprofesional($id_profesional)
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $profesional = $this->profesionales->where('id_profesional', $id_profesional)->first();
        ////// EXPERIENCIA DOCENTE /////
        $docente = $this->expDocente->where('id_profesional', $id_profesional)->orderBy('hasta', 'ASC')->findAll();
        $totalDocente = $this->expDocente->where('id_profesional', $id_profesional)->countAllResults();
        ////// FORMACION ACADEMICA /////
        $formAcademica0 = $this->formAcademica->where('id_profesional', $id_profesional)->where('tipo', '0')->orderBy('gestion_titulacion', 'DESC')->findAll();
        $totalformAcademica0 = $this->formAcademica->where('id_profesional', $id_profesional)->where('tipo', '0')->countAllResults();

        $formAcademica1 = $this->formAcademica->where('id_profesional', $id_profesional)->where('tipo', '1')->orderBy('gestion_titulacion', 'DESC')->findAll();
        $totalformAcademica1 = $this->formAcademica->where('id_profesional', $id_profesional)->where('tipo', '1')->countAllResults();

        $formAcademica2 = $this->formAcademica->where('id_profesional', $id_profesional)->where('tipo', '2')->orderBy('gestion_titulacion', 'DESC')->findAll();
        $totalformAcademica2 = $this->formAcademica->where('id_profesional', $id_profesional)->where('tipo', '2')->countAllResults();

        $formAcademica3 = $this->formAcademica->where('id_profesional', $id_profesional)->where('tipo', '3')->orderBy('gestion_titulacion', 'DESC')->findAll();
        $totalformAcademica3 = $this->formAcademica->where('id_profesional', $id_profesional)->where('tipo', '3')->countAllResults();

        $formAcademica4 = $this->formAcademica->where('id_profesional', $id_profesional)->where('tipo', '4')->orderBy('gestion_titulacion', 'DESC')->findAll();
        $totalformAcademica4 = $this->formAcademica->where('id_profesional', $id_profesional)->where('tipo', '4')->countAllResults();

        $totalformAcademica = $totalformAcademica0 + $totalformAcademica1 + $totalformAcademica2 + $totalformAcademica3 + $totalformAcademica4;
        ////// EXPERIENCIA LABORAL /////   
        $expLaboral = $this->expLaboral->where('id_profesional', $id_profesional)->orderBy('id', 'DESC')->findAll();
        $totalexpLaboral = $this->expLaboral->where('id_profesional', $id_profesional)->countAllResults();

        ////// EVENTOS ASISTIDOS /////
        $evento0 = $this->evento->where('id_profesional', $id_profesional)->where('tipo', 'curso')->orderBy('inicio', 'DESC')->findAll();
        $totalEvento0 = $this->evento->where('id_profesional', $id_profesional)->where('tipo', 'curso')->countAllResults();

        $evento1 = $this->evento->where('id_profesional', $id_profesional)->where('tipo', 'seminario')->orderBy('inicio', 'DESC')->findAll();
        $totalEvento1 = $this->evento->where('id_profesional', $id_profesional)->where('tipo', 'seminario')->countAllResults();

        $evento2 = $this->evento->where('id_profesional', $id_profesional)->where('tipo', 'congreso')->orderBy('inicio', 'DESC')->findAll();
        $totalEvento2 = $this->evento->where('id_profesional', $id_profesional)->where('tipo', 'congreso')->countAllResults();

        ////// PUBLICACIONES /////   
        $publicacion = $this->publicacion->where('id_profesional', $id_profesional)->orderBy('anio_publicacion', 'DESC')->findAll();
        $totalPublicacion = $this->publicacion->where('id_profesional', $id_profesional)->countAllResults();

        ////// PREMIOS Y DISTINCIONES /////   
        $distincion = $this->premio->where('id_profesional', $id_profesional)->orderBy('id', 'DESC')->findAll();
        $totalDistincion = $this->premio->where('id_profesional', $id_profesional)->countAllResults();


        $data = [
            'titulo' => 'CURRICULUM VITAE',
            'dat' => $profesional,
            ////// EXPERIENCIA DOCENTE /////
            'datDocente' => $docente,
            'totalDocente' => $totalDocente,
            ////// FORMACION ACADEMICA /////
            'totalformAcademica' => $totalformAcademica,
            'formAcademica0' => $formAcademica0,
            'totalformAcademica0' => $totalformAcademica0,
            'formAcademica1' => $formAcademica1,
            'totalformAcademica1' => $totalformAcademica1,
            'formAcademica2' => $formAcademica2,
            'totalformAcademica2' => $totalformAcademica2,
            'formAcademica3' => $formAcademica3,
            'totalformAcademica3' => $totalformAcademica3,
            'formAcademica4' => $formAcademica4,
            'totalformAcademica4' => $totalformAcademica4,
            ////// EXPERIENCIA LABORAL ///// 
            'expLaboral' => $expLaboral,
            'totalexpLaboral' => $totalexpLaboral,
            ////// EVENTOS ASISTIDOS  ///// 
            'evento0' => $evento0,
            'totalEvento0' => $totalEvento0,
            'evento1' => $evento1,
            'totalEvento1' => $totalEvento1,
            'evento2' => $evento2,
            'totalEvento2' => $totalEvento2,
            ////// PUBLIACIONES ///// 
            'publicacion' => $publicacion,
            'totalPublicacion' => $totalPublicacion,
            ////// PREMIOS Y DISTINCIONES ///// 
            'distincion' => $distincion,
            'totalDistincion' => $totalDistincion,
        ];

        $dompdf = new Dompdf(['isRemoteEnabled' => true]);

        $html = view('PDFCurriculum', $data);
        $dompdf->setPaper('letter', 'portrait');
        $dompdf->loadHtml($html);

        $dompdf->render();
        $dompdf->stream('Hoja de Vida.pdf', ['Attachment' => true]);
    }
}
