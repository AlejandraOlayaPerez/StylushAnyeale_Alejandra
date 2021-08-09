<?php
require_once 'headPagina.php';
require_once '../model/usuario.php';
require_once '../controller/usuarioController.php';
$oUsuario = new usuario();

if(isset($_GET['documentoIdentidad']) != "") {
    echo $_GET['documenntoIdentidad'];
    $oUsuarioController = new usuarioController();
    $oUsuario = $oUsuarioController->registrarUsuario();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVO USUARIO</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <?php
                require_once '../controller/mensajeController.php';
                if(isset($_GET['mensaje'])) {
                    $oMensaje = new mensajes();
                    echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
                }
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-default" style="background-color: rgba(255, 255, 204, 255);">
                            <div class="card-header" style="background-color: rgb(249, 201, 242);">
                                <label class="card-title">NUEVO USUARIO</label>
                            </div>
                            <form id="formUsuario" action="" method="POST">
                                <div class="card-body p-0">
                                    <div class="bs-stepper">
                                        <div class="bs-stepper-header" role="tablist">
                                            <div class="step" data-target="#logins-part">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                    <span class="bs-stepper-circle">1</span>
                                                    <span class="bs-stepper-label">Informacion Basica</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#information-part">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                                    <span class="bs-stepper-circle">2</span>
                                                    <span class="bs-stepper-label">Informacion Adicional</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#registro-part">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="registro-part" id="registro-part-trigger">
                                                    <span class="bs-stepper-circle">3</span>
                                                    <span class="bs-stepper-label">Usuario</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="bs-stepper-content">
                                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                                <div class="row">
                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Tipo de Documento</label>
                                                        <select class="form-control" name="tipoDocumento">
                                                            <option value="" selected>Selecciones una opción</option>
                                                            <option value="TI" <?php if($oUsuario->tipoDocumento == "TI") {
                                                                                    echo "selected";
                                                                                } ?>>Tarjeta de Identidad</option>
                                                            <option value="CC" <?php if($oUsuario->tipoDocumento == "CC") {
                                                                                    echo "selected";
                                                                                } ?>>Cedula Ciudadanía</option>
                                                            <option value="CE" <?php if($oUsuario->tipoDocumento == "CE") {
                                                                                    echo "selected";
                                                                                } ?>>Cedula Extranjería</option>
                                                        </select>
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Documento Identidad</label>
                                                        <input type="number" class="form-control" name="documentoIdentidad" placeholder="Documento de identidad" value="<?php echo $oUsuario->documentoIdentidad; ?>">
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Primer Nombre</label>
                                                        <input type="text" class="form-control" name="primerNombre" placeholder="Primer Nombre" value="<?php echo $oUsuario->primerNombre; ?>">
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Segundo Nombre</label>
                                                        <input type="text" class="form-control" name="segundoNombre" placeholder="Segundo Nombre" value="<?php echo $oUsuario->segundoNombre; ?>">
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Primer Apellido</label>
                                                        <input type="text" class="form-control" name="primerApellido" placeholder="Primer Apellido" value="<?php echo $oUsuario->primerApellido; ?>">
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Segundo apellido</label>
                                                        <input type="text" class="form-control" name="segundoApellido" placeholder="Segundo Apellido" value="<?php echo $oUsuario->segundoApellido; ?>">
                                                    </div>

                                                </div>
                                                <br>
                                                <button class="btn btn-info float-right" type="button" onclick="stepper.next()"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                                                <a href="listarUsuario.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                                                </br>
                                            </div>

                                            <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">

                                                <div class="row">
                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Fecha de Nacimiento</label>
                                                        <input type="date" class="form-control datetimepicker-input" name="fechaNacimiento" value="<?php echo $oUsuario->fechaNacimiento; ?>">
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Genero</label>
                                                        <select class="form-select" name="genero">
                                                            <option value="" selected>Selecciones una opción</option>
                                                            <option value="Femenino" <?php if($oUsuario->genero == "Femenino") {echo "selected";} ?>>Femenino</option>
                                                            <option value="Masculino" <?php if($oUsuario->genero == "Masculino") {echo "selected";} ?>>Masculino</option>
                                                            <option value="Otro" <?php if($oUsuario->genero == "Otro") {echo "selected";} ?>>Otro</option>
                                                        </select>
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Estado Civil</label>
                                                        <select class="form-select" name="estadoCivil">
                                                            <option value="" selected>Selecciones una opción</option>
                                                            <option value="Soltero" <?php if($oUsuario->estadoCivil == "Soltero") {echo "selected";} ?>>Soltero</option>
                                                            <option value="Casado" <?php if($oUsuario->estadoCivil == "Casado") {echo "selected";} ?>>Casado</option>
                                                            <option value="Divorciado" <?php if($oUsuario->estadoCivil == "Divorciado") {echo "selected";} ?>>Divorciado</option>
                                                            <option value="Viudo" <?php if($oUsuario->estadoCivil == "Viudo") {echo "selected";} ?>>viudo</option>
                                                        </select>
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Direccion</label>
                                                        <input type="text" class="form-control" name="direccion" placeholder="Direccion" value="<?php echo $oUsuario->direccion; ?>">
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Barrio</label>
                                                        <input type="text" class="form-control" name="barrio" placeholder="Barrio" value="<?php echo $oUsuario->barrio; ?>">
                                                    </div>
                                                </div>
                                                <br>
                                                <button class="btn btn-info" type="button" onclick="stepper.previous()"><i class="fas fa-arrow-circle-left"></i> Anterior</button>
                                                <button class="btn btn-info float-right" type="button" onclick="stepper.next()"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                                            </div>

                                            <div id="registro-part" class="content" role="tabpanel" aria-labelledby="registro-part-trigger">

                                                <div class="row">
                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">telefono</label>
                                                        <input type="number" class="form-control" name="telefono" placeholder="Telefono" value="<?php echo $oUsuario->telefono; ?>">
                                                    </div>
                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="">Correo electronico</label>
                                                        <input class="form-control" type="email" name="correoElectronico" placeholder="example@gmail.com" value="<?php echo $oUsuario->correoElectronico; ?>">
                                                    </div>
                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="">Contraseña</label>
                                                        <input class="form-control" type="password" name="contrasena">
                                                    </div>
                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="">Confirmar contraseña</label>
                                                        <input class="form-control" type="password" name="confirmarContrasena">
                                                    </div>
                                                </div>
                                                <br>

                                                <button type="submit" class="btn btn-success float-right" name="funcion" value="registro"><i class="fas fa-save"></i> Registrar usuario</button>
                                                <button class="btn btn-info" type="button" onclick="stepper.previous()"><i class="fas fa-arrow-circle-left"></i> Anterior</button>
                                            </div>
                                        </div>
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

<?php
require_once 'footer.php';
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
</script>


<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
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
      primerNombre:{
        required: true,
        minlength: 1,
        maxlength: 50,
      },
      segundoNombre:{
        required: false,
        minlength: 1,
        maxlength: 50,
      },
      primerApellido:{
        required: true,
        minlength: 1,
        maxlength: 50,
      },
      segundoApellido:{
        required: false,
        minlength: 1,
        maxlength: 50,
      },
      fechaNacimiento:{
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
      telefono: {
        required: true,
        telefono: true
      },
      correoElectronico: {
        required: true,
        correoElectronico: true
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
      primerNombre:{
        required: "Por favor, complete la informacion",
        minlength: "Minimo 2 letra para el nombre",
        maxlength: "Maximo 50 letra para el nombre",
      },
      primerApellido:{
        required: "Por favor, complete la informacion",
        minlength: "Minimo 2 letra para el nombre",
        maxlength: "Maximo 50 letra para el nombre",
      },
      barrio: {
        required: true,
        maxlength: 50,
      },
      telefono: {
        required: "Por favor, Ingrese un Telefono"
      },
      correoElectronico: {
        required: "Por favor, Ingrese un Correo Electronico",
        correoElectronico: "Ingrese un correo electronico valido"
      },
      contrasena: {
        required: "Por favor, Ingrese una contraseña",
        minlength: "Ingrese una contraseña con mas de 5 caracteres"
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