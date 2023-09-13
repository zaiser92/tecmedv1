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
                    <form method="POST" action="<?php echo base_url(); ?>/CReportes/repgenero" autocomplete="off">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label>Mención</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
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
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label>Género</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                        </div>
                                        <select name="genero" id="genero" class="form-control">
                                            <option value="">Seleccionar</option>
                                            <option value="Femenino" <?php echo set_select('genero', 'Femenino'); ?>>Femenino</option>
                                            <option value="Masculino" <?php echo set_select('genero', 'Masculino'); ?>>Masculino</option>
                                        </select>
                                    </div>
                                </div>
                                <?php if (isset($validation) && $validation->getError('genero')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('genero') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-12 col-sm-4">
                                <label>Estado</label>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="estado" value="1">
                                        <label for="customRadio1" class="custom-control-label">Activos</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-danger" type="radio" id="customRadio4" name="estado" value="0">
                                        <label for="customRadio4" class="custom-control-label">Inactivos</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-success" type="radio" id="customRadio5" name="estado" value="2">
                                        <label for="customRadio5" class="custom-control-label">Todos</label>
                                    </div>
                                </div>
                                <?php if (isset($validation) && $validation->getError('estado')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('estado') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Filtrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>