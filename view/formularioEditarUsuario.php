<?php
require_once 'headGerente.php';
require_once '../controller/usuarioController.php';
require_once '../model/usuario.php';


$oUsuarioController = new usuarioController();
$oUsuario = $oUsuarioController->consultarUsuarioId($_GET['idUser']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>EDITAR ROL</title>
</head>

<body>
    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background-color: rgb(119, 167, 191);">
                        <div class="card-header">
                            <h1 class="card-title" style=" font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600;">ACTUALIZAR USUARIO</h1>
                        </div>
                        <form id="quickForm" action="../controller/usuarioController.php" method="POST">
                        <input type="text" name="idUser" value="<?php echo $oUsuario->idUser; ?>" style="">
                            <div class="row">
                                <div class="form-group">
                                    <label for="">Usuario_Nombre</label>
                                    <input class="form-control" type="text" name="nombreUser" placeholder="Usuario_Nombre" requied minlength="5" maxlength="30" value="<?php echo $oUsuario->nombreUsuario; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Correo electronico</label>
                                    <input class="form-control" type="email" name="correoElectronico" placeholder="Correo Electronico" minlength="15" maxlength="50" value="<?php echo $oUsuario->correoElectronico; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="">Contraseña</label>
                                    <input class="form-control" type="password" name="contrasena" placeholder="Contraseña" minlength="5" maxlength="30" value="<?php echo $oUsuario->contrasena; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Confirmar contraseña</label>
                                    <input class="form-control" type="password" name="confirmarContrasena" placeholder="Confirmar Contraseña" minlength="5" maxlength="30">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success" name="funcion" value="actualizarUsuario">Guardar</button>
                            <a href="home/paginaPrincipalGerente.php?ventana=usuario" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div> 
</body>