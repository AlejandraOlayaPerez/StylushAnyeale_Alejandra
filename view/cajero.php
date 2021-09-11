<?php
session_start();

date_default_timezone_set('America/Bogota');
$fechaActual = Date("Y-m-d");
$horaActual = Date("H:i:s");

require_once '../model/cliente.php';
$oCliente = new cliente();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cajero</title>

    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/css-font.css">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/css/adminlte.min.css">
    <link rel="shortcut icon" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" type="image/x-icon">
</head>

<body class="hold-transition layout-top-nav">
    <div class="container">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand-md navbar-dark navbar-black">
                <div class="container">
                    <a href="paginaPrincipalGerente.php" class="navbar-brand">
                        <img src="../image/PNG_LOGO.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="brand-text font-weight-light">Stylush Anyeale</span>
                    </a>

                    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item dropdown">
                                        <a href="" class="nav-link"><strong>Fecha: </strong><?php echo $fechaActual; ?></a>

                                    </li>
                                    <li class="nav-item">
                                        <div id="relojnumerico" class="reloj" onload="cargarReloj()" style="color: #0d1420;font-size: 20px;font-family: 'Times New Roman', Times, serif;color:white;letter-spacing: 5px;text-align: center;"></div>
                                    </li>

                                    <script>
                                        function cargarReloj() {

                                            // Haciendo uso del objeto Date() obtenemos la hora, minuto y segundo 
                                            var fechahora = new Date();
                                            var hora = fechahora.getHours();
                                            var minuto = fechahora.getMinutes();
                                            var segundo = fechahora.getSeconds();

                                            // Variable meridiano con el valor 'AM' 
                                            var meridiano = "AM";


                                            // Si la hora es igual a 0, declaramos la hora con el valor 12 
                                            if (hora == 0) {

                                                hora = 12;

                                            }

                                            // Si la hora es mayor a 12, restamos la hora - 12 y mostramos la variable meridiano con el valor 'PM' 
                                            if (hora > 12) {

                                                hora = hora - 12;

                                                // Variable meridiano con el valor 'PM' 
                                                meridiano = "PM";

                                            }

                                            // Formateamos los ceros '0' del reloj 
                                            hora = (hora < 10) ? "0" + hora : hora;
                                            minuto = (minuto < 10) ? "0" + minuto : minuto;
                                            segundo = (segundo < 10) ? "0" + segundo : segundo;

                                            // Enviamos la hora a la vista HTML 
                                            var tiempo = hora + ":" + minuto + ":" + segundo + " " + meridiano;
                                            document.getElementById("relojnumerico").innerText = tiempo;
                                            document.getElementById("relojnumerico").textContent = tiempo;

                                            // Cargamos el reloj a los 500 milisegundos 
                                            setTimeout(cargarReloj, 500);

                                        }

                                        // Ejecutamos la función 'CargarReloj' 
                                        cargarReloj();
                                    </script>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </nav>

            <?php
            require_once '../controller/usuarioController.php';
            $oUsuarioController = new usuarioController();
            $oUsuario = $oUsuarioController->consultarUsuarioId($_SESSION['idUser']);
            ?>

            <br>
            <form action="../controller/facturaController.php" method="GET" id="formFactura">
                <input type="text" name="funcion" value="registroFactura" style="display: none;">
                <input type="text" name="idUser" value="<?php echo $_SESSION['idUser']; ?>" style="display: none;">
                <input type="text" name="fechaFactura" value="<?php echo $fechaActual; ?>" style="display: none;">
                <input type="text" name="horaFactura" value="<?php echo $horaActual; ?>" style="display: none;">

                <div class="card card-primary">
                    <div class="card-header" style="background-color: rgba(255, 255, 204, 255);">
                        <label class="card-title" style="-webkit-text-fill-color: black;">Informacion Cajero</label>
                    </div>
                    <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                        <div class=row>
                            <div class="col col-xl-4 col-md-6 col-12">
                                <label for="" class="form-label">Tipo Documento</label>
                                <input type="text" class="form-control" name="tipoDocumento" value="<?php echo $oUsuario->tipoDocumento; ?>" readonly>
                            </div>
                            <div class="col col-xl-4 col-md-6 col-12">
                                <label for="" class="form-label">documento Identidad</label>
                                <input type="text" class="form-control" name="documentoIdentidad" value="<?php echo $oUsuario->documentoIdentidad; ?>" readonly>
                            </div>
                            <div class="col col-xl-4 col-md-6 col-12">
                                <label for="" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="<?php echo $oUsuario->primerNombre . " " . $oUsuario->segundoNombre; ?>" readonly>
                            </div>

                            <div class="col col-xl-4 col-md-6 col-12">
                                <label for="" class="form-label">Apellido</label>
                                <input type="text" class="form-control" name="apellido" value="<?php echo $oUsuario->primerApellido . " " . $oUsuario->segundoApellido; ?>" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                        <a href="paginaPrincipalGerente.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="card card-primary">
                    <div class="card-header" style="background-color: rgba(255, 255, 204, 255);">
                        <label class="card-title" style="-webkit-text-fill-color: black;">Informacion Cliente:</label>
                    </div>
                    <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                        <div class=row>
                            <div class="col col-xl-4 col-md-6 col-12">
                                <input type="text" name="idCliente" id="idCliente" style="display: none;">
                                <label for="" class="form-label">Tipo Documento</label>
                                <input type="text" class="form-control" id="tipoDocumento" readonly>
                            </div>
                            <div class="col col-xl-4 col-md-6 col-12">
                                <label for="" class="form-label">documentoIdentidad</label>
                                <input type="number" class="form-control" id="documentoIdentidad" readonly>
                            </div>
                            <div class="col col-xl-4 col-md-6 col-12">
                                <label for="" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="primerNombre" readonly>
                            </div>

                            <div class="col col-xl-4 col-md-6 col-12">
                                <label for="" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="primerApellido" readonly>
                            </div>
                            <div class="col col-xl-4 col-md-6 col-12">
                                <label for="" class="form-label">Telefono</label>
                                <input type="text" class="form-control" id="telefono" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-xl" onclick="buscarCliente();"><i class="fas fa-search"></i> Buscar Cliente</button>
                        <button type="button" class="btn btn-info" id="nuevaReservacion" onclick="crearReservacion();" style="display: none;"><i class="fas fa-calendar-plus"></i> Crear Reservacion</button>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#pagoProducto" onclick="buscarProducto()"><i class="fas fa-search"></i> Buscar Producto</button>
                    </div>
                </div>

                <hr class="featurette-divider">
                <div class="card card-primary" id="tablaReservacion" style="display: none;">
                    <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                        <h1 style="font-family: 'Times New Roman', Times, serif; font-size: 30px">Reservacion del cliente</h1>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle" style="background-color: rgba(255, 255, 204, 255);">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Servicio</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Domicilio</th>
                                        <th>Direccion</th>
                                        <th>Precio</th>
                                        <th>¿Servicio realizado?</th>
                                    </tr>
                                </thead>
                                <tbody id="informacionReservacion">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle" id="tablaProducto" style="display: none;">
                        <thead>
                            <tr style="background-color: rgb(249, 201, 242);">
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
                                <td colspan="2"></td>
                                <td>Total:</td>
                                <td name="total" id="totalProducto"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td><button type="button" class="btn btn-success" onclick="enviarFormulario()">Generar Factura</button></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </form>
        </div>

        <br>
        <br>
        <br>

        <footer class="main-footer navbar-black navbar-dark">
            <strong>
                <h7 style="font-family: 'Times New Roman', Times, serif; -webkit-text-fill-color: rgb(249, 201, 242);">"Estilo y confianza te brinda Anyeale"</h7>
            </strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>
                    <h7 style="font-family: 'Times New Roman', Times, serif; -webkit-text-fill-color: rgb(249, 201, 242);">Aleja(2021)
                </b>
            </div>
        </footer>

        <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery/jquery.min.js"></script>
        <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/js/adminlte.min.js"></script>
        <script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/js/demo.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/agregarReservacion.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/cajero.js"></script>
    </div>
</body>

</html>


<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buscar Cliente: </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Tipo de Documento: </label>
                        <select class="form-control" id="tipoDocumento2" name="tipoDocumento" onchange="buscarCliente()">
                            <option value="" selected>Selecciones una opción</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="CC">Cedula Ciudadanía</option>
                            <option value="CE">Cedula Extranjería</option>
                        </select>
                    </div>
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Documento: </label>
                        <input type="number" class="form-control" id="documentoIdentidad2" n ame="documentoIdentidad" onchange="buscarCliente()">
                    </div>
                </div>

                <hr>

                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
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
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="pagoProducto">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Busqueda producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Codigo Producto </label>
                        <input type="text" class="form-control" id="codigoProducto" name="codigoProducto" autocomplete="off" onkeyup="buscarProducto()">
                    </div>
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Nombre Producto: </label>
                        <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" autocomplete="off" onkeyup="buscarProducto()">
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <div class="card-tools">
                        <ul class="pagination pagination-sm float-right border border-dark" id="contenedorUL">
                            
                        </ul>
                    </div>
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
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>