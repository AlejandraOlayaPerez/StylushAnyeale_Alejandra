<?php
require_once 'headPagina.php';
require_once '../model/conexionDB.php';
require_once '../model/rol.php';
require_once '../controller/gestionController.php';;

$idRol = $_GET['idRol'];

$oGestionController = new gestionController();
$listarDeUsuarioDiferente = $oGestionController->usuarioDiferenteEnRol($idRol);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIO</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <div class="card card-primary">
                    <div class="card-header" style="background-color: rgb(249, 201, 242);">
                        <label class="card-title" style="-webkit-text-fill-color: black;">NUEVO USUARIO</label>
                    </div>
                    <form action="../controller/gestionController.php" method="GET" id="formUsuario">
                        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                            <div class="row">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="">Empleados: </label>
                                    <input name="idRol" value="<?php echo $idRol; ?>" style="display:none">
                                    <select class="form-select" name="idUser">
                                        <option value="" disabled selected>Selecciones una opción</option>
                                        <?php foreach ($listarDeUsuarioDiferente as $registro) {
                                        ?>
                                            <option value="<?php echo $registro['idUser']; ?>"><?php echo $registro['primerNombre'] . " " . $registro['primerApellido']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                            <a href="listarDetalleRol.php?idRol=<?php echo $idRol; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                            <button type="submit" class="btn btn-success" name="funcion" value="registrarUsuarioEnRol"><i class="far fa-save"></i> Registrar Usuario</button>
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
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
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
        idUser: {
        required: "Por favor, Seleccione una de las opciones requeridas",
      },   
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.col').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>