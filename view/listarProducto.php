<?php
require_once 'headPagina.php';
require_once '../model/producto.php';
$oProducto = new producto();

if (isset($_GET['filtroCodigoProducto'])) {
    $filtroCodigoProducto = $_GET['filtroCodigoProducto'];
} else {
    $filtroCodigoProducto = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PRODUCTOS</title>
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

                $consulta = $oProducto->mostrarProducto($pagina, $filtroCodigoProducto);
                $numeroRegistro = $oProducto->numRegistro;
                $numPagina = intval($numeroRegistro / 10); //intval, traera el resultado en Entero en caso de que sea decimal
                if (fmod($numeroRegistro, 10) > 0) $numPagina++; //fmod es el modulo, para conocer el residuo
                // echo $numPagina;
                ?>


                <div class="card border border-dark">
                    <div class="card-header" style="background-color: rgb(249, 201, 242); font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;">
                        <form action="" method="GET">
                            <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Busca un producto: </label>
                            <input type="text" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Puedes buscar por codigo o nombre del producto" name="filtroCodigoProducto" onchange="this.form.submit()" value="<?php echo $filtroCodigoProducto; ?>">
                        </form>
                        <!--Paginacion-->
                        <div class="card-tools">
                            <ul class="pagination pagination-sm float-right border border-dark">
                                <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarProducto.php?page=1">&laquo;</a></li>
                                <?php
                                for ($i = 1; $i <= $numPagina; $i++) {
                                ?>
                                    <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarProducto.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php
                                }
                                ?>
                                <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarProducto.php?page=<?php echo $numPagina; ?>">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr style="background-color: rgb(249, 201, 242);">
                                    <th>Codigo</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th><a class="btn btn-info" href="nuevoProducto.php"><i class="fas fa-plus-square"></i> Nuevo</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($consulta) > 0) {
                                    foreach ($consulta as $registro) {
                                ?>
                                        <tr>

                                            <td><?php echo $registro['codigoProducto']; ?></td>
                                            <td><?php echo $registro['nombreProducto']; ?></td>
                                            <td><?php echo $registro['cantidad']; ?></td>
                                            <td>$<?php echo $registro['valorUnitario']; ?></td>
                                            <td>
                                                <a href="formularioEditarProducto.php?idProducto=<?php echo $registro['IdProducto']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="eliminarProducto(<?php echo $registro['IdProducto']; ?>)"><i class="fas fa-trash-alt"></i> Eliminar</a>
                                            </td>
                                        </tr>
                                    <?php }
                                } else { //en caso de que no tengo informacion, mostrara un mensaje
                                    ?>
                                    <!-- no hay ningun registro -->
                                    <tr>
                                        <td colspan="5" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay productos disponibles</td>
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