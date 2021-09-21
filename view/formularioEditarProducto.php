<?php
require_once 'headPagina.php';
require_once '../controller/productoServicioController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/editarProducto.css" type="text/css">
    <title>Stylush Anyeale</title>
</head>

<body>
    <div class="container-fluid">

        <!--editar informacion producto-->

        <div class="card-body">
            <?php
            require_once '../controller/productoServicioController.php';
            $oProductoServicioController = new productoServicioController();
            $oProducto = $oProductoServicioController->consultarProducto($_GET['idProducto']);
            ?>
            <form action="../controller/productoServicioController.php" method="GET">
                <input type="text" name="IdProducto" value="<?php echo $_GET['idProducto']; ?>" style="display: none;">

                <div class="row" style="margin: 5px; ">
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Codigo Producto</label>
                        <input class="form-control" type="text" id="codigoProducto" name="codigoProducto" value="<?php echo $oProducto->codigoProducto; ?>" placeholder="Codigo Producto" onchange="validarCampo(this);" required maxlength="20">
                        <span id="codigoProductoSpan"></span>
                    </div>
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Producto</label>
                        <input class="form-control" type="text" id="nombreProducto" name="nombreProducto" value="<?php echo  $oProducto->nombreProducto; ?>" placeholder="Nombre Producto" onchange="validarCampo(this);" required maxlength="50" minlength="2">
                        <span id="nombreProductoSpan"></span>
                    </div>
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Producto</label>
                        <input class="form-control" type="text" id="cantidad" name="cantidad" value="<?php echo  $oProducto->cantidad; ?>" placeholder="Cantidad" onchange="validarCampo(this);" required minlength="1">
                        <span id="cantidadSpan"></span>
                    </div>
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Descripcion Producto</label>
                        <textarea class="form-control" rows="3" type="text" id="descripcion" name="descripcion" value="<?php echo $oProducto->descripcionProducto; ?>" placeholder="Describe el producto" onchange="validarCampo(this);" required minlength="10" maxlength="500"></textarea>
                        <span id="descripcionSpan"></span>
                    </div>
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Caracteristicas</label>
                        <textarea class="form-control " rows="3" type="text" id="caracteristicas" name="caracteristicas" value="<?php echo $oProducto->caracteristicas; ?>" placeholder="Describe las caracteristicas del producto" onchange="validarCampo(this);" required minlength="10" maxlength="500"></textarea>
                        <span id="caracteristicasSpan"></span>
                    </div>
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Valor Unitario</label>
                        <input class="form-control" type="text" id="valorUnitario" name="valorUnitario" value="<?php echo $oProducto->valorUnitario; ?>" placeholder="Valor Unitario" onchange="validarCampo(this);" required>
                        <span id="valorUnitarioSpan"></span>
                    </div>
                </div>

                <button style="margin: 5px;" class="btn btn-success float-right" type="button" onclick="validarInformacion"><i class="fas fa-edit"></i> Actualizar Informacion</button>

            </form>
        </div>

        <!--editar imagenes producto-->

        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-success float-right"><i class="fas fa-plus-circle"></i> Agregar imagen</button>
            </div>
            <form>
                <div class="card-body">
                    <div id="main-content" class="file_manager">
                        <div class="container">
                            <div class="row clearfix" id="imagenCard">
                                <?php
                                require_once '../controller/imagenController.php';
                                $oImagenController = new imagenController();
                                $consulta = $oImagenController->consultarImagenesId($_GET['idProducto']);
                                foreach ($consulta as $registro) {
                                ?>
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="file">
                                                <a href="javascript:void(0);">
                                                    <div class="hover">
                                                        <button type="button" class="btn btn-icon btn-danger" onclick="eliminarFoto(<?php echo $registro['idFoto']; ?>);">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                    <div class="image">
                                                        <img src="../<?php echo $registro['fotoProducto']; ?>" alt="img" class="img-fluid" style="width=100px; height=auto; max-height=100px">
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>




        <!--Editar tags-->
    </div>
</body>

</html>

<?php require_once 'footer.php'; ?>