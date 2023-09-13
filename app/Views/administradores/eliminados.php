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
                            <a href="<?php echo base_url(); ?>/CAdministrador" class="btn btn-primary">Regresar</a>
                        </p>
                    </div>
                    <table id="DataTableUsuario" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-primary">
                                <th></th>
                                <th>Nombre Completo</th>
                                <th>Cargo</th>
                                <th>Nro Carnet</th>
                                <th>Rol</th>
                                <th>Usuario</th>
                                <th>Telefono</th>
                                <th>N° Total Publicaciones</th>
                                <th width="1%">OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $dato['nombres'] . " " . $dato['apellido']; ?></td>
                                    <td><?php echo $dato['cargo']; ?></td>
                                    <td><?php echo $dato['ci']; ?></td>
                                    <td><?php
                                        if ($dato['id_rol'] == 1) {
                                            echo "Administrador";
                                        } elseif ($dato['id_rol'] == 2) {
                                            echo "Colaborador";
                                        }
                                        ?></td>
                                    <td><?php echo $dato['login']; ?></td>
                                    <td><?php echo $dato['telefono']; ?></td>
                                    <td><?php echo $dato['total']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url() . '/CAdministrador/reingresar/' . $dato['id_administrador']; ?>" class="btn btn-app bg-success"><i class="fas fa-sync-alt"></i>Habilitar</a>
                                            <form class="formulario-eliminar" method="POST" action="<?php echo base_url() . '/CAdministrador/eliminar_definivamente/' . $dato['id_administrador']; ?>" autocomplete="off">
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