<?php
require_once 'headPagina.php';
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
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr style="background-color: rgb(249, 201, 242);">
                                    <th>Codigo Pedido</th>
                                    <th>Fecha Pedido</th>
                                    <th>¿Pedido recibido?</th>
                                    <th><a class="btn btn-info" href="nuevoPedido.php"><i class="fas fa-user-plus"></i> Crear Pedido</a></th>
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
                                        <td><?php echo $registro['fechaPedido']; ?></td>
                                        <td><?php if ($registro['entregaPedido']) echo "SI";
                                            else echo "NO"; ?></td>
                                        <td>
                                            <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/detallePedido.php?idPedido=<?php echo $registro['idPedido']; ?>" class="btn btn-light"><i class="fas fa-barcode"></i> Detalle</a>
                                            <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/formularioEditarPedido.php?idPedido=<?php echo $registro['idPedido']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
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