<?php
require_once 'headpagina.php';
require_once '../model/usuario.php';
require_once '../controller/usuariocontroller.php';
$oUsuario = new usuario();
$oUsuarioController = new usuarioController();
if (isset($_POST['documentoIdentidad']) != "") {
  $oUsuario = $oUsuarioController->registrarUsuario();
}
?>
<body>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header cardHeaderFondo">
        <label class="card-title">Nuevo Usuario</label>
      </div>
      <form id="formulario" action="" method="POST" novalidate>
        <div class="card-body cardBody">
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
              <div class="step" data-target="#roles-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="roles-part" id="roles-part-trigger">
                  <span class="bs-stepper-circle">3</span>
                  <span class="bs-stepper-label">Roles</span>
                </button>
              </div>
              <div class="line"></div>
              <div class="step" data-target="#registro-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="registro-part" id="registro-part-trigger">
                  <span class="bs-stepper-circle">4</span>
                  <span class="bs-stepper-label">Usuario</span>
                </button>
              </div>
            </div>
            <div class="bs-stepper-content">
              <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                <div class="row">
                  <div class="col col-xl-4 col-md-6 col-12">
                    <label for="" class="form-label">Tipo de Documento <span class="text-danger">*</span></label>
                    <select class="form-control" id="tipoDocumento" name="tipoDocumento" onchange="validarCampo(this);" required>
                      <option value="" selected>Selecciones una opci??n</option>
                      <option value="TI" <?php if ($oUsuario->tipoDocumento == "TI") {
                                            echo "selected";
                                          } ?>>Tarjeta de Identidad</option>
                      <option value="CC" <?php if ($oUsuario->tipoDocumento == "CC") {
                                            echo "selected";
                                          } ?>>Cedula Ciudadan??a</option>
                      <option value="CE" <?php if ($oUsuario->tipoDocumento == "CE") {
                                            echo "selected";
                                          } ?>>Cedula Extranjer??a</option>
                    </select>
                    <span id="tipoDocumentoSpan"></span>
                  </div>

                  <div class="col col-xl-4 col-md-6 col-12">
                    <label for="" class="form-label">Documento Identidad <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="documentoIdentidad" name="documentoIdentidad" placeholder="Documento de identidad" required value="<?php echo $oUsuario->documentoIdentidad; ?>" onchange="validarCampo(this);" min="1000" max="99999999999" required>
                    <span id="documentoIdentidadSpan"></span>
                  </div>

                  <div class="col col-xl-4 col-md-6 col-12">
                    <label for="" class="form-label">Primer Nombre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="primerNombre" name="primerNombre" placeholder="Primer Nombre" value="<?php echo $oUsuario->primerNombre; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
                    <span id="primerNombreSpan"></span>
                  </div>

                  <div class="col col-xl-4 col-md-6 col-12">
                    <label for="" class="form-label">Segundo Nombre <small class="letraPequena">(Opcional)</small></label>
                    <input type="text" class="form-control" id="segundoNombre" name="segundoNombre" placeholder="Segundo Nombre" value="<?php echo $oUsuario->segundoNombre; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50">
                    <span id="segundoNombreSpan"></span>
                  </div>

                  <div class="col col-xl-4 col-md-6 col-12">
                    <label for="" class="form-label">Primer Apellido <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="primerApellido" name="primerApellido" placeholder="Primer Apellido" value="<?php echo $oUsuario->primerApellido; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
                    <span id="primerApellidoSpan"></span>
                  </div>

                  <div class="col col-xl-4 col-md-6 col-12">
                    <label for="" class="form-label">Segundo apellido <small class="letraPequena">(Opcional)</small></label>
                    <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" placeholder="Segundo Apellido" value="<?php echo $oUsuario->segundoApellido; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50">
                    <span id="segundoApellidoSpan"></span>
                  </div>

                </div>
                <br>
                <button class="btn btn-info float-right" type="button" onclick="validarPagina1()"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                <a href="listarusuario.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                </br>
              </div>

              <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">

                <div class="row">
                  <div class="col col-xl-4 col-md-6 col-12">
                    <label for="" class="form-label">Fecha de Nacimiento <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $oUsuario->fechaNacimiento; ?>" onchange="validarCampo(this);" required>
                    <span id="fechaNacimientoSpan"></span>
                  </div>

                  <div class="col col-xl-4 col-md-6 col-12">
                    <label for="" class="form-label">Genero <small class="letraPequena">(Opcional)</small></label>
                    <select class="form-select" id="genero" name="genero" onchange="validarCampo(this);">
                      <option value="" selected>Selecciones una opci??n</option>
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
                    <label for="" class="form-label">Estado Civil <small class="letraPequena">(Opcional)</small></label>
                    <select class="form-select" name="estadoCivil" id="estadoCivil" onchange="validarCampo(this);">
                      <option value="" selected>Selecciones una opci??n</option>
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
                    <label for="" class="form-label">Direccion <small class="letraPequena">(Opcional)</small></label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="<?php echo $oUsuario->direccion; ?>" minlength="10" onchange="validarCampo(this);">
                    <span id="direccionSpan"></span>
                  </div>

                  <div class="col col-xl-4 col-md-6 col-12">
                    <label for="" class="form-label">Barrio <small class="letraPequena">(Opcional)</small></label>
                    <input type="text" class="form-control" id="barrio" name="barrio" placeholder="Barrio" value="<?php echo $oUsuario->barrio; ?>" minlength="5" onchange="validarCampo(this);">
                    <span id="barrioSpan"></span>
                  </div>
                </div>
                <br>
                <button style="margin: 5px;" class="btn btn-info" type="button" onclick="stepper.previous()"><i class="fas fa-arrow-circle-left"></i> Anterior</button>
                <button class="btn btn-info float-right" type="button" onclick="validarPagina2()"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
              </div>

              <div id="roles-part" class="content" role="tabpanel" aria-labelledby="roles-part-trigger">
                <div class="row">
                  <div class="col col-xl-4 col-md-6 col-12">
                    <?php
                    require_once '../model/rol.php';
                    $oRol = new rol();
                    $result = $oRol->listarRol();
                    ?>
                    <label for="">Rol <span class="text-danger">*</span></label>
                    <select select class="form-select" id="idRol" name="idRol" onchange="validarCampo(this);" required>
                      <option value="" disabled selected>Selecciones una opci??n</option>
                      <?php
                      foreach ($result as $registro) {
                      ?>
                        <option value="<?php echo $registro['idRol']; ?>" <?php if ($oUsuario->idRol == $registro['idRol']) {
                                                                            echo "selected";
                                                                          } ?>><?php echo $registro['nombreRol']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    <span id="idRolSpan"></span>
                  </div>
                  <div class="col col-xl-4 col-md-6 col-12">
                    <?php
                    require_once '../model/rol.php';
                    $oRol = new rol();
                    $result = $oRol->mostrarServicio();
                    ?>

                    <label for="">Servicio <span class="text-danger">*</span></label>
                    <select select class="form-select" id="idCargo" name="idCargo" onchange="validarCampo(this);" required>
                      <option value="" disabled selected>Selecciones una opci??n</option>
                      <?php
                      foreach ($result as $registro) {
                      ?>
                        <option value="<?php echo $registro['idCargo']; ?>" <?php if ($oUsuario->idCargo == $registro['idCargo']) {
                                                                              echo "selected";
                                                                            } ?>><?php echo $registro['rol']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    <span id="idCargoSpan"></span>
                  </div>
                </div>
                <br>
                <button style="margin: 5px;" class="btn btn-info" type="button" onclick="stepper.previous()"><i class="fas fa-arrow-circle-left"></i> Anterior</button>
                <button class="btn btn-info float-right" type="button" onclick="validarPagina3()"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
              </div>

              <div id="registro-part" class="content" role="tabpanel" aria-labelledby="registro-part-trigger">

                <div class="row">
                  <div class="col col-xl-4 col-md-6 col-12">
                    <label for="" class="form-label">telefono <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $oUsuario->telefono; ?>" onchange="validarCampo(this);" min="3000000000" max="3999999999" required>
                    <span id="telefonoSpan"></span>
                  </div>
                  <div class="col col-xl-4 col-md-6 col-12">
                    <label for="" class="form-label">Correo electronico <span class="text-danger">*</span></label>
                    <input class="form-control" type="email" id="correoElectronico" name="correoElectronico" placeholder="example@gmail.com" value="<?php echo $oUsuario->correoElectronico; ?>" minlength="1" onchange="validarCampo(this);" required>
                    <span id="correoElectronicoSpan"></span>
                  </div>
                  <div class="col col-xl-4 col-md-6 col-12">
                    <label for="" class="form-label">Contrase??a <span class="text-danger">*</span></label>
                    <input class="form-control" type="password" id="contrasena" name="contrasena" onchange="validarCampo(this);" minlength="5" maxlength="15" required>
                    <span id="contrasenaSpan"></span>
                  </div>
                  <div class="col col-xl-4 col-md-6 col-12">
                    <label for="" class="form-label">Confirmar contrase??a <span class="text-danger">*</span></label>
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
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/validaciones.min.js"></script>
<?php require_once 'footer.php'; ?>
<script>
  <?php
  require_once '../controller/mensajecontroller.php';


  if ($oUsuarioController->tipoMensaje != "") {
    $oMensaje = new mensajes();
    echo $oMensaje->mensaje($oUsuarioController->tipoMensaje, $oUsuarioController->mensaje);
  }
  ?>
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
</script>



<script>
  //crear una funci??n con los campos de cada pagina
  function validarPagina1() {
    var valido = true;
    // agregar el id de cada campo de la p??gina para poder validar
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
    // agregar el id de cada campo de la p??gina para poder validar
    var campos = ["fechaNacimiento", "genero", "estadoCivil", "direccion", "barrio"];
    campos.forEach(element => {
      var campo = document.getElementById(element);
      if (!validarCampo(campo))
        valido = false;
    });
    if (valido)
      stepper.next();
  }

  function validarPagina3() {
    var valido = true;
    // agregar el id de cada campo de la p??gina para poder validar
    var campos = ["idRol", "idCargo"];
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
    // agregar el id de cada campo de la p??gina para poder validar
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