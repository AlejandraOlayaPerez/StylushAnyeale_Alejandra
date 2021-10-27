<?php
require_once 'headpagina.php';
require_once '../controller/usuariocontroller.php';

$idUser = $_SESSION['idUser'];
$oUsuarioController = new usuarioController();
$oUsuario = $oUsuarioController->consultarUsuarioId($_SESSION['idUser']);
?>
<form action="../controller/usuariocontroller.php" method="POST" id="formularioInformacion">
    <div class="card-body">
        <input type="text" name="funcion" value="ActualizarUsuario" style="display: none;">
        <input type="text" name="idUser" value="<?php echo $idUser; ?>" style="display: none;">
        <input type="text" name="idRol" value="<?php echo $oUsuario->idRol; ?>" style="display: none;">
        <div class="row">
            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Tipo de Documento <span class="text-danger">*</span></label>
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
                <label for="" class="form-label">Documento identidad <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="documentoIdentidad" name="documentoIdentidad" value="<?php echo $oUsuario->documentoIdentidad; ?>" onchange="validarCampo(this);" min="1000" max="99999999999" required>
                <span id="documentoIdentidadSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Primer Nombre <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="primerNombre" name="primerNombre" value="<?php echo $oUsuario->primerNombre; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
                <span id="primerNombreSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="segundoNombre" class="form-label">Segundo Nombre</label> <small class="letraPequena">(Opcional)</small>
                <input type="text" class="form-control" id="segundoNombre" name="segundoNombre" value="<?php echo $oUsuario->segundoNombre; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50">
                <span id="segundoNombreSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Primer Apellido <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="primerApellido" name="primerApellido" value="<?php echo $oUsuario->primerApellido; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
                <span id="primerApellidoSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Segundo Apellido <small class="letraPequeña">(Opcional)</small></label>
                <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" value="<?php echo $oUsuario->segundoApellido; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50">
                <span id="segundoApellidoSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Correo Electronico <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="correoElectronico" name="correoElectronico" value="<?php echo $oUsuario->correoElectronico; ?>" onchange="validarCampo(this);" minlength="1" required>
                <span id="correoElectronicoSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Telefono <span class="text-danger">*</span></label>
                <input type="phone" class="form-control" id="telefono" name="telefono" value="<?php echo $oUsuario->telefono; ?>" onchange="validarCampo(this);" min="10" max="13" required>
                <span id="telefonoSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Fecha de Nacimiento <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $oUsuario->fechaNacimiento; ?>" onchange="validarCampo(this);" required>
                <span id="fechaNacimientoSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Genero <small class="letraPequeña">(Opcional)</small></label>
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
                <label for="" class="form-label">Estado Civil <small class="letraPequeña">(Opcional)</small></label>
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
                <label for="" class="form-label">Direccion <small class="letraPequeña">(Opcional)</small></label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $oUsuario->direccion; ?>" onchange="validarCampo(this);" minlength="2" maxlength="20">
                <span id="direccionSpan"></span>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <label for="" class="form-label">Barrio <small class="letraPequeña">(Opcional)</small></label>
                <input type="text" class="form-control" id="barrio" name="barrio" value="<?php echo $oUsuario->barrio; ?>" onchange="validarCampo(this);" minlength="2" maxlength="15">
                <span id="barrioSpan"></span>
            </div>
        </div>
    </div>
    <button style="margin: 10px;" type="button" class="btn btn-success float-right" onclick="validarPaginaActualizar();"><i class="fas fa-edit"></i>Actualizar Informacion</button>
</form>

<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/validaciones.min.js"></script>

<script>
    function validarPaginaActualizar() {
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
            document.getElementById('formularioInformacion').submit();
    }
</script>