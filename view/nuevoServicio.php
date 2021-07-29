<?php
require_once 'headGerente.php';
require_once '../model/servicio.php';
$oServicio = new servicio();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/eliminar.js"></script>
    <title>SERVICIO</title>
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
                            <label for="" class="form-label">Codigo Servicio</label>
                            <input class="form-control" type="text" name="codigoServicio" placeholder="Codigo Servicio">
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" class="form-label">Servicio</label>
                            <input class="form-control" type="text" name="nombreServicio" placeholder="Nombre Servicio">
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" class="form-label">Detalle Servicio</label>
                            <input class="form-control" type="text" name="detalleServicio" placeholder="DetalleServicio">
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" class="form-label">Costo</label>
                            <input class="form-control" type="number" name="costo" placeholder="Costo">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success" name="funcion" value="crearServicio"><i class="far fa-save"></i> Guardar</button>
                    <a href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/listarServicio.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                </form>
            </div>
        </section>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>