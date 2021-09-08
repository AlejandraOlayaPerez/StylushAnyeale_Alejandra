<?php
require_once 'headPagina.php';
require_once '../model/usuario.php';
require_once '../model/conexiondb.php';

$oUsuario = new usuario();

if (isset($_GET['filtroUsuario'])) {
    $filtroUsuario = $_GET['filtroUsuario'];
} else {
    $filtroUsuario = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>USUARIO</title>
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

        <?php
        /*Isset si al variable page esta definida y su valor es difeente a nulo, si es nulo,
                el valor preterminado sera 1*/
        if (isset($_GET['page'])) $pagina = $_GET['page'];
        else $pagina = 1;

        $consulta = $oUsuario->listarUsuario($pagina, $filtroUsuario);
        $numeroRegistro = $oUsuario->numRegistro;
        $numPagina = intval($numeroRegistro / 10); //intval, traera el resultado en Entero en caso de que sea decimal
        if (fmod($numeroRegistro, 10) > 0) $numPagina++; //fmod es el modulo, para conocer el residuo
        // echo $numPagina;
        ?>

        <div class="card border border-dark">
            <div class="card-header" style="background-color: rgb(249, 201, 242); font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;">
                <!--filtro-->
                <form action="" method="GET">
                    <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Buscar: </label>
                    <input type="text" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Puedes buscar por el documento o nombre del usuario" name="filtroUsuario" onchange="this.form.submit()" value="<?php echo $filtroUsuario; ?>">
                </form>

                <!--Paginacion-->
                <div class="card-tools">
                    <ul class="pagination pagination-sm float-right border border-dark">
                        <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarUsuario.php?page=1">&laquo;</a></li>
                        <?php
                        for ($i = 1; $i <= $numPagina; $i++) {
                        ?>
                            <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarUsuario.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                        }
                        ?>
                        <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarUsuario.php?page=<?php echo $numPagina; ?>">&raquo;</a></li>
                    </ul>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr style="background-color: rgb(249, 201, 242);">
                            <th>Tipo Documento</th>
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
                        if (count($consulta) > 0) {
                            foreach ($consulta as $registro) {
                        ?>
                                <tr>
                                    <td><?php echo $registro['tipoDocumento']; ?></td>
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
                            <?php }
                        } else { //en caso de que no tengo informacion, mostrara un mensaje
                            ?>
                            <!-- no hay ningun registro -->
                            <tr>
                                <td colspan="6" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay usuarios disponibles</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

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
    </div>
</body>

<?php require_once 'footer.php'; ?>