<?php
//si no esta definida o no tiene valor e redirige al login
//en caso contrario no hace nada

session_start();
if (isset($_SESSION['idCliente'])) {
    header("location: paginaprincipalcliente.php");
    die(); // es para recomendado cuando se hace una rederigir, destruir o cerrar la pagina actual.
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <style>
        body {
            background-color: yellow;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'linkhead.php'; ?>
    <title>Iniciar sesion</title>
</head>

<body class="hold-transition login-page" style="background-color: rgba(255, 255, 204, 255)">
    <div class="login-box">
        <div class="login-logo">
        </div>
        <div class="card" style="background-color: rgb(119, 167, 191); border: rgb(255, 255, 204, 255) 5px dashed; ; box-shadow: 20px 20px 20px black;">
            <div class="card-body">
                <div class="col text-center">
                    <img style="border-radius: 8px;" src="../image/logo.png" width="50%">
                </div>
                <br>
                <p class="login-box-msg">Inicia sesión en cliente</p>

                <form action="../controller/clienteController.php" method="POST">
                    <input type="text" name="url" value="<?php if (isset($_GET['url'])) {
                                                                echo $_GET['url'];
                                                            } ?>" style="display: none;">
                    <label for="">Correo electronico</label>
                    <input class="form-control" type="email" name="email">
                    <label for="">Contraseña</label>
                    <input class="form-control" type="password" name="contrasena">
                    <br>
                    <button type="submit" class="btn btn-success" name="funcion" value="iniciarSesion">Iniciar Sesión</button>
                    <br><br>
                    <p class="mb-1"><a href="" class="text-center" style="-webkit-text-fill-color: black;">¿Olvidó su contraseña?</a></p>
                    <p class="mb-0"><a href="registrocliente.php" class="text-center" style="-webkit-text-fill-color: black;">¿No tiene usuario?</a></p>
                    <p class="mb-0"><a href="loginusuario.php" class="text-center" style="-webkit-text-fill-color: black;">Administrador </a></p>
                </form>
            </div>
        </div>
    </div>

</body>

<?php require_once 'linkfooter.php'; ?>

</html>