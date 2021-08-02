<?php
require_once 'headPagina.php';
require_once '../controller/usuarioController.php';
require_once '../model/usuario.php';
require_once '../controller/usuarioController.php';

$idUser = $_GET['idUser'];

$oUsuarioController = new usuarioController();
$oUsuario = $oUsuarioController->consultarUsuarioId($_GET['idUser']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PERFIL</title>
</head>

<body class="hold-transition sidebar-mini">


    <div class="content-wrapper">
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    require_once '../controller/mensajeController.php';

                    if (isset($_GET['mensaje'])) {
                        $oMensaje = new mensajes();
                        echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
                    }
                    ?>
                    <div class="col col-xl-3 col-md-6 col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="../image/perfilPreterminado.png" alt="">
                                </div>

                                <h1 class="profile-username text-center"><?php echo $oUsuario->primerNombre . " " . $oUsuario->primerApellido; ?></h1>
                            </div>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Informacion Personal</h3>
                            </div>

                            <div class="card-body">
                                <strong><i class="fas fa-info-circle"></i> Nombres: </strong>
                                <p><?php echo $oUsuario->primerNombre . " " . $oUsuario->segundoNombre . " " . $oUsuario->primerApellido . " " . $oUsuario->segundoApellido; ?></p>

                                <hr>
                                <strong><i class="fas fa-at"></i> Correo Electronico: </strong>
                                <p><?php echo $oUsuario->correoElectronico; ?></p>

                                <hr>
                                <strong><i class="fas fa-phone-square"></i> Telefono: </strong>
                                <p><?php echo $oUsuario->telefono; ?></p>

                                <hr>
                                <a href="configuracionPerfil.php?idUser=<?php echo $oUsuario->idUser; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1" style="background-color: rgba(255, 255, 204, 255);">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true" style="font-family: 'Times New Roman', Times, serif; -webkit-text-fill-color: black;">Informacion Personal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false" style="font-family: 'Times New Roman', Times, serif; -webkit-text-fill-color: black;">Reservaciones</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-hoUsuario">
                                        <form action="../controller/usuarioController.php" method="GET">
                                            <input type="text" name="idUser" value="<?php echo $oUsuario->idUser; ?>" style="display: none;">
                                            <input type="text" name="idRol" value="<?php echo $oUsuario->idRol; ?>" style="display: none;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Tipo de Documento</label>
                                                        <select class="form-select" id="" name="tipoDocumento">
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
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Documento identidad</label>
                                                        <input type="number" class="form-control" id="" name="documentoIdentidad" value="<?php echo $oUsuario->documentoIdentidad; ?>">
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Primer Nombre</label>
                                                        <input type="text" class="form-control" id="" name="primerNombre" value="<?php echo $oUsuario->primerNombre; ?>">
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Segundo Nombre</label>
                                                        <input type="text" class="form-control" id="" name="segundoNombre" value="<?php echo $oUsuario->segundoNombre; ?>">
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Primer Apellido</label>
                                                        <input type="text" class="form-control" id="" name="primerApellido" value="<?php echo $oUsuario->primerApellido; ?>">
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Segundo Apellido</label>
                                                        <input type="text" class="form-control" id="" name="segundoApellido" value="<?php echo $oUsuario->segundoApellido; ?>">
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Correo Electronico</label>
                                                        <input type="email" class="form-control" id="" name="correoElectronico" value="<?php echo $oUsuario->correoElectronico; ?>">
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Telefono</label>
                                                        <input type="number" class="form-control" id="" name="telefono" value="<?php echo $oUsuario->telefono; ?>">
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Fecha de Nacimiento</label>
                                                        <input type="date" class="form-control" id="" name="fechaNacimiento" value="<?php echo $oUsuario->fechaNacimiento; ?>">
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Genero</label>
                                                        <select class="form-select" id="" name="genero">
                                                            <option value="" disabled selected>Selecciones una opción</option>
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
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Estado Civil</label>
                                                        <select class="form-select" id="" name="estadoCivil">
                                                            <option value="" disabled selected>Selecciones una opción</option>
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
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Direccion</label>
                                                        <input type="text" class="form-control" id="" name="direccion" value="<?php echo $oUsuario->direccion; ?>">
                                                    </div>

                                                    <div class="col col-xl-4 col-md-6 col-12">
                                                        <label for="" class="form-label">Barrio</label>
                                                        <input type="text" class="form-control" id="" name="barrio" value="<?php echo $oUsuario->barrio; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success" name="funcion" value="ActualizarUsuario"><i class="fas fa-edit"></i>Actualizar Informacion</button>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                        <h1>hola</h1>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>