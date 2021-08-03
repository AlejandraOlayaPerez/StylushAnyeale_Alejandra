<?php
require_once 'headPagina.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIO</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <?php
                require_once '../controller/mensajeController.php';

                if (isset($_GET['mensaje'])) {
                    $oMensaje = new mensajes();
                    echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
                }
                ?>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr style="background-color: rgb(249, 201, 242);">
                                <th>Documento</th>
                                <th>Nombre y apellido</th>
                                <th>CorreoElectronico</th>
                                <th>Rol</th>
                                <th>Habilitado</th>
                                <th><a class="btn btn-info" href="nuevoUsuario.php"><i class="fas fa-user-plus"></i> Registrar Usuario</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once '../model/usuario.php';
                            require_once '../model/conexiondb.php';
                            $oUsuario = new usuario();
                            $consulta = $oUsuario->listarUsuario();
                            foreach ($consulta as $registro) {
                            ?>
                                <tr>
                                    <td><?php echo $registro['documentoIdentidad']; ?></td>
                                    <td><?php echo $registro['primerNombre'] . " " . $registro['primerApellido']; ?></td>
                                    <td><?php echo $registro['correoElectronico']; ?></td>
                                    <td><?php echo $registro['Rol']; ?></td>
                                    <td><?php if ($registro['eliminado']) echo "NO";
                                        else echo "SI";  ?>
                                        <!--Esta condicion me permite conocer SI O NO--> <?php if ($registro['eliminado'] == 0) { ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="eliminarUsuario(<?php echo $registro['idUser']; ?>)"><i class="fas fa-user-slash"></i> Deshabilitar</a>
                                    <?php } else { ?>
                                    <td><a href="../controller/usuarioController.php?funcion=habilitarDeshabilitarUsuario&habilitar=true&idUser=<?php echo $registro['idUser']; ?>" class="btn btn-info"><i class="far fa-user"></i> Habilitar</a>
                                    </td>
                                <?php } ?>
                                </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
                <h5 class="modal-title" id="Label">Deshabilitar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Esta seguro que desea Deshabilitar el usuario?</p>
            </div>
            <div class="modal-footer">
                <form action="../controller/usuarioController.php" method="GET">
                    <input type="text" name="idUser" id="eliminarUser" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="funcion" value="habilitarDeshabilitarUsuario" class="btn btn-danger"><i class="fas fa-user-slash"></i> Deshabilitar</button>
                </form>
            </div>
        </div>
    </div>
</div>