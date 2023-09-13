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
                                <th width="15%">Fecha entrega documentos</th>
                                <th>Mención</th>
                                <th>Materia</th>
                                <th>Carga Horaria(hrs.)</th>
                                <th width="1%">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <?php
                                        $desde = $dato["fecha_entrega_doc"];
                                        $fechadesde = new DateTime($desde);
                                        echo $fechadesde->format("d/m/Y"); ?>
                                    </td>
                                    <td><?php echo $dato['mencion']; ?></td>
                                    <td><?php echo $dato['materia']; ?></td>
                                    <td><?php echo $dato['carga_horaria']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url() . '/assets/dist/convocatoria_docencia/' . $dato['archivo']; ?>" download="Convocatoria Docencia" class="btn btn-app bg-primary"><i class="fas fa-download"></i>Descargar</a>
                                            <a href="<?php echo base_url() . '/CConvDocencia/visualizar/' . $dato['codigo']; ?>" class="btn  btn-app bg-success"><i class="fas fa-eye"></i>Visualizar</a>
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