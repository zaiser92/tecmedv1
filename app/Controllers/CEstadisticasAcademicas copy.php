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

        $calificacion1 = 1;
        $calificacion2 = 2;
        $calificacion3 = 3;
        $calificacion4 = 4;
        $calificacion5 = 5;
        $totalCarrera = $this->expAcademica->countAllResults();
        $totalBioimagenologia = $this->expAcademica->where('id_mencion', $bio)->countAllResults();
        $totalFisioterapia = $this->expAcademica->where('id_mencion', $fis)->countAllResults();
        $totalLaboratorio = $this->expAcademica->where('id_mencion', $lab)->countAllResults();

        //PREGUNTA 1 - CARRERA
        $p1_1 = $this->expAcademica->where('prep_academica', $calificacion1)->countAllResults();
        $p1_2 = $this->expAcademica->where('prep_academica', $calificacion2)->countAllResults();
        $p1_3 = $this->expAcademica->where('prep_academica', $calificacion3)->countAllResults();
        $p1_4 = $this->expAcademica->where('prep_academica', $calificacion4)->countAllResults();
        $p1_5 = $this->expAcademica->where('prep_academica', $calificacion5)->countAllResults();

        //PREGUNTA 1 - BIOIMAGENOLOGIA
        $p1B_1 = $this->expAcademica->where('id_mencion', $bio)->where('prep_academica', $calificacion1)->countAllResults();
        $p1B_2 = $this->expAcademica->where('id_mencion', $bio)->where('prep_academica', $calificacion2)->countAllResults();
        $p1B_3 = $this->expAcademica->where('id_mencion', $bio)->where('prep_academica', $calificacion3)->countAllResults();
        $p1B_4 = $this->expAcademica->where('id_mencion', $bio)->where('prep_academica', $calificacion4)->countAllResults();
        $p1B_5 = $this->expAcademica->where('id_mencion', $bio)->where('prep_academica', $calificacion5)->countAllResults();

        //PREGUNTA 1 - FISIOTERAPIA
        $p1F_1 = $this->expAcademica->where('id_mencion', $fis)->where('prep_academica', $calificacion1)->countAllResults();
        $p1F_2 = $this->expAcademica->where('id_mencion', $fis)->where('prep_academica', $calificacion2)->countAllResults();
        $p1F_3 = $this->expAcademica->where('id_mencion', $fis)->where('prep_academica', $calificacion3)->countAllResults();
        $p1F_4 = $this->expAcademica->where('id_mencion', $fis)->where('prep_academica', $calificacion4)->countAllResults();
        $p1F_5 = $this->expAcademica->where('id_mencion', $fis)->where('prep_academica', $calificacion5)->countAllResults();

        //PREGUNTA 1 - LABORATORIO
        $p1L_1 = $this->expAcademica->where('id_mencion', $lab)->where('prep_academica', $calificacion1)->countAllResults();
        $p1L_2 = $this->expAcademica->where('id_mencion', $lab)->where('prep_academica', $calificacion2)->countAllResults();
        $p1L_3 = $this->expAcademica->where('id_mencion', $lab)->where('prep_academica', $calificacion3)->countAllResults();
        $p1L_4 = $this->expAcademica->where('id_mencion', $lab)->where('prep_academica', $calificacion4)->countAllResults();
        $p1L_5 = $this->expAcademica->where('id_mencion', $lab)->where('prep_academica', $calificacion5)->countAllResults();

        //PREGUNTA 2 - CARRERA
        $p2_1 = $this->expAcademica->where('plan_estudios', $calificacion1)->countAllResults();
        $p2_2 = $this->expAcademica->where('plan_estudios', $calificacion2)->countAllResults();
        $p2_3 = $this->expAcademica->where('plan_estudios', $calificacion3)->countAllResults();
        $p2_4 = $this->expAcademica->where('plan_estudios', $calificacion4)->countAllResults();
        $p2_5 = $this->expAcademica->where('plan_estudios', $calificacion5)->countAllResults();

        //PREGUNTA 2 - BIOIMAGENOLOGIA
        $p2B_1 = $this->expAcademica->where('id_mencion', $bio)->where('plan_estudios', $calificacion1)->countAllResults();
        $p2B_2 = $this->expAcademica->where('id_mencion', $bio)->where('plan_estudios', $calificacion2)->countAllResults();
        $p2B_3 = $this->expAcademica->where('id_mencion', $bio)->where('plan_estudios', $calificacion3)->countAllResults();
        $p2B_4 = $this->expAcademica->where('id_mencion', $bio)->where('plan_estudios', $calificacion4)->countAllResults();
        $p2B_5 = $this->expAcademica->where('id_mencion', $bio)->where('plan_estudios', $calificacion5)->countAllResults();

        //PREGUNTA 2 - FISIOTERAPIA
        $p2F_1 = $this->expAcademica->where('id_mencion', $fis)->where('plan_estudios', $calificacion1)->countAllResults();
        $p2F_2 = $this->expAcademica->where('id_mencion', $fis)->where('plan_estudios', $calificacion2)->countAllResults();
        $p2F_3 = $this->expAcademica->where('id_mencion', $fis)->where('plan_estudios', $calificacion3)->countAllResults();
        $p2F_4 = $this->expAcademica->where('id_mencion', $fis)->where('plan_estudios', $calificacion4)->countAllResults();
        $p2F_5 = $this->expAcademica->where('id_mencion', $fis)->where('plan_estudios', $calificacion5)->countAllResults();

        //PREGUNTA 2 - LABORATORIO
        $p2L_1 = $this->expAcademica->where('id_mencion', $lab)->where('plan_estudios', $calificacion1)->countAllResults();
        $p2L_2 = $this->expAcademica->where('id_mencion', $lab)->where('plan_estudios', $calificacion2)->countAllResults();
        $p2L_3 = $this->expAcademica->where('id_mencion', $lab)->where('plan_estudios', $calificacion3)->countAllResults();
        $p2L_4 = $this->expAcademica->where('id_mencion', $lab)->where('plan_estudios', $calificacion4)->countAllResults();
        $p2L_5 = $this->expAcademica->where('id_mencion', $lab)->where('plan_estudios', $calificacion5)->countAllResults();

        //PREGUNTA 3 - CARRERA
        $p3_1 = $this->expAcademica->where('asignaturas', $calificacion1)->countAllResults();
        $p3_2 = $this->expAcademica->where('asignaturas', $calificacion2)->countAllResults();
        $p3_3 = $this->expAcademica->where('asignaturas', $calificacion3)->countAllResults();
        $p3_4 = $this->expAcademica->where('asignaturas', $calificacion4)->countAllResults();
        $p3_5 = $this->expAcademica->where('asignaturas', $calificacion5)->countAllResults();

        //PREGUNTA 3 - BIOIMAGENOLOGIA
        $p3B_1 = $this->expAcademica->where('id_mencion', $bio)->where('asignaturas', $calificacion1)->countAllResults();
        $p3B_2 = $this->expAcademica->where('id_mencion', $bio)->where('asignaturas', $calificacion2)->countAllResults();
        $p3B_3 = $this->expAcademica->where('id_mencion', $bio)->where('asignaturas', $calificacion3)->countAllResults();
        $p3B_4 = $this->expAcademica->where('id_mencion', $bio)->where('asignaturas', $calificacion4)->countAllResults();
        $p3B_5 = $this->expAcademica->where('id_mencion', $bio)->where('asignaturas', $calificacion5)->countAllResults();

        //PREGUNTA 3 - FISIOTERAPIA
        $p3F_1 = $this->expAcademica->where('id_mencion', $fis)->where('asignaturas', $calificacion1)->countAllResults();
        $p3F_2 = $this->expAcademica->where('id_mencion', $fis)->where('asignaturas', $calificacion2)->countAllResults();
        $p3F_3 = $this->expAcademica->where('id_mencion', $fis)->where('asignaturas', $calificacion3)->countAllResults();
        $p3F_4 = $this->expAcademica->where('id_mencion', $fis)->where('asignaturas', $calificacion4)->countAllResults();
        $p3F_5 = $this->expAcademica->where('id_mencion', $fis)->where('asignaturas', $calificacion5)->countAllResults();

        //PREGUNTA 3 - LABORATORIO
        $p3L_1 = $this->expAcademica->where('id_mencion', $lab)->where('asignaturas', $calificacion1)->countAllResults();
        $p3L_2 = $this->expAcademica->where('id_mencion', $lab)->where('asignaturas', $calificacion2)->countAllResults();
        $p3L_3 = $this->expAcademica->where('id_mencion', $lab)->where('asignaturas', $calificacion3)->countAllResults();
        $p3L_4 = $this->expAcademica->where('id_mencion', $lab)->where('asignaturas', $calificacion4)->countAllResults();
        $p3L_5 = $this->expAcademica->where('id_mencion', $lab)->where('asignaturas', $calificacion5)->countAllResults();

        //PREGUNTA 4 - CARRERA
        $p4_1 = $this->expAcademica->where('equipamento', $calificacion1)->countAllResults();
        $p4_2 = $this->expAcademica->where('equipamento', $calificacion2)->countAllResults();
        $p4_3 = $this->expAcademica->where('equipamento', $calificacion3)->countAllResults();
        $p4_4 = $this->expAcademica->where('equipamento', $calificacion4)->countAllResults();
        $p4_5 = $this->expAcademica->where('equipamento', $calificacion5)->countAllResults();

        //PREGUNTA 4 - BIOIMAGENOLOGIA
        $p4B_1 = $this->expAcademica->where('id_mencion', $bio)->where('equipamento', $calificacion1)->countAllResults();
        $p4B_2 = $this->expAcademica->where('id_mencion', $bio)->where('equipamento', $calificacion2)->countAllResults();
        $p4B_3 = $this->expAcademica->where('id_mencion', $bio)->where('equipamento', $calificacion3)->countAllResults();
        $p4B_4 = $this->expAcademica->where('id_mencion', $bio)->where('equipamento', $calificacion4)->countAllResults();
        $p4B_5 = $this->expAcademica->where('id_mencion', $bio)->where('equipamento', $calificacion5)->countAllResults();

        //PREGUNTA 4 - FISIOTERAPIA
        $p4F_1 = $this->expAcademica->where('id_mencion', $fis)->where('equipamento', $calificacion1)->countAllResults();
        $p4F_2 = $this->expAcademica->where('id_mencion', $fis)->where('equipamento', $calificacion2)->countAllResults();
        $p4F_3 = $this->expAcademica->where('id_mencion', $fis)->where('equipamento', $calificacion3)->countAllResults();
        $p4F_4 = $this->expAcademica->where('id_mencion', $fis)->where('equipamento', $calificacion4)->countAllResults();
        $p4F_5 = $this->expAcademica->where('id_mencion', $fis)->where('equipamento', $calificacion5)->countAllResults();

        //PREGUNTA 4 - LABORATORIO
        $p4L_1 = $this->expAcademica->where('id_mencion', $lab)->where('equipamento', $calificacion1)->countAllResults();
        $p4L_2 = $this->expAcademica->where('id_mencion', $lab)->where('equipamento', $calificacion2)->countAllResults();
        $p4L_3 = $this->expAcademica->where('id_mencion', $lab)->where('equipamento', $calificacion3)->countAllResults();
        $p4L_4 = $this->expAcademica->where('id_mencion', $lab)->where('equipamento', $calificacion4)->countAllResults();
        $p4L_5 = $this->expAcademica->where('id_mencion', $lab)->where('equipamento', $calificacion5)->countAllResults();

        //PREGUNTA 5 - CARRERA
        $p5_1 = $this->expAcademica->where('infraestructura', $calificacion1)->countAllResults();
        $p5_2 = $this->expAcademica->where('infraestructura', $calificacion2)->countAllResults();
        $p5_3 = $this->expAcademica->where('infraestructura', $calificacion3)->countAllResults();
        $p5_4 = $this->expAcademica->where('infraestructura', $calificacion4)->countAllResults();
        $p5_5 = $this->expAcademica->where('infraestructura', $calificacion5)->countAllResults();

        //PREGUNTA 5 - BIOIMAGENOLOGIA
        $p5B_1 = $this->expAcademica->where('id_mencion', $bio)->where('infraestructura', $calificacion1)->countAllResults();
        $p5B_2 = $this->expAcademica->where('id_mencion', $bio)->where('infraestructura', $calificacion2)->countAllResults();
        $p5B_3 = $this->expAcademica->where('id_mencion', $bio)->where('infraestructura', $calificacion3)->countAllResults();
        $p5B_4 = $this->expAcademica->where('id_mencion', $bio)->where('infraestructura', $calificacion4)->countAllResults();
        $p5B_5 = $this->expAcademica->where('id_mencion', $bio)->where('infraestructura', $calificacion5)->countAllResults();

        //PREGUNTA 5 - FISIOTERAPIA
        $p5F_1 = $this->expAcademica->where('id_mencion', $fis)->where('infraestructura', $calificacion1)->countAllResults();
        $p5F_2 = $this->expAcademica->where('id_mencion', $fis)->where('infraestructura', $calificacion2)->countAllResults();
        $p5F_3 = $this->expAcademica->where('id_mencion', $fis)->where('infraestructura', $calificacion3)->countAllResults();
        $p5F_4 = $this->expAcademica->where('id_mencion', $fis)->where('infraestructura', $calificacion4)->countAllResults();
        $p5F_5 = $this->expAcademica->where('id_mencion', $fis)->where('infraestructura', $calificacion5)->countAllResults();

        //PREGUNTA 5 - LABORATORIO
        $p5L_1 = $this->expAcademica->where('id_mencion', $lab)->where('infraestructura', $calificacion1)->countAllResults();
        $p5L_2 = $this->expAcademica->where('id_mencion', $lab)->where('infraestructura', $calificacion2)->countAllResults();
        $p5L_3 = $this->expAcademica->where('id_mencion', $lab)->where('infraestructura', $calificacion3)->countAllResults();
        $p5L_4 = $this->expAcademica->where('id_mencion', $lab)->where('infraestructura', $calificacion4)->countAllResults();
        $p5L_5 = $this->expAcademica->where('id_mencion', $lab)->where('infraestructura', $calificacion5)->countAllResults();

        //PREGUNTA 6 - CARRERA
        $p6_1 = $this->expAcademica->where('biblioteca', $calificacion1)->countAllResults();
        $p6_2 = $this->expAcademica->where('biblioteca', $calificacion2)->countAllResults();
        $p6_3 = $this->expAcademica->where('biblioteca', $calificacion3)->countAllResults();
        $p6_4 = $this->expAcademica->where('biblioteca', $calificacion4)->countAllResults();
        $p6_5 = $this->expAcademica->where('biblioteca', $calificacion5)->countAllResults();

        //PREGUNTA 6 - BIOIMAGENOLOGIA
        $p6B_1 = $this->expAcademica->where('id_mencion', $bio)->where('biblioteca', $calificacion1)->countAllResults();
        $p6B_2 = $this->expAcademica->where('id_mencion', $bio)->where('biblioteca', $calificacion2)->countAllResults();
        $p6B_3 = $this->expAcademica->where('id_mencion', $bio)->where('biblioteca', $calificacion3)->countAllResults();
        $p6B_4 = $this->expAcademica->where('id_mencion', $bio)->where('biblioteca', $calificacion4)->countAllResults();
        $p6B_5 = $this->expAcademica->where('id_mencion', $bio)->where('biblioteca', $calificacion5)->countAllResults();

        //PREGUNTA 6 - FISIOTERAPIA
        $p6F_1 = $this->expAcademica->where('id_mencion', $fis)->where('biblioteca', $calificacion1)->countAllResults();
        $p6F_2 = $this->expAcademica->where('id_mencion', $fis)->where('biblioteca', $calificacion2)->countAllResults();
        $p6F_3 = $this->expAcademica->where('id_mencion', $fis)->where('biblioteca', $calificacion3)->countAllResults();
        $p6F_4 = $this->expAcademica->where('id_mencion', $fis)->where('biblioteca', $calificacion4)->countAllResults();
        $p6F_5 = $this->expAcademica->where('id_mencion', $fis)->where('biblioteca', $calificacion5)->countAllResults();

        //PREGUNTA 6 - LABORATORIO
        $p6L_1 = $this->expAcademica->where('id_mencion', $lab)->where('biblioteca', $calificacion1)->countAllResults();
        $p6L_2 = $this->expAcademica->where('id_mencion', $lab)->where('biblioteca', $calificacion2)->countAllResults();
        $p6L_3 = $this->expAcademica->where('id_mencion', $lab)->where('biblioteca', $calificacion3)->countAllResults();
        $p6L_4 = $this->expAcademica->where('id_mencion', $lab)->where('biblioteca', $calificacion4)->countAllResults();
        $p6L_5 = $this->expAcademica->where('id_mencion', $lab)->where('biblioteca', $calificacion5)->countAllResults();

        //PREGUNTA 7 - CARRERA
        $p7_1 = $this->expAcademica->where('tutoria_docente', $calificacion1)->countAllResults();
        $p7_2 = $this->expAcademica->where('tutoria_docente', $calificacion2)->countAllResults();
        $p7_3 = $this->expAcademica->where('tutoria_docente', $calificacion3)->countAllResults();
        $p7_4 = $this->expAcademica->where('tutoria_docente', $calificacion4)->countAllResults();
        $p7_5 = $this->expAcademica->where('tutoria_docente', $calificacion5)->countAllResults();

        //PREGUNTA 7 - BIOIMAGENOLOGIA
        $p7B_1 = $this->expAcademica->where('id_mencion', $bio)->where('tutoria_docente', $calificacion1)->countAllResults();
        $p7B_2 = $this->expAcademica->where('id_mencion', $bio)->where('tutoria_docente', $calificacion2)->countAllResults();
        $p7B_3 = $this->expAcademica->where('id_mencion', $bio)->where('tutoria_docente', $calificacion3)->countAllResults();
        $p7B_4 = $this->expAcademica->where('id_mencion', $bio)->where('tutoria_docente', $calificacion4)->countAllResults();
        $p7B_5 = $this->expAcademica->where('id_mencion', $bio)->where('tutoria_docente', $calificacion5)->countAllResults();

        //PREGUNTA 7 - FISIOTERAPIA
        $p7F_1 = $this->expAcademica->where('id_mencion', $fis)->where('tutoria_docente', $calificacion1)->countAllResults();
        $p7F_2 = $this->expAcademica->where('id_mencion', $fis)->where('tutoria_docente', $calificacion2)->countAllResults();
        $p7F_3 = $this->expAcademica->where('id_mencion', $fis)->where('tutoria_docente', $calificacion3)->countAllResults();
        $p7F_4 = $this->expAcademica->where('id_mencion', $fis)->where('tutoria_docente', $calificacion4)->countAllResults();
        $p7F_5 = $this->expAcademica->where('id_mencion', $fis)->where('tutoria_docente', $calificacion5)->countAllResults();

        //PREGUNTA 7 - LABORATORIO
        $p7L_1 = $this->expAcademica->where('id_mencion', $lab)->where('tutoria_docente', $calificacion1)->countAllResults();
        $p7L_2 = $this->expAcademica->where('id_mencion', $lab)->where('tutoria_docente', $calificacion2)->countAllResults();
        $p7L_3 = $this->expAcademica->where('id_mencion', $lab)->where('tutoria_docente', $calificacion3)->countAllResults();
        $p7L_4 = $this->expAcademica->where('id_mencion', $lab)->where('tutoria_docente', $calificacion4)->countAllResults();
        $p7L_5 = $this->expAcademica->where('id_mencion', $lab)->where('tutoria_docente', $calificacion5)->countAllResults();

        //PREGUNTA 8 - CARRERA
        $p8_1 = $this->expAcademica->where('actividades_academicas', $calificacion1)->countAllResults();
        $p8_2 = $this->expAcademica->where('actividades_academicas', $calificacion2)->countAllResults();
        $p8_3 = $this->expAcademica->where('actividades_academicas', $calificacion3)->countAllResults();
        $p8_4 = $this->expAcademica->where('actividades_academicas', $calificacion4)->countAllResults();
        $p8_5 = $this->expAcademica->where('actividades_academicas', $calificacion5)->countAllResults();

        //PREGUNTA 8 - BIOIMAGENOLOGIA
        $p8B_1 = $this->expAcademica->where('id_mencion', $bio)->where('actividades_academicas', $calificacion1)->countAllResults();
        $p8B_2 = $this->expAcademica->where('id_mencion', $bio)->where('actividades_academicas', $calificacion2)->countAllResults();
        $p8B_3 = $this->expAcademica->where('id_mencion', $bio)->where('actividades_academicas', $calificacion3)->countAllResults();
        $p8B_4 = $this->expAcademica->where('id_mencion', $bio)->where('actividades_academicas', $calificacion4)->countAllResults();
        $p8B_5 = $this->expAcademica->where('id_mencion', $bio)->where('actividades_academicas', $calificacion5)->countAllResults();

        //PREGUNTA 8 - FISIOTERAPIA
        $p8F_1 = $this->expAcademica->where('id_mencion', $fis)->where('actividades_academicas', $calificacion1)->countAllResults();
        $p8F_2 = $this->expAcademica->where('id_mencion', $fis)->where('actividades_academicas', $calificacion2)->countAllResults();
        $p8F_3 = $this->expAcademica->where('id_mencion', $fis)->where('actividades_academicas', $calificacion3)->countAllResults();
        $p8F_4 = $this->expAcademica->where('id_mencion', $fis)->where('actividades_academicas', $calificacion4)->countAllResults();
        $p8F_5 = $this->expAcademica->where('id_mencion', $fis)->where('actividades_academicas', $calificacion5)->countAllResults();

        //PREGUNTA 8 - LABORATORIO
        $p8L_1 = $this->expAcademica->where('id_mencion', $lab)->where('actividades_academicas', $calificacion1)->countAllResults();
        $p8L_2 = $this->expAcademica->where('id_mencion', $lab)->where('actividades_academicas', $calificacion2)->countAllResults();
        $p8L_3 = $this->expAcademica->where('id_mencion', $lab)->where('actividades_academicas', $calificacion3)->countAllResults();
        $p8L_4 = $this->expAcademica->where('id_mencion', $lab)->where('actividades_academicas', $calificacion4)->countAllResults();
        $p8L_5 = $this->expAcademica->where('id_mencion', $lab)->where('actividades_academicas', $calificacion5)->countAllResults();

        //PREGUNTA 9 - CARRERA
        $p9_1 = $this->expAcademica->where('actividades_extracurriculares', $calificacion1)->countAllResults();
        $p9_2 = $this->expAcademica->where('actividades_extracurriculares', $calificacion2)->countAllResults();
        $p9_3 = $this->expAcademica->where('actividades_extracurriculares', $calificacion3)->countAllResults();
        $p9_4 = $this->expAcademica->where('actividades_extracurriculares', $calificacion4)->countAllResults();
        $p9_5 = $this->expAcademica->where('actividades_extracurriculares', $calificacion5)->countAllResults();

        //PREGUNTA 9 - BIOIMAGENOLOGIA
        $p9B_1 = $this->expAcademica->where('id_mencion', $bio)->where('actividades_extracurriculares', $calificacion1)->countAllResults();
        $p9B_2 = $this->expAcademica->where('id_mencion', $bio)->where('actividades_extracurriculares', $calificacion2)->countAllResults();
        $p9B_3 = $this->expAcademica->where('id_mencion', $bio)->where('actividades_extracurriculares', $calificacion3)->countAllResults();
        $p9B_4 = $this->expAcademica->where('id_mencion', $bio)->where('actividades_extracurriculares', $calificacion4)->countAllResults();
        $p9B_5 = $this->expAcademica->where('id_mencion', $bio)->where('actividades_extracurriculares', $calificacion5)->countAllResults();

        //PREGUNTA 9 - FISIOTERAPIA
        $p9F_1 = $this->expAcademica->where('id_mencion', $fis)->where('actividades_extracurriculares', $calificacion1)->countAllResults();
        $p9F_2 = $this->expAcademica->where('id_mencion', $fis)->where('actividades_extracurriculares', $calificacion2)->countAllResults();
        $p9F_3 = $this->expAcademica->where('id_mencion', $fis)->where('actividades_extracurriculares', $calificacion3)->countAllResults();
        $p9F_4 = $this->expAcademica->where('id_mencion', $fis)->where('actividades_extracurriculares', $calificacion4)->countAllResults();
        $p9F_5 = $this->expAcademica->where('id_mencion', $fis)->where('actividades_extracurriculares', $calificacion5)->countAllResults();

        //PREGUNTA 9 - LABORATORIO
        $p9L_1 = $this->expAcademica->where('id_mencion', $lab)->where('actividades_extracurriculares', $calificacion1)->countAllResults();
        $p9L_2 = $this->expAcademica->where('id_mencion', $lab)->where('actividades_extracurriculares', $calificacion2)->countAllResults();
        $p9L_3 = $this->expAcademica->where('id_mencion', $lab)->where('actividades_extracurriculares', $calificacion3)->countAllResults();
        $p9L_4 = $this->expAcademica->where('id_mencion', $lab)->where('actividades_extracurriculares', $calificacion4)->countAllResults();
        $p9L_5 = $this->expAcademica->where('id_mencion', $lab)->where('actividades_extracurriculares', $calificacion5)->countAllResults();

        //PREGUNTA 10 - CARRERA
        $p10_1 = $this->expAcademica->where('sociedad_cientifica', $calificacion1)->countAllResults();
        $p10_2 = $this->expAcademica->where('sociedad_cientifica', $calificacion2)->countAllResults();
        $p10_3 = $this->expAcademica->where('sociedad_cientifica', $calificacion3)->countAllResults();
        $p10_4 = $this->expAcademica->where('sociedad_cientifica', $calificacion4)->countAllResults();
        $p10_5 = $this->expAcademica->where('sociedad_cientifica', $calificacion5)->countAllResults();

        //PREGUNTA 10 - BIOIMAGENOLOGIA
        $p10B_1 = $this->expAcademica->where('id_mencion', $bio)->where('sociedad_cientifica', $calificacion1)->countAllResults();
        $p10B_2 = $this->expAcademica->where('id_mencion', $bio)->where('sociedad_cientifica', $calificacion2)->countAllResults();
        $p10B_3 = $this->expAcademica->where('id_mencion', $bio)->where('sociedad_cientifica', $calificacion3)->countAllResults();
        $p10B_4 = $this->expAcademica->where('id_mencion', $bio)->where('sociedad_cientifica', $calificacion4)->countAllResults();
        $p10B_5 = $this->expAcademica->where('id_mencion', $bio)->where('sociedad_cientifica', $calificacion5)->countAllResults();

        //PREGUNTA 10 - FISIOTERAPIA
        $p10F_1 = $this->expAcademica->where('id_mencion', $fis)->where('sociedad_cientifica', $calificacion1)->countAllResults();
        $p10F_2 = $this->expAcademica->where('id_mencion', $fis)->where('sociedad_cientifica', $calificacion2)->countAllResults();
        $p10F_3 = $this->expAcademica->where('id_mencion', $fis)->where('sociedad_cientifica', $calificacion3)->countAllResults();
        $p10F_4 = $this->expAcademica->where('id_mencion', $fis)->where('sociedad_cientifica', $calificacion4)->countAllResults();
        $p10F_5 = $this->expAcademica->where('id_mencion', $fis)->where('sociedad_cientifica', $calificacion5)->countAllResults();

        //PREGUNTA 10 - LABORATORIO
        $p10L_1 = $this->expAcademica->where('id_mencion', $lab)->where('sociedad_cientifica', $calificacion1)->countAllResults();
        $p10L_2 = $this->expAcademica->where('id_mencion', $lab)->where('sociedad_cientifica', $calificacion2)->countAllResults();
        $p10L_3 = $this->expAcademica->where('id_mencion', $lab)->where('sociedad_cientifica', $calificacion3)->countAllResults();
        $p10L_4 = $this->expAcademica->where('id_mencion', $lab)->where('sociedad_cientifica', $calificacion4)->countAllResults();
        $p10L_5 = $this->expAcademica->where('id_mencion', $lab)->where('sociedad_cientifica', $calificacion5)->countAllResults();

        //PREGUNTA 11 - CARRERA
        $p11_1 = $this->expAcademica->where('internado_rotatorio', $calificacion1)->countAllResults();
        $p11_2 = $this->expAcademica->where('internado_rotatorio', $calificacion2)->countAllResults();
        $p11_3 = $this->expAcademica->where('internado_rotatorio', $calificacion3)->countAllResults();
        $p11_4 = $this->expAcademica->where('internado_rotatorio', $calificacion4)->countAllResults();
        $p11_5 = $this->expAcademica->where('internado_rotatorio', $calificacion5)->countAllResults();

        //PREGUNTA 11 - BIOIMAGENOLOGIA
        $p11B_1 = $this->expAcademica->where('id_mencion', $bio)->where('internado_rotatorio', $calificacion1)->countAllResults();
        $p11B_2 = $this->expAcademica->where('id_mencion', $bio)->where('internado_rotatorio', $calificacion2)->countAllResults();
        $p11B_3 = $this->expAcademica->where('id_mencion', $bio)->where('internado_rotatorio', $calificacion3)->countAllResults();
        $p11B_4 = $this->expAcademica->where('id_mencion', $bio)->where('internado_rotatorio', $calificacion4)->countAllResults();
        $p11B_5 = $this->expAcademica->where('id_mencion', $bio)->where('internado_rotatorio', $calificacion5)->countAllResults();

        //PREGUNTA 11 - FISIOTERAPIA
        $p11F_1 = $this->expAcademica->where('id_mencion', $fis)->where('internado_rotatorio', $calificacion1)->countAllResults();
        $p11F_2 = $this->expAcademica->where('id_mencion', $fis)->where('internado_rotatorio', $calificacion2)->countAllResults();
        $p11F_3 = $this->expAcademica->where('id_mencion', $fis)->where('internado_rotatorio', $calificacion3)->countAllResults();
        $p11F_4 = $this->expAcademica->where('id_mencion', $fis)->where('internado_rotatorio', $calificacion4)->countAllResults();
        $p11F_5 = $this->expAcademica->where('id_mencion', $fis)->where('internado_rotatorio', $calificacion5)->countAllResults();

        //PREGUNTA 11 - LABORATORIO
        $p11L_1 = $this->expAcademica->where('id_mencion', $lab)->where('internado_rotatorio', $calificacion1)->countAllResults();
        $p11L_2 = $this->expAcademica->where('id_mencion', $lab)->where('internado_rotatorio', $calificacion2)->countAllResults();
        $p11L_3 = $this->expAcademica->where('id_mencion', $lab)->where('internado_rotatorio', $calificacion3)->countAllResults();
        $p11L_4 = $this->expAcademica->where('id_mencion', $lab)->where('internado_rotatorio', $calificacion4)->countAllResults();
        $p11L_5 = $this->expAcademica->where('id_mencion', $lab)->where('internado_rotatorio', $calificacion5)->countAllResults();

        //PREGUNTA 12 - CARRERA
        $p12_1 = $this->expAcademica->where('perfil_profesional', $calificacion1)->countAllResults();
        $p12_2 = $this->expAcademica->where('perfil_profesional', $calificacion2)->countAllResults();
        $p12_3 = $this->expAcademica->where('perfil_profesional', $calificacion3)->countAllResults();
        $p12_4 = $this->expAcademica->where('perfil_profesional', $calificacion4)->countAllResults();
        $p12_5 = $this->expAcademica->where('perfil_profesional', $calificacion5)->countAllResults();

        //PREGUNTA 12 - BIOIMAGENOLOGIA
        $p12B_1 = $this->expAcademica->where('id_mencion', $bio)->where('perfil_profesional', $calificacion1)->countAllResults();
        $p12B_2 = $this->expAcademica->where('id_mencion', $bio)->where('perfil_profesional', $calificacion2)->countAllResults();
        $p12B_3 = $this->expAcademica->where('id_mencion', $bio)->where('perfil_profesional', $calificacion3)->countAllResults();
        $p12B_4 = $this->expAcademica->where('id_mencion', $bio)->where('perfil_profesional', $calificacion4)->countAllResults();
        $p12B_5 = $this->expAcademica->where('id_mencion', $bio)->where('perfil_profesional', $calificacion5)->countAllResults();

        //PREGUNTA 12 - FISIOTERAPIA
        $p12F_1 = $this->expAcademica->where('id_mencion', $fis)->where('perfil_profesional', $calificacion1)->countAllResults();
        $p12F_2 = $this->expAcademica->where('id_mencion', $fis)->where('perfil_profesional', $calificacion2)->countAllResults();
        $p12F_3 = $this->expAcademica->where('id_mencion', $fis)->where('perfil_profesional', $calificacion3)->countAllResults();
        $p12F_4 = $this->expAcademica->where('id_mencion', $fis)->where('perfil_profesional', $calificacion4)->countAllResults();
        $p12F_5 = $this->expAcademica->where('id_mencion', $fis)->where('perfil_profesional', $calificacion5)->countAllResults();

        //PREGUNTA 12 - LABORATORIO
        $p12L_1 = $this->expAcademica->where('id_mencion', $lab)->where('perfil_profesional', $calificacion1)->countAllResults();
        $p12L_2 = $this->expAcademica->where('id_mencion', $lab)->where('perfil_profesional', $calificacion2)->countAllResults();
        $p12L_3 = $this->expAcademica->where('id_mencion', $lab)->where('perfil_profesional', $calificacion3)->countAllResults();
        $p12L_4 = $this->expAcademica->where('id_mencion', $lab)->where('perfil_profesional', $calificacion4)->countAllResults();
        $p12L_5 = $this->expAcademica->where('id_mencion', $lab)->where('perfil_profesional', $calificacion5)->countAllResults();


        $data = [
            'preparacion_academica' => ['1', '2', '3', '4', '5'],
            'p1C' => [$p1_1, $p1_2, $p1_3, $p1_4, $p1_5],
            'preparacion_academicaMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico'],
            'p1_1' => [$p1B_1, $p1F_1, $p1L_1],
            'p1_2' => [$p1B_2, $p1F_2, $p1L_2],
            'p1_3' => [$p1B_3, $p1F_3, $p1L_3],
            'p1_4' => [$p1B_4, $p1F_4, $p1L_4],
            'p1_5' => [$p1B_5, $p1F_5, $p1L_5],

            'plan_estudios' => ['1', '2', '3', '4', '5'],
            'p2C' => [$p2_1, $p2_2, $p2_3, $p2_4, $p2_5],
            'plan_estudiosMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico'],
            'p2_1' => [$p2B_1, $p2F_1, $p2L_1],
            'p2_2' => [$p2B_2, $p2F_2, $p2L_2],
            'p2_3' => [$p2B_3, $p2F_3, $p2L_3],
            'p2_4' => [$p2B_4, $p2F_4, $p2L_4],
            'p2_5' => [$p2B_5, $p2F_5, $p2L_5],

            'asignaturas' => ['1', '2', '3', '4', '5'],
            'p3C' => [$p3_1, $p3_2, $p3_3, $p3_4, $p3_5],
            'asignaturasMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico'],
            'p3_1' => [$p3B_1, $p3F_1, $p3L_1],
            'p3_2' => [$p3B_2, $p3F_2, $p3L_2],
            'p3_3' => [$p3B_3, $p3F_3, $p3L_3],
            'p3_4' => [$p3B_4, $p3F_4, $p3L_4],
            'p3_5' => [$p3B_5, $p3F_5, $p3L_5],
            
            'equipamento' => ['1', '2', '3', '4', '5'],
            'p4C' => [$p4_1, $p4_2, $p4_3, $p4_4, $p4_5],
            'equipamentoMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico'],
            'p4_1' => [$p4B_1, $p4F_1, $p4L_1],
            'p4_2' => [$p4B_2, $p4F_2, $p4L_2],
            'p4_3' => [$p4B_3, $p4F_3, $p4L_3],
            'p4_4' => [$p4B_4, $p4F_4, $p4L_4],
            'p4_5' => [$p4B_5, $p4F_5, $p4L_5],

            'infraestructura' => ['1', '2', '3', '4', '5'],
            'p5C' => [$p5_1, $p5_2, $p5_3, $p5_4, $p5_5],
            'infraestructuraMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico'],
            'p5_1' => [$p5B_1, $p5F_1, $p5L_1],
            'p5_2' => [$p5B_2, $p5F_2, $p5L_2],
            'p5_3' => [$p5B_3, $p5F_3, $p5L_3],
            'p5_4' => [$p5B_4, $p5F_4, $p5L_4],
            'p5_5' => [$p5B_5, $p5F_5, $p5L_5],

            'biblioteca' => ['1', '2', '3', '4', '5'],
            'p6C' => [$p6_1, $p6_2, $p6_3, $p6_4, $p6_5],
            'bibliotecaMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico'],
            'p6_1' => [$p6B_1, $p6F_1, $p6L_1],
            'p6_2' => [$p6B_2, $p6F_2, $p6L_2],
            'p6_3' => [$p6B_3, $p6F_3, $p6L_3],
            'p6_4' => [$p6B_4, $p6F_4, $p6L_4],
            'p6_5' => [$p6B_5, $p6F_5, $p6L_5],

            'tutoria_docente' => ['1', '2', '3', '4', '5'],
            'p7C' => [$p7_1, $p7_2, $p7_3, $p7_4, $p7_5],
            'tutoria_docenteMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico'],
            'p7_1' => [$p7B_1, $p7F_1, $p7L_1],
            'p7_2' => [$p7B_2, $p7F_2, $p7L_2],
            'p7_3' => [$p7B_3, $p7F_3, $p7L_3],
            'p7_4' => [$p7B_4, $p7F_4, $p7L_4],
            'p7_5' => [$p7B_5, $p7F_5, $p7L_5],

            'actividades_academicas' => ['1', '2', '3', '4', '5'],
            'p8C' => [$p8_1, $p8_2, $p8_3, $p8_4, $p8_5],
            'actividades_academicasMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico'],
            'p8_1' => [$p8B_1, $p8F_1, $p8L_1],
            'p8_2' => [$p8B_2, $p8F_2, $p8L_2],
            'p8_3' => [$p8B_3, $p8F_3, $p8L_3],
            'p8_4' => [$p8B_4, $p8F_4, $p8L_4],
            'p8_5' => [$p8B_5, $p8F_5, $p8L_5],

            'actividades_extracurriculares' => ['1', '2', '3', '4', '5'],
            'p9C' => [$p9_1, $p9_2, $p9_3, $p9_4, $p9_5],
            'actividades_extracurricularesMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico'],
            'p9_1' => [$p9B_1, $p9F_1, $p9L_1],
            'p9_2' => [$p9B_2, $p9F_2, $p9L_2],
            'p9_3' => [$p9B_3, $p9F_3, $p9L_3],
            'p9_4' => [$p9B_4, $p9F_4, $p9L_4],
            'p9_5' => [$p9B_5, $p9F_5, $p9L_5],

            'sociedad_cientifica' => ['1', '2', '3', '4', '5'],
            'p10C' => [$p10_1, $p10_2, $p10_3, $p10_4, $p10_5],
            'sociedad_cientificaMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico'],
            'p10_1' => [$p10B_1, $p10F_1, $p10L_1],
            'p10_2' => [$p10B_2, $p10F_2, $p10L_2],
            'p10_3' => [$p10B_3, $p10F_3, $p10L_3],
            'p10_4' => [$p10B_4, $p10F_4, $p10L_4],
            'p10_5' => [$p10B_5, $p10F_5, $p10L_5],

            'internado_rotatorio' => ['1', '2', '3', '4', '5'],
            'p11C' => [$p11_1, $p11_2, $p11_3, $p11_4, $p11_5],
            'internado_rotatorioMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico'],
            'p11_1' => [$p11B_1, $p11F_1, $p11L_1],
            'p11_2' => [$p11B_2, $p11F_2, $p11L_2],
            'p11_3' => [$p11B_3, $p11F_3, $p11L_3],
            'p11_4' => [$p11B_4, $p11F_4, $p11L_4],
            'p11_5' => [$p11B_5, $p11F_5, $p11L_5],

            'perfil_profesional' => ['1', '2', '3', '4', '5'],
            'p12C' => [$p12_1, $p12_2, $p12_3, $p12_4, $p12_5],
            'perfil_profesionalMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico'],
            'p12_1' => [$p12B_1, $p12F_1, $p12L_1],
            'p12_2' => [$p12B_2, $p12F_2, $p12L_2],
            'p12_3' => [$p12B_3, $p12F_3, $p12L_3],
            'p12_4' => [$p12B_4, $p12F_4, $p12L_4],
            'p12_5' => [$p12B_5, $p12F_5, $p12L_5],
        ];

        $dato = [
            'titulo' => 'Estadísticas Experiencia Académica',
            'data' => $data,
            'totalCarrera' => $totalCarrera,
            'totalBioimagenologia' => $totalBioimagenologia,
            'totalFisioterapia' => $totalFisioterapia,
            'totalLaboratorio' => $totalLaboratorio,
            //PREGUNTA 1 CARRERA
            'p1_1' => $p1_1, 'p1_2' => $p1_2, 'p1_3' => $p1_3, 'p1_4' => $p1_4, 'p1_5' => $p1_5,
            //PREGUNTA 1 MENCIONES
            'p1B_1' => $p1B_1, 'p1B_2' => $p1B_2, 'p1B_3' => $p1B_3, 'p1B_4' => $p1B_4, 'p1B_5' => $p1B_5,
            'p1F_1' => $p1F_1, 'p1F_2' => $p1F_2, 'p1F_3' => $p1F_3, 'p1F_4' => $p1F_4, 'p1F_5' => $p1F_5,
            'p1L_1' => $p1L_1, 'p1L_2' => $p1L_2, 'p1L_3' => $p1L_3, 'p1L_4' => $p1L_4, 'p1L_5' => $p1L_5,

            //PREGUNTA 2 CARRERA
            'p2_1' => $p2_1, 'p2_2' => $p2_2, 'p2_3' => $p2_3, 'p2_4' => $p2_4, 'p2_5' => $p2_5,
            //PREGUNTA 2 MENCIONES
            'p2B_1' => $p2B_1, 'p2B_2' => $p2B_2, 'p2B_3' => $p2B_3, 'p2B_4' => $p2B_4, 'p2B_5' => $p2B_5,
            'p2F_1' => $p2F_1, 'p2F_2' => $p2F_2, 'p2F_3' => $p2F_3, 'p2F_4' => $p2F_4, 'p2F_5' => $p2F_5,
            'p2L_1' => $p2L_1, 'p2L_2' => $p2L_2, 'p2L_3' => $p2L_3, 'p2L_4' => $p2L_4, 'p2L_5' => $p2L_5,

            //PREGUNTA 3 CARRERA
            'p3_1' => $p3_1, 'p3_2' => $p3_2, 'p3_3' => $p3_3, 'p3_4' => $p3_4, 'p3_5' => $p3_5,
            //PREGUNTA 3 MENCIONES
            'p3B_1' => $p3B_1, 'p3B_2' => $p3B_2, 'p3B_3' => $p3B_3, 'p3B_4' => $p3B_4, 'p3B_5' => $p3B_5,
            'p3F_1' => $p3F_1, 'p3F_2' => $p3F_2, 'p3F_3' => $p3F_3, 'p3F_4' => $p3F_4, 'p3F_5' => $p3F_5,
            'p3L_1' => $p3L_1, 'p3L_2' => $p3L_2, 'p3L_3' => $p3L_3, 'p3L_4' => $p3L_4, 'p3L_5' => $p3L_5,

            //PREGUNTA 4 CARRERA
            'p4_1' => $p4_1, 'p4_2' => $p4_2, 'p4_3' => $p4_3, 'p4_4' => $p4_4, 'p4_5' => $p4_5,
            //PREGUNTA 4 MENCIONES
            'p4B_1' => $p4B_1, 'p4B_2' => $p4B_2, 'p4B_3' => $p4B_3, 'p4B_4' => $p4B_4, 'p4B_5' => $p4B_5,
            'p4F_1' => $p4F_1, 'p4F_2' => $p4F_2, 'p4F_3' => $p4F_3, 'p4F_4' => $p4F_4, 'p4F_5' => $p4F_5,
            'p4L_1' => $p4L_1, 'p4L_2' => $p4L_2, 'p4L_3' => $p4L_3, 'p4L_4' => $p4L_4, 'p4L_5' => $p4L_5,

            //PREGUNTA 5 CARRERA
            'p5_1' => $p5_1, 'p5_2' => $p5_2, 'p5_3' => $p5_3, 'p5_4' => $p5_4, 'p5_5' => $p5_5,
            //PREGUNTA 5 MENCIONES
            'p5B_1' => $p5B_1, 'p5B_2' => $p5B_2, 'p5B_3' => $p5B_3, 'p5B_4' => $p5B_4, 'p5B_5' => $p5B_5,
            'p5F_1' => $p5F_1, 'p5F_2' => $p5F_2, 'p5F_3' => $p5F_3, 'p5F_4' => $p5F_4, 'p5F_5' => $p5F_5,
            'p5L_1' => $p5L_1, 'p5L_2' => $p5L_2, 'p5L_3' => $p5L_3, 'p5L_4' => $p5L_4, 'p5L_5' => $p5L_5,

            //PREGUNTA 6 CARRERA
            'p6_1' => $p6_1, 'p6_2' => $p6_2, 'p6_3' => $p6_3, 'p6_4' => $p6_4, 'p6_5' => $p6_5,
            //PREGUNTA 6 MENCIONES
            'p6B_1' => $p6B_1, 'p6B_2' => $p6B_2, 'p6B_3' => $p6B_3, 'p6B_4' => $p6B_4, 'p6B_5' => $p6B_5,
            'p6F_1' => $p6F_1, 'p6F_2' => $p6F_2, 'p6F_3' => $p6F_3, 'p6F_4' => $p6F_4, 'p6F_5' => $p6F_5,
            'p6L_1' => $p6L_1, 'p6L_2' => $p6L_2, 'p6L_3' => $p6L_3, 'p6L_4' => $p6L_4, 'p6L_5' => $p6L_5,

            //PREGUNTA 7 CARRERA
            'p7_1' => $p7_1, 'p7_2' => $p7_2, 'p7_3' => $p7_3, 'p7_4' => $p7_4, 'p7_5' => $p7_5,
            //PREGUNTA 7 MENCIONES
            'p7B_1' => $p7B_1, 'p7B_2' => $p7B_2, 'p7B_3' => $p7B_3, 'p7B_4' => $p7B_4, 'p7B_5' => $p7B_5,
            'p7F_1' => $p7F_1, 'p7F_2' => $p7F_2, 'p7F_3' => $p7F_3, 'p7F_4' => $p7F_4, 'p7F_5' => $p7F_5,
            'p7L_1' => $p7L_1, 'p7L_2' => $p7L_2, 'p7L_3' => $p7L_3, 'p7L_4' => $p7L_4, 'p7L_5' => $p7L_5,

            //PREGUNTA 8 CARRERA
            'p8_1' => $p8_1, 'p8_2' => $p8_2, 'p8_3' => $p8_3, 'p8_4' => $p8_4, 'p8_5' => $p8_5,
            //PREGUNTA 8 MENCIONES
            'p8B_1' => $p8B_1, 'p8B_2' => $p8B_2, 'p8B_3' => $p8B_3, 'p8B_4' => $p8B_4, 'p8B_5' => $p8B_5,
            'p8F_1' => $p8F_1, 'p8F_2' => $p8F_2, 'p8F_3' => $p8F_3, 'p8F_4' => $p8F_4, 'p8F_5' => $p8F_5,
            'p8L_1' => $p8L_1, 'p8L_2' => $p8L_2, 'p8L_3' => $p8L_3, 'p8L_4' => $p8L_4, 'p8L_5' => $p8L_5,

            //PREGUNTA 9 CARRERA
            'p9_1' => $p9_1, 'p9_2' => $p9_2, 'p9_3' => $p9_3, 'p9_4' => $p9_4, 'p9_5' => $p9_5,
            //PREGUNTA 9 MENCIONES
            'p9B_1' => $p9B_1, 'p9B_2' => $p9B_2, 'p9B_3' => $p9B_3, 'p9B_4' => $p9B_4, 'p9B_5' => $p9B_5,
            'p9F_1' => $p9F_1, 'p9F_2' => $p9F_2, 'p9F_3' => $p9F_3, 'p9F_4' => $p9F_4, 'p9F_5' => $p9F_5,
            'p9L_1' => $p9L_1, 'p9L_2' => $p9L_2, 'p9L_3' => $p9L_3, 'p9L_4' => $p9L_4, 'p9L_5' => $p9L_5,

            //PREGUNTA 10 CARRERA
            'p10_1' => $p10_1, 'p10_2' => $p10_2, 'p10_3' => $p10_3, 'p10_4' => $p10_4, 'p10_5' => $p10_5,
            //PREGUNTA 10 MENCIONES
            'p10B_1' => $p10B_1, 'p10B_2' => $p10B_2, 'p10B_3' => $p10B_3, 'p10B_4' => $p10B_4, 'p10B_5' => $p10B_5,
            'p10F_1' => $p10F_1, 'p10F_2' => $p10F_2, 'p10F_3' => $p10F_3, 'p10F_4' => $p10F_4, 'p10F_5' => $p10F_5,
            'p10L_1' => $p10L_1, 'p10L_2' => $p10L_2, 'p10L_3' => $p10L_3, 'p10L_4' => $p10L_4, 'p10L_5' => $p10L_5,

            //PREGUNTA 11 CARRERA
            'p11_1' => $p11_1, 'p11_2' => $p11_2, 'p11_3' => $p11_3, 'p11_4' => $p11_4, 'p11_5' => $p11_5,
            //PREGUNTA 11 MENCIONES
            'p11B_1' => $p11B_1, 'p11B_2' => $p11B_2, 'p11B_3' => $p11B_3, 'p11B_4' => $p11B_4, 'p11B_5' => $p11B_5,
            'p11F_1' => $p11F_1, 'p11F_2' => $p11F_2, 'p11F_3' => $p11F_3, 'p11F_4' => $p11F_4, 'p11F_5' => $p11F_5,
            'p11L_1' => $p11L_1, 'p11L_2' => $p11L_2, 'p11L_3' => $p11L_3, 'p11L_4' => $p11L_4, 'p11L_5' => $p11L_5,

            //PREGUNTA 12 CARRERA
            'p12_1' => $p12_1, 'p12_2' => $p12_2, 'p12_3' => $p12_3, 'p12_4' => $p12_4, 'p12_5' => $p12_5,
            //PREGUNTA 12 MENCIONES
            'p12B_1' => $p12B_1, 'p12B_2' => $p12B_2, 'p12B_3' => $p12B_3, 'p12B_4' => $p12B_4, 'p12B_5' => $p12B_5,
            'p12F_1' => $p12F_1, 'p12F_2' => $p12F_2, 'p12F_3' => $p12F_3, 'p12F_4' => $p12F_4, 'p12F_5' => $p12F_5,
            'p12L_1' => $p12L_1, 'p12L_2' => $p12L_2, 'p12L_3' => $p12L_3, 'p12L_4' => $p12L_4, 'p12L_5' => $p12L_5,
        ];

        echo view('menu');
        echo view('estadisticasAcademicas', $dato);
        echo view('footer');
    }
}
