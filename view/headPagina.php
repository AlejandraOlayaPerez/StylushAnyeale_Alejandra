<?php
require_once 'head.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <i class="fas fa-shopping-cart"></i>
                <p>Ventas
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Ventas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Productos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Servicios</p>
                  </a>
                </li>
              </ul>
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

</body>

</html>

<?php
require_once 'footer.php';
?>