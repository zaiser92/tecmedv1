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
                    <form class="formulario-nuevo" method="POST" action="<?php echo base_url(); ?>/CTitulado/insertar" autocomplete="off">
                        <input type="hidden" name="id_prof" id="id_prof" value="<?php echo $id_prof; ?>">
                        <?php csrf_field(); ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Mención<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-award"></i></span>
                                            </div>
                                            <select class="form-control" name="mencion" id="mencion">
                                                <option value="">Seleccionar Mención</option>
                                                <?php foreach ($menciones as $dato) { ?>
                                                    <option value="<?php echo $dato['id']; ?>" <?php echo (in_array($dato['id'], array_column($menciones_actuales, 'id_mencion'))) ? 'disabled' : ''; ?> <?php echo set_select('mencion', $dato['id']); ?>><?php echo $dato['mencion']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('mencion')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('mencion') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Gestión Ingreso<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="number" class="form-control" name="ingreso" id="ingreso" value="<?php echo set_value('ingreso') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('ingreso')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('ingreso') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Modalidad Ingreso<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sign-in-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="modalidad" id="modalidad">
                                                <option value="">Seleccionar Modalidad</option>
                                                <option value="Prueba de suficiencia academica" <?php echo set_select('modalidad', 'Prueba de suficiencia academica'); ?>>Prueba de suficiencia academica</option>
                                                <option value="Becario" <?php echo set_select('modalidad', 'Becario'); ?>>Becario</option>
                                                <option value="Traspaso interno" <?php echo set_select('modalidad', 'Traspaso interno'); ?>>Traspaso interno</option>
                                                <option value="Carrera paralela" <?php echo set_select('modalidad', 'Carrera paralela'); ?>>Carrera paralela</option>
                                                <option value="Profesional" <?php echo set_select('modalidad', 'Profesional'); ?>>Profesional</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('modalidad')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('modalidad') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Gestión Egreso<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="number" class="form-control" name="egreso" id="egreso" value="<?php echo set_value('egreso') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('egreso')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('egreso') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Gestión Titulación<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                            </div>
                                            <input type="number" class="form-control" name="titulacion" id="titulacion" value="<?php echo set_value('titulacion') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('titulacion')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('titulacion') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <a href="<?php echo base_url() . '/CProfesional/detalleProfesional/' . $id_prof; ?>" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>