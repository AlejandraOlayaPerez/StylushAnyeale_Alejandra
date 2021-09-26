<?php
require_once 'headPagina.php';
require_once '../model/seguimiento.php';
$oSeguimiento = new seguimiento();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/seguimiento.css" type="text/css">
</head>

<body>
    <div class="container">
        <div class="row text-center justify-content-center mb-5">
            <div class="col-xl-6 col-lg-8">
                <h2 class="font-weight-bold">Sección de seguimiento de factura</h2>
            </div>
        </div>
        <section class="timeline_area section_padding_130">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="apland-timeline-area">
                            <div class="single-timeline-area">
                                <div class="timeline-date wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                                    <p>FACTURA</p>
                                </div>
                                <div class="row">
                                    <?php
                                    $consulta = $oSeguimiento->consultarSeguimientoFactura($_GET['idFactura']);
                                    if (count($consulta) > 0) {
                                        foreach ($consulta as $registro) {
                                    ?>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="single-timeline-content d-flex wow fadeInLeft" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                                    <div class="timeline-icon"><i class="fas fa-bell" aria-hidden="true"></i></div>
                                                    <div class="timeline-text">
                                                        <h6>El usuario <?php echo $registro['primerNombre'] . " " . $registro['primerApellido']; ?> a trabajado en el pedido <?php echo $registro['IdPedido']; ?></h6>
                                                        <p><?php echo $registro['observacion']; ?></p>
                                                        <hr>
                                                        <small class="date"><i class="fas fa-calendar-alt"></i> <?php echo $registro['fechaSeguimiento']; ?></small>
                                                        <small class="time float-right"><i class="fas fa-clock"></i> <?php echo $registro['horaSeguimiento']; ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="single-timeline-content d-flex wow fadeInLeft" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                                <div class="timeline-icon">
                                                    <<i class="fas fa-bell" aria-hidden="true"></i>
                                                </div>
                                                <div class="timeline-text">
                                                    <h6>Esta informacion no ha sido cambiada</h6>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>