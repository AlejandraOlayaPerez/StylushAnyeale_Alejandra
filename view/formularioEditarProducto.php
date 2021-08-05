<?php
require_once 'headPagina.php';
require_once '../controller/productoServicioController.php';

$oProductoServicioController = new productoServicioController();
$oProducto = $oProductoServicioController->consultarProducto($_GET['idProducto']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PRODUCTO</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: rgb(249, 201, 242);">
                        <label class="card-title" style="-webkit-text-fill-color: black;">EDITAR PRODUCTO</label>
                    </div>
                    <form action="../controller/productoServicioController.php" method="GET" id="formUsuario">
                        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                            <input type="text" name="IdProducto" value="<?php echo $_GET['idProducto']; ?>" style="display: none;">

                            <div class="row" style="margin: 5px; ">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Codigo Producto</label>
                                    <input class="form-control" type="text" name="codigoProducto" placeholder="Codigo Producto" value="<?php echo $oProducto->codigoProducto; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Tipo Producto</label>
                                    <select class="form-select" id="" name="tipoProducto">
                                        <option value="" disabled selected>Selecciones una opción</option>
                                        <option value="Venta" <?php if ($oProducto->tipoProducto == "Venta") {
                                                                    echo "selected";
                                                                } ?>>Venta</option>
                                        <option value="Uso(Servicios)" <?php if ($oProducto->tipoProducto == "Uso(Servicios)") {
                                                                            echo "selected";
                                                                        } ?>>Uso(Servicio)</option>
                                    </select>
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Producto</label>
                                    <input class="form-control" type="text" name="nombreProducto" placeholder="Nombre Producto" value="<?php echo $oProducto->nombreProducto; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Recomendaciones</label>
                                    <input class="form-control" type="text" name="Recomendaciones" placeholder="Recomendaciones" value="<?php echo $oProducto->recomendaciones; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Valor Unitario</label>
                                    <input class="form-control" type="text" name="valorUnitario" placeholder="Valor Unitario" value="<?php echo $oProducto->valorUnitario; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Costo Producto</label>
                                    <input class="form-control" type="text" name="costoProducto" placeholder="Costo Producto" value="<?php echo $oProducto->costoProducto; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                        <a href="listarProducto.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                        <button type="submit" class="btn btn-success" name="funcion" value="actualizarProducto"><i class="fas fa-edit"></i> Actualizar Producto</button>
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
    codigoProducto: {
        required: true,
    },
    tipoProducto: {
        required: true,
    },
    nombreProducto: {
        required: true,
        minlength: 5,
        maxlength: 30,
    },
    valorUnitario: {
        required: true,
    },
    costoProducto: {
        required: true,
    },
},
    messages: {
        codigoProducto: {
        required: "Por favor, complete el campo vacio",
    },
    tipoProducto: {
        required: "Por favor, complete el campo vacio",
    },
    nombreProducto: {
        required: "Por favor, ingrese un nombre del producto",
        minlength: "Minimo 5 letras para el Nombrdel producto",
        maxlength: "Maximo 30 letras para el Nombrdel producto"
    },
    valorUnitario: {
        required: "Por favor, complete el campo vacio",
    },
    costoProducto: {
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