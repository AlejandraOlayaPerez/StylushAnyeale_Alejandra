<?php
require_once '../model/cliente.php';
require_once '../controller/clienteController.php';
require_once 'linkhead.php'; 

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
  <title>Registro</title>
</head>

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
          <input type="text" name="fotoPerfil" value="/anyeale_proyecto/stylushAnyeale_alejandra/image/perfilpreterminado.png" style="display: none;">
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
              <input type="number" class="form-control" id="documentoIdentidad" name="documentoIdentidad" placeholder="Documento de identidad" required value="<?php echo $oCliente->documentoIdentidad; ?>" onchange="validarCampo(this);" min="5" max="13" required>
              <span id="documentoIdentidadSpan"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="" class="form-label" style="color: black;">Nombre</label>
              <input type="text" class="form-control" id="Nombre" name="primerNombre" placeholder="Primer Nombre" value="<?php echo $oCliente->primerNombre; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
              <span id="primerNombreSpan"></span>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label" style="color: black;">Apellido</label>
              <input type="text" class="form-control" id="Apellido" name="primerApellido" placeholder="Primer Apellido" value="<?php echo $oCliente->primerApellido; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
              <span id="primerApellidoSpan"></span>
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

    <?php require_once 'linkfooter.php'; ?>
    <?php require_once 'linkjs.php'; ?>
</body>

</html>

<script>
  function validarPaginaFinal() {
    // evento.preventDefault();
    var valido = true;
    // agregar el id de cada campo de la página para poder validar
    var campos = ["tipoDocumento", "documentoIdentidad", "primerNombre", "primerApellido",
      "direccion", "telefono", "correoElectronico", "contrasena", "confirmarContrasena"
    ];
    campos.forEach(element => {
      var campo = document.getElementById(element);
      if (!validarCampo(campo))
        valido = false;
    });
    if (valido)
      document.getElementById('formulario').submit();
  }
</script>