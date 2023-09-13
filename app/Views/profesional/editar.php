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
                    <form enctype="multipart/form-data" class="formulario-nuevo" method="POST" action="<?php echo base_url(); ?>/CProfesional/actualizar" autocomplete="off">
                        <input type="hidden" value="<?php echo $datos['id_profesional']; ?>" name="id" id="id" />
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre(s)</label>
                                        <input type="text" class="form-control" name="nomProfesional" id="nomProfesional" value="<?php echo $datos['nombres']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Apellido Paterno</label>
                                        <input type="text" class="form-control" name="patProfesional" id="patProfesional" value="<?php echo $datos['ap_paterno']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Apellido Materno</label>
                                        <input type="text" class="form-control" name="matProfesional" id="matProfesional" value="<?php echo $datos['ap_materno']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nacionalidad</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" value="<?php echo $datos['nacionalidad']; ?>">
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
                                            <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento" value="<?php echo $datos['fecha_nacimiento']; ?>">
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
                                            <input class="form-control" type="text" id="ci" name="ci" value="<?php echo $datos['cedula']; ?>">
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
                                            <input type="text" class="form-control" name="domicilio" id="domicilio" value="<?php echo $datos['domicilio']; ?>">
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
                                            <input type="number" class="form-control" name="celular" id="celular" value="<?php echo $datos['celular']; ?>">
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
                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $datos['email']; ?>">
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
                                                <option value="Femenino" <?php if ($datos["genero"] == "Femenino") : ?>selected<?php endif; ?>>Femenino</option>
                                                <option value="Masculino" <?php if ($datos["genero"] == "Masculino") : ?>selected<?php endif; ?>>Masculino</option>
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
                            <a href="<?php echo base_url() . '/CProfesional/detalleProfesional/' . $datos['id_profesional']; ?>" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>