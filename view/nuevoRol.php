<?php
require_once 'headPagina.php';
require_once '../model/rol.php';
require_once '../model/conexionDB.php';

$oRol = new rol();
?>

<body>
  <div class="container-fluid">
  
    <div class="card card-primary">
      <div class="card-header" style="background-color: rgb(249, 201, 242);">
        <label class="card-title" style="-webkit-text-fill-color: black;">NUEVO ROL</label>
      </div>
      <form id="formUsuario" action="../controller/gestionController.php" method="GET">
        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
          <div class="row" style="margin: 5px; ">
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="" class="form-label">Nombre_Rol</label>
              <input class="form-control" type="text" name="nombreRol" placeholder="Nombre del Rol">
            </div>
          </div>
          <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
            <a href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/listarRol.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
            <button type="submit" class="btn btn-success" name="funcion" value="crearRol"><i class="far fa-save"></i> Registrar Rol</button>
          </div>
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
        nombreRol: {
          required: true,
          minlength: 5,
          maxlength: 30,
        },
      },
      messages: {
        nombreRol: {
          required: "Por favor, ingrese un nombre en el Rol",
          minlength: "Minimo 5 letras para el Nombre del Rol",
          maxlength: "Maximo 30 letras para el Nombre del Rol"
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