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
    <title>Informacion Empleado</title>
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

        <table class="table table-striped" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
            <thead>
                <tr>
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
                        <td><?php echo $registro['codigoPedido']; ?></td>
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
        <a href="home/paginaPrincipalGerente.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>