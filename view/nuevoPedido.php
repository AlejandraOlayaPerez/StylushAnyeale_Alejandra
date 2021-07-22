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
    <title>NUEVO PEDIDO</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">NUEVO PEDIDO</h3>
                    </div>

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
                                    <div class="row" style="margin: 5px;">
                                        <div class="col-md-6">
                                            <label for="">Fecha Pedido</label>
                                            <input class="form-control" type="date" name="fechaPedido" placeholder="Fecha Pedido">
                                        </div>
                                    </div>
                                    <br>
                                    <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                </div>

                                <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                    <form action="../controller/usuarioController.php" Method="GET">
                                        <table class="table align-middle">
                                            <thead>
                                                <tr>
                                                    <th>Selección</th>
                                                    <th>Codigo</th>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once '../model/producto.php';
                                                require_once '../model/conexiondb.php';

                                                $oProducto = new producto();
                                                ?><input type="text" name="idProducto" value="<?php echo $oProducto->idProducto; ?>" style="display:none;"><?php
                                                $Consulta = $oProducto->mostrarProducto();
                                                foreach ($Consulta as $registro) {
                                                ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="productos[]" value="<?php echo $oProducto->idProducto; ?>"></td>
                                                        <td><?php echo $registro['codigoProducto']; ?></td>
                                                        <td><?php echo $registro['nombreProducto']; ?></td>
                                                        <td><input class="form-control" type="number" name="cantidadProducto" placeholder="Cantidad"></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </form>
                                    <br>
                                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                    <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
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