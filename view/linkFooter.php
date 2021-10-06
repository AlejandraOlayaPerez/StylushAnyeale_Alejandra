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

<script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

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
<script>
    <?php
    require_once '../controller/mensajeController.php';

    if (isset($_GET['mensaje'])) {
        $oMensaje = new mensajes();
        echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
    }
    ?>
</script>