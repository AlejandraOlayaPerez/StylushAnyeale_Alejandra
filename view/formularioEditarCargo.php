<?php
require_once 'headPagina.php';
require_once '../model/cargo.php';
require_once '../model/conexionDB.php';
require_once '../controller/cargoController.php';

$oCargoController = new cargoController();
$oCargo = $oCargoController->consultarCargoPorId($_GET['idCargo']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EDITAR CARGO</title>
</head>

<body>
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header" style="background-color: rgb(249, 201, 242);">
        <label class="card-title" style="-webkit-text-fill-color: black;">EDITAR CARGO</label>
      </div>
      <form action="../controller/cargoController.php" method="GET" id="formUsuario">
        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
          <input type="text" name="idCargo" value="<?php echo $_GET['idCargo']; ?>" style="display: none;">

          <div class="row" style="margin: 5px;">
            <?php
            require_once '../model/servicio.php';
            $oServicio = new servicio();
            $result = $oServicio->mostrarServicio();
            ?>
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="">Servicio</label>
              <select select class="form-select" name="idServicio">
                <option value="" disabled selected>Selecciones una opción</option>
                <?php

                foreach ($result as $registro) {
                ?>
                  <option value="<?php echo $registro['IdServicio']; ?>" <?php if ($registro['IdServicio'] == $oCargo->IdServicio) {
                                                                            echo "selected";
                                                                          } ?>><?php echo $registro['nombreServicio']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
          <a href="listarCargo.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
          <button type="submit" class="btn btn-success" name="funcion" value="actualizarCargo"><i class="fas fa-edit"></i> Actualizar Cargo</button>
        </div>
      </form>
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
        cargo: {
          required: true,
          minlength: 5,
          maxlength: 30,
        },
        descripcionCargo: {
          required: true,
          minlength: 5,
          maxlength: 100,
        },
      },
      messages: {
        cargo: {
          required: "Por favor, ingrese un nombre en el Cargo",
          minlength: "Minimo 5 letras para el Nombre del Cargo",
          maxlength: "Maximo 30 letras para el Nombre del Cargo"
        },
        descripcionCargo: {
          required: "Por favor, ingrese una descripcion para el cargo",
          minlength: "Minimo 5 letras para la descripcion del Cargo",
          maxlength: "Maximo 100 letras para la descripcion del Cargo"
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