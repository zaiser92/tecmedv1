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
                            <a href="<?php echo base_url(); ?>/CNoticias" class="btn btn-primary">Regresar</a>
                        </p>
                    </div>
                    <table id="DataTableUsuario" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-primary">
                                <th></th>
                                <th width="1%">Cod.</th>
                                <th>Título</th>
                                <th>Referencia</th>
                                <th>Mención</th>
                                <th width="1%">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $dato['codigo']; ?></td>
                                    <td><?php echo $dato['titulo']; ?></td>
                                    <td><?php echo $dato['referencia']; ?></td>
                                    <td><?php echo $dato['mencion']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url() . '/assets/dist/noticias/' . $dato['archivo']; ?>" download="<?php echo $dato['titulo']; ?>" class="btn btn-app bg-primary"><i class="fas fa-download"></i>Descargar</a>
                                            <a href="<?php echo base_url() . '/CNoticias/reingresar/' . $dato['id']; ?>" class="btn btn-app bg-success"><i class="fas fa-sync-alt"></i>Reingresar</a>

                                            <form class="formulario-eliminar" method="POST" action="<?php echo base_url() . '/CNoticias/eliminar_definivamente/' . $dato['id']; ?>" autocomplete="off">
                                                <input type="hidden" class="form-control" name="cod" id="cod" value="<?php echo $dato['codigo']; ?>">
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