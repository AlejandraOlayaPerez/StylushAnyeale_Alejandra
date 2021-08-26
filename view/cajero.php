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
                                        <a href="" class="nav-link"><strong>Hora: </strong><?php echo $horaActual; ?></a>
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
            </div>

            <hr class="featurette-divider">

            <div class="card card-primary">
                <div class="card-header" style="background-color: rgba(255, 255, 204, 255);">
                    <label class="card-title" style="-webkit-text-fill-color: black;">Datos servicios</label>
                </div>
                <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                    <h3>Informacion Cliente:</h3>
                    <br>
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
                    </div>
                    <br>
                    <h3>Informacion Reservacion:</h3>
                    <br>
                    <div class=row>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <input type="text" name="idReservacion" id="idReservacion" style="display: none;">
                            <label for="" class="form-label">Servicio</label>
                            <input type="text" class="form-control" id="servicio" readonly>
                        </div>

                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" class="form-label">Fecha Reservacion</label>
                            <input type="text" class="form-control" id="fechaReservacion" readonly>
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" class="form-label">Hora Reservacion</label>
                            <input type="text" class="form-control" id="horaReservacion" readonly>
                        </div>

                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" class="form-label">Precio</label>
                            <input type="text" class="form-control" id="precio" readonly>
                        </div>
                    </div>
                </div>

                <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-xl" onclick="buscarCliente();"><i class="fas fa-search"></i> Buscar Reservacion</button>
                    <button type="button" class="btn btn-info"><i class="fas fa-money-check-alt"></i> Pagar Reservacion</button>
                    <a href="facturaServicioPdf.php?tipoDocumento=<?php echo $_GET['tipoDocumento']; ?>&documentoIdentidad=<?php echo $_GET['documentoIdentidad']; ?>" class="btn btn-info"><i class="fas fa-print"></i> Descargar PDF</a>
                </div>
            </div>

            <div class="modal fade" id="modal-xl">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Reservaciones</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <div class="modal-body">
                                    <h1>Buscar Reservacion: </h1>
                                    <!-- <form action="" method="GET"> -->
                                        <div class="row">
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label for="" class="form-label">Tipo de Documento: </label>
                                                <select class="form-control" id="tipoDocumento2" name="tipoDocumento" onchange="buscarCliente()">
                                                    <option value="" selected>Selecciones una opción</option>
                                                    <option value="TI" >Tarjeta de Identidad</option>
                                                    <option value="CC" >Cedula Ciudadanía</option>
                                                    <option value="CE" >Cedula Extranjería</option>
                                                </select>
                                            </div>
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label for="" class="form-label">Documento: </label>
                                                <input type="number" class="form-control" id="documentoIdentidad2"n ame="documentoIdentidad"  onchange="buscarCliente()">
                                            </div>
                                        </div>
                                    <!-- </form> -->

                                    <hr>

                                    <table class="table align-middle table-responsive">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Tipo Documento</th>
                                                <th>Documento</th>
                                                <th>Nombre</th>
                                                <th>Servicio</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Precio</th>
                                            </tr>
                                        </thead>
                                        <tbody id="informacionCliente">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr style="background-color: rgb(249, 201, 242);">
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>IVA%</th>
                            <th>boton agregar fila</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3">TOTAL</td>
                            <td>TOTALCANTIDAD</td>
                            <td>TOTAL PRECIO</td>
                            <td>TOTAL IVA</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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