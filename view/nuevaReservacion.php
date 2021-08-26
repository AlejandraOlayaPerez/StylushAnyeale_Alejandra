<?php
session_start();

require_once '../model/reservaciones.php';
$oReservacion = new reservacion();

require_once '../controller/reservacionController.php';
if (isset($_POST['documentoIdentidad']) != "") {
    $oReservacionController = new reservacionController();
    $oReservacion = $oReservacionController->crearReservacion();
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
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="nuevaReservacion.php"><i class="fas fa-calendar-plus"></i> Crea Una Reservacion</a></li>
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="formularioEditarReservacion.php"><i class="fas fa-calendar"></i> Edita Tu Reservacion</a></li>
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="eliminarReservacion.php"><i class="fas fa-calendar-times"></i> Elimina Tu Reservacion</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <br>
        <div class="pricing-header p-3 pb-md-4 mx-auto text-center" style="background-color: rgb(119, 167, 191); border: 2px solid black">
            <h1 style="font-family: 'Times New Roman', Times, serif; font-size: 60px; font-weight: 600; -webkit-text-fill-color: black; ">¡HAZ UNA RESERVACION SEGUN TU HORARIO!</h1>
        </div>

        <br>
        <hr>
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
                <div class="card card-default" style="background-color: rgba(255, 255, 204, 255);">
                    <div class="card-header" style="background-color: rgb(119, 167, 191);"></div>
                    <form id="formulario" action="" method="POST">
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
                                            <label class="card-title" style="-webkit-text-fill-color: black; font-size: 40px;">INFORMACION PERSONAL</label>
                                            <br>
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
                                        <a type="button" href="paginaPrincipalCliente.php" class="btn btn-dark"><i class="fas fa-home"></i> Volver al inicio</a>
                                        <button class="btn btn-info float-right" type="button" onclick="validarPagina1();"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                                    </div>
                                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                        <div class="row">
                                            <label class="card-title" style="-webkit-text-fill-color: black; font-size: 40px;">INFORMACION DEL SERVICIO</label>
                                            <br>
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label for="" class="form-label" style="-webkit-text-fill-color: black;">Fecha Reservacion</label>
                                                <input type="date" class="form-control" id="fechaReservacion" name="fechaReservacion" value="<?php echo $oReservacion->fechaReservacion; ?>" onchange="validarCampo(this);" required>
                                                <span id="fechaReservacionSpan"></span>
                                            </div>
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label class="form-label" style="-webkit-text-fill-color: black;">Hora Reservacion</label>
                                                <input type="time" class="form-control" id="horaReservacion" name="horaReservacion" value="<?php echo $oReservacion->horaReservacion; ?>" onchange="validarCampo(this);" required>
                                                <span id="horaReservacionSpan"></span>
                                            </div>
                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <?php
                                                require_once '../model/servicio.php';
                                                $oServicio = new servicio();
                                                $result = $oServicio->mostrarServicio();
                                                ?>
                                                <label class="form-label" style="-webkit-text-fill-color: black;">Servicio</label>
                                                <select select class="form-select" id="servicio" name="servicio" value="<?php echo $oReservacion->servicio; ?>" onchange="traerEstilistas(this);" required>
                                                    <option value="" disabled selected>Selecciones una opción</option>
                                                    <?php foreach ($result as $registro) {
                                                    ?>
                                                        <option value="<?php echo $registro['IdServicio']; ?>"><?php echo $registro['nombreServicio']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <span id="servicioSpan"></span>
                                            </div>
                                            <div class="col col-xl-4 col-md-6 col-12">
    
                                                <label class="form-label" style="-webkit-text-fill-color: black;">Estilista</label>
                                                <select select class="form-select" id="estilista" name="estilista" value="<?php echo $oReservacion->estilista; ?>" onchange="validarCampo(this);" required>
                                                    <option value="" disabled selected>Selecciones una opción</option>
                                                    
                                                
                                                </select>
                                                <span id="estilistaSpan"></span>
                                            </div>

                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label class="form-label" style="-webkit-text-fill-color: black;">Domicilio</label>
                                                <select class="form-control" id="domicilio" name="domicilio" value="<?php echo $oReservacion->domicilio; ?>" onchange="validarCampo(this);" required>
                                                    <option value="" selected>Selecciones una opción</option>
                                                    <option value="SI" <?php if ($oReservacion->domicilio == "SI") {
                                                                            echo "selected";
                                                                        } ?>>SI</option>
                                                    <option value="NO" <?php if ($oReservacion->domicilio == "NO") {
                                                                            echo "selected";
                                                                        } ?>>NO</option>
                                                </select>
                                                <span id="domicilioSpan"></span>
                                            </div>

                                            <div class="col col-xl-4 col-md-6 col-12">
                                                <label class="form-label" style="-webkit-text-fill-color: black;">Direccion</label>
                                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $oReservacion->direccion; ?>" onchange="validarCampo(this);" minlength="5" maxlength="50" required>
                                                <span id="direccionSpan"></span>
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
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/dist/js/adminlte.min.js"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/reservacion.js"></script>
    </div>
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
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
        var campos = ["fechaReservacion", "horaReservacion", "servicio", "estilista", "domicilio", "direccion"];
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
</script>