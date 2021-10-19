<?php
require_once 'headPagina.php';
require_once '../model/pedido.php';
$oPedido = new pedido();

$idUser = $_SESSION['idUser'];
?>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header cardHeader">
                <form id="formLimpiar" action="" method="POST">
                    <div class="row">
                        <div class="col-md-3">
                            <label style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Pedido por fecha: </label>
                            <input type="date" class="form-control" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" id="fechaPedido" value="" onchange="consultaPedido()">

                        </div>
                        <div class="col-md-3">
                            <label style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Pedidos recibidos: </label>
                            <select class="form-select" id="recibido" onchange="consultaPedido()">
                                <option value="" disabled selected>Selecciones una opción</option>
                                <option value="1">Pedidos recibidos</option>
                                <option value="0">Pedidos no recibidos</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Pedidos cancelados: </label>
                            <select class="form-select" id="cancelado" onchange="consultaPedido()">
                                <option value="" disabled selected>Selecciones una opción</option>
                                <option value="1">Pedidos cancelados</option>
                                <option value="0">Pedidos sin cancelar</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Pedidos por codigo: </label>
                            <input type="number" class="form-control" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" id="codigo" placeholder="Digite codigo producto" onkeyup="consultaPedido()">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="button" class="btn btn-info" value="Borrar Filtro" onclick="limpiarFiltroReservacion()">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-tools">
                                <ul class="pagination pagination-sm contenedorUL" id="contenedorUL">

                                </ul>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div class="card">
        <div class="card-body table-responsive p-0" style="height:550px;">
                <table class="table colorestabla">
                    <thead>
                        <tr class="estiloTr">
                            <th>Codigo Pedido</th>
                            <th>Fecha Pedido</th>
                            <th>¿Pedido recibido?</th>
                            <th>Pedidos Cancelados</th>
                            <th><a class="btn btn-info" href="nuevoPedido.php"><i class="fas fa-plus-circle"></i> Crear Pedido</a></th>
                        </tr>
                    </thead>
                    <tbody id="filtroPedido">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<?php require_once 'footer.php'; ?>
<?php require_once 'linkjs.php'; ?>


<div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header estiloModalHeader">
                <h5 class="modal-title" id="Label">Pedido recibido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body estiloModalBody">
                <p>¿Su pedido fue recibido?</p>
            </div>
            <div class="modal-footer estiloModalBody">
                <form action="../controller/pedidoController.php" method="GET">
                    <input type="text" name="idPedido" id="validarPedido" style="display: none;">
                    <input type="text" name="idUser" value="<?php echo $_SESSION['idUser']; ?>" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="funcion" value="validarPedido"><i class="fas fa-check-circle"></i> Validar Pedido</button>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="cancelarPedido" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header estiloModalHeader">
                <h5 class="modal-title" id="Label">Cancelar Pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body estiloModalBody">
                <p>¿Desea cancelar el pedido?</p>
            </div>
            <div class="modal-footer estiloModalBody">
                <form action="../controller/pedidoController.php" method="GET">
                    <input type="text" name="idPedido" id="pedido" style="display: none;">
                    <input type="text" name="idUser" value="<?php echo $_SESSION['idUser']; ?>" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="cancelarPedido"><i class="fas fa-trash-alt"></i> Cancelar Pedido</button>
                </form>
            </div>
        </div>
    </div>
</div>