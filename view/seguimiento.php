<?php
require_once 'headpagina.php';
require_once 'seguimiento.php';
require_once '../model/seguimiento.php';
$oSeguimiento = new seguimiento();
?>

<body>
    <div class="container">
        <div class="row text-center justify-content-center mb-5">
            <div class="col-xl-6 col-lg-8">
                <h2 class="font-weight-bold">Sección de seguimiento</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="timeline">
                    <?php
                    require_once '../model/seguimiento.php';
                    $oSeguimiento = new seguimiento();
                    $consulta = $oSeguimiento->listarSeguimientos();
                    $fechaAnterior = "";
                    foreach ($consulta as $registro) {
                        if ($fechaAnterior != $registro['fechaSeguimiento']) {
                            $fechaAnterior = $registro['fechaSeguimiento'];
                    ?>
                            <div class="time-label">
                                <span class="bg-pink"><?php echo $registro['fechaSeguimiento']; ?></span>

                            </div>
                        <?php } ?>

                        <div>
                            <?php if ($registro['IdPedido'] != 0) {
                            ?>
                                <i class="fas fa-bell"></i>
                                <div class="timeline-item" style="background-color: rgba(255, 255, 204, 255);">
                                    <span class="time"><i class="fas fa-clock"></i> <?php echo $registro['horaSeguimiento']; ?></span>
                                    <p class="timeline-header">El usuario <?php echo $registro['primerNombre'] . " " . $registro['primerApellido']; ?> a trabajado en el pedido <?php echo $registro['IdPedido']; ?></p>

                                    <div class="timeline-body">
                                        <p><?php echo $registro['observacion']; ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <div>
                            <?php if ($registro['idFactura'] != 0) {
                            ?>
                                <i class="fas fa-bell"></i>
                                <div class="timeline-item" style="background-color: rgba(255, 255, 204, 255);">
                                    <span class="time"><i class="fas fa-clock"></i> <?php echo $registro['horaSeguimiento']; ?></span>
                                    <p class="timeline-header">El usuario <?php echo $registro['primerNombre'] . " " . $registro['primerApellido']; ?> a trabajado en la factura <?php echo $registro['idFactura']; ?></p>

                                    <div class="timeline-body">
                                        <p><?php echo $registro['observacion']; ?></p>
                                    </div>
                                </div>
                            <?php  } ?>
                        </div>

                        <div>
                            <?php if ($registro['idUser'] != 0) {
                            ?>
                                <i class="fas fa-bell"></i>
                                <div class="timeline-item" style="background-color: rgba(255, 255, 204, 255);">
                                    <span class="time"><i class="fas fa-clock"></i> <?php echo $registro['horaSeguimiento']; ?></span>
                                    <p class="timeline-header">El usuario <?php echo $registro['primerNombre'] . " " . $registro['primerApellido']; ?> a actualizado su contraseña</p>

                                    <div class="timeline-body">
                                        <p><?php echo $registro['observacion']; ?></p>
                                    </div>
                                </div>
                            <?php  } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<?php require_once 'footer.php'; ?>
<?php require_once 'linkjs.php'; ?>