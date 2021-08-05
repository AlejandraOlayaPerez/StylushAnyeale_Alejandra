<?php
require_once 'headPagina.php';
require_once '../model/servicio.php';
$oServicio = new servicio();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVO SERVICIO</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">


                <div class="card card-primary">
                    <div class="card-header" style="background-color: rgb(249, 201, 242);">
                        <label class="card-title" style="-webkit-text-fill-color: black;">NUEVO SERVICIO</label>
                    </div>
                    <form action="../controller/productoServicioController.php" method="GET" id="formUsuario">
                        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                            <div class="row" style="margin: 5px; ">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Codigo Servicio</label>
                                    <input class="form-control" type="text" name="codigoServicio" placeholder="Codigo Servicio">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Servicio</label>
                                    <input class="form-control" type="text" name="nombreServicio" placeholder="Nombre Servicio">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Detalle Servicio</label>
                                    <input class="form-control" type="text" name="detalleServicio" placeholder="DetalleServicio">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Costo</label>
                                    <input class="form-control" type="number" name="costo" placeholder="Costo">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                            <a href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/listarServicio.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                            <button type="submit" class="btn btn-success" name="funcion" value="crearServicio"><i class="far fa-save"></i> Registrar Servicio</button>
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
    codigoServicio: {
        required: true,
    },
    nombreServicio: {
        required: true,
        minlength: 5,
        maxlength: 30,
    },
    costo: {
        required: true,
    },
},
    messages: {
        codigoServicio: {
        required: "Por favor, complete el campo vacio",
    },
    nombreServicio: {
        required: "Por favor, ingrese un nombre del producto",
        minlength: "Minimo 5 letras para el Nombrdel producto",
        maxlength: "Maximo 30 letras para el Nombrdel producto"
    },
    costo: {
        required: "Por favor, complete el campo vacio",
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