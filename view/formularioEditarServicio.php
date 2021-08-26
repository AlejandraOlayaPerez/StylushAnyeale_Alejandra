<?php
require_once 'headPagina.php';
require_once '../model/servicio.php';
require_once '../controller/productoServicioController.php';

$oProductoServicioController = new productoServicioController();
$oServicio = $oProductoServicioController->consultarServicio($_GET['idServicio']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR SERVICIO</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card-header" style="background-color: rgb(249, 201, 242);">
                    <label class="card-title" style="-webkit-text-fill-color: black;">EDITAR SERVICIO</label>
                </div>
                <div class="card card-ligth">
                    <form action="../controller/productoServicioController.php" method="GET">
                        <input type="text" name="idServicio" value="<?php echo $_GET['idServicio']; ?>" style="display: none;">
                        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                            <div class="row">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label>Codigo Servicio: </label>
                                    <input class="form-control" type="text" name="codigoServicio" value="<?php echo $oServicio->codigoServicio; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label>Servicio: </label>
                                    <input class="form-control" type="text" name="nombreServicio" value="<?php echo $oServicio->nombreServicio; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label>Detalle: </label>
                                    <input class="form-control" type="text" name="detalleServicio" value="<?php echo $oServicio->detalleServicio; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Duracion Servicio</label>
                                    <select class="form-control" id="tiempoDuracion" name="tiempoDuracion" onchange="validarCampo(this);" required>
                                        <option value="" selected>Selecciones una opción</option>
                                        <option value="10" <?php if ($oServicio->tiempoDuracion == "10") {
                                                                echo "selected";
                                                            } ?>>10 MINUTOS</option>
                                        <option value="15" <?php if ($oServicio->tiempoDuracion == "15") {
                                                                echo "selected";
                                                            } ?>>15 MINUTOS</option>
                                        <option value="20" <?php if ($oServicio->tiempoDuracion == "20") {
                                                                echo "selected";
                                                            } ?>>20 MINUTOS</option>
                                        <option value="25" <?php if ($oServicio->tiempoDuracion == "25") {
                                                                echo "selected";
                                                            } ?>>25 MINUTOS</option>
                                        <option value="30" <?php if ($oServicio->tiempoDuracion == "30") {
                                                                echo "selected";
                                                            } ?>>30 MINUTOS</option>
                                        <option value="35" <?php if ($oServicio->tiempoDuracion == "35") {
                                                                echo "selected";
                                                            } ?>>35 MINUTOS</option>
                                        <option value="40" <?php if ($oServicio->tiempoDuracion == "40") {
                                                                echo "selected";
                                                            } ?>>40 MINUTOS</option>
                                        <option value="45" <?php if ($oServicio->tiempoDuracion == "45") {
                                                                echo "selected";
                                                            } ?>>45 MINUTOS</option>
                                        <option value="50" <?php if ($oServicio->tiempoDuracion == "50") {
                                                                echo "selected";
                                                            } ?>>50 MINUTOS</option>
                                        <option value="55" <?php if ($oServicio->tiempoDuracion == "55") {
                                                                echo "selected";
                                                            } ?>>55 MINUTOS</option>
                                        <option value="60" <?php if ($oServicio->tiempoDuracion == "60") {
                                                                echo "selected";
                                                            } ?>>60 MINUTOS</option>
                                    </select>
                                    <span id="tiempoDuracionSpan"></span>
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label>Costo: </label>
                                    <input class="form-control" type="text" name="costo" value="<?php echo $oServicio->costo; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                            <a href="listarServicio.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                            <button type="submit" class="btn btn-success" name="funcion" value="actualizarServicio"><i class="fas fa-edit"></i> Actualizar Servicio</button>
                        </div>
                    </form>
                </div>



                <div class="card border border-dark">
                    <div class="card-header" style="background-color: rgb(249, 201, 242); font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;">
                        <h1 class="card-title">EDITAR PRODUCTOS </h1>
                        <button type="button" class="btn btn-success  float-right" data-toggle="modal" data-target="#modal-default">Agregar Productos</button>
                    </div>
                    <form action="../controller/productoServicioController.php" method="GET">
                        <input type="text" name="idServicio" value="<?php echo $_GET['idServicio']; ?>" style="display: none;">

                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr style="background-color: rgb(249, 201, 242);">
                                        <th>Codigo</th>
                                        <th>productos</th>
                                        <th>cantidad</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody id="listarProducto">
                                    <?php
                                    require_once '../model/detalle.php';
                                    $oProductoServicioController = new productoServicioController();
                                    $oDetalle = $oProductoServicioController->consultarProductosIdServicio($_GET['idServicio']);
                                    if (count($oDetalle) > 0) {
                                        foreach ($oDetalle as $registro) {
                                    ?>
                                            <tr id="<?php echo $registro['idProducto']; ?>">
                                                <input type="text" name="idProducto" value="<?php echo $registro['idProducto']; ?>" style="display: none;">
                                                <td><?php echo $registro['codigoProducto']; ?></td>
                                                <td><?php echo $registro['producto']; ?></td>
                                                <td><input class="form-control" type="number" value="<?php echo $registro['cantidad']; ?>"></td>
                                                <td><input type="button" class="btn btn-danger" value="Eliminar" onclick="eliminarTR(<?php echo $registro['idProducto']; ?>)"></td>
                                            </tr>
                                        <?php } ?>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <button type="submit" style="margin-bottom: 5px; margin-left: 5px;" class="btn btn-success" name="funcion" value="actualizarServicioProducto"><i class="fas fa-edit"></i> Actualizar Productos</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Productos</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table align-middle table-responsive">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Codigo</th>
                                <th>Producto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once '../model/producto.php';
                            require_once '../model/conexiondb.php';

                            $oProducto = new producto();
                            $Consulta = $oProducto->mostrarProducto2();
                            foreach ($Consulta as $registro) {
                            ?>

                                <tr>
                                    <td><button type="button" class="btn btn-success" data-dismiss="modal" onclick="agregarProducto('<?php echo $registro['IdProducto'] ?>','<?php echo $registro['codigoProducto']; ?>','<?php echo $registro['nombreProducto']; ?>')">Agregar</button></td>
                                    <td><?php echo $registro['codigoProducto']; ?></td>
                                    <td><?php echo $registro['nombreProducto']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>