<?php
require_once 'headPagina.php';
require_once '../controller/pedidoController.php';

$idEmpresa = $_GET['idEmpresa'];
$oPedidoController = new pedidoController();
$oEmpresa = $oPedidoController->consultarEmpresaId($idEmpresa);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR EMPRESA</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header" style="background-color: rgb(249, 201, 242);">
                <label class="card-title" style="-webkit-text-fill-color: black;">EDITAR EMPRESA</label>
            </div>
            <form action="../controller/pedidoController.php" method="GET" id="formUsuario">
                <input type="text" name="idEmpresa" value="<?php echo $idEmpresa; ?>" style="display: none;">
                <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                    <div class="row">
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="">Nit</label>
                            <input type="text" class="form-control" name="Nit" placeholder="NIT" value="<?php echo $oEmpresa->Nit; ?>">
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="">Nombre Empresa</label>
                            <input type="text" class="form-control" name="nombreEmpresa" placeholder="Nombre Empresa" value="<?php echo $oEmpresa->nombreEmpresa; ?>">
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="">Direccion</label>
                            <input type="text" class="form-control" name="direccion" placeholder="Direccion" value="<?php echo $oEmpresa->direccion; ?>">
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                    <a href="listarEmpresa.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                    <button type="submit" class="btn btn-success" name="funcion" value="actualizarEmpresa"><i class="fas fa-edit"></i> Actualizar Empresa</button>
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
                Nit: {
                    required: true,
                },
                nombreEmpresa: {
                    required: true,
                    minlength: 5,
                    maxlength: 30,
                },
                direccion: {
                    required: true,
                },
            },
            messages: {
                Nit: {
                    required: "Por favor, complete el campo vacio",
                },
                nombreEmpresa: {
                    required: "Por favor, ingrese un nombre  de la empresa",
                    minlength: "Minimo 5 letras para el Nombre de la empresa",
                    maxlength: "Maximo 30 letras para el Nombre de la empresa"
                },
                direccion: {
                    required: "Por favor, complete el campo vacio",
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