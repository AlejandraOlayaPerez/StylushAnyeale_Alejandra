<?php
require_once 'headpagina.php';
require_once '../model/servicio.php';
$oServicio = new servicio();
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header cardHeaderFondo">
                        <label class="card-title">Nuevo Servicio</label>
                    </div>

                    <form id="formulario" action="../controller/productoserviciocontroller.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="funcion" value="crearServicio" style="display: none;">
                        <input type="text" name="idUser" value="<?php echo $_SESSION['idUser']; ?>" style="display: none;">
                        <div class="card-body cardBody">
                            <div class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                    <div class="step" data-target="#logins-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Imagen</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <div class="step" data-target="#information-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Servicio</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <div class="step" data-target="#producto-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="producto-part" id="producto-part-trigger">
                                            <span class="bs-stepper-circle">3</span>
                                            <span class="bs-stepper-label">Productos</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <div class="step" data-target="#clave-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="clave-part" id="clave-part-trigger">
                                            <span class="bs-stepper-circle">4</span>
                                            <span class="bs-stepper-label">Etiqueta</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="bs-stepper-content">

                                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                        <div class="row" style="margin: 5px;">
                                            <div class="col col-md-12">
                                                <div class="col col-md-6">
                                                    <label for="">Fotos<span class="text-danger">*</span></label>
                                                    <input name="fotos[]" id="fotos" type="file" class="form-control" multiple accept="image/*" onchange="validarCampo(this);" required>
                                                    <span id="fotosSpan"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button style="margin: 5px;" class="btn btn-info float-right" type="button" onclick="validarPagina1();"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                                        <a href="listarservicio.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                                    </div>

                                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                        <div class="row">
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label for="" class="form-label">Codigo Servicio<span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" id="codigoServicio" name="codigoServicio" placeholder="Codigo Servicio" onchange="validarCampo(this);" required minlength="2" maxlength="30">
                                                <span id="codigoServicioSpan"></span>
                                            </div>
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label for="" class="form-label">Servicio<span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" id="nombreServicio" name="nombreServicio" placeholder="Nombre Servicio" onchange="validarCampo(this);" required minlength="5" maxlength="30">
                                                <span id="nombreServicioSpan"></span>
                                            </div>

                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label for="" class="form-label">Detalle Servicio<span class="text-danger">*</span></label>
                                                <textarea class="form-control" rows="3" type="text" id="detalleServicio" name="detalleServicio" placeholder="Describe el servicio" onchange="validarCampo(this);" required minlength="10" maxlength="500"></textarea>
                                                <span id="detalleServicioSpan"></span>
                                            </div>
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label for="" class="form-label">Duracion Servicio<span class="text-danger">*</span></label>
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
                                                <label for="" class="form-label">Costo<span class="text-danger">*</span></label>
                                                <div class="input-group m-b-0">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                                    </div>
                                                    <input class="form-control" type="text" id="costo" name="costo" placeholder="Costo" required minlength="1" maxlength="30" onkeyup="separadorMilesCuadroTexto(this);">
                                                </div>
                                                <span id="costoSpan"></span>
                                            </div>
                                        </div>
                                        <br>
                                        <button class="btn btn-info" type="button" onclick="stepper.previous()"><i class="fas fa-arrow-circle-left"></i> Anterior</button>
                                        <button class="btn btn-info float-right" type="button" onclick="validarPagina2()"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                                    </div>


                                    <div id="producto-part" class="content" role="tabpanel" aria-labelledby="producto-part-trigger">
                                        <div class="row">
                                            <div class="col-ms-6">
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#pagoProducto" onclick="productoConsultar()"><i class="fas fa-plus-square"></i> Agregar Productos</button>
                                            </div>
                                            <div class="card-body table-responsive p-0">
                                                <table class="table table-striped table-valign-middle">
                                                    <thead>
                                                        <tr>
                                                            <th>Codigo</th>
                                                            <th>productos</th>
                                                            <th>cantidad</th>
                                                            <th>Eliminar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="listarProducto">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <br>
                                        <button class="btn btn-info" type="button" onclick="stepper.previous()"><i class="fas fa-arrow-circle-left"></i> Anterior</button>
                                        <button type="button" class="btn btn-success" onclick="validarPagina3();"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                                    </div>

                                    <div id="clave-part" class="content" role="tabpanel" aria-labelledby="clave-part-trigger">
                                        <div class="row">
                                            <?php
                                            require_once '../model/tags.php';
                                            $oTags = new tags();
                                            $result = $oTags->tags();
                                            ?>
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Etiquetas (Tags)<span class="text-danger">*</span></label>
                                                    <select class="select2" multiple="multiple" data-placeholder="Seleccione las etiquetas" style="width: 100%; font-family: 'Times New Roman', Times, serif;" id="tags" name="tags[]" onchange="validarCampo(this);" required>
                                                        <option disabled>Seleccione las etiquetas</option>
                                                        <?php
                                                        foreach ($result as $registro) {
                                                        ?>
                                                            <option value="<?php echo $registro['idTags']; ?>"><?php echo $registro['tags']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <span id="tagsSpan"></span>
                                                </div>
                                            </div>
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <?php
                                                require_once '../model/categoria.php';
                                                $oCategoria = new categoria();
                                                $consulta = $oCategoria->categoria();
                                                ?>
                                                <label for="" class="form-label">Categoria<span class="text-danger">*</span></label>
                                                <select class="form-control" id="idCategoria" name="idCategoria" onchange="validarCampo(this);" required>
                                                    <option value="" selected>Selecciones una opción</option>
                                                    <?php foreach ($consulta as $registro) {
                                                    ?>
                                                        <option value="<?php echo $registro['idCategoria']; ?>"><?php echo $registro['nombreCategoria']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span id="idCategoriaSpan"></span>
                                            </div>

                                        </div>
                                        <br>
                                        <button class="btn btn-info" type="button" onclick="stepper.previous()"><i class="fas fa-arrow-circle-left"></i> Anterior</button>
                                        <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="far fa-save"></i> Registrar Servicio</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

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


<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/agregarproductos.min.js"></script>
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
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
</script>

<script>
    //crear una función con los campos de cada pagina
    function validarPagina1() {
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var campos = ["fotos"];
        campos.forEach(element => {
            var campo = document.getElementById(element);
            if (!validarCampo(campo))
                valido = false;
        });
        if (valido)
            stepper.next();
    }
    //crear una función con los campos de cada pagina
    function validarPagina2() {
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var campos = ["codigoServicio", "nombreServicio", "detalleServicio", "tiempoDuracion", "costo"];
        campos.forEach(element => {
            var campo = document.getElementById(element);
            if (!validarCampo(campo))
                valido = false;
        });
        if (valido)
            stepper.next();
    }

    function validarPagina3() {
        // evento.preventDefault();
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var contenedor = document.getElementById("listarProducto");
        var tr = contenedor.querySelectorAll('tr');
        var inputs = contenedor.querySelectorAll('input');
        // console.log(tr);
        if (tr.length == 0) {
            valido = false;
            alert("Por favor, seleccione minimo un producto");
        }

        for (var i = 0; i < inputs.length; i++) {
            valido = validarCampo(inputs[i]);
            if (!valido) {
                break;
            }
        }
        if (valido)
            stepper.next();
    }

    function validarPaginaFinal() {
        // evento.preventDefault();
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var campos = ["tags", "idCategoria"];
        campos.forEach(element => {
            var campo = document.getElementById(element);
            if (!validarCampo(campo))
                valido = false;
        });
        if (valido) {
            document.getElementById('formulario').submit();
        }
    }
</script>