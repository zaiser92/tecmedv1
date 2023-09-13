<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid"></div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header" style="background-color: midnightblue;">
                    <h4 style="color: white;"><?php echo $titulo; ?></h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div>
                        <p>
                            <a href="<?php echo base_url() . '/CReportes/excelTitulacion/' . $mencion . '/' . $activo . '/' . $titulacion; ?>" class="btn btn-success"><i class='fas fa-download'></i> Descargar EXCEL</a>
                        </p>
                    </div>
                    <table id="DataTableUsuario" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-primary">
                                <th></th>
                                <th width="1%">Imagen</th>
                                <th>Nombre Completo</th>
                                <th>Nro Carnet</th>
                                <th width="1%">Ingreso</th>
                                <th width="1%">Egreso</th>
                                <th width="1%">Titulación</th>
                                <th>Celular</th>
                                <th>Email</th>
                                <th>Ciudad</th>
                                <th>Domicilio</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Edad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <td></td>
                                    <td><?php
                                        if ($dato["img_profesional"] == "") {
                                        ?>
                                            <center><img src="<?php echo base_url(); ?>/assets/dist/img/usuario.jpg" width="100%"></center>

                                        <?php
                                        } else {
                                        ?>
                                            <center><img src="<?php echo base_url(); ?>/assets/dist/img/usuario/<?php echo $dato["img_profesional"]; ?>" width="100" height="100"></center>

                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $dato["nombres"] . " " . $dato["ap_paterno"] . " " . $dato["ap_materno"]; ?></td>
                                    <td><?php echo $dato["cedula"]; ?></td>
                                    <td><?php echo $dato["ingreso"]; ?></td>
                                    <td><?php echo $dato["egreso"]; ?></td>
                                    <td><?php echo $dato["titulacion"]; ?></td>
                                    <td><?php echo $dato['celular']; ?></td>
                                    <td><?php echo $dato['email']; ?></td>
                                    <td><?php echo $dato["ciudad"]; ?></td>
                                    <td><?php echo $dato['domicilio']; ?></td>
                                    <td><?php echo $dato['fecha_nacimiento']; ?></td>
                                    <td><?php
                                        $fecha_nacimiento = $dato['fecha_nacimiento'];
                                        $fecha_actual = new DateTime();
                                        $fecha_nacimiento = new DateTime($fecha_nacimiento);
                                        $edad = $fecha_actual->diff($fecha_nacimiento);
                                        echo $edad->y; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>