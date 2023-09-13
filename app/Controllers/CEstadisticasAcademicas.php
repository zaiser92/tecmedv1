<?php

namespace App\Controllers;

use App\Models\MExpAcademica;
use App\Models\MProfesional;
use App\Models\MTitula;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \DateTime;

class CEstadisticasAcademicas extends BaseController
{
    protected $profesionales, $reglasCambia, $reglas, $session, $seminarios, $titulado, $expAcademica;
    public function __construct()
    {
        $this->profesionales = new MProfesional();
        $this->titulado = new MTitula();
        $this->expAcademica = new MExpAcademica();
        $this->session = session();
    }
    public function index()
    {
        if ((!isset($this->session->id_profesional))) {
            if (!isset($this->session->id_administrador)) {
                return redirect()->to(base_url());
            }
        }

        $bio = 1;
        $fis = 2;
        $lab = 3;
        $rad = 3;

        $calificacion1 = 1;
        $calificacion2 = 2;
        $calificacion3 = 3;
        $calificacion4 = 4;
        $calificacion5 = 5;
        $totalCarrera = $this->expAcademica->countAllResults();
        $totalBioimagenologia = $this->expAcademica->where('id_mencion', $bio)->countAllResults();
        $totalFisioterapia = $this->expAcademica->where('id_mencion', $fis)->countAllResults();
        $totalLaboratorio = $this->expAcademica->where('id_mencion', $lab)->countAllResults();
        $totalRadiologia = $this->expAcademica->where('id_mencion', $rad)->countAllResults();

        $carrera = $this->expAcademica->select('
            COALESCE(COUNT(CASE WHEN prep_academica = 1 THEN 1 END), 0) AS p1_1,
            COALESCE(COUNT(CASE WHEN prep_academica = 2 THEN 1 END), 0) AS p1_2,
            COALESCE(COUNT(CASE WHEN prep_academica = 3 THEN 1 END), 0) AS p1_3,
            COALESCE(COUNT(CASE WHEN prep_academica = 4 THEN 1 END), 0) AS p1_4,
            COALESCE(COUNT(CASE WHEN prep_academica = 5 THEN 1 END), 0) AS p1_5,

            COALESCE(COUNT(CASE WHEN plan_estudios = 1 THEN 1 END), 0) AS p2_1,
            COALESCE(COUNT(CASE WHEN plan_estudios = 2 THEN 1 END), 0) AS p2_2,
            COALESCE(COUNT(CASE WHEN plan_estudios = 3 THEN 1 END), 0) AS p2_3,
            COALESCE(COUNT(CASE WHEN plan_estudios = 4 THEN 1 END), 0) AS p2_4,
            COALESCE(COUNT(CASE WHEN plan_estudios = 5 THEN 1 END), 0) AS p2_5,

            COALESCE(COUNT(CASE WHEN asignaturas = 1 THEN 1 END), 0) AS p3_1,
            COALESCE(COUNT(CASE WHEN asignaturas = 2 THEN 1 END), 0) AS p3_2,
            COALESCE(COUNT(CASE WHEN asignaturas = 3 THEN 1 END), 0) AS p3_3,
            COALESCE(COUNT(CASE WHEN asignaturas = 4 THEN 1 END), 0) AS p3_4,
            COALESCE(COUNT(CASE WHEN asignaturas = 5 THEN 1 END), 0) AS p3_5,

            COALESCE(COUNT(CASE WHEN equipamento = 1 THEN 1 END), 0) AS p4_1,
            COALESCE(COUNT(CASE WHEN equipamento = 2 THEN 1 END), 0) AS p4_2,
            COALESCE(COUNT(CASE WHEN equipamento = 3 THEN 1 END), 0) AS p4_3,
            COALESCE(COUNT(CASE WHEN equipamento = 4 THEN 1 END), 0) AS p4_4,
            COALESCE(COUNT(CASE WHEN equipamento = 5 THEN 1 END), 0) AS p4_5,

            COALESCE(COUNT(CASE WHEN infraestructura = 1 THEN 1 END), 0) AS p5_1,
            COALESCE(COUNT(CASE WHEN infraestructura = 2 THEN 1 END), 0) AS p5_2,
            COALESCE(COUNT(CASE WHEN infraestructura = 3 THEN 1 END), 0) AS p5_3,
            COALESCE(COUNT(CASE WHEN infraestructura = 4 THEN 1 END), 0) AS p5_4,
            COALESCE(COUNT(CASE WHEN infraestructura = 5 THEN 1 END), 0) AS p5_5,

            COALESCE(COUNT(CASE WHEN biblioteca = 1 THEN 1 END), 0) AS p6_1,
            COALESCE(COUNT(CASE WHEN biblioteca = 2 THEN 1 END), 0) AS p6_2,
            COALESCE(COUNT(CASE WHEN biblioteca = 3 THEN 1 END), 0) AS p6_3,
            COALESCE(COUNT(CASE WHEN biblioteca = 4 THEN 1 END), 0) AS p6_4,
            COALESCE(COUNT(CASE WHEN biblioteca = 5 THEN 1 END), 0) AS p6_5,

            COALESCE(COUNT(CASE WHEN tutoria_docente = 1 THEN 1 END), 0) AS p7_1,
            COALESCE(COUNT(CASE WHEN tutoria_docente = 2 THEN 1 END), 0) AS p7_2,
            COALESCE(COUNT(CASE WHEN tutoria_docente = 3 THEN 1 END), 0) AS p7_3,
            COALESCE(COUNT(CASE WHEN tutoria_docente = 4 THEN 1 END), 0) AS p7_4,
            COALESCE(COUNT(CASE WHEN tutoria_docente = 5 THEN 1 END), 0) AS p7_5,

            COALESCE(COUNT(CASE WHEN actividades_academicas = 1 THEN 1 END), 0) AS p8_1,
            COALESCE(COUNT(CASE WHEN actividades_academicas = 2 THEN 1 END), 0) AS p8_2,
            COALESCE(COUNT(CASE WHEN actividades_academicas = 3 THEN 1 END), 0) AS p8_3,
            COALESCE(COUNT(CASE WHEN actividades_academicas = 4 THEN 1 END), 0) AS p8_4,
            COALESCE(COUNT(CASE WHEN actividades_academicas = 5 THEN 1 END), 0) AS p8_5,

            COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 1 THEN 1 END), 0) AS p9_1,
            COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 2 THEN 1 END), 0) AS p9_2,
            COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 3 THEN 1 END), 0) AS p9_3,
            COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 4 THEN 1 END), 0) AS p9_4,
            COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 5 THEN 1 END), 0) AS p9_5,

            COALESCE(COUNT(CASE WHEN sociedad_cientifica = 1 THEN 1 END), 0) AS p10_1,
            COALESCE(COUNT(CASE WHEN sociedad_cientifica = 2 THEN 1 END), 0) AS p10_2,
            COALESCE(COUNT(CASE WHEN sociedad_cientifica = 3 THEN 1 END), 0) AS p10_3,
            COALESCE(COUNT(CASE WHEN sociedad_cientifica = 4 THEN 1 END), 0) AS p10_4,
            COALESCE(COUNT(CASE WHEN sociedad_cientifica = 5 THEN 1 END), 0) AS p10_5,

            COALESCE(COUNT(CASE WHEN internado_rotatorio = 1 THEN 1 END), 0) AS p11_1,
            COALESCE(COUNT(CASE WHEN internado_rotatorio = 2 THEN 1 END), 0) AS p11_2,
            COALESCE(COUNT(CASE WHEN internado_rotatorio = 3 THEN 1 END), 0) AS p11_3,
            COALESCE(COUNT(CASE WHEN internado_rotatorio = 4 THEN 1 END), 0) AS p11_4,
            COALESCE(COUNT(CASE WHEN internado_rotatorio = 5 THEN 1 END), 0) AS p11_5,

            COALESCE(COUNT(CASE WHEN perfil_profesional = 1 THEN 1 END), 0) AS p12_1,
            COALESCE(COUNT(CASE WHEN perfil_profesional = 2 THEN 1 END), 0) AS p12_2,
            COALESCE(COUNT(CASE WHEN perfil_profesional = 3 THEN 1 END), 0) AS p12_3,
            COALESCE(COUNT(CASE WHEN perfil_profesional = 4 THEN 1 END), 0) AS p12_4,
            COALESCE(COUNT(CASE WHEN perfil_profesional = 5 THEN 1 END), 0) AS p12_5,
        ')->first();

        //PREGUNTA 1 - CARRERA
        $p1_1 = $carrera['p1_1'];
        $p1_2 = $carrera['p1_2'];
        $p1_3 = $carrera['p1_3'];
        $p1_4 = $carrera['p1_4'];
        $p1_5 = $carrera['p1_5'];
        //PREGUNTA 2 - CARRERA
        $p2_1 = $carrera['p2_1'];
        $p2_2 = $carrera['p2_2'];
        $p2_3 = $carrera['p2_3'];
        $p2_4 = $carrera['p2_4'];
        $p2_5 = $carrera['p2_5'];
        //PREGUNTA 3 - CARRERA
        $p3_1 = $carrera['p3_1'];
        $p3_2 = $carrera['p3_2'];
        $p3_3 = $carrera['p3_3'];
        $p3_4 = $carrera['p3_4'];
        $p3_5 = $carrera['p3_5'];
        //PREGUNTA 4 - CARRERA
        $p4_1 = $carrera['p4_1'];
        $p4_2 = $carrera['p4_2'];
        $p4_3 = $carrera['p4_3'];
        $p4_4 = $carrera['p4_4'];
        $p4_5 = $carrera['p4_5'];
        //PREGUNTA 5 - CARRERA
        $p5_1 = $carrera['p5_1'];
        $p5_2 = $carrera['p5_2'];
        $p5_3 = $carrera['p5_3'];
        $p5_4 = $carrera['p5_4'];
        $p5_5 = $carrera['p5_5'];
        //PREGUNTA 6 - CARRERA
        $p6_1 = $carrera['p6_1'];
        $p6_2 = $carrera['p6_2'];
        $p6_3 = $carrera['p6_3'];
        $p6_4 = $carrera['p6_4'];
        $p6_5 = $carrera['p6_5'];
        //PREGUNTA 7 - CARRERA
        $p7_1 = $carrera['p7_1'];
        $p7_2 = $carrera['p7_2'];
        $p7_3 = $carrera['p7_3'];
        $p7_4 = $carrera['p7_4'];
        $p7_5 = $carrera['p7_5'];
        //PREGUNTA 8 - CARRERA
        $p8_1 = $carrera['p8_1'];
        $p8_2 = $carrera['p8_2'];
        $p8_3 = $carrera['p8_3'];
        $p8_4 = $carrera['p8_4'];
        $p8_5 = $carrera['p8_5'];
        //PREGUNTA 9 - CARRERA
        $p9_1 = $carrera['p9_1'];
        $p9_2 = $carrera['p9_2'];
        $p9_3 = $carrera['p9_3'];
        $p9_4 = $carrera['p9_4'];
        $p9_5 = $carrera['p9_5'];
        //PREGUNTA 10 - CARRERA
        $p10_1 = $carrera['p10_1'];
        $p10_2 = $carrera['p10_2'];
        $p10_3 = $carrera['p10_3'];
        $p10_4 = $carrera['p10_4'];
        $p10_5 = $carrera['p10_5'];
        //PREGUNTA 11 - CARRERA
        $p11_1 = $carrera['p11_1'];
        $p11_2 = $carrera['p11_2'];
        $p11_3 = $carrera['p11_3'];
        $p11_4 = $carrera['p11_4'];
        $p11_5 = $carrera['p11_5'];
        //PREGUNTA 12 - CARRERA
        $p12_1 = $carrera['p12_1'];
        $p12_2 = $carrera['p12_2'];
        $p12_3 = $carrera['p12_3'];
        $p12_4 = $carrera['p12_4'];
        $p12_5 = $carrera['p12_5'];

        $bioimagenologia = $this->expAcademica->select('
        COALESCE(COUNT(CASE WHEN prep_academica = 1 THEN 1 END), 0) AS p1B_1,
        COALESCE(COUNT(CASE WHEN prep_academica = 2 THEN 1 END), 0) AS p1B_2,
        COALESCE(COUNT(CASE WHEN prep_academica = 3 THEN 1 END), 0) AS p1B_3,
        COALESCE(COUNT(CASE WHEN prep_academica = 4 THEN 1 END), 0) AS p1B_4,
        COALESCE(COUNT(CASE WHEN prep_academica = 5 THEN 1 END), 0) AS p1B_5,

        COALESCE(COUNT(CASE WHEN plan_estudios = 1 THEN 1 END), 0) AS p2B_1,
        COALESCE(COUNT(CASE WHEN plan_estudios = 2 THEN 1 END), 0) AS p2B_2,
        COALESCE(COUNT(CASE WHEN plan_estudios = 3 THEN 1 END), 0) AS p2B_3,
        COALESCE(COUNT(CASE WHEN plan_estudios = 4 THEN 1 END), 0) AS p2B_4,
        COALESCE(COUNT(CASE WHEN plan_estudios = 5 THEN 1 END), 0) AS p2B_5,

        COALESCE(COUNT(CASE WHEN asignaturas = 1 THEN 1 END), 0) AS p3B_1,
        COALESCE(COUNT(CASE WHEN asignaturas = 2 THEN 1 END), 0) AS p3B_2,
        COALESCE(COUNT(CASE WHEN asignaturas = 3 THEN 1 END), 0) AS p3B_3,
        COALESCE(COUNT(CASE WHEN asignaturas = 4 THEN 1 END), 0) AS p3B_4,
        COALESCE(COUNT(CASE WHEN asignaturas = 5 THEN 1 END), 0) AS p3B_5,

        COALESCE(COUNT(CASE WHEN equipamento = 1 THEN 1 END), 0) AS p4B_1,
        COALESCE(COUNT(CASE WHEN equipamento = 2 THEN 1 END), 0) AS p4B_2,
        COALESCE(COUNT(CASE WHEN equipamento = 3 THEN 1 END), 0) AS p4B_3,
        COALESCE(COUNT(CASE WHEN equipamento = 4 THEN 1 END), 0) AS p4B_4,
        COALESCE(COUNT(CASE WHEN equipamento = 5 THEN 1 END), 0) AS p4B_5,

        COALESCE(COUNT(CASE WHEN infraestructura = 1 THEN 1 END), 0) AS p5B_1,
        COALESCE(COUNT(CASE WHEN infraestructura = 2 THEN 1 END), 0) AS p5B_2,
        COALESCE(COUNT(CASE WHEN infraestructura = 3 THEN 1 END), 0) AS p5B_3,
        COALESCE(COUNT(CASE WHEN infraestructura = 4 THEN 1 END), 0) AS p5B_4,
        COALESCE(COUNT(CASE WHEN infraestructura = 5 THEN 1 END), 0) AS p5B_5,

        COALESCE(COUNT(CASE WHEN biblioteca = 1 THEN 1 END), 0) AS p6B_1,
        COALESCE(COUNT(CASE WHEN biblioteca = 2 THEN 1 END), 0) AS p6B_2,
        COALESCE(COUNT(CASE WHEN biblioteca = 3 THEN 1 END), 0) AS p6B_3,
        COALESCE(COUNT(CASE WHEN biblioteca = 4 THEN 1 END), 0) AS p6B_4,
        COALESCE(COUNT(CASE WHEN biblioteca = 5 THEN 1 END), 0) AS p6B_5,

        COALESCE(COUNT(CASE WHEN tutoria_docente = 1 THEN 1 END), 0) AS p7B_1,
        COALESCE(COUNT(CASE WHEN tutoria_docente = 2 THEN 1 END), 0) AS p7B_2,
        COALESCE(COUNT(CASE WHEN tutoria_docente = 3 THEN 1 END), 0) AS p7B_3,
        COALESCE(COUNT(CASE WHEN tutoria_docente = 4 THEN 1 END), 0) AS p7B_4,
        COALESCE(COUNT(CASE WHEN tutoria_docente = 5 THEN 1 END), 0) AS p7B_5,

        COALESCE(COUNT(CASE WHEN actividades_academicas = 1 THEN 1 END), 0) AS p8B_1,
        COALESCE(COUNT(CASE WHEN actividades_academicas = 2 THEN 1 END), 0) AS p8B_2,
        COALESCE(COUNT(CASE WHEN actividades_academicas = 3 THEN 1 END), 0) AS p8B_3,
        COALESCE(COUNT(CASE WHEN actividades_academicas = 4 THEN 1 END), 0) AS p8B_4,
        COALESCE(COUNT(CASE WHEN actividades_academicas = 5 THEN 1 END), 0) AS p8B_5,

        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 1 THEN 1 END), 0) AS p9B_1,
        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 2 THEN 1 END), 0) AS p9B_2,
        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 3 THEN 1 END), 0) AS p9B_3,
        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 4 THEN 1 END), 0) AS p9B_4,
        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 5 THEN 1 END), 0) AS p9B_5,

        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 1 THEN 1 END), 0) AS p10B_1,
        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 2 THEN 1 END), 0) AS p10B_2,
        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 3 THEN 1 END), 0) AS p10B_3,
        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 4 THEN 1 END), 0) AS p10B_4,
        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 5 THEN 1 END), 0) AS p10B_5,

        COALESCE(COUNT(CASE WHEN internado_rotatorio = 1 THEN 1 END), 0) AS p11B_1,
        COALESCE(COUNT(CASE WHEN internado_rotatorio = 2 THEN 1 END), 0) AS p11B_2,
        COALESCE(COUNT(CASE WHEN internado_rotatorio = 3 THEN 1 END), 0) AS p11B_3,
        COALESCE(COUNT(CASE WHEN internado_rotatorio = 4 THEN 1 END), 0) AS p11B_4,
        COALESCE(COUNT(CASE WHEN internado_rotatorio = 5 THEN 1 END), 0) AS p11B_5,

        COALESCE(COUNT(CASE WHEN perfil_profesional = 1 THEN 1 END), 0) AS p12B_1,
        COALESCE(COUNT(CASE WHEN perfil_profesional = 2 THEN 1 END), 0) AS p12B_2,
        COALESCE(COUNT(CASE WHEN perfil_profesional = 3 THEN 1 END), 0) AS p12B_3,
        COALESCE(COUNT(CASE WHEN perfil_profesional = 4 THEN 1 END), 0) AS p12B_4,
        COALESCE(COUNT(CASE WHEN perfil_profesional = 5 THEN 1 END), 0) AS p12B_5,
    ')->where('id_mencion', $bio)->first();

        //PREGUNTA 1 - BIOIMAGENOLOGIA
        $p1B_1 = $bioimagenologia['p1B_1'];
        $p1B_2 = $bioimagenologia['p1B_2'];
        $p1B_3 = $bioimagenologia['p1B_3'];
        $p1B_4 = $bioimagenologia['p1B_4'];
        $p1B_5 = $bioimagenologia['p1B_5'];
        //PREGUNTA 2 - BIOIMAGENOLOGIA
        $p2B_1 = $bioimagenologia['p2B_1'];
        $p2B_2 = $bioimagenologia['p2B_2'];
        $p2B_3 = $bioimagenologia['p2B_3'];
        $p2B_4 = $bioimagenologia['p2B_4'];
        $p2B_5 = $bioimagenologia['p2B_5'];
        //PREGUNTA 3 - BIOIMAGENOLOGIA
        $p3B_1 = $bioimagenologia['p3B_1'];
        $p3B_2 = $bioimagenologia['p3B_2'];
        $p3B_3 = $bioimagenologia['p3B_3'];
        $p3B_4 = $bioimagenologia['p3B_4'];
        $p3B_5 = $bioimagenologia['p3B_5'];
        //PREGUNTA 4 - BIOIMAGENOLOGIA
        $p4B_1 = $bioimagenologia['p4B_1'];
        $p4B_2 = $bioimagenologia['p4B_2'];
        $p4B_3 = $bioimagenologia['p4B_3'];
        $p4B_4 = $bioimagenologia['p4B_4'];
        $p4B_5 = $bioimagenologia['p4B_5'];
        //PREGUNTA 5 - BIOIMAGENOLOGIA
        $p5B_1 = $bioimagenologia['p5B_1'];
        $p5B_2 = $bioimagenologia['p5B_2'];
        $p5B_3 = $bioimagenologia['p5B_3'];
        $p5B_4 = $bioimagenologia['p5B_4'];
        $p5B_5 = $bioimagenologia['p5B_5'];
        //PREGUNTA 6 - BIOIMAGENOLOGIA
        $p6B_1 = $bioimagenologia['p6B_1'];
        $p6B_2 = $bioimagenologia['p6B_2'];
        $p6B_3 = $bioimagenologia['p6B_3'];
        $p6B_4 = $bioimagenologia['p6B_4'];
        $p6B_5 = $bioimagenologia['p6B_5'];
        //PREGUNTA 7 - BIOIMAGENOLOGIA
        $p7B_1 = $bioimagenologia['p7B_1'];
        $p7B_2 = $bioimagenologia['p7B_2'];
        $p7B_3 = $bioimagenologia['p7B_3'];
        $p7B_4 = $bioimagenologia['p7B_4'];
        $p7B_5 = $bioimagenologia['p7B_5'];
        //PREGUNTA 8 - BIOIMAGENOLOGIA
        $p8B_1 = $bioimagenologia['p8B_1'];
        $p8B_2 = $bioimagenologia['p8B_2'];
        $p8B_3 = $bioimagenologia['p8B_3'];
        $p8B_4 = $bioimagenologia['p8B_4'];
        $p8B_5 = $bioimagenologia['p8B_5'];
        //PREGUNTA 9 - BIOIMAGENOLOGIA
        $p9B_1 = $bioimagenologia['p9B_1'];
        $p9B_2 = $bioimagenologia['p9B_2'];
        $p9B_3 = $bioimagenologia['p9B_3'];
        $p9B_4 = $bioimagenologia['p9B_4'];
        $p9B_5 = $bioimagenologia['p9B_5'];
        //PREGUNTA 10 - BIOIMAGENOLOGIA
        $p10B_1 = $bioimagenologia['p10B_1'];
        $p10B_2 = $bioimagenologia['p10B_2'];
        $p10B_3 = $bioimagenologia['p10B_3'];
        $p10B_4 = $bioimagenologia['p10B_4'];
        $p10B_5 = $bioimagenologia['p10B_5'];
        //PREGUNTA 11 - BIOIMAGENOLOGIA
        $p11B_1 = $bioimagenologia['p11B_1'];
        $p11B_2 = $bioimagenologia['p11B_2'];
        $p11B_3 = $bioimagenologia['p11B_3'];
        $p11B_4 = $bioimagenologia['p11B_4'];
        $p11B_5 = $bioimagenologia['p11B_5'];
        //PREGUNTA 12 - BIOIMAGENOLOGIA
        $p12B_1 = $bioimagenologia['p12B_1'];
        $p12B_2 = $bioimagenologia['p12B_2'];
        $p12B_3 = $bioimagenologia['p12B_3'];
        $p12B_4 = $bioimagenologia['p12B_4'];
        $p12B_5 = $bioimagenologia['p12B_5'];

        $fisioterapia = $this->expAcademica->select('
        COALESCE(COUNT(CASE WHEN prep_academica = 1 THEN 1 END), 0) AS p1F_1,
        COALESCE(COUNT(CASE WHEN prep_academica = 2 THEN 1 END), 0) AS p1F_2,
        COALESCE(COUNT(CASE WHEN prep_academica = 3 THEN 1 END), 0) AS p1F_3,
        COALESCE(COUNT(CASE WHEN prep_academica = 4 THEN 1 END), 0) AS p1F_4,
        COALESCE(COUNT(CASE WHEN prep_academica = 5 THEN 1 END), 0) AS p1F_5,

        COALESCE(COUNT(CASE WHEN plan_estudios = 1 THEN 1 END), 0) AS p2F_1,
        COALESCE(COUNT(CASE WHEN plan_estudios = 2 THEN 1 END), 0) AS p2F_2,
        COALESCE(COUNT(CASE WHEN plan_estudios = 3 THEN 1 END), 0) AS p2F_3,
        COALESCE(COUNT(CASE WHEN plan_estudios = 4 THEN 1 END), 0) AS p2F_4,
        COALESCE(COUNT(CASE WHEN plan_estudios = 5 THEN 1 END), 0) AS p2F_5,

        COALESCE(COUNT(CASE WHEN asignaturas = 1 THEN 1 END), 0) AS p3F_1,
        COALESCE(COUNT(CASE WHEN asignaturas = 2 THEN 1 END), 0) AS p3F_2,
        COALESCE(COUNT(CASE WHEN asignaturas = 3 THEN 1 END), 0) AS p3F_3,
        COALESCE(COUNT(CASE WHEN asignaturas = 4 THEN 1 END), 0) AS p3F_4,
        COALESCE(COUNT(CASE WHEN asignaturas = 5 THEN 1 END), 0) AS p3F_5,

        COALESCE(COUNT(CASE WHEN equipamento = 1 THEN 1 END), 0) AS p4F_1,
        COALESCE(COUNT(CASE WHEN equipamento = 2 THEN 1 END), 0) AS p4F_2,
        COALESCE(COUNT(CASE WHEN equipamento = 3 THEN 1 END), 0) AS p4F_3,
        COALESCE(COUNT(CASE WHEN equipamento = 4 THEN 1 END), 0) AS p4F_4,
        COALESCE(COUNT(CASE WHEN equipamento = 5 THEN 1 END), 0) AS p4F_5,

        COALESCE(COUNT(CASE WHEN infraestructura = 1 THEN 1 END), 0) AS p5F_1,
        COALESCE(COUNT(CASE WHEN infraestructura = 2 THEN 1 END), 0) AS p5F_2,
        COALESCE(COUNT(CASE WHEN infraestructura = 3 THEN 1 END), 0) AS p5F_3,
        COALESCE(COUNT(CASE WHEN infraestructura = 4 THEN 1 END), 0) AS p5F_4,
        COALESCE(COUNT(CASE WHEN infraestructura = 5 THEN 1 END), 0) AS p5F_5,

        COALESCE(COUNT(CASE WHEN biblioteca = 1 THEN 1 END), 0) AS p6F_1,
        COALESCE(COUNT(CASE WHEN biblioteca = 2 THEN 1 END), 0) AS p6F_2,
        COALESCE(COUNT(CASE WHEN biblioteca = 3 THEN 1 END), 0) AS p6F_3,
        COALESCE(COUNT(CASE WHEN biblioteca = 4 THEN 1 END), 0) AS p6F_4,
        COALESCE(COUNT(CASE WHEN biblioteca = 5 THEN 1 END), 0) AS p6F_5,

        COALESCE(COUNT(CASE WHEN tutoria_docente = 1 THEN 1 END), 0) AS p7F_1,
        COALESCE(COUNT(CASE WHEN tutoria_docente = 2 THEN 1 END), 0) AS p7F_2,
        COALESCE(COUNT(CASE WHEN tutoria_docente = 3 THEN 1 END), 0) AS p7F_3,
        COALESCE(COUNT(CASE WHEN tutoria_docente = 4 THEN 1 END), 0) AS p7F_4,
        COALESCE(COUNT(CASE WHEN tutoria_docente = 5 THEN 1 END), 0) AS p7F_5,

        COALESCE(COUNT(CASE WHEN actividades_academicas = 1 THEN 1 END), 0) AS p8F_1,
        COALESCE(COUNT(CASE WHEN actividades_academicas = 2 THEN 1 END), 0) AS p8F_2,
        COALESCE(COUNT(CASE WHEN actividades_academicas = 3 THEN 1 END), 0) AS p8F_3,
        COALESCE(COUNT(CASE WHEN actividades_academicas = 4 THEN 1 END), 0) AS p8F_4,
        COALESCE(COUNT(CASE WHEN actividades_academicas = 5 THEN 1 END), 0) AS p8F_5,

        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 1 THEN 1 END), 0) AS p9F_1,
        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 2 THEN 1 END), 0) AS p9F_2,
        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 3 THEN 1 END), 0) AS p9F_3,
        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 4 THEN 1 END), 0) AS p9F_4,
        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 5 THEN 1 END), 0) AS p9F_5,

        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 1 THEN 1 END), 0) AS p10F_1,
        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 2 THEN 1 END), 0) AS p10F_2,
        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 3 THEN 1 END), 0) AS p10F_3,
        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 4 THEN 1 END), 0) AS p10F_4,
        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 5 THEN 1 END), 0) AS p10F_5,

        COALESCE(COUNT(CASE WHEN internado_rotatorio = 1 THEN 1 END), 0) AS p11F_1,
        COALESCE(COUNT(CASE WHEN internado_rotatorio = 2 THEN 1 END), 0) AS p11F_2,
        COALESCE(COUNT(CASE WHEN internado_rotatorio = 3 THEN 1 END), 0) AS p11F_3,
        COALESCE(COUNT(CASE WHEN internado_rotatorio = 4 THEN 1 END), 0) AS p11F_4,
        COALESCE(COUNT(CASE WHEN internado_rotatorio = 5 THEN 1 END), 0) AS p11F_5,

        COALESCE(COUNT(CASE WHEN perfil_profesional = 1 THEN 1 END), 0) AS p12F_1,
        COALESCE(COUNT(CASE WHEN perfil_profesional = 2 THEN 1 END), 0) AS p12F_2,
        COALESCE(COUNT(CASE WHEN perfil_profesional = 3 THEN 1 END), 0) AS p12F_3,
        COALESCE(COUNT(CASE WHEN perfil_profesional = 4 THEN 1 END), 0) AS p12F_4,
        COALESCE(COUNT(CASE WHEN perfil_profesional = 5 THEN 1 END), 0) AS p12F_5,
    ')->where('id_mencion', $fis)->first();

        //PREGUNTA 1 - FISIOTERAPIA
        $p1F_1 = $fisioterapia['p1F_1'];
        $p1F_2 = $fisioterapia['p1F_2'];
        $p1F_3 = $fisioterapia['p1F_3'];
        $p1F_4 = $fisioterapia['p1F_4'];
        $p1F_5 = $fisioterapia['p1F_5'];
        //PREGUNTA 2 - FISIOTERAPIA
        $p2F_1 = $fisioterapia['p2F_1'];
        $p2F_2 = $fisioterapia['p2F_2'];
        $p2F_3 = $fisioterapia['p2F_3'];
        $p2F_4 = $fisioterapia['p2F_4'];
        $p2F_5 = $fisioterapia['p2F_5'];
        //PREGUNTA 3 - FISIOTERAPIA
        $p3F_1 = $fisioterapia['p3F_1'];
        $p3F_2 = $fisioterapia['p3F_2'];
        $p3F_3 = $fisioterapia['p3F_3'];
        $p3F_4 = $fisioterapia['p3F_4'];
        $p3F_5 = $fisioterapia['p3F_5'];
        //PREGUNTA 4 - FISIOTERAPIA
        $p4F_1 = $fisioterapia['p4F_1'];
        $p4F_2 = $fisioterapia['p4F_2'];
        $p4F_3 = $fisioterapia['p4F_3'];
        $p4F_4 = $fisioterapia['p4F_4'];
        $p4F_5 = $fisioterapia['p4F_5'];
        //PREGUNTA 5 - FISIOTERAPIA
        $p5F_1 = $fisioterapia['p5F_1'];
        $p5F_2 = $fisioterapia['p5F_2'];
        $p5F_3 = $fisioterapia['p5F_3'];
        $p5F_4 = $fisioterapia['p5F_4'];
        $p5F_5 = $fisioterapia['p5F_5'];
        //PREGUNTA 6 - FISIOTERAPIA
        $p6F_1 = $fisioterapia['p6F_1'];
        $p6F_2 = $fisioterapia['p6F_2'];
        $p6F_3 = $fisioterapia['p6F_3'];
        $p6F_4 = $fisioterapia['p6F_4'];
        $p6F_5 = $fisioterapia['p6F_5'];
        //PREGUNTA 7 - FISIOTERAPIA
        $p7F_1 = $fisioterapia['p7F_1'];
        $p7F_2 = $fisioterapia['p7F_2'];
        $p7F_3 = $fisioterapia['p7F_3'];
        $p7F_4 = $fisioterapia['p7F_4'];
        $p7F_5 = $fisioterapia['p7F_5'];
        //PREGUNTA 8 - FISIOTERAPIA
        $p8F_1 = $fisioterapia['p8F_1'];
        $p8F_2 = $fisioterapia['p8F_2'];
        $p8F_3 = $fisioterapia['p8F_3'];
        $p8F_4 = $fisioterapia['p8F_4'];
        $p8F_5 = $fisioterapia['p8F_5'];
        //PREGUNTA 9 - FISIOTERAPIA
        $p9F_1 = $fisioterapia['p9F_1'];
        $p9F_2 = $fisioterapia['p9F_2'];
        $p9F_3 = $fisioterapia['p9F_3'];
        $p9F_4 = $fisioterapia['p9F_4'];
        $p9F_5 = $fisioterapia['p9F_5'];
        //PREGUNTA 10 - FISIOTERAPIA
        $p10F_1 = $fisioterapia['p10F_1'];
        $p10F_2 = $fisioterapia['p10F_2'];
        $p10F_3 = $fisioterapia['p10F_3'];
        $p10F_4 = $fisioterapia['p10F_4'];
        $p10F_5 = $fisioterapia['p10F_5'];
        //PREGUNTA 11 - FISIOTERAPIA
        $p11F_1 = $fisioterapia['p11F_1'];
        $p11F_2 = $fisioterapia['p11F_2'];
        $p11F_3 = $fisioterapia['p11F_3'];
        $p11F_4 = $fisioterapia['p11F_4'];
        $p11F_5 = $fisioterapia['p11F_5'];
        //PREGUNTA 12 - FISIOTERAPIA
        $p12F_1 = $fisioterapia['p12F_1'];
        $p12F_2 = $fisioterapia['p12F_2'];
        $p12F_3 = $fisioterapia['p12F_3'];
        $p12F_4 = $fisioterapia['p12F_4'];
        $p12F_5 = $fisioterapia['p12F_5'];

        $laboratorio = $this->expAcademica->select('
        COALESCE(COUNT(CASE WHEN prep_academica = 1 THEN 1 END), 0) AS p1L_1,
        COALESCE(COUNT(CASE WHEN prep_academica = 2 THEN 1 END), 0) AS p1L_2,
        COALESCE(COUNT(CASE WHEN prep_academica = 3 THEN 1 END), 0) AS p1L_3,
        COALESCE(COUNT(CASE WHEN prep_academica = 4 THEN 1 END), 0) AS p1L_4,
        COALESCE(COUNT(CASE WHEN prep_academica = 5 THEN 1 END), 0) AS p1L_5,

        COALESCE(COUNT(CASE WHEN plan_estudios = 1 THEN 1 END), 0) AS p2L_1,
        COALESCE(COUNT(CASE WHEN plan_estudios = 2 THEN 1 END), 0) AS p2L_2,
        COALESCE(COUNT(CASE WHEN plan_estudios = 3 THEN 1 END), 0) AS p2L_3,
        COALESCE(COUNT(CASE WHEN plan_estudios = 4 THEN 1 END), 0) AS p2L_4,
        COALESCE(COUNT(CASE WHEN plan_estudios = 5 THEN 1 END), 0) AS p2L_5,

        COALESCE(COUNT(CASE WHEN asignaturas = 1 THEN 1 END), 0) AS p3L_1,
        COALESCE(COUNT(CASE WHEN asignaturas = 2 THEN 1 END), 0) AS p3L_2,
        COALESCE(COUNT(CASE WHEN asignaturas = 3 THEN 1 END), 0) AS p3L_3,
        COALESCE(COUNT(CASE WHEN asignaturas = 4 THEN 1 END), 0) AS p3L_4,
        COALESCE(COUNT(CASE WHEN asignaturas = 5 THEN 1 END), 0) AS p3L_5,

        COALESCE(COUNT(CASE WHEN equipamento = 1 THEN 1 END), 0) AS p4L_1,
        COALESCE(COUNT(CASE WHEN equipamento = 2 THEN 1 END), 0) AS p4L_2,
        COALESCE(COUNT(CASE WHEN equipamento = 3 THEN 1 END), 0) AS p4L_3,
        COALESCE(COUNT(CASE WHEN equipamento = 4 THEN 1 END), 0) AS p4L_4,
        COALESCE(COUNT(CASE WHEN equipamento = 5 THEN 1 END), 0) AS p4L_5,

        COALESCE(COUNT(CASE WHEN infraestructura = 1 THEN 1 END), 0) AS p5L_1,
        COALESCE(COUNT(CASE WHEN infraestructura = 2 THEN 1 END), 0) AS p5L_2,
        COALESCE(COUNT(CASE WHEN infraestructura = 3 THEN 1 END), 0) AS p5L_3,
        COALESCE(COUNT(CASE WHEN infraestructura = 4 THEN 1 END), 0) AS p5L_4,
        COALESCE(COUNT(CASE WHEN infraestructura = 5 THEN 1 END), 0) AS p5L_5,

        COALESCE(COUNT(CASE WHEN biblioteca = 1 THEN 1 END), 0) AS p6L_1,
        COALESCE(COUNT(CASE WHEN biblioteca = 2 THEN 1 END), 0) AS p6L_2,
        COALESCE(COUNT(CASE WHEN biblioteca = 3 THEN 1 END), 0) AS p6L_3,
        COALESCE(COUNT(CASE WHEN biblioteca = 4 THEN 1 END), 0) AS p6L_4,
        COALESCE(COUNT(CASE WHEN biblioteca = 5 THEN 1 END), 0) AS p6L_5,

        COALESCE(COUNT(CASE WHEN tutoria_docente = 1 THEN 1 END), 0) AS p7L_1,
        COALESCE(COUNT(CASE WHEN tutoria_docente = 2 THEN 1 END), 0) AS p7L_2,
        COALESCE(COUNT(CASE WHEN tutoria_docente = 3 THEN 1 END), 0) AS p7L_3,
        COALESCE(COUNT(CASE WHEN tutoria_docente = 4 THEN 1 END), 0) AS p7L_4,
        COALESCE(COUNT(CASE WHEN tutoria_docente = 5 THEN 1 END), 0) AS p7L_5,

        COALESCE(COUNT(CASE WHEN actividades_academicas = 1 THEN 1 END), 0) AS p8L_1,
        COALESCE(COUNT(CASE WHEN actividades_academicas = 2 THEN 1 END), 0) AS p8L_2,
        COALESCE(COUNT(CASE WHEN actividades_academicas = 3 THEN 1 END), 0) AS p8L_3,
        COALESCE(COUNT(CASE WHEN actividades_academicas = 4 THEN 1 END), 0) AS p8L_4,
        COALESCE(COUNT(CASE WHEN actividades_academicas = 5 THEN 1 END), 0) AS p8L_5,

        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 1 THEN 1 END), 0) AS p9L_1,
        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 2 THEN 1 END), 0) AS p9L_2,
        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 3 THEN 1 END), 0) AS p9L_3,
        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 4 THEN 1 END), 0) AS p9L_4,
        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 5 THEN 1 END), 0) AS p9L_5,

        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 1 THEN 1 END), 0) AS p10L_1,
        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 2 THEN 1 END), 0) AS p10L_2,
        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 3 THEN 1 END), 0) AS p10L_3,
        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 4 THEN 1 END), 0) AS p10L_4,
        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 5 THEN 1 END), 0) AS p10L_5,

        COALESCE(COUNT(CASE WHEN internado_rotatorio = 1 THEN 1 END), 0) AS p11L_1,
        COALESCE(COUNT(CASE WHEN internado_rotatorio = 2 THEN 1 END), 0) AS p11L_2,
        COALESCE(COUNT(CASE WHEN internado_rotatorio = 3 THEN 1 END), 0) AS p11L_3,
        COALESCE(COUNT(CASE WHEN internado_rotatorio = 4 THEN 1 END), 0) AS p11L_4,
        COALESCE(COUNT(CASE WHEN internado_rotatorio = 5 THEN 1 END), 0) AS p11L_5,

        COALESCE(COUNT(CASE WHEN perfil_profesional = 1 THEN 1 END), 0) AS p12L_1,
        COALESCE(COUNT(CASE WHEN perfil_profesional = 2 THEN 1 END), 0) AS p12L_2,
        COALESCE(COUNT(CASE WHEN perfil_profesional = 3 THEN 1 END), 0) AS p12L_3,
        COALESCE(COUNT(CASE WHEN perfil_profesional = 4 THEN 1 END), 0) AS p12L_4,
        COALESCE(COUNT(CASE WHEN perfil_profesional = 5 THEN 1 END), 0) AS p12L_5,
    ')->where('id_mencion', $lab)->first();

        //PREGUNTA 1 - LABORATORIO
        $p1L_1 = $laboratorio['p1L_1'];
        $p1L_2 = $laboratorio['p1L_2'];
        $p1L_3 = $laboratorio['p1L_3'];
        $p1L_4 = $laboratorio['p1L_4'];
        $p1L_5 = $laboratorio['p1L_5'];
        //PREGUNTA 2 - FISIOTERAPIA
        $p2L_1 = $laboratorio['p2L_1'];
        $p2L_2 = $laboratorio['p2L_2'];
        $p2L_3 = $laboratorio['p2L_3'];
        $p2L_4 = $laboratorio['p2L_4'];
        $p2L_5 = $laboratorio['p2L_5'];
        //PREGUNTA 3 - FISIOTERAPIA
        $p3L_1 = $laboratorio['p3L_1'];
        $p3L_2 = $laboratorio['p3L_2'];
        $p3L_3 = $laboratorio['p3L_3'];
        $p3L_4 = $laboratorio['p3L_4'];
        $p3L_5 = $laboratorio['p3L_5'];
        //PREGUNTA 4 - FISIOTERAPIA
        $p4L_1 = $laboratorio['p4L_1'];
        $p4L_2 = $laboratorio['p4L_2'];
        $p4L_3 = $laboratorio['p4L_3'];
        $p4L_4 = $laboratorio['p4L_4'];
        $p4L_5 = $laboratorio['p4L_5'];
        //PREGUNTA 5 - FISIOTERAPIA
        $p5L_1 = $laboratorio['p5L_1'];
        $p5L_2 = $laboratorio['p5L_2'];
        $p5L_3 = $laboratorio['p5L_3'];
        $p5L_4 = $laboratorio['p5L_4'];
        $p5L_5 = $laboratorio['p5L_5'];
        //PREGUNTA 6 - FISIOTERAPIA
        $p6L_1 = $laboratorio['p6L_1'];
        $p6L_2 = $laboratorio['p6L_2'];
        $p6L_3 = $laboratorio['p6L_3'];
        $p6L_4 = $laboratorio['p6L_4'];
        $p6L_5 = $laboratorio['p6L_5'];
        //PREGUNTA 7 - FISIOTERAPIA
        $p7L_1 = $laboratorio['p7L_1'];
        $p7L_2 = $laboratorio['p7L_2'];
        $p7L_3 = $laboratorio['p7L_3'];
        $p7L_4 = $laboratorio['p7L_4'];
        $p7L_5 = $laboratorio['p7L_5'];
        //PREGUNTA 8 - FISIOTERAPIA
        $p8L_1 = $laboratorio['p8L_1'];
        $p8L_2 = $laboratorio['p8L_2'];
        $p8L_3 = $laboratorio['p8L_3'];
        $p8L_4 = $laboratorio['p8L_4'];
        $p8L_5 = $laboratorio['p8L_5'];
        //PREGUNTA 9 - FISIOTERAPIA
        $p9L_1 = $laboratorio['p9L_1'];
        $p9L_2 = $laboratorio['p9L_2'];
        $p9L_3 = $laboratorio['p9L_3'];
        $p9L_4 = $laboratorio['p9L_4'];
        $p9L_5 = $laboratorio['p9L_5'];
        //PREGUNTA 10 - FISIOTERAPIA
        $p10L_1 = $laboratorio['p10L_1'];
        $p10L_2 = $laboratorio['p10L_2'];
        $p10L_3 = $laboratorio['p10L_3'];
        $p10L_4 = $laboratorio['p10L_4'];
        $p10L_5 = $laboratorio['p10L_5'];
        //PREGUNTA 11 - FISIOTERAPIA
        $p11L_1 = $laboratorio['p11L_1'];
        $p11L_2 = $laboratorio['p11L_2'];
        $p11L_3 = $laboratorio['p11L_3'];
        $p11L_4 = $laboratorio['p11L_4'];
        $p11L_5 = $laboratorio['p11L_5'];
        //PREGUNTA 12 - FISIOTERAPIA
        $p12L_1 = $laboratorio['p12L_1'];
        $p12L_2 = $laboratorio['p12L_2'];
        $p12L_3 = $laboratorio['p12L_3'];
        $p12L_4 = $laboratorio['p12L_4'];
        $p12L_5 = $laboratorio['p12L_5'];

        $radiologia = $this->expAcademica->select('
        COALESCE(COUNT(CASE WHEN prep_academica = 1 THEN 1 END), 0) AS p1R_1,
        COALESCE(COUNT(CASE WHEN prep_academica = 2 THEN 1 END), 0) AS p1R_2,
        COALESCE(COUNT(CASE WHEN prep_academica = 3 THEN 1 END), 0) AS p1R_3,
        COALESCE(COUNT(CASE WHEN prep_academica = 4 THEN 1 END), 0) AS p1R_4,
        COALESCE(COUNT(CASE WHEN prep_academica = 5 THEN 1 END), 0) AS p1R_5,

        COALESCE(COUNT(CASE WHEN plan_estudios = 1 THEN 1 END), 0) AS p2R_1,
        COALESCE(COUNT(CASE WHEN plan_estudios = 2 THEN 1 END), 0) AS p2R_2,
        COALESCE(COUNT(CASE WHEN plan_estudios = 3 THEN 1 END), 0) AS p2R_3,
        COALESCE(COUNT(CASE WHEN plan_estudios = 4 THEN 1 END), 0) AS p2R_4,
        COALESCE(COUNT(CASE WHEN plan_estudios = 5 THEN 1 END), 0) AS p2R_5,

        COALESCE(COUNT(CASE WHEN asignaturas = 1 THEN 1 END), 0) AS p3R_1,
        COALESCE(COUNT(CASE WHEN asignaturas = 2 THEN 1 END), 0) AS p3R_2,
        COALESCE(COUNT(CASE WHEN asignaturas = 3 THEN 1 END), 0) AS p3R_3,
        COALESCE(COUNT(CASE WHEN asignaturas = 4 THEN 1 END), 0) AS p3R_4,
        COALESCE(COUNT(CASE WHEN asignaturas = 5 THEN 1 END), 0) AS p3R_5,

        COALESCE(COUNT(CASE WHEN equipamento = 1 THEN 1 END), 0) AS p4R_1,
        COALESCE(COUNT(CASE WHEN equipamento = 2 THEN 1 END), 0) AS p4R_2,
        COALESCE(COUNT(CASE WHEN equipamento = 3 THEN 1 END), 0) AS p4R_3,
        COALESCE(COUNT(CASE WHEN equipamento = 4 THEN 1 END), 0) AS p4R_4,
        COALESCE(COUNT(CASE WHEN equipamento = 5 THEN 1 END), 0) AS p4R_5,

        COALESCE(COUNT(CASE WHEN infraestructura = 1 THEN 1 END), 0) AS p5R_1,
        COALESCE(COUNT(CASE WHEN infraestructura = 2 THEN 1 END), 0) AS p5R_2,
        COALESCE(COUNT(CASE WHEN infraestructura = 3 THEN 1 END), 0) AS p5R_3,
        COALESCE(COUNT(CASE WHEN infraestructura = 4 THEN 1 END), 0) AS p5R_4,
        COALESCE(COUNT(CASE WHEN infraestructura = 5 THEN 1 END), 0) AS p5R_5,

        COALESCE(COUNT(CASE WHEN biblioteca = 1 THEN 1 END), 0) AS p6R_1,
        COALESCE(COUNT(CASE WHEN biblioteca = 2 THEN 1 END), 0) AS p6R_2,
        COALESCE(COUNT(CASE WHEN biblioteca = 3 THEN 1 END), 0) AS p6R_3,
        COALESCE(COUNT(CASE WHEN biblioteca = 4 THEN 1 END), 0) AS p6R_4,
        COALESCE(COUNT(CASE WHEN biblioteca = 5 THEN 1 END), 0) AS p6R_5,

        COALESCE(COUNT(CASE WHEN tutoria_docente = 1 THEN 1 END), 0) AS p7R_1,
        COALESCE(COUNT(CASE WHEN tutoria_docente = 2 THEN 1 END), 0) AS p7R_2,
        COALESCE(COUNT(CASE WHEN tutoria_docente = 3 THEN 1 END), 0) AS p7R_3,
        COALESCE(COUNT(CASE WHEN tutoria_docente = 4 THEN 1 END), 0) AS p7R_4,
        COALESCE(COUNT(CASE WHEN tutoria_docente = 5 THEN 1 END), 0) AS p7R_5,

        COALESCE(COUNT(CASE WHEN actividades_academicas = 1 THEN 1 END), 0) AS p8R_1,
        COALESCE(COUNT(CASE WHEN actividades_academicas = 2 THEN 1 END), 0) AS p8R_2,
        COALESCE(COUNT(CASE WHEN actividades_academicas = 3 THEN 1 END), 0) AS p8R_3,
        COALESCE(COUNT(CASE WHEN actividades_academicas = 4 THEN 1 END), 0) AS p8R_4,
        COALESCE(COUNT(CASE WHEN actividades_academicas = 5 THEN 1 END), 0) AS p8R_5,

        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 1 THEN 1 END), 0) AS p9R_1,
        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 2 THEN 1 END), 0) AS p9R_2,
        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 3 THEN 1 END), 0) AS p9R_3,
        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 4 THEN 1 END), 0) AS p9R_4,
        COALESCE(COUNT(CASE WHEN actividades_extracurriculares = 5 THEN 1 END), 0) AS p9R_5,

        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 1 THEN 1 END), 0) AS p10R_1,
        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 2 THEN 1 END), 0) AS p10R_2,
        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 3 THEN 1 END), 0) AS p10R_3,
        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 4 THEN 1 END), 0) AS p10R_4,
        COALESCE(COUNT(CASE WHEN sociedad_cientifica = 5 THEN 1 END), 0) AS p10R_5,

        COALESCE(COUNT(CASE WHEN internado_rotatorio = 1 THEN 1 END), 0) AS p11R_1,
        COALESCE(COUNT(CASE WHEN internado_rotatorio = 2 THEN 1 END), 0) AS p11R_2,
        COALESCE(COUNT(CASE WHEN internado_rotatorio = 3 THEN 1 END), 0) AS p11R_3,
        COALESCE(COUNT(CASE WHEN internado_rotatorio = 4 THEN 1 END), 0) AS p11R_4,
        COALESCE(COUNT(CASE WHEN internado_rotatorio = 5 THEN 1 END), 0) AS p11R_5,

        COALESCE(COUNT(CASE WHEN perfil_profesional = 1 THEN 1 END), 0) AS p12R_1,
        COALESCE(COUNT(CASE WHEN perfil_profesional = 2 THEN 1 END), 0) AS p12R_2,
        COALESCE(COUNT(CASE WHEN perfil_profesional = 3 THEN 1 END), 0) AS p12R_3,
        COALESCE(COUNT(CASE WHEN perfil_profesional = 4 THEN 1 END), 0) AS p12R_4,
        COALESCE(COUNT(CASE WHEN perfil_profesional = 5 THEN 1 END), 0) AS p12R_5,
    ')->where('id_mencion', $rad)->first();


        $p1R_1 = $radiologia['p1R_1'];
        $p1R_2 = $radiologia['p1R_2'];
        $p1R_3 = $radiologia['p1R_3'];
        $p1R_4 = $radiologia['p1R_4'];
        $p1R_5 = $radiologia['p1R_5'];

        $p2R_1 = $radiologia['p2R_1'];
        $p2R_2 = $radiologia['p2R_2'];
        $p2R_3 = $radiologia['p2R_3'];
        $p2R_4 = $radiologia['p2R_4'];
        $p2R_5 = $radiologia['p2R_5'];
 
        $p3R_1 = $radiologia['p3R_1'];
        $p3R_2 = $radiologia['p3R_2'];
        $p3R_3 = $radiologia['p3R_3'];
        $p3R_4 = $radiologia['p3R_4'];
        $p3R_5 = $radiologia['p3R_5'];

        $p4R_1 = $radiologia['p4R_1'];
        $p4R_2 = $radiologia['p4R_2'];
        $p4R_3 = $radiologia['p4R_3'];
        $p4R_4 = $radiologia['p4R_4'];
        $p4R_5 = $radiologia['p4R_5'];
       
        $p5R_1 = $radiologia['p5R_1'];
        $p5R_2 = $radiologia['p5R_2'];
        $p5R_3 = $radiologia['p5R_3'];
        $p5R_4 = $radiologia['p5R_4'];
        $p5R_5 = $radiologia['p5R_5'];
       
        $p6R_1 = $radiologia['p6R_1'];
        $p6R_2 = $radiologia['p6R_2'];
        $p6R_3 = $radiologia['p6R_3'];
        $p6R_4 = $radiologia['p6R_4'];
        $p6R_5 = $radiologia['p6R_5'];
     
        $p7R_1 = $radiologia['p7R_1'];
        $p7R_2 = $radiologia['p7R_2'];
        $p7R_3 = $radiologia['p7R_3'];
        $p7R_4 = $radiologia['p7R_4'];
        $p7R_5 = $radiologia['p7R_5'];
      
        $p8R_1 = $radiologia['p8R_1'];
        $p8R_2 = $radiologia['p8R_2'];
        $p8R_3 = $radiologia['p8R_3'];
        $p8R_4 = $radiologia['p8R_4'];
        $p8R_5 = $radiologia['p8R_5'];
       
        $p9R_1 = $radiologia['p9R_1'];
        $p9R_2 = $radiologia['p9R_2'];
        $p9R_3 = $radiologia['p9R_3'];
        $p9R_4 = $radiologia['p9R_4'];
        $p9R_5 = $radiologia['p9R_5'];
       
        $p10R_1 = $radiologia['p10R_1'];
        $p10R_2 = $radiologia['p10R_2'];
        $p10R_3 = $radiologia['p10R_3'];
        $p10R_4 = $radiologia['p10R_4'];
        $p10R_5 = $radiologia['p10R_5'];
        
        $p11R_1 = $radiologia['p11R_1'];
        $p11R_2 = $radiologia['p11R_2'];
        $p11R_3 = $radiologia['p11R_3'];
        $p11R_4 = $radiologia['p11R_4'];
        $p11R_5 = $radiologia['p11R_5'];
       
        $p12R_1 = $radiologia['p12R_1'];
        $p12R_2 = $radiologia['p12R_2'];
        $p12R_3 = $radiologia['p12R_3'];
        $p12R_4 = $radiologia['p12R_4'];
        $p12R_5 = $radiologia['p12R_5'];

        $data = [
            'preparacion_academica' => ['1', '2', '3', '4', '5'],
            'p1C' => [$p1_1, $p1_2, $p1_3, $p1_4, $p1_5],
            'preparacion_academicaMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico', 'Radiología'],
            'p1_1' => [$p1B_1, $p1F_1, $p1L_1, $p1R_1],
            'p1_2' => [$p1B_2, $p1F_2, $p1L_2, $p1R_2],
            'p1_3' => [$p1B_3, $p1F_3, $p1L_3, $p1R_3],
            'p1_4' => [$p1B_4, $p1F_4, $p1L_4, $p1R_4],
            'p1_5' => [$p1B_5, $p1F_5, $p1L_5, $p1R_5],

            'plan_estudios' => ['1', '2', '3', '4', '5'],
            'p2C' => [$p2_1, $p2_2, $p2_3, $p2_4, $p2_5],
            'plan_estudiosMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico', 'Radiología'],
            'p2_1' => [$p2B_1, $p2F_1, $p2L_1, $p2R_1],
            'p2_2' => [$p2B_2, $p2F_2, $p2L_2, $p2R_2],
            'p2_3' => [$p2B_3, $p2F_3, $p2L_3, $p2R_3],
            'p2_4' => [$p2B_4, $p2F_4, $p2L_4, $p2R_4],
            'p2_5' => [$p2B_5, $p2F_5, $p2L_5, $p2R_5],

            'asignaturas' => ['1', '2', '3', '4', '5'],
            'p3C' => [$p3_1, $p3_2, $p3_3, $p3_4, $p3_5],
            'asignaturasMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico', 'Radiología'],
            'p3_1' => [$p3B_1, $p3F_1, $p3L_1, $p3R_1],
            'p3_2' => [$p3B_2, $p3F_2, $p3L_2, $p3R_2],
            'p3_3' => [$p3B_3, $p3F_3, $p3L_3, $p3R_3],
            'p3_4' => [$p3B_4, $p3F_4, $p3L_4, $p3R_4],
            'p3_5' => [$p3B_5, $p3F_5, $p3L_5, $p3R_5],

            'equipamento' => ['1', '2', '3', '4', '5'],
            'p4C' => [$p4_1, $p4_2, $p4_3, $p4_4, $p4_5],
            'equipamentoMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico', 'Radiología'],
            'p4_1' => [$p4B_1, $p4F_1, $p4L_1, $p4R_1],
            'p4_2' => [$p4B_2, $p4F_2, $p4L_2, $p4R_2],
            'p4_3' => [$p4B_3, $p4F_3, $p4L_3, $p4R_3],
            'p4_4' => [$p4B_4, $p4F_4, $p4L_4, $p4R_4],
            'p4_5' => [$p4B_5, $p4F_5, $p4L_5, $p4R_5],

            'infraestructura' => ['1', '2', '3', '4', '5'],
            'p5C' => [$p5_1, $p5_2, $p5_3, $p5_4, $p5_5],
            'infraestructuraMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico', 'Radiología'],
            'p5_1' => [$p5B_1, $p5F_1, $p5L_1, $p5R_1],
            'p5_2' => [$p5B_2, $p5F_2, $p5L_2, $p5R_2],
            'p5_3' => [$p5B_3, $p5F_3, $p5L_3, $p5R_3],
            'p5_4' => [$p5B_4, $p5F_4, $p5L_4, $p5R_4],
            'p5_5' => [$p5B_5, $p5F_5, $p5L_5, $p5R_5],

            'biblioteca' => ['1', '2', '3', '4', '5'],
            'p6C' => [$p6_1, $p6_2, $p6_3, $p6_4, $p6_5],
            'bibliotecaMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico', 'Radiología'],
            'p6_1' => [$p6B_1, $p6F_1, $p6L_1, $p6R_1],
            'p6_2' => [$p6B_2, $p6F_2, $p6L_2, $p6R_2],
            'p6_3' => [$p6B_3, $p6F_3, $p6L_3, $p6R_3],
            'p6_4' => [$p6B_4, $p6F_4, $p6L_4, $p6R_4],
            'p6_5' => [$p6B_5, $p6F_5, $p6L_5, $p6R_5],

            'tutoria_docente' => ['1', '2', '3', '4', '5'],
            'p7C' => [$p7_1, $p7_2, $p7_3, $p7_4, $p7_5],
            'tutoria_docenteMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico', 'Radiología'],
            'p7_1' => [$p7B_1, $p7F_1, $p7L_1, $p7R_1],
            'p7_2' => [$p7B_2, $p7F_2, $p7L_2, $p7R_2],
            'p7_3' => [$p7B_3, $p7F_3, $p7L_3, $p7R_3],
            'p7_4' => [$p7B_4, $p7F_4, $p7L_4, $p7R_4],
            'p7_5' => [$p7B_5, $p7F_5, $p7L_5, $p7R_5],

            'actividades_academicas' => ['1', '2', '3', '4', '5'],
            'p8C' => [$p8_1, $p8_2, $p8_3, $p8_4, $p8_5],
            'actividades_academicasMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico', 'Radiología'],
            'p8_1' => [$p8B_1, $p8F_1, $p8L_1, $p8R_1],
            'p8_2' => [$p8B_2, $p8F_2, $p8L_2, $p8R_2],
            'p8_3' => [$p8B_3, $p8F_3, $p8L_3, $p8R_3],
            'p8_4' => [$p8B_4, $p8F_4, $p8L_4, $p8R_4],
            'p8_5' => [$p8B_5, $p8F_5, $p8L_5, $p8R_5],

            'actividades_extracurriculares' => ['1', '2', '3', '4', '5'],
            'p9C' => [$p9_1, $p9_2, $p9_3, $p9_4, $p9_5],
            'actividades_extracurricularesMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico', 'Radiología'],
            'p9_1' => [$p9B_1, $p9F_1, $p9L_1, $p9R_1],
            'p9_2' => [$p9B_2, $p9F_2, $p9L_2, $p9R_2],
            'p9_3' => [$p9B_3, $p9F_3, $p9L_3, $p9R_3],
            'p9_4' => [$p9B_4, $p9F_4, $p9L_4, $p9R_4],
            'p9_5' => [$p9B_5, $p9F_5, $p9L_5, $p9R_5],

            'sociedad_cientifica' => ['1', '2', '3', '4', '5'],
            'p10C' => [$p10_1, $p10_2, $p10_3, $p10_4, $p10_5],
            'sociedad_cientificaMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico', 'Radiología'],
            'p10_1' => [$p10B_1, $p10F_1, $p10L_1, $p10R_1],
            'p10_2' => [$p10B_2, $p10F_2, $p10L_2, $p10R_2],
            'p10_3' => [$p10B_3, $p10F_3, $p10L_3, $p10R_3],
            'p10_4' => [$p10B_4, $p10F_4, $p10L_4, $p10R_4],
            'p10_5' => [$p10B_5, $p10F_5, $p10L_5, $p10R_5],

            'internado_rotatorio' => ['1', '2', '3', '4', '5'],
            'p11C' => [$p11_1, $p11_2, $p11_3, $p11_4, $p11_5],
            'internado_rotatorioMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico', 'Radiología'],
            'p11_1' => [$p11B_1, $p11F_1, $p11L_1, $p11R_1],
            'p11_2' => [$p11B_2, $p11F_2, $p11L_2, $p11R_2],
            'p11_3' => [$p11B_3, $p11F_3, $p11L_3, $p11R_3],
            'p11_4' => [$p11B_4, $p11F_4, $p11L_4, $p11R_4],
            'p11_5' => [$p11B_5, $p11F_5, $p11L_5, $p11R_5],

            'perfil_profesional' => ['1', '2', '3', '4', '5'],
            'p12C' => [$p12_1, $p12_2, $p12_3, $p12_4, $p12_5],
            'perfil_profesionalMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico', 'Radiología'],
            'p12_1' => [$p12B_1, $p12F_1, $p12L_1, $p12R_1],
            'p12_2' => [$p12B_2, $p12F_2, $p12L_2, $p12R_2],
            'p12_3' => [$p12B_3, $p12F_3, $p12L_3, $p12R_3],
            'p12_4' => [$p12B_4, $p12F_4, $p12L_4, $p12R_4],
            'p12_5' => [$p12B_5, $p12F_5, $p12L_5, $p12R_5],
        ];

        $dato = [
            'titulo' => 'Estadísticas Experiencia Académica',
            'data' => $data,
            'totalCarrera' => $totalCarrera,
            'totalBioimagenologia' => $totalBioimagenologia,
            'totalFisioterapia' => $totalFisioterapia,
            'totalLaboratorio' => $totalLaboratorio,
            'totalRadiologia' => $totalRadiologia,
            //PREGUNTA 1 CARRERA
            'p1_1' => $p1_1, 'p1_2' => $p1_2, 'p1_3' => $p1_3, 'p1_4' => $p1_4, 'p1_5' => $p1_5,
            //PREGUNTA 1 MENCIONES
            'p1B_1' => $p1B_1, 'p1B_2' => $p1B_2, 'p1B_3' => $p1B_3, 'p1B_4' => $p1B_4, 'p1B_5' => $p1B_5,
            'p1F_1' => $p1F_1, 'p1F_2' => $p1F_2, 'p1F_3' => $p1F_3, 'p1F_4' => $p1F_4, 'p1F_5' => $p1F_5,
            'p1L_1' => $p1L_1, 'p1L_2' => $p1L_2, 'p1L_3' => $p1L_3, 'p1L_4' => $p1L_4, 'p1L_5' => $p1L_5,
            'p1R_1' => $p1R_1, 'p1R_2' => $p1R_2, 'p1R_3' => $p1R_3, 'p1R_4' => $p1R_4, 'p1R_5' => $p1R_5,

            //PREGUNTA 2 CARRERA
            'p2_1' => $p2_1, 'p2_2' => $p2_2, 'p2_3' => $p2_3, 'p2_4' => $p2_4, 'p2_5' => $p2_5,
            //PREGUNTA 2 MENCIONES
            'p2B_1' => $p2B_1, 'p2B_2' => $p2B_2, 'p2B_3' => $p2B_3, 'p2B_4' => $p2B_4, 'p2B_5' => $p2B_5,
            'p2F_1' => $p2F_1, 'p2F_2' => $p2F_2, 'p2F_3' => $p2F_3, 'p2F_4' => $p2F_4, 'p2F_5' => $p2F_5,
            'p2L_1' => $p2L_1, 'p2L_2' => $p2L_2, 'p2L_3' => $p2L_3, 'p2L_4' => $p2L_4, 'p2L_5' => $p2L_5,
            'p2R_1' => $p2R_1, 'p2R_2' => $p2R_2, 'p2R_3' => $p2R_3, 'p2R_4' => $p2R_4, 'p2R_5' => $p2R_5,

            //PREGUNTA 3 CARRERA
            'p3_1' => $p3_1, 'p3_2' => $p3_2, 'p3_3' => $p3_3, 'p3_4' => $p3_4, 'p3_5' => $p3_5,
            //PREGUNTA 3 MENCIONES
            'p3B_1' => $p3B_1, 'p3B_2' => $p3B_2, 'p3B_3' => $p3B_3, 'p3B_4' => $p3B_4, 'p3B_5' => $p3B_5,
            'p3F_1' => $p3F_1, 'p3F_2' => $p3F_2, 'p3F_3' => $p3F_3, 'p3F_4' => $p3F_4, 'p3F_5' => $p3F_5,
            'p3L_1' => $p3L_1, 'p3L_2' => $p3L_2, 'p3L_3' => $p3L_3, 'p3L_4' => $p3L_4, 'p3L_5' => $p3L_5,
            'p3R_1' => $p3R_1, 'p3R_2' => $p3R_2, 'p3R_3' => $p3R_3, 'p3R_4' => $p3R_4, 'p3R_5' => $p3R_5,

            //PREGUNTA 4 CARRERA
            'p4_1' => $p4_1, 'p4_2' => $p4_2, 'p4_3' => $p4_3, 'p4_4' => $p4_4, 'p4_5' => $p4_5,
            //PREGUNTA 4 MENCIONES
            'p4B_1' => $p4B_1, 'p4B_2' => $p4B_2, 'p4B_3' => $p4B_3, 'p4B_4' => $p4B_4, 'p4B_5' => $p4B_5,
            'p4F_1' => $p4F_1, 'p4F_2' => $p4F_2, 'p4F_3' => $p4F_3, 'p4F_4' => $p4F_4, 'p4F_5' => $p4F_5,
            'p4L_1' => $p4L_1, 'p4L_2' => $p4L_2, 'p4L_3' => $p4L_3, 'p4L_4' => $p4L_4, 'p4L_5' => $p4L_5,
            'p4R_1' => $p4R_1, 'p4R_2' => $p4R_2, 'p4R_3' => $p4R_3, 'p4R_4' => $p4R_4, 'p4R_5' => $p4R_5,

            //PREGUNTA 5 CARRERA
            'p5_1' => $p5_1, 'p5_2' => $p5_2, 'p5_3' => $p5_3, 'p5_4' => $p5_4, 'p5_5' => $p5_5,
            //PREGUNTA 5 MENCIONES
            'p5B_1' => $p5B_1, 'p5B_2' => $p5B_2, 'p5B_3' => $p5B_3, 'p5B_4' => $p5B_4, 'p5B_5' => $p5B_5,
            'p5F_1' => $p5F_1, 'p5F_2' => $p5F_2, 'p5F_3' => $p5F_3, 'p5F_4' => $p5F_4, 'p5F_5' => $p5F_5,
            'p5L_1' => $p5L_1, 'p5L_2' => $p5L_2, 'p5L_3' => $p5L_3, 'p5L_4' => $p5L_4, 'p5L_5' => $p5L_5,
            'p5R_1' => $p5R_1, 'p5R_2' => $p5R_2, 'p5R_3' => $p5R_3, 'p5R_4' => $p5R_4, 'p5R_5' => $p5R_5,

            //PREGUNTA 6 CARRERA
            'p6_1' => $p6_1, 'p6_2' => $p6_2, 'p6_3' => $p6_3, 'p6_4' => $p6_4, 'p6_5' => $p6_5,
            //PREGUNTA 6 MENCIONES
            'p6B_1' => $p6B_1, 'p6B_2' => $p6B_2, 'p6B_3' => $p6B_3, 'p6B_4' => $p6B_4, 'p6B_5' => $p6B_5,
            'p6F_1' => $p6F_1, 'p6F_2' => $p6F_2, 'p6F_3' => $p6F_3, 'p6F_4' => $p6F_4, 'p6F_5' => $p6F_5,
            'p6L_1' => $p6L_1, 'p6L_2' => $p6L_2, 'p6L_3' => $p6L_3, 'p6L_4' => $p6L_4, 'p6L_5' => $p6L_5,
            'p6R_1' => $p6R_1, 'p6R_2' => $p6R_2, 'p6R_3' => $p6R_3, 'p6R_4' => $p6R_4, 'p6R_5' => $p6R_5,

            //PREGUNTA 7 CARRERA
            'p7_1' => $p7_1, 'p7_2' => $p7_2, 'p7_3' => $p7_3, 'p7_4' => $p7_4, 'p7_5' => $p7_5,
            //PREGUNTA 7 MENCIONES
            'p7B_1' => $p7B_1, 'p7B_2' => $p7B_2, 'p7B_3' => $p7B_3, 'p7B_4' => $p7B_4, 'p7B_5' => $p7B_5,
            'p7F_1' => $p7F_1, 'p7F_2' => $p7F_2, 'p7F_3' => $p7F_3, 'p7F_4' => $p7F_4, 'p7F_5' => $p7F_5,
            'p7L_1' => $p7L_1, 'p7L_2' => $p7L_2, 'p7L_3' => $p7L_3, 'p7L_4' => $p7L_4, 'p7L_5' => $p7L_5,
            'p7R_1' => $p7R_1, 'p7R_2' => $p7R_2, 'p7R_3' => $p7R_3, 'p7R_4' => $p7R_4, 'p7R_5' => $p7R_5,

            //PREGUNTA 8 CARRERA
            'p8_1' => $p8_1, 'p8_2' => $p8_2, 'p8_3' => $p8_3, 'p8_4' => $p8_4, 'p8_5' => $p8_5,
            //PREGUNTA 8 MENCIONES
            'p8B_1' => $p8B_1, 'p8B_2' => $p8B_2, 'p8B_3' => $p8B_3, 'p8B_4' => $p8B_4, 'p8B_5' => $p8B_5,
            'p8F_1' => $p8F_1, 'p8F_2' => $p8F_2, 'p8F_3' => $p8F_3, 'p8F_4' => $p8F_4, 'p8F_5' => $p8F_5,
            'p8L_1' => $p8L_1, 'p8L_2' => $p8L_2, 'p8L_3' => $p8L_3, 'p8L_4' => $p8L_4, 'p8L_5' => $p8L_5,
            'p8R_1' => $p8R_1, 'p8R_2' => $p8R_2, 'p8R_3' => $p8R_3, 'p8R_4' => $p8R_4, 'p8R_5' => $p8R_5,

            //PREGUNTA 9 CARRERA
            'p9_1' => $p9_1, 'p9_2' => $p9_2, 'p9_3' => $p9_3, 'p9_4' => $p9_4, 'p9_5' => $p9_5,
            //PREGUNTA 9 MENCIONES
            'p9B_1' => $p9B_1, 'p9B_2' => $p9B_2, 'p9B_3' => $p9B_3, 'p9B_4' => $p9B_4, 'p9B_5' => $p9B_5,
            'p9F_1' => $p9F_1, 'p9F_2' => $p9F_2, 'p9F_3' => $p9F_3, 'p9F_4' => $p9F_4, 'p9F_5' => $p9F_5,
            'p9L_1' => $p9L_1, 'p9L_2' => $p9L_2, 'p9L_3' => $p9L_3, 'p9L_4' => $p9L_4, 'p9L_5' => $p9L_5,
            'p9R_1' => $p9R_1, 'p9R_2' => $p9R_2, 'p9R_3' => $p9R_3, 'p9R_4' => $p9R_4, 'p9R_5' => $p9R_5,

            //PREGUNTA 10 CARRERA
            'p10_1' => $p10_1, 'p10_2' => $p10_2, 'p10_3' => $p10_3, 'p10_4' => $p10_4, 'p10_5' => $p10_5,
            //PREGUNTA 10 MENCIONES
            'p10B_1' => $p10B_1, 'p10B_2' => $p10B_2, 'p10B_3' => $p10B_3, 'p10B_4' => $p10B_4, 'p10B_5' => $p10B_5,
            'p10F_1' => $p10F_1, 'p10F_2' => $p10F_2, 'p10F_3' => $p10F_3, 'p10F_4' => $p10F_4, 'p10F_5' => $p10F_5,
            'p10L_1' => $p10L_1, 'p10L_2' => $p10L_2, 'p10L_3' => $p10L_3, 'p10L_4' => $p10L_4, 'p10L_5' => $p10L_5,
            'p10R_1' => $p10R_1, 'p10R_2' => $p10R_2, 'p10R_3' => $p10R_3, 'p10R_4' => $p10R_4, 'p10R_5' => $p10R_5,

            //PREGUNTA 11 CARRERA
            'p11_1' => $p11_1, 'p11_2' => $p11_2, 'p11_3' => $p11_3, 'p11_4' => $p11_4, 'p11_5' => $p11_5,
            //PREGUNTA 11 MENCIONES
            'p11B_1' => $p11B_1, 'p11B_2' => $p11B_2, 'p11B_3' => $p11B_3, 'p11B_4' => $p11B_4, 'p11B_5' => $p11B_5,
            'p11F_1' => $p11F_1, 'p11F_2' => $p11F_2, 'p11F_3' => $p11F_3, 'p11F_4' => $p11F_4, 'p11F_5' => $p11F_5,
            'p11L_1' => $p11L_1, 'p11L_2' => $p11L_2, 'p11L_3' => $p11L_3, 'p11L_4' => $p11L_4, 'p11L_5' => $p11L_5,
            'p11R_1' => $p11R_1, 'p11R_2' => $p11R_2, 'p11R_3' => $p11R_3, 'p11R_4' => $p11R_4, 'p11R_5' => $p11R_5,

            //PREGUNTA 12 CARRERA
            'p12_1' => $p12_1, 'p12_2' => $p12_2, 'p12_3' => $p12_3, 'p12_4' => $p12_4, 'p12_5' => $p12_5,
            //PREGUNTA 12 MENCIONES
            'p12B_1' => $p12B_1, 'p12B_2' => $p12B_2, 'p12B_3' => $p12B_3, 'p12B_4' => $p12B_4, 'p12B_5' => $p12B_5,
            'p12F_1' => $p12F_1, 'p12F_2' => $p12F_2, 'p12F_3' => $p12F_3, 'p12F_4' => $p12F_4, 'p12F_5' => $p12F_5,
            'p12L_1' => $p12L_1, 'p12L_2' => $p12L_2, 'p12L_3' => $p12L_3, 'p12L_4' => $p12L_4, 'p12L_5' => $p12L_5,
            'p12R_1' => $p12R_1, 'p12R_2' => $p12R_2, 'p12R_3' => $p12R_3, 'p12R_4' => $p12R_4, 'p12R_5' => $p12R_5,
        ];

        echo view('menu');
        echo view('estadisticasAcademicas', $dato);
        echo view('footer');
    }
}
