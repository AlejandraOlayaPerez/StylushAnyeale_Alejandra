<?php
require_once 'headPagina.php';
require_once '../model/pagina.php';
require_once '../model/conexiondb.php';

$oPagina = new pagina();
$idModulo = $_GET['idModulo'];
?>

<body>

  <div class="container-fluid">

    <div class="card card-primary">
      <div class="card-header" style="background-color: rgb(249, 201, 242);">
        <label class="card-title" style="-webkit-text-fill-color: black;">NUEVA PAGINA</label>
      </div>
      <form action="../controller/gestionController.php" method="GET" id="formUsuario">
        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
          <div class="row" style="margin: 5px;">
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="" class="form-label">Nombre_Pagina</label>
              <input type="text" name="idModulo" value="<?php echo $idModulo; ?>" style="display:none;">
              <input type="text" class="form-control" id="" name="nombrePagina" placeholder="Nombre de la pagina" value="<?php echo $oPagina->nombrePagina; ?>">
            </div>
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="" class="form-label">Enlace_Pagina</label>
              <input type="text" class="form-control" id="" name="enlace" placeholder="enlace de la pagina" value="<?php echo $oPagina->enlace; ?>">
            </div>
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="" class="form-label">¿Se requiere inicio de sesion?</label>
              <select class="form-select" id="" name="requireSession">

                <option value="" disabled selected>Selecciones una opción</option>
                <option value="true" <?php if ($oPagina->requireSession == "SI") {
                                        echo "selected";
                                      } ?>>SI</option>
                <option value="false" <?php if ($oPagina->requireSession == "NO") {
                                        echo "selected";
                                      } ?>>NO</option>
              </select>
            </div>
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="" class="form-label">¿Requiere vista menu?</label>
              <select class="form-select" id="" name="menu">

                <option value="" disabled selected>Selecciones una opción</option>
                <option value="true" <?php if ($oPagina->menu == "SI") {
                                        echo "selected";
                                      } ?>>SI</option>
                <option value="false" <?php if ($oPagina->menu == "NO") {
                                        echo "selected";
                                      } ?>>NO</option>
              </select>
            </div>
          </div>
        </div>
        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
          <a href="listarPagina.php?idModulo=<?php echo $idModulo; ?>" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
          <button type="submit" class="btn btn-success" name="funcion" value="crearPagina"><i class="fas fa-save"></i> Registrar Pagina</button>
        </div>
      </form>
    </div>

  </div>

</body>

</html>

<?php require_once 'footer.php'; ?>
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
        nombrePagina: {
          required: true,
          minlength: 5,
          maxlength: 30,
        },
        enlace: {
          required: true,
          minlength: 5,
        },
        requireSession: {
          required: true,
        },
      },
      messages: {
        nombrePagina: {
          required: "Por favor, ingrese un nombre en el Pagina",
          minlength: "Minimo 5 letras para el Nombre del Pagina",
          maxlength: "Maximo 30 letras para el Nombre del Pagina"
        },
        enlace: {
          required: "Por favor, ingrese un enlace para la Pagina"
        },
        requireSession: {
          required: "Por favor, seleccione una opcion para seleccionar"
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