<?php
require 'headGerente.php';
require_once '../controller/usuarioController.php';
require_once '../model/modulo.php';
require_once '../model/pagina.php';

$oUsuarioController = new usuarioController();
$oPagina = $oUsuarioController->consultarPaginaId($_GET['idPagina']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>EDITAR PAGINA</title>
</head>

<body>

    <form action="../controller/usuarioController.php" method="GET">
        <div class="container">
            <H1 class="tituloGrande">EDITAR PAGINA</H1>
            <div class="row">
                <div class="col col-xl-3 col-md-6 col-12">
                    <label for="">Nombre_Pagina</label>
                    <input type="text" name="idPagina" value="<?php echo $oPagina->idPagina; ?>" style="display:none;">
                    <input type="text" name="idModulo" value="<?php echo $oPagina->idModulo; ?>" style="display:none;">
                    <input class="form-control" type="text" name="nombrePagina" value="<?php echo $oPagina->nombrePagina; ?>" required>
                </div>
                <div class="col col-xl-3 col-md-6 col-12">
                    <label for="">Enlace_Pagina</label>
                    <input class="form-control" type="text" name="enlace" value="<?php echo $oPagina->enlace; ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">¿Se requiere inicio de sesion?</label>
                <select class="form-select" id="" name="requireSession" required>

                    <option value="" disabled selected>Selecciones una opción</option>
                    <option value="true" <?php if ($oPagina->requireSession == "SI") {
                                                echo "selected";
                                            } ?>>SI</option>
                    <option value="false" <?php if ($oPagina->requireSession == "NO") {
                                                echo "selected";
                                            } ?>>NO</option>
                </select>
            </div>
            <br>

            <button type="submit" class="btn btn-success" name="funcion" value="actualizarPagina">Guardar</button>
    </form>
    <a href="listarPagina.php?idModulo=<?php echo $oPagina->idModulo; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>