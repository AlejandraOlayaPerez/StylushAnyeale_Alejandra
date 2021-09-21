<?php
require_once 'headPagina.php';
require_once '../model/conexionDB.php';
require_once '../model/servicio.php';
require_once '../model/producto.php';
require_once '../controller/productoServicioController.php';

$oServicio = new servicio();

date_default_timezone_set('America/Bogota');
$fechaActual = Date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVO SERVICIO</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default" style="background-color: rgba(255, 255, 204, 255);">
                    <div class="card-header" style="background-color: rgb(249, 201, 242);">
                        <label class="card-title">NUEVO SERVICIO</label>
                    </div>

                    <form id="formulario" action="../controller/productoServicioController.php" method="GET">
                        <input type="text" name="funcion" value="crearServicio" style="display: none;">
                        <div class="card-body p-0">
                            <div class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                    <div class="step" data-target="#logins-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Datos servicio</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <div class="step" data-target="#information-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Productos</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="bs-stepper-content">

                                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">

                                        <div class="row" style="margin: 5px;">
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label for="" class="form-label">Codigo Servicio</label>
                                                <input class="form-control" type="text" id="codigoServicio" name="codigoServicio" placeholder="Codigo Servicio" onchange="validarCampo(this);" required minlength="2" maxlength="30">
                                                <span style="font-family: 'Times New Roman', Times, serif; font-size: 10px;" id="codigoServicioSpan"></span>
                                            </div>
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label for="" class="form-label">Servicio</label>
                                                <input class="form-control" type="text" id="nombreServicio" name="nombreServicio" placeholder="Nombre Servicio" onchange="validarCampo(this);" required minlength="5" maxlength="30">
                                                <span style="font-family: 'Times New Roman', Times, serif; font-size: 10px;" id="nombreServicioSpan"></span>
                                            </div>

                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label for="" class="form-label">Detalle Servicio</label>
                                                <input class="form-control" type="text" name="detalleServicio" placeholder="DetalleServicio">
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
                                                <input class="form-control" type="number" id="costo" name="costo" placeholder="Costo" onchange="validarCampo(this);" required minlength="1" maxlength="30">
                                                <span style="font-family: 'Times New Roman', Times, serif; font-size: 10px;" id="costoSpan"></span>
                                            </div>
                                        </div>
                                        <br>
                                        <button style="margin: 5px;" class="btn btn-info float-right" type="button" onclick="validarPagina1()"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                                        <a href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/listarServicio.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                                        <br>
                                    </div>

                                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">

                                        <div class="row">
                                            <div class="col-ms-6">
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Agregar Productos</button>

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
                                                                <table class="table align-middle table-responsive">
                                                                    <thead>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th>Codigo</th>
                                                                            <th>Producto</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        require_once '../model/producto.php';
                                                                        require_once '../model/conexiondb.php';

                                                                        $oProducto = new producto();
                                                                        $Consulta = $oProducto->mostrarProducto2();
                                                                        foreach ($Consulta as $registro) {
                                                                        ?>

                                                                            <tr>
                                                                                <td><button type="button" class="btn btn-success" data-dismiss="modal" onclick="agregarProducto('<?php echo $registro['IdProducto'] ?>','<?php echo $registro['codigoProducto']; ?>','<?php echo $registro['nombreProducto']; ?>')">Agregar</button></td>
                                                                                <td><?php echo $registro['codigoProducto']; ?></td>
                                                                                <td><?php echo $registro['nombreProducto']; ?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <br>
                                                <table class="table align-middle">

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
                                        <button style="margin: 5px;" class="btn btn-info" type="button" onclick="stepper.previous()"><i class="fas fa-arrow-circle-left"></i> Anterior</button>
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

<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/validaciones.js"></script>
<?php require_once 'footer.php'; ?>

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
        var campos = ["codigoServicio", "nombreServicio", "tiempoDuracion", "costo"];
        campos.forEach(element => {
            var campo = document.getElementById(element);
            if (!validarCampo(campo))
                valido = false;
        });
        if (valido)
            stepper.next();
    }

    function validarPaginaFinal() {
        var listarProducto = document.getElementById('listarProducto');
        // var producto=$('listarProducto').find('input[name="productos[]"]');
        var productos = document.getElementsByName('productos[]');
        console.log(productos.length);
        if (productos.length > 0) {
            document.getElementById('formulario').submit();
        } else {
            alert("Seleccione un producto");
        }
    }
</script>