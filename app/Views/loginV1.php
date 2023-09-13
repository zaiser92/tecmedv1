<?php
//ESTA VARIABLE TRAE TODA LA INFORMACION DE LA SESSION
    $user_session = session();
?>
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
    <!-- /.login-logo -->
    <div class="card card-outline card-warning bg-light">
      <div class="card-header text-center ">
        <h6 class="text-dark"><b class="text-primary">CARRERA DE TECNOLOGÍA MÉDICA</b></h6>
        <img src="<?php echo base_url(); ?>/assets/dist/img/logotecmed.png" width="20%" class="img-fluid" alt="...">
        <P>Software de Seguimiento de Egresados<?php echo $user_session->nombre; ?></P>
      </div>
      <div class="card-body">
        <form method="POST" action="<?php echo base_url(); ?>/usuarios/valida">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Usuario" name="usuario" id="usuario">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <center>
                <p class="text-danger"><?= session('error.credenciales') ?></p>
              </center>
              <button type="submit" class="btn btn-warning btn-block">INGRESAR &nbsp;<i class="fas fa-sign-in-alt" style="color: black;"></i></button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>