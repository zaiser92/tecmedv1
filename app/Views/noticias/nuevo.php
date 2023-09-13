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
                    <form enctype="multipart/form-data" class="formulario-nuevo" method="POST" action="<?php echo base_url(); ?>/CNoticias/insertar" autocomplete="off">
                        <?php csrf_field(); ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Código</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-shield-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo set_value('codigo') ?>" autofocus>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('codigo')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('codigo') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mención</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                                            </div>
                                            <select name="mencion" id="mencion" class="form-control">
                                                <option value="">Seleccionar Mención</option>
                                                <?php foreach ($menciones as $dato) { ?>
                                                    <option value="<?php echo $dato['id']; ?>" <?php echo set_select('mencion', $dato['id']); ?>><?php echo $dato['mencion']; ?></option>
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
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo set_value('titulo') ?>">
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
                                        <label>Referencia</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="referencia" id="referencia" value="<?php echo set_value('referencia') ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('referencia')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('referencia') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Archivo PDF <span class="breadcrumb-item active">(Peso maximo 10MB)</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-file-pdf"></i></span>
                                            </div>
                                            <input type="file" name="archivo" id="archivo" class="form-control" onchange="return validarArch()" />
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('archivo')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('archivo') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <a href="<?php echo base_url(); ?>/CNoticias" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>