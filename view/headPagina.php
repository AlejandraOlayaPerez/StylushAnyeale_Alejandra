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
//Si la pagina requiere sesion y no inice sesion lo devuelve a loginç

if ($oPagina->requireSession and !isset($_SESSION['idUser'])) {
  // echo "<script>alert('no tiene permiso');</script>";
  header("location: ../view/loginUsuario.php");
  die(); // es para recomendado cuando se hace una rederecion, destruir o cerrar la pagina actual.
} elseif ($oPagina->requireSession and isset($_SESSION['idUser'])) {
  //iniciar session
  $oGestionController->verificarPermisoUrl($url);
}
?>
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
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="shortcut icon" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" type="image/x-icon">
  <title>Stylush Anyeale</title>
</head>



<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-black navbar-dark">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="../controller/usuarioController.php?funcion=cerrarSesion" class="nav-link">
            <p><i class="fas fa-power-off"></i> Cerrar Sesion</p>
          </a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="anyeale_proyecto/StylushAnyeale_Alejandra/view/paginaPrincipalGerente.php" class="brand-link">
        <img src="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">INICIO</span>
      </a>

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <?php
            require_once '../controller/imagenController.php';
            $oImagenController = new imagenController();
            $oFoto = $oImagenController->listarImagenPerfilUsuario($_SESSION['idUser']);

            ?>
            <img src="../<?php echo $oFoto->fotoPerfilUsuario; ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="perfilEmpleado.php" class="d-block"><?php echo $_SESSION['nombreUser']; ?></a>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-header">MODULOS</li>
            <?php
            require_once '../controller/gestionController.php';
            $oGestionController = new gestionController();
            $oModulo = $oGestionController->mostrarModulo($_SESSION['idUser']);

            foreach ($oModulo as $registroModulo) {
            ?>
              <li class="nav-item menu">
                <a href="" class="nav-link">
                  <i class="<?php echo $registroModulo['icono']; ?>"></i>
                  <p><?php echo $registroModulo['nombreModulo']; ?></p>
                </a>
                <ul class="nav nav-treeview">
                  <?php
                  $result = $oGestionController->paginasPorModulo($registroModulo['idModulo']);
                  foreach ($result as $registro) {
                  ?>
                    <li class="nav-item">
                      <a href="/anyeale_proyecto/StylushAnyeale_Alejandra/<?php echo $registro['enlace']; ?>" class="nav-link">
                        <i class="fas fa-check-circle"></i>
                        <p><?php echo $registro['nombrePagina']; ?></p>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
              </li>
            <?php } ?>
        </nav>
      </div>
    </aside>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 style="font-family: 'Times New Roman', Times, serif; font-size: 30px; -webkit-text-fill-color: black">Stylush Anyeale</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active" style="font-family: 'Times New Roman', Times, serif; font-size:20px; -webkit-text-fill-color: black"><?php echo $url; ?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <aside class="control-sidebar control-sidebar-dark">
      </aside>

      <?php require_once 'footer.php'; ?>