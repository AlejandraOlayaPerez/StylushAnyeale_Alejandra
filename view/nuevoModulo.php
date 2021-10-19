<?php
require_once 'headPagina.php';
require_once '../model/modulo.php';
require_once '../model/conexionDB.php';

$oModulo = new modulo();
?>

<body>

  <div class="container-fluid">

    <div class="card card-primary">
      <div class="card-header" style="background-color: rgb(249, 201, 242);">
        <label class="card-title" style="-webkit-text-fill-color: black;">NUEVO MODULO</label>
      </div>
      <form action="../controller/gestionController.php" method="GET" id="formUsuario">
        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
          <div class="row" style="margin: 5px;">
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="" class="form-label">Nombre_Modulo</label>
              <input type="text" name="idModulo" value="<?php echo $oModulo->idModulo; ?>" style="display:none">
              <input type="text" class="form-control" id="" name="nombreModulo" placeholder="Nombre Modulo" minlength="5" maxlength="20" value="<?php echo $oModulo->nombreModulo; ?>">
            </div>
            <div class="col col-xl-4 col-md-6 col-12">
            <label for="" class="form-label">Seleccione un icono</label>
              <select class="form-control fa" name="icono">
              <option value="" selected>Selecciones una opción</option>
                <?php
                require_once '../controller/icono.php';
                $oIcono = new icono();
                $iconos = $oIcono->mostrarIcono();
                foreach ($iconos as $registro) {
                ?>
                  <option class="fa" value="<?php echo $registro; ?>">
                    <?php
                    echo $oIcono->descripcionIcono($registro);
                    ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
              <a href="listarModulo.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
              <button type="submit" class="btn btn-success" name="funcion" value="crearModulo"><i class="far fa-save"></i> Registrar Modulo</button>
            </div>
      </form>
    </div>
  </div>
</body>


</html>
<?php require_once 'linkjs.php'; ?>

<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        this.submit();
      }
    });
    $('#formUsuario').validate({

      rules: {
        nombreModulo: {
          required: true,
          minlength: 5,
          maxlength: 30,
        },
      },
      messages: {
        nombreModulo: {
          required: "Por favor, ingrese un nombre en el Modulo",
          minlength: "Minimo 5 letras para el Nombre del Modulo",
          maxlength: "Maximo 30 letras para el Nombre del Modulo"
        },
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.col').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>