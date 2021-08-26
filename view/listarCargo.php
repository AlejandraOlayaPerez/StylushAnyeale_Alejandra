<?php
require_once 'headPagina.php';
require_once '../model/cargo.php';

$oCargo = new cargo();
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

                $consulta = $oCargo->listarCargo($pagina);
                $numeroRegistro = $oCargo->numRegistro;
                $numPagina = intval($numeroRegistro / 10); //intval, traera el resultado en Entero en caso de que sea decimal
                if (fmod($numeroRegistro, 10) > 0) $numPagina++; //fmod es el modulo, para conocer el residuo
                // echo $numPagina;
                ?>

                <div class="card border border-dark">
                    <div class="card-header" style="background-color: rgb(249, 201, 242); font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;">
                        <h1 class="card-title">Cargo </h1>
                        <!--Paginacion-->
                        <div class="card-tools">
                            <ul class="pagination pagination-sm float-right border border-dark">
                                <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarCargo.php?page=1">&laquo;</a></li>
                                <?php
                                for ($i = 1; $i <= $numPagina; $i++) {
                                ?>
                                    <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarCargo.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php
                                }
                                ?>
                                <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarCargo.php?page=<?php echo $numPagina; ?>">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>

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
                                if (count($consulta) > 0) {
                                    foreach ($consulta as $registro) {
                                ?>
                                        <tr>
                                            <td><?php echo $registro['nombreServicio']; ?></td>
                                            <td>
                                                <a href="formularioEditarCargo.php?idCargo=<?php echo $registro['idCargo']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="eliminarCargo(<?php echo $registro['idCargo']; ?>)"><i class="fas fa-trash-alt"></i> Eliminar</a>
                                                <a href="mostrarUsuarioCargo.php?idCargo=<?php echo $registro['idCargo']; ?>" class="btn btn-light"><i class="fas fa-user"></i> Ver. Usuario</a>
                                            </td>
                                        </tr>
                                    <?php }
                                } else { //en caso de que no tengo informacion, mostrara un mensaje
                                    ?>
                                    <!-- no hay ningun registro -->
                                    <tr>
                                        <td colspan="2" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay cargos disponibles</td>
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

<?php require_once 'footer.php'; ?>