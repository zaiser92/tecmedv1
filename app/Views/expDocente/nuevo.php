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
                    <form class="formulario-nuevo" method="POST" action="<?php echo base_url(); ?>/CExpDocente/insertar" autocomplete="off">
                        <?php csrf_field(); ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Materia<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-book"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="materia" id="materia" value="<?php echo set_value('materia') ?>" autofocus>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('materia')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('materia') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Universidad<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="universidad" id="universidad" value="<?php echo set_value('universidad') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('universidad')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('universidad') ?>
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
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Desde<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
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
                                        <label>Hasta<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
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
                            </div>
                            <a href="<?php echo base_url(); ?>/CExpDocente" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>