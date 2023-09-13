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
                    <table id="DataTableUsuario" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-primary">
                                <th width="5%"></th>
                                <th>Mención</th>
                                <th>Costo</th>
                                <th>Tema</th>
                                <th>Lugar</th>
                                <th width="1%">Modalidad</th>
                                <th width="1%">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $dato['mencion']; ?></td>
                                    <td><?php echo $dato['costo']; ?></td>
                                    <td><?php echo $dato['tema']; ?></td>
                                    <td><?php echo $dato['lugar']; ?></td>
                                    <td><?php echo $dato['modalidad']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url() . '/assets/dist/doc/' . $dato['archivo']; ?>" download="<?php echo $dato['tema']; ?>" class="btn btn-app bg-primary"><i class="fas fa-download"></i>Descargar</a>
                                            <a href="<?php echo base_url() . '/CSeminario/visualizar/' . $dato['codigo']; ?>" class="btn  btn-app bg-success"><i class="fas fa-eye"></i>Visualizar</a>
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