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
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Titulados por Género CARRERA</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="generoCarrera" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Titulados por Género MENCIÓN</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="generoMencion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Titulados por Residencia CARRERA</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="residenciaCarrera" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Titulados por Residencia MENCIÓN</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="residenciaMencion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Titulados por años de permanencia CARRERA</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="permanenciaCarrera" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Titulados por años de permanencia MENCIÓN</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="permanenciaMencion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Titulados por edad CARRERA</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="edadCarrera" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Titulados por edad MENCIÓN</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="edadMencion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 card-header" style="background-color: midnightblue;">
                <center>
                    <h4 style="color: white;">Estadísticas por Género</h4>
                </center>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered">
                            <thead>
                                <tr style="background-color: #2C3333; color: white;">
                                    <th></th>
                                    <th>
                                        <center>CARRERA</center>
                                    </th>
                                    <th>
                                        <center>BIOIMAGENOLOGIA</center>
                                    </th>
                                    <th>
                                        <center>FISIOTERPIA Y KINESIOLOGÍA</center>
                                    </th>
                                    <th>
                                        <center>LABORATORIO CLÍNICO</center>
                                    </th>
                                    <th>
                                        <center>RADIOLOGÍA</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="background-color: #BBD6B8;">
                                    <td>TOTAL</td>
                                    <td>
                                        <center><?php echo $tgeneroC; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                    <td>
                                        <center><?php echo $tgeneroB; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                    <td>
                                        <center><?php echo $tgeneroF; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                    <td>
                                        <center><?php echo $tgeneroL; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                    <td>
                                        <center><?php echo $tgeneroR; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>HOMBRES</td>
                                    <td>
                                        <center>
                                            <?php echo $tgeneroCM; ?>
                                            <span class="badge bg-primary" style="width: auto;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($tgeneroCM * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $tgeneroBM; ?>
                                            <span class="badge bg-primary" style="width: auto;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($tgeneroBM * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $tgeneroFM; ?>
                                            <span class="badge bg-primary" style="width: auto;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($tgeneroFM * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $tgeneroLM; ?>
                                            <span class="badge bg-primary" style="width: auto;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($tgeneroLM * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $tgeneroRM; ?>
                                            <span class="badge bg-primary" style="width: auto;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($tgeneroRM * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>MUJERES</td>
                                    <td>
                                        <center>
                                            <?php echo $tgeneroCF; ?>
                                            <span class="badge bg-danger" style="width: auto;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($tgeneroCF * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $tgeneroBF; ?>
                                            <span class="badge bg-danger" style="width: auto;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($tgeneroBF * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $tgeneroFF; ?>
                                            <span class="badge bg-danger" style="width: auto;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($tgeneroFF * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $tgeneroLF; ?>
                                            <span class="badge bg-danger" style="width: auto;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($tgeneroLF * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $tgeneroRF; ?>
                                            <span class="badge bg-danger" style="width: auto;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($tgeneroRF * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 card-header" style="background-color: midnightblue;">
                <center>
                    <h4 style="color: white;">Estadísticas por Residencia</h4>
                </center>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered">
                            <thead>
                                <tr style="background-color: #2C3333; color: white;">
                                    <th></th>
                                    <th>
                                        <center>CARRERA</center>
                                    </th>
                                    <th>
                                        <center>BIOIMAGENOLOGIA</center>
                                    </th>
                                    <th>
                                        <center>FISIOTERPIA Y KINESIOLOGÍA</center>
                                    </th>
                                    <th>
                                        <center>LABORATORIO CLÍNICO</center>
                                    </th>
                                    <th>
                                        <center>RADIOLOGÍA</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="background-color: #BBD6B8;">
                                    <td>TOTAL</td>
                                    <td>
                                        <center><?php echo $tgeneroC; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                    <td>
                                        <center><?php echo $tgeneroB; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                    <td>
                                        <center><?php echo $tgeneroF; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                    <td>
                                        <center><?php echo $tgeneroL; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                    <td>
                                        <center><?php echo $tgeneroR; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>LA PAZ</td>
                                    <td>
                                        <center>
                                            <?php echo $tresidenciaCL ?>
                                            <span class="badge" style="width: auto; background-color: #114E60; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($tresidenciaCL * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $totallapazb ?>
                                            <span class="badge" style="width: auto; background-color: #114E60; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($totallapazb * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $totallapazf; ?>
                                            <span class="badge" style="width: auto; background-color: #114E60; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($totallapazf * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $totallapazl; ?>
                                            <span class="badge" style="width: auto; background-color: #114E60; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($totallapazl * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $totallapazr; ?>
                                            <span class="badge" style="width: auto; background-color: #114E60; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($totallapazr * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>EL ALTO</td>
                                    <td>
                                        <center>
                                            <?php echo $tresidenciaCEA ?>
                                            <span class="badge" style="width: auto; background-color: #A83C54; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($tresidenciaCEA * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $totalelaltob ?>
                                            <span class="badge" style="width: auto; background-color: #A83C54; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($totalelaltob * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $totalelaltof; ?>
                                            <span class="badge" style="width: auto; background-color: #A83C54; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($totalelaltof * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $totalelaltol; ?>
                                            <span class="badge" style="width: auto; background-color: #A83C54; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($totalelaltor * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $totalelaltor; ?>
                                            <span class="badge" style="width: auto; background-color: #A83C54; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($totalelaltor * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>NACIONAL</td>
                                    <td>
                                        <center>
                                            <?php echo $tresidenciaCN ?>
                                            <span class="badge" style="width: auto; background-color: #9D8221; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($tresidenciaCN * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $totalnacionalb ?>
                                            <span class="badge" style="width: auto; background-color: #9D8221; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($totalnacionalb * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $totalnacionalf; ?>
                                            <span class="badge" style="width: auto; background-color: #9D8221; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($totalnacionalf * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $totalnacionall; ?>
                                            <span class="badge" style="width: auto; background-color: #9D8221; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($totalnacionall * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $totalnacionalr; ?>
                                            <span class="badge" style="width: auto; background-color: #9D8221; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($totalnacionalr * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>INTERNACIONAL</td>
                                    <td>
                                        <center>
                                            <?php echo $tresidenciaCI ?>
                                            <span class="badge" style="width: auto; background-color: #1F441E; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($tresidenciaCI * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $totalinternacionalesb ?>
                                            <span class="badge" style="width: auto; background-color: #1F441E; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($totalinternacionalesb * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $totalinternacionalesf; ?>
                                            <span class="badge" style="width: auto; background-color: #1F441E; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($totalinternacionalesf * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $totalinternacionalesl; ?>
                                            <span class="badge" style="width: auto; background-color: #1F441E; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($totalinternacionalesl * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $totalinternacionalesr; ?>
                                            <span class="badge" style="width: auto; background-color: #1F441E; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($totalinternacionalesr * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 card-header" style="background-color: midnightblue;">
                <center>
                    <h4 style="color: white;">Estadísticas por Años de Permanencia</h4>
                </center>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered">
                            <thead>
                                <tr style="background-color: #2C3333; color: white;">
                                    <th></th>
                                    <th>
                                        <center>CARRERA</center>
                                    </th>
                                    <th>
                                        <center>BIOIMAGENOLOGIA</center>
                                    </th>
                                    <th>
                                        <center>FISIOTERPIA Y KINESIOLOGÍA</center>
                                    </th>
                                    <th>
                                        <center>LABORATORIO CLÍNICO</center>
                                    </th>
                                    <th>
                                        <center>RADIOLOGÍA</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="background-color: #BBD6B8;">
                                    <td>TOTAL</td>
                                    <td>
                                        <center><?php echo $tgeneroC; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                    <td>
                                        <center><?php echo $tgeneroB; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                    <td>
                                        <center><?php echo $tgeneroF; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                    <td>
                                        <center><?php echo $tgeneroL; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                    <td>
                                        <center><?php echo $tgeneroR; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>3 años</td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia3 ?>
                                            <span class="badge" style="width: auto; background-color: #114E60; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia3 * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia3b ?>
                                            <span class="badge" style="width: auto; background-color: #114E60; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia3b * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia3f ?>
                                            <span class="badge" style="width: auto; background-color: #114E60; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia3f * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia3l ?>
                                            <span class="badge" style="width: auto; background-color: #114E60; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia3l * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia3r ?>
                                            <span class="badge" style="width: auto; background-color: #114E60; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia3r * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>4 años</td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia4 ?>
                                            <span class="badge" style="width: auto; background-color: #A83C54; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia4 * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia4b ?>
                                            <span class="badge" style="width: auto; background-color: #A83C54; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia4b * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia4f ?>
                                            <span class="badge" style="width: auto; background-color: #A83C54; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia4f * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia4l ?>
                                            <span class="badge" style="width: auto; background-color: #A83C54; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia4l * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia4r ?>
                                            <span class="badge" style="width: auto; background-color: #A83C54; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia4r * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>5 años</td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia5 ?>
                                            <span class="badge" style="width: auto; background-color: #9D8221; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia5 * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia5b ?>
                                            <span class="badge" style="width: auto; background-color: #9D8221; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia5b * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia5f ?>
                                            <span class="badge" style="width: auto; background-color: #9D8221; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia5f * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia5l ?>
                                            <span class="badge" style="width: auto; background-color: #9D8221; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia5l * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia5r ?>
                                            <span class="badge" style="width: auto; background-color: #9D8221; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia5r * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>6 años</td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia6 ?>
                                            <span class="badge" style="width: auto; background-color: #1F441E; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia6 * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia6b ?>
                                            <span class="badge" style="width: auto; background-color: #1F441E; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia6b * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia6f ?>
                                            <span class="badge" style="width: auto; background-color: #1F441E; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia6f * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia6l ?>
                                            <span class="badge" style="width: auto; background-color: #1F441E; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia6l * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia6r ?>
                                            <span class="badge" style="width: auto; background-color: #1F441E; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia6r * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>7 años</td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia7 ?>
                                            <span class="badge" style="width: auto; background-color: #530C0C; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia7 * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia7b ?>
                                            <span class="badge" style="width: auto; background-color: #530C0C; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia7b * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia7f ?>
                                            <span class="badge" style="width: auto; background-color: #530C0C; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia7f * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia7l ?>
                                            <span class="badge" style="width: auto; background-color: #530C0C; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia7l * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia7r ?>
                                            <span class="badge" style="width: auto; background-color: #530C0C; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia7r * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>8 años</td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia8 ?>
                                            <span class="badge" style="width: auto; background-color: #5639A6; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia8 * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia8b ?>
                                            <span class="badge" style="width: auto; background-color: #5639A6; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia8b * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia8f ?>
                                            <span class="badge" style="width: auto; background-color: #5639A6; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia8f * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia8l ?>
                                            <span class="badge" style="width: auto; background-color: #5639A6; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia8l * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia8r ?>
                                            <span class="badge" style="width: auto; background-color: #5639A6; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia8r * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>9 años</td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia9 ?>
                                            <span class="badge" style="width: auto; background-color: #61481C; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia9 * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia9b ?>
                                            <span class="badge" style="width: auto; background-color: #61481C; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia9b * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia9f ?>
                                            <span class="badge" style="width: auto; background-color: #61481C; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia9f * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia9l ?>
                                            <span class="badge" style="width: auto; background-color: #61481C; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia9l * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia9r ?>
                                            <span class="badge" style="width: auto; background-color: #61481C; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia9r * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>>= 10 años</td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia10 ?>
                                            <span class="badge" style="width: auto; background-color: #475762; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia10 * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia10b ?>
                                            <span class="badge" style="width: auto; background-color: #475762; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia10b * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia10f ?>
                                            <span class="badge" style="width: auto; background-color: #475762; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia10f * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia10l ?>
                                            <span class="badge" style="width: auto; background-color: #475762; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia10l * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $permanencia10r ?>
                                            <span class="badge" style="width: auto; background-color: #475762; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($permanencia10r * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 card-header" style="background-color: midnightblue;">
                <center>
                    <h4 style="color: white;">Estadísticas por Edad</h4>
                </center>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered">
                            <thead>
                                <tr style="background-color: #2C3333; color: white;">
                                    <th></th>
                                    <th>
                                        <center>CARRERA</center>
                                    </th>
                                    <th>
                                        <center>BIOIMAGENOLOGIA</center>
                                    </th>
                                    <th>
                                        <center>FISIOTERPIA Y KINESIOLOGÍA</center>
                                    </th>
                                    <th>
                                        <center>LABORATORIO CLÍNICO</center>
                                    </th>
                                    <th>
                                        <center>RADIOLOGÍA</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="background-color: #BBD6B8;">
                                    <td>TOTAL</td>
                                    <td>
                                        <center><?php echo $tgeneroC; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                    <td>
                                        <center><?php echo $tgeneroB; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                    <td>
                                        <center><?php echo $tgeneroF; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                    <td>
                                        <center><?php echo $tgeneroL; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                    <td>
                                        <center><?php echo $tgeneroR; ?> <span class="badge bg-success" style="width: auto;">100%</span></center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>20 a 22 años</td>
                                    <td>
                                        <center>
                                            <?php echo $p20a22 ?>
                                            <span class="badge" style="width: auto; background-color: #114E60; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p20a22 * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p20a22b ?>
                                            <span class="badge" style="width: auto; background-color: #114E60; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p20a22b * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p20a22f ?>
                                            <span class="badge" style="width: auto; background-color: #114E60; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p20a22f * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p20a22l ?>
                                            <span class="badge" style="width: auto; background-color: #114E60; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p20a22l * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p20a22r ?>
                                            <span class="badge" style="width: auto; background-color: #114E60; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p20a22r * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>23 a 26 años</td>
                                    <td>
                                        <center>
                                            <?php echo $p23a26 ?>
                                            <span class="badge" style="width: auto; background-color: #A83C54; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p23a26 * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p23a26b ?>
                                            <span class="badge" style="width: auto; background-color: #A83C54; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p23a26b * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p23a26f ?>
                                            <span class="badge" style="width: auto; background-color: #A83C54; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p23a26f * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p23a26l ?>
                                            <span class="badge" style="width: auto; background-color: #A83C54; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p23a26l * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p23a26r ?>
                                            <span class="badge" style="width: auto; background-color: #A83C54; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p23a26r * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>27 a 32 años</td>
                                    <td>
                                        <center>
                                            <?php echo $p27a32 ?>
                                            <span class="badge" style="width: auto; background-color: #9D8221; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p27a32 * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p27a32b ?>
                                            <span class="badge" style="width: auto; background-color: #9D8221; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p27a32b * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p27a32f ?>
                                            <span class="badge" style="width: auto; background-color: #9D8221; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p27a32f * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p27a32l ?>
                                            <span class="badge" style="width: auto; background-color: #9D8221; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p27a32l * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p27a32r ?>
                                            <span class="badge" style="width: auto; background-color: #9D8221; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p27a32r * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>33 a 39 años</td>
                                    <td>
                                        <center>
                                            <?php echo $p33a39 ?>
                                            <span class="badge" style="width: auto; background-color: #1F441E; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p33a39 * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p27a32b ?>
                                            <span class="badge" style="width: auto; background-color: #1F441E; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p33a39b * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p33a39f ?>
                                            <span class="badge" style="width: auto; background-color: #1F441E; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p33a39f * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p33a39l ?>
                                            <span class="badge" style="width: auto; background-color: #1F441E; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p33a39l * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p33a39r ?>
                                            <span class="badge" style="width: auto; background-color: #1F441E; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p33a39r * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>40 a 46 años</td>
                                    <td>
                                        <center>
                                            <?php echo $p40a46 ?>
                                            <span class="badge" style="width: auto; background-color: #530C0C; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p40a46 * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p40a46b ?>
                                            <span class="badge" style="width: auto; background-color: #530C0C; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p40a46b * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p40a46f ?>
                                            <span class="badge" style="width: auto; background-color: #530C0C; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p40a46f * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p40a46l ?>
                                            <span class="badge" style="width: auto; background-color: #530C0C; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p40a46l * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p40a46r ?>
                                            <span class="badge" style="width: auto; background-color: #530C0C; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p40a46r * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>47 a 55 años</td>
                                    <td>
                                        <center>
                                            <?php echo $p47a55 ?>
                                            <span class="badge" style="width: auto; background-color: #5639A6; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p47a55 * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p47a55b ?>
                                            <span class="badge" style="width: auto; background-color: #5639A6; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p47a55b * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p40a46f ?>
                                            <span class="badge" style="width: auto; background-color: #5639A6; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p40a46f * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p40a46l ?>
                                            <span class="badge" style="width: auto; background-color: #5639A6; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p40a46l * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $p40a46r ?>
                                            <span class="badge" style="width: auto; background-color: #5639A6; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($p40a46r * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #BBD6B8;">
                                    <td>>55 años</td>
                                    <td>
                                        <center>
                                            <?php echo $pmaya55 ?>
                                            <span class="badge" style="width: auto; background-color: #61481C; color: white;">
                                                <?php
                                                if ($tgeneroC == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($pmaya55 * 100) / $tgeneroC), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $pmaya55b ?>
                                            <span class="badge" style="width: auto; background-color: #61481C; color: white;">
                                                <?php
                                                if ($tgeneroB == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($pmaya55b * 100) / $tgeneroB), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $pmaya55f ?>
                                            <span class="badge" style="width: auto; background-color: #61481C; color: white;">
                                                <?php
                                                if ($tgeneroF == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($pmaya55f * 100) / $tgeneroF), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $pmaya55l ?>
                                            <span class="badge" style="width: auto; background-color: #61481C; color: white;">
                                                <?php
                                                if ($tgeneroL == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($pmaya55l * 100) / $tgeneroL), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $pmaya55r ?>
                                            <span class="badge" style="width: auto; background-color: #61481C; color: white;">
                                                <?php
                                                if ($tgeneroR == 0) {
                                                    echo "0%";
                                                } else {
                                                    echo number_format((($pmaya55r * 100) / $tgeneroR), 0) . '%';
                                                }
                                                ?>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var ctx = document.getElementById('generoCarrera').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($data['generoCarrera']); ?>,
            datasets: [{
                label: 'Ejemplo de gráfica',
                data: <?php echo json_encode($data['cantgeneroCarrera']); ?>,
                backgroundColor: ['#216583', '#F76262'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    var ctx = document.getElementById('generoMencion').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['generoMencion']); ?>,
            datasets: [{
                    label: 'Masculino',
                    backgroundColor: '#216583',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($data['cantGeneroMasculino']); ?>
                },
                {
                    label: 'Femenino',
                    backgroundColor: '#F76262',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['cantGeneroFemenino']); ?>
                },
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

    var ctx = document.getElementById('residenciaCarrera').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($data['residenciaCarrera']); ?>,
            datasets: [{
                label: 'Ejemplo de gráfica',
                data: <?php echo json_encode($data['cantresidenciaCarrera']); ?>,
                backgroundColor: ['#5C469C', '#CE5959', '#F97B22', '#7AA874'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    var ctx = document.getElementById('residenciaMencion').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['residenciaMencion']); ?>,
            datasets: [{
                    label: 'La paz',
                    backgroundColor: '#114E60',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($data['cantlapazMencion']); ?>
                },
                {
                    label: 'El Alto',
                    backgroundColor: '#A83C54',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['cantelaltoMencion']); ?>
                },
                {
                    label: 'Nacionales',
                    backgroundColor: '#9D8221',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['cantnacionalesMencion']); ?>
                },
                {
                    label: 'Internacionales',
                    backgroundColor: '#1F441E',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['cantinternacionalesMencion']); ?>
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

    var ctx = document.getElementById('permanenciaCarrera').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($data['permanenciaCarrera']); ?>,
            datasets: [{
                label: 'Ejemplo de gráfica',
                data: <?php echo json_encode($data['cantpermanenciaCarrera']); ?>,
                backgroundColor: ['#114E60', '#A83C54', '#9D8221', '#1F441E', '#530C0C', '#5639A6', '#61481C', '#475762'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    var ctx = document.getElementById('permanenciaMencion').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['generoMencion']); ?>,
            datasets: [{
                    label: '3',
                    backgroundColor: '#114E60',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($data['permanencia3']); ?>
                },
                {
                    label: '4',
                    backgroundColor: '#A83C54',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['permanencia4']); ?>
                },
                {
                    label: '5',
                    backgroundColor: '#9D8221',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['permanencia5']); ?>
                },
                {
                    label: '6',
                    backgroundColor: '#1F441E',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['permanencia6']); ?>
                },
                {
                    label: '7',
                    backgroundColor: '#530C0C',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['permanencia7']); ?>
                },
                {
                    label: '8',
                    backgroundColor: '#5639A6',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['permanencia8']); ?>
                },
                {
                    label: '9',
                    backgroundColor: '#61481C',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['permanencia9']); ?>
                },
                {
                    label: '>=10',
                    backgroundColor: '#475762',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['permanencia10']); ?>
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

    var ctx = document.getElementById('edadCarrera').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($data['edadCarrera']); ?>,
            datasets: [{
                label: 'Ejemplo de gráfica',
                data: <?php echo json_encode($data['cantedadCarrera']); ?>,
                backgroundColor: ['#114E60', '#A83C54', '#9D8221', '#1F441E', '#530C0C', '#5639A6', '#61481C'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    var ctx = document.getElementById('edadMencion').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['edadMencion']); ?>,
            datasets: [{
                    label: '20 a 22',
                    backgroundColor: '#114E60',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($data['edad1']); ?>
                },
                {
                    label: '23 a 26',
                    backgroundColor: '#A83C54',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['edad2']); ?>
                },
                {
                    label: '27 a 32',
                    backgroundColor: '#9D8221',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['edad3']); ?>
                },
                {
                    label: '33 a 39',
                    backgroundColor: '#1F441E',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['edad4']); ?>
                },
                {
                    label: '40 a 46',
                    backgroundColor: '#530C0C',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['edad5']); ?>
                },
                {
                    label: '47 a 55',
                    backgroundColor: '#5639A6',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['edad6']); ?>
                },
                {
                    label: '>55',
                    backgroundColor: '#61481C',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($data['edad7']); ?>
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