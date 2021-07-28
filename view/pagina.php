<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="" class="brand-link">
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
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fas fa-user-cog"></i>
                <p>Administrador
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Usuario</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Rol</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Modulo</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fas fa-sitemap"></i>
                <p>Cargos</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fas fa-calendar-day"></i>
                <p>Reservaciones</p>
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
                  <a href="" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Inventario</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Pedido</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Factura</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
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




    <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/chart.js/Chart.min.js"></script>
    <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/sparklines/sparkline.js"></script>
    <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/moment/moment.min.js"></script>
    <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/js/adminlte.js"></script>
    <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/js/demo.js"></script>
    <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/js/pages/dashboard.js"></script>
</body>

</html>