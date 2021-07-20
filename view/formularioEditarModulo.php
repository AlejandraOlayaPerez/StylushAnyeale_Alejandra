<?php
require 'headGerente.php';
require_once '../controller/usuarioController.php';
//se hace referencia a los archivos estudiante y conexiondb


$oUsuarioController = new usuarioController();
$oModulo = $oUsuarioController->consultarModuloId($_GET['idModulo']); //la consultaModuloId retorna la instancia completa del modulo, la esta almacenando en la variable $oModulo

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>EDITAR MODULO</title>
</head>


<body>
    <form action="../controller/usuarioController.php" method="GET">
        <div class="container">
            <h1 class="tituloGrande">EDITAR MODULO</h1>
            <div class="row">
                <div class="col col-xl-3 col-md-6 col-12">
                    <label for="">Nombre_Modulo</label>
                    <input type="text" name="idModulo" value="<?php echo $oModulo->idModulo; ?>" style="display:none;">
                    <input class="form-control" type="text" name="nombreModulo" value="<?php echo $oModulo->nombreModulo; ?>" required>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success" name="funcion" value="actualizarModulo">Guardar</button>
    </form>
    <a href="home/paginaPrincipalGerente.php?ventana=modulo" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
</body>