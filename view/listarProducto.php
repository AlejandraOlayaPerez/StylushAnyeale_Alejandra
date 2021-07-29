<?php
require_once 'headGerente.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/eliminar.js"></script>
    <title>RESERVACIONES</title>
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

        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th><a class="btn btn-info" href="nuevoProducto.php"><i class="fas fa-plus-square"></i> Nuevo</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../model/producto.php';
                        $oProducto = new producto();
                        $consulta = $oProducto->mostrarProducto();
                        foreach ($consulta as $registro) {
                        ?>
                            <tr>
                                
                                <td><?php echo $registro['codigoProducto']; ?></td>
                                <td><?php echo $registro['nombreProducto']; ?></td>
                                <td>$<?php echo $registro['valorUnitario']; ?></td>
                                <td>
                                    <a href="formularioEditarProducto.php?idProducto=<?php echo $registro['IdProducto']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="eliminarProducto(<?php echo $registro['IdProducto']; ?>)"><i class="fas fa-trash-alt"></i> Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
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
                <p>¿Esta seguro que desea eliminar el producto?</p>
            </div>
            <div class="modal-footer">
                <form action="../controller/productoServicioController.php" method="GET">
                    <input type="text" name="IdProducto" id="eliminarProducto" style="display:none">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarProducto"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>