<?php
require_once '../model/cliente.php';
require_once '../controller/clienteController.php';
$oCliente = new cliente();

if (isset($_POST['documentoIdentidad']) != "") {
  $oClienteController = new clienteController();
  $oCliente = $oClienteController->registrarCliente();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/font-css.css">
  <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
  <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="http://localhost/Anyeale_proyecto/StylushAnyeale_Alejandra/assests/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" type="image/x-icon">
  <title>Registro</title>
</head>

<?php
require_once '../controller/mensajeController.php';

if (isset($_GET['mensaje'])) {
  $oMensaje = new mensajes();
  echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
}
?>




<body class="hold-transition register-page" style="background-color: rgb(249, 201, 242);">
  <div class="container-sm">
    <div class="register-logo"></div>

    <div class="card" style="background-color: rgb(119, 167, 191); border: rgb(249, 201, 242) 5px dashed;">
      <div class="card-body register-card-body" style="background-color: rgb(119, 167, 191);">
        <div class="col text-center">
          <img style="border-radius: 8px;" src="../image/PNG_LOGO.png" width="15%">
        </div>
        <br>
        <p class="login-box-msg" style="color:black">Registrese para continuar</p>

        <form id="formulario" action="" method="POST">
          <input type="text" name="fotoPerfil" value="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/perfilPreterminado.png" style="display: none;">
          <div class="row">
            <div class="col col-md-6">
              <label for="" class="form-label" style="color: black;">Tipo de Documento</label>
              <select class="form-control" id="tipoDocumento" name="tipoDocumento" onchange="validarCampo(this);" required>
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
            <div class="col col-md-6">
              <label for="" class="form-label" style="color: black;">Documento Identidad</label>
              <input type="number" class="form-control" id="documentoIdentidad" name="documentoIdentidad" placeholder="Documento de identidad" required value="<?php $oCliente->documentoIdentidad; ?>" onchange="validarCampo(this);" min="5" max="13" required>
              <span id="documentoIdentidadSpan"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="" class="form-label" style="color: black;">Primer Nombre</label>
              <input type="text" class="form-control" id="primerNombre" name="primerNombre" placeholder="Primer Nombre" value="<?php echo $oCliente->primerNombre; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
              <span id="primerNombreSpan"></span>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label" style="color: black;">Primer Apellido</label>
              <input type="text" class="form-control" id="primerApellido" name="primerApellido" placeholder="Primer Apellido" value="<?php echo $oCliente->primerApellido; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
              <span id="primerApellidoSpan"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="" class="form-label" style="color: black;">Direccion</label>
              <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="<?php echo $oCliente->direccion; ?>" minlength="10" onchange="validarCampo(this);" required>
              <span id="direccionSpan"></span>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label" style="color: black;">telefono</label>
              <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $oCliente->telefono; ?>" onchange="validarCampo(this);" minlength="10" maxlength="12" required>
              <span id="telefonoSpan"></span>
            </div>
          </div>
          <div class="row">
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="" class="form-label" style="color: black;">Correo electronico</label>
              <input class="form-control" type="email" id="correoElectronico" name="correoElectronico" placeholder="example@gmail.com" value="<?php echo $oCliente->email; ?>" minlength="1" onchange="validarCampo(this);" required>
              <span id="correoElectronicoSpan"></span>
            </div>
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="" class="form-label" style="color: black;">Contraseña</label>
              <input class="form-control" type="password" id="contrasena" name="contrasena" onchange="validarCampo(this);" minlength="5" maxlength="15" required>
              <span id="contrasenaSpan"></span>
            </div>
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="" class="form-label" style="color: black;">Confirmar contraseña</label>
              <input class="form-control" type="password" name="confirmarContrasena" id="confirmarContrasena" onchange="validarCampo(this);" minlength="5" maxlength="15" required>
              <span id="confirmarContrasenaSpan"></span>
            </div>
          </div>
          <br>
          <button type="button" class="btn btn-success float-right" onclick="validarPaginaFinal();"><i class="fas fa-save"></i> Registrar</button>
        </form>



      </div>
    </div>

    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/js/adminlte.min.js"></script>
</body>

</html>

<script>
  function validarPaginaFinal() {
    // evento.preventDefault();
    var valido = true;
    // agregar el id de cada campo de la página para poder validar
    var campos = ["tipoDocumento", "documentoIdentidad", "primerNombre", "primerApellido",
    "direccion", "telefono", "correoElectronico", "contrasena", "confirmarContrasena"];
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