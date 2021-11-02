<?php require_once 'headproducto.php'; ?>

<div class="row">
    <div class="col col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb estilo">
                <li class="breadcrumb-item"><a href="paginaprincipalcliente.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="vistaproducto.php">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Compras Recientes</li>

            </ol>
        </nav>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body table-responsive p-0">
        <table class="table colorestabla">
            <thead>
                <tr class="estiloTr">
                    <th>Codigo</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../controller/productoserviciocontroller.php';
                $oProductoServicioController = new productoServicioController();
                $consultas = $oProductoServicioController->facturaIdCliente($_SESSION['idCliente']);
                foreach ($consultas as $registro) {
                ?>
                    <tr>
                        <td><?php echo $registro['idFactura']; ?></td>
                        <td><?php echo $registro['fechaCreacion']; ?></td>
                        <td><?php echo $registro['horaCreacion']; ?></td>
                        <td><?php echo $registro['valorTotal']; ?></td>
                        <td><?php if ($registro['estado'] == 1) echo "Factura activa"; ?>
                            <?php if ($registro['estado'] == 2) echo "Factura pendiente"; ?>
                            <?php if ($registro['estado'] == 3) echo "Factura paga"; ?>
                            <?php if ($registro['estado'] == 4) echo "Factura cancelada"; ?></td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
</div>









<?php require_once 'footercliente.php'; ?>