<?php
//si no esta definida o no tiene valor e redirige al login
//en caso contrario no hace nada

session_start();
if (isset($_SESSION['idCliente'])) {
  header("location: paginaPrincipalCliente.php");
  die(); // es para recomendado cuando se hace una rederigir, destruir o cerrar la pagina actual.
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
    <title>Iniciar sesion</title>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <p>Bienvenido</p>
        </div>
        <div class="card">
            <div class="card-body">
                <p class="login-box-msg">Inicia sesión para continuar</p>

                <?php
                require_once '../controller/mensajeController.php';

                if (isset($_GET['mensaje'])) {
                    $oMensaje = new mensajes();
                    echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
                }
                ?>

                <form action="../controller/clienteController.php" method="POST">
                    <label for="">Correo electronico</label>
                    <input class="form-control" type="email" name="email">
                    <label for="">Contraseña</label>
                    <input class="form-control" type="password" name="contrasena">
                    <br>
                    <button type="submit" class="btn btn-success" name="funcion" value="iniciarSesion">Iniciar Sesión</button>
                </form>
                <br></br>
                <p class="mb-1"><a href="">¿Olvidó su contraseña?</a></p>
                <p class="mb-0"><a href="registroCliente.php" class="text-center">¿No tiene usuario?</a></p>
                <p class="mb-0"><a href="loginUsuario.php" class="text-center">Administrador </a></p>
            </div>
        </div>
    </div>

</body>

</html>