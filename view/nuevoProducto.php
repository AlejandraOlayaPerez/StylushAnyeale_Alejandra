<?php
require_once 'headGerente.php';
require_once '../model/producto.php';
$oProducto=new producto();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/eliminar.js"></script>
    <title>RESERVACIONES</title>
</head>

<body>
    <div class="container">
        <section class="content">

            <div class="card" style="background-color: rgb(119, 167, 191);">
                <div class="card-header">
                    <h1 class="card-title" style=" font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600;">NUEVO ROL</h1>
                </div>
                <form action="../controller/productoServicioController.php" method="GET">
                    <div class="row" style="margin: 5px; ">
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" class="form-label">Codigo Producto</label>
                            <input class="form-control" type="text" name="codigoProducto" placeholder="Codigo Producto">
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" class="form-label">Tipo Producto</label>
                            <select class="form-select" id="" name="tipoProducto">
                                <option value="" disabled selected>Selecciones una opción</option>
                                <option value="Venta" <?php if($oProducto->tipoProducto=="Venta"){ echo "selected";} ?> >Venta</option>
                                <option value="Uso(Servicios)" <?php if($oProducto->tipoProducto=="Uso(Servicios)"){ echo "selected";} ?> >Uso(Servicio)</option>
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
                    </div> <br>
                    <button type="submit" class="btn btn-success" name="funcion" value="crearProducto"><i class="far fa-save"></i> Guardar</button>
                    <a href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/listarProducto.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                </form>
            </div>
        </section>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>