<?php
require_once 'headPagina.php';
require_once '../model/pedido.php';
require_once '../controller/pedidoController.php';

$idPedido=$_GET['idPedido'];

$oPedidoController = new pedidoController();
$oPedido = $oPedidoController->consultarPedidoId($idPedido);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETALLE PEDIDO</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card-header" style="background-color: rgb(249, 201, 242);">
                    <label class="card-title" style="-webkit-text-fill-color: black;">DETALLE PEDIDO</label>
                </div>
                <div class="card card-ligth">
                    <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                        <div class="row">
                            <div class="col col-xl-4 col-md-6 col-12">
                                <label>Fecha pedido: </label>
                                <input class="form-control" type="text" value="<?php echo $oPedido->fechaPedido; ?>" disabled>
                            </div>
                            <div class="col col-xl-4 col-md-6 col-12">
                                <label>documentoIdentidad: </label>
                                <input class="form-control" type="text" value="<?php echo $oPedido->documentoIdentidad; ?>" disabled>
                            </div>
                            <div class="col col-xl-4 col-md-6 col-12">
                                <label>Responsable Pedido: </label>
                                <input class="form-control" type="text" value="<?php echo $oPedido->responsablePedido; ?>" disabled>
                            </div>
                            <div class="col col-xl-4 col-md-6 col-12">
                                <label>NIT Empresa: </label>
                                <input class="form-control" type="text" value="<?php echo $oPedido->Nit; ?>" disabled>
                            </div>
                            <div class="col col-xl-4 col-md-6 col-12">
                                <label>Empresa: </label>
                                <input class="form-control" type="text" value="<?php echo $oPedido->empresa; ?>" disabled>
                            </div>
                            <div class="col col-xl-4 col-md-6 col-12">
                                <label>Direccion: </label>
                                <input class="form-control" type="text" value="<?php echo $oPedido->direccion; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                    <a href="pedidoPDF.php?idPedido=<?php echo $_GET['idPedido']; ?>" class="btn btn-info"><i class="fas fa-print"></i> Imprimir Pedido</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr style="background-color: rgb(249, 201, 242);">
                                    <th>Codigo</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once '../model/detalle.php';
                                $oPedidoController = new pedidoController();
                                $oDetalle = $oPedidoController->consultarProductosIdPedido($idPedido);
                                if (count($oDetalle) > 0) {
                                foreach ($oDetalle as $registro) {
                                ?>
                                    <tr style="background-color: rgba(255, 255, 204, 255);">
                                        <td><?php echo $registro['codigoProducto']; ?></td>
                                        <td><?php echo $registro['producto']; ?></td>
                                        <td><?php echo $registro['cantidad']; ?></td>
                                        <td><?php echo $registro['precio']; ?></td>
                                    </tr>
                                <?php } } else { //en caso de que no tengo informacion, mostrara un mensaje
                                ?>
                                    <!-- no hay ningun registro -->
                                    <tr>
                                        <td colspan="4" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay productos en este pedido</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="listarPedido.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>