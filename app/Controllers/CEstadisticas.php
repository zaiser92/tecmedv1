<?php

namespace App\Controllers;

use App\Models\MProfesional;
use App\Models\MTitula;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \DateTime;

class CEstadisticas extends BaseController
{
    protected $profesionales, $reglasCambia, $reglas, $session, $seminarios, $titulado;
    public function __construct()
    {
        $this->profesionales = new MProfesional();
        $this->titulado = new MTitula();
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
        $rad = 4;
        //GENERO CARRERA
        $tgeneroC = $this->titulado->countAll();
        $tgeneroCM = $this->titulado->genero('Masculino');
        $tgeneroCF = $this->titulado->genero('Femenino');

        //GENERO BIOIMAGENOLOGIA
        $tgeneroB = $this->titulado->where('id_mencion', $bio)->countAllResults();
        $tgeneroBM = $this->titulado->generoMencion('Masculino', $bio);
        $tgeneroBF = $this->titulado->generoMencion('Femenino', $bio);

        //GENERO RADIOLOGÍA
        $tgeneroR = $this->titulado->where('id_mencion', $rad)->countAllResults();
        $tgeneroRM = $this->titulado->generoMencion('Masculino', $rad);
        $tgeneroRF = $this->titulado->generoMencion('Femenino', $rad);

        //GENERO FISIOTERAPIA
        $tgeneroF = $this->titulado->where('id_mencion', $fis)->countAllResults();
        $tgeneroFM = $this->titulado->generoMencion('Masculino', $fis);
        $tgeneroFF = $this->titulado->generoMencion('Femenino', $fis);

        //GENERO LABORATORIO
        $tgeneroL = $this->titulado->where('id_mencion', $lab)->countAllResults();
        $tgeneroLM = $this->titulado->generoMencion('Masculino', $lab);
        $tgeneroLF = $this->titulado->generoMencion('Femenino', $lab);

        //RESIDENCIA CARRERA
        $Cnacionales = ['Cochabamba', 'Santa Cruz', 'Oruro', 'Sucre', 'Potosí', 'Tarija', 'Beni', 'Pando'];
        $Cnacionales2 = ['La Paz', 'El Alto', 'Cochabamba', 'Santa Cruz', 'Oruro', 'Sucre', 'Potosí', 'Tarija', 'Beni', 'Pando'];

        $tresidenciaC = $this->titulado->countAll();
        $tresidenciaCL = $this->titulado->lapaz();
        $tresidenciaCEA = $this->titulado->elalto();
        $tresidenciaCN = $this->titulado->nacional($Cnacionales);
        $tresidenciaCI = $this->titulado->internacional($Cnacionales2);

        //RESIDENCIA BIOIMAGENOLOGIA
        $totallapazb = $this->titulado->lapazMencion($bio);
        $totalelaltob = $this->titulado->elaltoMencion($bio);
        $totalnacionalb = $this->titulado->nacionalMencion($bio, $Cnacionales);
        $totalinternacionalesb = $this->titulado->internacionalMencion($bio, $Cnacionales2);

        //RESIDENCIA RADIOLOGIA
        $totallapazr = $this->titulado->lapazMencion($rad);
        $totalelaltor = $this->titulado->elaltoMencion($rad);
        $totalnacionalr = $this->titulado->nacionalMencion($rad, $Cnacionales);
        $totalinternacionalesr = $this->titulado->internacionalMencion($rad, $Cnacionales2);

        //RESIDENCIA FISIOTERAPIA
        $totallapazf = $this->titulado->lapazMencion($fis);
        $totalelaltof = $this->titulado->elaltoMencion($fis);
        $totalnacionalf = $this->titulado->nacionalMencion($fis, $Cnacionales);
        $totalinternacionalesf = $this->titulado->internacionalMencion($fis, $Cnacionales2);

        //RESIDENCIA LABORATORIO CLINICO
        $totallapazl = $this->titulado->lapazMencion($lab);
        $totalelaltol = $this->titulado->elaltoMencion($lab);
        $totalnacionall = $this->titulado->nacionalMencion($lab, $Cnacionales);
        $totalinternacionalesl = $this->titulado->internacionalMencion($lab, $Cnacionales2);


        //ESTADISTICAS POR AÑOS DE PERMANENCIA CARRERA
        $permanencia3 = $this->titulado->contarDiferencia(3);
        $permanencia4 = $this->titulado->contarDiferencia(4);
        $permanencia5 = $this->titulado->contarDiferencia(5);
        $permanencia6 = $this->titulado->contarDiferencia(6);
        $permanencia7 = $this->titulado->contarDiferencia(7);
        $permanencia8 = $this->titulado->contarDiferencia(8);
        $permanencia9 = $this->titulado->contarDiferencia(9);
        $permanencia10 = $this->titulado->contarDiferenciaMay10();
        
        //ESTADISTICAS POR AÑOS DE PERMANENCIA BIOIMAGENOLOGIA
        $permanencia3b = $this->titulado->contarDiferenciaMencion(3, $bio);
        $permanencia4b = $this->titulado->contarDiferenciaMencion(4, $bio);
        $permanencia5b = $this->titulado->contarDiferenciaMencion(5, $bio);
        $permanencia6b = $this->titulado->contarDiferenciaMencion(6, $bio);
        $permanencia7b = $this->titulado->contarDiferenciaMencion(7, $bio);
        $permanencia8b = $this->titulado->contarDiferenciaMencion(8, $bio);
        $permanencia9b = $this->titulado->contarDiferenciaMencion(9, $bio);
        $permanencia10b = $this->titulado->contarDiferenciaMay10Mencion($bio);

        //ESTADISTICAS POR AÑOS DE PERMANENCIA RADIOLOGÍA
        $permanencia3r = $this->titulado->contarDiferenciaMencion(3, $rad);
        $permanencia4r = $this->titulado->contarDiferenciaMencion(4, $rad);
        $permanencia5r = $this->titulado->contarDiferenciaMencion(5, $rad);
        $permanencia6r = $this->titulado->contarDiferenciaMencion(6, $rad);
        $permanencia7r = $this->titulado->contarDiferenciaMencion(7, $rad);
        $permanencia8r = $this->titulado->contarDiferenciaMencion(8, $rad);
        $permanencia9r = $this->titulado->contarDiferenciaMencion(9, $rad);
        $permanencia10r = $this->titulado->contarDiferenciaMay10Mencion($rad);

        //ESTADISTICAS POR AÑOS DE PERMANENCIA FISIOTERAPIA
        $permanencia3f = $this->titulado->contarDiferenciaMencion(3, $fis);
        $permanencia4f = $this->titulado->contarDiferenciaMencion(4, $fis);
        $permanencia5f = $this->titulado->contarDiferenciaMencion(5, $fis);
        $permanencia6f = $this->titulado->contarDiferenciaMencion(6, $fis);
        $permanencia7f = $this->titulado->contarDiferenciaMencion(7, $fis);
        $permanencia8f = $this->titulado->contarDiferenciaMencion(8, $fis);
        $permanencia9f = $this->titulado->contarDiferenciaMencion(9, $fis);
        $permanencia10f = $this->titulado->contarDiferenciaMay10Mencion($fis);

        //ESTADISTICAS POR AÑOS DE PERMANENCIA LABORATORIO
        $permanencia3l = $this->titulado->contarDiferenciaMencion(3, $lab);
        $permanencia4l = $this->titulado->contarDiferenciaMencion(4, $lab);
        $permanencia5l = $this->titulado->contarDiferenciaMencion(5, $lab);
        $permanencia6l = $this->titulado->contarDiferenciaMencion(6, $lab);
        $permanencia7l = $this->titulado->contarDiferenciaMencion(7, $lab);
        $permanencia8l = $this->titulado->contarDiferenciaMencion(8, $lab);
        $permanencia9l = $this->titulado->contarDiferenciaMencion(9, $lab);
        $permanencia10l = $this->titulado->contarDiferenciaMay10Mencion($lab);

        //ESTADISTICAS POR EDAD CARRERA
        $p20a22 = $this->titulado->countPersonasEdad(20, 22);
        $p23a26 = $this->titulado->countPersonasEdad(23, 26);
        $p27a32 = $this->titulado->countPersonasEdad(27, 32);
        $p33a39 = $this->titulado->countPersonasEdad(33, 39);
        $p40a46 = $this->titulado->countPersonasEdad(40, 46);
        $p47a55 = $this->titulado->countPersonasEdad(47, 55);
        $pmaya55 = $this->titulado->contMayor55();

        //ESTADISTICAS POR EDAD BIOIMAGENOLOGIA
        $p20a22b = $this->titulado->countPersonasEdadMencion(20, 22, $bio);
        $p23a26b = $this->titulado->countPersonasEdadMencion(23, 26, $bio);
        $p27a32b = $this->titulado->countPersonasEdadMencion(27, 32, $bio);
        $p33a39b = $this->titulado->countPersonasEdadMencion(33, 39, $bio);
        $p40a46b = $this->titulado->countPersonasEdadMencion(40, 46, $bio);
        $p47a55b = $this->titulado->countPersonasEdadMencion(47, 55, $bio);
        $pmaya55b = $this->titulado->contMayor55Mencion($bio);

        //ESTADISTICAS POR EDAD RADIOLOGÍA
        $p20a22r = $this->titulado->countPersonasEdadMencion(20, 22, $rad);
        $p23a26r = $this->titulado->countPersonasEdadMencion(23, 26, $rad);
        $p27a32r = $this->titulado->countPersonasEdadMencion(27, 32, $rad);
        $p33a39r = $this->titulado->countPersonasEdadMencion(33, 39, $rad);
        $p40a46r = $this->titulado->countPersonasEdadMencion(40, 46, $rad);
        $p47a55r = $this->titulado->countPersonasEdadMencion(47, 55, $rad);
        $pmaya55r = $this->titulado->contMayor55Mencion($rad);

        //ESTADISTICAS POR EDAD FIOSIOTERAPIA
        $p20a22f = $this->titulado->countPersonasEdadMencion(20, 22, $fis);
        $p23a26f = $this->titulado->countPersonasEdadMencion(23, 26, $fis);
        $p27a32f = $this->titulado->countPersonasEdadMencion(27, 32, $fis);
        $p33a39f = $this->titulado->countPersonasEdadMencion(33, 39, $fis);
        $p40a46f = $this->titulado->countPersonasEdadMencion(40, 46, $fis);
        $p47a55f = $this->titulado->countPersonasEdadMencion(47, 55, $fis);
        $pmaya55f = $this->titulado->contMayor55Mencion($fis);

        //ESTADISTICAS POR EDAD LABORATORIO
        $p20a22l = $this->titulado->countPersonasEdadMencion(20, 22, $lab);
        $p23a26l = $this->titulado->countPersonasEdadMencion(23, 26, $lab);
        $p27a32l = $this->titulado->countPersonasEdadMencion(27, 32, $lab);
        $p33a39l = $this->titulado->countPersonasEdadMencion(33, 39, $lab);
        $p40a46l = $this->titulado->countPersonasEdadMencion(40, 46, $lab);
        $p47a55l = $this->titulado->countPersonasEdadMencion(47, 55, $lab);
        $pmaya55l = $this->titulado->contMayor55Mencion($lab);
        
        $data = [
            'generoCarrera' => ['Masculino', 'Femenino'],
            'cantgeneroCarrera' => [$tgeneroCM, $tgeneroCF],
            'generoMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico', 'Radiología'],
            'cantGeneroMasculino' => [$tgeneroBM, $tgeneroFM, $tgeneroLM, $tgeneroRM],
            'cantGeneroFemenino' => [$tgeneroBF, $tgeneroFF, $tgeneroLF, $tgeneroRF],

            'residenciaCarrera' => ['La Paz', 'El Alto', 'Nacionales', 'Internacionales'],
            'cantresidenciaCarrera' => [$tresidenciaCL, $tresidenciaCEA, $tresidenciaCN, $tresidenciaCI],
            'residenciaMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico', 'Radiología'],
            'cantlapazMencion' => [$totallapazb, $totallapazf, $totallapazl, $totallapazr],
            'cantelaltoMencion' => [$totalelaltob, $totalelaltof, $totalelaltol, $totalelaltor],
            'cantnacionalesMencion' => [$totalnacionalb, $totalnacionalf, $totalnacionall, $totalnacionalr],
            'cantinternacionalesMencion' => [$totalinternacionalesb, $totalinternacionalesf, $totalinternacionalesl, $totalinternacionalesr],

            'permanenciaCarrera' => ['3 años', '4 años', '5 años', '6 años', '7 años', '8 años', '9 años', '>= 10 años'],
            'cantpermanenciaCarrera' => [$permanencia3, $permanencia4, $permanencia5, $permanencia6, $permanencia7, $permanencia8, $permanencia9, $permanencia10],
            'permanenciaMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico', 'Radiología'],
            'permanencia3' => [$permanencia3b, $permanencia3f, $permanencia3l, $permanencia3r],
            'permanencia4' => [$permanencia4b, $permanencia4f, $permanencia4l, $permanencia4r],
            'permanencia5' => [$permanencia5b, $permanencia5f, $permanencia5l, $permanencia5r],
            'permanencia6' => [$permanencia6b, $permanencia6f, $permanencia6l, $permanencia6r],
            'permanencia7' => [$permanencia7b, $permanencia7f, $permanencia7l, $permanencia7r],
            'permanencia8' => [$permanencia8b, $permanencia8f, $permanencia8l, $permanencia8r],
            'permanencia9' => [$permanencia9b, $permanencia9f, $permanencia9l, $permanencia9r],
            'permanencia10' => [$permanencia10b, $permanencia10f, $permanencia10l, $permanencia10r],

            'edadCarrera' => ['20 a 22', '23 a 26', '27 a 32', '33 a 39', '40 a 46', '47 a 55', '>55'],
            'cantedadCarrera' => [$p20a22, $p23a26, $p27a32, $p33a39, $p40a46, $p47a55, $pmaya55],
            'edadMencion' => ['Bioimagenología', 'Fisioterapia y Kinesiología', 'Laboratorio Clínico', 'Radiología'],
            'edad1' => [$p20a22b, $p20a22f, $p20a22l, $p20a22r],
            'edad2' => [$p23a26b, $p23a26f, $p23a26l, $p23a26r],
            'edad3' => [$p27a32b, $p27a32f, $p27a32l, $p27a32r],
            'edad4' => [$p33a39b, $p33a39f, $p33a39l, $p33a39r],
            'edad5' => [$p40a46b, $p40a46f, $p40a46l, $p40a46r],
            'edad6' => [$p47a55b, $p47a55f, $p47a55l, $p47a55r],
            'edad7' => [$pmaya55b, $pmaya55f, $pmaya55l, $pmaya55r]
        ];

        $dato = [
            'titulo' => 'Estadísticas Carrera de Tecnología Médica',
            'data' => $data,
            //DATOS TABLAS GENERO CARRERA
            'tgeneroC' => $tgeneroC,
            'tgeneroCM' => $tgeneroCM,
            'tgeneroCF' => $tgeneroCF,
            //DATOS TABLAS GENERO BIOIMAGENOLOGIA
            'tgeneroB' => $tgeneroB,
            'tgeneroBM' => $tgeneroBM,
            'tgeneroBF' => $tgeneroBF,
            //DATOS TABLAS GENERO FISIOTERAPIA
            'tgeneroF' => $tgeneroF,
            'tgeneroFM' => $tgeneroFM,
            'tgeneroFF' => $tgeneroFF,
            //DATOS TABLAS GENERO LABORATORIO
            'tgeneroL' => $tgeneroL,
            'tgeneroLM' => $tgeneroLM,
            'tgeneroLF' => $tgeneroLF,
            //DATOS TABLAS GENERO RADIOLOGÍA
            'tgeneroR' => $tgeneroR,
            'tgeneroRM' => $tgeneroRM,
            'tgeneroRF' => $tgeneroRF,

            //DATOS TABLAS RESIDENCIA CARRERA
            'tresidenciaCL' => $tresidenciaCL,
            'tresidenciaCEA' => $tresidenciaCEA,
            'tresidenciaCN' => $tresidenciaCN,
            'tresidenciaCI' => $tresidenciaCI,
            //DATOS TABLAS RESIDENCIA BOIMAGENOLOGIA
            'totallapazb' => $totallapazb,
            'totalelaltob' => $totalelaltob,
            'totalnacionalb' => $totalnacionalb,
            'totalinternacionalesb' => $totalinternacionalesb,
            //DATOS TABLAS RESIDENCIA FISIOTERAPIA
            'totallapazf' => $totallapazf,
            'totalelaltof' => $totalelaltof,
            'totalnacionalf' => $totalnacionalf,
            'totalinternacionalesf' => $totalinternacionalesf,
            //DATOS TABLAS RESIDENCIA LABORATORIO
            'totallapazl' => $totallapazl,
            'totalelaltol' => $totalelaltol,
            'totalnacionall' => $totalnacionall,
            'totalinternacionalesl' => $totalinternacionalesl,
            //DATOS TABLAS RESIDENCIA RADIOLOGIA
            'totallapazr' => $totallapazr,
            'totalelaltor' => $totalelaltor,
            'totalnacionalr' => $totalnacionalr,
            'totalinternacionalesr' => $totalinternacionalesr,


            //DATOS ESTADISTICOS POR EDAD CARRERA
            'p20a22' => $p20a22,
            'p23a26' => $p23a26,
            'p27a32' => $p27a32,
            'p33a39' => $p33a39,
            'p40a46' => $p40a46,
            'p47a55' => $p47a55,
            'pmaya55' => $pmaya55,
            //DATOS ESTADISTICOS POR EDAD BIOIMAGENOLOGÍA
            'p20a22b' => $p20a22b,
            'p23a26b' => $p23a26b,
            'p27a32b' => $p27a32b,
            'p33a39b' => $p33a39b,
            'p40a46b' => $p40a46b,
            'p47a55b' => $p47a55b,
            'pmaya55b' => $pmaya55b,
            //DATOS ESTADISTICOS POR EDAD FISIOTERAPIA
            'p20a22f' => $p20a22f,
            'p23a26f' => $p23a26f,
            'p27a32f' => $p27a32f,
            'p33a39f' => $p33a39f,
            'p40a46f' => $p40a46f,
            'p47a55f' => $p47a55f,
            'pmaya55f' => $pmaya55f,
            //DATOS ESTADISTICOS POR EDAD LABORATORIO CLINICO
            'p20a22l' => $p20a22l,
            'p23a26l' => $p23a26l,
            'p27a32l' => $p27a32l,
            'p33a39l' => $p33a39l,
            'p40a46l' => $p40a46l,
            'p47a55l' => $p47a55l,
            'pmaya55l' => $pmaya55l,
            //DATOS ESTADISTICOS POR EDAD LABORATORIO CLINICO
            'p20a22r' => $p20a22r,
            'p23a26r' => $p23a26r,
            'p27a32r' => $p27a32r,
            'p33a39r' => $p33a39r,
            'p40a46r' => $p40a46r,
            'p47a55r' => $p47a55r,
            'pmaya55r' => $pmaya55r,

            //DATOS ESTADISTICOS POR PERMANENCIA CARRERA
            'permanencia3' => $permanencia3,
            'permanencia4' => $permanencia4,
            'permanencia5' => $permanencia5,
            'permanencia6' => $permanencia6,
            'permanencia7' => $permanencia7,
            'permanencia8' => $permanencia8,
            'permanencia9' => $permanencia9,
            'permanencia10' => $permanencia10,
            //DATOS ESTADISTICOS POR PERMANENCIA BIOIMAGENOLOGIA
            'permanencia3b' => $permanencia3b,
            'permanencia4b' => $permanencia4b,
            'permanencia5b' => $permanencia5b,
            'permanencia6b' => $permanencia6b,
            'permanencia7b' => $permanencia7b,
            'permanencia8b' => $permanencia8b,
            'permanencia9b' => $permanencia9b,
            'permanencia10b' => $permanencia10b,
            //DATOS ESTADISTICOS POR PERMANENCIA FISIOTERAPIA
            'permanencia3f' => $permanencia3f,
            'permanencia4f' => $permanencia4f,
            'permanencia5f' => $permanencia5f,
            'permanencia6f' => $permanencia6f,
            'permanencia7f' => $permanencia7f,
            'permanencia8f' => $permanencia8f,
            'permanencia9f' => $permanencia9f,
            'permanencia10f' => $permanencia10f,
            //DATOS ESTADISTICOS POR PERMANENCIA RADIOLOGIA
            'permanencia3r' => $permanencia3r,
            'permanencia4r' => $permanencia4r,
            'permanencia5r' => $permanencia5r,
            'permanencia6r' => $permanencia6r,
            'permanencia7r' => $permanencia7r,
            'permanencia8r' => $permanencia8r,
            'permanencia9r' => $permanencia9r,
            'permanencia10r' => $permanencia10r,
            //DATOS ESTADISTICOS POR PERMANENCIA LABORATORIO
            'permanencia3l' => $permanencia3l,
            'permanencia4l' => $permanencia4l,
            'permanencia5l' => $permanencia5l,
            'permanencia6l' => $permanencia6l,
            'permanencia7l' => $permanencia7l,
            'permanencia8l' => $permanencia8l,
            'permanencia9l' => $permanencia9l,
            'permanencia10l' => $permanencia10l
            
        ];

        echo view('menu');
        echo view('estadisticas', $dato);
        echo view('footer');
    }
}
