<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CURRICULUM VITAE</title>
    <link rel="icon" href="<?php echo base_url(); ?>/assets/dist/img/logotecmed.png">
    <style>
        @page {
            margin: 0cm 0cm;
        }

        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        .titulos {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12;
            text-align: center;
            font-weight: bold;
        }

        .subtitulos {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12;
            text-align: left;
            font-weight: bold;
        }

        .sub {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12;
            text-align: left;
            font-weight: bold;
        }

        .titulosTabla {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12;
            text-align: center;
            font-weight: bold;
            background-color: lightgray;
        }

        .contenidoTabla {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12;
            text-align: left;
        }
    </style>
</head>

<body>
    <p class="titulos"><?php echo $titulo; ?></p>

    <p class="subtitulos">DATOS PERSONALES</p>
    <hr style="margin-top: -15px; height: 1px; background-color: black;">
    <table border="0" width="100%">
        <tr>
            <td rowspan="7" width="1%">
                <?php
                if ($dat["img_profesional"] == "") {
                ?>
                    <center><img src="<?php echo base_url(); ?>/assets/dist/img/usuario.jpg" width="170" height="170"></center>

                <?php
                } else {
                ?>
                    <center><img src="<?php echo base_url(); ?>/assets/dist/img/usuario/<?php echo $dat["img_profesional"]; ?>" width="170" height="170" /></center>
                <?php
                }
                ?>
            </td>
            <td rowspan="7" width="5%"></td>
            <td width="23%" class="sub">Nombres:</td>
            <td><?php echo $dat['nombres']; ?></td>
        </tr>
        <tr>
            <td class="sub">Apellidos:</td>
            <td><?php echo $dat['ap_paterno'] . " " . $dat['ap_materno']; ?></td>
        </tr>
        <tr>
            <td class="sub">Cédula de Identidad: </td>
            <td><?php echo $dat['cedula']; ?></td>
        </tr>
        <tr>
            <td class="sub">Nacionalidad:</td>
            <td><?php echo $dat['nacionalidad']; ?></td>
        </tr>
        <tr>
            <td class="sub">Domicilio:</td>
            <td><?php echo $dat['ciudad'].", ".$dat['domicilio']; ?></td>
        </tr>
        <tr>
            <td class="sub">Teléfono – Celular:</td>
            <td><?php echo $dat['celular']; ?></td>
        </tr>
        <tr>
            <td class="sub">E-mail:</td>
            <td><?php echo $dat['email']; ?></td>
        </tr>
    </table>

    <?php
    if ($totalformAcademica > 0) {
    ?>
        <p class="subtitulos">FORMACIÓN ACADÉMICA</p>
        <hr style="margin-top: -15px; height: 1px; background-color: black;">
        <?php
        if ($totalformAcademica0 > 0) {
        ?>
            <font style="font-size: 12; font-weight: bold;">Título Profesional</font>
            <hr style="width: 100%; text-align: left; margin-top: 0px;">
            <table width="100%">
                <?php foreach ($formAcademica0 as $dato) { ?>
                    <tr class="contenidoTabla">
                        <td width="30%">
                            <font style="font-size: 16;"><?php echo $dato['gestion_titulacion']; ?></font>
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
            <table width="100%">
                <?php foreach ($formAcademica4 as $dato) { ?>
                    <tr class="contenidoTabla">
                        <td width="30%">
                            <font style="font-size: 16;"><?php echo $dato['gestion_titulacion']; ?></font>
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
            <table width="100%">
                <?php foreach ($formAcademica1 as $dato) { ?>
                    <tr class="contenidoTabla">
                        <td width="30%">
                            <font style="font-size: 16;"><?php echo $dato['gestion_titulacion']; ?></font>
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
            <table width="100%">
                <?php foreach ($formAcademica2 as $dato) { ?>
                    <tr class="contenidoTabla">
                        <td width="30%">
                            <font style="font-size: 16;"><?php echo $dato['gestion_titulacion']; ?></font>
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
            <table width="100%">
                <?php foreach ($formAcademica3 as $dato) { ?>
                    <tr class="contenidoTabla">
                        <td width="30%">
                            <font style="font-size: 16;"><?php echo $dato['gestion_titulacion']; ?></font>
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
        <p class="subtitulos">EXPERIENCIA LABORAL</p>
        <hr style="margin-top: -15px; height: 1px; background-color: black;">
        <table width="100%">
            <?php foreach ($expLaboral as $dato) { ?>
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
                        <strong>Hasta:&nbsp;</strong>&nbsp;&nbsp;<font style="font-size: 12;">
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
                <br>
            <?php } ?>
        </table>
    <?php } ?>

    <?php
    if ($totalDocente > 0) {
    ?>
        <p class="subtitulos">EXPERIENCIA DOCENTE</p>
        <hr style="margin-top: -15px; height: 1px; background-color: black;">
        <table width="100%">
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
                        <strong>Hasta:&nbsp;</strong>&nbsp;&nbsp;<font style="font-size: 12;">
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
                <br>
            <?php } ?>
        </table>
    <?php } ?>

    <?php
    if ($totalEvento0 > 0) {
    ?>
        <p class="subtitulos">CURSO(S)</p>
        <hr style="margin-top: -15px; height: 1px; background-color: black;">
        <table width="100%">
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
                        <strong style="font-size: 10;">Modalidad: </strong><i><?php echo $dato["modalidad"]; ?></i>
                    </td>
                </tr>
                <br>
            <?php } ?>
        </table>
    <?php } ?>
    <?php
    if ($totalEvento1 > 0) {
    ?>
        <p class="subtitulos">SEMINARIO(S)</p>
        <hr style="margin-top: -15px; height: 1px; background-color: black;">
        <table width="100%">
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
                <br>
            <?php } ?>
        </table>
    <?php } ?>
    <?php
    if ($totalEvento2 > 0) {
    ?>
        <p class="subtitulos">CONGRESO(S)</p>
        <hr style="margin-top: -15px; height: 1px; background-color: black;">
        <table width="100%">
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
                <br>
            <?php } ?>
        </table>
    <?php } ?>
    <?php
    if ($totalPublicacion > 0) {
    ?>
        <p class="subtitulos">PUBLICACIONES</p>
        <hr style="margin-top: -15px; height: 1px; background-color: black;">
        <table width="100%">
            <?php foreach ($publicacion as $dato) { ?>
                <tr class="contenidoTabla">
                    <td width="30%">
                        <font style="font-size: 16;"><?php echo $dato['anio_publicacion']; ?></font>
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
                <br>
            <?php } ?>
        </table>
    <?php } ?>
    <?php
    if ($totalDistincion > 0) {
    ?>
        <p class="subtitulos">PREMIOS Y DISTINCIONES</p>
        <hr style="margin-top: -15px; height: 1px; background-color: black;">
        <table width="100%">
            <?php foreach ($distincion as $dato) { ?>
                <tr class="contenidoTabla">
                    <td width="30%">
                        <font style="font-size: 15;">
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
                <br>
            <?php } ?>
        </table>
    <?php } ?>
</body>

</html>