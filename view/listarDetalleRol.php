<?php
require 'headGerente.php';
require_once '../model/conexionDB.php';
require_once '../model/rol.php';
require_once '../controller/mensajeController.php';
require_once '../model/modulo.php';
require_once '../model/permiso.php';
require_once '../model/pagina.php';

if (isset($_GET['ventana'])) { //Esto nos permitira conocer a que ventana se redirije
    $ventana = $_GET['ventana'];
} else {
    $ventana = "empleado";
}

$idRol = $_GET['idRol'];
?>

<html>

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/eliminar.js"></script>
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/permisoHabilitar.js"></script>
    <title>DETALLE ROL</title>
</head>

<body>
    <div class="container">

        <?php
        if (isset($_GET['mensaje'])) {
            $oMensaje = new mensajes();
            echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
        }
        ?>

        <?php
        require_once '../controller/usuarioController.php';

        $oUsuarioController = new usuarioController();
        $oRol = $oUsuarioController->consultarRolId($idRol);
        ?>

        <div class="row">
            <div class="col">
                <h1 class="tituloGrande">Rol: </h1>
                <input class="form-control" type="text" value="<?php echo $oRol->nombreRol; ?>" disabled>
            </div>
        </div>

        <br>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Empleado</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Permisos</button>
            </li>
        </ul>

        <br>

        <div class="tab-content">
            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="col-md-12" style="background-color: rgb(249, 201, 242);">
                    <div class="card">
                        <div class="card-header" style="background-color: rgb(249, 201, 242);">
                            <h3 class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Usuarios</h1>
                        </div>
                        <div class="card-body p-0" style="background-color: rgb(119, 167, 191);">
                            <table class="table" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
                                <thead>
                                    <tr style="background-color: rgb(249, 201, 242);">
                                        <th>Nombre_Usuario</th>
                                        <th>Correo Electronico</th>
                                        <th><a class="btn btn-info" href="nuevoUsuarioRol.php?idRol=<?php echo $_GET['idRol']; ?>"><i class="fas fa-user-plus"></i> Agregar Usuario</a></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php

                                    $oUsuarioController = new usuarioController();
                                    $registro = $oUsuarioController->mostrarUsuarioPorIdRol($_GET['idRol']); //la mostrarUsuarioConId  retorna la instancia completa, la esta almacenando en la variable $oRol
                                    if(count($registro)>0){
                                    foreach ($registro as $registro) { //tomar de todos los registros que retorna, toma una y almacena en registro
                                    ?>
                                        <tr>
                                            <td><?php echo $registro['nombreUser']; ?></td>
                                            <td><?php echo $registro['correoElectronico']; ?></td>
                                            <td>
                                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" value="" onclick="eliminarUsuarioRol(<?php echo $registro['idUser']; ?>)"><i class="fas fa-trash-alt"></i> Eliminar usuario</a>
                                            </td>
                                        </tr>
                                    <?php }

                                    }else{ //en caso de que no tengo informacion, mostrara un mensaje
                                        ?>
                                            <!-- no hay ningun registro -->
                                            <tr>
                                                <td style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay usuarios registrados en este rol</td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                </tbody>
                        </div>
                        </table>
                    </div>
                </div>

                <!-- Modal -->
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
                                <form action="../controller/usuarioController.php" method="GET">
                                    <input type="text" name="idUser" id="eliminarUsuarioRol" style="display: none;">
                                    <input type="text" name="idRol" value="<?php echo $idRol ?> " style="display:none;">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarUsuarioDeRol"><i class="fas fa-trash-alt"></i>Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="home/paginaPrincipalGerente.php?ventana=rol" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
        </div>


        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
                <button type="submit" class="btn btn-success" name="funcion" value="ActualizarPermisoDePagina">Actualizar cambios</button>
                <a href="listarDetalleRol.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
            </form>
        </div>
    </div>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>