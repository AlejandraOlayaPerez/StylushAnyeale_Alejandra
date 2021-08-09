<?php
require_once 'headPagina.php';
require_once '../model/rol.php';

$oRol = new Rol();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ROL</title>
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

                <?php
                /*Isset si al variable page esta definida y su valor es difeente a nulo, si es nulo,
                el valor preterminado sera 1*/
                if (isset($_GET['page'])) $pagina = $_GET['page'];
                else $pagina = 1;

                $consulta = $oRol->listarRol($pagina);
                $numeroRegistro = $oRol->numRegistro;
                $numPagina = intval($numeroRegistro / 10); //intval, traera el resultado en Entero en caso de que sea decimal
                if (fmod($numeroRegistro, 10) > 0) $numPagina++; //fmod es el modulo, para conocer el residuo
                // echo $numPagina;
                ?>

                <div class="card border border-dark">
                    <div class="card-header" style="background-color: rgb(249, 201, 242); font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;">
                        <h1 class="card-title">Usuarios </h1>
                        <!--Paginacion-->
                        <div class="card-tools">
                            <ul class="pagination pagination-sm float-right border border-dark">
                                <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarRol.php?page=1">&laquo;</a></li>
                                <?php
                                for ($i = 1; $i <= $numPagina; $i++) {
                                ?>
                                    <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarRol.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php
                                }
                                ?>
                                <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarRol.php?page=<?php echo $numPagina; ?>">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr style="background-color: rgb(249, 201, 242);">
                                    <th>Nombre_Rol</th>
                                    <th><a class="btn btn-info" href="nuevoRol.php"><i class="fas fa-plus-square"></i> Nuevo Rol</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($consulta) > 0) {
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
                                    <?php }
                                } else { //en caso de que no tengo informacion, mostrara un mensaje
                                    ?>
                                    <!-- no hay ningun registro -->
                                    <tr>
                                        <td colspan="2" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay Roles disponibles</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
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
                <form action="../controller/gestionController.php" method="GET">
                    <input type="text" name="idRol" id="eliminarRol" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarRol"><i class="fas fa-trash-alt"></i>Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>