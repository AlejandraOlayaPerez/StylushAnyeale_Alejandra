<?php
require_once 'headGerente.php';
require_once '../controller/productoServicioController.php';

$oUsuarioController = new usuarioController();
$oProducto = $oUsuarioController->consultarProducto($_GET['idProducto']);
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>EDITAR PRODUCTO</title>
</head>

<body>
    <div class="container">

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background-color: rgb(119, 167, 191);">
                        <div class="card-header">
                            <h1 class="card-title" style=" font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600;">EDITAR CARGO</h1>
                        </div>
                        <form id="quickForm" action="../controller/productoServicioController.php" method="GET">
                            <input type="text" name="IdProducto" value="<?php echo $_GET['idProducto']; ?>" style="display: none;">

                            <div class="row" style="margin: 5px; ">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Codigo Producto</label>
                                    <input class="form-control" type="text" name="codigoProducto" placeholder="Codigo Producto" value="<?php echo $oProducto->codigoProducto; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Tipo Producto</label>
                                    <select class="form-select" id="" name="tipoProducto">
                                        <option value="" disabled selected>Selecciones una opción</option>
                                        <option value="Venta" <?php if ($oProducto->tipoProducto == "Venta") {echo "selected";} ?>>Venta</option>
                                        <option value="Uso(Servicios)" <?php if ($oProducto->tipoProducto == "Uso(Servicios)") {echo "selected";} ?>>Uso(Servicio)</option>
                                    </select>
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Producto</label>
                                    <input class="form-control" type="text" name="nombreProducto" placeholder="Nombre Producto" value="<?php echo $oProducto->nombreProducto; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Cantidad</label>
                                    <input class="form-control" type="number" name="cantidad" placeholder="Cantidad" value="<?php echo $oProducto->cantidad; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Recomendaciones</label>
                                    <input class="form-control" type="text" name="Recomendaciones" placeholder="Recomendaciones" value="<?php echo $oProducto->recomendaciones; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Valor Unitario</label>
                                    <input class="form-control" type="text" name="valorUnitario" placeholder="Valor Unitario" value="<?php echo $oProducto->valorUnitario; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Costo Producto</label>
                                    <input class="form-control" type="text" name="costoProducto" placeholder="Costo Producto" value="<?php echo $oProducto->costoProducto; ?>">
                                </div>
                            </div>

                            <br>
                            <button type="submit" class="btn btn-success" name="funcion" value="actualizarProducto"><i class="far fa-save"></i> Guardar</button>
                            <a href="listarProducto.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>