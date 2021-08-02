<?php
require_once 'headPagina.php';
require_once '../controller/gestionController.php';
require_once '../model/modulo.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARGO</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">

            <?php
            require_once '../controller/mensajeController.php';

            if (isset($_GET['mensaje'])) {
                $oMensaje = new mensajes();
                echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
            }
            ?>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr style="background-color: rgb(249, 201, 242);">
                                    <th>Cargo</th>
                                    <th><a class="btn btn-info" href="nuevoCargo.php"><i class="fas fa-plus-square"></i> Nuevo</a></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                //referenciamos archivos cargo y conexionDB
                                require_once '../model/cargo.php';
                                require_once '../model/conexionDB.php';

                                //instanciamos cargo(), llamando la funcion listarcargo.
                                $oCargo = new cargo();
                                $consulta = $oCargo->listarCargo();
                                foreach ($consulta as $registro) {
                                ?>
                                    <tr>
                                        <td><?php echo $registro['cargo']; ?></td>
                                        <td>
                                            <a href="formularioEditarCargo.php?idCargo=<?php echo $registro['idCargo']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="eliminarCargo(<?php echo $registro['idCargo']; ?>)"><i class="fas fa-trash-alt"></i> Eliminar</a>
                                            <a href="mostrarUsuarioCargo.php?idCargo=<?php echo $registro['idCargo']; ?>" class="btn btn-light"><i class="fas fa-user"></i> Ver. Usuario</a>
                                        </td>
                                    </tr>
                                <?php } ?>
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


<div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Esta seguro que desea eliminar el cargo?</p>
            </div>
            <div class="modal-footer">
                <form action="../controller/cargoController.php" method="GET">
                    <input type="text" name="idCargo" id="eliminarCargo" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarCargo"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>