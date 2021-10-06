<?php
//si no esta definida o no tiene valor e redirige al login
//en caso contrario no hace nada

require_once '../model/usuario.php';
$oUsuario = new usuario();

session_start();
if (isset($_SESSION['idUser'])) {
  header("location: paginaPrincipalGerente.php");
  die(); // es para recomendado cuando se hace una rederigir, destruir o cerrar la pagina actual.
}

if (isset($_POST['correoElectronico']) != "") {
  require_once '../controller/usuarioController.php';
  $oUsuarioController = new usuarioController();
  $oUsuario = $oUsuarioController->iniciarSesion();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/font-css.css">
  <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/css/adminlte.min.css">
  <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assests/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" type="image/x-icon">
  <title>Iniciar sesion</title>
</head>


<body class="hold-transition login-page" style="background-color: rgba(255, 255, 204, 255)">
  <div class="login-box">
    <div class="login-logo">

    </div>
    <div class="card" style="background-color: rgb(119, 167, 191); border: rgb(255, 255, 204, 255) 5px dashed; ; box-shadow: 20px 20px 20px black;">
      <div class="card-body">
        <div class="col text-center">
          <img class="img-circle elevation-2" src="../image/PNG_LOGO.png" width="40%">
        </div>
        <br>
        <p class="login-box-msg">Inicia sesión para continuar</p>

        <form action="" method="POST">
          <label for="">Correo electronico</label>
          <input class="form-control" type="email" name="correoElectronico" value="<?php echo $oUsuario->correoElectronico; ?>">
          <label for="">Contraseña</label>
          <input class="form-control" type="password" name="contrasena">
          <br>
          <p class="mb-1">
            <a href="../USUARIO/formularioRecuperar.php" style="-webkit-text-fill-color: black;">¿Olvidó su contraseña?</a>
          </p>
          <br>
          <button type="submit" class="btn btn-success" name="funcion" value="iniciarSesion"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</button>
          <a type="button" href="paginaPrincipalCliente.php" class="btn btn-dark float-right"><i class="fas fa-home"></i> Volver al inicio</a>
        </form>

      </div>
    </div>
  </div>
</body>



<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery/jquery.min.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/js/adminlte.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/popper.min.js"></script>


<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/sparklines/sparkline.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/moment/moment.min.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/toastr/toastr.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fullcalendar/main.js"></script>

<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/bootstrap.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/mensajeController.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  <?php
  require_once '../controller/mensajeController.php';

  if (isset($_GET['mensaje'])) {
    $oMensaje = new mensajes();
    echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
  }
  ?>
</script>
</html>