<?php
session_start();
require_once 'permisosCliente.php';

require_once '../controller/clienteController.php';
$oClienteController = new clienteController();
$oCliente = $oClienteController->consultarCliente($_SESSION['idCliente']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylush Anyeale</title>

    <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/all.min.css" rel="stylesheet">
    <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/css-font.css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <link rel="shortcut icon" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" type="image/x-icon">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .card{
            box-shadow: 10px 10px 10px rgb(209, 208, 208);
        }
    </style>
    <title>PERFIL</title>
</head>

<body>
    <div class="container">
        <?php
        require_once '../controller/mensajeController.php';

        if (isset($_GET['mensaje'])) {
            $oMensaje = new mensajes();
            echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
        }
        ?>
        <div class="main-body">

            <?php
            $oInformacion = $oClienteController->perfilCliente($_SESSION['idCliente']);
            ?>

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img class="img-circle elevation-2" src="..<?php echo $oInformacion->fotoPerfilCliente; ?>" width="150">
                                <div class="mt-3">
                                    <h4><?php echo $oInformacion->primerNombre . " " . $oInformacion->primerApellido; ?></h4>
                                    <p class="text-secondary mb-1"><?php echo $oInformacion->email; ?></p>
                                    <p class="text-muted font-size-sm"><?php echo $oInformacion->telefono; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters-sm">
                        <div class="col-sm-12 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-striped table-valign-middle">
                                            <thead>
                                                <tr style="background-color: rgb(249, 201, 242);">
                                                    <th>Servicio</th>
                                                    <th>Fecha</th>
                                                    <th>Hora</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $consulta = $oClienteController->mostrarReservacionIdCliente($_SESSION['idCliente']);
                                                if (count($consulta) > 0) {
                                                    foreach ($consulta as $registro) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $registro['nombreServicio']; ?></td>
                                                            <td><?php echo $registro['fechaReservacion']; ?></td>
                                                            <td><?php echo $registro['horaReservacion']; ?></td>
                                                        </tr>
                                                    <?php }
                                                } else { //en caso de que no tengo informacion, mostrara un mensaje
                                                    ?>
                                                    <!-- no hay ningun registro -->
                                                    <tr>
                                                        <td colspan="3" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No tiene reservaciones pendientes</td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters-sm">
                        <div class="col-sm-12 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <form action="../controller/imagenController.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Actualizar foto de perfil</label>
                                                <input name="perfil" type="file" class="form-control" accept="image/*">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <a href="paginaPrincipalCliente.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                                                <button type="submit" class="btn btn-success float-right" name="funcion" value="actualizarFotoCliente"><i class="fas fa-edit"></i>Actualizar foto</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form id="formulario" action="" method="POST">
                                <input type="text" name="idCliente" value="<?php echo $_SESSION['idCliente']; ?>" style="display: none;">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="" class="form-label">Tipo de Documento</label>
                                        <select class="form-select" id="tipoDocumento" name="tipoDocumento" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
                                            <option value="" disabled selected>Selecciones una opción</option>
                                            <option value="TI" <?php if ($oCliente->tipoDocumento == "TI") {
                                                                    echo "selected";
                                                                } ?>>Tarjeta de Identidad</option>
                                            <option value="CC" <?php if ($oCliente->tipoDocumento == "CC") {
                                                                    echo "selected";
                                                                } ?>>Cedula Ciudadanía</option>
                                            <option value="CE" <?php if ($oCliente->tipoDocumento == "CE") {
                                                                    echo "selected";
                                                                } ?>>Cedula Extranjería</option>
                                        </select>
                                        <span id="tipoDocumentoSpan"></span>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label">Documento identidad</label>
                                        <input type="number" class="form-control" id="documentoIdentidad" name="documentoIdentidad" value="<?php echo $oCliente->documentoIdentidad; ?>" onchange="validarCampo(this);" minlength="5" maxlength="13" required>
                                        <span id="documentoIdentidadSpan"></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Primer Nombre</label>
                                        <input type="text" class="form-control" id="primerNombre" name="primerNombre" value="<?php echo $oCliente->primerNombre; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
                                        <span id="primerNombreSpan"></span>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label">Segundo Nombre</label>
                                        <input type="text" class="form-control" id="segundoNombre" name="segundoNombre" value="<?php echo $oCliente->segundoNombre; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50">
                                        <span id="segundoNombreSpan"></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Primer Apellido</label>
                                        <input type="text" class="form-control" id="primerApellido" name="primerApellido" value="<?php echo $oCliente->primerApellido; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
                                        <span id="primerApellidoSpan"></span>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label">Segundo Apellido</label>
                                        <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" value="<?php echo $oCliente->segundoApellido; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50">
                                        <span id="segundoApellidoSpan"></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $oCliente->fechaNacimiento; ?>" onchange="validarCampo(this);" required>
                                        <span id="fechaNacimientoSpan"></span>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label">Genero</label>
                                        <select class="form-select" id="genero" name="genero" onchange="validarCampo(this);">
                                            <option value="" selected>Selecciones una opción</option>
                                            <option value="Femenino" <?php if ($oCliente->genero == "Femenino") {
                                                                            echo "selected";
                                                                        } ?>>Femenino</option>
                                            <option value="Masculino" <?php if ($oCliente->genero == "Masculino") {
                                                                            echo "selected";
                                                                        } ?>>Masculino</option>
                                            <option value="Otro" <?php if ($oCliente->genero == "Otro") {
                                                                        echo "selected";
                                                                    } ?>>Otro</option>
                                        </select>
                                        <span id="generoSpan"></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Direccion</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $oCliente->direccion; ?>" onchange="validarCampo(this);" minlength="2" maxlength="20">
                                        <span id="direccionSpan"></span>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label">Barrio</label>
                                        <input type="text" class="form-control" id="barrio" name="barrio" value="<?php echo $oCliente->barrio; ?>" onchange="validarCampo(this);" minlength="2" maxlength="15">
                                        <span id="barrioSpan"></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Correo Electronico</label>
                                        <input type="email" class="form-control" id="correoElectronico" name="correoElectronico" value="<?php echo $oCliente->email; ?>" onchange="validarCampo(this);" minlength="1" required>
                                        <span id="correoElectronicoSpan"></span>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label">Telefono</label>
                                        <input type="phone" class="form-control" id="telefono" name="telefono" value="<?php echo $oCliente->telefono; ?>" onchange="validarCampo(this);" min="10" max="13" required>
                                        <span id="telefonoSpan"></span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="paginaPrincipalCliente.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                                        <button type="submit" class="btn btn-success float-right" name="funcion" value="actualizarCliente"><i class="fas fa-edit"></i>Actualizar Informacion</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
<!-- <script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/validaciones.js"></script> -->

<!-- <script>
    function validarPaginaActualizar() {
        // evento.preventDefault();
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var campos = ["tipoDocumento", "documentoIdentidad", "primerNombre", "segundoNombre", "primerApellido",
            "segundoApellido", "correoElectronico", "telefono", "fechaNacimiento", "genero", "direccion", "barrio"
        ];
        campos.forEach(element => {
            var campo = document.getElementById(element);
            if (!validarCampo(campo))
                valido = false;
        });
        if (valido)
            document.getElementById('formulario').submit();
    }

    function validarCampo(campo) {
        var span = document.getElementById(campo.id + "Span");
        //console.log(campo.id + "span");
        var valido = false;
        // agregar en el switch un caso por cada tipo de dato y llamar la función de validación
        switch (campo.type) {
            case "text":
                valido = validarTexto(campo, span);
                break;
            case "number":
                valido = validarNumber(campo, span);
                break;
            case "select-one":
                valido = validarSelect(campo, span);
                break;
            case "date":
                valido = validarDate(campo, span);
                break;
            case "email":
                valido = validarEmail(campo, span);
                break;
            case "password":
                valido = validarPassword(campo, span);
                break;
        }
        return valido;
    }
    //crear una función por cada tipo de dato, ya que cada tipo tiene sus validaciones correspondientes
    function validarTexto(campo, span) {
        if (campo.required && campo.value == "") {
            $(campo).removeClass('is-valid');
            $(campo).addClass('is-invalid');
            span.style = "color:red; font-size: 10pt";
            span.innerHTML = "Por favor, Complete el campo vacio";
            return false;
        }
        if (campo.value != "" && campo.value.length < campo.minLength) {
            $(campo).removeClass('is-valid');
            $(campo).addClass('is-invalid');
            span.style = "color:red; font-size: 10pt";
            span.innerHTML = "Longitud mínima " + campo.minLength;
            return false;
        }
        $(campo).removeClass('is-invalid');
        $(campo).addClass('is-valid');
        span.style = "color:green; font-size: 10pt";
        span.innerHTML = "Valor correcto";
        return true;
    }

    function validarNumber(campo, span) {
        if (campo.required && campo.value == "") {
            $(campo).removeClass('is-valid');
            $(campo).addClass('is-invalid');
            span.style = "color:red; font-size: 10pt";
            span.innerHTML = "Por favor, complete el campo vacio";
            return false;
        }
        if (campo.value.length < campo.minLength) {
            $(campo).removeClass('is-valid');
            $(campo).addClass('is-invalid');
            span.style = "color:red; font-size: 10pt";
            span.innerHTML = "Debe tener un minimo de " + campo.minLength + " numeros";
            return false;
        }
        $(campo).removeClass('is-invalid');
        $(campo).addClass('is-valid');
        span.style = "color:green; font-size: 10pt";
        span.innerHTML = "El campo es valido";
        return true;
    }

    function validarSelect(campo, span) {
        if (campo.required && campo.value == "") {
            $(campo).removeClass('is-valid');
            $(campo).addClass('is-invalid');
            span.style = "color:red; font-size: 10pt";
            span.innerHTML = "Por favor, seleccione unas de las opciones";
            return false;
        }
        $(campo).removeClass('is-invalid');
        $(campo).addClass('is-valid');
        span.style = "color:green; font-size: 10pt";
        span.innerHTML = "Valor correcto";
        return true;
    }

    function validarDate(campo, span) {
        if (campo.required && campo.value == "") {
            $(campo).removeClass('is-valid');
            $(campo).addClass('is-invalid');
            span.style = "color:red; font-size: 10pt";
            span.innerHTML = "Por favor, Seleccione su fecha de nacimiento";
            return false;
        }
        $(campo).removeClass('is-invalid');
        $(campo).addClass('is-valid');
        span.style = "color:green; font-size: 10pt";
        span.innerHTML = "Valor correcto";
        return true;
    }

    function validarEmail(campo, span) {
        if (campo.required && campo.value == "") {
            $(campo).removeClass('is-valid');
            $(campo).addClass('is-invalid');
            span.style = "color:red; font-size: 10pt";
            span.innerHTML = "Por favor, Complete el campo vacio";
            return false;
        }
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if (!emailRegex.test(campo.value)) {
            $(campo).removeClass('is-valid');
            $(campo).addClass('is-invalid');
            span.style = "color:red; font-size: 10pt";
            span.innerHTML = "Por favor, Ingrese un correo electronico valido, ejemplo: example@email.com";
            return false;
        }
        $(campo).removeClass('is-invalid');
        $(campo).addClass('is-valid');
        span.style = "color:green; font-size: 10pt";
        span.innerHTML = "Valor correcto";
        return true;
    }

    function validarPassword(campo, span) {
        if (campo.required && campo.value == "") {
            $(campo).removeClass('is-valid');
            $(campo).addClass('is-invalid');
            span.style = "color:red; font-size: 10pt";
            span.innerHTML = "Por favor, Complete el campo vacio";
            return false;
        }
        if (campo.value.length < campo.minLength) {
            $(campo).removeClass('is-valid');
            $(campo).addClass('is-invalid');
            span.style = "color:red; font-size: 10pt";
            span.innerHTML = "Debe tener un minimo de " + campo.minLength + " caracteres";
            return false;
        }
        var campoV = campo.value;
        var espacios = false;
        var cont = 0;
        while (!espacios && (cont < campoV.length)) {
            if (campoV.charAt(cont) == " ")
                espacios = true;
            cont++;
        }
        if (espacios) {
            $(campo).removeClass('is-valid');
            $(campo).addClass('is-invalid');
            span.style = "color:red; font-size: 10pt";
            span.innerHTML = "Por favor, La contraseña no debe tener espacios";
            return false;
        }

        $(campo).removeClass('is-invalid');
        $(campo).addClass('is-valid');
        span.style = "color:green; font-size: 10pt";
        span.innerHTML = "Valor correcto";
        return true;
    }
</script> -->