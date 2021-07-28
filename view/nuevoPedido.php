<?php
require 'headGerente.php';
require_once '../model/conexionDB.php';
require_once '../model/pedido.php';
require_once '../model/producto.php';
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/permisoHabilitar.js"></script>
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/agregarProductos.js"></script>
    <title>NUEVO PEDIDO</title>
</head>

<body>
    <div class="container">
        <div class="rowcol col-xl-4 col-md-6 col-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">NUEVO PEDIDO</h3>
                    </div>

                    <form action="../controller/usuarioController.php" method="GET">
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
                                                <input class="form-control" type="date" name="fechaPedido" placeholder="Fecha Pedido">
                                            </div>
                                        </div>
                                        <div class="row" style="margin: 5px;">
                                            <div class="col-md-6">
                                                <label for="">Documento Identidad</label>
                                                <input class="form-control" type="number" name="documentoIdentidad" placeholder="Documento Identidad">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Responsable del pedido</label>
                                                <input class="form-control" type="text" name="responsablePedido" placeholder="Responsable Pedido">
                                            </div>
                                        </div>
                                        <div class="row" style="margin: 5px;">
                                            <div class="col-md-6">
                                                <label for="">Empresa</label>
                                                <input class="form-control" type="text" name="empresa" placeholder="Empresa">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Direccion</label>
                                                <input class="form-control" type="text" name="direccion" placeholder="Direccion">
                                            </div>
                                        </div>
                                        <br>
                                        <button class="btn btn-info" type="button" onclick="stepper.next()"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                                        <a href="listarPedido.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                                    </div>


                                </div>

                                <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">

                                    <div class="row">
                                        <div class="col-ms-6">
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">Agregar Productos</button>

                                            <div class="modal fade" id="modal-default">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Default Modal</h4>
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
                                                                    $Consulta = $oProducto->mostrarProducto();
                                                                    foreach ($Consulta as $registro) {
                                                                    ?>

                                                                        <tr>
                                                                            <td><button type="button" class="btn btn-success" data-dismiss="modal" onclick="agregarProducto('<?php echo $registro['IdProducto']?>','<?php echo $registro['codigoProducto'];?>','<?php echo $registro['nombreProducto']; ?>'
                                                                                )">Agregar</button></td>
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
                                    <button class="btn btn-info" type="button" onclick="stepper.previous()"><i class="fas fa-arrow-circle-left"></i> Anterior</button>
                                    <button class="btn btn-success" type="submit" name="funcion" value="nuevoPedido"><i class="fas fa-save"></i> Guardar</button>
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


<?php
require_once 'footerGerente.php';
?>

<script>
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
</script>