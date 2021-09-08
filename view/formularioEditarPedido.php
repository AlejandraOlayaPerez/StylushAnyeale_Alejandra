<?php
require_once 'headPagina.php';
require_once '../model/pedido.php';
require_once '../controller/pedidoController.php';

$idPedido = $_GET['idPedido'];
$idUser = $_SESSION['idUser'];

$oPedidoController = new pedidoController();
$oPedido = $oPedidoController->consultarPedidoId($idPedido);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>EDITAR PEDIDO</title>
</head>

<body>

    <div class="container-fluid">


        <div class="card-header" style="background-color: rgb(249, 201, 242);">
            <label class="card-title" style="-webkit-text-fill-color: black;">EDITAR INFORMACION DEL PEDIDO</label>
        </div>
        <div class="card card-ligth">
            <form action="../controller/pedidoController.php" method="GET">
                <input type="text" name="idPedido" value="<?php echo $idPedido; ?>" style="display: none;">
                <input type="text" name="idUser" value="<?php echo $idUser; ?>" style="display: none;">
                <input class="form-control" type="date" name="fechaPedido" value="<?php echo $oPedido->fechaPedido; ?>" style="display: none;">
                <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                    <div class="row">
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label>documentoIdentidad: </label>
                            <input class="form-control" type="text" name="documentoIdentidad" value="<?php echo $oPedido->documentoIdentidad; ?>" readonly>
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label>Responsable Pedido: </label>
                            <input class="form-control" type="text" name="responsablePedido" value="<?php echo $oPedido->responsablePedido; ?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="modal fade" id="modal-empresa">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Seleccionar Empresas</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table align-middle table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th><a class="btn btn-info" href="nuevaEmpresa.php"><i class="fas fa-plus-square"></i> Crear</a></th>
                                                        <th>Nit</th>
                                                        <th>Empresa</th>
                                                        <th>Direccion</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    require_once '../model/empresa.php';
                                                    $oEmpresa = new empresa();
                                                    $consulta = $oEmpresa->listarEmpresa(1);
                                                    foreach ($consulta as $registro) {
                                                    ?>
                                                        <tr>
                                                            <td><button type="button" class="btn btn-success" data-dismiss="modal" onclick="agregarEmpresa('<?php echo $registro['idEmpresa'] ?>','<?php echo $registro['Nit']; ?>','<?php echo $registro['nombreEmpresa']; ?>','<?php echo $registro['direccion']; ?>')">Agregar</button></td>
                                                            <td><?php echo $registro['Nit']; ?></td>
                                                            <td><?php echo $registro['nombreEmpresa']; ?></td>
                                                            <td><?php echo $registro['direccion']; ?></td>
                                                        </tr>
                                                    <?php } ?>
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
                        <div class="container">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Nit: </label>
                                    <input class="form-control" type="text" name="Nit" id="Nit" value="<?php echo $oPedido->Nit; ?>" readonly>
                                    <input type="text" name="idEmpresa" id="idEmpresa" style="display:none;">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Empresa: </label>
                                    <input class="form-control" type="text" name="empresa" id="nombreEmpresa" value="<?php echo $oPedido->empresa; ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Direccion: </label>
                                    <input class="form-control" type="text" name="direccion" id="direccion" value="<?php echo $oPedido->direccion; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-empresa"><i class="fas fa-exchange-alt"></i> Cambiar Empresa</button>
                    <button type="submit" class="btn btn-success" name="funcion" value="actualizarPedido"><i class="fas fa-edit"></i> Actualizar Pedido</button>
                </div>
            </form>
        </div>

        <div class="card border border-dark">
            <div class="card-header" style="background-color: rgb(249, 201, 242); font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;">
                <h1 class="card-title">EDITAR PRODUCTOS </h1>
                <button type="button" class="btn btn-success  float-right" data-toggle="modal" data-target="#modal-default">Agregar Productos</button>
            </div>
            <form action="../controller/pedidoController.php" method="GET">
                <input type="text" name="idPedido" value="<?php echo $idPedido; ?>" style="display: none;">
                <input type="text" name="idUser" value="<?php echo $idUser; ?>" style="display: none;">

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
                                        <input type="text" name="idProducto" value="<?php echo $registro['idProducto']; ?>" style="display: none;">
                                        <td><?php echo $registro['codigoProducto']; ?></td>
                                        <td><?php echo $registro['producto']; ?></td>
                                        <td><input class="form-control" type="number" value="<?php echo $registro['cantidad']; ?>"></td>
                                        <td><input type="button" class="btn btn-danger" value="Eliminar" onclick="eliminarTR(<?php echo $registro['idProducto']; ?>)"></td>
                                    </tr>
                                <?php }
                            } else { //en caso de que no tengo informacion, mostrara un mensaje
                                ?>
                                <tr id="0">
                                    <td colspan="4" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay productos en este pedido</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <button type="submit" style="margin-bottom: 5px; margin-left: 5px;" class="btn btn-success" name="funcion" value="actualizarPedidoProducto"><i class="fas fa-edit"></i> Actualizar Productos</button>
            </form>
        </div>

        <a href="listarPedido.php" style="margin-bottom: 5px;" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
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
                        $Consulta = $oProducto->mostrarProducto2();
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

</html>

<?php
require_once 'footer.php';
?>