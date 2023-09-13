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
                            <a href="<?php echo base_url(); ?>/CAdministrador/nuevo" class="btn btn-success"><i class='fas fa-user-plus'></i> Agregar</a>
                            <a href="<?php echo base_url(); ?>/CAdministrador/eliminados" class="btn btn-secondary"><i class='fas fa-user-alt-slash'></i> Archivados</a>
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
                                <th width="1%">N° Publicaciones</th>
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
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url() . '/CAdministrador/noticias/' . $dato['id_administrador']; ?>" class="btn btn-app bg-orange"><i class="fas fa-newspaper">
                                                    <font style="font-size: 15px;"> #</font><?php echo $dato['noticias']; ?>
                                                </i>Noticias</a>
                                            <a href="<?php echo base_url() . '/CAdministrador/convocatorias/' . $dato['id_administrador']; ?>" class="btn btn-app bg-success"><i class="fa fa-bullhorn">
                                                    <font style="font-size: 15px;"> #</font><?php echo $dato['convocatorias']; ?>
                                                </i>Convocatorias</a>
                                            <a href="<?php echo base_url() . '/CAdministrador/cursos/' . $dato['id_administrador']; ?>" class="btn btn-app bg-purple"><i class="fa fa-graduation-cap">
                                                    <font style="font-size: 15px;"> #</font><?php echo $dato['cursos']; ?>
                                                </i>cursos</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url() . '/CAdministrador/editar/' . $dato['id_administrador']; ?>" class="btn btn-app bg-warning"><i class="fas fa-edit"></i>Editar</a>
                                            <a href="<?php echo base_url() . '/CAdministrador/eliminar/' . $dato['id_administrador']; ?>" class="btn btn-app bg-secondary"><i class="fa fa-folder-open"></i>Archivar</a>
                                            <form class="formulario-resetear" method="POST" action="<?php echo base_url() . '/CAdministrador/resetear/' . $dato['id_administrador']; ?>" autocomplete="off">
                                                <input type="hidden" value="<?php echo $dato['id_administrador']; ?>" name="id" id="id" />
                                                <input type="hidden" value="<?php echo $dato['ci']; ?>" name="ci" id="ci" />
                                                <button type="submit" class="btn btn-app bg-danger"><i class="fas fa-key"></i>Reiniciar</button>
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