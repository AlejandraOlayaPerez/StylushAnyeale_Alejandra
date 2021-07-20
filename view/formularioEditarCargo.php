<?php
require_once 'headGerente.php';
require_once '../model/cargo.php';
require_once '../model/conexionDB.php';
require_once '../controller/usuarioController.php';

$oUsuarioController = new usuarioController();
$oCargo = $oUsuarioController->consultarCargoPorId($_GET['idCargo']);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>EDITAR CARGO</title>
</head>

<body>
    <div class="container">

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background-color: rgb(119, 167, 191);">
                        <div class="card-header">
                            <h1 class="card-title" style=" font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600;">EDITAR CARGO</h1>
                        </div>
                        <form id="quickForm" action="../controller/usuarioController.php" method="GET">
                            <input type="text" name="idCargo" value="<?php echo $_GET['idCargo']; ?>" style="display: none;">

                            <div class="row" style="margin: 5px;">
                                <div class="col-6">
                                    <label for="" class="form-label">Cargo</label>
                                    <input class="form-control" type="text" name="cargo" placeholder="Cargo" maxlength="20" value="<?php echo $oCargo->cargo; ?>">
                                </div>
                                <div class="col-6">
                                    <label for="" class="form-label">Descripcion_Cargo</label>
                                    <input class="form-control" type="text" name="descripcionCargo" placeholder="Descripcion del cargo" maxlength="100" value="<?php echo $oCargo->descripcionCargo; ?>">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success" name="funcion" value="actualizarCargo"><i class="far fa-save"></i> Guardar</button>
                            <a href="listarCargo.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
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