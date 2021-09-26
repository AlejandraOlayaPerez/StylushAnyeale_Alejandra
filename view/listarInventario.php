<?php
require_once 'headPagina.php';

date_default_timezone_set('America/Bogota');
$fechaActual = Date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVENTARIO</title>
</head>

<body>
    <div class="container-fluid">

        <div class="card">

            <div class="card-header border-0" style="background-color: rgba(255, 255, 204, 255);">
                <div class="col col-md-6">
                    <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Fecha Inicio: </label>
                    <input type="date" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" id="fechaInicio" value="<?php echo $fechaActual; ?>" onchange="buscarFactura()">
                </div>
                <br>
                <div class="col col-md-6">
                    <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Fecha Final: </label>
                    <input type="date" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" id="fechaFinal" value="<?php echo $fechaActual; ?>" onchange="buscarFactura()">
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr style="background-color: rgb(249, 201, 242);">
                            <th>Fecha Venta</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody id="facturas">

                    </tbody>
                </table>
            </div>
        </div>

        <hr>
        <div class="card">
            <div class="card-header border-0" style="background-color: rgba(255, 255, 204, 255);">
                <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Busca un producto:</label>
                <input type="text" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Busca el codigo o nombre de un producto" value="" id="busquedaProducto" onkeyup="buscarProducto()">
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr style="background-color: rgb(249, 201, 242);">
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Valor Unitario</th>
                        </tr>
                    </thead>
                    <tbody id="productosBusqueda">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/inventario.js"></script>
    <script>
        buscarProducto();
        buscarFactura();
    </script>
    <?php require_once 'footer.php'; ?>