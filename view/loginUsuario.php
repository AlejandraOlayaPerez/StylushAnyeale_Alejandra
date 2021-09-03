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
  <link rel="stylesheet" href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/font-css.css">
  <link rel="stylesheet" href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
  <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="http://localhost/Anyeale_proyecto/StylushAnyeale_Alejandra/assests/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" type="image/x-icon">
  <title>Iniciar sesion</title>
</head>
<?php
require_once '../controller/mensajeController.php';

if (isset($_GET['mensaje'])) {
  $oMensaje = new mensajes();
  echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
}
?>

<body class="hold-transition login-page" style="background-color: rgb(249, 201, 242);">
  <div class="login-box">
    <div class="login-logo">

    </div>
    <div class="card" style="background-color: rgb(119, 167, 191); border: rgb(249, 201, 242) 5px dashed; box-shadow: 10px 5px 5px #ffffff;">
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

</html>