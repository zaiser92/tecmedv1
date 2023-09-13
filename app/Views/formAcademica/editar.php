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
                    <form class="formulario-nuevo" method="POST" action="<?php echo base_url(); ?>/CFormAcademica/actualizar" autocomplete="off">
                        <input type="hidden" value="<?php echo $datos['id']; ?>" name="id" id="id" />
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
                                                <option value="0" <?php if ($datos["tipo"] == "0") : ?>selected<?php endif; ?>>Título Profesional</option>
                                                <option value="1" <?php if ($datos["tipo"] == "1") : ?>selected<?php endif; ?>>Especialidad</option>
                                                <option value="2" <?php if ($datos["tipo"] == "2") : ?>selected<?php endif; ?>>Maestría</option>
                                                <option value="3" <?php if ($datos["tipo"] == "3") : ?>selected<?php endif; ?>>Diplomado</option>
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
                                            <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $datos['titulo']; ?>">
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
                                            <input type="text" class="form-control" name="institucion_academica" id="institucion_academica" value="<?php echo $datos['institucion_academica']; ?>">
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
                                            <input type="number" class="form-control" name="gestion_titulacion" id="gestion_titulacion" value="<?php echo $datos['gestion_titulacion']; ?>">
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
                                            <input type="text" class="form-control" name="ciudad" id="ciudad" value="<?php echo $datos['ciudad']; ?>">
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
                                            <input type="text" class="form-control" name="pais" id="pais" value="<?php echo $datos['pais']; ?>">
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