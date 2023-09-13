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
                            <a href="<?php echo base_url(); ?>/CExpDocente/nuevo" class="btn btn-success"><i class='fas fa-plus'></i> Agregar</a>
                        </p>
                    </div>
                    <table id="DataTableUsuario" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-primary">
                                <th></th>
                                <th>Materia</th>
                                <th>Universidad</th>
                                <th>Ciudad</th>
                                <th>País</th>
                                <th>Desde</th>
                                <th>Hasta</th>
                                <th width="1%">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $dato['materia']; ?></td>
                                    <td><?php echo $dato['universidad']; ?></td>
                                    <td><?php echo $dato['ciudad']; ?></td>
                                    <td><?php echo $dato['pais']; ?></td>
                                    <td><?php echo $dato['desde']; ?></td>
                                    <td><?php echo $dato['hasta']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url() . '/CExpDocente/editar/' . base64_encode($dato['id']); ?>" class="btn btn-app bg-warning"><i class="fas fa-edit"></i>Editar</a>
                                            <form class="formulario-eliminar" method="POST" action="<?php echo base_url() . '/CExpDocente/eliminar_definivamente/' . $dato['id']; ?>" autocomplete="off">
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