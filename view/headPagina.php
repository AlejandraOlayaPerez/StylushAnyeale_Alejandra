<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bs-stepper/css/bs-stepper.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assests/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="shortcut icon" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" type="image/x-icon">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assests/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/sweetalert2/sweetalert2.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="background-color: rgba(255, 255, 204, 255);">
  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-black navbar-dark">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <h1 style="font-family: 'Times New Roman', Times, serif; font-size: 50px; -webkit-text-fill-color: rgb(249, 201, 242);">Stylush Anyeale</h1>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/home/paginaPrincipalGerente.php" class="brand-link">
        <img src="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">INICIO</span>
      </a>

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <!-- <div class="image">
            <img src="" class="img-circle elevation-2" alt="User Image">
          </div> -->
          <div class="info">
            <a href="#" class="d-block">perfilEmpleado</a>
          </div>
        </div>


        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
              <a href="" class="nav-link">
                <i class="fas fa-user-cog"></i>
                <p>Configuraciones
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/configuracionPerfil.php" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Perfil</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/listarUsuario.php" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Usuario</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/listarRol.php" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Rol</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/listarModulo.php" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Modulo</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/listarCargo.php" class="nav-link">
                <i class="fas fa-sitemap"></i>
                <p>Cargos</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/mostrarReservacion.php" class="nav-link">
                <i class="fas fa-calendar-day"></i>
                <p>Reservaciones</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/listarProducto.php" class="nav-link">
                <i class="fas fa-dolly-flatbed"></i>
                <p>Productos</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/listarServicio.php" class="nav-link">
                <i class="fas fa-cash-register"></i>
                <p>Servicios</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fas fa-user-cog"></i>
                <p>Inventario
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/listarInventario.php" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Inventario</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/listarPedido.php" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Pedido</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/listarFacturas.php" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Factura</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/listarContabilidad.php" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Contabilidad</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

</body>

</html>

<?php
require_once 'footer.php';
?>