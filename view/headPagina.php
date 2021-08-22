<!DOCTYPE html>
<?php
//si no esta definida o no tiene valor e redirige al login
//en caso contrario no hace nada
$url = str_replace("/anyeale_proyecto/StylushAnyeale_Alejandra/", "", $_SERVER['REQUEST_URI']);
$url = (explode("?", $url))[0];
require_once '../controller/gestionController.php';
$oGestionController = new gestionController();
$oPagina = $oGestionController->consultarPaginaPorUrl($url);
// print_r($oPagina);
session_start();
require_once '../controller/configCrontroller.php';
//Si la pagina requiere sesion y no inice sesion lo devuelve a login
if ($oPagina->requireSession and !isset($_SESSION['idUser'])) {
  header("location: loginUsuario.php");
  die(); // es para recomendado cuando se hace una rederecion, destruir o cerrar la pagina actual.
} elseif ($oPagina->requireSession and isset($_SESSION['idUser'])) {
  //iniciar session
  // $oUsuarioController->verificarPermiso($idPagina);
  $oGestionController->verificarPermisoUrl($url);
  }
?>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bs-stepper/css/bs-stepper.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/css-font.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/ionicons.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fontawesome-free/css/all.min.css">
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
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fullcalendar/main.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bs-stepper/css/bs-stepper.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/dropzone/min/dropzone.min.css">

  <link rel="shortcut icon" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" type="image/x-icon">
</head>



<title>Stylush Anyeale</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
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
          <h4 class="nav-item" style="font-family: 'Times New Roman', Times, serif; font-size: 20px; -webkit-text-fill-color: rgb(249, 201, 242)"><?php echo $url; ?></h4>
        </li>
      </ul>
    </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/paginaPrincipalGerente.php" class="brand-link">
        <img src="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">INICIO</span>
      </a>

      <div class="sidebar">
        <nav class="mt-2">

          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <p>Hola, <?php echo $_SESSION['nombreUser']; ?></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="perfilEmpleado.php" class="nav-link">
                      <i class="fas fa-check-circle"></i>
                      <p>Perfil</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../controller/usuarioController.php?funcion=cerrarSesion" class="nav-link">
                      <i class="fas fa-check-circle"></i>
                      <p>Cerrar Sesion</p>
                    </a>
                  </li>
                </ul>
              <li>
            </div>
            <li class="nav-item menu">
              <a href="" class="nav-link">
                <i class="fas fa-user-cog"></i>
                <p>Configuraciones
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/seguimiento.php" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Seguimiento</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/listarUsuario.php" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Usuario</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/listarCliente.php" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Cliente</p>
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
              <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/cajero.php" class="nav-link">
              <i class="fas fa-money-check-alt"></i>
                <p>Cajero</p>
              </a>
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
                  <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/listarEmpresa.php" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                    <p>Empresas</p>
                  </a>
                <li class="nav-item">
                  <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/listarPedido.php?idUser=<?php echo $_SESSION['idUser']; ?>" class="nav-link">
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
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
  </div>