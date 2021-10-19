<?php
require_once 'headPagina.php';
require_once '../controller/gestionController.php';
require_once '../model/modulo.php';
require_once '../model/pagina.php';

$oGestionController = new gestionController();
$oPagina = $oGestionController->consultarPaginaId($_GET['idPagina']);

?>

<body>
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header" style="background-color: rgb(249, 201, 242);">
        <label class="card-title" style="-webkit-text-fill-color: black;">EDITAR PAGINA</label>
      </div>
      <form action="../controller/gestionController.php" method="GET" id="formUsuario">
        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
          <div class="row" style="margin: 5px;">
            <div class="col col-xl-4 col-md-8 col-12">
              <label for="">Nombre_Pagina</label>
              <input type="text" name="idPagina" value="<?php echo $oPagina->idPagina; ?>" style="display:none;">
              <input type="text" name="idModulo" value="<?php echo $oPagina->idModulo; ?>" style="display:none;">
              <input class="form-control" type="text" name="nombrePagina" value="<?php echo $oPagina->nombrePagina; ?>" required>
            </div>
            <div class="col col-xl-4 col-md-8 col-12">
              <label for="">Enlace_Pagina</label>
              <input class="form-control" type="text" name="enlace" value="<?php echo $oPagina->enlace; ?>" required>
            </div>
            <div class="col col-xl-4 col-md-8 col-12">
              <label for="" class="form-label">¿Se requiere inicio de sesion?</label>
              <select class="form-select" id="" name="requireSession" required>
                <option value="" disabled selected>Selecciones una opción</option>
                <option value="true" <?php if ($oPagina->requireSession) {
                                        echo "selected";
                                      } ?>>SI</option>
                <option value="false" <?php if (!$oPagina->requireSession) {
                                        echo "selected";
                                      } ?>>NO</option>
              </select>
            </div>
            <div class="col col-xl-4 col-md-8 col-12">
              <label for="" class="form-label">¿Vista Menu?</label>
              <select class="form-select" id="" name="menu" required>
                <option value="" disabled selected>Selecciones una opción</option>
                <option value="true" <?php if ($oPagina->menu) {
                                        echo "selected";
                                      } ?>>SI</option>
                <option value="false" <?php if (!$oPagina->menu) {
                                        echo "selected";
                                      } ?>>NO</option>
              </select>
            </div>
          </div>
        </div>
        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
          <a href="listarPagina.php?idModulo=<?php echo $oPagina->idModulo; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
          <button type="submit" class="btn btn-success" name="funcion" value="actualizarPagina"><i class="fas fa-edit"></i> Actualizar Pagina</button>
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