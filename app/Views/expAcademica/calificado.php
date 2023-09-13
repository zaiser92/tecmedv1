<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid"></div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="background-color: midnightblue;">
                            <h4 style="color: white;"><?php echo $titulo; ?></h4>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="card">
                                        <div class="card-header" style="background-color: midnightblue;">
                                            <h4 style="color: white;">Preguntas</h4>
                                        </div>
                                        <div class="card-body table-responsive p-0">
                                            <div class="card-body">
                                                <ol>
                                                    <li>¿La formación académica adquirida durante el pregrado tiene un impacto en el desempeño laboral actualmente?</li>
                                                    <li>¿Aplica los conocimientos y habilidades adquiridos a través del Plan de Estudios de su pregrado en su actividad laboral actual?</li>
                                                    <li>¿Los contenidos impartidos por los docentes en las asignaturas han cumplido con sus expectativas académicas?</li>
                                                    <li>¿En su estadía de estudio en la Carrera se contaba con aulas prácticas? De ser verdad responda la siguiente pregunta, caso contrario puede saltarse esta pregunta
                                                        ¿Las instalaciones de prácticas cumplen con las necesidades requeridas para llevar a cabo procedimientos acordes a los avances actuales?
                                                    </li>
                                                    <li>¿La infraestructura actual mobiliaria de la Carrera son adecuados para la formación profesional?</li>
                                                    <li>¿Considera que los servicios de la biblioteca de la Facultad satisfacen sus necesidades académicas y de investigación?</li>
                                                    <li>¿Considera que la enseñanza, evaluación y retroalimentación proporcionada por los docentes es oportuna y suficiente?</li>
                                                    <li>¿Considera que la cantidad y difusión de actividades científicas y académicas son adecuadas para satisfacer las necesidades de la comunidad académica?</li>
                                                    <li>¿Considera que las actividades de recreación extracurriculares han cumplido con sus expectativas?</li>
                                                    <li>¿Considera que la información, actividades y recursos proporcionados por la sociedad científica de la carrera han contribuido a su formación profesional de manera significativa?</li>
                                                    <li>¿Considera que las actividades y experiencias vividas durante este período del Internado Rotatorio le han proporcionado conocimientos y habilidades relevantes para su futura práctica profesional?</li>
                                                    <li>¿Considera que el perfil profesional de la Carrera se encuentra actualizado y en línea con las demandas y requerimientos del campo laboral actual?</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-header" style="background-color: midnightblue;">
                                            <h4 style="color: white;">Ponderación</h4>
                                        </div>
                                        <div class="card-body table-responsive p-0">
                                            <div class="card-body">
                                                <label>Criterio de Calificación </label><br>
                                                <strong>1. Malo:</strong> <br>El aspecto evaluado es deficiente o no cumple con las expectativas.<br>
                                                <strong>2. Regular:</strong><br> El aspecto evaluado tiene algunas deficiencias o se encuentra en un nivel promedio.<br>
                                                <strong>3. Aceptable:</strong><br> El aspecto evaluado cumple con las expectativas mínimas o se encuentra en un nivel satisfactorio.<br>
                                                <strong>4. Bueno:</strong><br> El aspecto evaluado es de calidad y supera las expectativas básicas.<br>
                                                <strong>5. Excelente:</strong> <br>El aspecto evaluado es excepcional y va más allá de las expectativas, demostrando un alto nivel de satisfacción.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover text-nowrap table-bordered">
                                                <thead>
                                                    <tr class="bg-primary" style="text-align: center;">
                                                        <th>MENCIÓN</th>
                                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                            <th><?php echo $i; ?></th>
                                                        <?php } ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($datos as $dato) { ?>
                                                        <tr style="text-align: center;">
                                                            <td><?php echo $dato['mencion']; ?></td>
                                                            <td><?php echo $dato['prep_academica']; ?></td>
                                                            <td><?php echo $dato['plan_estudios']; ?></td>
                                                            <td><?php echo $dato['asignaturas']; ?></td>
                                                            <td><?php echo $dato['equipamento']; ?></td>
                                                            <td><?php echo $dato['infraestructura']; ?></td>
                                                            <td><?php echo $dato['biblioteca']; ?></td>
                                                            <td><?php echo $dato['tutoria_docente']; ?></td>
                                                            <td><?php echo $dato['actividades_academicas']; ?></td>
                                                            <td><?php echo $dato['actividades_extracurriculares']; ?></td>
                                                            <td><?php echo $dato['sociedad_cientifica']; ?></td>
                                                            <td><?php echo $dato['internado_rotatorio']; ?></td>
                                                            <td><?php echo $dato['perfil_profesional']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url() . '/CTitulado'; ?>" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>