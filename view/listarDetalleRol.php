<?php
require_once 'headPagina.php';
require_once '../controller/gestionController.php';
require_once '../model/conexionDB.php';
require_once '../model/rol.php';
require_once '../model/usuario.php';
require_once '../model/pagina.php';
require_once '../model/modulo.php';

$idRol = $_GET['idRol'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETALLE ROL</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1" style="background-color: rgba(255, 255, 204, 255);">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true" style="font-family: 'Times New Roman', Times, serif; -webkit-text-fill-color: black;">Usuario</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false" style="font-family: 'Times New Roman', Times, serif; -webkit-text-fill-color: black;">Permisos</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                        <?php
                                        require_once '../controller/mensajeController.php';

                                        if (isset($_GET['mensaje'])) {
                                            $oMensaje = new mensajes();
                                            echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
                                        }
                                        ?>

                                        <?php
                                        $oUsuarioController = new usuarioController();
                                        $oRol = $oUsuarioController->consultarRolId($idRol);
                                        ?>

                                        <div class="card">
                                            <div class="card-header border-0">
                                                <label class="card-title">USUARIOS EN EL ROL: <?php echo $oRol->nombreRol; ?> </label>
                                            </div>
                                            <div class="card-body table-responsive p-0">
                                                <table class="table table-striped table-valign-middle">
                                                    <thead>
                                                        <tr style="background-color: rgb(249, 201, 242);">
                                                            <th>Nombre_Usuario</th>
                                                            <th>Correo Electronico</th>
                                                            <th><a class="btn btn-info" href="nuevoUsuarioRol.php?idRol=<?php echo $_GET['idRol']; ?>"><i class="fas fa-user-plus"></i> Nuevo</a></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php

                                                        $oUsuarioController = new usuarioController();
                                                        $registro = $oUsuarioController->mostrarUsuarioPorIdRol($_GET['idRol']); //la mostrarUsuarioConId  retorna la instancia completa, la esta almacenando en la variable $oRol
                                                        if (count($registro) > 0) {
                                                            foreach ($registro as $registro) { //tomar de todos los registros que retorna, toma una y almacena en registro
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $registro['primerNombre'] . " " . $registro['primerApellido']; ?></td>
                                                                    <td><?php echo $registro['correoElectronico']; ?></td>
                                                                    <td>
                                                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" value="" onclick="eliminarUsuarioRol(<?php echo $registro['idUser']; ?>)"><i class="fas fa-trash-alt"></i> Eliminar usuario</a>
                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                        } else { //en caso de que no tengo informacion, mostrara un mensaje
                                                            ?>
                                                            <!-- no hay ningun registro -->
                                                            <tr>
                                                                <td style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay usuarios registrados en este rol</td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <a href="listarRol.php?idRol=<?php echo $idRol; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                                    </div>

                                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

                                        <form action="../controller/usuarioController.php" method="GET">
                                            <input type="hidden" name="idRol" value="<?php echo $_GET['idRol']; ?>">

                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <input type="checkbox" onclick="habilitar(this)">
                                                    <label for=""> Seleccionar todo</label>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $oModulo = new modulo();
                                                    $consulta = $oModulo->listarModulo();
                                                    foreach ($consulta as $registro) {
                                                    ?>

                                                        <tr data-widget="expandable-table" aria-expanded="true">
                                                            <td>
                                                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                                <?php echo $registro['nombreModulo']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr class="expandable-body">
                                                            <td>
                                                                <div class="p-0">
                                                                    <table class="table table-hover">
                                                                        <tbody>
                                                                            <?php
                                                                            $oPagina = new pagina();
                                                                            $oPagina->idModulo = $registro['idModulo'];
                                                                            ?>
                                                                            <!-- <input type="hidden" name="idModulo" value="<?php //echo $oPagina->idModulo; 
                                                                                                                                ?>"> -->
                                                                            <?php
                                                                            $oPagina->idRol = $idRol;
                                                                            $consulta = $oPagina->ListarPagina();
                                                                            foreach ($consulta as $registroPagina) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="checkbox" name="arregloPagina[]" value="<?php echo $registroPagina['idPagina']; ?>" <?php if ($oUsuarioController->verificarPermiso($registroPagina['idPagina'], $idRol)) echo "checked"; ?>>
                                                                                        <!--el checked es complemento a checkbox, que me dice que regitros ya estab seleccionados-->
                                                                                        <label for="check<?php echo $registroPagina['idPagina']; ?>">
                                                                                            <?php echo $registroPagina['nombrePagina']; ?>
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <button type="submit" class="btn btn-success" name="funcion" value="ActualizarPermisoDePagina"><i class="fas fa-edit"></i>Actualizar cambios</button>
                                            <a href="listarRol.php?idRol=<?php echo $idRol; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
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

<div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Esta seguro que desea eliminar el usuario rol?</p>
            </div>
            <div class="modal-footer">
                <form action="../controller/gestionController.php" method="GET">
                    <input type="text" name="idUser" id="eliminarUsuarioRol" style="display: none;">
                    <input type="text" name="idRol" value="<?php echo $idRol ?> " style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarUsuarioDeRol"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>