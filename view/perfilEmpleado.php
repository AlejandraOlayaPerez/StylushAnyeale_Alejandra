<?php
require_once 'headPagina.php';
require_once '../controller/usuarioController.php';
require_once '../model/usuario.php';
require_once '../controller/usuarioController.php';

$idUser = $_SESSION['idUser'];

$oUsuarioController = new usuarioController();
$oUsuario = $oUsuarioController->consultarUsuarioId($_SESSION['idUser']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PERFIL</title>
</head>

<body class="hold-transition sidebar-mini">


    <div class="content-wrapper">
        <br>
        <section class="content">
            <div class="container-fluid">
                <?php
                require_once '../controller/mensajeController.php';

                if (isset($_GET['mensaje'])) {
                    $oMensaje = new mensajes();
                    echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
                }
                ?>
                <div class="row">
                    <div class="col col-xl-3 col-md-6 col-12">
                        <div class="card card-outline">
                            <div class="card-header" style="background-color: rgb(249, 201, 242);">
                                <p class="card-title" style="-webkit-text-fill-color: black">Perfil</hp>
                            </div>
                            <div class="card-body box-profile" style="background-color: rgb(249, 201, 242);">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="../image/perfilPreterminado.png" alt="">
                                </div>

                                <h1 class="profile-username text-center"><?php echo $oUsuario->primerNombre . " " . $oUsuario->primerApellido; ?><a href=""> (Editar Foto)</a></h1>
                            </div>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header" style="background-color: rgb(249, 201, 242);">
                                <p class="card-title" style="-webkit-text-fill-color: black">Informacion Personal</hp>
                            </div>

                            <div class="card-body" style="background-color: rgb(249, 201, 242);">
                                <strong><i class="fas fa-info-circle"></i> Nombres: </strong>
                                <p><?php echo $oUsuario->primerNombre . " " . $oUsuario->segundoNombre . " " . $oUsuario->primerApellido . " " . $oUsuario->segundoApellido; ?></p>

                                <hr>
                                <strong><i class="fas fa-at"></i> Correo Electronico: </strong>
                                <p><?php echo $oUsuario->correoElectronico; ?></p>

                                <hr>
                                <strong><i class="fas fa-phone-square"></i> Telefono: </strong>
                                <p><?php echo $oUsuario->telefono; ?></p>

                                <hr>
                                <a href="informacionUsuario.php?idUser=<?php echo $_SESSION['idUser']; ?>" class="btn btn-info"><i class="fas fa-eye"></i> Ver. Informacion Personal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>