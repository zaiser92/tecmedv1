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
                    <form class="formulario-nuevo" method="POST" action="<?php echo base_url(); ?>/CPublicaciones/actualizar" autocomplete="off">
                        <input type="hidden" value="<?php echo $datos['id']; ?>" name="id" id="id" />
                        <?php csrf_field(); ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 d-flex align-items-center justify-content-center">
                                    <div class="form-group">
                                        <label for="tipo" class="form-label">Tipo<font style="color: red;">*</font></label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-primary" type="radio" id="libro" name="tipo" value="libro" <?php if ($datos['tipo'] == 'libro') echo 'checked'; ?>>
                                            <label for="libro" class="custom-control-label">Libro</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-primary" type="radio" id="articulo cientifico" name="tipo" value="Artículo Científico" <?php if ($datos['tipo'] == 'Artículo Científico') echo 'checked'; ?>>
                                            <label for="articulo cientifico" class="custom-control-label">Articulo Científico</label>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('tipo')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('tipo') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6 d-flex align-items-center justify-content-center">
                                    <div class="form-group">
                                        <label for="colaboracion" class="form-label">Colaboración<font style="color: red;">*</font></label>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="autor" name="colaboracion[]" value="autor" <?php if (in_array('autor', explode(',', $datos['colaboracion']))) echo 'checked'; ?>>
                                            <label class="custom-control-label" for="autor">Autor</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="coautor" name="colaboracion[]" value="coautor" <?php if (in_array('coautor', explode(',', $datos['colaboracion']))) echo 'checked'; ?>>
                                            <label class="custom-control-label" for="coautor">Coautor</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="editor" name="colaboracion[]" value="editor" <?php if (in_array('editor', explode(',', $datos['colaboracion']))) echo 'checked'; ?>>
                                            <label class="custom-control-label" for="editor">Editor</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="revisor" name="colaboracion[]" value="revisor" <?php if (in_array('revisor', explode(',', $datos['colaboracion']))) echo 'checked'; ?>>
                                            <label class="custom-control-label" for="revisor">Revisor</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="colaborador en la investigacion" name="colaboracion[]" value="colaborador en la investigación" <?php if (in_array('colaborador en la investigación', explode(',', $datos['colaboracion']))) echo 'checked'; ?>>
                                            <label class="custom-control-label" for="colaborador en la investigacion">Colaborador en la investigación</label>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('colaboracion')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('colaboracion') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Título publicación<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lightbulb"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $datos['titulo']; ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('titulo')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('titulo') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ciudad<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="ciudad" id="ciudad" value="<?php echo $datos['ciudad']; ?>">
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
                                        <label>Pais<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="pais" id="pais" value="<?php echo $datos['pais']; ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('pais')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('pais') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Año publicación<font style="color: red;">*</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="number" class="form-control" name="anio_publicacion" id="anio_publicacion" value="<?php echo $datos['anio_publicacion']; ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('anio_publicacion')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('anio_publicacion') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre Revista<font style="color: red; font-size: 12px;"> (LLenar si publico un Artículo Científico)</font></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-newspaper"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="nombre_revista" id="nombre_revista" value="<?php echo $datos['nombre_revista']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url(); ?>/CPublicaciones" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>