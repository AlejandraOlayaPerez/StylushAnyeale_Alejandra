<?php
require_once 'headpagina.php';
require_once 'linkhead.php';
require_once '../model/producto.php';
require_once '../controller/productoserviciocontroller.php';

if (isset($_GET['ventana'])) { //
    $ventana = $_GET['ventana'];
} else {
    $ventana = "informacion";
}

$oProductoServicioController = new productoServicioController();
$oProducto = $oProductoServicioController->consultarProducto($_GET['idProducto']);
$oTags = $oProductoServicioController->consultarTagsidProducto($_GET['idProducto']);
?>

<body>
    <div class="container-fluid">
        <div class="card cardHeader">
            <div class="card-header">
                <h2>Actualizar Producto</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5 col-sm-3">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link textLink <?php if ($ventana == "informacion") echo "active"; ?>" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Informacion</a>
                            <a class="nav-link textLink <?php if ($ventana == "tags") echo "active"; ?>" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Tags</a>
                            <a class="nav-link textLink <?php if ($ventana == "categoria") echo "active"; ?>" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Categoria</a>
                            <a class="nav-link textLink <?php if ($ventana == "foto") echo "active"; ?>" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Imagenes</a>
                        </div>
                    </div>
                    <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            <div class="tab-pane text-left fade show <?php if ($ventana == "informacion") echo "active"; ?>" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                <form action="../controller/productoServicioController.php" method="GET">
                                    <input type="text" name="idProducto" value="<?php echo $_GET['idProducto']; ?> " style="display: none;">
                                    <div class="row" style="margin: 5px;">
                                        <div class="col col-xl-4 col-md-6 col-12">
                                            <label for="" class="form-label">Codigo Producto</label>
                                            <input class="form-control" type="text" id="codigoProducto" name="codigoProducto" placeholder="Codigo Producto" value="<?php echo $oProducto->codigoProducto; ?>" onchange="validarCampo(this);" required maxlength="20">
                                            <span id="codigoProductoSpan"></span>
                                        </div>
                                        <div class="col col-xl-4 col-md-6 col-12">
                                            <label for="" class="form-label">Producto</label>
                                            <input class="form-control" type="text" id="nombreProducto" name="nombreProducto" placeholder="Nombre Producto" value="<?php echo $oProducto->nombreProducto; ?>" onchange="validarCampo(this);" required maxlength="50" minlength="2">
                                            <span id="nombreProductoSpan"></span>
                                        </div>
                                        <div class="col col-xl-4 col-md-6 col-12">
                                            <label for="" class="form-label">Descripcion Producto</label>
                                            <textarea class="form-control" rows="3" type="text" id="descripcion" name="descripcion" placeholder="Describe el producto" onchange="validarCampo(this);" required minlength="10" maxlength="500"><?php echo htmlspecialchars ($oProducto->descripcionProducto); ?></textarea>
                                            <span id="descripcionSpan"></span>
                                        </div>
                                        <div class="col col-xl-4 col-md-6 col-12">
                                            <label for="" class="form-label">Caracteristicas</label>
                                            <textarea class="form-control " rows="3" type="text" id="caracteristicas" name="caracteristicas" placeholder="Describe las caracteristicas del producto"  onchange="validarCampo(this);" required minlength="10" maxlength="500"><?php echo htmlspecialchars ($oProducto->caracteristicas); ?></textarea>
                                            <span id="caracteristicasSpan"></span>
                                        </div>
                                        <div class="col col-xl-4 col-md-6 col-12">
                                            <label for="" class="form-label">Valor Unitario</label>
                                            <div class="input-group m-b-0">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                                </div>
                                                <input class="form-control" type="text" id="valorUnitario" name="valorUnitario" placeholder="Valor Unitario" value="<?php echo $oProducto->valorUnitario; ?>" onkeyup="separadorMilesCuadroTexto(this);" required>
                                            </div>
                                            <span id="valorUnitarioSpan"></span>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success float-right" name="funcion" value="actualizarProducto"><i class="fas fa-edit"></i> Actualizar Informacion</button>
                                </form>
                            </div>
                            <div class="tab-pane <?php if ($ventana == "tags") echo "active"; ?>" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                <form action="../controller/productoServicioController.php" method="GET">
                                    <input type="text" name="idProducto" value="<?php echo $_GET['idProducto']; ?> " style="display: none;">
                                    <div class="form-group">
                                        <label for="" class="form-label">Etiquetas (Tags)</label>
                                        <select class="form-control select2" multiple="multiple" data-placeholder="Seleccione las etiquetas" id="tags" name="tags[]" onchange="validarCampo(this);" required>
                                            <option disabled>Seleccione las etiquetas</option>
                                            <?php
                                            foreach ($oTags as $registro) {
                                            ?>
                                                <option value="<?php echo $registro['idTags']; ?>" <?php if ($registro['idProducto'] != "") {
                                                                                                        echo "selected";
                                                                                                    } ?>><?php echo $registro['tags']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <span id="tagsSpan"></span>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success float-right" name="funcion" value="actualizarTagsProducto"><i class="fas fa-edit"></i> Actualizar Tags</button>
                                </form>
                            </div>
                            <div class="tab-pane <?php if ($ventana == "categoria") echo "active"; ?>" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                                <form action="../controller/productoServicioController.php" method="GET">
                                    <input type="text" name="idProducto" value="<?php echo $_GET['idProducto']; ?> " style="display: none;">
                                    <?php
                                    require_once '../model/categoria.php';
                                    $oCategoria = new categoria();
                                    $consulta = $oCategoria->categoria();
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="" class="form-label">Categoria</label>
                                            <select class="form-control" id="idCategoria" name="idCategoria" onchange="validarCampo(this);" required>
                                                <option selected>Selecciones una opción</option>
                                                <?php

                                                foreach ($consulta as $registro) {
                                                ?>
                                                    <option value="<?php echo $registro['idCategoria']; ?>" <?php if ($oProducto->idCategoria == $registro['idCategoria']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $registro['nombreCategoria']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success float-right" name="funcion" value="actualizarCategoriaProducto"><i class="fas fa-edit"></i> Actualizar Categoria</button>
                                </form>
                            </div>
                            <div class="tab-pane <?php if ($ventana == "foto") echo "active"; ?>" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                                <form action="../controller/productoServicioController.php" method="POST">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="listarproducto.php" class="btn btn-dark float-left"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
    </div>
</body>

</html>

<?php require_once 'footer.php'; ?>
<?php require_once 'linkjs.php'; ?>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>

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
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Buscar: </label>
                        <input type="text" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Busca un producto por Codigo o Nombre" class="form-control" id="producto" name="producto" onkeyup="productoConsultar()">
                    </div>
                </div>

                <hr>

                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Codigo</th>
                            <th>Producto</th>
                        </tr>
                    </thead>
                    <tbody id="productoResultado">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>