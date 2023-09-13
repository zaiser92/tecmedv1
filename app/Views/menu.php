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

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Graficas -->
  <script src="<?php echo base_url(); ?>/assets/plugins/chart.js/Chart.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <?php echo $user_session->nombres; ?>&nbsp;&nbsp;<i class="far fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">PERFIL USUARIO</span>
            <div class="dropdown-divider"></div>
            <?php
            if ((($user_session->id_rol) == "1") || (($user_session->id_rol) == "2")) {
            ?>
              <a href="<?php echo base_url() . '/CAdministrador/perfil/' . base64_encode($user_session->id_administrador); ?>" class="dropdown-item">
                <i class="far fa-id-card mr-2"></i> Actualizar Datos
              </a>
            <?php
            } elseif (($user_session->id_rol) == "3") {
            ?>
              <a href="<?php echo base_url() . '/CProfesional/perfil/' . base64_encode($user_session->id_profesional); ?>" class="dropdown-item">
                <i class="far fa-id-card mr-2"></i> Actualizar Datos
              </a>
            <?php
            }
            ?>
            <div class="dropdown-divider"></div>
            <?php
            if ((($user_session->id_rol) == "1") || (($user_session->id_rol) == "2")) {
            ?>
              <a href="<?php echo base_url() . '/CAdministrador/act_password/' . base64_encode($user_session->id_administrador); ?>" class="dropdown-item">
                <i class="fas fa-key"></i> Cambiar Contraseña
              </a>
            <?php
            } elseif (($user_session->id_rol) == "3") {
            ?>
              <a href="<?php echo base_url() . '/CProfesional/act_password/' . base64_encode($user_session->id_profesional); ?>" class="dropdown-item">
                <i class="fas fa-key mr-2"></i> Cambiar Contraseña
              </a>
            <?php
            }
            ?>
            <div class="dropdown-divider"></div>
            <a href="<?php echo base_url(); ?>/Usuarios/logout" class="dropdown-item">
              <i class="fas fa-door-open mr-2"></i> Cerrar Sesion
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: midnightblue;">
      <!-- Brand Logo -->
      <a class="brand-link" href="<?php echo base_url(); ?>/Usuarios">
        <img src="<?php echo base_url(); ?>/assets/dist/img/logotecmed.png" alt="logotecmed" class="brand-image img-circle elevation-3" style="opacity: 2.8">
        <span class="brand-text font-weight-light">Sistema <b class="text-warning">TECMED</b></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- SidebarSearch Form -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php
            if (($user_session->id_rol) == "1") {
            ?>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>/CAdministrador" class="nav-link">
                  <i class="nav-icon fas fa-user-tie"></i>
                  <p>&nbsp;Administradores</p>
                </a>
              </li>
            <?php
            }
            ?>
            <?php
            if ((($user_session->id_rol) == "1") || (($user_session->id_rol) == "2")) {
            ?>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>/CProfesional" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>&nbsp;Profesionales</p>
                </a>
              </li>
            <?php
            }
            ?>

            <?php
            if ((($user_session->id_rol) == "1") || (($user_session->id_rol) == "2")) {
            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-bullhorn "></i>
                  <p>
                    Avisos
                    <i class="right fas fa-angle-left" style="color: gold;"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/CNoticias" class="nav-link">
                      <i class="far fa-circle nav-icon" style="color: yellow;"></i>
                      <p>Noticias/Comunicados</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/CConvDocencia" class="nav-link">
                      <i class="far fa-circle nav-icon" style="color: yellow;"></i>
                      <p>Convocatoria Docencia</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/CSeminario" class="nav-link">
                      <i class="far fa-circle nav-icon" style="color: yellow;"></i>
                      <p>Curso de Formación</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php
            } elseif (($user_session->id_rol) == "3") {
            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-clipboard-list"></i>
                  <p>
                    Avisos
                    <i class="right fas fa-angle-left" style="color: gold;"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/CNoticias/vistaProfesionales" class="nav-link">
                      <i class="far fa-circle nav-icon" style="color: yellow;"></i>
                      <p>Noticias/Comunicados</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/CConvDocencia/vistaProfesionales" class="nav-link">
                      <i class="far fa-circle nav-icon" style="color: yellow;"></i>
                      <p>Convocatoria Docencia</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url() ; ?>/CSeminario/vistaProfesionales" class="nav-link">
                      <i class="far fa-circle nav-icon" style="color: yellow;"></i>
                      <p>Curso de Formación</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php
            }
            ?>
            <?php
            if ((($user_session->id_rol) == "1") || (($user_session->id_rol) == "2")) {
            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                    Reportes
                    <i class="right fas fa-angle-left" style="color: gold;"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/CReportes/ingreso" class="nav-link">
                      <i class="far fa-circle nav-icon" style="color: yellow;"></i>
                      <p>Ingreso</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/CReportes/titulacion" class="nav-link">
                      <i class="far fa-circle nav-icon" style="color: yellow;"></i>
                      <p>Titulación</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/CReportes/genero" class="nav-link">
                      <i class="far fa-circle nav-icon" style="color: yellow;"></i>
                      <p>Género</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php
            }
            ?>
            <?php
            if ((($user_session->id_rol) == "1") || (($user_session->id_rol) == "2")) {
            ?>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>/CEstadisticas" class="nav-link">
                  <i class="nav-icon fas fa-chart-bar"></i>
                  <p>
                    Estadisticas
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>/CEstadisticasAcademicas" class="nav-link">
                  <i class="nav-icon fa fa-chart-pie"></i>
                  <p>
                    Experiencia Académica
                  </p>
                </a>
              </li>
            <?php
            }
            ?>
            <?php
            if (($user_session->id_rol) == "3") {
            ?>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>/CTitulado" class="nav-link">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>
                    Menciones
                  </p>
                </a>
              </li>
            <?php
            }
            ?>
            <?php
            if (($user_session->id_rol) == "3") {
            ?>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>/CProfesional/CurriculumPDF" class="nav-link">
                  <i class="nav-icon far fa-id-card"></i>
                  <p>
                    Hoja de Vida
                  </p>
                </a>
              </li>
            <?php
            }
            ?>
            <?php
            if (($user_session->id_rol) == "3") {
            ?>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>/CFormAcademica" class="nav-link">
                  <i class="nav-icon fas fa-user-graduate"></i>
                  <p>
                    Formación Académica
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>/CExpLaboral" class="nav-link">
                  <i class="nav-icon fas fa-briefcase"></i>
                  <p>
                    Experiencia Laboral
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>/CExpDocente" class="nav-link">
                  <i class="nav-icon fas fa-chalkboard-teacher"></i>
                  <p>
                    Experiencia Docente
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>/CEventos" class="nav-link">
                  <i class="nav-icon fas fa-calendar-check"></i>
                  <p>
                    Eventos Asistidos
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>/CPublicaciones" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Publicaciones
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>/CPremios" class="nav-link">
                  <i class="nav-icon fas fa-award"></i>
                  <p>
                    Premios y Distinciones
                  </p>
                </a>
              </li>
            <?php
            }
            ?>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>/Usuarios/logout" class="nav-link">
                <i class="nav-icon fas fa-door-open"></i>
                <p>
                  Salir
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>