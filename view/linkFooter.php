<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/jquery/jquery.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/dist/js/adminlte.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/popper.min.js"></script>

<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/sparklines/sparkline.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/moment/moment.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/toastr/toastr.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/fullcalendar/main.js"></script>

<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/select2/js/select2.full.min.js"></script>

<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/bootstrap.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/plugins/summernote/summernote-bs4.min.js"></script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/mensajeController.min.js"></script>
<script>
    <?php
    require_once '../controller/mensajeController.php';

    if (isset($_GET['mensaje'])) {
        $oMensaje = new mensajes();
        echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
    }
    ?>
</script>