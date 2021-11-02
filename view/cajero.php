<?php
require_once 'headPagina.php';
date_default_timezone_set('America/Bogota');
$fechaActual = Date("Y-m-d");

if (isset($_GET['vista'])) { //
    $vista = $_GET['vista'];
} else {
    $vista = "cliente";
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <?php
            require_once '../controller/usuariocontroller.php';
            $oUsuarioController = new usuarioController();
            $oUsuario = $oUsuarioController->consultarUsuarioId($_SESSION['idUser']);
            ?>
            <div class="profile-card-4 z-depth-3">
                <div class="card">
                    <div class="card-body text-center rounded-top" style="background-color: #FEF1E6 !important;">
                        <h5 class="mb-1 text-white" style="font-weight: 600; font-size: 20px; font-family: 'Times New Roman', Times, serif; -webkit-text-fill-color: black !important;">CAJERO</h5>
                        <h6 class="text-light"> <a class="nav-link" style="color: #0d1420;font-size: 20px;font-family: 'Times New Roman', Times, serif;color:black;letter-spacing: 5px;text-align: center;"><strong>Fecha: </strong><?php echo $fechaActual; ?></a></h6>
                        <h6 class="text-light"> <a class="nav-link" id="relojnumerico" class="nav-link" onload="cargarReloj()" style="color: #0d1420;font-size: 20px;font-family: 'Times New Roman', Times, serif;color:black;letter-spacing: 5px;text-align: center;"></a></h6>
                    </div>
                    <div class="card-body" style="background-color: #bec2c71f !important;">
                        <div class=row>
                            <div class="col-md-6">
                                <label for="" class="form-label">Tipo Documento</label>
                                <input type="text" class="form-control" name="tipoDocumento" value="<?php echo $oUsuario->tipoDocumento; ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">documento Identidad</label>
                                <input type="number" class="form-control" name="documentoIdentidad" value="<?php echo $oUsuario->documentoIdentidad; ?>" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="<?php echo $oUsuario->primerNombre . " " . $oUsuario->segundoNombre; ?>" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label">Apellido</label>
                                <input type="text" class="form-control" name="apellido" value="<?php echo $oUsuario->primerApellido . " " . $oUsuario->segundoApellido; ?>" readonly>
                            </div>
                        </div>

                        <div class=row>
                            <div class="col-md-6">
                                <label for="" class="form-label">Correo electronico</label>
                                <input type="email" class="form-control" name="correoElectronico" value="<?php echo $oUsuario->correoElectronico;; ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Telefono</label>
                                <input type="number" class="form-control" name="telefono" value="<?php echo $oUsuario->telefono; ?>" readonly>
                            </div>
                        </div>

                        <div class="row text-center mt-4">
                            <div class="col p-2">
                                <a type="button" class="btn btn-info" href="listarfacturas.php"><i class="fas fa-file-invoice"></i> Facturas</a>
                            </div>
                            <div class="col p-2">
                                <a type="button" class="btn btn-info" href="mostrarreservacion.php"><i class="fas fa-calendar-day"></i> Reservaciones</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card z-depth-3" style="background-color: #FEF1E6 !important;">
                <div class="card-body">
                    <ul class="nav nav-pills nav-pills-info nav-justified">
                        <li class="nav-item">
                            <a href="cajero.php?vista=cliente" data-target="#profile" data-toggle="pill" class="nav-link <?php if ($vista == "cliente") echo "active show"; ?>"><i class="icon-user"></i> <span class="hidden-xs"><i class="fas fa-user"></i> Clientes</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="cajero.php?vista=productos" data-target="#edit" data-toggle="pill" class="nav-link <?php if ($vista == "productos") echo "active show"; ?>"><i class="icon-note"></i> <span class="hidden-xs"><i class="fas fa-wine-bottle"></i> Productos</span></a>
                        </li>
                    </ul>
                    <div class="tab-content p-3">
                        <div class="tab-pane <?php if ($vista == "cliente") echo "active show"; ?>" id="profile">
                            <div class="card" style="background-color: #bec2c71f !important;">
                                <div class="card-header">
                                    <label class="card-title" style="-webkit-text-fill-color: black;">Informacion Cliente:</label>
                                </div>
                                <div class="card-body">
                                    <div class=row>
                                        <div class="col-md-6">
                                            <input type="text" name="idCliente" id="idCliente" style="display: none;">
                                            <label for="" class="form-label">Tipo Documento</label>
                                            <input type="text" class="form-control" id="tipoDocumento" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="form-label">documentoIdentidad</label>
                                            <input type="number" class="form-control" id="documentoIdentidad" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="primerNombre" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="" class="form-label">Apellido</label>
                                            <input type="text" class="form-control" id="primerApellido" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Telefono</label>
                                            <input type="text" class="form-control" id="telefono" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-xl" onclick="buscarCliente();"><i class="fas fa-search"></i> Buscar Cliente</button>
                                    <button type="button" class="btn btn-info" id="nuevaReservacion" onclick="crearReservacion();" style="display: none;"><i class="fas fa-calendar-plus"></i> Crear Reservacion</button>

                                </div>
                            </div>
                            <br>
                            <div class="card" id="tablaReservacion" style="display: none;">
                                <div class="card-body table-responsive p-0">
                                    <table class="table colorestabla">
                                        <thead>
                                            <tr class="estiloTr">
                                                <th>Servicio</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Domicilio</th>
                                                <th>Direccion</th>
                                                <th>Precio</th>
                                                <th>¿Validado?</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="informacionReservacion">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane <?php if ($vista == "productos") echo "active show"; ?>" id="edit">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#pagoProducto" onclick="buscarProducto()"><i class="fas fa-search"></i> Buscar Producto</button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="../controller/productoserviciocontroller.php" method="GET">
                                        <input type="text" name="idUser" value="<?php echo $_SESSION['idUser']; ?>" style="display: none;">
                                        <input type="text" name="totalPagar" id="total" style="display: none;">
                                        <div class="card">
                                            <div class="card-body table-responsive p-0">
                                                <table class="table colorestabla" style="padding: 15px; display:none" id="tablaProducto">
                                                    <thead>
                                                        <tr class="estiloTr">
                                                            <th>Codigo</th>
                                                            <th>Producto</th>
                                                            <th>Cantidad</th>
                                                            <th>Precio</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablaFacturaProducto">


                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="3"></td>
                                                            <td>Total:</td>
                                                            <td name="total" id="totalProducto"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4"></td>
                                                            <td><button type="submit" name="funcion" value="facturaProductoCajero" class="btn btn-success"><i class="fas fa-money-check-alt"></i> Pagar</button></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'footer.php'; ?>
    <script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/relogAutomatico.min.js"></script>
    <script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/cajero.min.js"></script>
    <script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>
    <script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/eliminar.min.js"></script>

    <!--Buscar Cliente-->
    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header estiloModalHeader">
                    <h4 class="modal-title">Buscar Cliente: </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body estiloModalBody">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Tipo de Documento: </label>
                            <select class="form-control" id="tipoDocumento2" name="tipoDocumento" onchange="buscarCliente()">
                                <option value="" selected>Selecciones una opción</option>
                                <option value="TI">Tarjeta de Identidad</option>
                                <option value="CC">Cedula Ciudadanía</option>
                                <option value="CE">Cedula Extranjería</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Documento: </label>
                            <input type="number" class="form-control" id="documentoIdentidad2" name="documentoIdentidad" onchange="buscarCliente()">
                        </div>
                    </div>

                    <hr>

                    <div class="card">
                        <div class="card-body table-responsive p-0" style="height: 500px;">
                            <table class="table colorestabla">
                                <thead>
                                    <tr class="estiloTr">
                                        <th></th>
                                        <th>Tipo Documento</th>
                                        <th>Documento</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                    </tr>
                                </thead>
                                <tbody id="informacionCliente">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer estiloModalBody">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!--Busqueda Producto-->

    <div class="modal fade" id="pagoProducto">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header estiloModalHeader">
                    <h4 class="modal-title">Busqueda producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body estiloModalBody">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Buscar Por Codigo: </label>
                            <div class="input-group m-b-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Buscar codigo producto.." style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Busca un producto por codigo" id="codigoProducto" name="codigoProducto" autocomplete="off" onkeyup="buscarProducto()">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Buscar Por Nombre: </label>
                            <div class="input-group m-b-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Buscar nombre producto.." style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Busca un producto por nombre" id="nombreProducto" name="nombreProducto" autocomplete="off" onkeyup="buscarProducto()">
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
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Codigo Producto</th>
                                    <th>Producto</th>
                                    <th>Valor Unitario</th>
                                </tr>
                            </thead>
                            <tbody id="informacionProducto">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer estiloModalBody">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!--Pagar reservacion-->

    <div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header estiloModalHeader">
                    <h5 class="modal-title" id="Label">Pagar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body estiloModalBody">
                    <p>¿Desea validar la reservacion?</p>
                </div>
                <div class="modal-footer estiloModalBody">
                    <form action="../controller/productoserviciocontroller.php" method="GET">
                        <input type="text" name="idReservacion" id="idReservacion" style="display: none;">
                        <input type="text" name="totalPago" id="pago" style="display: none;">
                        <input type="text" name="idUser" value="<?php echo $_SESSION['idUser']; ?>" style="display: none;">
                        <input type="text" name="idCliente" id="cliente" style="display: none;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger" name="funcion" value="validarReservacion"><i class="fas fa-money-check-alt"></i> Pagar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>