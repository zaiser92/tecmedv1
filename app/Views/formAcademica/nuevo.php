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
                    <form class="formulario-nuevo" method="POST" action="<?php echo base_url(); ?>/CFormAcademica/insertar" autocomplete="off">
                        <?php csrf_field(); ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tipo<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <select name="tipo" id="tipo" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="0" <?php echo set_select('tipo', '0'); ?>>Título Profesional</option>
                                                <option value="4" <?php echo set_select('tipo', '4'); ?>>Doctorado</option>
                                                <option value="1" <?php echo set_select('tipo', '1'); ?>>Especialidad</option>
                                                <option value="2" <?php echo set_select('tipo', '2'); ?>>Maestría</option>
                                                <option value="3" <?php echo set_select('tipo', '3'); ?>>Diplomado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('tipo')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('tipo') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Título<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo set_value('titulo') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('titulo')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('titulo') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Institución Académica<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="institucion_academica" id="institucion_academica" value="<?php echo set_value('institucion_academica') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('institucion_academica')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('institucion_academica') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Gestión Conclusión<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="number" class="form-control" name="gestion_titulacion" id="gestion_titulacion" value="<?php echo set_value('gestion_titulacion') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('gestion_titulacion')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('gestion_titulacion') ?>
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
                            <a href="<?php echo base_url(); ?>/CFormAcademica" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>