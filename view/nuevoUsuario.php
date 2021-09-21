<?php
require_once 'headPagina.php';
require_once '../model/usuario.php';
require_once '../controller/usuarioController.php';
$oUsuario = new usuario();

if (isset($_POST['documentoIdentidad']) != "") {
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
  <div class="container-fluid">
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
          <div class="card-header" style="background-color: rgb(249, 201, 242);">
            <label class="card-title">NUEVO USUARIO</label>
          </div>
          <form id="formulario" action="" method="POST">
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
                    <!-- <div class="row">
                      <div class="col col-xl-4 col-md-6 col-12">
                        <form action="../controller/imagenController.php" method="POST" >
                        <input type="text" name="funcion" value="fotoPerfilUsuario" style="display: none;">
                          <label for="">Actualizar foto de perfil</label>
                          <input name="archivos" type="file" class="form-control" accept="image/*">
                          <button type="submit" class="btn btn-info" name="funcion" value="fotoPerfilUsuario">Agregar Foto</botton>
                        </form>
                      </div>
                    </div> -->
                    <div class="row">
                      <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Tipo de Documento</label>
                        <select class="form-control" id="tipoDocumento" name="tipoDocumento" onchange="validarCampo(this);" required>
                          <option value="" selected>Selecciones una opción</option>
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
                        <label for="" class="form-label">Documento Identidad</label>
                        <input type="number" class="form-control" id="documentoIdentidad" name="documentoIdentidad" placeholder="Documento de identidad" required value="<?php echo $oUsuario->documentoIdentidad; ?>" onchange="validarCampo(this);" min="5" max="13" required>
                        <span id="documentoIdentidadSpan"></span>
                      </div>

                      <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" id="primerNombre" name="primerNombre" placeholder="Primer Nombre" value="<?php echo $oUsuario->primerNombre; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
                        <span id="primerNombreSpan"></span>
                      </div>

                      <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="segundoNombre" name="segundoNombre" placeholder="Segundo Nombre" value="<?php echo $oUsuario->segundoNombre; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50">
                        <span id="segundoNombreSpan"></span>
                      </div>

                      <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="primerApellido" name="primerApellido" placeholder="Primer Apellido" value="<?php echo $oUsuario->primerApellido; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
                        <span id="primerApellidoSpan"></span>
                      </div>

                      <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Segundo apellido</label>
                        <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" placeholder="Segundo Apellido" value="<?php echo $oUsuario->segundoApellido; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50">
                        <span id="segundoApellidoSpan"></span>
                      </div>

                    </div>
                    <br>
                    <button style="margin: 5px;" class="btn btn-info float-right" type="button" onclick="validarPagina1()"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                    <a href="listarUsuario.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                    </br>
                  </div>

                  <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">

                    <div class="row">
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
                        <select class="form-select" name="estadoCivil" id="estadoCivil" onchange="validarCampo(this);">
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
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="<?php echo $oUsuario->direccion; ?>" minlength="10" onchange="validarCampo(this);">
                        <span id="direccionSpan"></span>
                      </div>

                      <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Barrio</label>
                        <input type="text" class="form-control" id="barrio" name="barrio" placeholder="Barrio" value="<?php echo $oUsuario->barrio; ?>" minlength="5" onchange="validarCampo(this);">
                        <span id="barrioSpan"></span>
                      </div>
                    </div>
                    <br>
                    <button style="margin: 5px;" class="btn btn-info" type="button" onclick="stepper.previous()"><i class="fas fa-arrow-circle-left"></i> Anterior</button>
                    <button class="btn btn-info float-right" type="button" onclick="validarPagina2()"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                  </div>

                  <div id="registro-part" class="content" role="tabpanel" aria-labelledby="registro-part-trigger">

                    <div class="row">
                      <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">telefono</label>
                        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $oUsuario->telefono; ?>" onchange="validarCampo(this);" minlength="10" maxlength="12" required>
                        <span id="telefonoSpan"></span>
                      </div>
                      <div class="col col-xl-4 col-md-6 col-12">
                        <label for="">Correo electronico</label>
                        <input class="form-control" type="email" id="correoElectronico" name="correoElectronico" placeholder="example@gmail.com" value="<?php echo $oUsuario->correoElectronico; ?>" minlength="1" onchange="validarCampo(this);" required>
                        <span id="correoElectronicoSpan"></span>
                      </div>
                      <div class="col col-xl-4 col-md-6 col-12">
                        <label for="">Contraseña</label>
                        <input class="form-control" type="password" id="contrasena" name="contrasena" onchange="validarCampo(this);" minlength="5" maxlength="15" required>
                        <span id="contrasenaSpan"></span>
                      </div>
                      <div class="col col-xl-4 col-md-6 col-12">
                        <label for="">Confirmar contraseña</label>
                        <input class="form-control" type="password" name="confirmarContrasena" id="confirmarContrasena" onchange="validarCampo(this);" minlength="5" maxlength="15" required>
                        <span id="confirmarContrasenaSpan"></span>
                      </div>
                    </div>
                    <br>

                    <button type="button" class="btn btn-success float-right" onclick="validarPaginaFinal();"><i class="fas fa-save"></i> Registrar usuario</button>
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
</body>

</html>

<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/validaciones.js"></script>
<?php require_once 'footer.php'; ?>

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
    var campos = ["tipoDocumento", "documentoIdentidad", "primerNombre", "segundoNombre", "primerApellido",
      "segundoApellido"
    ];
    campos.forEach(element => {
      var campo = document.getElementById(element);
      if (!validarCampo(campo))
        valido = false;
    });
    if (valido)
      stepper.next();
  }

  function validarPagina2() {
    var valido = true;
    // agregar el id de cada campo de la página para poder validar
    var campos = ["fechaNacimiento", "genero", "estadoCivil", "direccion", "barrio"];
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
    var campos = ["telefono", "correoElectronico", "contrasena", "confirmarContrasena"];
    campos.forEach(element => {
      var campo = document.getElementById(element);
      if (!validarCampo(campo))
        valido = false;
    });
    if (valido)
      document.getElementById('formulario').submit();
  }
</script>