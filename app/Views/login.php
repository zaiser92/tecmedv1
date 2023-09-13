<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sistema TECMED</title>
  <link rel="icon" href="<?php echo base_url(); ?>/assets/dist/img/logotecmed.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/login/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/login/vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/login/vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/login/vendor/animsition/css/animsition.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/login/vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/login/vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/login/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/login/css/main.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <meta name="robots" content="noindex, follow">
</head>

<body style="background-color: #666666;">

  <div class="limiter">
    <div class="container-login100">
      
      <div class="wrap-login100">
        
        <form style="background-color: #E6E6FA;" class="login100-form" method="POST" action="<?php echo base_url(); ?>/Usuarios/valida">
        <center>
        <img src="<?php echo base_url(); ?>/assets/dist/img/logotecmed.png" width="30%" class="img-fluid" alt="...">
          </center>
        <br><center><font style="font-size: larger;">Sistema de Seguimiento a Titulados</font></center><br>
          <div class="wrap-input100">
            <input class="input100" type="text" name="usuario" id="usuario">
            <span class="focus-input100"></span>
            <span class="label-input100"><i class="fas fa-user"></i> Nro. Carnet</span>
          </div>
          <div class="wrap-input100">
            <input class="input100" type="password" name="password" id="password" >
            <span class="focus-input100"></span>
            <span class="label-input100"><i class="fas fa-lock"></i> Contraseña</span>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
              <font style="font-size: 17px; font-weight: bold;">Ingresar&nbsp;<i class="fas fa-sign-in-alt"></i></font>
            </button>
          </div>
          <center>
            <p class="text-danger" style="font-size: 20px;"><?= session('error.credenciales') ?></p>
          </center>
        </form>
        <div class="login100-more" style="background-image: url('<?php echo base_url(); ?>/assets/login/images/fondo.jpg');">
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url(); ?>/assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/login/vendor/animsition/js/animsition.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/login/vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo base_url(); ?>/assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/login/vendor/select2/select2.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/login/vendor/daterangepicker/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/login/vendor/daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url(); ?>/assets/login/vendor/countdowntime/countdowntime.js"></script>
  <script src="<?php echo base_url(); ?>/assets/login/js/main.js"></script>
</body>

</html>