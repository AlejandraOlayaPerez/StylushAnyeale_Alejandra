<?php
require_once 'headGerente.php';
require_once '../model/cargo.php';
require_once '../model/conexionDB.php';

$oCargo = new cargo();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>NUEVO CARGO</title>
</head>

<body>
    <div class="container">

        <?php
        require_once '../controller/mensajeController.php';

        if (isset($_GET['mensaje'])) {
            $oMensaje = new mensajes();
            echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
        }
        ?>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background-color: rgb(119, 167, 191);">
                        <div class="card-header">
                            <h1 class="card-title" style=" font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600;">NUEVO CARGO</h1>
                        </div>
                        <form id="quickForm" action="../controller/cargoController.php" method="GET">

                            <div class="row" style="margin: 5px;">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Cargo</label>
                                    <input class="form-control" type="text" name="cargo" placeholder="Cargo" minlength="10" maxlength="20">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Descripcion_Cargo</label>
                                    <input class="form-control" type="text" name="descripcionCargo" placeholder="Descripcion del cargo" minlength="10" maxlength="100">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success" name="funcion" value="nuevoCargo"><i class="far fa-save"></i> Guardar</button>
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