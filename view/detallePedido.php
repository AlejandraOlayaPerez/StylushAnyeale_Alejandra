<?php
//referenciamos archivos de la carpeta Model
require_once 'headGerente.php';
require_once '../model/pedido.php';
require_once '../model/conexionDB.php';
require_once '../controller/usuarioController.php';

$idPedido = $_GET['idPedido'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>Detalle Pedido</title>
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

        <?php
        require_once '../model/pedido.php';
        $oPedido = new pedido();
        $oPedido->consultarPedido($idPedido);
        ?>

        <div class="row">
            <div class="col">
                <h1 class="tituloGrande">Fecha pedido: </h1>
                <input class="form-control" type="text" value="<?php echo $oPedido->fechaPedido; ?>" disabled>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h1 class="tituloGrande">Documento: </h1>
                <input class="form-control" type="text" value="<?php echo $oPedido->documentoIdentidad; ?>" disabled>
            </div>
            <div class="col">
                <h1 class="tituloGrande">Responsable pedido: </h1>
                <input class="form-control" type="text" value="<?php echo $oPedido->responsablePedido; ?>" disabled>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h1 class="tituloGrande">Empresa: </h1>
                <input class="form-control" type="text" value="<?php echo $oPedido->empresa; ?>" disabled>
            </div>
            <div class="col">
                <h1 class="tituloGrande">Direccion: </h1>
                <input class="form-control" type="text" value="<?php echo $oPedido->direccion; ?>" disabled>
            </div>
        </div>

        <br>
        <br>

        <div class="col-md-12" style="background-color: rgb(249, 201, 242);">
            <div class="card">
                <div class="card-header" style="background-color: rgb(249, 201, 242);">
                    <h3 class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Detalle del pedidos</h1>
                </div>
                <div class="card-body p-0" style="background-color: rgb(119, 167, 191);">
                    <table class="table" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
                        <thead>
                            <tr style="background-color: rgb(249, 201, 242);">
                                <th>Codigo Pedido</th>
                                <Th>Codigo producto</Th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            require_once '../model/pedido.php';
                            require_once '../model/conexionDB.php';
                            $oPedido = new pedido();
                            $consulta = $oPedido->listarPedido();
                            foreach ($consulta as $registro) {
                            ?>
                                <tr>
                                    <input type="text" value="<?php echo $registro['idPedido']; ?>" style="display:none;">
                                    <td><?php echo $registro['idPedido']; ?></td>
                                    <td><?php echo $registro['codigoProducto']; ?></td>
                                    <td><?php echo $registro['producto'] ?></td>
                                    <td><?php echo $registro['cantidad'] ?></td>
                                    <td>
                                        <a href="" class="btn btn-warning"><i class="fas fa-print"></i> Imprimir</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="listarPedido.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>