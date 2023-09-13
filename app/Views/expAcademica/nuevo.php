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
                    <form class="formulario-nuevo" method="POST" action="<?php echo base_url(); ?>/CExpAcademica/insertar" autocomplete="off">
                        <input type="hidden" name="id_prof" id="id_prof" value="<?php echo $id_prof; ?>">
                        <?php csrf_field(); ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Mención<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-award"></i></span>
                                            </div>
                                            <select class="form-control" name="mencion" id="mencion">
                                                <option value="">Seleccionar Mención</option>
                                                <?php foreach ($menciones_actuales as $dato) { ?>
                                                    <option value="<?php echo $dato['id_mencion']; ?>" <?php echo (in_array($dato['id_mencion'], array_column($menciones_calificadas, 'id_mencion'))) ? 'disabled' : ''; ?> <?php echo set_select('mencion', $dato['id']); ?>><?php echo $dato['mencion']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('mencion')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('mencion') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Criterio de Calificación </label><br>
                                        <strong>1. Malo:</strong> El aspecto evaluado es deficiente o no cumple con las expectativas.<br>
                                        <strong>2. Regular:</strong> El aspecto evaluado tiene algunas deficiencias o se encuentra en un nivel promedio.<br>
                                        <strong>3. Aceptable:</strong> El aspecto evaluado cumple con las expectativas mínimas o se encuentra en un nivel satisfactorio.<br>
                                        <strong>4. Bueno:</strong> El aspecto evaluado es de calidad y supera las expectativas básicas.<br>
                                        <strong>5. Excelente:</strong> El aspecto evaluado es excepcional y va más allá de las expectativas, demostrando un alto nivel de satisfacción.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="callout callout-info">
                                            <h5>PREPARACIÓN ACADÉMICA</h5>
                                            <p>1. ¿La formación académica adquirida durante el pregrado tiene un impacto en el desempeño laboral actualmente?</p>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('prep_academica')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('prep_academica') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <!-- <input class="form-control is-warning" type="number" id="prep_academica" name="prep_academica" value="<?php echo set_value('prep_academica') ?>"> -->
                                        <select name="prep_academica" id="prep_academica" class="form-control is-warning">
                                            <option value="">Calificar</option>
                                            <option value="1" <?php echo set_select('prep_academica', '1'); ?>>Malo</option>
                                            <option value="2" <?php echo set_select('prep_academica', '2'); ?>>Regular</option>
                                            <option value="3" <?php echo set_select('prep_academica', '3'); ?>>Aceptable</option>
                                            <option value="4" <?php echo set_select('prep_academica', '4'); ?>>Bueno</option>
                                            <option value="5" <?php echo set_select('prep_academica', '5'); ?>>Excelente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="callout callout-info">
                                            <h5>PLAN DE ESTUDIOS</h5>
                                            <p>2. ¿Aplica los conocimientos y habilidades adquiridos a través del Plan de Estudios de su pregrado en su actividad laboral actual?</p>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('plan_estudios')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('plan_estudios') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <!-- <input class="form-control is-warning" type="number" id="plan_estudios" name="plan_estudios" value="<?php echo set_value('plan_estudios') ?>"> -->
                                        <select name="plan_estudios" id="plan_estudios" class="form-control is-warning">
                                            <option value="">Calificar</option>
                                            <option value="1" <?php echo set_select('plan_estudios', '1'); ?>>Malo</option>
                                            <option value="2" <?php echo set_select('plan_estudios', '2'); ?>>Regular</option>
                                            <option value="3" <?php echo set_select('plan_estudios', '3'); ?>>Aceptable</option>
                                            <option value="4" <?php echo set_select('plan_estudios', '4'); ?>>Bueno</option>
                                            <option value="5" <?php echo set_select('plan_estudios', '5'); ?>>Excelente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="callout callout-info">
                                            <h5>ASIGNATURAS</h5>
                                            <p>3. ¿Los contenidos impartidos por los docentes en las asignaturas han cumplido con sus expectativas académicas?</p>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('asignaturas')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('asignaturas') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <!-- <input class="form-control is-warning" type="number" id="asignaturas" name="asignaturas" value="<?php echo set_value('asignaturas') ?>"> -->
                                        <select name="asignaturas" id="asignaturas" class="form-control is-warning">
                                            <option value="">Calificar</option>
                                            <option value="1" <?php echo set_select('asignaturas', '1'); ?>>Malo</option>
                                            <option value="2" <?php echo set_select('asignaturas', '2'); ?>>Regular</option>
                                            <option value="3" <?php echo set_select('asignaturas', '3'); ?>>Aceptable</option>
                                            <option value="4" <?php echo set_select('asignaturas', '4'); ?>>Bueno</option>
                                            <option value="5" <?php echo set_select('asignaturas', '5'); ?>>Excelente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="callout callout-info">
                                            <h5>EQUIPAMENTO AULAS DE PRÁCTICAS</h5>
                                            <p>4. ¿En su estadía de estudio en la Carrera se contaba con aulas prácticas?. De ser verdad responda la siguiente pregunta, caso contrario puede saltarse esta pregunta <br>
                                                ¿Las instalaciones de prácticas cumplen con las necesidades requeridas para llevar a cabo procedimientos acordes a los avances actuales?
                                            </p>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('equipamento')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('equipamento') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <!-- <input class="form-control is-warning" type="number" id="equipamento" name="equipamento" value="<?php echo set_value('equipamento') ?>"> -->
                                        <select name="equipamento" id="equipamento" class="form-control is-warning">
                                            <option value="">Calificar</option>
                                            <option value="1" <?php echo set_select('equipamento', '1'); ?>>Malo</option>
                                            <option value="2" <?php echo set_select('equipamento', '2'); ?>>Regular</option>
                                            <option value="3" <?php echo set_select('equipamento', '3'); ?>>Aceptable</option>
                                            <option value="4" <?php echo set_select('equipamento', '4'); ?>>Bueno</option>
                                            <option value="5" <?php echo set_select('equipamento', '5'); ?>>Excelente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="callout callout-info">
                                            <h5>INFRAESTRUCTURA</h5>
                                            <p>5. ¿La infraestructura actual mobiliaria de la Carrera son adecuados para la formación profesional?</p>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('infraestructura')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('infraestructura') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <!-- <input class="form-control is-warning" type="number" id="infraestructura" name="infraestructura" value="<?php echo set_value('infraestructura') ?>"> -->
                                        <select name="infraestructura" id="infraestructura" class="form-control is-warning">
                                            <option value="">Calificar</option>
                                            <option value="1" <?php echo set_select('infraestructura', '1'); ?>>Malo</option>
                                            <option value="2" <?php echo set_select('infraestructura', '2'); ?>>Regular</option>
                                            <option value="3" <?php echo set_select('infraestructura', '3'); ?>>Aceptable</option>
                                            <option value="4" <?php echo set_select('infraestructura', '4'); ?>>Bueno</option>
                                            <option value="5" <?php echo set_select('infraestructura', '5'); ?>>Excelente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="callout callout-info">
                                            <h5>BIBLIOTECA</h5>
                                            <p>6. ¿Considera que los servicios de la biblioteca de la Facultad satisfacen sus necesidades académicas y de investigación?</p>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('biblioteca')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('biblioteca') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <!-- <input class="form-control is-warning" type="number" id="biblioteca" name="biblioteca" value="<?php echo set_value('biblioteca') ?>"> -->
                                        <select name="biblioteca" id="biblioteca" class="form-control is-warning">
                                            <option value="">Calificar</option>
                                            <option value="1" <?php echo set_select('biblioteca', '1'); ?>>Malo</option>
                                            <option value="2" <?php echo set_select('biblioteca', '2'); ?>>Regular</option>
                                            <option value="3" <?php echo set_select('biblioteca', '3'); ?>>Aceptable</option>
                                            <option value="4" <?php echo set_select('biblioteca', '4'); ?>>Bueno</option>
                                            <option value="5" <?php echo set_select('biblioteca', '5'); ?>>Excelente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="callout callout-info">
                                            <h5>ENSEÑANZA DOCENTE</h5>
                                            <p>7. ¿Considera que la enseñanza, evaluación y retroalimentación proporcionada por los docentes es oportuna y suficiente?</p>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('tutoria_docente')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('tutoria_docente') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <!-- <input class="form-control is-warning" type="number" id="tutoria_docente" name="tutoria_docente" value="<?php echo set_value('tutoria_docente') ?>"> -->
                                        <select name="tutoria_docente" id="tutoria_docente" class="form-control is-warning">
                                            <option value="">Calificar</option>
                                            <option value="1" <?php echo set_select('tutoria_docente', '1'); ?>>Malo</option>
                                            <option value="2" <?php echo set_select('tutoria_docente', '2'); ?>>Regular</option>
                                            <option value="3" <?php echo set_select('tutoria_docente', '3'); ?>>Aceptable</option>
                                            <option value="4" <?php echo set_select('tutoria_docente', '4'); ?>>Bueno</option>
                                            <option value="5" <?php echo set_select('tutoria_docente', '5'); ?>>Excelente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="callout callout-info">
                                            <h5>ACTIVIDADES ACADÉMICAS</h5>
                                            <p>8. ¿Considera que la cantidad y difusión de actividades científicas y académicas son adecuadas para satisfacer las necesidades de la comunidad académica?</p>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('actividades_academicas')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('actividades_academicas') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <!-- <input class="form-control is-warning" type="number" id="actividades_academicas" name="actividades_academicas" value="<?php echo set_value('actividades_academicas') ?>"> -->
                                        <select name="actividades_academicas" id="actividades_academicas" class="form-control is-warning">
                                            <option value="">Calificar</option>
                                            <option value="1" <?php echo set_select('actividades_academicas', '1'); ?>>Malo</option>
                                            <option value="2" <?php echo set_select('actividades_academicas', '2'); ?>>Regular</option>
                                            <option value="3" <?php echo set_select('actividades_academicas', '3'); ?>>Aceptable</option>
                                            <option value="4" <?php echo set_select('actividades_academicas', '4'); ?>>Bueno</option>
                                            <option value="5" <?php echo set_select('actividades_academicas', '5'); ?>>Excelente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="callout callout-info">
                                            <h5>ACTIVIDADES EXTRACURRICULARES</h5>
                                            <p>9. ¿Considera que las actividades de recreación extracurriculares han cumplido con sus expectativas?</p>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('actividades_extracurriculares')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('actividades_extracurriculares') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <!-- <input class="form-control is-warning" type="number" id="actividades_extracurriculares" name="actividades_extracurriculares" value="<?php echo set_value('actividades_extracurriculares') ?>"> -->
                                        <select name="actividades_extracurriculares" id="actividades_extracurriculares" class="form-control is-warning">
                                            <option value="">Calificar</option>
                                            <option value="1" <?php echo set_select('actividades_extracurriculares', '1'); ?>>Malo</option>
                                            <option value="2" <?php echo set_select('actividades_extracurriculares', '2'); ?>>Regular</option>
                                            <option value="3" <?php echo set_select('actividades_extracurriculares', '3'); ?>>Aceptable</option>
                                            <option value="4" <?php echo set_select('actividades_extracurriculares', '4'); ?>>Bueno</option>
                                            <option value="5" <?php echo set_select('actividades_extracurriculares', '5'); ?>>Excelente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="callout callout-info">
                                            <h5>SOCIEDAD CIENTÍFICA</h5>
                                            <p>10. ¿Considera que la información, actividades y recursos proporcionados por la sociedad científica de la carrera han contribuido a su formación profesional de manera significativa?</p>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('sociedad_cientifica')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('sociedad_cientifica') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <!-- <input class="form-control is-warning" type="number" id="sociedad_cientifica" name="sociedad_cientifica" value="<?php echo set_value('sociedad_cientifica') ?>"> -->
                                        <select name="sociedad_cientifica" id="sociedad_cientifica" class="form-control is-warning">
                                            <option value="">Calificar</option>
                                            <option value="1" <?php echo set_select('sociedad_cientifica', '1'); ?>>Malo</option>
                                            <option value="2" <?php echo set_select('sociedad_cientifica', '2'); ?>>Regular</option>
                                            <option value="3" <?php echo set_select('sociedad_cientifica', '3'); ?>>Aceptable</option>
                                            <option value="4" <?php echo set_select('sociedad_cientifica', '4'); ?>>Bueno</option>
                                            <option value="5" <?php echo set_select('sociedad_cientifica', '5'); ?>>Excelente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="callout callout-info">
                                            <h5>INTERNADO ROTATORIO</h5>
                                            <p>11. ¿Considera que las actividades y experiencias vividas durante este período del Internado Rotatorio le han proporcionado conocimientos y habilidades relevantes para su futura práctica profesional?</p>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('internado_rotatorio')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('internado_rotatorio') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <!-- <input class="form-control is-warning" type="number" id="internado_rotatorio" name="internado_rotatorio" value="<?php echo set_value('internado_rotatorio') ?>"> -->
                                        <select name="internado_rotatorio" id="internado_rotatorio" class="form-control is-warning">
                                            <option value="">Calificar</option>
                                            <option value="1" <?php echo set_select('internado_rotatorio', '1'); ?>>Malo</option>
                                            <option value="2" <?php echo set_select('internado_rotatorio', '2'); ?>>Regular</option>
                                            <option value="3" <?php echo set_select('internado_rotatorio', '3'); ?>>Aceptable</option>
                                            <option value="4" <?php echo set_select('internado_rotatorio', '4'); ?>>Bueno</option>
                                            <option value="5" <?php echo set_select('internado_rotatorio', '5'); ?>>Excelente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="callout callout-info">
                                            <h5>PERFIL PROFESIONAL</h5>
                                            <p>12. ¿Considera que el perfil profesional de la Carrera se encuentra actualizado y en línea con las demandas y requerimientos del campo laboral actual?</p>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('perfil_profesional')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('perfil_profesional') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <!-- <input class="form-control is-warning" type="number" id="perfil_profesional" name="perfil_profesional" value="<?php echo set_value('perfil_profesional') ?>"> -->
                                        <select name="perfil_profesional" id="perfil_profesional" class="form-control is-warning">
                                            <option value="">Calificar</option>
                                            <option value="1" <?php echo set_select('perfil_profesional', '1'); ?>>Malo</option>
                                            <option value="2" <?php echo set_select('perfil_profesional', '2'); ?>>Regular</option>
                                            <option value="3" <?php echo set_select('perfil_profesional', '3'); ?>>Aceptable</option>
                                            <option value="4" <?php echo set_select('perfil_profesional', '4'); ?>>Bueno</option>
                                            <option value="5" <?php echo set_select('perfil_profesional', '5'); ?>>Excelente</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url() . '/CTitulado'; ?>" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>