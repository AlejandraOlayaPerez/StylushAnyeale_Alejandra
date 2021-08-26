<?php
require_once 'headPagina.php';
require_once '../model/conexionDB.php';
require_once '../model/usuario.php';

$idCargo = $_GET['idCargo'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NUEVO USUARIO</title>
</head>

<body>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: rgb(249, 201, 242);">
            <label class="card-title" style="-webkit-text-fill-color: black;">NUEVO ROL</label>
          </div>

          <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
            <a href="mostrarUsuarioCargo.php?idCargo=<?php echo $_GET['idCargo']; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
            <button type="submit" class="btn btn-success" name="funcion" value="actualizarCargoEnEmpleado"> <i class="far fa-save"></i>Registrar usuario</button>
          </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</body>

</html>

<?php
require_once 'footer.php';
?>

<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        this.submit();
      }
    });
    $('#formUsuario').validate({

      rules: {
        idUser: {
          required: true,
        },
      },
      messages: {
        nombreRol: {
          required: "Por favor, Seleccione una de las opciones requeridas",
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