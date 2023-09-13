<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid"></div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: midnightblue;">
                    <h4 style="color: white;"><?php echo $titulo.' '. $user['nombres'].' '. $user['apellido'];?></h4>
                </div>
                <div class="card-body">
                    <table id="DataTableUsuario" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-primary">
                                <th></th>
                                <th width="5%">Cod.</th>
                                <th>mencion</th>
                                <th>costo</th>
                                <th>tema</th>
                                <th>lugar</th>
                                <th width="1%">modalidad</th>
                                <th width="1%">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $dato['codigo']; ?></td>
                                    <td><?php echo $dato['mencion']; ?></td>
                                    <td><?php echo $dato['costo']; ?></td>
                                    <td><?php echo $dato['tema']; ?></td>
                                    <td><?php echo $dato['lugar']; ?></td>
                                    <td><?php echo $dato['modalidad']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url() . '/assets/dist/doc/' . $dato['archivo']; ?>" download="<?php echo $dato['tema']; ?>" class="btn btn-app bg-primary"><i class="fas fa-download"></i>Descargar</a>
                                            <a href="<?php echo base_url() . '/CSeminario/visualizar/' . $dato['codigo']; ?>" class="btn  btn-app bg-success"><i class="fas fa-eye"></i>Visualizar</a>
                                            <a href="<?php echo base_url() . '/CSeminario/editar/' . $dato['id']; ?>" class="btn btn-app bg-warning"><i class="fas fa-edit"></i>Editar</a>
                                            <a href="<?php echo base_url() . '/CSeminario/eliminar/' . $dato['id']; ?>" class="btn btn-app bg-secondary"><i class="fa fa-folder-open"></i>Archivar</a>
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