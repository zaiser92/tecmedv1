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
                    <form class="formulario-nuevo" method="POST" action="<?php echo base_url(); ?>/CEventos/insertar" autocomplete="off">
                        <?php csrf_field(); ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 d-flex align-items-center justify-content-center">
                                    <div class="form-group">
                                        <label for="tipo" class="form-label">Tipo<font style="color: red;">*</font></label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-primary" type="radio" id="curso" name="tipo" value="curso" <?php echo set_radio('tipo', 'curso'); ?>>
                                            <label for="curso" class="custom-control-label">Curso</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-primary" type="radio" id="seminario" name="tipo" value="seminario" <?php echo set_radio('tipo', 'seminario'); ?>>
                                            <label for="seminario" class="custom-control-label">Seminario</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-primary" type="radio" id="congreso" name="tipo" value="congreso" <?php echo set_radio('tipo', 'congreso'); ?>>
                                            <label for="congreso" class="custom-control-label">Congreso</label>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('tipo')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('tipo') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6 d-flex align-items-center justify-content-center">
                                    <div class="form-group">
                                        <label for="modalidad" class="form-label">Modalidad<font style="color: red;">*</font></label>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="expositor" name="modalidad[]" value="expositor" <?php echo set_checkbox('modalidad[]', 'expositor'); ?>>
                                            <label class="custom-control-label" for="expositor">Expositor</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="organizador" name="modalidad[]" value="organizador" <?php echo set_checkbox('modalidad[]', 'organizador'); ?>>
                                            <label class="custom-control-label" for="organizador">Organizador</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="aprobacion" name="modalidad[]" value="aprobación" <?php echo set_checkbox('modalidad[]', 'aprobación'); ?>>
                                            <label class="custom-control-label" for="aprobacion">Aprobación</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="participacion" name="modalidad[]" value="participación" <?php echo set_checkbox('modalidad[]', 'participación'); ?>>
                                            <label class="custom-control-label" for="participacion">Participación</label>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('modalidad')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('modalidad') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fecha Inicio<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" class="form-control" name="inicio" id="inicio" value="<?php echo set_value('inicio') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('inicio')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('inicio') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fecha Fin<font style="color: red; font-size: 12px;"> (LLenar si el evento duro más de 1 dia)</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" class="form-control" name="fin" id="fin" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tema<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lightbulb"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="tema" id="tema" value="<?php echo set_value('tema') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('tema')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('tema') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Institución <font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="institucion" id="institucion" value="<?php echo set_value('institucion') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('institucion')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('institucion') ?>
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
                                        <label>País<font style="color: red;">*</font></label>
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
                            </div>
                            <a href="<?php echo base_url(); ?>/CEventos" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>