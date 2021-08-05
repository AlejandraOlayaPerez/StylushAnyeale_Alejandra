<?php
require_once 'headPagina.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVA EMPRESA</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <?php
                require_once '../controller/mensajeController.php';

                if (isset($_GET['mensaje'])) {
                    $oMensaje = new mensajes();
                    echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
                }
                ?>
                <div class="card card-primary">
                    <div class="card-header" style="background-color: rgb(249, 201, 242);">
                        <label class="card-title" style="-webkit-text-fill-color: black;">NUEVA EMPRESA</label>
                    </div>
                    <form action="../controller/pedidoController.php" method="GET" id="formUsuario">
                        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                            <div class="row">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="">Nit</label>
                                    <input type="text" class="form-control" name="Nit" placeholder="NIT">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="">Nombre Empresa</label>
                                    <input type="text" class="form-control" name="nombreEmpresa" placeholder="Nombre Empresa">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="">Direccion</label>
                                    <input type="text" class="form-control" name="direccion" placeholder="Direccion">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                            <a href="listarEmpresa.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                            <button type="submit" class="btn btn-success" name="funcion" value="nuevaEmpresa"><i class="fas fa-save"></i> Registrar Empresa</button>
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