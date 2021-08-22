<?php
require_once 'headPagina.php';
require_once '../controller/usuarioController.php';

$idUser = $_SESSION['idUser'];
$oUsuarioController = new usuarioController();
$oUsuario = $oUsuarioController->consultarUsuarioId($_SESSION['idUser']);
?>

<div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
    <form action="../controller/usuarioController.php" method="POST" id="formulario">
        <input type="text" name="funcion" value="ActualizarUsuario" style="display: none;">
        <input type="text" name="idUser" value="<?php echo $idUser; ?>" style="display: none;">
        <input type="text" name="idRol" value="<?php echo $oUsuario->idRol; ?>" style="display: none;">
        <div class="row">
            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Tipo de Documento</label>
                <select class="form-select" id="tipoDocumento" name="tipoDocumento" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
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
                <span id="tipoDocumentoSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Documento identidad</label>
                <input type="number" class="form-control" id="documentoIdentidad" name="documentoIdentidad" value="<?php echo $oUsuario->documentoIdentidad; ?>" onchange="validarCampo(this);" minlength="5" maxlength="13" required>
                <span id="documentoIdentidadSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Primer Nombre</label>
                <input type="text" class="form-control" id="primerNombre" name="primerNombre" value="<?php echo $oUsuario->primerNombre; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
                <span id="primerNombreSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Segundo Nombre</label>
                <input type="text" class="form-control" id="segundoNombre" name="segundoNombre" value="<?php echo $oUsuario->segundoNombre; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50">
                <span id="segundoNombreSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" id="primerApellido" name="primerApellido" value="<?php echo $oUsuario->primerApellido; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required> 
                <span id="primerApellidoSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" value="<?php echo $oUsuario->segundoApellido; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50">
                <span id="segundoApellidoSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" id="correoElectronico" name="correoElectronico" value="<?php echo $oUsuario->correoElectronico; ?>" onchange="validarCampo(this);" minlength="1" required>
                <span id="correoElectronicoSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Telefono</label>
                <input type="phone" class="form-control" id="telefono" name="telefono" value="<?php echo $oUsuario->telefono; ?>" onchange="validarCampo(this);" min="10" max="13" required>
                <span id="telefonoSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $oUsuario->fechaNacimiento; ?>" onchange="validarCampo(this);" required>
                <span id="fechaNacimientoSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Genero</label>
                <select class="form-select" id="genero" name="genero" onchange="validarCampo(this);">
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
                <span id="generoSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Estado Civil</label>
                <select class="form-select" id="estadoCivil" name="estadoCivil" onchange="validarCampo(this);">
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
                <span id="estadoCivilSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Direccion</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $oUsuario->direccion; ?>" onchange="validarCampo(this);" minlength="2" maxlength="20">
                <span id="direccionSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Barrio</label>
                <input type="text" class="form-control" id="barrio" name="barrio" value="<?php echo $oUsuario->barrio; ?>" onchange="validarCampo(this);" minlength="2" maxlength="15">
                <span id="barrioSpan"></span>
            </div>
        </div>
        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
            <button type="button" class="btn btn-success float-right" onclick="validarPaginaFinal();"><i class="fas fa-edit"></i>Actualizar Informacion</button>
        </div>
    </form>
</div>



<script>
    function validarPaginaFinal() {
        // evento.preventDefault();
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var campos = ["tipoDocumento", "documentoIdentidad", "primerNombre", "segundoNombre", "primerApellido",
            "segundoApellido", "correoElectronico", "telefono", "fechaNacimiento", "genero", "estadoCivil", "direccion", "barrio"
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
</script>