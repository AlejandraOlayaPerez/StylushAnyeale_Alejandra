<?php
require_once 'headPagina.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SERVICIO</title>
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
                                    <th>Codigo Servicio</th>
                                    <th>Nombre Servicio</th>
                                    <th>Costo servicio</th>
                                    <th><a class="btn btn-info" href="nuevoServicio.php"><i class="fas fa-plus-square"></i> Nuevo</a></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                //referenciamos archivos cargo y conexionDB
                                require_once '../model/servicio.php';
                                require_once '../model/conexionDB.php';

                                //instanciamos cargo(), llamando la funcion listarcargo.
                                $oServicio = new servicio();
                                $consulta = $oServicio->listarServicio();
                                if (count($consulta) > 0) {
                                foreach ($consulta as $registro) {
                                ?>
                                    <tr>
                                        <td><?php echo $registro['codigoServicio']; ?></td>
                                        <td><?php echo $registro['nombreServicio']; ?></td>
                                        <td>$<?php echo $registro['costo']; ?></td>
                                        <td>
                                            <a href="formularioEditarServicio.php?IdServicio=<?php echo $registro['IdServicio']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="eliminarServicio(<?php echo $registro['IdServicio']; ?>)"><i class="fas fa-trash-alt"></i> Eliminar</a>
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
                <p>¿Esta seguro que desea eliminar el servicio?</p>
            </div>
            <div class="modal-footer">
                <form action="../controller/productoServicioController.php" method="GET">
                    <input type="text" name="IdServicio" id="eliminarServicio" style="display:none">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarServicio"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>