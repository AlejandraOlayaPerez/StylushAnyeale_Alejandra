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

                <form action="../controller/clientecontroller.php" method="POST" id="formulario">
                    <input type="text" name="funcion" value="iniciarSesion" style="display: none;">
                    <input type="text" name="url" value="<?php if (isset($_GET['url'])) {
                                                                echo $_GET['url'];
                                                            } ?>" style="display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Correo electronico</label>
                            <input class="form-control" type="email" id="correoElectronico" name="email" placeholder="example@gmail.com" value="" minlength="1" onchange="validarCampo(this);" required>
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
                    <br>
                    <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</button>
                    <br><br>
                    <p class="mb-1"><a href="" class="text-center" style="-webkit-text-fill-color: black;">¿Olvidó su contraseña?</a></p>
                    <p class="mb-0"><a href="registrocliente.php" class="text-center" style="-webkit-text-fill-color: black;">¿No tiene usuario?</a></p>
                    <p class="mb-0"><a href="loginusuario.php" class="text-center" style="-webkit-text-fill-color: black;">Administrador </a></p>
                </form>
            </div>
        </div>
    </div>

</body>

<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/jquery/jquery.min.js"></script>
<?php require_once 'linkfooter.php'; ?>

</html>


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