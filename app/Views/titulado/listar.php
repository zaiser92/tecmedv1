<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid"></div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="background-color: midnightblue;">
                            <h4 style="color: white;"><?php echo $titulo; ?></h4>
                        </div>
                        <div class="card-body table-responsive">
                            <div>
                                <p>
                                    <?php if ($cantidad < 3) { ?>
                                        <a href="<?php echo base_url(); ?>/CTitulado/nuevoProfesional/" class="btn btn-success"><i class='fas fa-plus'></i> Agregar Mención</a>
                                    <?php } ?>
                                    <?php if ($cantidadcalificadas < 3) { ?>
                                        <a href="<?php echo base_url(); ?>/CExpAcademica/nuevo" class="btn btn-warning"><i class='fas fa-star'></i> Calificar Mención</a>
                                    <?php } ?>
                                    <a href="<?php echo base_url(); ?>/CExpAcademica/calificacion" class="btn btn-info"><i class='fas fa-check'></i> Ver CAlificaciones Mención</a>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover text-nowrap table-bordered">
                                                <thead>
                                                    <tr class="bg-primary">
                                                        <th>Mención</th>
                                                        <th>Modalidad Ingreso</th>
                                                        <th>Año Ingreso</th>
                                                        <th>Año Egreso</th>
                                                        <th>Año Titulación</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($datos as $dato) { ?>
                                                        <tr>
                                                            <td><?php echo $dato['mencion']; ?></td>
                                                            <td><?php echo $dato['modalidad']; ?></td>
                                                            <td><?php echo $dato['ingreso']; ?></td>
                                                            <td><?php echo $dato['egreso']; ?></td>
                                                            <td><?php echo $dato['titulacion']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>