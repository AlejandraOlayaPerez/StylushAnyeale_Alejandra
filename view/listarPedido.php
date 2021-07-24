<?php
require 'headGerente.php';

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/eliminar.js"></script>
    <title>PEDIDO</title>
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

        <br>

        <div class="col-md-12" style="background-color: rgb(249, 201, 242);">
            <div class="card">
                <div class="card-header" style="background-color: rgb(249, 201, 242);">
                    <h3 class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Pedidos</h1>
                </div>
                <div class="card-body p-0" style="background-color: rgb(119, 167, 191);">
                    <table class="table" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
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
                                        <a href="detallePedido.php?idPedido=<?php echo $registro['idPedido']; ?>" class="btn btn-warning"><i class="fas fa-info-circle"></i> Detalle</a>
                                        <a class="btn btn-light" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="comprobarPedido(<?php echo $registro['idPedido']; ?>)"><i class="fas fa-check-circle"></i> Validar Pedido</a>
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
</body>

</html>

<?php
require_once 'footerGerente.php';
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
                <form action="../controller/usuarioController.php" method="GET">
                    <input type="text" name="idPedido" id="validarPedido" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="funcion" value="validarPedido"><i class="fas fa-check-circle"></i>Validar Pedido</button>
                </form>
            </div>
        </div>
    </div>
</div>