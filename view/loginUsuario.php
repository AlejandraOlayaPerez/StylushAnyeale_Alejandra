<?php
//si no esta definida o no tiene valor e redirige al login
//en caso contrario no hace nada

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
  <?php require_once 'linkHead.php'; ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <input class="form-control" type="email" name="correoElectronico" value="">
          <label for="">Contraseña</label>
          <input class="form-control" type="password" name="contrasena" autocomplete="FALSE">
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


<?php require_once 'linkFooter.php'; ?>

</html>