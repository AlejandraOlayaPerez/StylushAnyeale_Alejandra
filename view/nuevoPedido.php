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
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-default" style="background-color: rgba(255, 255, 204, 255);">
                            <div class="card-header" style="background-color: rgb(249, 201, 242);">
                                <label class="card-title">NUEVO PEDIDO</label>
                            </div>

                            <form action="../controller/pedidoController.php" method="GET">
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
                                                        <input class="form-control" type="date" name="fechaPedido" placeholder="Fecha Pedido" value="<?php echo $fechaActual; ?>" disabled>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="">Documento Identidad</label>
                                                        <input class="form-control" type="number" name="documentoIdentidad" placeholder="Documento Identidad" value="<?php echo $oUsuario->documentoIdentidad; ?>" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Responsable del pedido</label>
                                                        <input class="form-control" type="text" name="responsablePedido" placeholder="Responsable Pedido" value="<?php echo $oUsuario->primerNombre . " " . $oUsuario->primerApellido; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin: 5px;">
                                                    <div class="col-md-6">
                                                        <br>
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-empresa">Seleccionar Empresa</button>

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
                                                                        <table class="table align-middle table-responsive">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th><a class="btn btn-info" href="nuevaEmpresa.php"><i class="fas fa-plus-square"></i> Crear</a></th>
                                                                                    <th>Nit</th>
                                                                                    <th>Empresa</th>
                                                                                    <th>Direccion</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                require_once '../model/empresa.php';
                                                                                $oEmpresa = new empresa();
                                                                                $consulta = $oEmpresa->listarEmpresa(1);
                                                                                foreach ($consulta as $registro) {
                                                                                ?>
                                                                                    <tr>
                                                                                        <td><button type="button" class="btn btn-success" data-dismiss="modal" onclick="agregarEmpresa('<?php echo $registro['idEmpresa'] ?>','<?php echo $registro['Nit']; ?>','<?php echo $registro['nombreEmpresa']; ?>','<?php echo $registro['direccion']; ?>')">Agregar</button></td>
                                                                                        <td><?php echo $registro['Nit']; ?></td>
                                                                                        <td><?php echo $registro['nombreEmpresa']; ?></td>
                                                                                        <td><?php echo $registro['direccion']; ?></td>
                                                                                    </tr>
                                                                                <?php } ?>
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
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="">Nit: </label>
                                                                <input class="form-control" type="text" name="Nit" id="Nit" disabled>
                                                                <input type="text" name="idEmpresa" id="idEmpresa" style="display:none;">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="">Empresa: </label>
                                                                <input class="form-control" type="text" name="nombreEmpresa" id="nombreEmpresa" disabled>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="">Direccion: </label>
                                                                <input class="form-control" type="text" name="direccion" id="direccion" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <button style="margin: 5px;" class="btn btn-info float-right" type="button" onclick="stepper.next()"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                                                <a style="margin: 5px;" href="listarPedido.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
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
                                                                                $Consulta = $oProducto->mostrarProducto(1);
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
                                                <button style="margin: 5px;" class="btn btn-success" type="submit" name="funcion" value="nuevoPedido"><i class="fas fa-save"></i> Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
// require_once 'footerGerente.php';
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
</script>