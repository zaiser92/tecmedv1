<?php

namespace App\Controllers;

use App\Models\MMencion;
use App\Models\MProfesional;
use App\Models\MTitula;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \DateTime;

class CReportes extends BaseController
{
    protected $profesionales, $reglasIngreso, $reglasGenero, $session, $seminarios, $titulado, $mencion, $reglasTitulacion;
    public function __construct()
    {
        $this->profesionales = new MProfesional();
        $this->titulado = new MTitula();
        $this->mencion = new MMencion();
        $this->session = session();
        helper(['form']);
        $this->reglasIngreso =  [
            'mencion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione una MENCIÓN.'
                ]
            ],
            'ingreso' => [
                'rules' => 'required|greater_than[1900]|less_than[3000]',
                'errors' => [
                    'required' => 'El campo GESTIÓN INGRESO es obligatorio.',
                    'greater_than' => 'El campo GESTIÓN INGRESO debe ser un NÚMERO MAYOR a 1900.',
                    'less_than' => 'El campo GESTIÓN INGRESO debe ser un NÚMERO MENOR a 3000.'
                ]
            ],
            'estado' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione un ESTADO.'
                ]
            ]
        ];
        $this->reglasTitulacion =  [
            'mencion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione una MENCIÓN.'
                ]
            ],
            'titulacion' => [
                'rules' => 'required|greater_than[1900]|less_than[3000]',
                'errors' => [
                    'required' => 'El campo GESTIÓN TITULACION es obligatorio.',
                    'greater_than' => 'El campo GESTIÓN TITULACION debe ser un NÚMERO MAYOR a 1900.',
                    'less_than' => 'El campo GESTIÓN TITULACION debe ser un NÚMERO MENOR a 3000.'
                ]
            ],
            'estado' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione un ESTADO.'
                ]
            ]
        ];
        $this->reglasGenero =  [
            'mencion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione una MENCIÓN.'
                ]
            ],
            'genero' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione un GÉNERO.'
                ]
            ],
            'estado' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Seleccione un ESTADO.'
                ]
            ]
        ];
    }
    public function index()
    {
        return view('login');
    }

    public function ingreso()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $menciones = $this->mencion->findAll();
        $data = ['titulo' => 'Buscar por gestión de Ingreso a la Carrera', 'menciones' => $menciones];
        echo view('menu');
        echo view('reportes/ingreso', $data);
        echo view('footer');
    }

    public function repingreso()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        if ($this->request->getMethod() == "post" && $this->validate($this->reglasIngreso)) {
            $activo = $this->request->getPost('estado');
            $mencion = $this->request->getPost('mencion');
            $ingreso = $this->request->getPost('ingreso');

            $nombre_mencion = $this->mencion->where('id', $mencion)->first();
            $titulo = "Titulados de " . $nombre_mencion['mencion'] . ' que INGRESARON el año ' . $ingreso;

            if ($activo == "2") {
                $profesionales = $this->titulado->reporteIngreso($mencion, $ingreso);
            } else {
                $profesionales = $this->titulado->reporteIngresoEstado($activo, $mencion, $ingreso);
            }

            $data = ['titulo' => $titulo, 'mencion' => $mencion, 'activo' => $activo, 'ingreso' => $ingreso, 'datos' => $profesionales];
            echo view('menu');
            echo view('reportes/vistaIngreso', $data);
            echo view('footer');
        } else {
            $menciones = $this->mencion->findAll();
            $data = ['titulo' => 'Buscar por gestión de Ingreso a la Carrera', 'menciones' => $menciones, 'validation' => $this->validator];
            echo view('menu');
            echo view('reportes/ingreso', $data);
            echo view('footer');
        }
    }

    public function excelIngreso($mencion, $activo, $ingreso)
    {
        if ($activo == "2") {
            $profesionales = $this->titulado->reporteIngreso($mencion, $ingreso);
        } else {
            $profesionales = $this->titulado->reporteIngresoEstado($activo, $mencion, $ingreso);
        }


        $nombre_mencion = $this->mencion->where('id', $mencion)->first();
        $titulo = "Titulados de " . $nombre_mencion['mencion'] . ' que INGRESARON el año ' . $ingreso;

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        //TITULO
        $sheet->mergeCells("A2:N2");
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A2')->getFont()->setSize(14);
        $sheet->getStyle('A2')->getFont()->setName('Arial');
        $sheet->getStyle('A2')->getFont()->setBold(true);
        $sheet->setCellValue('A2', $titulo);

        //TITULOS TABLA
        $sheet->setCellValue('A4', 'NRO');
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->setCellValue('B4', 'AP PATERNO');
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->setCellValue('C4', 'AP MATERNO');
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->setCellValue('D4', 'NOMBRES');
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->setCellValue('E4', 'NRO CARNET');
        $sheet->getColumnDimension('E')->setWidth(20);
        // $sheet->setCellValue('F4', 'NRO MATRICULA');
        // $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->setCellValue('F4', 'AÑO INGRESO');
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->setCellValue('G4', 'AÑO EGRESO');
        $sheet->getColumnDimension('H')->setWidth(15);
        $sheet->setCellValue('H4', 'AÑO TITULACIÓN');
        $sheet->getColumnDimension('I')->setWidth(15);
        $sheet->setCellValue('I4', 'CELULAR');
        $sheet->getColumnDimension('J')->setWidth(25);
        $sheet->setCellValue('J4', 'EMAIL');
        $sheet->getColumnDimension('K')->setWidth(35);
        $sheet->setCellValue('K4', 'CIUDAD');
        $sheet->getColumnDimension('L')->setWidth(35);
        $sheet->setCellValue('L4', 'DOMICILIO');
        $sheet->getColumnDimension('L')->setWidth(35);
        $sheet->setCellValue('M4', 'FECHA DE NACIMIENTO');
        $sheet->getColumnDimension('M')->setWidth(20);
        $sheet->setCellValue('N4', 'EDAD');
        $sheet->getColumnDimension('N')->setWidth(5);

        $sheet->getStyle('A4:N4')->getFont()->setBold(true);
        $sheet->getStyle('A4:N4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A4:N4')->getFont()->setSize(9);
        $sheet->getStyle('A4:N4')->getFont()->setName('Arial');

        //CONTENIDO TABLA
        $fila = 5;
        $nro = 1;
        foreach ($profesionales as $dato) {

            $fecha_nacimiento = $dato['fecha_nacimiento'];
            $fecha_actual = new DateTime();
            $fecha_nacimiento = new DateTime($fecha_nacimiento);
            $edad = $fecha_actual->diff($fecha_nacimiento);

            $sheet->setCellValue('A' . $fila, $nro);
            $sheet->setCellValue('B' . $fila, $dato['ap_paterno']);
            $sheet->setCellValue('C' . $fila, $dato['ap_materno']);
            $sheet->setCellValue('D' . $fila, $dato['nombres']);
            $sheet->setCellValue('E' . $fila, $dato['cedula']);
            $sheet->setCellValue('F' . $fila, $dato['ingreso']);
            $sheet->setCellValue('G' . $fila, $dato['egreso']);
            $sheet->setCellValue('H' . $fila, $dato["titulacion"]);
            $sheet->setCellValue('I' . $fila, $dato['celular']);
            $sheet->setCellValue('J' . $fila, $dato['email']);
            $sheet->setCellValue('K' . $fila, $dato['ciudad']);
            $sheet->setCellValue('L' . $fila, $dato['domicilio']);
            $sheet->setCellValue('M' . $fila, $dato['fecha_nacimiento']);
            $sheet->setCellValue('N' . $fila, $edad->y);
            $fila++;
            $nro++;
        }

        $ultimaFila = $fila - 1;
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ]
            ]
        ];
        $sheet->getStyle('A4:N' . $ultimaFila)->applyFromArray($styleArray);

        // Crea un objeto Writer para guardar la hoja de cálculo en formato XLSX
        $writer = new Xlsx($spreadsheet);

        // Guarda la hoja de cálculo en un buffer de salida
        ob_start();
        $writer->save('php://output');
        $fileContent = ob_get_clean();

        if ($activo == "1") {
            $estado = "Activos";
        } else {
            if ($activo == "0") {
                $estado = "Inactivos";
            } else {
                $estado = "General";
            }
        }

        // Envía las cabeceras HTTP adecuadas al navegador
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $titulo . '.xlsx"');
        header('Cache-Control: max-age=0');

        // Envía el archivo al navegador
        echo $fileContent;
        exit;
    }

    public function titulacion()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $menciones = $this->mencion->findAll();
        $data = ['titulo' => 'Buscar por gestión de Titulación de la Carrera', 'menciones' => $menciones];
        echo view('menu');
        echo view('reportes/titulacion', $data);
        echo view('footer');
    }

    public function reptitulacion()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasTitulacion)) {
            $activo = $this->request->getPost('estado');
            $mencion = $this->request->getPost('mencion');
            $titulacion = $this->request->getPost('titulacion');

            $nombre_mencion = $this->mencion->where('id', $mencion)->first();
            $titulo = "Titulados de " . $nombre_mencion['mencion'] . ' que se TITULARON el año ' . $titulacion;

            if ($activo == "2") {
                $profesionales = $this->titulado->reporteTitulacion($mencion, $titulacion);
            } else {
                $profesionales = $this->titulado->reporteTitulacionEstado($activo, $mencion, $titulacion);
            }

            $data = ['titulo' => $titulo, 'mencion' => $mencion, 'activo' => $activo, 'titulacion' => $titulacion, 'datos' => $profesionales];
            echo view('menu');
            echo view('reportes/vistaTitulacion', $data);
            echo view('footer');
        } else {
            $menciones = $this->mencion->findAll();
            $data = ['titulo' => 'Buscar por gestión de Titulación de la Carrera', 'menciones' => $menciones, 'validation' => $this->validator];
            echo view('menu');
            echo view('reportes/titulacion', $data);
            echo view('footer');
        }
    }

    public function excelTitulacion($mencion, $activo, $titulacion)
    {
        if ($activo == "2") {
            $profesionales = $this->titulado->reporteTitulacion($mencion, $titulacion);
        } else {
            $profesionales = $this->titulado->reporteTitulacionEstado($activo, $mencion, $titulacion);
        }
        $nombre_mencion = $this->mencion->where('id', $mencion)->first();
        $titulo = "Titulados de " . $nombre_mencion['mencion'] . ' que se TITULARON el año ' . $titulacion;

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        //TITULO
        $sheet->mergeCells("A2:N2");
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A2')->getFont()->setSize(14);
        $sheet->getStyle('A2')->getFont()->setName('Arial');
        $sheet->getStyle('A2')->getFont()->setBold(true);
        $sheet->setCellValue('A2', $titulo);

        //TITULOS TABLA
        $sheet->setCellValue('A4', 'NRO');
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->setCellValue('B4', 'AP PATERNO');
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->setCellValue('C4', 'AP MATERNO');
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->setCellValue('D4', 'NOMBRES');
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->setCellValue('E4', 'NRO CARNET');
        $sheet->getColumnDimension('E')->setWidth(20);
        // $sheet->setCellValue('F4', 'NRO MATRICULA');
        // $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->setCellValue('F4', 'AÑO INGRESO');
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->setCellValue('G4', 'AÑO EGRESO');
        $sheet->getColumnDimension('H')->setWidth(15);
        $sheet->setCellValue('H4', 'AÑO TITULACIÓN');
        $sheet->getColumnDimension('I')->setWidth(15);
        $sheet->setCellValue('I4', 'CELULAR');
        $sheet->getColumnDimension('J')->setWidth(25);
        $sheet->setCellValue('J4', 'EMAIL');
        $sheet->getColumnDimension('K')->setWidth(35);
        $sheet->setCellValue('K4', 'CIUDAD');
        $sheet->getColumnDimension('L')->setWidth(35);
        $sheet->setCellValue('L4', 'DOMICILIO');
        $sheet->getColumnDimension('L')->setWidth(35);
        $sheet->setCellValue('M4', 'FECHA DE NACIMIENTO');
        $sheet->getColumnDimension('M')->setWidth(20);
        $sheet->setCellValue('N4', 'EDAD');
        $sheet->getColumnDimension('N')->setWidth(5);

        $sheet->getStyle('A4:N4')->getFont()->setBold(true);
        $sheet->getStyle('A4:N4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A4:N4')->getFont()->setSize(9);
        $sheet->getStyle('A4:N4')->getFont()->setName('Arial');

        //CONTENIDO TABLA
        $fila = 5;
        $nro = 1;
        foreach ($profesionales as $dato) {

            $fecha_nacimiento = $dato['fecha_nacimiento'];
            $fecha_actual = new DateTime();
            $fecha_nacimiento = new DateTime($fecha_nacimiento);
            $edad = $fecha_actual->diff($fecha_nacimiento);

            $sheet->setCellValue('A' . $fila, $nro);
            $sheet->setCellValue('B' . $fila, $dato['ap_paterno']);
            $sheet->setCellValue('C' . $fila, $dato['ap_materno']);
            $sheet->setCellValue('D' . $fila, $dato['nombres']);
            $sheet->setCellValue('E' . $fila, $dato['cedula']);
            $sheet->setCellValue('F' . $fila, $dato['ingreso']);
            $sheet->setCellValue('G' . $fila, $dato['egreso']);
            $sheet->setCellValue('H' . $fila, $dato["titulacion"]);
            $sheet->setCellValue('I' . $fila, $dato['celular']);
            $sheet->setCellValue('J' . $fila, $dato['email']);
            $sheet->setCellValue('K' . $fila, $dato['ciudad']);
            $sheet->setCellValue('L' . $fila, $dato['domicilio']);
            $sheet->setCellValue('M' . $fila, $dato['fecha_nacimiento']);
            $sheet->setCellValue('N' . $fila, $edad->y);
            $fila++;
            $nro++;
        }

        $ultimaFila = $fila - 1;
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ]
            ]
        ];
        $sheet->getStyle('A4:N' . $ultimaFila)->applyFromArray($styleArray);

        // Crea un objeto Writer para guardar la hoja de cálculo en formato XLSX
        $writer = new Xlsx($spreadsheet);

        // Guarda la hoja de cálculo en un buffer de salida
        ob_start();
        $writer->save('php://output');
        $fileContent = ob_get_clean();

        if ($activo == "1") {
            $estado = "Activos";
        } else {
            if ($activo == "0") {
                $estado = "Inactivos";
            } else {
                $estado = "General";
            }
        }

        // Envía las cabeceras HTTP adecuadas al navegador
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $titulo . '.xlsx"');
        header('Cache-Control: max-age=0');

        // Envía el archivo al navegador
        echo $fileContent;
        exit;
    }

    public function genero()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        $menciones = $this->mencion->findAll();
        $data = ['titulo' => 'Buscar por Género de estudiante en la Carrera', 'menciones' => $menciones];
        echo view('menu');
        echo view('reportes/genero', $data);
        echo view('footer');
    }

    public function repgenero()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasGenero)) {
            $activo = $this->request->getPost('estado');
            $mencion = $this->request->getPost('mencion');
            $genero = $this->request->getPost('genero');

            $nombre_mencion = $this->mencion->where('id', $mencion)->first();
            $titulo = "Titulados de " . $nombre_mencion['mencion'] . ' de GENERO ' . $genero;

            if ($activo == "2") {
                $profesionales = $this->titulado->reporteGenero($mencion, $genero);
            } else {
                $profesionales = $this->titulado->reporteGeneroEstado($activo, $mencion, $genero);
            }

            $data = ['titulo' => $titulo, 'mencion' => $mencion, 'activo' => $activo, 'genero' => $genero, 'datos' => $profesionales];
            echo view('menu');
            echo view('reportes/vistaGenero', $data);
            echo view('footer');
        } else {
            $menciones = $this->mencion->findAll();
            $data = ['titulo' => 'Buscar por Género de estudiante en la Carrera', 'menciones' => $menciones, 'validation' => $this->validator];
            echo view('menu');
            echo view('reportes/genero', $data);
            echo view('footer');
        }
    }

    public function excelGenero($mencion, $activo, $genero)
    {
        if ($activo == "2") {
            $profesionales = $this->titulado->reporteGenero($mencion, $genero);
        } else {
            $profesionales = $this->titulado->reporteGeneroEstado($activo, $mencion, $genero);
        }

        $nombre_mencion = $this->mencion->where('id', $mencion)->first();
        $titulo = "Titulados de " . $nombre_mencion['mencion'] . ' de GENERO ' . $genero;
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        //TITULO
        $sheet->mergeCells("A2:N2");
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A2')->getFont()->setSize(14);
        $sheet->getStyle('A2')->getFont()->setName('Arial');
        $sheet->getStyle('A2')->getFont()->setBold(true);
        $sheet->setCellValue('A2', $titulo);

        //TITULOS TABLA
        $sheet->setCellValue('A4', 'NRO');
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->setCellValue('B4', 'AP PATERNO');
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->setCellValue('C4', 'AP MATERNO');
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->setCellValue('D4', 'NOMBRES');
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->setCellValue('E4', 'NRO CARNET');
        $sheet->getColumnDimension('E')->setWidth(20);
        // $sheet->setCellValue('F4', 'NRO MATRICULA');
        // $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->setCellValue('F4', 'AÑO INGRESO');
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->setCellValue('G4', 'AÑO EGRESO');
        $sheet->getColumnDimension('H')->setWidth(15);
        $sheet->setCellValue('H4', 'AÑO TITULACIÓN');
        $sheet->getColumnDimension('I')->setWidth(15);
        $sheet->setCellValue('I4', 'CELULAR');
        $sheet->getColumnDimension('J')->setWidth(25);
        $sheet->setCellValue('J4', 'EMAIL');
        $sheet->getColumnDimension('K')->setWidth(35);
        $sheet->setCellValue('K4', 'CIUDAD');
        $sheet->getColumnDimension('L')->setWidth(35);
        $sheet->setCellValue('L4', 'DOMICILIO');
        $sheet->getColumnDimension('L')->setWidth(35);
        $sheet->setCellValue('M4', 'FECHA DE NACIMIENTO');
        $sheet->getColumnDimension('M')->setWidth(20);
        $sheet->setCellValue('N4', 'EDAD');
        $sheet->getColumnDimension('N')->setWidth(5);

        $sheet->getStyle('A4:N4')->getFont()->setBold(true);
        $sheet->getStyle('A4:N4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A4:N4')->getFont()->setSize(9);
        $sheet->getStyle('A4:N4')->getFont()->setName('Arial');

        //CONTENIDO TABLA
        $fila = 5;
        $nro = 1;
        foreach ($profesionales as $dato) {

            $fecha_nacimiento = $dato['fecha_nacimiento'];
            $fecha_actual = new DateTime();
            $fecha_nacimiento = new DateTime($fecha_nacimiento);
            $edad = $fecha_actual->diff($fecha_nacimiento);

            $sheet->setCellValue('A' . $fila, $nro);
            $sheet->setCellValue('B' . $fila, $dato['ap_paterno']);
            $sheet->setCellValue('C' . $fila, $dato['ap_materno']);
            $sheet->setCellValue('D' . $fila, $dato['nombres']);
            $sheet->setCellValue('E' . $fila, $dato['cedula']);
            $sheet->setCellValue('F' . $fila, $dato['ingreso']);
            $sheet->setCellValue('G' . $fila, $dato['egreso']);
            $sheet->setCellValue('H' . $fila, $dato["titulacion"]);
            $sheet->setCellValue('I' . $fila, $dato['celular']);
            $sheet->setCellValue('J' . $fila, $dato['email']);
            $sheet->setCellValue('K' . $fila, $dato['ciudad']);
            $sheet->setCellValue('L' . $fila, $dato['domicilio']);
            $sheet->setCellValue('M' . $fila, $dato['fecha_nacimiento']);
            $sheet->setCellValue('N' . $fila, $edad->y);
            $fila++;
            $nro++;
        }

        $ultimaFila = $fila - 1;
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ]
            ]
        ];
        $sheet->getStyle('A4:N' . $ultimaFila)->applyFromArray($styleArray);

        // Crea un objeto Writer para guardar la hoja de cálculo en formato XLSX
        $writer = new Xlsx($spreadsheet);

        // Guarda la hoja de cálculo en un buffer de salida
        ob_start();
        $writer->save('php://output');
        $fileContent = ob_get_clean();

        if ($activo == "1") {
            $estado = "Activos";
        } else {
            if ($activo == "0") {
                $estado = "Inactivos";
            } else {
                $estado = "General";
            }
        }

        // Envía las cabeceras HTTP adecuadas al navegador
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $titulo . '.xlsx"');
        header('Cache-Control: max-age=0');

        // Envía el archivo al navegador
        echo $fileContent;
        exit;
    }
}
