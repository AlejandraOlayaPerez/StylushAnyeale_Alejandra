<?php
require_once 'headpagina.php';
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

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/stylushanyeale_alejandra/assets/css/anyealecss/editarproducto.min.css" type="text/css">
</head>

<body>
    <div class="container-fluid">
        <div class="card tabsHeader">
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
                        </div>
                    </div>
                    <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            <div class="tab-pane text-left fade show <?php if ($ventana == "informacion") echo "active"; ?>" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                <form action="../controller/productoServicioController.php" method="GET" id="formInformacion" novalidate>
                                    <input type="text" name="idUser" value="<?php echo $_SESSION['idUser']; ?>" style="display: none;">
                                    <input type="text" name="funcion" value="actualizarProducto" style="display: none;">
                                    <input type="text" name="idProducto" value="<?php echo $_GET['idProducto']; ?> " style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Codigo Producto<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="codigoProducto" name="codigoProducto" placeholder="Codigo Producto" value="<?php echo $oProducto->codigoProducto; ?>" onchange="validarCampo(this);" required maxlength="20">
                                            <span id="codigoProductoSpan"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Producto<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="nombreProducto" name="nombreProducto" placeholder="Nombre Producto" value="<?php echo $oProducto->nombreProducto; ?>" onchange="validarCampo(this);" required maxlength="50" minlength="2">
                                            <span id="nombreProductoSpan"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Descripcion Producto<span class="text-danger">*</span></label>
                                            <textarea class="form-control" rows="2" type="text" id="descripcion" name="descripcionProducto" placeholder="Describe el producto" onchange="validarCampo(this);" required minlength="10" maxlength="500"><?php echo htmlspecialchars($oProducto->descripcionProducto); ?></textarea>
                                            <span id="descripcionSpan"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Caracteristicas<span class="text-danger">*</span></label>
                                            <textarea id="summernote" class="form-control" type="text" id="caracteristicas" name="caracteristicas" placeholder="Describe las caracteristicas del producto" onchange="validarCampo(this);" required minlength="10" maxlength="500"><?php echo htmlspecialchars($oProducto->caracteristicas); ?></textarea>
                                            <span id="summernoteSpan"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-xl-4 col-md-6 col-12">
                                            <label for="" class="form-label">Valor Unitario<span class="text-danger">*</span></label>
                                            <div class="input-group m-b-0">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                                </div>
                                                <input class="form-control" type="text" id="valorUnitario" name="valorUnitario" placeholder="Valor Unitario" value="" onkeyup="separadorMilesCuadroTexto(this);" required>
                                            </div>
                                            <span id="valorUnitarioSpan"></span>
                                        </div>
                                        <div class="col col-xl-4 col-md-6 col-12">
                                            <label for="" class="form-label">Costo<span class="text-danger">*</span></label>
                                            <div class="input-group m-b-0">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                                </div>
                                                <input class="form-control" type="text" id="costoProducto" name="costoProducto" placeholder="CostoProducto" value="" onkeyup="separadorMilesCuadroTexto(this);" required>
                                            </div>
                                            <span id="costoProductoSpan"></span>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success float-right" onclick="validarPagina2();"><i class="fas fa-edit"></i> Actualizar Informacion</button>
                                </form>
                            </div>
                            <div class="tab-pane <?php if ($ventana == "tags") echo "active"; ?>" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                <form action="../controller/productoServicioController.php" method="GET" id="formTags" novalidate>
                                    <input type="text" name="idUser" value="<?php echo $_SESSION['idUser']; ?>" style="display: none;">
                                    <input type="text" name="funcion" value="actualizarTagsProducto" style="display: none;">
                                    <input type="text" name="idProducto" value="<?php echo $_GET['idProducto']; ?> " style="display: none;">
                                    <div class="form-group">
                                        <label for="" class="form-label" style="-webkit-text-fill-color: black;">Etiquetas (Tags)<span class="text-danger">*</span></label>
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
                                    <button type="button" class="btn btn-success float-right" onclick="validarPagina3();"><i class="fas fa-edit"></i> Actualizar Tags</button>
                                </form>
                            </div>
                            <div class="tab-pane <?php if ($ventana == "categoria") echo "active"; ?>" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                                <form action="../controller/productoServicioController.php" method="GET" id="formCategoria" novalidate>
                                    <input type="text" name="idUser" value="<?php echo $_SESSION['idUser']; ?>" style="display: none;">
                                    <input type="text" name="funcion" value="actualizarCategoriaProducto" style="display: none;">
                                    <input type="text" name="idProducto" value="<?php echo $_GET['idProducto']; ?> " style="display: none;">
                                    <?php
                                    require_once '../model/categoria.php';
                                    $oCategoria = new categoria();
                                    $consulta = $oCategoria->categoria();
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="" class="form-label" style="-webkit-text-fill-color: black;">Categoria<span class="text-danger">*</span></label>
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
                                            <span id="idCategoriaSpan"></span>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="button" class="btn btn-success float-right" onclick="validarPagina4();"><i class="fas fa-edit"></i> Actualizar Categoria</button>
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

<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/validaciones.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>
<?php require_once 'footer.php'; ?>

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

<script>
    var campo = document.getElementById("valorUnitario");
    separadorMilesValor(campo, "<?php echo $oProducto->valorUnitario; ?>");
</script>

<script>
    var campo = document.getElementById("costoProducto");
    separadorMilesValor2(campo, "<?php echo $oProducto->costoProducto; ?>");
</script>


<script>
    function validarPagina2() {
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var campos = ["codigoProducto", "nombreProducto", "descripcion", "summernote", "valorUnitario", "costoProducto"];
        campos.forEach(element => {
            var campo = document.getElementById(element);
            if (!validarCampo(campo))
                valido = false;
        });
        if (valido) {
            document.getElementById('formInformacion').submit();
        }
    }

    function validarPagina3() {
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var campos = ["tags"];
        campos.forEach(element => {
            var campo = document.getElementById(element);
            if (!validarCampo(campo))
                valido = false;
        });
        if (valido) {
            document.getElementById('formTags').submit();
        }
    }

    function validarPagina4() {
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var campos = ["idCategoria"];
        campos.forEach(element => {
            var campo = document.getElementById(element);
            if (!validarCampo(campo))
                valido = false;
        });
        if (valido) {
            document.getElementById('formCategoria').submit();
        }
    }
</script>