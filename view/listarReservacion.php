<?php
session_start();
require_once 'permisosCliente.php';

date_default_timezone_set('America/Bogota');
$fechaActual = Date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylush Anyeale</title>

    <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/all.min.css" rel="stylesheet">
    <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/css-font.css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/listarReservacion.css" type="text/css">
    <link rel="shortcut icon" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" type="image/x-icon">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>


<body>
    <div class="container-fluid">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/"><i class="fas fa-home"></i> Inicio</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="listarReservacion.php"><i class="fas fa-calendar"></i> Tus Reservaciones</a></li>
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="nuevaReservacion.php"><i class="fas fa-calendar-plus"></i> Crea Una Reservacion</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <section class="section services-section" id="services">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="section-title">
                                <h2>¡Tus Reservacion!</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        require_once '../model/reservaciones.php';
                        $oReservacion = new reservacion();
                        $consulta = $oReservacion->listarReservacionesPorIdCliente($_SESSION['idCliente']);
                        foreach ($consulta as $registro) {
                            if ($registro['fechaReservacion'] >= $fechaActual) {
                        ?>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <div class="feature-box-1">
                                        <div class="icon">
                                            <i class="fas fa-calendar-week"></i>
                                        </div>
                                        <div class="feature-content">
                                            <h1 class="card-title pricing-card-title" style="-webkit-text-fill-color: black; font-family: 'Times New Roman', Times, serif;"><small class="text-muted fw-light"><strong>Precio: $</strong><?php echo $registro['precio']; ?></small></h1> <br>
                                            <p style="-webkit-text-fill-color: black; font-family: 'Times New Roman', Times, serif;"><strong>Estilista: </strong><?php echo $registro['estilista']; ?></p>
                                            <p style="-webkit-text-fill-color: black; font-family: 'Times New Roman', Times, serif;"><strong>Fecha: </strong><?php echo $registro['fechaReservacion']; ?></p>
                                            <p style="-webkit-text-fill-color: black; font-family: 'Times New Roman', Times, serif;"><strong>Hora: </strong><?php echo $registro['horaReservacion'] . " - " . $registro['horaFinal']; ?></p>
                                            <?php if ($registro['domicilio'] == 1) {
                                            ?>
                                                <p style="-webkit-text-fill-color: black; font-family: 'Times New Roman', Times, serif;"><strong>Domicilio: </strong><?php if ($registro['domicilio']) echo "SI"; ?> </p>
                                                <p style="-webkit-text-fill-color: black; font-family: 'Times New Roman', Times, serif;"><strong>Direccion: </strong><?php echo $registro['direccion']; ?></p>
                                            <?php } else {
                                            ?>
                                                <br>
                                                <br>
                                            <?php
                                            } ?>
                                        </div>
                                        <br>
                                        <div class="footer-content">
                                            <a href="formularioEditarReservacion.php?idReservacion=<?php echo $registro['idReservacion']; ?>" class="btn btn-success"> <i class="fas fa-edit"></i> Actualizar Reservacion</a>
                                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="eliminarReservacion(<?php echo $registro['idReservacion']; ?>)"><i class="far fa-calendar-times"></i> Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <!-- <a href="/Anyeale_proyecto/StylushAnyeale_Alejandra/" class="btn btn-dark"> <i class="fas fa-home"></i> Inicio</a> -->
                </div>
            </section>



        </main>


        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery/jquery.min.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/dist/js/adminlte.min.js"></script>
        <script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/eliminar.js"></script>
        <script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/general.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </div>
</body>


<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery/jquery.min.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/js/adminlte.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/popper.min.js"></script>


<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/sparklines/sparkline.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/moment/moment.min.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/toastr/toastr.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fullcalendar/main.js"></script>

<script src="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/bootstrap.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/mensajeController.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php
    require_once '../controller/mensajeController.php';

    if (isset($_GET['mensaje'])) {
        $oMensaje = new mensajes();
        echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
    }
    ?>
</script>


</html>

<div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Esta seguro que desea eliminar la reservacion?</p>
            </div>
            <div class="modal-footer">
                <form action="../controller/reservacionController.php" method="GET">
                    <input type="text" name="idReservacion" id="eliminarReservacion" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarReservacion"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>