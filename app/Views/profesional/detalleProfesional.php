<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0" style="background-color: midnightblue;">
                                <h2 class="card-title" style="color: white;"><?php echo $titulo; ?></h2>
                            </div>
                            &nbsp;<br>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-5 text-center">
                                        <?php
                                        if ($datos["img_profesional"] == "") {
                                        ?>
                                            <center><img alt="user-avatar" class="img-circle img-fluid" src="<?php echo base_url(); ?>/assets/dist/img/usuario.jpg" width="100%" height="100%"></center>

                                        <?php
                                        } else {
                                        ?>
                                            <center><img alt="user-avatar" class="img-circle img-fluid" src="<?php echo base_url(); ?>/assets/dist/img/usuario/<?php echo $datos["img_profesional"]; ?>" width="100%" height="100%"></center>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-7">
                                        <h2 class="lead"><b><?php echo $datos["nombres"] . " " . $datos["ap_paterno"] . " " . $datos["ap_materno"]; ?></b></h2>
                                        <font class="text-muted text-sm"><b><i class="fas fa-calendar-alt"></i> Fecha de Nacimiento: </b></font><?php echo $datos["fecha_nacimiento"]; ?> <br>
                                        <font class="text-muted text-sm"><b><i class="fas fa-flag"></i> Nacionalidad: </b></font><?php echo $datos["nacionalidad"]; ?> <br>
                                        <font class="text-muted text-sm"><b><i class="fas fa-venus-mars"></i> Género: </b></font><?php echo $datos["genero"]; ?> <br>
                                        <font class="text-muted text-sm"><b><i class="fas fa-id-card"></i> Nro. Carnet: </b></font><?php echo $datos["cedula"]; ?> <br>
                                        <font class="text-muted text-sm"><b><i class="fa fas fa-map-marker-alt"></i> Dirección: </b></font><?php echo $datos["ciudad"] . ", " . $datos["domicilio"]; ?> <br>
                                        <font class="text-muted text-sm"><b><i class="fas fa-phone"></i> Celular: </b></font><?php echo $datos["celular"]; ?> <br>
                                        <font class="text-muted text-sm"><b><i class="fas fa-envelope"></i> Correo: </b></font><?php echo $datos["email"]; ?> <br>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <div class="btn-group">

                                        <a href="<?php echo base_url() . '/CProfesional/editar/' . $datos['id_profesional']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>

                                        <form class="formulario-resetear" method="POST" action="<?php echo base_url() . '/CProfesional/resetear/' . $datos['id_profesional']; ?>" autocomplete="off">
                                            <input type="hidden" value="<?php echo $datos['id_profesional']; ?>" name="id" id="id" />
                                            <input type="hidden" value="<?php echo $datos['cedula']; ?>" name="ci" id="ci" />
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-key"></i> Reestablecer</button>
                                        </form>
                                        <a href="<?php echo base_url() . '/CProfesional/eliminar/' . $datos['id_profesional']; ?>" class="btn btn-secondary btn-sm"><i class="fa fa-folder-open"></i> Archivar</a>
                                        <a href="<?php echo base_url() . '/CProfesional/cvprofesional/' . $datos['id_profesional']; ?>" class="btn btn-success btn-sm"><i class="fas fa-file-pdf"></i> PDF </a>
                                        <a href="<?php echo base_url() . '/CTitulado/nuevo/' . $datos['id_profesional']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Agregar Mención</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Menciones</a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Opciones</a>
                                <!-- <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Menciones</a> -->
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover text-nowrap table-bordered">
                                                <thead>
                                                <tr style="background-color: midnightblue; color: white; text-align: center;">
                                                    <th rowspan="2">Mención</th>
                                                    <th rowspan="2">Modalidad Ingreso</th>
                                                    <th colspan="3">Gestión</th>
                                                </tr>
                                                <tr style="background-color: #B0DAFF; text-align: center;">
                                                    <th>Ingreso</th>
                                                    <th>Egreso</th>
                                                    <th>Titulación</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($titulado as $datos) { ?>
                                                    <tr style="text-align: center;">
                                                        <td><?php echo $datos["mencion"]; ?></td>
                                                        <td><?php echo $datos["modalidad"]; ?></td>
                                                        <td><?php echo $datos["ingreso"]; ?></td>
                                                        <td><?php echo $datos["egreso"]; ?></td>
                                                        <td><?php echo $datos["titulacion"]; ?></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            </div>
                            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">

                                <?php foreach ($titulado as $datos) { ?>
                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <div class="card bg-light d-flex flex-fill">
                                                <div class="card-body pt-0">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <br>
                                                            <h2 class="lead"><b><?php echo $datos["mencion"]; ?> </b></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="text-right">
                                                        <div class="btn-group">
                                                            <a href="<?php echo base_url() . '/CTitulado/editar/' . $datos['id'].'/'.$datos['id_profesional']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                                                            <form class="formulario-eliminar" method="POST" action="<?php echo base_url() . '/CTitulado/eliminar_definivamente/' . $datos['id'].'/'.$datos['id_mencion'].'/'.$datos['id_profesional']; ?>" autocomplete="off">
                                                                <button type="submit" class="btn btn-sm bg-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">Ejemplo</div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="background-color: midnightblue;">
                            <h3 class="card-title" style="color: white;">INFORMACIÓN PROFESIONAL</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if ($totalformAcademica > 0) {
                            ?>
                                <h5 class="card-footer" style="background-color: #4682B4; color: white; font-family: fantasy;">FORMACIÓN ACADÉMICA</h5>
                                <?php
                                if ($totalformAcademica0 > 0) {
                                ?>
                                    <font style="font-size: 12; font-weight: bold;">Título Profesional</font>
                                    <hr style="width: 100%; text-align: left; margin-top: 0px;">
                                    <table width="100%" class="table table-bordered table-hover">
                                        <?php foreach ($formAcademica0 as $dato) { ?>
                                            <tr class="contenidoTabla">
                                                <td width="30%">
                                                    <font style="font-size: 25px;"><?php echo $dato['gestion_titulacion']; ?></font>
                                                    <br>
                                                    <?php echo $dato["ciudad"] . " - " . $dato["pais"]; ?>
                                                </td>
                                                <td>
                                                    <strong><?php echo $dato['titulo']; ?></strong>
                                                    <br>
                                                    <i><?php echo $dato["institucion_academica"]; ?></i>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table><br>
                                <?php } ?>
                                <?php
                                if ($totalformAcademica4 > 0) {
                                ?>
                                    <font style="font-size: 12; font-weight: bold;">Doctorado</font>
                                    <hr style="width: 100%; text-align: left; margin-top: 0px;">
                                    <table width="100%" class="table table-bordered table-hover">
                                        <?php foreach ($formAcademica4 as $dato) { ?>
                                            <tr class="contenidoTabla">
                                                <td width="30%">
                                                    <font style="font-size: 25px;"><?php echo $dato['gestion_titulacion']; ?></font>
                                                    <br>
                                                    <?php echo $dato["ciudad"] . " - " . $dato["pais"]; ?>
                                                </td>
                                                <td>
                                                    <strong><?php echo $dato['titulo']; ?></strong>
                                                    <br>
                                                    <i><?php echo $dato["institucion_academica"]; ?></i>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table><br>
                                <?php } ?>
                                <?php
                                if ($totalformAcademica1 > 0) {
                                ?>
                                    <font style="font-size: 12; font-weight: bold;">Especialidad</font>
                                    <hr style="width: 100%; text-align: left; margin-top: 0px;">
                                    <table width="100%" class="table table-bordered table-hover">
                                        <?php foreach ($formAcademica1 as $dato) { ?>
                                            <tr class="contenidoTabla">
                                                <td width="30%">
                                                    <font style="font-size: 25px;"><?php echo $dato['gestion_titulacion']; ?></font>
                                                    <br>
                                                    <?php echo $dato["ciudad"] . " - " . $dato["pais"]; ?>
                                                </td>
                                                <td>
                                                    <strong><?php echo $dato['titulo']; ?></strong>
                                                    <br>
                                                    <i><?php echo $dato["institucion_academica"]; ?></i>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table><br>
                                <?php } ?>
                                <?php
                                if ($totalformAcademica2 > 0) {
                                ?>
                                    <font style="font-size: 12; font-weight: bold;">Maestría</font>
                                    <hr style="width: 100%; text-align: left; margin-top: 0px;">
                                    <table width="100%" class="table table-bordered table-hover">
                                        <?php foreach ($formAcademica2 as $dato) { ?>
                                            <tr>
                                                <td width="30%">
                                                    <font style="font-size: 25px;"><?php echo $dato['gestion_titulacion']; ?></font>
                                                    <br>
                                                    <?php echo $dato["ciudad"] . " - " . $dato["pais"]; ?>
                                                </td>
                                                <td>
                                                    <strong><?php echo $dato['titulo']; ?></strong>
                                                    <br>
                                                    <i><?php echo $dato["institucion_academica"]; ?></i>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table><br>
                                <?php } ?>
                                <?php
                                if ($totalformAcademica3 > 0) {
                                ?>
                                    <font style="font-size: 12; font-weight: bold;">Diplomado</font>
                                    <hr style="width: 100%; text-align: left; margin-top: 0px;">
                                    <table width="100%" class="table table-bordered table-hover">
                                        <?php foreach ($formAcademica3 as $dato) { ?>
                                            <tr class="contenidoTabla">
                                                <td width="30%">
                                                    <font style="font-size: 25px;"><?php echo $dato['gestion_titulacion']; ?></font>
                                                    <br>
                                                    <?php echo $dato["ciudad"] . " - " . $dato["pais"]; ?>
                                                </td>
                                                <td>
                                                    <strong><?php echo $dato['titulo']; ?></strong>
                                                    <br>
                                                    <i><?php echo $dato["institucion_academica"]; ?></i>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table><br>
                                <?php } ?>
                            <?php
                            }
                            ?>
                            <?php
                            if ($totalexpLaboral > 0) {
                            ?>
                                <h5 class="card-footer" style="background-color: #4682B4; color: white; font-family: fantasy;">EXPERIENCIA LABORAL</h5>
                                <table width="100%" class="table table-bordered table-hover">
                                    <?php foreach ($expLaboral as $dato) { ?>
                                        <tr>
                                            <td width="30%">
                                                <strong>Desde: </strong>
                                                <font style="font-size: 12;">
                                                    <?php
                                                    $desde = $dato["desde"];
                                                    $fechadesde = new DateTime($desde);
                                                    echo $fechadesde->format("d/m/Y"); ?>
                                                </font>
                                                <br>
                                                <strong>Hasta:</strong>
                                                <font style="font-size: 12;">
                                                    <?php
                                                    $hasta = $dato["hasta"];
                                                    $fechahasta = new DateTime($hasta);
                                                    echo $fechahasta->format("d/m/Y"); ?>
                                                </font>
                                                <br>
                                                <?php echo $dato["ciudad"] . " - " . $dato["pais"]; ?>
                                            </td>
                                            <td>
                                                <strong><?php echo $dato['empresa_institucion']; ?></strong>
                                                <br>
                                                <strong style="font-size: 10;">Cargo: </strong><i><?php echo $dato["cargo"]; ?></i>
                                                <br>
                                                <strong style="font-size: 10;">Funciones desempeñadas: </strong><?php echo $dato["actividades"]; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table><br>
                            <?php } ?>
                            <?php
                            if ($totalDocente > 0) {
                            ?>
                                <h5 class="card-footer" style="background-color: #4682B4; color: white; font-family: fantasy;">EXPERIENCIA DOCENTE</h5>
                                <table width="100%" class="table table-bordered table-hover">
                                    <?php foreach ($datDocente as $dato) { ?>
                                        <tr class="contenidoTabla">
                                        <td width="30%">
                                                <strong>Desde: </strong>
                                                <font style="font-size: 12;">
                                                    <?php
                                                    $desde = $dato["desde"];
                                                    $fechadesde = new DateTime($desde);
                                                    echo $fechadesde->format("d/m/Y"); ?>
                                                </font>
                                                <br>
                                                <strong>Hasta:</strong>
                                                <font style="font-size: 12;">
                                                    <?php
                                                    $hasta = $dato["hasta"];
                                                    $fechahasta = new DateTime($hasta);
                                                    echo $fechahasta->format("d/m/Y"); ?>
                                                </font>
                                                <br>
                                                <?php echo $dato["ciudad"] . " - " . $dato["pais"]; ?>
                                            </td>
                                            <td>
                                                <strong><?php echo $dato['universidad']; ?></strong>
                                                <br>
                                                <strong style="font-size: 10;">Materia: </strong><i><?php echo $dato["materia"]; ?></i>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table><br>
                            <?php } ?>
                            <?php
                            if ($totalEvento0 > 0) {
                            ?>
                                <h5 class="card-footer" style="background-color: #4682B4; color: white; font-family: fantasy;">CURSO(S)</h5>
                                <table width="100%" class="table table-bordered table-hover">
                                    <?php foreach ($evento0 as $dato) { ?>
                                        <tr class="contenidoTabla">
                                            <td width="30%">
                                                <strong>Fecha:</strong>
                                                <font style="font-size: 12;">
                                                    <font style="font-size: 12;">
                                                        <?php
                                                        $desde = $dato["inicio"];
                                                        $fechadesde = new DateTime($desde);
                                                        echo $fechadesde->format("d/m/Y"); ?>
                                                    </font>
                                                    <br>
                                                    <?php
                                                    if ($dato["fin"] != "0000-00-00") {
                                                    ?>
                                                        <strong>Hasta:</strong>&nbsp;&nbsp;<font style="font-size: 12;">
                                                            <?php
                                                            $hasta = $dato["fin"];
                                                            $fechahasta = new DateTime($hasta);
                                                            echo $fechahasta->format("d/m/Y"); ?>
                                                        </font>
                                                    <?php } ?>
                                                    <br>
                                                    <?php echo $dato["ciudad"] . " - " . $dato["pais"]; ?>
                                            </td>
                                            <td>
                                                <strong><?php echo $dato['tema']; ?></strong>
                                                <br>
                                                <strong style="font-size: 10;"></strong><i><?php echo $dato["institucion"]; ?></i>
                                                <br>
                                                <strong style="font-size: 10;">Modalidad de asistencia: </strong><i><?php echo $dato["modalidad"]; ?></i>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table><br>
                            <?php } ?>
                            <?php
                            if ($totalEvento1 > 0) {
                            ?>
                                <h5 class="card-footer" style="background-color: #4682B4; color: white; font-family: fantasy;">SEMINARIO(S)</h5>
                                <table width="100%" class="table table-bordered table-hover">
                                    <?php foreach ($evento1 as $dato) { ?>
                                        <tr class="contenidoTabla">
                                            <td width="30%">
                                                <strong>Fecha:</strong>
                                                <font style="font-size: 12;">
                                                    <font style="font-size: 12;">
                                                        <?php
                                                        $desde = $dato["inicio"];
                                                        $fechadesde = new DateTime($desde);
                                                        echo $fechadesde->format("d/m/Y"); ?>
                                                    </font>
                                                    <br>
                                                    <?php
                                                    if ($dato["fin"] != "0000-00-00") {
                                                    ?>
                                                        <strong>Hasta:<font style="font-size: 12;">
                                                                <?php
                                                                $hasta = $dato["fin"];
                                                                $fechahasta = new DateTime($hasta);
                                                                echo $fechahasta->format("d/m/Y"); ?>
                                                            </font>
                                                        <?php } ?>
                                                        <br>
                                                        <?php echo $dato["ciudad"] . " - " . $dato["pais"]; ?>
                                            </td>
                                            <td>
                                                <strong><?php echo $dato['tema']; ?></strong>
                                                <br>
                                                <strong style="font-size: 10;"></strong><i><?php echo $dato["institucion"]; ?></i>
                                                <br>
                                                <strong style="font-size: 10;">Modalidad de asistencia: </strong><i><?php echo $dato["modalidad"]; ?></i>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table><br>
                            <?php } ?>
                            <?php
                            if ($totalEvento2 > 0) {
                            ?>
                                <h5 class="card-footer" style="background-color: #4682B4; color: white; font-family: fantasy;">CONGRESO(S)</h5>
                                <table width="100%" class="table table-bordered table-hover">
                                    <?php foreach ($evento2 as $dato) { ?>
                                        <tr class="contenidoTabla">
                                            <td width="30%">
                                                <strong>Fecha:</strong>
                                                <font style="font-size: 12;">
                                                    <font style="font-size: 12;">
                                                        <?php
                                                        $desde = $dato["inicio"];
                                                        $fechadesde = new DateTime($desde);
                                                        echo $fechadesde->format("d/m/Y"); ?>
                                                    </font>
                                                    <br>
                                                    <?php
                                                    if ($dato["fin"] != "0000-00-00") {
                                                    ?>
                                                        <strong>Hasta:</strong>
                                                        <font style="font-size: 12;">
                                                            <?php
                                                            $hasta = $dato["fin"];
                                                            $fechahasta = new DateTime($hasta);
                                                            echo $fechahasta->format("d/m/Y"); ?>
                                                        </font>
                                                    <?php } ?>
                                                    <br>
                                                    <?php echo $dato["ciudad"] . " - " . $dato["pais"]; ?>
                                            </td>
                                            <td>
                                                <strong><?php echo $dato['tema']; ?></strong>
                                                <br>
                                                <strong style="font-size: 10;"></strong><i><?php echo $dato["institucion"]; ?></i>
                                                <br>
                                                <strong style="font-size: 10;">Modalidad de asistencia: </strong><i><?php echo $dato["modalidad"]; ?></i>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table><br>
                            <?php } ?>
                            <?php
                            if ($totalPublicacion > 0) {
                            ?>
                                <h5 class="card-footer" style="background-color: #4682B4; color: white; font-family: fantasy;">PUBLICACIONES</h5>
                                <table width="100%" class="table table-bordered table-hover">
                                    <?php foreach ($publicacion as $dato) { ?>
                                        <tr class="contenidoTabla">
                                            <td width="30%">
                                                <font style="font-size: 25px;"><?php echo $dato['anio_publicacion']; ?></font>
                                                <br>
                                                <?php echo $dato["ciudad"] . " - " . $dato["pais"]; ?>
                                            </td>
                                            <td>
                                                <strong><?php echo $dato['titulo']; ?></strong>
                                                <br>
                                                <strong style="font-size: 10;">Tipo publicación: </strong><?php echo $dato["tipo"]; ?>
                                                <br>
                                                <?php
                                                if ($dato["nombre_revista"] != null) {
                                                ?>
                                                    <strong style="font-size: 10;">Nombre Revista: </strong><?php echo $dato["nombre_revista"]; ?>
                                                    <br>
                                                <?php } ?>
                                                <strong style="font-size: 10;">Colaboración: </strong><i><?php echo $dato["colaboracion"]; ?></i>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table><br>
                            <?php } ?>
                            <?php
                            if ($totalDistincion > 0) {
                            ?>
                                <h5 class="card-footer" style="background-color: #4682B4; color: white; font-family: fantasy;">PREMIOS Y DISTINCIONES</h5>
                                <table width="100%" class="table table-bordered table-hover">
                                    <?php foreach ($distincion as $dato) { ?>
                                        <tr class="contenidoTabla">
                                            <td width="30%">
                                                <font style="font-size: 20px;">
                                                    <?php
                                                    $desde = $dato["fecha"];
                                                    $fechadesde = new DateTime($desde);
                                                    echo $fechadesde->format("d/m/Y"); ?>
                                                </font>
                                                <br>
                                                <?php echo $dato["ciudad"] . " - " . $dato["pais"]; ?>
                                            </td>
                                            <td>
                                                <strong><?php echo $dato['nombre']; ?></strong>
                                                <br>
                                                <strong style="font-size: 10;"></strong><i><?php echo $dato["institucion"]; ?></i>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table><br>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>