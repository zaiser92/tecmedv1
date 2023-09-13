<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid"></div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: midnightblue;">
                    <h4 style="color: white;"><?php echo $titulo; ?></h4>
                    <?php if (isset($validation)) { ?>
                        <div class="alert alert-danger">
                            <?php echo $validation->listErrors(); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <form class="formulario-nuevo" method="POST" action="<?php echo base_url(); ?>/CTitulado/actualizar" autocomplete="off">
                        <input type="hidden" value="<?php echo $datos['id']; ?>" name="id" id="id" />
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
                                            <select class="form-control" name="mencion" id="mencion" disabled>

                                                <?php foreach ($menciones as $dato) { ?>
                                                    <option value="<?php echo $dato['id']; ?>" <?php if ($datos["id_mencion"] == $dato['id']) : ?>selected<?php endif; ?>><?php echo $dato['mencion']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Gestión Ingreso<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="number" class="form-control" name="ingreso" id="ingreso" value="<?php echo $datos['ingreso']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Modalidad Ingreso<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sign-in-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="modalidad" id="modalidad">
                                                <option value="Prueba de suficiencia academica" <?php if ($datos["modalidad"] == "Prueba de suficiencia academica") : ?>selected<?php endif; ?>>Prueba de suficiencia academica</option>
                                                <option value="Becario" <?php if ($datos["modalidad"] == "Becario") : ?>selected<?php endif; ?>>Becario</option>
                                                <option value="Traspaso interno" <?php if ($datos["modalidad"] == "Traspaso interno") : ?>selected<?php endif; ?>>Traspaso interno</option>
                                                <option value="Carrera paralela" <?php if ($datos["modalidad"] == "Carrera paralela") : ?>selected<?php endif; ?>>Carrera paralela</option>
                                                <option value="Profesional" <?php if ($datos["modalidad"] == "Profesional") : ?>selected<?php endif; ?>>Profesional</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Gestión Egreso<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="number" class="form-control" name="egreso" id="egreso" value="<?php echo $datos['egreso']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Gestión Titulación<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                            </div>
                                            <input type="number" class="form-control" name="titulacion" id="titulacion" value="<?php echo $datos['titulacion']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url() . '/CProfesional/detalleProfesional/' . $datos['id_profesional']; ?>" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>