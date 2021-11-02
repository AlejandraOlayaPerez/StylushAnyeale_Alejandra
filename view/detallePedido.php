<?php
require_once 'headpagina.php';
require_once '../controller/pedidocontroller.php';
$oPedidoController = new pedidoController();
$oPedido = $oPedidoController->consultarPedidoId($_GET['idPedido']);
?>

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/stylushanyeale_alejandra/assets/css/anyealecss/detallepedido.min.css" type="text/css">
</head>

<body>
    <div class="container-fluid">
        <div class="page-header">
            <h1 class="page-title tituloPedido">
                Pedido
                <small class="page-info">
                    <i class="fas fa-arrow-right"></i>
                    <?php echo $oPedido->idPedido; ?>
                </small>
            </h1>
            <a class="btn btn-info" onclick="javascript:window.print()">
                <i class="fas fa-print"></i>
                Imprimir
            </a>
        </div>


        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center tituloInformacion">
                            <i class="fas fa-info fa-2x text-info-m2 mr-1"></i>
                            <span class="text-default-d3">Informacion del pedido</span>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <span class="text-md textPedido align-middle">Fecha: </span>
                            <span class="textPedido2 align-middle"><?php echo $oPedido->fechaPedido; ?></span>
                        </div>
                        <div>
                            <span class="text-md textPedido align-middle">Documento: </span>
                            <span class="textPedido2 align-middle"><?php echo $oPedido->documentoIdentidad; ?></span>
                        </div>
                        <div>
                            <span class="text-md textPedido align-middle">Responsable: </span>
                            <span class="textPedido2 align-middle"><?php echo $oPedido->responsablePedido; ?></span>
                        </div>
                    </div>

                    <div class="col-md-6 align-self-start d-md-flex justify-content-end">
                        <div>
                            <div>
                                <span class="text-md textPedido align-middle">Nit: </span>
                                <span class="textPedido2 align-middle"><?php echo $oPedido->Nit; ?></span>
                            </div>
                            <div>
                                <span class="text-md textPedido align-middle">Empresa: </span>
                                <span class="textPedido2 align-middle"><?php echo $oPedido->empresa; ?></span>
                            </div>
                            <div>
                                <span class="text-md textPedido align-middle">Nit: </span>
                                <span class="textPedido2 align-middle"><?php echo $oPedido->direccion; ?></span>
                            </div>

                        </div>
                    </div>
                </div>

                <br>

                <div class="card">
                    <div class="card-body table-responsive p-0" style="height: 200px;">
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
                                $consulta = $oPedidoController->consultarPorPedidoProducto($_GET['idPedido']);
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
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row" style="height: 200px;">
                    <div class="col-md-6">
                        <span class="text-md textPedido align-middle">Informacion de pago </span>
                        <div>
                            <span class="text-md textPedido align-middle">Total: </span>
                            <span class="textPedido2 align-middle">$<?php echo $total; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="listarpedido.php" style="height: 50px;" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
    </div>
</body>