<?php
require_once 'headGerente.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/eliminar.js"></script>
    <title>SERVICIOS</title>
</head>

<body>
    <div class="container">
        <?php
        require_once '../controller/mensajeController.php';

        if (isset($_GET['mensaje'])) {
            $oMensaje = new mensajes();
            echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
        }
        ?>

        <div class="col-md-12" style="background-color: rgb(249, 201, 242);">
            <div class="card">
                <div class="card-header" style="background-color: rgb(249, 201, 242);">
                    <h3 class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Cargos</h1>
                </div>
                <div class="card-body p-0" style="background-color: rgb(119, 167, 191);">
                    <table class="table" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
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
                            $oServicio=new servicio();
                            $consulta = $oServicio->listarServicio();
                            foreach ($consulta as $registro) {
                            ?>
                                <tr>
                                    <td><?php echo $registro['codigoServicio']; ?></td>
                                    <td><?php echo $registro['nombreServicio']; ?></td>
                                    <td><?php echo $registro['costo']; ?></td>
                                    <td>
                                        <a href="formularioEditarServicio.php?IdServicio=<?php echo $registro['IdServicio']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="eliminarServicio(<?php echo $registro['IdServicio']; ?>")"><i class="fas fa-trash-alt"></i> Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
        <a href="home/paginaPrincipalGerente.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
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
                    <input type="text" name="IdServicio" id="eliminarServicio" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarServicio"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>