<?php
require_once 'headPagina.php';
require_once '../controller/productoServicioController.php';

$oProductoServicioController = new productoServicioController();
$oServicio = $oProductoServicioController->consultarServicio($_GET['IdServicio']);
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


                <div class="card card-primary">
                    <div class="card-header" style="background-color: rgb(249, 201, 242);">
                        <label class="card-title" style="-webkit-text-fill-color: black;">EDITAR SERVICIO</label>
                    </div>
                    <form action="../controller/productoServicioController.php" method="GET">
                        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                            <input type="text" name="IdServicio" value="<?php echo $_GET['IdServicio']; ?>" style="display:none">

                            <div class="row" style="margin: 5px; ">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Codigo Servicio</label>
                                    <input class="form-control" type="text" name="codigoServicio" placeholder="Codigo Servicio" value="<?php echo $oServicio->codigoServicio; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Servicio</label>
                                    <input class="form-control" type="text" name="nombreServicio" placeholder="Nombre Servicio" value="<?php echo $oServicio->nombreServicio; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Detalle Servicio</label>
                                    <input class="form-control" type="text" name="detalleServicio" placeholder="DetalleServicio" value="<?php echo $oServicio->detalleServicio; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Costo</label>
                                    <input class="form-control" type="number" name="costo" placeholder="Costo" value="<?php echo $oServicio->costo; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                        <a href="listarServicio.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                        <button type="submit" class="btn btn-success" name="funcion" value="actualizarServicio"><i class="fas fa-edit"></i> Actualizar Servicio</button>
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