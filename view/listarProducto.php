<?php
require_once 'headPagina.php';
require_once '../model/producto.php';
$oProducto = new producto();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PRODUCTOS</title>
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

        $consulta = $oProducto->mostrarProducto($pagina);
        $numeroRegistro = $oProducto->numRegistro;
        $numPagina = intval($numeroRegistro / 10); //intval, traera el resultado en Entero en caso de que sea decimal
        if (fmod($numeroRegistro, 10) > 0) $numPagina++; //fmod es el modulo, para conocer el residuo
        // echo $numPagina;
        ?>


        <div class="card">
            <div class="card-header" style="background-color: rgb(249, 201, 242); font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Buscar producto.." style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Busca el codigo o nombre de un producto" value="" id="busquedaProducto" onkeyup="buscarProducto()">
                        </div>
                    </div>
                    <div class="col col-md-6 float-right">
                        <a class="btn btn-info" href="tags.php"><i class="fas fa-tags"></i> Ver. Tags</a>
                        <a class="btn btn-info" href="categoria.php"><i class="fas fa-sitemap"></i> Ver. Categoria</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" style="background-color: rgb(249, 201, 242); font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;">
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
                    <tbody id="productosBusqueda">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/filtros.js"></script>
<script>
    buscarProducto();
</script>

<?php require_once 'footer.php'; ?>

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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Cantidad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../controller/productoServicioController.php" method="GET">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Actualizar Cantidad</label>
                            <input class="form-control" type="number" id="cantidad" name="cantidad" placeholder="Cantidad">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Justifica esta actualizacion</label>
                            <textarea class="form-control" rows="3" type="text" id="justificacion" name="justificacion" placeholder="Justifica esta actualizacion" required minlength="10" maxlength="500"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="text" id="idProducto" name="idProducto">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="funcion" value="actualizarCantidad">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>