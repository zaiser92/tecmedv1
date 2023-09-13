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
                            <a href="<?php echo base_url(); ?>/CProfesional" class="btn btn-primary">Regresar</a>
                        </p>
                    </div>
                    <table id="DataTableUsuario" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-primary">
                            <th></th>
                                <th>Nombre Completo</th>
                                <th>Nro Carnet</th>
                                <th>Domicilio</th>
                                <th>Ciudad</th>
                                <th>Email</th>
                                <th>Celular</th>
                                <th width="1%">OPCIONES</th>
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
                                        <div class="btn-group">
                                            <a href="<?php echo base_url() . '/CProfesional/reingresar/' . $dato['id_profesional']; ?>" class="btn btn-app bg-success"><i class="fas fa-sync-alt"></i>Habilitar</a>
                                            <form class="formulario-eliminar" method="POST" action="<?php echo base_url() . '/CProfesional/eliminar_definivamente/' . $dato['id_profesional']; ?>" autocomplete="off">
                                                <button type="submit" class="btn btn-app bg-danger"><i class="fas fa-trash-alt"></i>Eliminar</button>
                                            </form>
                                        </div>
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