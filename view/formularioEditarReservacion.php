<?php
session_start();

require_once '../controller/reservacionController.php';
$oReservacionController = new reservacionController();
$oReservacion = $oReservacionController->consultarReservacion($_GET['idReservacion']);

// print_r($oReservacion);

if (isset($_POST['documentoIdentidad']) != "") {
    $oReservacion = $oReservacionController->actualizarReservacion();
}
?>
<!DOCTYPE html>
<html lang="es">

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
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bs-stepper/css/bs-stepper.min.css">
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
    </style>
</head>

<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/"><i class="fas fa-home"></i> Inicio</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="listarReservacion.php"><i class="fas fa-calendar"></i> Tus Reservaciones</a></li>
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="nuevaReservacion.php"><i class="fas fa-calendar-plus"></i> Crea Una Reservacion</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <br>

        <?php
        require_once '../controller/mensajeController.php';

        if (isset($_GET['mensaje'])) {
            $oMensaje = new mensajes();
            echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
        }
        ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-default" style="background-color: #ddecf0;">
                    <div class="card-header" style="background-color: rgb(119, 167, 191);">
                        <h1 style="font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600; -webkit-text-fill-color: black; ">¡MODIFICA TU RESERVACION!</h1>
                    </div>
                    <form id="formulario" action="" method="POST">
                        <input type="text" name="idReservacion" value="<?php echo $_GET['idReservacion']; ?>" style="display: none;">
                        <div class="card-body p-0">
                            <div class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                    <div class="step" data-target="#logins-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Cliente</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <div class="step" data-target="#information-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Reservacion</span>
                                        </button>
                                    </div>
                                </div>

                                <?php
                                require_once '../controller/clienteController.php';
                                $oClienteController = new clienteController();
                                $oCliente = $oClienteController->consultarCliente($_SESSION['idCliente']);
                                ?>

                                <div class="bs-stepper-content">
                                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                        <div class="row">
                                            <input type="text" class="form-control" name="idCliente" value="<?php echo $_SESSION['idCliente']; ?>" style="display: none;">
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label for="" class="form-label" style="-webkit-text-fill-color: black;">Tipo de Documento</label>
                                                <select class="form-control" id="tipoDocumento" name="tipoDocumento" onchange="validarCampo(this);" required readonly>
                                                    <option value="" selected>Selecciones una opción</option>
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
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label class="form-label" style="-webkit-text-fill-color: black;">Documento Identidad</label>
                                                <input type="text" class="form-control" id="documentoIdentidad" name="documentoIdentidad" placeholder="Documento Identidad" value="<?php echo $oCliente->documentoIdentidad; ?>" onchange="validarCampo(this);" min="5" max="12" required readonly>
                                                <span id="documentoIdentidadSpan"></span>
                                            </div>
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label class="form-label" style="-webkit-text-fill-color: black;">Nombre</label>
                                                <input type="text" class="form-control" id="primerNombre" name="primerNombre" placeholder="Nombre" value="<?php echo $oCliente->primerNombre . " " . $oCliente->segundoNombre; ?>" onchange="validarCampo(this);" minlength="2" maxlength="100" required>
                                                <span id="primerNombreSpan"></span>
                                            </div>
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label class="form-label" style="-webkit-text-fill-color: black;">Apellido</label>
                                                <input type="text" class="form-control" id="primerApellido" name="primerApellido" placeholder="Apellido" value="<?php echo $oCliente->primerApellido . " " . $oCliente->segundoApellido; ?>" onchange="validarCampo(this);" minlength="2" maxlength="100" required>
                                                <span id="primerApellidoSpan"></span>
                                            </div>
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label class="form-label" style="-webkit-text-fill-color: black;">Telefono</label>
                                                <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $oCliente->telefono; ?>" onchange="validarCampo(this);" minlength="8" maxlength="12" required>
                                                <span id="telefonoSpan"></span>
                                            </div>
                                        </div>
                                        <br>
                                        <a type="button" href="listarReservacion.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                                        <button class="btn btn-info float-right" type="button" onclick="validarPagina1();"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                                    </div>
                                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php
                                                require_once '../model/servicio.php';
                                                $oServicio = new servicio();
                                                $result = $oServicio->mostrarServicio();
                                                ?>
                                                <label class="form-label" style="-webkit-text-fill-color: black;">Servicio</label>
                                                <select select class="form-select" id="servicio" name="servicio" value="" onchange="traerEstilistas();" required>
                                                    <option value="" disabled selected>Selecciones una opción</option>
                                                    <?php foreach ($result as $registro) {
                                                    ?>
                                                        <option value="<?php echo $registro['IdServicio']; ?>" <?php if ($registro['IdServicio'] == $oReservacion->idServicio) echo "selected"; ?>><?php echo $registro['nombreServicio']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <span id="servicioSpan"></span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" style="-webkit-text-fill-color: black;">Estilista</label>
                                                <input type="text" id="idUser" value="<?php echo $oReservacion->idUser; ?>" style="display: none;">
                                                <select select class="form-select" id="estilista" name="estilista" value="" onchange="horarioReservacion();" required disabled>
                                                    <option value=" " disabled selected>Selecciones una opción</option>
                                                    <?php foreach ($result as $registro) {
                                                    ?>

                                                    <?php } ?>
                                                </select>
                                                <span id="estilistaSpan"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label" style="-webkit-text-fill-color: black;">Domicilio</label>
                                                <select class="form-control" id="domicilio" name="domicilio" onchange="confirmarDireccion();" required>
                                                    <option value="" selected>Selecciones una opción</option>
                                                    <option value="1" <?php if ($oReservacion->domicilio == "1") {
                                                                            echo "selected";
                                                                        } ?>>SI</option>
                                                    <option value="0" <?php if ($oReservacion->domicilio == "0") {
                                                                            echo "selected";
                                                                        } ?>>NO</option>
                                                </select>
                                                <span id="domicilioSpan"></span>
                                            </div>
                                            <div class="col-md-6" id="direccion" <?php if ($oReservacion->domicilio == "0") echo "style='display: none;'"; ?>>
                                                <label for="" class="form-label" style="-webkit-text-fill-color: black;">Direccion</label>
                                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php $oReservacion->direccion; ?>" required>
                                                <span id="direccion"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="form-label" style="-webkit-text-fill-color: black;">Fecha Reservacion</label>
                                                <input type="date" class="form-control" id="fechaReservacion" name="fechaReservacion" value="<?php echo $oReservacion->fechaReservacion; ?>" onchange="horarioReservacion();" required>
                                                <span id="fechaReservacionSpan"></span>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="reservacioHora" value="<?php echo $oReservacion->horaReservacion; ?>" style="display: none;">
                                                <label class="form-label" style="-webkit-text-fill-color: black;">Hora Reservacion</label>
                                                <select select class="form-select" id="horaReservacion" name="horaReservacion" value="" required disabled>
                                                    <option value="" disabled selected>Selecciones una opción</option>

                                                </select>
                                                <span id="horaReservacionSpan"></span>
                                            </div>
                                        </div>
                                        <br>
                                        <button style="margin: 5px" class="btn btn-info" type="button" onclick="stepper.previous()"><i class="fas fa-arrow-circle-left"></i> Anterior</button>
                                        <button type="button" class="btn btn-success float-right" onclick="validarPaginaFinal();"><i class="fas fa-arrow-circle-right"></i> Crear Reservacion</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery/jquery.min.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/js/adminlte.min.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/reservacion.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/horarioEstilista.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/direccion.js"></script>

    </div>
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    });
</script>

<script>
    //crear una función con los campos de cada pagina
    function validarPagina1() {
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var campos = ["tipoDocumento", "documentoIdentidad", "primerNombre", "primerApellido", "telefono"];
        campos.forEach(element => {
            var campo = document.getElementById(element);
            if (!validarCampo(campo))
                valido = false;
        });
        if (valido)
            stepper.next();
    }

    function validarPaginaFinal() {
        // evento.preventDefault();
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var campos = ["fechaReservacion", "horaReservacion", "domicilio"];
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
            case "time":
                valido = validarTime(campo, span);
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
        span.innerHTML = "El valor del campo es valido";
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
        span.innerHTML = "El valor del campo es valido";
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
        span.innerHTML = "El valor del campo es valido";
        return true;
    }

    function validarDate(campo, span) {
        if (campo.required && campo.value == "") {
            $(campo).removeClass('is-valid');
            $(campo).addClass('is-invalid');
            span.style = "color:red; font-size: 10pt";
            span.innerHTML = "Por favor, Seleccione su fecha de reservacion";
            return false;
        }
        $(campo).removeClass('is-invalid');
        $(campo).addClass('is-valid');
        span.style = "color:green; font-size: 10pt";
        span.innerHTML = "El valor del campo es valido";
        return true;
    }

    function validarTime(campo, span) {
        if (campo.required && campo.value == "") {
            $(campo).removeClass('is-valid');
            $(campo).addClass('is-invalid');
            span.style = "color:red; font-size: 10pt";
            span.innerHTML = "Por favor, Seleccione su hora de reservacion";
            return false;
        }
        $(campo).removeClass('is-invalid');
        $(campo).addClass('is-valid');
        span.style = "color:green; font-size: 10pt";
        span.innerHTML = "El valor del campo es valido";
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
        span.innerHTML = "El valor del campo es valido";
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
        span.innerHTML = "El valor del campo es valido";
        return true;
    }
    traerEstilistas();
    Actualizar();
</script>