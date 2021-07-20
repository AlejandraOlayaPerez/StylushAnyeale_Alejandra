<?php
require_once 'headGerente.php';
if (isset($_GET['ventana'])) { //
    $ventana = $_GET['ventana'];
} else {
    $ventana = "inventario";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/eliminar.js"></script>
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/contarTabla.js"></script>
    <title>INVENTARIO</title>
</head>

<body>
    <div class="container">
        <br>

        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h1 class="tituloGrande">Productos</h1>
                        <p id="contarTabla"> </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-wine-bottle"></i>
                    </div>
                    <a href="listarProductos.php" class="small-box-footer">
                        Ver Lista <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h1 class="tituloGrande">Personal</h1>
                        <p></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <a href="listarCargo.php" class="small-box-footer">
                        Personal de trabajo <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h1 class="tituloGrande">Clientes</h1>
                        <p></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="listarClientes.phpp" class="small-box-footer">
                        Registro Clientes <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="row">

            <div class="col-md-6" style="background-color: rgb(249, 201, 242);">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(249, 201, 242);">
                        <h3 class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Ventas del dia</h1>
                    </div>
                    <div class="card-body p-0" style="background-color: rgb(119, 167, 191);">
                        <table class="table" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
                            <thead>
                                <tr style="background-color: rgb(249, 201, 242);">
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

        <div class="col-md-12" style="background-color: rgb(249, 201, 242);">
            <div class="card">
                <div class="card-header" style="background-color: rgb(249, 201, 242);">
                    <h3 class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Inventario</h1>
                </div>
                <div class="card-body p-0" style="background-color: rgb(119, 167, 191);">
                    <table class="table" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
                        <thead>
                            <tr style="background-color: rgb(249, 201, 242);">
                                <th>Codigo</th>
                                <th>Categoria_Producto</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Costo Producto</th>
                                <th>Valor Unitario</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            require_once '../model/producto.php';
                            $oProducto = new producto();
                            $consulta = $oProducto->listarProducto();
                            foreach ($consulta as $registro) {
                            ?>
                                <tr>
                                    <td><?php echo $registro['codigoProducto']; ?></td>
                                    <td><?php echo $registro['tipoProducto']; ?></td>
                                    <td><?php echo $registro['nombreProducto']; ?></td>
                                    <td><?php echo $registro['cantidad']; ?></td>
                                    <td><?php echo $registro['costoProducto']; ?></td>
                                    <td><?php echo $registro['valorUnitario']; ?></td>
                                </tr>
                            <?php } ?>
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
require_once 'footerGerente.php';
?>