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
                    <form class="formulario-nuevo" method="POST" action="<?php echo base_url(); ?>/CPremios/actualizar" autocomplete="off">
                        <input type="hidden" value="<?php echo $datos['id']; ?>" name="id" id="id" />
                        <?php csrf_field(); ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Premio/Distincion<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-award"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $datos['nombre']; ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('nombre')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('nombre') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Institución que la otorgo<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="institucion" id="institucion" value="<?php echo $datos['institucion']; ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('institucion')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('institucion') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-4">
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Pais<font style="color: red;">*</font></label>
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Fecha<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $datos['fecha']; ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('fecha')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('fecha') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <a href="<?php echo base_url(); ?>/CPremios" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>