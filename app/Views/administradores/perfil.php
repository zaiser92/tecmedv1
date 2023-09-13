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
                    <form class="formulario-editado" method="POST" action="<?php echo base_url(); ?>/CAdministrador/actualizar_perfil" autocomplete="off">
                        <input type="hidden" value="<?php echo $datos['id_administrador']; ?>" name="id" id="id" />
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Nombres</label>
                                    <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $datos['nombres']; ?>" autofocus disabled>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input class="form-control" id="apellido" name="apellido" type="text" value="<?php echo $datos['apellido']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Cargo del Administrador</label>
                                    <select name="cargo" id="cargo" class="form-control" disabled>
                                        <option value="Secretaria" <?php if ($datos["cargo"] == "Secretaria") : ?>selected<?php endif; ?>>Secretaria</option>
                                        <option value="Auxiliar Oficina" <?php if ($datos["cargo"] == "Auxiliar Oficina") : ?>selected<?php endif; ?>>Auxiliar Oficina</option>
                                        <option value="Kardixta" <?php if ($datos["cargo"] == "Kardixta") : ?>selected<?php endif; ?>>Kardixta</option>
                                        <option value="Jefe de Mencion" <?php if ($datos["cargo"] == "Jefe de Mencion") : ?>selected<?php endif; ?>>Jefe de Mencion</option>
                                        <option value="Docente" <?php if ($datos["cargo"] == "Docente") : ?>selected<?php endif; ?>>Docente</option>
                                        <option value="Director de Carrera" <?php if ($datos["cargo"] == "Director de Carrera") : ?>selected<?php endif; ?>>Director de Carrera</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Nro Carnet</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                        </div>
                                        <input class="form-control" id="ci" name="ci" type="text" value="<?php echo $datos['ci']; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Rol</label>
                                    <select name="rol" id="rol" class="form-control" disabled>
                                        <option value="1" <?php if ($datos["id_rol"] == "1") : ?>selected<?php endif; ?>>Administrador</option>
                                        <option value="2" <?php if ($datos["id_rol"] == "2") : ?>selected<?php endif; ?>>Colaborador</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>N° Celular</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="celular" id="celular" value="<?php echo $datos['telefono']; ?>">
                                    </div>
                                </div>
                                <?php if (isset($validation) && $validation->getError('celular')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('celular') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>/Usuarios" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>