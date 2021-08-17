<?php
require_once 'headPagina.php';

if (isset($_GET['filtroFactura'])) {
    $filtroFactura = $_GET['filtroFactura'];
} else {
    $filtroFactura = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACTURAS</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header border-0">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Buscar factura: </label>
                                    <input type="text" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Puedes buscar por el codigo de la factura" name="filtroFactura" onchange="this.form.submit()" value="<?php echo $filtroFactura; ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
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
                            if (count($consulta) > 0) {
                            foreach ($consulta as $registro) {
                            ?>
                                <tr>
                                    <input type="text" value="<?php echo $registro['idFactura']; ?>" style="display:none;">
                                    <td><?php echo $registro['codigoFactura']; ?></td>
                                    <td><?php echo $registro['fechaFactura']; ?></td>
                                    <td><?php echo ($registro['responsableFactura']) ?></td>
                                    <td><a href="" class="btn btn-light"><i class="fas fa-print"></i> Detalle</a>
                                    <a href="" class="btn btn-warning"><i class="fas fa-print"></i> Imprimir</a></td>
                                </tr>
                                <?php }
                                } else { //en caso de que no tengo informacion, mostrara un mensaje
                                    ?>
                                    <!-- no hay ningun registro -->
                                    <tr>
                                        <td colspan="4" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay facturas disponibles</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
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