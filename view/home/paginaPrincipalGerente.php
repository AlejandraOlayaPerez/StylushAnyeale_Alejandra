<?php
require_once '../headGerente.php';
if (isset($_GET['ventana'])) { //
    $ventana = $_GET['ventana'];
} else {
    $ventana = "paginaPrincipal";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/eliminar.js"></script>
    <title>Gerente</title>
</head>

<body>
    <div class="container">

        <?php
        require_once '../../controller/mensajeController.php';

        if (isset($_GET['mensaje'])) {
            $oMensaje = new mensajes();
            echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
        }
        ?>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php if ($ventana == "paginaPrincipal") echo "active"; ?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Pagina Principal</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php if ($ventana == "usuario") echo "active"; ?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Usuario</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php if ($ventana == "rol") echo "active"; ?>" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Rol</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php if ($ventana == "modulo") echo "active"; ?>" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Modulo</button>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane <?php if ($ventana == "paginaPrincipal") echo "active"; ?>" id="home" role="tabpanel" aria-labelledby="home-tab">

            </div>

            <div class="tab-pane <?php if ($ventana == "usuario") echo "active"; ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <br>
                <div class="col-md-12" style="background-color: rgb(249, 201, 242);">
                    <div class="card">
                        <div class="card-header" style="background-color: rgb(249, 201, 242);">
                            <h3 class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Usuarios</h1>
                        </div>
                        <div class="card-body p-0" style="background-color: rgb(119, 167, 191);">
                            <table class="table" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
                                <thead>
                                    <tr style="background-color: rgb(249, 201, 242);">
                                        <th>Nombre</th>
                                        <th>CorreoElectronico</th>
                                        <th>Rol</th>
                                        <th>Habilitado</th>
                                        <th><a class="btn btn-info" href="../nuevoUsuario.php"><i class="fas fa-user-plus"></i> Registrar Usuario</a></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    require_once '../../model/usuario.php';
                                    require_once '../../model/conexiondb.php';
                                    $oUsuario = new usuario();
                                    $consulta = $oUsuario->listarUsuario();
                                    foreach ($consulta as $registro) {
                                    ?>
                                        <tr>
                                            <td><?php echo $registro['nombreUser']; ?></td>
                                            <td><?php echo $registro['correoElectronico']; ?></td>
                                            <td><?php echo $registro['Rol']; ?><?php if ($registro['Rol'] == "") {
                                                                                    echo "No hay registro";
                                                                                } ?></td>
                                            <td><?php if ($registro['eliminado']) echo "NO";
                                                else echo "SI";  ?>
                                                <!--Esta condicion me permite conocer SI O NO--> <?php if ($registro['eliminado'] == 0) { ?>
                                            </td>
                                            <td><a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/formularioEditarUsuario.php?idUser=<?php echo $registro['idUser']; ?>" class="btn btn-warning"><i class="fas fa-user-edit"></i> Editar</a>
                                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="eliminarUsuario(<?php echo $registro['idUser']; ?>)"><i class="fas fa-exclamation-circle"></i> Deshabilitar</a>
                                            <?php } else { ?>
                                            <td><a href="../../controller/usuarioController.php?funcion=habilitarDeshabilitarUsuario&habilitar=true&idUser=<?php echo $registro['idUser']; ?>" class="btn btn-info">Habilitar</a>
                                            </td>
                                        <?php } ?>
                                        </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
                                        <p>¿Esta seguro que desea Deshabilitar el usuario?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="../../controller/usuarioController.php" method="GET">
                                            <input type="text" name="idUser" id="eliminarUser" style="display: none;">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" name="funcion" value="habilitarDeshabilitarUsuario" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Deshabilitar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane <?php if ($ventana == "rol") echo "active"; ?>" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                <br>
                <div class="col-md-12" style="background-color: rgb(249, 201, 242);">
                    <div class="card">
                        <div class="card-header" style="background-color: rgb(249, 201, 242);">
                            <h3 class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Rol</h1>
                        </div>
                        <div class="card-body p-0" style="background-color: rgb(119, 167, 191);">
                            <table class="table" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
                                <thead>
                                    <tr style="background-color: rgb(249, 201, 242);">
                                        <th>Nombre_Rol</th>
                                        <th><a class="btn btn-info" href="../nuevoRol.php"><i class="fas fa-plus-square"></i> Nuevo Rol</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once '../../model/rol.php';
                                    require_once '../../model/conexionDB.php';
                                    $oRol = new Rol();
                                    $consulta = $oRol->listarRol();
                                    foreach ($consulta as $registro) {
                                    ?>
                                        <tr>
                                            <td><?php echo $registro['nombreRol']; ?></td>
                                            <td>
                                                <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/formularioEditarRol.php?idRol=<?php echo $registro['idRol']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario2" onclick="eliminarRol(<?php echo $registro['idRol']; ?>)"><i class="fas fa-trash-alt"></i> Eliminar</a>
                                                <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/listarDetalleRol.php?idRol=<?php echo $registro['idRol']; ?>" class="btn btn-light"><i class="far fa-user"></i> Ver.Usuario</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <!-- Modal -->
                            <div class="modal fade" id="eliminarFormulario2" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="Label">Eliminar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Esta seguro que desea eliminar el rol?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="../../controller/usuarioController.php" method="GET">
                                                <input type="text" name="idRol" id="eliminarRol" style="display:none;">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-danger" name="funcion" value="eliminarRol"><i class="fas fa-trash-alt"></i>Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane <?php if ($ventana == "modulo") echo "active"; ?>" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <br>
                <div class="col-md-12" style="background-color: rgb(249, 201, 242);">
                    <div class="card">
                        <div class="card-header" style="background-color: rgb(249, 201, 242);">
                            <h3 class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Modulos</h1>
                        </div>
                        <div class="card-body p-0" style="background-color: rgb(119, 167, 191);">
                            <table class="table" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
                                <thead>
                                    <tr style="background-color: rgb(249, 201, 242);">
                                        <th>Nombre_Modulo</th>
                                        <th><a class="btn btn-info" href="../nuevoModulo.php"><i class="fas fa-plus-square"></i> Nuevo Modulo</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once '../../model/modulo.php';
                                    require_once '../../model/conexionDB.php';
                                    $oModulo = new modulo();
                                    $consulta = $oModulo->listarModulo();
                                    foreach ($consulta as $registro) {
                                    ?>
                                        <tr>
                                            <td><?php echo $registro['nombreModulo']; ?></td>
                                            <td>
                                                <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/formularioEditarModulo.php?idModulo=<?php echo $registro['idModulo']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario3" onclick="eliminarModulo(<?php echo $registro['idModulo']; ?>)"><i class="fas fa-trash-alt"></i> Eliminar</a>
                                                <a href="http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/listarPagina.php?idModulo=<?php echo $registro['idModulo']; ?>" class="btn btn-light"><i class="fas fa-file"></i> Ver. Pagina</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="eliminarFormulario3" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="Label">Eliminar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Esta seguro que desea eliminar el modulo?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="../../controller/usuarioController.php" method="GET">
                                            <input type="text" name="idModulo" id="eliminarModulo" style="display:none;">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger" name="funcion" value="eliminarModulo"><i class="fas fa-trash-alt"></i>Eliminar</button>
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
require_once '../footerGerente.php';
?>