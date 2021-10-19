    <?php
    require_once 'headReservacion.php';
    require_once '../controller/reservacionController.php';
    if (isset($_POST['documentoIdentidad']) != "") {
      $oReservacionController = new reservacionController();
      $oReservacion = $oReservacionController->crearReservacion();
    }

    if (isset($_GET['idCliente'])) {
      $idCliente = $_GET['idCliente'];
    } else {
      $idCliente = $_SESSION['idCliente'];
    }

    require_once '../model/reservaciones.php';
    $oReservacion = new reservacion();
    ?>

    <div class="row">
      <div class="col col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb estilo">
            <li class="breadcrumb-item"><a href="paginaPrincipalCliente.php">Inicio</a></li>
            <li class="breadcrumb-item"><a href="listarReservacion.php">Tus Reservaciones</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nueva Reservacion</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header cabeceraCard">
            <h1 style="font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600; -webkit-text-fill-color: black; ">¡RESERVA CON NOSOTROS!</h1>
          </div>

          <form id="formulario" action="" method="POST">
            <div class="card-body bodyCard">
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
                $oCliente = $oClienteController->consultarCliente($idCliente);
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
                        <input type="text" class="form-control" id="primerNombre" name="primerNombre" placeholder="Nombre" value="<?php echo $oCliente->primerNombre . " " . $oCliente->segundoNombre; ?>" onchange="validarCampo(this);" minlength="2" maxlength="100" required readonly>
                        <span id="primerNombreSpan"></span>
                      </div>
                      <div class="col col-xl-4 col-md-6 col-12">
                        <label class="form-label" style="-webkit-text-fill-color: black;">Apellido</label>
                        <input type="text" class="form-control" id="primerApellido" name="primerApellido" placeholder="Apellido" value="<?php echo $oCliente->primerApellido . " " . $oCliente->segundoApellido; ?>" onchange="validarCampo(this);" minlength="2" maxlength="100" required readonly>
                        <span id="primerApellidoSpan"></span>
                      </div>
                      <div class="col col-xl-4 col-md-6 col-12">
                        <label class="form-label" style="-webkit-text-fill-color: black;">Celular</label>
                        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $oCliente->telefono; ?>" onchange="validarCampo(this);" min="3000000000" max="3999999999" required>
                        <span id="telefonoSpan"></span>
                      </div>
                    </div>
                    <br>
                    <?php
                    if (isset($_GET['idCliente'])) {
                    ?>
                      <a type="button" href="cajero.php" class="btn btn-dark"><i class="fas fa-home"></i> Volver al cajero</a>
                    <?php
                    } else {
                    ?>
                      <a type="button" href="paginaPrincipalCliente.php" class="btn btn-dark"><i class="fas fa-home"></i> Volver al inicio</a>
                    <?php } ?>

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
                      <div class="col-md-6">
                        <label class="form-label" style="-webkit-text-fill-color: black;">Estilista</label>
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
                        <select class="form-control" id="domicilio" name="domicilio" value="<?php echo $oReservacion->domicilio; ?>" onchange="confirmarDireccion(this);" required>
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
                      <div class="col-md-6" id="direccion" style="display: none;">
                        <label for="" class="form-label" style="-webkit-text-fill-color: black;">Dirección</label>
                        <input type="text" class="form-control" id="direccionCampo" name="direccion" value="<?php echo $oReservacion->direccion; ?>" onchange="validarCampo(this);" minlength="5" maxlength="200">
                        <span id="direccionCampoSpan"></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="" class="form-label" style="-webkit-text-fill-color: black;">Fecha Reservacion</label>
                        <input type="date" class="form-control" id="fechaReservacion" name="fechaReservacion" value="<?php echo $oReservacion->fechaReservacion; ?>" onchange="horarioReservacion();" required>
                        <span id="fechaReservacionSpan"></span>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" style="-webkit-text-fill-color: black;">Hora Reservacion</label>
                        <select select class="form-select" id="horaReservacion" name="horaReservacion" value="<?php echo $oReservacion->horaReservacion; ?>" onchange="validarCampo(this);" required disabled>
                          <option value="" disabled selected>Selecciones una opción</option>

                        </select>
                        <span id="horaReservacionSpan"></span>
                      </div>
                    </div>
                    <br>
                    <button style="margin: 5px" class="btn btn-info" type="button" onclick="stepper.previous()"><i class="fas fa-arrow-circle-left"></i> Anterior</button>
                    <button type="button" class="btn btn-success float-right" onclick="validarPaginaFinal();"><i class="fas fa-arrow-circle-right"></i> Crear Reservación</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php require_once 'linkjs.php'; ?>
    <?php require_once 'linkFooter.php'; ?>
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
        var campos = ["servicio", "estilista", "fechaReservacion", "horaReservacion", "domicilio", "direccionCampo"];
        campos.forEach(element => {
          var campo = document.getElementById(element);
          if (!validarCampo(campo))
            valido = false;
        });
        if (valido)
          document.getElementById('formulario').submit();
      }
    </script>