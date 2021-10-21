<?php
require_once 'headpagina.php';
require_once '../model/pedido.php';
require_once '../controller/pedidocontroller.php';

if (isset($_GET['ventana'])) { //
    $ventana = $_GET['ventana'];
} else {
    $ventana = "informacion";
}

$idPedido = $_GET['idPedido'];
$idUser = $_SESSION['idUser'];

$oPedidoController = new pedidoController();
$oPedido = $oPedidoController->consultarPedidoId($idPedido);
?>

<body>
    <div class="container-fluid">

        <div class="card cardHeader">
            <div class="card-header">
                <h2>Actualizar Pedido</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5 col-sm-3">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link textLink <?php if ($ventana == "informacion") echo "active"; ?>" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Informacion</a>
                            <a class="nav-link textLink <?php if ($ventana == "producto") echo "active"; ?>" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Productos</a>
                        </div>
                    </div>
                    <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            <div class="tab-pane text-left fade show <?php if ($ventana == "informacion") echo "active"; ?>" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                <form action="../controller/pedidoController.php" method="GET">
                                    <input type="text" name="idPedido" value="<?php echo $idPedido; ?>" style="display: none;">
                                    <input type="text" name="idUser" value="<?php echo $idUser; ?>" style="display: none;">
                                    <input class="form-control" type="date" name="fechaPedido" value="<?php echo $oPedido->fechaPedido; ?>" style="display: none;">

                                    <div class="row">
                                        <div class="col col-xl-4 col-md-6 col-12">
                                            <label>documentoIdentidad: </label>
                                            <input class="form-control" type="text" name="documentoIdentidad" value="<?php echo $oPedido->documentoIdentidad; ?>" readonly>
                                        </div>
                                        <div class="col col-xl-4 col-md-6 col-12">
                                            <label>Responsable Pedido: </label>
                                            <input class="form-control" type="text" name="responsablePedido" value="<?php echo $oPedido->responsablePedido; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Nit: </label>
                                            <input class="form-control" type="text" name="Nit" id="Nit" value="<?php echo $oPedido->Nit; ?>" readonly>
                                            <input type="text" name="idEmpresa" id="idEmpresa" value="<?php echo $oPedido->idEmpresa; ?>" style="display: none;">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Empresa: </label>
                                            <input class="form-control" type="text" name="empresa" id="nombreEmpresa" value="<?php echo $oPedido->empresa; ?>" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Direccion: </label>
                                            <input class="form-control" type="text" name="direccion" id="direccion" value="<?php echo $oPedido->direccion; ?>" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-empresa" onclick="buscarEmpresa()"><i class="fas fa-exchange-alt"></i> Cambiar Empresa</button>
                                    <button type="submit" class="btn btn-success" name="funcion" value="actualizarPedido"><i class="fas fa-edit"></i> Actualizar Informacion</button>
                                </form>
                            </div>
                            <div class="tab-pane <?php if ($ventana == "producto") echo "active"; ?>" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                <form id="formulario" id="" action="../controller/pedidoController.php" method="GET" novalidate>
                                    <input type="text" name="funcion" value="actualizarPedidoProducto" style="display: none;">
                                    <input type="text" name="idPedido" value="<?php echo $idPedido; ?>" style="display: none;">
                                    <input type="text" name="idUser" value="<?php echo $idUser; ?>" style="display: none;">

                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#pagoProducto" onclick="productoConsultar()"><i class="fas fa-plus-square"></i> Agregar Productos</button>
                                        <table class="table table-striped table-valign-middle">
                                            <input type="text" name="idPedido" id="idPedido" value="<?php echo $_GET['idPedido']; ?>" style="display: none;">
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
                                    <br>
                                    <button type="button" style="margin-bottom: 5px; margin-left: 5px;" class="btn btn-success" onclick="validarPaginaFinal()"><i class="fas fa-edit"></i> Actualizar Productos</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="listarpedido.php" style="margin-bottom: 5px;" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
    </div>
</body>

</html>
</body>

<?php require_once 'footer.php'; ?>
<?php require_once 'linkjs.php'; ?>

<!--Modal empresa-->
<div class="modal fade" id="modal-empresa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header estiloModalHeader">
                <h4 class="modal-title">Seleccionar Empresas</h4>
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
                            <input type="text" class="form-control" placeholder="Buscar empresa.." style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Busca una empresa por NIT o Nombre" class="form-control" id="empresa" name="empresa" onkeyup="buscarEmpresa()">
                        </div>
                    </div>
                </div>

                <hr>

                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th><a class="btn btn-info" href="nuevaempresa.php?pedido=pedido"><i class="fas fa-plus-square"></i> Crear</a></th>
                            <th>Nit</th>
                            <th>Empresa</th>
                            <th>Direccion</th>
                        </tr>
                    </thead>
                    <tbody id="listarEmpresa">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer estiloModalBody">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!--Modal de productos-->

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
            document.getElementById('formulario').submit();
        }
    }
</script>