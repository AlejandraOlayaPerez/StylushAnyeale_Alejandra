<?php
//si no esta definida o no tiene valor e redirige al login
//en caso contrario no hace nada

session_start();
if (isset($_SESSION['idUser'])) {
  header("location: paginaprincipalgerente.php");
  die(); // es para recomendado cuando se hace una rederigir, destruir o cerrar la pagina actual.
}

if (isset($_POST['correoElectronico']) != "") {
  require_once '../controller/usuariocontroller.php';
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
  <title>Iniciar sesion</title>
</head>


<body class="hold-transition login-page" style="background-color: rgba(255, 255, 204, 255)">
  <div class="login-box">
    <div class="login-logo">

    </div>
    <div class="card" style="background-color: rgb(119, 167, 191); border: rgb(255, 255, 204, 255) 5px dashed; ; box-shadow: 20px 20px 20px black;">
      <div class="card-body">
        <div class="col text-center">
          <img class="img-circle elevation-2" src="../image/logo.png" width="40%">
        </div>
        <br>
        <p class="login-box-msg">Inicia sesión en administrador</p>

        <form action="" method="POST" id="formulario" novalidate>
          <div class="row">
            <div class="col-md-12">
              <label for="">Correo electronico</label>
              <input class="form-control" type="email" id="correoElectronico" name="correoElectronico" placeholder="example@gmail.com" value="" minlength="1" onchange="validarCampo(this);" required>
              <span id="correoElectronicoSpan"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label for="">Contraseña</label>
              <input class="form-control" type="password" autocomplete="FALSE" id="contrasena" name="contrasena" onchange="validarCampo(this);" minlength="5" maxlength="15" required>
              <span id="contrasenaSpan"></span>
            </div>
          </div>
          <p class="mb-1">
            <a href="../USUARIO/formularioRecuperar.php" style="-webkit-text-fill-color: black;">¿Olvidó su contraseña?</a>
          </p>
          <br>
          <button type="submit" class="btn btn-success" onclick="validarPaginaFinal();"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</button>
          <a type="button" href="paginaprincipalcliente.php" class="btn btn-dark float-right"><i class="fas fa-home"></i> Volver al inicio</a>
        </form>

      </div>
    </div>
  </div>
</body>

</html>

<?php require_once 'linkfooter.php'; ?>


<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/validaciones.min.js"></script>


<script>
  function validarPaginaFinal() {
    // evento.preventDefault();
    var valido = true;
    // agregar el id de cada campo de la página para poder validar
    var campos = ["correoElectronico", "contrasena"];
    campos.forEach(element => {
      var campo = document.getElementById(element);
      if (!validarCampo(campo))
        valido = false;
    });
    if (valido)
      document.getElementById('formulario').submit();
  }
</script>