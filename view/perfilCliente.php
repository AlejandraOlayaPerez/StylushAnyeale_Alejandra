<?php
require_once 'headcliente.php';
require_once '../controller/clientecontroller.php';
$oClienteController = new clienteController();
$oCliente = $oClienteController->consultarCliente($_SESSION['idCliente']);

if (isset($_GET['ventana'])) { //
    $ventana = $_GET['ventana'];
} else {
    $ventana = "calendario";
}
?>

<div class="row">
    <div class="col col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb estilo">
                <li class="breadcrumb-item"><a href="paginaprincipalcliente.php">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Perfil</li>
            </ol>
        </nav>
    </div>
</div>

<br>
<?php
$oInformacion = $oClienteController->perfilCliente($_SESSION['idCliente']);
?>

<div class="row gutters-sm">
    <div class="col-md-4 mb-3">
        <div class="card perfilFoto">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img class="img-circle elevation-2" src="../<?php echo $oInformacion->fotoPerfil; ?>" width="150">
                    
                    <div class="mt-3">
                        <h4><?php echo $oInformacion->primerNombre . " " . $oInformacion->primerApellido; ?></h4>
                        <p class="text-secondary mb-1"><?php echo $oInformacion->email; ?></p>
                        <p class="text-muted font-size-sm"><?php echo $oInformacion->telefono; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gutters-sm">
            <div class="col-sm-12 mb-3">
                <div class="card perfilReserva">
                    <div class="card-body">
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-valign-middle" style="height: 150px;">
                                <thead>
                                    <tr style="background-color: #FEF1E6;">
                                        <th>Servicio</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $consulta = $oClienteController->mostrarReservacionIdCliente($_SESSION['idCliente'], $fechaActual);
                                    if (count($consulta) > 0) {
                                        foreach ($consulta as $registro) {
                                    ?>
                                            <tr>
                                                <td><?php echo $registro['nombreServicio']; ?></td>
                                                <td><?php echo $registro['fechaReservacion']; ?></td>
                                                <td><?php echo $registro['horaReservacion']; ?></td>
                                            </tr>
                                        <?php }
                                    } else { //en caso de que no tengo informacion, mostrara un mensaje
                                        ?>
                                        <!-- no hay ningun registro -->
                                        <tr>
                                            <td colspan="3" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No tiene reservaciones pendientes</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gutters-sm">
            <div class="col-sm-12 mb-3">
                <div class="card perfilReserva">
                    <div class="card-body">
                        <form action="../controller/imagencontroller.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Actualizar foto de perfil</label>
                                    <input name="archivos" type="file" class="form-control" accept="image/*">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="paginaPrincipalCliente.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                                    <button type="submit" class="btn btn-success float-right" name="funcion" value="actualizarFotoCliente"><i class="fas fa-edit"></i>Actualizar foto</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-body perfil">
                <form id="formulario" action="" method="POST" novalidate>
                    <input type="text" name="funcion" value="actualizarCliente" style="display: none;">
                    <input type="text" name="idCliente" value="<?php echo $_SESSION['idCliente']; ?>" style="display: none;">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Tipo de Documento</label>
                            <select class="form-control" id="tipoDocumento" name="tipoDocumento" onchange="validarCampo(this);" required>
                                <option value="" disabled selected>Selecciones una opción</option>
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

                        <div class="col-md-6">
                            <label for="" class="form-label">Documento identidad</label>
                            <input type="number" class="form-control" id="documentoIdentidad" name="documentoIdentidad" value="<?php echo $oCliente->documentoIdentidad; ?>" onchange="validarCampo(this);" min="1000" max="99999999999" required>
                            <span id="documentoIdentidadSpan"></span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Primer Nombre</label>
                            <input type="text" class="form-control" id="primerNombre" name="primerNombre" value="<?php echo $oCliente->primerNombre; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
                            <span id="primerNombreSpan"></span>
                        </div>

                        <div class="col-md-6">
                            <label for="" class="form-label">Segundo Nombre</label>
                            <input type="text" class="form-control" id="segundoNombre" name="segundoNombre" value="<?php echo $oCliente->segundoNombre; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50">
                            <span id="segundoNombreSpan"></span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Primer Apellido</label>
                            <input type="text" class="form-control" id="primerApellido" name="primerApellido" value="<?php echo $oCliente->primerApellido; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
                            <span id="primerApellidoSpan"></span>
                        </div>

                        <div class="col-md-6">
                            <label for="" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" value="<?php echo $oCliente->segundoApellido; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50">
                            <span id="segundoApellidoSpan"></span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" <?php if ($oCliente->fechaNacimiento != "") { ?> value="" <?php } ?> onchange="validarCampo(this);" required>
                            <span id="fechaNacimientoSpan"></span>
                        </div>

                        <div class="col-md-6">
                            <label for="" class="form-label">Genero</label>
                            <select class="form-select" id="genero" name="genero" onchange="validarCampo(this);">
                                <option value="" selected>Selecciones una opción</option>
                                <option value="Femenino" <?php if ($oCliente->genero == "Femenino") {
                                                                echo "selected";
                                                            } ?>>Femenino</option>
                                <option value="Masculino" <?php if ($oCliente->genero == "Masculino") {
                                                                echo "selected";
                                                            } ?>>Masculino</option>
                                <option value="Otro" <?php if ($oCliente->genero == "Otro") {
                                                            echo "selected";
                                                        } ?>>Otro</option>
                            </select>
                            <span id="generoSpan"></span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $oCliente->direccion; ?>" onchange="validarCampo(this);" minlength="2" maxlength="20">
                            <span id="direccionSpan"></span>
                        </div>

                        <div class="col-md-6">
                            <label for="" class="form-label">Barrio</label>
                            <input type="text" class="form-control" id="barrio" name="barrio" value="<?php echo $oCliente->barrio; ?>" onchange="validarCampo(this);" minlength="2" maxlength="15">
                            <span id="barrioSpan"></span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Correo Electronico</label>
                            <input type="email" class="form-control" id="correoElectronico" name="correoElectronico" value="<?php echo $oCliente->email; ?>" onchange="validarCampo(this);" minlength="1" required>
                            <span id="correoElectronicoSpan"></span>
                        </div>

                        <div class="col-md-6">
                            <label for="" class="form-label">Telefono</label>
                            <input type="phone" class="form-control" id="telefono" name="telefono" value="<?php echo $oCliente->telefono; ?>" onchange="validarCampo(this);" min="10" max="13" required>
                            <span id="telefonoSpan"></span>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-12">
                            <a href="paginaprincipalcliente.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                            <button type="button" class="btn btn-success float-right" onclick="validarPaginaFinal();"><i class="fas fa-edit"></i>Actualizar Informacion</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</body>

</html>

<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/validaciones.js"></script>
<?php require_once 'linkfooter.php'; ?>

<script>
    function validarPaginaFinal() {
        // evento.preventDefault();
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var campos = ["tipoDocumento", "documentoIdentidad", "primerNombre", "segundoNombre",
            "primerApellido", "segundoApellido", "fechaNacimiento", "genero", "direccion", "barrio",
            "correoElectronico", "telefono"
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