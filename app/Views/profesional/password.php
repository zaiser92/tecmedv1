<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid"></div>
    </div>
    <center>
        <div class="content">
            <div class="login-box">
                <div class="card card-danger ">
                    <div class="card-header text-center ">
                        <h6><b>CAMBIAR CONTRASEÑA</b></h6>
                        <img src="<?php echo base_url(); ?>/assets/dist/img/password.png" width="30%" class="img-fluid" alt="...">
                        <p>La nueva Contraseña debe llevar:</p>
                        <ul>
                            <li style="text-align: left;">8 Caracteres Mínimo con</li>
                            <li style="text-align: left;">1 Letra Mayúscula</li>
                            <li style="text-align: left;">1 Letra Mínuscula</li>
                            <li style="text-align: left;">1 Número</li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo base_url(); ?>/CProfesional/cambia_password_prof">
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Nueva Contraseña" name="password" id="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Repita su Contraseña" name="repassword" id="repassword">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <center>
                                        <p class="text-danger"><?= session('error.password') ?></p>
                                    </center>
                                    <button type="submit" class="btn btn-success btn-block">CAMBIAR</button>
                                    <a href="<?php echo base_url(); ?>/Usuarios" class="btn btn-danger btn-block">CANCELAR</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </center>
</div>