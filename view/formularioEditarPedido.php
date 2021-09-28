<?php
require_once 'headPagina.php';
require_once '../model/pedido.php';
require_once '../controller/pedidoController.php';

$idPedido = $_GET['idPedido'];
$idUser = $_SESSION['idUser'];

$oPedidoController = new pedidoController();
$oPedido = $oPedidoController->consultarPedidoId($idPedido);
?>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header" style="background-color: rgb(249, 201, 242);">
                <label class="card-title" style="-webkit-text-fill-color: black;">EDITAR INFORMACION</label>
            </div>
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
                    <hr>
                    <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-empresa" onclick="buscarEmpresa()"><i class="fas fa-exchange-alt"></i> Cambiar Empresa</button>
                        <button type="submit" class="btn btn-success" name="funcion" value="actualizarPedido"><i class="fas fa-edit"></i> Actualizar Informacion</button>
                    </div>
                </div>
            </form>
        </div>

        <!--editar informacion-->


        <div class="card">
            <div class="card-header" style="background-color: rgb(249, 201, 242);">
                <label class="card-title" style="-webkit-text-fill-color: black;">EDITAR PRODUCTO</label>
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default" onclick="productoConsultar()">Agregar Productos</button>
            </div>
            <form action="../controller/pedidoController.php" method="GET">
                <input type="text" name="idPedido" value="<?php echo $idPedido; ?>" style="display: none;">
                <input type="text" name="idUser" value="<?php echo $idUser; ?>" style="display: none;">

                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                        <input type="text" name="idPedido" id="idPedido" value="<?php echo $_GET['idPedido']; ?>" style="display: none;">
                        <thead>
                            <tr style="background-color: rgb(249, 201, 242);">
                                <th>Codigo</th>
                                <th>productos</th>
                                <th>cantidad</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="listarProducto">

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

<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/AgregarEmpresa.js"></script>
<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/editarPedido.js"></script>
<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/AgregarProductos.js"></script>
<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/general.js"></script>
<script>
    productosPedido();
</script>
<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/validaciones.js"></script>

<!--Modal empresa-->
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
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Buscar: </label>
                        <input type="text" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Busca una empresa por NIT o Nombre" class="form-control" id="empresa" name="empresa" onkeyup="buscarEmpresa()">
                    </div>
                </div>

                <hr>

                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th><a class="btn btn-info" href="nuevaEmpresa.php"><i class="fas fa-plus-square"></i> Crear</a></th>
                            <th>Nit</th>
                            <th>Empresa</th>
                            <th>Direccion</th>
                        </tr>
                    </thead>
                    <tbody id="listarEmpresa">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<!--Modal de productos-->

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
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Buscar: </label>
                        <input type="text" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Busca un producto por Codigo o Nombre" class="form-control" id="producto" name="producto" onkeyup="productoConsultar()">
                    </div>
                </div>

                <hr>

                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Codigo</th>
                            <th>Producto</th>
                        </tr>
                    </thead>
                    <tbody id="productoResultado">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>