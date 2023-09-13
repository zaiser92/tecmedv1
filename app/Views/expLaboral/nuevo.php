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
                    <form class="formulario-nuevo" method="POST" action="<?php echo base_url(); ?>/CExpLaboral/insertar" autocomplete="off">
                        <?php csrf_field(); ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fecha Inicio Trabajo<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" class="form-control" name="desde" id="desde" value="<?php echo set_value('desde') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('desde')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('desde') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fecha Fin Trabajo<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" class="form-control" name="hasta" id="hasta" value="<?php echo set_value('hasta') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('hasta')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('hasta') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre Institución/Empresa<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="empresa_institucion" id="empresa_institucion" value="<?php echo set_value('empresa_institucion') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('empresa_institucion')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('empresa_institucion') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Cargo ocupado<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-suitcase"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="cargo" id="cargo" value="<?php echo set_value('cargo') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('cargo')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('cargo') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ciudad<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="ciudad" id="ciudad" value="<?php echo set_value('ciudad') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('ciudad')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('ciudad') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pais<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="pais" id="pais" value="<?php echo set_value('pais') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('pais')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('pais') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Actividades realizadas<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <textarea class="form-control" name="actividades" id="actividades" cols="30" rows="6"></textarea>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('actividades')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('actividades') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <a href="<?php echo base_url(); ?>/CExpLaboral" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>