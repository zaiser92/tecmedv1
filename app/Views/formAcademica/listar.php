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
                    <div>
                        <p>
                            <a href="<?php echo base_url(); ?>/CFormAcademica/nuevo" class="btn btn-success"><i class='fas fa-plus'></i> Agregar</a>
                        </p>
                    </div>
                    <table id="DataTableUsuario" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-primary">
                                <th width="5%"></th>
                                <th width="5%">Año</th>
                                <th>Tipo</th>
                                <th>Titulo</th>
                                <th>Institución Académica</th>
                                <th>Ciudad - Pais</th>
                                <th width="1%">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $dato['gestion_titulacion']; ?></td>
                                    <td><?php
                                        if ($dato['tipo'] == 0) {
                                            echo "Título Profesional";
                                        } elseif ($dato['tipo'] == 1) {
                                            echo "Especialidad";
                                        } elseif ($dato['tipo'] == 2) {
                                            echo "Maestría";
                                        } elseif ($dato['tipo'] == 3) {
                                            echo "Diplomado";
                                        }elseif ($dato['tipo'] == 4) {
                                            echo "Doctorado";
                                        }
                                        ?></td>
                                    <td><?php echo $dato['titulo']; ?></td>
                                    <td><?php echo $dato['institucion_academica']; ?></td>
                                    <td><?php echo $dato['ciudad'] . " - " . $dato['pais']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url() . '/CFormAcademica/editar/' . base64_encode($dato['id']); ?>" class="btn btn-app bg-warning"><i class="fas fa-edit"></i>Editar</a>
                                            <form class="formulario-eliminar" method="POST" action="<?php echo base_url() . '/CFormAcademica/eliminar_definivamente/' . $dato['id']; ?>" autocomplete="off">
                                                <button type="submit" class="btn btn-app bg-danger"><i class="fas fa-trash-alt"></i>Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>