<?php require_once 'headpagina.php'; ?>

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/stylushanyeale_alejandra/assets/css/anyealecss/detallefactura.min.css" type="text/css">
</head>

<div class="container">
    <?php
    require_once '../controller/productoserviciocontroller.php';
    $oProductoServicioController = new productoServicioController();
    $oFactura = $oProductoServicioController->consultarFactura($_GET['idFactura']);
    ?>

    <div class="receipt-main col-md-12 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
        <div class="row">
            <div class="receipt-header receipt-header-mid">
                <div class="col-md-12">
                    <div class="receipt-right">
                        <h5>Facturas </h5>
                        <p><b>Codigo:</b> <?php echo $oFactura->idFactura; ?></p>
                        <p><b>Fecha creacion:</b> <?php echo $oFactura->fechaCreacion; ?></p>
                        <p><b>Fecha modificar:</b> <?php echo $oFactura->fechaModificar; ?></p>
                        <p><b>Estado:</b>
                            <?php
                            if ($oFactura->estado == 1) {
                                echo "Factura activa";
                            }
                            if ($oFactura->estado == 2) {
                                echo "Factura pendiente";
                            }
                            if ($oFactura->estado == 3) {
                                echo "Factura pagada";
                            }
                            if ($oFactura->estado == 4) {
                                echo "Factura cancelada";
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <br>
                <a class="btn btn-info" onclick="javascript:window.print()">
                    <i class="fas fa-print"></i>
                    Imprimir
                </a>
            </div>
        </div>

        <hr>

        <div>
            <div class="card-body table-responsive p-0">
                <table class="table">
                    <thead class="tablaHead">
                        <tr>
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody class="tablatbody">
                        <?php
                        $consulta = $oProductoServicioController->consultarProductosFactura($_GET['idFactura']);
                        $total = 0;
                        foreach ($consulta as $registro) {
                        ?>
                            <tr>
                                <td><?php echo $registro['codigoProducto']; ?></td>
                                <td><?php echo $registro['producto']; ?></td>
                                <td><?php echo $registro['cantidad']; ?></td>
                                <td><?php echo $registro['precio']; ?></td>
                                <?php
                                $sumaCantidad = $registro['cantidad'] + $registro['precio'];
                                $total += $sumaCantidad;
                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="3">Total:</td>
                            <td>$<?php echo $total; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="listarfacturas.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
</div>