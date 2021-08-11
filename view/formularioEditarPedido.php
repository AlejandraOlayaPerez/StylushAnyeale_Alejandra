<?php
require_once 'headPagina.php';
require_once '../model/pedido.php';
require_once '../controller/pedidoController.php';

$idPedido = $_GET['idPedido'];

$oPedidoController = new pedidoController();
$oPedido = $oPedidoController->consultarPedidoId($idPedido);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>EDITAR PEDIDO</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card-header" style="background-color: rgb(249, 201, 242);">
                    <label class="card-title" style="-webkit-text-fill-color: black;">EDITAR INFORMACION DEL PEDIDO</label>
                </div>
                <div class="card card-ligth">
                    <form action="../controller/pedidoController.php" method="GET">
                    <inPut type="text" name="idPedido" value="<?php echo $idPedido; ?>" style="display: none;">
                        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                            <div class="row">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label>Fecha pedido: </label>
                                    <input class="form-control" type="date" name="fechaPedido" value="<?php echo $oPedido->fechaPedido; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label>documentoIdentidad: </label>
                                    <input class="form-control" type="text" name="documentoIdentidad" value="<?php echo $oPedido->documentoIdentidad; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label>Responsable Pedido: </label>
                                    <input class="form-control" type="text" name="responsablePedido" value="<?php echo $oPedido->responsablePedido; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label>NIT Empresa: </label>
                                    <input class="form-control" type="text" name="Nit" value="<?php echo $oPedido->Nit; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label>Empresa: </label>
                                    <input class="form-control" type="text" name="empresa" value="<?php echo $oPedido->empresa; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label>Direccion: </label>
                                    <input class="form-control" type="text" name="direccion" value="<?php echo $oPedido->direccion; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                            <button type="submit" class="btn btn-success" name="funcion" value="actualizarPedido"><i class="fas fa-edit"></i> Actualizar Pagina</button>
                        </div>
                    </form>
                </div>

                <div class="card border border-dark">
                    <div class="card-header" style="background-color: rgb(249, 201, 242); font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;">
                        <h1 class="card-title">EDITAR PRODUCTOS </h1>
                        <button type="button" class="btn btn-success  float-right" data-toggle="modal" data-target="#modal-default">Agregar Productos</button>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr style="background-color: rgb(249, 201, 242);">
                                    <th>Codigo</th>
                                    <th>productos</th>
                                    <th>cantidad</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="listarProducto">
                                <?php
                                require_once '../model/detalle.php';
                                $oPedidoController = new pedidoController();
                                $oDetalle = $oPedidoController->consultarProductosIdPedido($idPedido);
                                if (count($oDetalle) > 0) {
                                    foreach ($oDetalle as $registro) {
                                ?>
                                        <tr id="<?php echo $registro['idProducto']; ?>">
                                            <td><?php echo $registro['codigoProducto']; ?></td>
                                            <td><?php echo $registro['producto']; ?></td>
                                            <td><input class="form-control" type="number" value="<?php echo $registro['cantidad']; ?>"></td>
                                            <td><input type="button" class="btn btn-danger" value="Eliminar" onclick="eliminarTR(<?php echo $registro['idProducto']; ?>)"></td>
                                        </tr>
                                    <?php }
                                } else { //en caso de que no tengo informacion, mostrara un mensaje
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
            </div>
        </div>
        <a href="listarPedido.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
    </div>
</body>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Productos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table align-middle table-responsive">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Codigo</th>
                            <th>Producto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../model/producto.php';
                        require_once '../model/conexiondb.php';

                        $oProducto = new producto();
                        $Consulta = $oProducto->mostrarProducto(1);
                        foreach ($Consulta as $registro) {
                        ?>

                            <tr>
                                <td><button type="button" class="btn btn-success" data-dismiss="modal" onclick="agregarProducto('<?php echo $registro['IdProducto'] ?>','<?php echo $registro['codigoProducto']; ?>','<?php echo $registro['nombreProducto']; ?>')">Agregar</button></td>
                                <td><?php echo $registro['codigoProducto']; ?></td>
                                <td><?php echo $registro['nombreProducto']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
</div>

</html>

<?php
require_once 'footer.php';
?>