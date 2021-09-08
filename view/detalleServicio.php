<?php
require_once 'headPagina.php';
require_once '../model/servicio.php';
require_once '../controller/productoServicioController.php';

$idServicio = $_GET['idServicio'];

$oProductoServicioController = new productoServicioController();
$oServicio = $oProductoServicioController->consultarServicio($idServicio);
?>

<head>
    <title>DETALLE SERVICIO</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card-header" style="background-color: rgb(249, 201, 242);">
            <label class="card-title" style="-webkit-text-fill-color: black;">DETALLE SERVICIO</label>
        </div>
        <div class="card card-ligth">
            <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                <div class="row">
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label>Codigo Servicio: </label>
                        <input class="form-control" type="text" value="<?php echo $oServicio->codigoServicio; ?>" disabled>
                    </div>
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label>Servicio: </label>
                        <input class="form-control" type="text" value="<?php echo $oServicio->nombreServicio; ?>" disabled>
                    </div>
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label>Detalle: </label>
                        <input class="form-control" type="text" value="<?php echo $oServicio->detalleServicio; ?>" disabled>
                    </div>
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label>Tiempo Duracion: </label>
                        <input class="form-control" type="text" value="<?php echo $oServicio->tiempoDuracion; ?> Minutos" disabled>
                    </div>
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label>Costo: </label>
                        <input class="form-control" type="text" value="<?php echo $oServicio->costo; ?>" disabled>
                    </div>
                </div>
            </div>
            <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
            </div>
        </div>

        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr style="background-color: rgb(249, 201, 242);">
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../model/detalle.php';
                        $oProproductoServicioController = new productoServicioController();
                        $oDetalle = $oProductoServicioController->consultarServicioIdServicio($idServicio);
                        if (count($oDetalle) > 0) {
                            foreach ($oDetalle as $registro) {
                        ?>
                                <tr>
                                    <td><?php echo $registro['codigoProducto']; ?></td>
                                    <td><?php echo $registro['producto']; ?></td>
                                    <td><?php echo $registro['cantidad']; ?></td>
                                    <td><?php echo $registro['precio']; ?></td>
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
        <a href="listarServicio.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>