<?php
require_once 'headGerente.php';
require_once '../controller/productoServicioController.php';

$oUsuarioController = new usuarioController();
$oServicio = $oUsuarioController->consultarServicio($_GET['idServicio']);
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>EDITAR SERVICIO</title>
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
                            <input type="text" name="IdServicio" value="<?php echo $_GET['idServicio']; ?>" style="display:none">

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

                            <br>
                            <button type="submit" class="btn btn-success" name="funcion" value="actualizarServicio"><i class="far fa-save"></i> Guardar</button>
                            <a href="listarServicio.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
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