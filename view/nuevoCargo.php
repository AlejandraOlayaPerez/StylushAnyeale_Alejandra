<?php
require_once 'headPagina.php';
require_once '../model/cargo.php';
require_once '../model/conexionDB.php';

$oCargo = new cargo();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVO CARGO</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">

            <?php
            require_once '../controller/mensajeController.php';

            if (isset($_GET['mensaje'])) {
                $oMensaje = new mensajes();
                echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
            }
            ?>

            <div class="container-fluid">

                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="modalProductos"><i class="fa fa-plus"></i> Nuevo</button>

                <div class="modal fade" id="modalPro" tabindex="-1" aria-labelledby="modalProductoLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="" method="GET">
                                <input type="text" name="idProducto" value="<?php echo $oProducto->idProducto; ?>" style="display:none;">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalProductoLabel">Seleecione los productos nesesarios</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Crear Pedido</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>