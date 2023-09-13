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
                    <form enctype="multipart/form-data" class="formulario-nuevo" method="POST" action="<?php echo base_url(); ?>/CSeminario/actualizar" autocomplete="off">
                        <input type="hidden" value="<?php echo $datos['id']; ?>" name="id" id="id" />
                        <?php csrf_field(); ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Codigo</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-shield-alt"></i></span>
                                            </div>
                                            <input type="number" class="form-control" name="codigo" id="codigo" value="<?php echo $datos['codigo']; ?>" disabled>
                                            <input type="hidden" class="form-control" name="cod" id="cod" value="<?php echo $datos['codigo']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tema</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="tema" id="tema" value="<?php echo $datos['tema']; ?>" autofocus>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('tema')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('tema') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Costo</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            </div>
                                            <input type="number" class="form-control" name="costo" id="costo" value="<?php echo $datos['costo']; ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('costo')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('costo') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Lugar</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="lugar" id="lugar" value="<?php echo $datos['lugar']; ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('lugar')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('lugar') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mencion</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                                            </div>
                                            <select name="mencion" id="mencion" class="form-control">
                                                <?php foreach ($menciones as $dato) { ?>
                                                    <option value="<?php echo $dato['id']; ?>" <?php if ($datos["id_mencion"] == $dato['id']) : ?>selected<?php endif; ?>><?php echo $dato['mencion']; ?></option>
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
                                        <label>Modalidad</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
                                            </div>
                                            <select name="modalidad" id="modalidad" class="form-control">
                                                <option value="Presencial" <?php if ($datos["modalidad"] == "Presencial") : ?>selected<?php endif; ?>>Presencial</option>
                                                <option value="Virtual" <?php if ($datos["modalidad"] == "Virtual") : ?>selected<?php endif; ?>>Virtual</option>
                                                <option value="Presencial/Virtual" <?php if ($datos["modalidad"] == "Presencial/Virtual") : ?>selected<?php endif; ?>>Presencial/Virtual</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->getError('modalidad')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('modalidad') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Archivo PDF <span class="breadcrumb-item active">(Peso maximo 10MB)</span></label>
                                        <input type="hidden" id="archAct" name="archAct" value="<?php echo $datos["archivo"] ?>">
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
                            <a href="<?php echo base_url(); ?>/CSeminario" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>