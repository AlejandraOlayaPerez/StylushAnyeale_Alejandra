<?php
require_once 'headGerente.php';
require_once '../controller/usuarioController.php';

$oUsuarioController = new usuarioController();
$oRol = $oUsuarioController->consultarRolId($_GET['idRol']); //la consultaRolId retorna la instancia completa del rol, la esta almacenando en la variable $oRol

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>Editar Rol</title>
</head>

<body>
    <form action="../controller/usuarioController.php" method="GET">
        <div class="container">
            <h1>EDITAR ROL</h1>
            <div class="row">
                <div class="col col-xl-3 col-md-6 col-12">
                    <label for="">Nombre_Rol</label>
                    <input type="text" name="idRol" value="<?php echo $oRol->idRol; ?>" style="display:none;">
                    <input class="form-control" type="text" name="nombreRol" value="<?php echo $oRol->nombreRol; ?>" required>
                </div>
            </div>

            <br>
            <button type="submit" class="btn btn-success" name="funcion" value="actualizarRol">Guardar</button>
    </form>
    <a href="home/paginaPrincipalGerente.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
</body>