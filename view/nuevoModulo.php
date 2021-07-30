<?php
require_once 'headPagina.php';
require_once '../model/modulo.php';
require_once '../model/conexionDB.php';

$oModulo = new modulo();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVO MODULO</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <?php
                require_once '../controller/mensajeController.php';

                if (isset($_GET['mensaje'])) {
                    $oMensaje = new mensajes();
                    echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
                }
                ?>

                <div class="card card-primary">
                    <div class="card-header" style="background-color: rgb(249, 201, 242);">
                        <label class="card-title" style="-webkit-text-fill-color: black;">NUEVO MODULO</label>
                    </div>
                    <form action="../controller/gestionController.php" method="GET">
                        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                            <div class="row" style="margin: 5px;">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Nombre_Modulo</label>
                                    <input type="text" name="idModulo" value="<?php echo $oModulo->idModulo; ?>" style="display:none">
                                    <input type="text" class="form-control" id="" name="nombreModulo" placeholder="Nombre Modulo" minlength="10" maxlength="20" value="<?php echo $oModulo->nombreModulo; ?>">
                                </div>
                            </div>
                            <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                                <a href="listarModulo.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                                <button type="submit" class="btn btn-success" name="funcion" value="crearModulo"><i class="far fa-save"></i> Registrar Modulo</button>
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