<?php
require_once 'headPagina.php';

$idUser = $_SESSION['idUser'];

date_default_timezone_set('America/Bogota');
$fechaActual = date("Y-m-d");
if (isset($_GET['filtroFecha'])) {
    $filtroFecha = $_GET['filtroFecha'];
} else {
    $filtroFecha = Date("Y-m-d");
}

if (isset($_GET['filtroCodigoPedido'])) {
    $filtroCodigoPedido = $_GET['filtroCodigoPedido'];
} else {
    $filtroCodigoPedido = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDIDO</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        require_once '../controller/mensajeController.php';

        if (isset($_GET['mensaje'])) {
            $oMensaje = new mensajes();
            echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
        }
        ?>

        <br>
        <div class="card">
            <div class="card-header border-0">
                <form id="formLimpiar" action="" method="GET">
                    <div class="row">
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Pedido por fecha: </label>
                            <input type="date" class="form-control datetimepicker-input" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" name="filtroFecha" onchange="this.form.submit()" value="<?php echo $filtroFecha; ?>">
                            <br>
                            <input type="button" class="btn btn-light" value="Borrar Filtro" onclick="limpiarFiltroReservacion()">
                        </div>

                        <div class="col col-xl-4 col-md-6 col-12">
                            <br>

                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr style="background-color: rgb(249, 201, 242);">
                            <th>Codigo Pedido</th>
                            <th>Fecha Pedido</th>
                            <th>¿Pedido recibido?</th>
                            <th>Pedidos Cancelados</th>
                            <th><a class="btn btn-info" href="nuevoPedido.php"><i class="fas fa-plus-circle"></i> Crear Pedido</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../model/pedido.php';
                        require_once '../model/conexionDB.php';
                        $oPedido = new pedido();
                        $consulta = $oPedido->listarPedido($filtroFecha);
                        if (count($consulta) > 0) {
                            foreach ($consulta as $registro) {
                        ?>
                                <tr>
                                    <input type="text" value="<?php echo $registro['idPedido']; ?>" style="display:none;">
                                    <td><?php echo $registro['idPedido']; ?></td>
                                    <td><?php echo $registro['fechaPedido']; ?></td>
                                    <td><?php if ($registro['entregaPedido']) echo "SI";
                                        else echo "NO"; ?></td>
                                    <td><?php if ($registro['eliminado']) echo "SI";
                                        else echo "NO"; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success">Acciones</button>
                                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                                <span class="sr-only"></span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <?php
                                                if ($registro['fechaPedido'] == $fechaActual and !$registro['entregaPedido'] and !$registro['eliminado']) {
                                                ?>
                                                    <a href="formularioEditarPedido.php?idPedido=<?php echo $registro['idPedido']; ?>" class="dropdown-item"><i class="fas fa-edit"></i> Editar</a>
                                                <?php
                                                }
                                                if (!$registro['entregaPedido'] and !$registro['eliminado']) {
                                                ?>
                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="comprobarPedido(<?php echo $registro['idPedido']; ?>,<?php echo $idUser; ?>)"><i class="fas fa-check-circle"></i> Validar</a>
                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#cancelarPedido" onclick="cancelarPedido(<?php echo $registro['idPedido']; ?>,<?php echo $idUser; ?>)"><i class="fas fa-trash-alt"></i> Cancelar</a>
                                                <?php }
                                                ?>
                                                <a class="dropdown-item" href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/detallePedido.php?idPedido=<?php echo $registro['idPedido']; ?>"><i class="fas fa-barcode"></i> Detalle</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                        } else { //en caso de que no tengo informacion, mostrara un mensaje
                            ?>
                            <!-- no hay ningun registro -->
                            <tr>
                                <td colspan="5" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay pedido disponibles</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>

<div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label">Pedido recibido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Su pedido fue recibido?</p>
            </div>
            <div class="modal-footer">
                <form action="../controller/pedidoController.php" method="GET">
                    
                    <input type="text" name="idPedido" id="validarPedido" style="display:none;">
                    <input type="text" name="idUser" id="validarUsuario" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="funcion" value="validarPedido"><i class="fas fa-check-circle"></i>Validar Pedido</button>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="cancelarPedido" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label">Cancelar Pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Desea cancelar el pedido?</p>
            </div>
            <div class="modal-footer">
                <form action="../controller/pedidoController.php" method="GET">
                    <input type="text" name="idPedido" id="cancelarPedido" style="display: none;">
                    <input type="text" name="idPedido" id="pedido" style="display: none;">
                    <input type="text" name="idUser" id="cancelarUsuario" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="cancelarPedido"><i class="fas fa-trash-alt"></i>Cancelar Pedido</button>
                </form>
            </div>
        </div>
    </div>
</div>