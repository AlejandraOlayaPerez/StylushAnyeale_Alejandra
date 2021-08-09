<?php
require_once 'headPagina.php';
require_once '../controller/usuarioController.php';

$idUser = $_SESSION['idUser'];
$oUsuarioController = new usuarioController();
$oUsuario = $oUsuarioController->consultarUsuarioId($_SESSION['idUser']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO USUARIO</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card card-ligth">
                    <div class="card-header" style="background-color: rgb(249, 201, 242);">
                        <label class="card-title" style="-webkit-text-fill-color: black;">INFORMACION PERSONAL</label>
                    </div>
                    <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                        <form action="../controller/usuarioController.php" method="GET" id="formUsuario">
                            <input type="text" name="idUser" value="<?php echo $idUser; ?>" style="display: none;">
                            <input type="text" name="idRol" value="<?php echo $oUsuario->idRol; ?>" style="display: none;">
                            <div class="row">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Tipo de Documento</label>
                                    <select class="form-select" name="tipoDocumento">
                                        <option value="" disabled selected>Selecciones una opción</option>
                                        <option value="TI" <?php if ($oUsuario->tipoDocumento == "TI") {
                                                                echo "selected";
                                                            } ?>>Tarjeta de Identidad</option>
                                        <option value="CC" <?php if ($oUsuario->tipoDocumento == "CC") {
                                                                echo "selected";
                                                            } ?>>Cedula Ciudadanía</option>
                                        <option value="CE" <?php if ($oUsuario->tipoDocumento == "CE") {
                                                                echo "selected";
                                                            } ?>>Cedula Extranjería</option>
                                    </select>
                                </div>

                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Documento identidad</label>
                                    <input type="number" class="form-control" name="documentoIdentidad" value="<?php echo $oUsuario->documentoIdentidad; ?>">
                                </div>

                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Primer Nombre</label>
                                    <input type="text" class="form-control" name="primerNombre" value="<?php echo $oUsuario->primerNombre; ?>">
                                </div>

                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Segundo Nombre</label>
                                    <input type="text" class="form-control" name="segundoNombre" value="<?php echo $oUsuario->segundoNombre; ?>">
                                </div>

                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Primer Apellido</label>
                                    <input type="text" class="form-control" name="primerApellido" value="<?php echo $oUsuario->primerApellido; ?>">
                                </div>

                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Segundo Apellido</label>
                                    <input type="text" class="form-control" name="segundoApellido" value="<?php echo $oUsuario->segundoApellido; ?>">
                                </div>

                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Correo Electronico</label>
                                    <input type="email" class="form-control" name="correoElectronico" value="<?php echo $oUsuario->correoElectronico; ?>">
                                </div>

                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Telefono</label>
                                    <input type="number" class="form-control" name="telefono" value="<?php echo $oUsuario->telefono; ?>">
                                </div>

                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" name="fechaNacimiento" value="<?php echo $oUsuario->fechaNacimiento; ?>">
                                </div>

                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Genero</label>
                                    <select class="form-select" name="genero">
                                        <option value="" selected>Selecciones una opción</option>
                                        <option value="Femenino" <?php if ($oUsuario->genero == "Femenino") {
                                                                        echo "selected";
                                                                    } ?>>Femenino</option>
                                        <option value="Masculino" <?php if ($oUsuario->genero == "Masculino") {
                                                                        echo "selected";
                                                                    } ?>>Masculino</option>
                                        <option value="Otro" <?php if ($oUsuario->genero == "Otro") {
                                                                    echo "selected";
                                                                } ?>>Otro</option>
                                    </select>
                                </div>

                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Estado Civil</label>
                                    <select class="form-select" name="estadoCivil">
                                        <option value="" selected>Selecciones una opción</option>
                                        <option value="Soltero" <?php if ($oUsuario->estadoCivil == "Soltero") {
                                                                    echo "selected";
                                                                } ?>>Soltero</option>
                                        <option value="Casado" <?php if ($oUsuario->estadoCivil == "Casado") {
                                                                    echo "selected";
                                                                } ?>>Casado</option>
                                        <option value="Divorciado" <?php if ($oUsuario->estadoCivil == "Divorciado") {
                                                                        echo "selected";
                                                                    } ?>>Divorciado</option>
                                        <option value="Viudo" <?php if ($oUsuario->estadoCivil == "Viudo") {
                                                                    echo "selected";
                                                                } ?>>viudo</option>
                                    </select>
                                </div>

                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Direccion</label>
                                    <input type="text" class="form-control" name="direccion" value="<?php echo $oUsuario->direccion; ?>">
                                </div>

                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Barrio</label>
                                    <input type="text" class="form-control" name="barrio" value="<?php echo $oUsuario->barrio; ?>">
                                </div>
                            </div>
                            <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                                <button type="submit" class="btn btn-success" name="funcion" value="ActualizarUsuario"><i class="fas fa-edit"></i>Actualizar Informacion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>



<script>
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
                this.submit();
            }
        });
        $('#formUsuario').validate({

            rules: {
                tipoDocumento: {
                    required: true
                },
                documentoIdentidad: {
                    required: true,
                    documentoIdentidad: true,
                    minlength: 7,
                    maxlength: 12
                },
                primerNombre: {
                    required: true,
                    minlength: 1,
                    maxlength: 50,
                },
                segundoNombre: {
                    required: false,
                    minlength: 1,
                    maxlength: 50,
                },
                primerApellido: {
                    required: true,
                    minlength: 1,
                    maxlength: 50,
                },
                segundoApellido: {
                    required: false,
                    minlength: 1,
                    maxlength: 50,
                },
                correoElectronico: {
                    required: true,
                    correoElectronico: true
                },
                telefono: {
                    required: false,
                },
                fechaNacimiento: {
                    required: false,
                },
                genero: {
                    required: false,
                },
                estadoCivil: {
                    required: false,
                },
                direccion: {
                    required: false,
                },
                barrio: {
                    required: false,
                },
                contrasena: {
                    required: true,
                    minlength: 5
                },

            },
            messages: {
                tipoDocumento: {
                    required: "Por favor, selecciona un Tipo de documento",
                },
                documentoIdentidad: {
                    required: "Por favor, ingresa un Documento de identidad",
                    documentoIdentidad: "Ingresa un valor correcto",
                    minlength: "Minimo 10 numeros debe tener el documento",
                    maxlength: "Maximo 12 numeros debe tener el docimento"
                },
                primerNombre: {
                    required: "Por favor, complete la informacion",
                    minlength: "Minimo 2 letra para el nombre",
                    maxlength: "Maximo 50 letra para el nombre",
                },
                primerApellido: {
                    required: "Por favor, complete la informacion",
                    minlength: "Minimo 2 letra para el nombre",
                    maxlength: "Maximo 50 letra para el nombre",
                },
                correoElectronico: {
                    required: "Por favor, Ingrese un Correo Electronico",
                    correoElectronico: "Ingrese un correo electronico valido"
                },
                telefono: {
                    required: "Por favor, Ingrese un Telefono"
                },
                contrasena: {
                    required: "Por favor, Ingrese una contraseña",
                    minlength: "Ingrese una contraseña con mas de 5 caracteres"
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

<?php
require_once 'footer.php';
?>