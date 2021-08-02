<?php
require_once 'headPagina.php';
require_once '../model/producto.php';
$oProducto = new producto();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVO PRODUCTO</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">


                <div class="card card-primary">
                    <div class="card-header" style="background-color: rgb(249, 201, 242);">
                        <label class="card-title" style="-webkit-text-fill-color: black;">NUEVO PRODUCTO</label>
                    </div>
                    <form action="../controller/productoServicioController.php" method="GET">
                        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                            <div class="row" style="margin: 5px; ">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Codigo Producto</label>
                                    <input class="form-control" type="text" name="codigoProducto" placeholder="Codigo Producto">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Tipo Producto</label>
                                    <select class="form-select" id="" name="tipoProducto">
                                        <option value="" disabled selected>Selecciones una opción</option>
                                        <option value="Venta" <?php if ($oProducto->tipoProducto == "Venta") {
                                                                    echo "selected";
                                                                } ?>>Venta</option>
                                        <option value="Uso(Servicios)" <?php if ($oProducto->tipoProducto == "Uso(Servicios)") {
                                                                            echo "selected";
                                                                        } ?>>Uso(Servicio)</option>
                                    </select>
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Producto</label>
                                    <input class="form-control" type="text" name="nombreProducto" placeholder="Nombre Producto">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Cantidad</label>
                                    <input class="form-control" type="number" name="cantidad" placeholder="Cantidad">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Recomendaciones</label>
                                    <input class="form-control" type="text" name="Recomendaciones" placeholder="Recomendaciones">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Valor Unitario</label>
                                    <input class="form-control" type="text" name="valorUnitario" placeholder="Valor Unitario">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Costo Producto</label>
                                    <input class="form-control" type="text" name="costoProducto" placeholder="Costo Producto">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                            <a href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/listarProducto.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                            <button type="submit" class="btn btn-success" name="funcion" value="crearProducto"><i class="far fa-save"></i> Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>