<?php
require_once 'headPagina.php';
require_once '../controller/gestionController.php';
require_once '../model/modulo.php';
require_once '../model/pagina.php';

$oGestionController = new gestionController();
$oPagina = $oGestionController->consultarPaginaId($_GET['idPagina']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PAGINA</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: rgb(249, 201, 242);">
                        <label class="card-title" style="-webkit-text-fill-color: black;">EDITAR PAGINA</label>
                    </div>
                    <form action="../controller/gestionController.php" method="GET">
                        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
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
                                        <option value="true" <?php if ($oPagina->requireSession == "SI") {echo "selected";} ?>>SI</option>
                                        <option value="false" <?php if ($oPagina->requireSession == "NO") {echo "selected";} ?>>NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                            <a href="listarPagina.php?idModulo=<?php echo $oPagina->idModulo; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                            <button type="submit" class="btn btn-success" name="funcion" value="actualizarPagina"><i class="fas fa-edit"></i> Actualizar Pagina</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>