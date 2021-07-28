<?php
require 'headGerente.php';
require_once '../controller/gestionController.php';
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
    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background-color: rgb(119, 167, 191);">
                        <div class="card-header">
                            <h1 class="card-title" style=" font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600;">EDITAR PAGINA</h1>
                        </div>
                        <form action="../controller/gestionController.php" method="GET">

                            <div class="row" style="margin: 5px;">
                                <div class="col col-xl-4 col-md-8 col-12">
                                    <label for="">Nombre_Pagina</label>
                                    <input type="text" name="idPagina" value="<?php echo $oPagina->idPagina; ?>" style="display:none;">
                                    <input type="text" name="idModulo" value="<?php echo $oPagina->idModulo; ?>" style="display:none;">
                                    <input class="form-control" type="text" name="nombrePagina" value="<?php echo $oPagina->nombrePagina; ?>" required>
                                </div>
                                <div class="col col-xl-4 col-md-8 col-12">
                                    <label for="">Enlace_Pagina</label>
                                    <input class="form-control" type="text" name="enlace" value="<?php echo $oPagina->enlace; ?>" required>
                                </div>
                                <div class="col col-xl-4 col-md-8 col-12">
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
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success" name="funcion" value="actualizarPagina">Guardar</button>
                            <a href="listarPagina.php?idModulo=<?php echo $oPagina->idModulo; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>

<?php
require_once 'footerGerente.php';
?>