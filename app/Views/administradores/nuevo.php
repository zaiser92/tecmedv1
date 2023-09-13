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
                    <form class="formulario-nuevo" method="POST" action="<?php echo base_url(); ?>/CAdministrador/insertar" autocomplete="off">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nombres</label>
                                    <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo set_value('nombre') ?>">
                                </div>
                                <?php if (isset($validation) && $validation->getError('nombre')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('nombre') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input class="form-control" id="apellido" name="apellido" type="text" value="<?php echo set_value('apellido') ?>">
                                </div>
                                <?php if (isset($validation) && $validation->getError('apellido')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('apellido') ?>
                                        </div>
                                    <?php endif; ?>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Cargo</label>
                                    <select name="cargo" id="cargo" class="form-control">
                                        <option value="">Seleccionar Cargo</option>
                                        <option value="Director de Carrera" <?php echo set_select('cargo', 'Director de Carrera'); ?>>Director de Carrera</option>
                                        <option value="Jefe de Mencion" <?php echo set_select('cargo', 'Jefe de Mencion'); ?>>Jefe de Mención</option>
                                        <option value="Secretaria" <?php echo set_select('cargo', 'Secretaria'); ?>>Secretaria</option>
                                        <option value="Auxiliar Oficina" <?php echo set_select('cargo', 'Auxiliar Oficina'); ?>>Auxiliar Oficina</option>
                                        <option value="Kardixta" <?php echo set_select('cargo', 'Kardixta'); ?>>Kardixta</option>
                                        <option value="Docente" <?php echo set_select('cargo', 'Docente'); ?>>Docente</option>
                                    </select>
                                </div>
                                <?php if (isset($validation) && $validation->getError('cargo')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('cargo') ?>
                                        </div>
                                    <?php endif; ?>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nro Carnet</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                        </div>
                                        <input class="form-control" id="ci" name="ci" type="text" value="<?php echo set_value('ci') ?>">
                                    </div>
                                </div>
                                <?php if (isset($validation) && $validation->getError('ci')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('ci') ?>
                                        </div>
                                    <?php endif; ?>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>N° Celular</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="celular" id="celular" value="<?php echo set_value('celular') ?>">
                                    </div>
                                </div>
                                <?php if (isset($validation) && $validation->getError('celular')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('celular') ?>
                                        </div>
                                    <?php endif; ?>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Rol</label>
                                    <select name="rol" id="rol" class="form-control">
                                        <option value="">Seleccionar un Rol</option>
                                        <option value="1" <?php echo set_select('rol', '1'); ?>>Administrador</option>
                                        <option value="2" <?php echo set_select('rol', '2'); ?>>Colaborador</option>
                                    </select>
                                </div>
                                <?php if (isset($validation) && $validation->getError('rol')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('rol') ?>
                                        </div>
                                    <?php endif; ?>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>/CAdministrador" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>