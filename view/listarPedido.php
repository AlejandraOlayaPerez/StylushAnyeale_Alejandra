<?php
require_once 'headPagina.php';

$idUser = $_SESSION['idUser'];

date_default_timezone_set('America/Bogota');
if (isset($_GET['filtroFecha'])) {
    $filtroFecha = $_GET['filtroFecha'];
} else {
    $filtroFecha = Date("Y-m-d");
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
                                    <th><a class="btn btn-info" href="nuevoPedido.php?idUser=<?php echo $idUser; ?>"><i class="fas fa-user-plus"></i> Crear Pedido</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once '../model/pedido.php';
                                require_once '../model/conexionDB.php';
                                $oPedido = new pedido();
                                $consulta = $oPedido->listarPedido($filtroFecha);
                                foreach ($consulta as $registro) {
                                ?>
                                    <tr>
                                        <input type="text" value="<?php echo $registro['idPedido']; ?>" style="display:none;">
                                        <td><?php echo $registro['idPedido']; ?></td>
                                        <td><?php echo $registro['fechaPedido']; ?></td>
                                        <td><?php if ($registro['entregaPedido']) echo "SI";
                                            else echo "NO"; ?></td>
                                        <td>
                                            <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/detallePedido.php?idPedido=<?php echo $registro['idPedido']; ?>" class="btn btn-light"><i class="fas fa-barcode"></i> Detalle</a>
                                            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="comprobarPedido(<?php echo $registro['idPedido']; ?>)"><i class="fas fa-check-circle"></i> Validar Pedido</a>
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
        </div>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>