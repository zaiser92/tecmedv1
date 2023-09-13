<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema TECMED</title>
    <link rel="icon" href="<?php echo base_url(); ?>/assets/dist/img/logotecmed.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body class="hold-transition login-page" style="background-color: midnightblue;">
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
                <form method="POST" action="<?php echo base_url(); ?>/Usuarios/cambia_password_1">
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
                            <button type="submit" class="btn btn-warning btn-block">INGRESAR &nbsp;<i class="fas fa-sign-in-alt" style="color: black;"></i></button>
                            <a href="<?php echo base_url(); ?>/Usuarios/logout" class="btn btn-danger btn-block">CANCELAR</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
</body>

</html>