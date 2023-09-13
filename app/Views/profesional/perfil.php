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
                    <form enctype="multipart/form-data" class="formulario-nuevo" method="POST" action="<?php echo base_url(); ?>/CProfesional/actualizar_perfil" autocomplete="off">
                        <input type="hidden" value="<?php echo $datos['id_profesional']; ?>" name="id" id="id" />
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre(s)<font style="color: red;">*</font></label>
                                        <?php if ($datos['nombres'] == "") { ?>
                                            <input type="text" class="form-control" name="nomProfesional" id="nomProfesional" value="<?php echo set_value('nomProfesional'); ?>">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="nomProfesional" id="nomProfesional" value="<?php echo $datos['nombres']; ?>">
                                        <?php } ?>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('nomProfesional')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('nomProfesional') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Apellido Paterno</label>
                                        <?php if ($datos['ap_paterno'] == "") { ?>
                                            <input type="text" class="form-control" name="patProfesional" id="patProfesional" value="<?php echo set_value('patProfesional'); ?>">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="patProfesional" id="patProfesional" value="<?php echo $datos['ap_paterno']; ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Apellido Materno</label>
                                        <?php if ($datos['ap_materno'] == "") { ?>
                                            <input type="text" class="form-control" name="matProfesional" id="matProfesional" value="<?php echo set_value('matProfesional'); ?>">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="matProfesional" id="matProfesional" value="<?php echo $datos['ap_materno']; ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nacionalidad<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                            </div>
                                            <?php if ($datos['nacionalidad'] == "") { ?>
                                                <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" value="<?php echo set_value('nacionalidad'); ?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" value="<?php echo $datos['nacionalidad']; ?>">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('nacionalidad')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('nacionalidad') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fecha de Nacimiento<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <?php if ($datos['fecha_nacimiento'] == "0000-00-00") { ?>
                                                <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento" value="<?php echo set_value('fechanacimiento'); ?>">
                                            <?php } else { ?>
                                                <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento" value="<?php echo $datos['fecha_nacimiento']; ?>">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('fechanacimiento')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('fechanacimiento') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Cédula de Identidad<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <input class="form-control" type="text" value="<?php echo $datos['cedula']; ?>" disabled>
                                            <input id="ci" name="ci" type="hidden" value="<?php echo $datos['cedula']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ciudad<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fas fa-map-marker-alt"></i></span>
                                            </div>
                                            <?php if ($datos['ciudad'] == "") { ?>
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
                                            <?php } else { ?>
                                                <select onchange="if(this.value=='Otro'){document.getElementById('otraCiudad').style.display='block'}else{document.getElementById('otraCiudad').style.display='none'}" name="ciudad" id="ciudad" class="form-control">

                                                    <option value="La Paz" <?php if ($datos["ciudad"] == "La Paz") : ?>selected<?php endif; ?>>La Paz</option>
                                                    <option value="El Alto" <?php if ($datos["ciudad"] == "El Alto") : ?>selected<?php endif; ?>>El Alto</option>
                                                    <option value="Cochabamba" <?php if ($datos["ciudad"] == "Cochabamba") : ?>selected<?php endif; ?>>Cochabamba</option>
                                                    <option value="Santa Cruz" <?php if ($datos["ciudad"] == "Santa Cruz") : ?>selected<?php endif; ?>>Santa Cruz</option>
                                                    <option value="Oruro" <?php if ($datos["ciudad"] == "Oruro") : ?>selected<?php endif; ?>>Oruro</option>
                                                    <option value="Sucre" <?php if ($datos["ciudad"] == "Sucre") : ?>selected<?php endif; ?>>Sucre</option>
                                                    <option value="Potosí" <?php if ($datos["ciudad"] == "Potosí") : ?>selected<?php endif; ?>>Potosí</option>
                                                    <option value="Tarija" <?php if ($datos["ciudad"] == "Tarija") : ?>selected<?php endif; ?>>Tarija</option>
                                                    <option value="Beni" <?php if ($datos["ciudad"] == "Beni") : ?>selected<?php endif; ?>>Beni</option>
                                                    <option value="Pando" <?php if ($datos["ciudad"] == "Pando") : ?>selected<?php endif; ?>>Pando</option>
                                                    <option value="Otro" <?php if (($datos["ciudad"] != "La Paz") && ($datos["ciudad"] != "El Alto") &&
                                                                                ($datos["ciudad"] != "Cochabamba") &&   ($datos["ciudad"] != "Santa Cruz") &&
                                                                                ($datos["ciudad"] != "Oruro") &&  ($datos["ciudad"] != "Sucre") &&
                                                                                ($datos["ciudad"] != "Potosí") &&  ($datos["ciudad"] != "Tarija") &&
                                                                                ($datos["ciudad"] != "Beni") &&  ($datos["ciudad"] != "Pando")
                                                                            ) : ?>selected <?php endif; ?>>Otro</option>
                                                </select>
                                                <div class="input-group" id="otraCiudad" style="display:none">
                                                    <br>
                                                    <label for="otraCiudadInput">Ingrese la Ciudad:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="otraCiudad" name="otraCiudad" value="<?php echo $datos['ciudad']; ?>">
                                                    </div>
                                                </div>
                                            <?php } ?>
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
                                        <label>Domicilio<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-home"></i></span>
                                            </div>
                                            <?php if ($datos['domicilio'] == "") { ?>
                                                <input type="text" class="form-control" name="domicilio" id="domicilio" value="<?php echo set_value('domicilio'); ?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="domicilio" id="domicilio" value="<?php echo $datos['domicilio']; ?>">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('domicilio')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('domicilio') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Teléfono o Celular<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <?php if ($datos['celular'] == "") { ?>
                                                <input type="number" class="form-control" name="celular" id="celular" value="<?php echo set_value('celular'); ?>">
                                            <?php } else { ?>
                                                <input type="number" class="form-control" name="celular" id="celular" value="<?php echo $datos['celular']; ?>">
                                            <?php } ?>
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
                                        <label>Correo Electrónico<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <?php if ($datos['email'] == "") { ?>
                                                <input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>">
                                            <?php } else { ?>
                                                <input type="email" class="form-control" name="email" id="email" value="<?php echo $datos['email']; ?>">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('email')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('email') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Género<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                            </div>
                                            <select name="genero" id="genero" class="form-control">
                                                <?php if ($datos['genero'] == "") { ?>
                                                    <option value="">Seleccionar</option>
                                                    <option value="Femenino" <?php echo set_select('genero', 'Femenino'); ?>>Femenino</option>
                                                    <option value="Masculino" <?php echo set_select('genero', 'Masculino'); ?>>Masculino</option>
                                                <?php } else { ?>
                                                    <option value="Femenino" <?php if ($datos["genero"] == "Femenino") : ?>selected<?php endif; ?>>Femenino</option>
                                                    <option value="Masculino" <?php if ($datos["genero"] == "Masculino") : ?>selected<?php endif; ?>>Masculino</option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('genero')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('genero') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Imagen <span class="breadcrumb-item active">(Peso maximo 10MB)</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-file-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control" name="imgUsuario" id="imgUsuario" onchange="return validarExt()">
                                            <input type="hidden" id="imgActUsuario" name="imgActUsuario" value="<?php echo $datos["img_profesional"] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" id="visorArchivo">
                                    <?php
                                    if ($datos["img_profesional"] == "") {
                                    ?>
                                        <center><img src="<?php echo base_url(); ?>/assets/dist/img/usuario.jpg" width="150"></center>

                                    <?php
                                    } else {
                                    ?>
                                        <center><img src="<?php echo base_url(); ?>/assets/dist/img/usuario/<?php echo $datos["img_profesional"]; ?>" width="150"></center>
                                    <?php
                                    }
                                    ?>

                                </div>
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