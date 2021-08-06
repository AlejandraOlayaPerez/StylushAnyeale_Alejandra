<?php
require_once 'headPagina.php';
require_once '../model/producto.php';


date_default_timezone_set('America/Bogota');
if (isset($_GET['filtroFecha'])) {
    $filtroFecha = $_GET['filtroFecha'];
} else {
    $filtroFecha = Date("Y-m-d");
}

if (isset($_GET['filtroCodigoProducto'])) {
    $filtroCodigoProducto = $_GET['filtroCodigoProducto'];
} else {
    $filtroCodigoProducto = "";
}
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
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <?php
                require_once '../model/contarBD.php';
                $oContar = new contar();
                ?>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h1 class="tituloGrande">Productos</h1>
                                <?php $result = $oContar->contarProductos();
                                foreach ($result as $registro) {
                                ?>
                                    <p id="contarTabla"><?php echo $registro['totalProducto']; ?> </p>
                                <?php } ?>
                            </div>
                            <div class="icon">
                                <i class="fas fa-wine-bottle"></i>
                            </div>
                            <a href="listarProducto.php" class="small-box-footer">
                                Ver Lista <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h1 class="tituloGrande">Personal</h1>
                                <?php $result = $oContar->contarPersonal();
                                foreach ($result as $registro) {
                                ?>
                                    <p id="contarTabla"><?php echo $registro['totalPersonal']; ?> </p>
                                <?php } ?>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <a href="listarUsuario.php" class="small-box-footer">
                                Personal de trabajo <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h1 class="tituloGrande">Clientes</h1>
                                <?php $result = $oContar->contarCliente();
                                foreach ($result as $registro) {
                                ?>
                                    <p id="contarTabla"><?php echo $registro['totalCliente']; ?> </p>
                                <?php } ?>
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

                <hr>

                <div class="card">
                    <div class="card-header border-0">
                        <form action="" method="GET">
                            <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Ventas por fecha: </label>
                            <input type="date" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" name="filtroFecha" onchange="this.form.submit()" value="<?php echo $filtroFecha; ?>">
                        </form>
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
                            <tbody>
                                <?php
                                require_once '../model/factura.php';
                                $oFactura = new factura();
                                $result = $oFactura->mostrarFactura($filtroFecha);
                                if (count($result) > 0) {
                                foreach ($result as $registro) {
                                ?>
                                    <tr>
                                        <td><?php echo $registro['fechaFactura']; ?></td>
                                        <td><?php echo $registro['nombreProducto']; ?></td>
                                        <td><?php echo $registro['cantidad']; ?></td>
                                        <td><?php echo $registro['costoProducto']; ?></td>
                                    </tr>
                                    <?php }
                                } else { //en caso de que no tengo informacion, mostrara un mensaje
                                    ?>
                                    <!-- no hay ningun registro -->
                                    <tr>
                                        <td colspan="4" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">Busqueda no encontrada</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr>

                <div class="card">
                    <div class="card-header border-0">
                        <form action="" method="GET">
                            <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Busca un producto: </label>
                            <input type="text" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Puedes buscar por codigo o nombre del producto" name="filtroCodigoProducto" onchange="this.form.submit()" value="<?php echo $filtroCodigoProducto; ?>">
                        </form>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
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
                                $consulta = $oProducto->listarProducto($filtroCodigoProducto);
                                if (count($consulta) > 0) {
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
                                    <?php }
                                } else { //en caso de que no tengo informacion, mostrara un mensaje
                                    ?>
                                    <!-- no hay ningun registro -->
                                    <tr>
                                        <td colspan="6" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">Busqueda no encontrada</td>
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