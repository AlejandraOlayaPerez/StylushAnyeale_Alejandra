<?php
require_once 'headPagina.php';
require_once '../model/conexionDB.php';
require_once '../model/pedido.php';
require_once '../model/producto.php';
require_once '../controller/usuarioController.php';
require_once '../controller/pedidoController.php';

$idUser = $_SESSION['idUser'];

date_default_timezone_set('America/Bogota');
$fechaActual = Date("Y-m-d");

$oUsuarioController = new usuarioController();
$oUsuario = $oUsuarioController->consultarUsuarioId($idUser);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVO PEDIDO</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default" style="background-color: rgba(255, 255, 204, 255);">
                    <div class="card-header" style="background-color: rgb(249, 201, 242);">
                        <label class="card-title">NUEVO PEDIDO</label>
                    </div>

                    <form action="../controller/pedidoController.php" method="GET" id="formulario">
                        <input type="text" name="funcion" value="nuevoPedido" style="display: none;">
                        <div class="card-body p-0">
                            <div class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                    <div class="step" data-target="#logins-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Formulario</span>
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
                                            <div class="col-md-6">
                                                <label for="">Fecha Pedido</label>
                                                <input type="text" name="idUser" value="<?php echo $idUser; ?>" style="display: none;">
                                                <input class="form-control" type="date" id="fechaPedido" name="fechaPedido" placeholder="Fecha Pedido" value="<?php echo $fechaActual; ?>" readonly onchange="validarCampo(this);" required>
                                                <span id="fechaPedidoSpan"></span>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Documento Identidad</label>
                                                <input class="form-control" type="number" id="documentoIdentidad" name="documentoIdentidad" placeholder="Documento Identidad" value="<?php echo $oUsuario->documentoIdentidad; ?>" readonly onchange="validarCampo(this);" required>
                                                <span id="documentoIdentidadSpan"></span>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Responsable del pedido</label>
                                                <input class="form-control" type="text" id="responsablePedido" name="responsablePedido" placeholder="Responsable Pedido" value="<?php echo $oUsuario->primerNombre . " " . $oUsuario->primerApellido; ?>" readonly onchange="validarCampo(this);" required>
                                                <span id="responsablePedidoSpan"></span>
                                            </div>
                                        </div>
                                        <div class="row" style="margin: 5px;">
                                            <div class="col-md-6">
                                                <br>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-empresa" onclick="buscarEmpresa()">Seleccionar Empresa</button>
                                            </div>
                                            <div class="container">
                                                <br>
                                                <input type="text" name="idEmpresa" id="idEmpresa" style="display:none;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="">Nit: </label>
                                                        <input class="form-control" type="text" name="Nit" id="Nit" readonly onchange="validarCampo(this);" required>
                                                        <span id="NitSpan"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="">Empresa: </label>
                                                        <input class="form-control" type="text" name="empresa" id="nombreEmpresa" readonly onchange="validarCampo(this);" required>
                                                        <span id="nombreEmpresaSpan"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="">Direccion: </label>
                                                        <input class="form-control" type="text" name="direccion" id="direccion" readonly onchange="validarCampo(this);" required>
                                                        <span id="direccionSpan"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button style="margin: 5px;" class="btn btn-info float-right" type="button" onclick="validarPagina1()"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                                        <a style="margin: 5px;" href="listarPedido.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                                        <br>
                                    </div>
                                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                        <div class="row">
                                            <div class="col-ms-6">
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default" onclick="productoConsultar()">Agregar Productos</button>
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
                                        <button style="margin: 5px;" class="btn btn-info" type="button" onclick="stepper.previous()"><i class="fas fa-arrow-circle-left"></i> Anterior</button>
                                        <button style="margin: 5px;" class="btn btn-success" type="button" onclick="validarPaginaFinal()"><i class="fas fa-save"></i> Registrar Pedido</button>
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

<!--Modal empresa-->
<div class="modal fade" id="modal-empresa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Seleccionar Empresas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="" class="form-label">Buscar: </label>
                        <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Buscar empresa.." style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Busca una empresa por NIT o Nombre" class="form-control" id="empresa" name="empresa" onkeyup="buscarEmpresa()">
                        </div>
                    </div>
                </div>

                <hr>

                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th><a class="btn btn-info" href="nuevaEmpresa.php"><i class="fas fa-plus-square"></i> Crear</a></th>
                            <th>Nit</th>
                            <th>Empresa</th>
                            <th>Direccion</th>
                        </tr>
                    </thead>
                    <tbody id="listarEmpresa">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!--Modal de productos-->

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

<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/AgregarEmpresa.js"></script>
<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/validaciones.js"></script>
<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/AgregarProductos.js"></script>
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
        var campos = ["fechaPedido", "documentoIdentidad", "responsablePedido", "Nit", "nombreEmpresa",
            "direccion"
        ];
        campos.forEach(element => {
            var campo = document.getElementById(element);
            if (!validarCampo(campo))
                valido = false;
        });
        if (valido)
            stepper.next();
    }

    function validarPaginaFinal() {
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

        if (valido) {
            document.getElementById('formulario').submit();
        }
    }
</script>