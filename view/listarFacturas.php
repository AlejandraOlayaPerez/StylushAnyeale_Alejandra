<?php
require_once 'headGerente.php';

if (isset($_GET['filtroFactura'])) {
    $filtroFactura = $_GET['filtroFactura'];
} else {
    $filtroFactura = "";
}
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/permisoHabilitar.js"></script>
    <title>FACTURA</title>
</head>

<body>
    <div class="container">
        <div class="col-md-12" style="background-color: rgb(249, 201, 242);">
            <div class="card">
                <div class="card-header" style="background-color: rgb(249, 201, 242);">
                <form action="" method="GET">
                    <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Buscar factura: </label>
                    <input type="text" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Puedes buscar por el codigo de la factura" name="filtroFactura" onchange="this.form.submit()" value="<?php echo $filtroFactura; ?>">
                </form>
                </div>
                <div class="card-body p-0" style="background-color: rgb(119, 167, 191);">
                    <table class="table" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
                        <thead>
                            <tr style="background-color: rgb(249, 201, 242);">
                                <th>Codigo Factura</th>
                                <th>Fecha Factura</th>
                                <th>Responsable Factura</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            require_once '../model/factura.php';
                            require_once '../model/conexionDB.php';
                            $oFactura = new factura();
                            $consulta = $oFactura->listarFactura($filtroFactura);
                            foreach ($consulta as $registro) {
                            ?>
                                <tr>
                                    <input type="text" value="<?php echo $registro['idFactura']; ?>" style="display:none;">
                                    <td><?php echo $registro['codigoFactura']; ?></td>
                                    <td><?php echo $registro['fechaFactura']; ?></td>
                                    <td><?php echo ($registro['responsableFactura']) ?></td>
                                    <td><a href="" class="btn btn-warning"><i class="fas fa-print"></i> Imprimir</a></td>
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