<?php
function porcentaje($total, $valor)
{
    if ($total == 0) {
        $res = "0%";
    } else {
        $res = number_format((($valor * 100) / $total), 0) . '%';
    }
    return $res;
}
?>
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <br>
            <div class="col-sm-12 card-header" style="background-color: midnightblue;">
                <center>
                    <h4 style="color: white;"><?php echo $titulo; ?></h4>
                </center>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="callout callout-danger">
                            <h5>Criterio de Calificación </h5>
                            <strong>1. Malo:</strong> El aspecto evaluado es deficiente o no cumple con las expectativas.<br>
                            <strong>2. Regular:</strong> El aspecto evaluado tiene algunas deficiencias o se encuentra en un nivel promedio.<br>
                            <strong>3. Aceptable:</strong> El aspecto evaluado cumple con las expectativas mínimas o se encuentra en un nivel satisfactorio.<br>
                            <strong>4. Bueno:</strong> El aspecto evaluado es de calidad y supera las expectativas básicas.<br>
                            <strong>5. Excelente:</strong> El aspecto evaluado es excepcional y va más allá de las expectativas, demostrando un alto nivel de satisfacción.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="callout callout-info">
                            <h5>PREPARACIÓN ACADÉMICA</h5>
                            <p>1. ¿La formación académica adquirida durante el pregrado tiene un impacto en el desempeño laboral actualmente?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered" style="text-align: center;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>MENCIONES</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Carrera</td>
                                        <td><?php echo $p1_1 . ' - ' . porcentaje($totalCarrera, $p1_1); ?></td>
                                        <td><?php echo $p1_2 . ' - ' . porcentaje($totalCarrera, $p1_2); ?></td>
                                        <td><?php echo $p1_3 . ' - ' . porcentaje($totalCarrera, $p1_3); ?></td>
                                        <td><?php echo $p1_4 . ' - ' . porcentaje($totalCarrera, $p1_4); ?></td>
                                        <td><?php echo $p1_5 . ' - ' . porcentaje($totalCarrera, $p1_5); ?></td>
                                        <td><?php echo $totalCarrera . ' - ' . porcentaje($totalCarrera, $totalCarrera); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bioimagenología</td>
                                        <td><?php echo $p1B_1 . ' - ' . porcentaje($totalBioimagenologia, $p1B_1); ?></td>
                                        <td><?php echo $p1B_2 . ' - ' . porcentaje($totalBioimagenologia, $p1B_2); ?></td>
                                        <td><?php echo $p1B_3 . ' - ' . porcentaje($totalBioimagenologia, $p1B_3); ?></td>
                                        <td><?php echo $p1B_4 . ' - ' . porcentaje($totalBioimagenologia, $p1B_4); ?></td>
                                        <td><?php echo $p1B_5 . ' - ' . porcentaje($totalBioimagenologia, $p1B_5); ?></td>
                                        <td><?php echo $totalBioimagenologia . ' - ' . porcentaje($totalBioimagenologia, $totalBioimagenologia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fisioterapia</td>
                                        <td><?php echo $p1F_1 . ' - ' . porcentaje($totalFisioterapia, $p1F_1); ?></td>
                                        <td><?php echo $p1F_2 . ' - ' . porcentaje($totalFisioterapia, $p1F_2); ?></td>
                                        <td><?php echo $p1F_3 . ' - ' . porcentaje($totalFisioterapia, $p1F_3); ?></td>
                                        <td><?php echo $p1F_4 . ' - ' . porcentaje($totalFisioterapia, $p1F_4); ?></td>
                                        <td><?php echo $p1F_5 . ' - ' . porcentaje($totalFisioterapia, $p1F_5); ?></td>
                                        <td><?php echo $totalFisioterapia . ' - ' . porcentaje($totalFisioterapia, $totalFisioterapia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Laboratorio Clínico</td>
                                        <td><?php echo $p1L_1 . ' - ' . porcentaje($totalLaboratorio, $p1L_1); ?></td>
                                        <td><?php echo $p1L_2 . ' - ' . porcentaje($totalLaboratorio, $p1L_2); ?></td>
                                        <td><?php echo $p1L_3 . ' - ' . porcentaje($totalLaboratorio, $p1L_3); ?></td>
                                        <td><?php echo $p1L_4 . ' - ' . porcentaje($totalLaboratorio, $p1L_4); ?></td>
                                        <td><?php echo $p1L_5 . ' - ' . porcentaje($totalLaboratorio, $p1L_5); ?></td>
                                        <td><?php echo $totalLaboratorio . ' - ' . porcentaje($totalLaboratorio, $totalLaboratorio); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Radiología</td>
                                        <td><?php echo $p1R_1 . ' - ' . porcentaje($totalRadiologia, $p1R_1); ?></td>
                                        <td><?php echo $p1R_2 . ' - ' . porcentaje($totalRadiologia, $p1R_2); ?></td>
                                        <td><?php echo $p1R_3 . ' - ' . porcentaje($totalRadiologia, $p1R_3); ?></td>
                                        <td><?php echo $p1R_4 . ' - ' . porcentaje($totalRadiologia, $p1R_4); ?></td>
                                        <td><?php echo $p1R_5 . ' - ' . porcentaje($totalRadiologia, $p1R_5); ?></td>
                                        <td><?php echo $totalRadiologia . ' - ' . porcentaje($totalRadiologia, $totalRadiologia); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            <canvas id="p1carrera" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-warning">

                        <div class="card-body">
                            <canvas id="p1mencion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="callout callout-info">
                            <h5>PLAN DE ESTUDIOS</h5>
                            <p>2. ¿Aplica los conocimientos y habilidades adquiridos a través del Plan de Estudios de su pregrado en su actividad laboral actual?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered" style="text-align: center;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>MENCIONES</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Carrera</td>
                                        <td><?php echo $p2_1 . ' - ' . porcentaje($totalCarrera, $p2_1); ?></td>
                                        <td><?php echo $p2_2 . ' - ' . porcentaje($totalCarrera, $p2_2); ?></td>
                                        <td><?php echo $p2_3 . ' - ' . porcentaje($totalCarrera, $p2_3); ?></td>
                                        <td><?php echo $p2_4 . ' - ' . porcentaje($totalCarrera, $p2_4); ?></td>
                                        <td><?php echo $p2_5 . ' - ' . porcentaje($totalCarrera, $p2_5); ?></td>
                                        <td><?php echo $totalCarrera . ' - ' . porcentaje($totalCarrera, $totalCarrera); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bioimagenología</td>
                                        <td><?php echo $p2B_1 . ' - ' . porcentaje($totalBioimagenologia, $p2B_1); ?></td>
                                        <td><?php echo $p2B_2 . ' - ' . porcentaje($totalBioimagenologia, $p2B_2); ?></td>
                                        <td><?php echo $p2B_3 . ' - ' . porcentaje($totalBioimagenologia, $p2B_3); ?></td>
                                        <td><?php echo $p2B_4 . ' - ' . porcentaje($totalBioimagenologia, $p2B_4); ?></td>
                                        <td><?php echo $p2B_5 . ' - ' . porcentaje($totalBioimagenologia, $p2B_5); ?></td>
                                        <td><?php echo $totalBioimagenologia . ' - ' . porcentaje($totalBioimagenologia, $totalBioimagenologia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fisioterapia</td>
                                        <td><?php echo $p2F_1 . ' - ' . porcentaje($totalFisioterapia, $p2F_1); ?></td>
                                        <td><?php echo $p2F_2 . ' - ' . porcentaje($totalFisioterapia, $p2F_2); ?></td>
                                        <td><?php echo $p2F_3 . ' - ' . porcentaje($totalFisioterapia, $p2F_3); ?></td>
                                        <td><?php echo $p2F_4 . ' - ' . porcentaje($totalFisioterapia, $p2F_4); ?></td>
                                        <td><?php echo $p2F_5 . ' - ' . porcentaje($totalFisioterapia, $p2F_5); ?></td>
                                        <td><?php echo $totalFisioterapia . ' - ' . porcentaje($totalFisioterapia, $totalFisioterapia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Laboratorio Clínico</td>
                                        <td><?php echo $p2L_1 . ' - ' . porcentaje($totalLaboratorio, $p2L_1); ?></td>
                                        <td><?php echo $p2L_2 . ' - ' . porcentaje($totalLaboratorio, $p2L_2); ?></td>
                                        <td><?php echo $p2L_3 . ' - ' . porcentaje($totalLaboratorio, $p2L_3); ?></td>
                                        <td><?php echo $p2L_4 . ' - ' . porcentaje($totalLaboratorio, $p2L_4); ?></td>
                                        <td><?php echo $p2L_5 . ' - ' . porcentaje($totalLaboratorio, $p2L_5); ?></td>
                                        <td><?php echo $totalLaboratorio . ' - ' . porcentaje($totalLaboratorio, $totalLaboratorio); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Radiología</td>
                                        <td><?php echo $p2R_1 . ' - ' . porcentaje($totalRadiologia, $p2R_1); ?></td>
                                        <td><?php echo $p2R_2 . ' - ' . porcentaje($totalRadiologia, $p2R_2); ?></td>
                                        <td><?php echo $p2R_3 . ' - ' . porcentaje($totalRadiologia, $p2R_3); ?></td>
                                        <td><?php echo $p2R_4 . ' - ' . porcentaje($totalRadiologia, $p2R_4); ?></td>
                                        <td><?php echo $p2R_5 . ' - ' . porcentaje($totalRadiologia, $p2R_5); ?></td>
                                        <td><?php echo $totalRadiologia . ' - ' . porcentaje($totalRadiologia, $totalRadiologia); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            <canvas id="p2carrera" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-warning">

                        <div class="card-body">
                            <canvas id="p2mencion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="callout callout-info">
                            <h5>ASIGNATURAS</h5>
                            <p>3. ¿Los contenidos impartidos por los docentes en las asignaturas han cumplido con sus expectativas académicas?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered" style="text-align: center;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>MENCIONES</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Carrera</td>
                                        <td><?php echo $p3_1 . ' - ' . porcentaje($totalCarrera, $p3_1); ?></td>
                                        <td><?php echo $p3_2 . ' - ' . porcentaje($totalCarrera, $p3_2); ?></td>
                                        <td><?php echo $p3_3 . ' - ' . porcentaje($totalCarrera, $p3_3); ?></td>
                                        <td><?php echo $p3_4 . ' - ' . porcentaje($totalCarrera, $p3_4); ?></td>
                                        <td><?php echo $p3_5 . ' - ' . porcentaje($totalCarrera, $p3_5); ?></td>
                                        <td><?php echo $totalCarrera . ' - ' . porcentaje($totalCarrera, $totalCarrera); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bioimagenología</td>
                                        <td><?php echo $p3B_1 . ' - ' . porcentaje($totalBioimagenologia, $p3B_1); ?></td>
                                        <td><?php echo $p3B_2 . ' - ' . porcentaje($totalBioimagenologia, $p3B_2); ?></td>
                                        <td><?php echo $p3B_3 . ' - ' . porcentaje($totalBioimagenologia, $p3B_3); ?></td>
                                        <td><?php echo $p3B_4 . ' - ' . porcentaje($totalBioimagenologia, $p3B_4); ?></td>
                                        <td><?php echo $p3B_5 . ' - ' . porcentaje($totalBioimagenologia, $p3B_5); ?></td>
                                        <td><?php echo $totalBioimagenologia . ' - ' . porcentaje($totalBioimagenologia, $totalBioimagenologia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fisioterapia</td>
                                        <td><?php echo $p3F_1 . ' - ' . porcentaje($totalFisioterapia, $p3F_1); ?></td>
                                        <td><?php echo $p3F_2 . ' - ' . porcentaje($totalFisioterapia, $p3F_2); ?></td>
                                        <td><?php echo $p3F_3 . ' - ' . porcentaje($totalFisioterapia, $p3F_3); ?></td>
                                        <td><?php echo $p3F_4 . ' - ' . porcentaje($totalFisioterapia, $p3F_4); ?></td>
                                        <td><?php echo $p3F_5 . ' - ' . porcentaje($totalFisioterapia, $p3F_5); ?></td>
                                        <td><?php echo $totalFisioterapia . ' - ' . porcentaje($totalFisioterapia, $totalFisioterapia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Laboratorio Clínico</td>
                                        <td><?php echo $p3L_1 . ' - ' . porcentaje($totalLaboratorio, $p3L_1); ?></td>
                                        <td><?php echo $p3L_2 . ' - ' . porcentaje($totalLaboratorio, $p3L_2); ?></td>
                                        <td><?php echo $p3L_3 . ' - ' . porcentaje($totalLaboratorio, $p3L_3); ?></td>
                                        <td><?php echo $p3L_4 . ' - ' . porcentaje($totalLaboratorio, $p3L_4); ?></td>
                                        <td><?php echo $p3L_5 . ' - ' . porcentaje($totalLaboratorio, $p3L_5); ?></td>
                                        <td><?php echo $totalLaboratorio . ' - ' . porcentaje($totalLaboratorio, $totalLaboratorio); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Radiologia</td>
                                        <td><?php echo $p3R_1 . ' - ' . porcentaje($totalRadiologia, $p3R_1); ?></td>
                                        <td><?php echo $p3R_2 . ' - ' . porcentaje($totalRadiologia, $p3R_2); ?></td>
                                        <td><?php echo $p3R_3 . ' - ' . porcentaje($totalRadiologia, $p3R_3); ?></td>
                                        <td><?php echo $p3R_4 . ' - ' . porcentaje($totalRadiologia, $p3R_4); ?></td>
                                        <td><?php echo $p3R_5 . ' - ' . porcentaje($totalRadiologia, $p3R_5); ?></td>
                                        <td><?php echo $totalRadiologia . ' - ' . porcentaje($totalRadiologia, $totalRadiologia); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            <canvas id="p3carrera" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-warning">

                        <div class="card-body">
                            <canvas id="p3mencion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="callout callout-info">
                            <h5>EQUIPAMENTO</h5>
                            <p>4. ¿En su estadía de estudio en la Carrera se contaba con aulas prácticas? De ser verdad responda la siguiente pregunta, caso contrario puede saltarse esta pregunta
                                ¿Las instalaciones de prácticas cumplen con las necesidades requeridas para llevar a cabo procedimientos acordes a los avances actuales?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered" style="text-align: center;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>MENCIONES</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Carrera</td>
                                        <td><?php echo $p4_1 . ' - ' . porcentaje($totalCarrera, $p4_1); ?></td>
                                        <td><?php echo $p4_2 . ' - ' . porcentaje($totalCarrera, $p4_2); ?></td>
                                        <td><?php echo $p4_3 . ' - ' . porcentaje($totalCarrera, $p4_3); ?></td>
                                        <td><?php echo $p4_4 . ' - ' . porcentaje($totalCarrera, $p4_4); ?></td>
                                        <td><?php echo $p4_5 . ' - ' . porcentaje($totalCarrera, $p4_5); ?></td>
                                        <td><?php echo $totalCarrera . ' - ' . porcentaje($totalCarrera, $totalCarrera); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bioimagenología</td>
                                        <td><?php echo $p4B_1 . ' - ' . porcentaje($totalBioimagenologia, $p4B_1); ?></td>
                                        <td><?php echo $p4B_2 . ' - ' . porcentaje($totalBioimagenologia, $p4B_2); ?></td>
                                        <td><?php echo $p4B_3 . ' - ' . porcentaje($totalBioimagenologia, $p4B_3); ?></td>
                                        <td><?php echo $p4B_4 . ' - ' . porcentaje($totalBioimagenologia, $p4B_4); ?></td>
                                        <td><?php echo $p4B_5 . ' - ' . porcentaje($totalBioimagenologia, $p4B_5); ?></td>
                                        <td><?php echo $totalBioimagenologia . ' - ' . porcentaje($totalBioimagenologia, $totalBioimagenologia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fisioterapia</td>
                                        <td><?php echo $p4F_1 . ' - ' . porcentaje($totalFisioterapia, $p4F_1); ?></td>
                                        <td><?php echo $p4F_2 . ' - ' . porcentaje($totalFisioterapia, $p4F_2); ?></td>
                                        <td><?php echo $p4F_3 . ' - ' . porcentaje($totalFisioterapia, $p4F_3); ?></td>
                                        <td><?php echo $p4F_4 . ' - ' . porcentaje($totalFisioterapia, $p4F_4); ?></td>
                                        <td><?php echo $p4F_5 . ' - ' . porcentaje($totalFisioterapia, $p4F_5); ?></td>
                                        <td><?php echo $totalFisioterapia . ' - ' . porcentaje($totalFisioterapia, $totalFisioterapia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Laboratorio Clínico</td>
                                        <td><?php echo $p4L_1 . ' - ' . porcentaje($totalLaboratorio, $p4L_1); ?></td>
                                        <td><?php echo $p4L_2 . ' - ' . porcentaje($totalLaboratorio, $p4L_2); ?></td>
                                        <td><?php echo $p4L_3 . ' - ' . porcentaje($totalLaboratorio, $p4L_3); ?></td>
                                        <td><?php echo $p4L_4 . ' - ' . porcentaje($totalLaboratorio, $p4L_4); ?></td>
                                        <td><?php echo $p4L_5 . ' - ' . porcentaje($totalLaboratorio, $p4L_5); ?></td>
                                        <td><?php echo $totalLaboratorio . ' - ' . porcentaje($totalLaboratorio, $totalLaboratorio); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Radiologia</td>
                                        <td><?php echo $p4R_1 . ' - ' . porcentaje($totalRadiologia, $p4R_1); ?></td>
                                        <td><?php echo $p4R_2 . ' - ' . porcentaje($totalRadiologia, $p4R_2); ?></td>
                                        <td><?php echo $p4R_3 . ' - ' . porcentaje($totalRadiologia, $p4R_3); ?></td>
                                        <td><?php echo $p4R_4 . ' - ' . porcentaje($totalRadiologia, $p4R_4); ?></td>
                                        <td><?php echo $p4R_5 . ' - ' . porcentaje($totalRadiologia, $p4R_5); ?></td>
                                        <td><?php echo $totalRadiologia . ' - ' . porcentaje($totalRadiologia, $totalRadiologia); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            <canvas id="p4carrera" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-warning">

                        <div class="card-body">
                            <canvas id="p4mencion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="callout callout-info">
                            <h5>INFRAESTRUCTURA</h5>
                            <p>5. ¿La infraestructura actual mobiliaria de la Carrera son adecuados para la formación profesional?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered" style="text-align: center;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>MENCIONES</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Carrera</td>
                                        <td><?php echo $p5_1 . ' - ' . porcentaje($totalCarrera, $p5_1); ?></td>
                                        <td><?php echo $p5_2 . ' - ' . porcentaje($totalCarrera, $p5_2); ?></td>
                                        <td><?php echo $p5_3 . ' - ' . porcentaje($totalCarrera, $p5_3); ?></td>
                                        <td><?php echo $p5_4 . ' - ' . porcentaje($totalCarrera, $p5_4); ?></td>
                                        <td><?php echo $p5_5 . ' - ' . porcentaje($totalCarrera, $p5_5); ?></td>
                                        <td><?php echo $totalCarrera . ' - ' . porcentaje($totalCarrera, $totalCarrera); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bioimagenología</td>
                                        <td><?php echo $p5B_1 . ' - ' . porcentaje($totalBioimagenologia, $p5B_1); ?></td>
                                        <td><?php echo $p5B_2 . ' - ' . porcentaje($totalBioimagenologia, $p5B_2); ?></td>
                                        <td><?php echo $p5B_3 . ' - ' . porcentaje($totalBioimagenologia, $p5B_3); ?></td>
                                        <td><?php echo $p5B_4 . ' - ' . porcentaje($totalBioimagenologia, $p5B_4); ?></td>
                                        <td><?php echo $p5B_5 . ' - ' . porcentaje($totalBioimagenologia, $p5B_5); ?></td>
                                        <td><?php echo $totalBioimagenologia . ' - ' . porcentaje($totalBioimagenologia, $totalBioimagenologia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fisioterapia</td>
                                        <td><?php echo $p5F_1 . ' - ' . porcentaje($totalFisioterapia, $p5F_1); ?></td>
                                        <td><?php echo $p5F_2 . ' - ' . porcentaje($totalFisioterapia, $p5F_2); ?></td>
                                        <td><?php echo $p5F_3 . ' - ' . porcentaje($totalFisioterapia, $p5F_3); ?></td>
                                        <td><?php echo $p5F_4 . ' - ' . porcentaje($totalFisioterapia, $p5F_4); ?></td>
                                        <td><?php echo $p5F_5 . ' - ' . porcentaje($totalFisioterapia, $p5F_5); ?></td>
                                        <td><?php echo $totalFisioterapia . ' - ' . porcentaje($totalFisioterapia, $totalFisioterapia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Laboratorio Clínico</td>
                                        <td><?php echo $p5L_1 . ' - ' . porcentaje($totalLaboratorio, $p5L_1); ?></td>
                                        <td><?php echo $p5L_2 . ' - ' . porcentaje($totalLaboratorio, $p5L_2); ?></td>
                                        <td><?php echo $p5L_3 . ' - ' . porcentaje($totalLaboratorio, $p5L_3); ?></td>
                                        <td><?php echo $p5L_4 . ' - ' . porcentaje($totalLaboratorio, $p5L_4); ?></td>
                                        <td><?php echo $p5L_5 . ' - ' . porcentaje($totalLaboratorio, $p5L_5); ?></td>
                                        <td><?php echo $totalLaboratorio . ' - ' . porcentaje($totalLaboratorio, $totalLaboratorio); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Radiología</td>
                                        <td><?php echo $p5R_1 . ' - ' . porcentaje($totalRadiologia, $p5R_1); ?></td>
                                        <td><?php echo $p5R_2 . ' - ' . porcentaje($totalRadiologia, $p5R_2); ?></td>
                                        <td><?php echo $p5R_3 . ' - ' . porcentaje($totalRadiologia, $p5R_3); ?></td>
                                        <td><?php echo $p5R_4 . ' - ' . porcentaje($totalRadiologia, $p5R_4); ?></td>
                                        <td><?php echo $p5R_5 . ' - ' . porcentaje($totalRadiologia, $p5R_5); ?></td>
                                        <td><?php echo $totalRadiologia . ' - ' . porcentaje($totalRadiologia, $totalRadiologia); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            <canvas id="p5carrera" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-warning">
                        <div class="card-body">
                            <canvas id="p5mencion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="callout callout-info">
                            <h5>BIBLIOTECA</h5>
                            <p>6. ¿Considera que los servicios de la biblioteca de la Facultad satisfacen sus necesidades académicas y de investigación?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered" style="text-align: center;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>MENCIONES</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Carrera</td>
                                        <td><?php echo $p6_1 . ' - ' . porcentaje($totalCarrera, $p6_1); ?></td>
                                        <td><?php echo $p6_2 . ' - ' . porcentaje($totalCarrera, $p6_2); ?></td>
                                        <td><?php echo $p6_3 . ' - ' . porcentaje($totalCarrera, $p6_3); ?></td>
                                        <td><?php echo $p6_4 . ' - ' . porcentaje($totalCarrera, $p6_4); ?></td>
                                        <td><?php echo $p6_5 . ' - ' . porcentaje($totalCarrera, $p6_5); ?></td>
                                        <td><?php echo $totalCarrera . ' - ' . porcentaje($totalCarrera, $totalCarrera); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bioimagenología</td>
                                        <td><?php echo $p6B_1 . ' - ' . porcentaje($totalBioimagenologia, $p6B_1); ?></td>
                                        <td><?php echo $p6B_2 . ' - ' . porcentaje($totalBioimagenologia, $p6B_2); ?></td>
                                        <td><?php echo $p6B_3 . ' - ' . porcentaje($totalBioimagenologia, $p6B_3); ?></td>
                                        <td><?php echo $p6B_4 . ' - ' . porcentaje($totalBioimagenologia, $p6B_4); ?></td>
                                        <td><?php echo $p6B_5 . ' - ' . porcentaje($totalBioimagenologia, $p6B_5); ?></td>
                                        <td><?php echo $totalBioimagenologia . ' - ' . porcentaje($totalBioimagenologia, $totalBioimagenologia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fisioterapia</td>
                                        <td><?php echo $p6F_1 . ' - ' . porcentaje($totalFisioterapia, $p6F_1); ?></td>
                                        <td><?php echo $p6F_2 . ' - ' . porcentaje($totalFisioterapia, $p6F_2); ?></td>
                                        <td><?php echo $p6F_3 . ' - ' . porcentaje($totalFisioterapia, $p6F_3); ?></td>
                                        <td><?php echo $p6F_4 . ' - ' . porcentaje($totalFisioterapia, $p6F_4); ?></td>
                                        <td><?php echo $p6F_5 . ' - ' . porcentaje($totalFisioterapia, $p6F_5); ?></td>
                                        <td><?php echo $totalFisioterapia . ' - ' . porcentaje($totalFisioterapia, $totalFisioterapia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Laboratorio Clínico</td>
                                        <td><?php echo $p6L_1 . ' - ' . porcentaje($totalLaboratorio, $p6L_1); ?></td>
                                        <td><?php echo $p6L_2 . ' - ' . porcentaje($totalLaboratorio, $p6L_2); ?></td>
                                        <td><?php echo $p6L_3 . ' - ' . porcentaje($totalLaboratorio, $p6L_3); ?></td>
                                        <td><?php echo $p6L_4 . ' - ' . porcentaje($totalLaboratorio, $p6L_4); ?></td>
                                        <td><?php echo $p6L_5 . ' - ' . porcentaje($totalLaboratorio, $p6L_5); ?></td>
                                        <td><?php echo $totalLaboratorio . ' - ' . porcentaje($totalLaboratorio, $totalLaboratorio); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Radiología</td>
                                        <td><?php echo $p6R_1 . ' - ' . porcentaje($totalRadiologia, $p6R_1); ?></td>
                                        <td><?php echo $p6R_2 . ' - ' . porcentaje($totalRadiologia, $p6R_2); ?></td>
                                        <td><?php echo $p6R_3 . ' - ' . porcentaje($totalRadiologia, $p6R_3); ?></td>
                                        <td><?php echo $p6R_4 . ' - ' . porcentaje($totalRadiologia, $p6R_4); ?></td>
                                        <td><?php echo $p6R_5 . ' - ' . porcentaje($totalRadiologia, $p6R_5); ?></td>
                                        <td><?php echo $totalRadiologia . ' - ' . porcentaje($totalRadiologia, $totalRadiologia); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            <canvas id="p6carrera" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-warning">
                        <div class="card-body">
                            <canvas id="p6mencion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="callout callout-info">
                            <h5>ENSEÑANZA DOCENTE</h5>
                            <p>7. ¿Considera que la enseñanza, evaluación y retroalimentación proporcionada por los docentes es oportuna y suficiente?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered" style="text-align: center;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>MENCIONES</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Carrera</td>
                                        <td><?php echo $p7_1 . ' - ' . porcentaje($totalCarrera, $p7_1); ?></td>
                                        <td><?php echo $p7_2 . ' - ' . porcentaje($totalCarrera, $p7_2); ?></td>
                                        <td><?php echo $p7_3 . ' - ' . porcentaje($totalCarrera, $p7_3); ?></td>
                                        <td><?php echo $p7_4 . ' - ' . porcentaje($totalCarrera, $p7_4); ?></td>
                                        <td><?php echo $p7_5 . ' - ' . porcentaje($totalCarrera, $p7_5); ?></td>
                                        <td><?php echo $totalCarrera . ' - ' . porcentaje($totalCarrera, $totalCarrera); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bioimagenología</td>
                                        <td><?php echo $p7B_1 . ' - ' . porcentaje($totalBioimagenologia, $p7B_1); ?></td>
                                        <td><?php echo $p7B_2 . ' - ' . porcentaje($totalBioimagenologia, $p7B_2); ?></td>
                                        <td><?php echo $p7B_3 . ' - ' . porcentaje($totalBioimagenologia, $p7B_3); ?></td>
                                        <td><?php echo $p7B_4 . ' - ' . porcentaje($totalBioimagenologia, $p7B_4); ?></td>
                                        <td><?php echo $p7B_5 . ' - ' . porcentaje($totalBioimagenologia, $p7B_5); ?></td>
                                        <td><?php echo $totalBioimagenologia . ' - ' . porcentaje($totalBioimagenologia, $totalBioimagenologia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fisioterapia</td>
                                        <td><?php echo $p7F_1 . ' - ' . porcentaje($totalFisioterapia, $p7F_1); ?></td>
                                        <td><?php echo $p7F_2 . ' - ' . porcentaje($totalFisioterapia, $p7F_2); ?></td>
                                        <td><?php echo $p7F_3 . ' - ' . porcentaje($totalFisioterapia, $p7F_3); ?></td>
                                        <td><?php echo $p7F_4 . ' - ' . porcentaje($totalFisioterapia, $p7F_4); ?></td>
                                        <td><?php echo $p7F_5 . ' - ' . porcentaje($totalFisioterapia, $p7F_5); ?></td>
                                        <td><?php echo $totalFisioterapia . ' - ' . porcentaje($totalFisioterapia, $totalFisioterapia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Laboratorio Clínico</td>
                                        <td><?php echo $p7L_1 . ' - ' . porcentaje($totalLaboratorio, $p7L_1); ?></td>
                                        <td><?php echo $p7L_2 . ' - ' . porcentaje($totalLaboratorio, $p7L_2); ?></td>
                                        <td><?php echo $p7L_3 . ' - ' . porcentaje($totalLaboratorio, $p7L_3); ?></td>
                                        <td><?php echo $p7L_4 . ' - ' . porcentaje($totalLaboratorio, $p7L_4); ?></td>
                                        <td><?php echo $p7L_5 . ' - ' . porcentaje($totalLaboratorio, $p7L_5); ?></td>
                                        <td><?php echo $totalLaboratorio . ' - ' . porcentaje($totalLaboratorio, $totalLaboratorio); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Radiología</td>
                                        <td><?php echo $p7R_1 . ' - ' . porcentaje($totalRadiologia, $p7R_1); ?></td>
                                        <td><?php echo $p7R_2 . ' - ' . porcentaje($totalRadiologia, $p7R_2); ?></td>
                                        <td><?php echo $p7R_3 . ' - ' . porcentaje($totalRadiologia, $p7R_3); ?></td>
                                        <td><?php echo $p7R_4 . ' - ' . porcentaje($totalRadiologia, $p7R_4); ?></td>
                                        <td><?php echo $p7R_5 . ' - ' . porcentaje($totalRadiologia, $p7R_5); ?></td>
                                        <td><?php echo $totalRadiologia . ' - ' . porcentaje($totalRadiologia, $totalRadiologia); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            <canvas id="p7carrera" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-warning">
                        <div class="card-body">
                            <canvas id="p7mencion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="callout callout-info">
                            <h5>ACTIVIDADES ACADÉMICAS</h5>
                            <p>8. ¿Considera que la cantidad y difusión de actividades científicas y académicas son adecuadas para satisfacer las necesidades de la comunidad académica?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered" style="text-align: center;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>MENCIONES</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Carrera</td>
                                        <td><?php echo $p8_1 . ' - ' . porcentaje($totalCarrera, $p8_1); ?></td>
                                        <td><?php echo $p8_2 . ' - ' . porcentaje($totalCarrera, $p8_2); ?></td>
                                        <td><?php echo $p8_3 . ' - ' . porcentaje($totalCarrera, $p8_3); ?></td>
                                        <td><?php echo $p8_4 . ' - ' . porcentaje($totalCarrera, $p8_4); ?></td>
                                        <td><?php echo $p8_5 . ' - ' . porcentaje($totalCarrera, $p8_5); ?></td>
                                        <td><?php echo $totalCarrera . ' - ' . porcentaje($totalCarrera, $totalCarrera); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bioimagenología</td>
                                        <td><?php echo $p8B_1 . ' - ' . porcentaje($totalBioimagenologia, $p8B_1); ?></td>
                                        <td><?php echo $p8B_2 . ' - ' . porcentaje($totalBioimagenologia, $p8B_2); ?></td>
                                        <td><?php echo $p8B_3 . ' - ' . porcentaje($totalBioimagenologia, $p8B_3); ?></td>
                                        <td><?php echo $p8B_4 . ' - ' . porcentaje($totalBioimagenologia, $p8B_4); ?></td>
                                        <td><?php echo $p8B_5 . ' - ' . porcentaje($totalBioimagenologia, $p8B_5); ?></td>
                                        <td><?php echo $totalBioimagenologia . ' - ' . porcentaje($totalBioimagenologia, $totalBioimagenologia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fisioterapia</td>
                                        <td><?php echo $p8F_1 . ' - ' . porcentaje($totalFisioterapia, $p8F_1); ?></td>
                                        <td><?php echo $p8F_2 . ' - ' . porcentaje($totalFisioterapia, $p8F_2); ?></td>
                                        <td><?php echo $p8F_3 . ' - ' . porcentaje($totalFisioterapia, $p8F_3); ?></td>
                                        <td><?php echo $p8F_4 . ' - ' . porcentaje($totalFisioterapia, $p8F_4); ?></td>
                                        <td><?php echo $p8F_5 . ' - ' . porcentaje($totalFisioterapia, $p8F_5); ?></td>
                                        <td><?php echo $totalFisioterapia . ' - ' . porcentaje($totalFisioterapia, $totalFisioterapia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Laboratorio Clínico</td>
                                        <td><?php echo $p8L_1 . ' - ' . porcentaje($totalLaboratorio, $p8L_1); ?></td>
                                        <td><?php echo $p8L_2 . ' - ' . porcentaje($totalLaboratorio, $p8L_2); ?></td>
                                        <td><?php echo $p8L_3 . ' - ' . porcentaje($totalLaboratorio, $p8L_3); ?></td>
                                        <td><?php echo $p8L_4 . ' - ' . porcentaje($totalLaboratorio, $p8L_4); ?></td>
                                        <td><?php echo $p8L_5 . ' - ' . porcentaje($totalLaboratorio, $p8L_5); ?></td>
                                        <td><?php echo $totalLaboratorio . ' - ' . porcentaje($totalLaboratorio, $totalLaboratorio); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Radiología</td>
                                        <td><?php echo $p8R_1 . ' - ' . porcentaje($totalRadiologia, $p8R_1); ?></td>
                                        <td><?php echo $p8R_2 . ' - ' . porcentaje($totalRadiologia, $p8R_2); ?></td>
                                        <td><?php echo $p8R_3 . ' - ' . porcentaje($totalRadiologia, $p8R_3); ?></td>
                                        <td><?php echo $p8R_4 . ' - ' . porcentaje($totalRadiologia, $p8R_4); ?></td>
                                        <td><?php echo $p8R_5 . ' - ' . porcentaje($totalRadiologia, $p8R_5); ?></td>
                                        <td><?php echo $totalRadiologia . ' - ' . porcentaje($totalRadiologia, $totalRadiologia); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            <canvas id="p8carrera" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-warning">
                        <div class="card-body">
                            <canvas id="p8mencion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="callout callout-info">
                            <h5>ACTIVIDADES EXTRACURRICULARES</h5>
                            <p>9. ¿Considera que las actividades de recreación extracurriculares han cumplido con sus expectativas?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered" style="text-align: center;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>MENCIONES</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Carrera</td>
                                        <td><?php echo $p9_1 . ' - ' . porcentaje($totalCarrera, $p9_1); ?></td>
                                        <td><?php echo $p9_2 . ' - ' . porcentaje($totalCarrera, $p9_2); ?></td>
                                        <td><?php echo $p9_3 . ' - ' . porcentaje($totalCarrera, $p9_3); ?></td>
                                        <td><?php echo $p9_4 . ' - ' . porcentaje($totalCarrera, $p9_4); ?></td>
                                        <td><?php echo $p9_5 . ' - ' . porcentaje($totalCarrera, $p9_5); ?></td>
                                        <td><?php echo $totalCarrera . ' - ' . porcentaje($totalCarrera, $totalCarrera); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bioimagenología</td>
                                        <td><?php echo $p9B_1 . ' - ' . porcentaje($totalBioimagenologia, $p9B_1); ?></td>
                                        <td><?php echo $p9B_2 . ' - ' . porcentaje($totalBioimagenologia, $p9B_2); ?></td>
                                        <td><?php echo $p9B_3 . ' - ' . porcentaje($totalBioimagenologia, $p9B_3); ?></td>
                                        <td><?php echo $p9B_4 . ' - ' . porcentaje($totalBioimagenologia, $p9B_4); ?></td>
                                        <td><?php echo $p9B_5 . ' - ' . porcentaje($totalBioimagenologia, $p9B_5); ?></td>
                                        <td><?php echo $totalBioimagenologia . ' - ' . porcentaje($totalBioimagenologia, $totalBioimagenologia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fisioterapia</td>
                                        <td><?php echo $p9F_1 . ' - ' . porcentaje($totalFisioterapia, $p9F_1); ?></td>
                                        <td><?php echo $p9F_2 . ' - ' . porcentaje($totalFisioterapia, $p9F_2); ?></td>
                                        <td><?php echo $p9F_3 . ' - ' . porcentaje($totalFisioterapia, $p9F_3); ?></td>
                                        <td><?php echo $p9F_4 . ' - ' . porcentaje($totalFisioterapia, $p9F_4); ?></td>
                                        <td><?php echo $p9F_5 . ' - ' . porcentaje($totalFisioterapia, $p9F_5); ?></td>
                                        <td><?php echo $totalFisioterapia . ' - ' . porcentaje($totalFisioterapia, $totalFisioterapia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Laboratorio Clínico</td>
                                        <td><?php echo $p9L_1 . ' - ' . porcentaje($totalLaboratorio, $p9L_1); ?></td>
                                        <td><?php echo $p9L_2 . ' - ' . porcentaje($totalLaboratorio, $p9L_2); ?></td>
                                        <td><?php echo $p9L_3 . ' - ' . porcentaje($totalLaboratorio, $p9L_3); ?></td>
                                        <td><?php echo $p9L_4 . ' - ' . porcentaje($totalLaboratorio, $p9L_4); ?></td>
                                        <td><?php echo $p9L_5 . ' - ' . porcentaje($totalLaboratorio, $p9L_5); ?></td>
                                        <td><?php echo $totalLaboratorio . ' - ' . porcentaje($totalLaboratorio, $totalLaboratorio); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Radiología</td>
                                        <td><?php echo $p9R_1 . ' - ' . porcentaje($totalRadiologia, $p9R_1); ?></td>
                                        <td><?php echo $p9R_2 . ' - ' . porcentaje($totalRadiologia, $p9R_2); ?></td>
                                        <td><?php echo $p9R_3 . ' - ' . porcentaje($totalRadiologia, $p9R_3); ?></td>
                                        <td><?php echo $p9R_4 . ' - ' . porcentaje($totalRadiologia, $p9R_4); ?></td>
                                        <td><?php echo $p9R_5 . ' - ' . porcentaje($totalRadiologia, $p9R_5); ?></td>
                                        <td><?php echo $totalRadiologia . ' - ' . porcentaje($totalRadiologia, $totalRadiologia); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            <canvas id="p9carrera" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-warning">
                        <div class="card-body">
                            <canvas id="p9mencion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="callout callout-info">
                            <h5>SOCIEDAD CIENTÍFICA</h5>
                            <p>10. ¿Considera que la información, actividades y recursos proporcionados por la sociedad científica de la carrera han contribuido a su formación profesional de manera significativa?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered" style="text-align: center;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>MENCIONES</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Carrera</td>
                                        <td><?php echo $p10_1 . ' - ' . porcentaje($totalCarrera, $p10_1); ?></td>
                                        <td><?php echo $p10_2 . ' - ' . porcentaje($totalCarrera, $p10_2); ?></td>
                                        <td><?php echo $p10_3 . ' - ' . porcentaje($totalCarrera, $p10_3); ?></td>
                                        <td><?php echo $p10_4 . ' - ' . porcentaje($totalCarrera, $p10_4); ?></td>
                                        <td><?php echo $p10_5 . ' - ' . porcentaje($totalCarrera, $p10_5); ?></td>
                                        <td><?php echo $totalCarrera . ' - ' . porcentaje($totalCarrera, $totalCarrera); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bioimagenología</td>
                                        <td><?php echo $p10B_1 . ' - ' . porcentaje($totalBioimagenologia, $p10B_1); ?></td>
                                        <td><?php echo $p10B_2 . ' - ' . porcentaje($totalBioimagenologia, $p10B_2); ?></td>
                                        <td><?php echo $p10B_3 . ' - ' . porcentaje($totalBioimagenologia, $p10B_3); ?></td>
                                        <td><?php echo $p10B_4 . ' - ' . porcentaje($totalBioimagenologia, $p10B_4); ?></td>
                                        <td><?php echo $p10B_5 . ' - ' . porcentaje($totalBioimagenologia, $p10B_5); ?></td>
                                        <td><?php echo $totalBioimagenologia . ' - ' . porcentaje($totalBioimagenologia, $totalBioimagenologia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fisioterapia</td>
                                        <td><?php echo $p10F_1 . ' - ' . porcentaje($totalFisioterapia, $p10F_1); ?></td>
                                        <td><?php echo $p10F_2 . ' - ' . porcentaje($totalFisioterapia, $p10F_2); ?></td>
                                        <td><?php echo $p10F_3 . ' - ' . porcentaje($totalFisioterapia, $p10F_3); ?></td>
                                        <td><?php echo $p10F_4 . ' - ' . porcentaje($totalFisioterapia, $p10F_4); ?></td>
                                        <td><?php echo $p10F_5 . ' - ' . porcentaje($totalFisioterapia, $p10F_5); ?></td>
                                        <td><?php echo $totalFisioterapia . ' - ' . porcentaje($totalFisioterapia, $totalFisioterapia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Laboratorio Clínico</td>
                                        <td><?php echo $p10L_1 . ' - ' . porcentaje($totalLaboratorio, $p10L_1); ?></td>
                                        <td><?php echo $p10L_2 . ' - ' . porcentaje($totalLaboratorio, $p10L_2); ?></td>
                                        <td><?php echo $p10L_3 . ' - ' . porcentaje($totalLaboratorio, $p10L_3); ?></td>
                                        <td><?php echo $p10L_4 . ' - ' . porcentaje($totalLaboratorio, $p10L_4); ?></td>
                                        <td><?php echo $p10L_5 . ' - ' . porcentaje($totalLaboratorio, $p10L_5); ?></td>
                                        <td><?php echo $totalLaboratorio . ' - ' . porcentaje($totalLaboratorio, $totalLaboratorio); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Radiología</td>
                                        <td><?php echo $p10R_1 . ' - ' . porcentaje($totalRadiologia, $p10R_1); ?></td>
                                        <td><?php echo $p10R_2 . ' - ' . porcentaje($totalRadiologia, $p10R_2); ?></td>
                                        <td><?php echo $p10R_3 . ' - ' . porcentaje($totalRadiologia, $p10R_3); ?></td>
                                        <td><?php echo $p10R_4 . ' - ' . porcentaje($totalRadiologia, $p10R_4); ?></td>
                                        <td><?php echo $p10R_5 . ' - ' . porcentaje($totalRadiologia, $p10R_5); ?></td>
                                        <td><?php echo $totalRadiologia . ' - ' . porcentaje($totalRadiologia, $totalRadiologia); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            <canvas id="p10carrera" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-warning">
                        <div class="card-body">
                            <canvas id="p10mencion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="callout callout-info">
                            <h5>INTERNADO ROTATORIO</h5>
                            <p>11. ¿Considera que las actividades y experiencias vividas durante este período del Internado Rotatorio le han proporcionado conocimientos y habilidades relevantes para su futura práctica profesional?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered" style="text-align: center;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>MENCIONES</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Carrera</td>
                                        <td><?php echo $p11_1 . ' - ' . porcentaje($totalCarrera, $p11_1); ?></td>
                                        <td><?php echo $p11_2 . ' - ' . porcentaje($totalCarrera, $p11_2); ?></td>
                                        <td><?php echo $p11_3 . ' - ' . porcentaje($totalCarrera, $p11_3); ?></td>
                                        <td><?php echo $p11_4 . ' - ' . porcentaje($totalCarrera, $p11_4); ?></td>
                                        <td><?php echo $p11_5 . ' - ' . porcentaje($totalCarrera, $p11_5); ?></td>
                                        <td><?php echo $totalCarrera . ' - ' . porcentaje($totalCarrera, $totalCarrera); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bioimagenología</td>
                                        <td><?php echo $p11B_1 . ' - ' . porcentaje($totalBioimagenologia, $p11B_1); ?></td>
                                        <td><?php echo $p11B_2 . ' - ' . porcentaje($totalBioimagenologia, $p11B_2); ?></td>
                                        <td><?php echo $p11B_3 . ' - ' . porcentaje($totalBioimagenologia, $p11B_3); ?></td>
                                        <td><?php echo $p11B_4 . ' - ' . porcentaje($totalBioimagenologia, $p11B_4); ?></td>
                                        <td><?php echo $p11B_5 . ' - ' . porcentaje($totalBioimagenologia, $p11B_5); ?></td>
                                        <td><?php echo $totalBioimagenologia . ' - ' . porcentaje($totalBioimagenologia, $totalBioimagenologia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fisioterapia</td>
                                        <td><?php echo $p11F_1 . ' - ' . porcentaje($totalFisioterapia, $p11F_1); ?></td>
                                        <td><?php echo $p11F_2 . ' - ' . porcentaje($totalFisioterapia, $p11F_2); ?></td>
                                        <td><?php echo $p11F_3 . ' - ' . porcentaje($totalFisioterapia, $p11F_3); ?></td>
                                        <td><?php echo $p11F_4 . ' - ' . porcentaje($totalFisioterapia, $p11F_4); ?></td>
                                        <td><?php echo $p11F_5 . ' - ' . porcentaje($totalFisioterapia, $p11F_5); ?></td>
                                        <td><?php echo $totalFisioterapia . ' - ' . porcentaje($totalFisioterapia, $totalFisioterapia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Laboratorio Clínico</td>
                                        <td><?php echo $p11L_1 . ' - ' . porcentaje($totalLaboratorio, $p11L_1); ?></td>
                                        <td><?php echo $p11L_2 . ' - ' . porcentaje($totalLaboratorio, $p11L_2); ?></td>
                                        <td><?php echo $p11L_3 . ' - ' . porcentaje($totalLaboratorio, $p11L_3); ?></td>
                                        <td><?php echo $p11L_4 . ' - ' . porcentaje($totalLaboratorio, $p11L_4); ?></td>
                                        <td><?php echo $p11L_5 . ' - ' . porcentaje($totalLaboratorio, $p11L_5); ?></td>
                                        <td><?php echo $totalLaboratorio . ' - ' . porcentaje($totalLaboratorio, $totalLaboratorio); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Radiología</td>
                                        <td><?php echo $p11R_1 . ' - ' . porcentaje($totalRadiologia, $p11R_1); ?></td>
                                        <td><?php echo $p11R_2 . ' - ' . porcentaje($totalRadiologia, $p11R_2); ?></td>
                                        <td><?php echo $p11R_3 . ' - ' . porcentaje($totalRadiologia, $p11R_3); ?></td>
                                        <td><?php echo $p11R_4 . ' - ' . porcentaje($totalRadiologia, $p11R_4); ?></td>
                                        <td><?php echo $p11R_5 . ' - ' . porcentaje($totalRadiologia, $p11R_5); ?></td>
                                        <td><?php echo $totalRadiologia . ' - ' . porcentaje($totalRadiologia, $totalRadiologia); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            <canvas id="p11carrera" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-warning">
                        <div class="card-body">
                            <canvas id="p11mencion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="callout callout-info">
                            <h5>PERFIL PROFESIONAL</h5>
                            <p>12. ¿Considera que el perfil profesional de la Carrera se encuentra actualizado y en línea con las demandas y requerimientos del campo laboral actual?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered" style="text-align: center;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>MENCIONES</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Carrera</td>
                                        <td><?php echo $p12_1 . ' - ' . porcentaje($totalCarrera, $p12_1); ?></td>
                                        <td><?php echo $p12_2 . ' - ' . porcentaje($totalCarrera, $p12_2); ?></td>
                                        <td><?php echo $p12_3 . ' - ' . porcentaje($totalCarrera, $p12_3); ?></td>
                                        <td><?php echo $p12_4 . ' - ' . porcentaje($totalCarrera, $p12_4); ?></td>
                                        <td><?php echo $p12_5 . ' - ' . porcentaje($totalCarrera, $p12_5); ?></td>
                                        <td><?php echo $totalCarrera . ' - ' . porcentaje($totalCarrera, $totalCarrera); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bioimagenología</td>
                                        <td><?php echo $p12B_1 . ' - ' . porcentaje($totalBioimagenologia, $p12B_1); ?></td>
                                        <td><?php echo $p12B_2 . ' - ' . porcentaje($totalBioimagenologia, $p12B_2); ?></td>
                                        <td><?php echo $p12B_3 . ' - ' . porcentaje($totalBioimagenologia, $p12B_3); ?></td>
                                        <td><?php echo $p12B_4 . ' - ' . porcentaje($totalBioimagenologia, $p12B_4); ?></td>
                                        <td><?php echo $p12B_5 . ' - ' . porcentaje($totalBioimagenologia, $p12B_5); ?></td>
                                        <td><?php echo $totalBioimagenologia . ' - ' . porcentaje($totalBioimagenologia, $totalBioimagenologia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fisioterapia</td>
                                        <td><?php echo $p12F_1 . ' - ' . porcentaje($totalFisioterapia, $p12F_1); ?></td>
                                        <td><?php echo $p12F_2 . ' - ' . porcentaje($totalFisioterapia, $p12F_2); ?></td>
                                        <td><?php echo $p12F_3 . ' - ' . porcentaje($totalFisioterapia, $p12F_3); ?></td>
                                        <td><?php echo $p12F_4 . ' - ' . porcentaje($totalFisioterapia, $p12F_4); ?></td>
                                        <td><?php echo $p12F_5 . ' - ' . porcentaje($totalFisioterapia, $p12F_5); ?></td>
                                        <td><?php echo $totalFisioterapia . ' - ' . porcentaje($totalFisioterapia, $totalFisioterapia); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Laboratorio Clínico</td>
                                        <td><?php echo $p12L_1 . ' - ' . porcentaje($totalLaboratorio, $p12L_1); ?></td>
                                        <td><?php echo $p12L_2 . ' - ' . porcentaje($totalLaboratorio, $p12L_2); ?></td>
                                        <td><?php echo $p12L_3 . ' - ' . porcentaje($totalLaboratorio, $p12L_3); ?></td>
                                        <td><?php echo $p12L_4 . ' - ' . porcentaje($totalLaboratorio, $p12L_4); ?></td>
                                        <td><?php echo $p12L_5 . ' - ' . porcentaje($totalLaboratorio, $p12L_5); ?></td>
                                        <td><?php echo $totalLaboratorio . ' - ' . porcentaje($totalLaboratorio, $totalLaboratorio); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Radiología</td>
                                        <td><?php echo $p12R_1 . ' - ' . porcentaje($totalRadiologia, $p12R_1); ?></td>
                                        <td><?php echo $p12R_2 . ' - ' . porcentaje($totalRadiologia, $p12R_2); ?></td>
                                        <td><?php echo $p12R_3 . ' - ' . porcentaje($totalRadiologia, $p12R_3); ?></td>
                                        <td><?php echo $p12R_4 . ' - ' . porcentaje($totalRadiologia, $p12R_4); ?></td>
                                        <td><?php echo $p12R_5 . ' - ' . porcentaje($totalRadiologia, $p12R_5); ?></td>
                                        <td><?php echo $totalRadiologia . ' - ' . porcentaje($totalRadiologia, $totalRadiologia); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            <canvas id="p12carrera" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-warning">
                        <div class="card-body">
                            <canvas id="p12mencion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var ctx = document.getElementById('p1carrera').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($data['preparacion_academica']); ?>,
            datasets: [{
                label: 'Ejemplo de gráfica',
                data: <?php echo json_encode($data['p1C']); ?>,
                backgroundColor: ['#5C469C', '#A4D0A4', '#9D8221', '#F55050', '#9F8772'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    var ctx = document.getElementById('p1mencion').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['preparacion_academicaMencion']); ?>,
            datasets: [{
                    label: '1',
                    backgroundColor: '#5C469C',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($data['p1_1']); ?>
                },
                {
                    label: '2',
                    backgroundColor: '#A4D0A4',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p1_2']); ?>
                },
                {
                    label: '3',
                    backgroundColor: '#9D8221',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p1_3']); ?>
                },
                {
                    label: '4',
                    backgroundColor: '#F55050',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p1_4']); ?>
                },
                {
                    label: '5',
                    backgroundColor: '#9F8772',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p1_5']); ?>
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('p2carrera').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($data['plan_estudios']); ?>,
            datasets: [{
                label: 'Ejemplo de gráfica',
                data: <?php echo json_encode($data['p2C']); ?>,
                backgroundColor: ['#5C469C', '#A4D0A4', '#9D8221', '#F55050', '#9F8772'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    var ctx = document.getElementById('p2mencion').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['plan_estudiosMencion']); ?>,
            datasets: [{
                    label: '1',
                    backgroundColor: '#5C469C',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($data['p2_1']); ?>
                },
                {
                    label: '2',
                    backgroundColor: '#A4D0A4',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p2_2']); ?>
                },
                {
                    label: '3',
                    backgroundColor: '#9D8221',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p2_3']); ?>
                },
                {
                    label: '4',
                    backgroundColor: '#F55050',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p2_4']); ?>
                },
                {
                    label: '5',
                    backgroundColor: '#9F8772',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p2_5']); ?>
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('p3carrera').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($data['asignaturas']); ?>,
            datasets: [{
                label: 'Ejemplo de gráfica',
                data: <?php echo json_encode($data['p3C']); ?>,
                backgroundColor: ['#5C469C', '#A4D0A4', '#9D8221', '#F55050', '#9F8772'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    var ctx = document.getElementById('p3mencion').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['asignaturasMencion']); ?>,
            datasets: [{
                    label: '1',
                    backgroundColor: '#5C469C',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($data['p3_1']); ?>
                },
                {
                    label: '2',
                    backgroundColor: '#A4D0A4',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p3_2']); ?>
                },
                {
                    label: '3',
                    backgroundColor: '#9D8221',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p3_3']); ?>
                },
                {
                    label: '4',
                    backgroundColor: '#F55050',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p3_4']); ?>
                },
                {
                    label: '5',
                    backgroundColor: '#9F8772',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p3_5']); ?>
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('p4carrera').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($data['equipamento']); ?>,
            datasets: [{
                label: 'Ejemplo de gráfica',
                data: <?php echo json_encode($data['p4C']); ?>,
                backgroundColor: ['#5C469C', '#A4D0A4', '#9D8221', '#F55050', '#9F8772'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    var ctx = document.getElementById('p4mencion').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['equipamentoMencion']); ?>,
            datasets: [{
                    label: '1',
                    backgroundColor: '#5C469C',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($data['p4_1']); ?>
                },
                {
                    label: '2',
                    backgroundColor: '#A4D0A4',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p4_2']); ?>
                },
                {
                    label: '3',
                    backgroundColor: '#9D8221',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p4_3']); ?>
                },
                {
                    label: '4',
                    backgroundColor: '#F55050',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p4_4']); ?>
                },
                {
                    label: '5',
                    backgroundColor: '#9F8772',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p4_5']); ?>
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('p5carrera').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($data['infraestructura']); ?>,
            datasets: [{
                label: 'Ejemplo de gráfica',
                data: <?php echo json_encode($data['p5C']); ?>,
                backgroundColor: ['#5C469C', '#A4D0A4', '#9D8221', '#F55050', '#9F8772'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    var ctx = document.getElementById('p5mencion').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['infraestructuraMencion']); ?>,
            datasets: [{
                    label: '1',
                    backgroundColor: '#5C469C',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($data['p5_1']); ?>
                },
                {
                    label: '2',
                    backgroundColor: '#A4D0A4',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p5_2']); ?>
                },
                {
                    label: '3',
                    backgroundColor: '#9D8221',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p5_3']); ?>
                },
                {
                    label: '4',
                    backgroundColor: '#F55050',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p5_4']); ?>
                },
                {
                    label: '5',
                    backgroundColor: '#9F8772',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p5_5']); ?>
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('p6carrera').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($data['biblioteca']); ?>,
            datasets: [{
                label: 'Ejemplo de gráfica',
                data: <?php echo json_encode($data['p6C']); ?>,
                backgroundColor: ['#5C469C', '#A4D0A4', '#9D8221', '#F55050', '#9F8772'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    var ctx = document.getElementById('p6mencion').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['bibliotecaMencion']); ?>,
            datasets: [{
                    label: '1',
                    backgroundColor: '#5C469C',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($data['p6_1']); ?>
                },
                {
                    label: '2',
                    backgroundColor: '#A4D0A4',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p6_2']); ?>
                },
                {
                    label: '3',
                    backgroundColor: '#9D8221',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p6_3']); ?>
                },
                {
                    label: '4',
                    backgroundColor: '#F55050',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p6_4']); ?>
                },
                {
                    label: '5',
                    backgroundColor: '#9F8772',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p6_5']); ?>
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('p7carrera').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($data['tutoria_docente']); ?>,
            datasets: [{
                label: 'Ejemplo de gráfica',
                data: <?php echo json_encode($data['p7C']); ?>,
                backgroundColor: ['#5C469C', '#A4D0A4', '#9D8221', '#F55050', '#9F8772'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    var ctx = document.getElementById('p7mencion').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['tutoria_docenteMencion']); ?>,
            datasets: [{
                    label: '1',
                    backgroundColor: '#5C469C',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($data['p7_1']); ?>
                },
                {
                    label: '2',
                    backgroundColor: '#A4D0A4',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p7_2']); ?>
                },
                {
                    label: '3',
                    backgroundColor: '#9D8221',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p7_3']); ?>
                },
                {
                    label: '4',
                    backgroundColor: '#F55050',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p7_4']); ?>
                },
                {
                    label: '5',
                    backgroundColor: '#9F8772',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p7_5']); ?>
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('p8carrera').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($data['actividades_academicas']); ?>,
            datasets: [{
                label: 'Ejemplo de gráfica',
                data: <?php echo json_encode($data['p8C']); ?>,
                backgroundColor: ['#5C469C', '#A4D0A4', '#9D8221', '#F55050', '#9F8772'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    var ctx = document.getElementById('p8mencion').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['actividades_academicasMencion']); ?>,
            datasets: [{
                    label: '1',
                    backgroundColor: '#5C469C',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($data['p8_1']); ?>
                },
                {
                    label: '2',
                    backgroundColor: '#A4D0A4',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p8_2']); ?>
                },
                {
                    label: '3',
                    backgroundColor: '#9D8221',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p8_3']); ?>
                },
                {
                    label: '4',
                    backgroundColor: '#F55050',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p8_4']); ?>
                },
                {
                    label: '5',
                    backgroundColor: '#9F8772',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p8_5']); ?>
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('p9carrera').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($data['actividades_extracurriculares']); ?>,
            datasets: [{
                label: 'Ejemplo de gráfica',
                data: <?php echo json_encode($data['p9C']); ?>,
                backgroundColor: ['#5C469C', '#A4D0A4', '#9D8221', '#F55050', '#9F8772'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    var ctx = document.getElementById('p9mencion').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['actividades_extracurricularesMencion']); ?>,
            datasets: [{
                    label: '1',
                    backgroundColor: '#5C469C',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($data['p9_1']); ?>
                },
                {
                    label: '2',
                    backgroundColor: '#A4D0A4',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p9_2']); ?>
                },
                {
                    label: '3',
                    backgroundColor: '#9D8221',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p9_3']); ?>
                },
                {
                    label: '4',
                    backgroundColor: '#F55050',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p9_4']); ?>
                },
                {
                    label: '5',
                    backgroundColor: '#9F8772',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p9_5']); ?>
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('p10carrera').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($data['sociedad_cientifica']); ?>,
            datasets: [{
                label: 'Ejemplo de gráfica',
                data: <?php echo json_encode($data['p10C']); ?>,
                backgroundColor: ['#5C469C', '#A4D0A4', '#9D8221', '#F55050', '#9F8772'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    var ctx = document.getElementById('p10mencion').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['sociedad_cientificaMencion']); ?>,
            datasets: [{
                    label: '1',
                    backgroundColor: '#5C469C',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($data['p10_1']); ?>
                },
                {
                    label: '2',
                    backgroundColor: '#A4D0A4',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p10_2']); ?>
                },
                {
                    label: '3',
                    backgroundColor: '#9D8221',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p10_3']); ?>
                },
                {
                    label: '4',
                    backgroundColor: '#F55050',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p10_4']); ?>
                },
                {
                    label: '5',
                    backgroundColor: '#9F8772',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p10_5']); ?>
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('p11carrera').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($data['internado_rotatorio']); ?>,
            datasets: [{
                label: 'Ejemplo de gráfica',
                data: <?php echo json_encode($data['p11C']); ?>,
                backgroundColor: ['#5C469C', '#A4D0A4', '#9D8221', '#F55050', '#9F8772'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    var ctx = document.getElementById('p11mencion').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['internado_rotatorioMencion']); ?>,
            datasets: [{
                    label: '1',
                    backgroundColor: '#5C469C',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($data['p11_1']); ?>
                },
                {
                    label: '2',
                    backgroundColor: '#A4D0A4',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p11_2']); ?>
                },
                {
                    label: '3',
                    backgroundColor: '#9D8221',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p11_3']); ?>
                },
                {
                    label: '4',
                    backgroundColor: '#F55050',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p11_4']); ?>
                },
                {
                    label: '5',
                    backgroundColor: '#9F8772',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p11_5']); ?>
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('p12carrera').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($data['perfil_profesional']); ?>,
            datasets: [{
                label: 'Ejemplo de gráfica',
                data: <?php echo json_encode($data['p12C']); ?>,
                backgroundColor: ['#5C469C', '#A4D0A4', '#9D8221', '#F55050', '#9F8772'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    var ctx = document.getElementById('p12mencion').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['perfil_profesionalMencion']); ?>,
            datasets: [{
                    label: '1',
                    backgroundColor: '#5C469C',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($data['p12_1']); ?>
                },
                {
                    label: '2',
                    backgroundColor: '#A4D0A4',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p12_2']); ?>
                },
                {
                    label: '3',
                    backgroundColor: '#9D8221',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p12_3']); ?>
                },
                {
                    label: '4',
                    backgroundColor: '#F55050',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p12_4']); ?>
                },
                {
                    label: '5',
                    backgroundColor: '#9F8772',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['p12_5']); ?>
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>