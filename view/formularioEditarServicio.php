<?php
require_once 'headpagina.php';
require_once 'linkhead.php';
require_once '../model/servicio.php';
require_once '../controller/productoserviciocontroller.php';

if (isset($_GET['ventana'])) { //
    $ventana = $_GET['ventana'];
} else {
    $ventana = "informacion";
}

$oProductoServicioController = new productoServicioController();
$oServicio = $oProductoServicioController->consultarServicio($_GET['idServicio']);
$oTags = $oProductoServicioController->consultarTagsidServicio($_GET['idServicio']);
?>

<body>
    <div class="container-fluid">
        <div class="card tabsHeader">
            <div class="card-header">
                <h2>Actualizar Servicio</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5 col-sm-3">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link textLink <?php if ($ventana == "informacion") echo "active"; ?>" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Informacion</a>
                            <a class="nav-link textLink <?php if ($ventana == "tags") echo "active"; ?>" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Tags</a>
                            <a class="nav-link textLink <?php if ($ventana == "categoria") echo "active"; ?>" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Categoria</a>
                            <a class="nav-link textLink <?php if ($ventana == "foto") echo "active"; ?>" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Imagenes</a>
                            <a class="nav-link textLink <?php if ($ventana == "producto") echo "active"; ?>" id="vert-tabs-producto-tab" data-toggle="pill" href="#vert-tabs-producto" role="tab" aria-controls="vert-tabs-producto" aria-selected="false">Producto</a>
                        </div>
                    </div>
                    <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            <div class="tab-pane text-left fade show <?php if ($ventana == "informacion") echo "active"; ?>" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                <form action="../controller/productoServicioController.php" method="GET" id="formInformacion" novalidate>
                                    <input type="text" name="funcion" value="actualizarInformacion" style="display: none;">
                                    <input type="text" name="idServicio" value="<?php echo $_GET['idServicio']; ?> " style="display: none;">
                                    <div class="row">
                                        <div class="col col-xl-4 col-md-6 col-12">
                                            <label>Codigo Servicio: </label>
                                            <input class="form-control" type="text" id="codigoServicio" name="codigoServicio" value="<?php echo $oServicio->codigoServicio; ?>" onchange="validarCampo(this);" required maxlength="50" minlength="1">
                                            <span id="codigoServicioSpan"></span>
                                        </div>
                                        <div class="col col-xl-4 col-md-6 col-12">
                                            <label>Servicio: </label>
                                            <input class="form-control" type="text" id="nombreServicio" name="nombreServicio" value="<?php echo $oServicio->nombreServicio; ?>" onchange="validarCampo(this);" required maxlength="50" minlength="1">
                                            <span id="nombreServicioSpan"></span>
                                        </div>
                                        <div class="col col-xl-4 col-md-6 col-12">
                                            <label>Detalle: </label>
                                            <input class="form-control" type="text" id="detalleServicio" name="detalleServicio" value="<?php echo $oServicio->detalleServicio; ?>" onchange="validarCampo(this);" required maxlength="50" minlength="1">
                                            <span id="detalleServicioSpan"></span>
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
                                            <label for="" class="form-label">Costo</label>
                                            <div class="input-group m-b-0">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                                </div>
                                                <input class="form-control" type="text" id="costo" value="<?php echo $oServicio->costo; ?>" name="costo" placeholder="Costo" required minlength="1" maxlength="30" onkeyup="separadorMilesCuadroTexto(this);">
                                            </div>
                                            <span id="costoSpan"></span>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="button" class="btn btn-success float-right" onclick="validarPagina2();"><i class="fas fa-edit"></i> Actualizar Informacion</button>
                                </form>
                            </div>
                            <div class="tab-pane <?php if ($ventana == "tags") echo "active"; ?>" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                <form action="../controller/productoServicioController.php" method="GET" id="formTags" novalidate>
                                    <input type="text" name="funcion" value="actualizarTagsServicio" style="display: none;">
                                    <input type="text" name="idServicio" value="<?php echo $_GET['idServicio']; ?> " style="display: none;">
                                    <div class="form-group">
                                        <label for="" class="form-label">Etiquetas (Tags)</label>
                                        <select class="form-control select2" multiple="multiple" data-placeholder="Seleccione las etiquetas" id="tags" name="tags[]" onchange="validarCampo(this);" required>
                                            <option disabled>Seleccione las etiquetas</option>
                                            <?php
                                            foreach ($oTags as $registro) {
                                            ?>
                                                <option value="<?php echo $registro['idTags']; ?>" <?php if ($registro['IdServicios'] != "") {
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
                                    <input type="text" name="funcion" value="actualizarCategoriaServicio" style="display: none;">
                                    <input type="text" name="idServicio" value="<?php echo $_GET['idServicio']; ?> " style="display: none;">
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
                                                    <option value="<?php echo $registro['idCategoria']; ?>" <?php if ($oServicio->idCategoria == $registro['idCategoria']) {
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
                            <div class="tab-pane <?php if ($ventana == "foto") echo "active"; ?>" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                                <form action="../controller/productoServicioController.php" method="POST">

                                </form>
                            </div>
                            <div class="tab-pane <?php if ($ventana == "producto") echo "active"; ?>" id="vert-tabs-producto" role="tabpanel" aria-labelledby="vert-tabs-producto-tab">
                                <form action="../controller/productoServicioController.php" method="GET" id="formProducto" novalidate>
                                    <input type="text" name="funcion" value="actualizarProductoServicio" style="display: none;">
                                    <input type="text" id="idServicio" name="idServicio" value="<?php echo $_GET['idServicio']; ?> " style="display: none;">
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#pagoProducto" onclick="productoConsultar()"><i class="fas fa-plus-square"></i> Agregar Productos</button>
                                        <table class="table table-striped table-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th>Codigo</th>
                                                    <th>Productos</th>
                                                    <th>cantidad</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="listarProducto">

                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <button type="button" style="margin-bottom: 5px; margin-left: 5px;" class="btn btn-success" onclick="validarPaginaFinal()"><i class="fas fa-edit"></i> Actualizar Productos</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="listarservicio.php" class="btn btn-dark float-left"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
    </div>
</body>

</html>

<?php require_once 'footer.php'; ?>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/agregarproductos.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/validaciones.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/editarServicio.min.js"></script>

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



<div class="modal fade estiloModalBody" id="pagoProducto">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header estiloModalHeader">
                <h4 class="modal-title">Agregar Productos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body estiloModalBody">
                <div class="row">
                    <div class="col-md-12">
                        <label for="" class="form-label">Buscar: </label>
                        <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Buscar producto.." style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Busca un producto por Codigo o Nombre" class="form-control" id="producto" name="producto" onkeyup="productoConsultar()">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-tools">
                            <ul class="pagination pagination-sm contenedorUL" id="contenedorUL">

                            </ul>
                        </div>
                    </div>
                </div>

                <hr>

                <table class="table colorestabla">
                    <thead>
                        <tr class="estiloTr">
                            <th></th>
                            <th>Codigo</th>
                            <th>Producto</th>
                        </tr>
                    </thead>
                    <tbody id="productoResultado">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer estiloModalHeader">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
            </div>
        </div>

    </div>
</div>


<script>
    function validarPagina2() {
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var campos = ["codigoServicio", "nombreServicio", "detalleServicio", "tiempoDuracion", "costo"];
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


    function validarPaginaFinal() {
        // evento.preventDefault();
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var contenedor = document.getElementById("listarProducto");
        var tr = contenedor.querySelectorAll('tr');
        var inputs = contenedor.querySelectorAll('input');
        // console.log(tr);
        if (inputs.length == 0) {
            valido = false;
            alert("Por favor, seleccione minimo un producto");
        }

        for (var i = 0; i < inputs.length; i++) {
            valido = validarCampo(inputs[i]);
            if (!valido) {
                break;
            }
        }

        if (valido) {
            document.getElementById('formProducto').submit();
        }
    }
</script>