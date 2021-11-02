<?php
require_once 'headpagina.php';
require_once '../controller/productoserviciocontroller.php';
$oProductoServicioController = new productoServicioController();

if (isset($_GET['vista'])) {
    $vista = $_GET['vista'];
}
?>

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/stylushanyeale_alejandra/assets/css/anyealecss/estados.min.css" type="text/css">
</head>

<div class="container-fluid">
    <div id="user-profile-2" class="user-profile">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
                <li class="<?php if ($vista == "activas") echo "active"; ?>">
                    <a data-toggle="tab" href="#home">
                        <i class="fas fa-check-circle"></i>
                        Facturas Activas
                    </a>
                </li>

                <li class="<?php if ($vista == "pendiente") echo "active"; ?>">
                    <a data-toggle="tab" href="#feed">
                        <i class="fas fa-clock"></i>
                        Facturas Pendientes
                    </a>
                </li>

                <li class="<?php if ($vista == "pago") echo "active"; ?>">
                    <a data-toggle="tab" href="#friends">
                        <i class="fas fa-file-invoice-dollar"></i>
                        Facturas Pagas
                    </a>
                </li>

                <li class="<?php if ($vista == "canceladas") echo "active"; ?>">
                    <a data-toggle="tab" href="#pictures">
                        <i class="fas fa-window-close"></i>
                        Facturas Canceladas
                    </a>
                </li>
            </ul>

            <div class="tab-content no-border padding-24">
                <div id="home" class="tab-pane <?php if ($vista == "activas") echo "in active"; ?>">

                    <table class="table colorestabla">
                        <thead>
                            <tr class="estiloTr">
                                <th>Factura</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $activas = $oProductoServicioController->facturaActivas();
                            foreach ($activas as $registro) {
                            ?>
                                <tr>
                                    <td><?php echo $registro['idFactura']; ?></td>
                                    <td><?php echo $registro['fechaCreacion']; ?></td>
                                    <td><?php if ($registro['estado'] == 1) echo "Factura activa"; ?></td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>

                </div>

                <div id="feed" class="tab-pane <?php if ($vista == "pendiente") echo "in active"; ?>">
                    <table class="table colorestabla">
                        <thead>
                            <tr class="estiloTr">
                                <th>Factura</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pendiente = $oProductoServicioController->facturasPendiente();
                            foreach ($pendiente as $registro) {
                            ?>
                                <tr>
                                    <td><?php echo $registro['idFactura']; ?></td>
                                    <td><?php echo $registro['fechaCreacion']; ?></td>
                                    <td><?php if ($registro['estado'] == 2) echo "Factura pendiente"; ?></td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>

                <div id="friends" class="tab-pane <?php if ($vista == "pago") echo "in active"; ?>">
                    <table class="table colorestabla">
                        <thead>
                            <tr class="estiloTr">
                                <th>Factura</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pagas = $oProductoServicioController->facturasPagas();
                            foreach ($pagas as $registro) {
                            ?>
                                <tr>
                                    <td><?php echo $registro['idFactura']; ?></td>
                                    <td><?php echo $registro['fechaCreacion']; ?></td>
                                    <td><?php if ($registro['estado'] == 3) echo "Factura paga"; ?></td>

                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>

                <div id="pictures" class="tab-pane <?php if ($vista == "canceladas") echo "active"; ?>">
                    <table class="table colorestabla">
                        <thead>
                            <tr class="estiloTr">
                                <th>Factura</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $canceladas = $oProductoServicioController->facturasCanceladas();
                            foreach ($canceladas as $registro) {
                            ?>
                                <tr>
                                    <td><?php echo $registro['idFactura']; ?></td>
                                    <td><?php echo $registro['fechaCreacion']; ?></td>
                                    <td><?php if ($registro['estado'] == 4) echo "Factura cancelada"; ?></td>

                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <a href="listarfacturas.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
</div>