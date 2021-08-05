<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
  <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="http://localhost/Anyeale_proyecto/StylushAnyeale_Alejandra/assests/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/css/adminlte.min.css">

  <title>Registrar</title>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>Bienvenido</b>
    </div>

    <?php
    require_once '../controller/mensajeController.php';

    if (isset($_GET['mensaje'])) {
      $oMensaje = new mensajes();
      echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
    }
    ?>
    
    <div class="card">
      <div class="card-body">
        <p class="login-box-msg">Registrese para continuar</p>
        <p style="color:#FE2D00;">

        <form action="../controller/usuarioController.php" method="POST">
          <label for="">Nombre</label>
          <input class="form-control" type="text" name="nombre" requied minlength="5" maxlength="30">
          <label for="">Correo electronico</label>
          <input class="form-control" type="email" name="email" requied minlength="15" maxlength="50">
          <label for="">Contraseña</label>
          <input class="form-control" type="password" name="contrasena" requied minlength="5" maxlength="30">
          <label for="">Confirmar contraseña</label>
          <input class="form-control" type="password" name="confirmContrasena" requied minlength="5" maxlength="30">
          <br>
          <button type="submit" class="btn btn-success" name="funcion" value="registroCliente">Registrar usuario</button>
        </form>
        <br></br>

        <p class="mb-0">
          <a href="loginUsuario.php" class="text-center">¿Ya tiene usuario?</a>
        </p>
      </div>
    </div>
  </div>
</body>

</html>