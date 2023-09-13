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
                <div class="card-body">
                    <div>
                        <p>
                            <a href="<?php echo base_url(); ?>/CProfesional/nuevo" class="btn btn-success"><i class='fas fa-user-plus'></i> Agregar</a>
                            <!-- <a href="<?php echo base_url(); ?>/CProfesional/nuevosExcel" class="btn btn-warning"><i class='fas fa-user-plus'></i> Agregar por Excel</a> -->
                            <a href="<?php echo base_url(); ?>/CProfesional/eliminados" class="btn btn-secondary"><i class='fas fa-user-alt-slash'></i> Archivados</a>
                        </p>
                    </div>
                    <table id="DataTableUsuario" class="table table-bordered table-striped ">
                        <thead>
                            <tr class="bg-primary">
                                <th></th>
                                <th>Nombre Completo</th>
                                <th>Nro Carnet</th>
                                <th>Domicilio</th>
                                <th>Ciudad</th>
                                <th>Email</th>
                                <th>Celular</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $dato["nombres"] . " " . $dato["ap_paterno"] . " " . $dato["ap_materno"]; ?></td>
                                    <td><?php echo $dato["cedula"]; ?></td>
                                    <td><?php echo $dato["domicilio"]; ?></td>
                                    <td><?php echo $dato["ciudad"]; ?></td>
                                    <td><?php echo $dato["email"]; ?></td>
                                    <td><?php echo $dato['celular']; ?></td>
                                    <td>
                                        <center>
                                            <a href="<?php echo base_url() . '/CProfesional/detalleProfesional/' . $dato['id_profesional']; ?>" class="btn btn-secondary btn-block"><i class="fas fa-list"></i></a>
                                        </center>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>