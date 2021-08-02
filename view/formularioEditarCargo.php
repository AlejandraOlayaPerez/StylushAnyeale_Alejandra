<?php
require_once 'headPagina.php';
require_once '../model/cargo.php';
require_once '../model/conexionDB.php';
require_once '../controller/cargoController.php';

$oUsuarioController = new usuarioController();
$oCargo = $oUsuarioController->consultarCargoPorId($_GET['idCargo']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR CARGO</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: rgb(249, 201, 242);">
                        <label class="card-title" style="-webkit-text-fill-color: black;">EDITAR CARGO</label>
                    </div>
                    <form action="../controller/cargoController.php" method="GET">
                        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                            <input type="text" name="idCargo" value="<?php echo $_GET['idCargo']; ?>" style="display: none;">

                            <div class="row" style="margin: 5px;">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Cargo</label>
                                    <input class="form-control" type="text" name="cargo" placeholder="Cargo" maxlength="20" value="<?php echo $oCargo->cargo; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                        <a href="listarCargo.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                        <button type="submit" class="btn btn-success" name="funcion" value="actualizarCargo"><i class="fas fa-edit"></i> Actualizar Cargo</button>
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