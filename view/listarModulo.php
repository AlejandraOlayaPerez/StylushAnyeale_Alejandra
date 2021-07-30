<?php
require_once 'headPagina.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODULO</title>
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

                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr style="background-color: rgb(249, 201, 242);">
                                    <th>Nombre_Modulo</th>
                                    <th><a class="btn btn-info" href="nuevoModulo.php"><i class="fas fa-plus-square"></i> Nuevo Modulo</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once '../model/modulo.php';
                                require_once '../model/conexionDB.php';
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
                <form action="../controller/gestionController.php" method="GET">
                    <input type="text" name="idModulo" id="eliminarModulo" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarModulo"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>