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
                    <form enctype="multipart/form-data" class="formulario-nuevo" method="POST" action="<?php echo base_url(); ?>/CProfesional/insertar" autocomplete="off">
                        <?php csrf_field(); ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre(s)</label>
                                        <input type="text" class="form-control" name="nomProfesional" id="nomProfesional" value="<?php echo set_value('nomProfesional') ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Apellido Paterno</label>
                                        <input type="text" class="form-control" name="patProfesional" id="patProfesional" value="<?php echo set_value('patProfesional') ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Apellido Materno</label>
                                        <input type="text" class="form-control" name="matProfesional" id="matProfesional" value="<?php echo set_value('matProfesional') ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nacionalidad</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" value="<?php echo set_value('nacionalidad') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fecha de Nacimiento</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento" value="<?php echo set_value('fechanacimiento') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Cédula de Identidad</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <input class="form-control" id="ci" name="ci" type="text" value="<?php echo set_value('ci') ?>" autofocus>
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
                                        <label>Ciudad</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fas fa-map-marker-alt"></i></span>
                                            </div>
                                            <select onchange="if(this.value=='Otro'){document.getElementById('otraCiudad').style.display='block'}else{document.getElementById('otraCiudad').style.display='none'}" name="ciudad" id="ciudad" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="La Paz" <?php echo set_select('ciudad', 'La Paz'); ?>>La Paz</option>
                                                <option value="El Alto" <?php echo set_select('ciudad', 'El Alto'); ?>>El Alto</option>
                                                <option value="Cochabamba" <?php echo set_select('ciudad', 'Cochabamba'); ?>>Cochabamba</option>
                                                <option value="Santa Cruz" <?php echo set_select('ciudad', 'Santa Cruz'); ?>>Santa Cruz</option>
                                                <option value="Oruro" <?php echo set_select('ciudad', 'Oruro'); ?>>Oruro</option>
                                                <option value="Sucre" <?php echo set_select('ciudad', 'Sucre'); ?>>Sucre</option>
                                                <option value="Potosí" <?php echo set_select('ciudad', 'Potosí'); ?>>Potosí</option>
                                                <option value="Tarija" <?php echo set_select('ciudad', 'Tarija'); ?>>Tarija</option>
                                                <option value="Beni" <?php echo set_select('ciudad', 'Beni'); ?>>Beni</option>
                                                <option value="Pando" <?php echo set_select('ciudad', 'Pando'); ?>>Pando</option>
                                                <option value="Otro" <?php echo set_select('ciudad', 'Otro'); ?>>Otro</option>
                                            </select>
                                            <div class="input-group" id="otraCiudad" style="display:none">
                                                <br>
                                                <label for="otraCiudadInput">Ingrese la Ciudad:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="otraCiudad" name="otraCiudad" value="<?php echo set_value('otraCiudad') ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Domicilio</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-home"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="domicilio" id="domicilio" value="<?php echo set_value('domicilio') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Teléfono o Celular</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="number" class="form-control" name="celular" id="celular" value="<?php echo set_value('celular') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Correo Electronico</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Género</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                            </div>
                                            <select name="genero" id="genero" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="Femenino" <?php echo set_select('genero', 'Femenino'); ?>>Femenino</option>
                                                <option value="Masculino" <?php echo set_select('genero', 'Masculino'); ?>>Masculino</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Imagen <span class="breadcrumb-item active">(Peso maximo 10MB)</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-file-image"></i></span>
                                            </div>
                                            <input type="file" name="imgUsuario" id="imgUsuario" class="form-control" onchange="return validarExt()" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" id="visorArchivo">
                                </div>
                            </div>
                            <a href="<?php echo base_url(); ?>/CProfesional" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>