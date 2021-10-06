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
        <div class="card">
            <div class="card-header colorArena">
                <form id="formLimpiar" action="" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group m-b-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Buscar por codigo producto.." style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Busca el codigo o nombre de un producto" value="" id="busquedaProductoCodigo" onkeyup="buscarProducto()">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group m-b-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Buscar por nombre producto.." style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Busca el codigo o nombre de un producto" value="" id="busquedaProductoNombre" onkeyup="buscarProducto()">
                            </div>
                        </div>
                        <div class="col col-md-4 float-right">
                            <a class="btn btn-info float-right" href="tags.php" style="margin-left: 5px;"><i class="fas fa-tags"></i> Ver. Tags</a>
                            <a class="btn btn-info float-right" href="categoria.php"><i class="fas fa-sitemap"></i> Ver. Categoria</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="button" class="btn btn-info" value="Borrar Filtro" onclick="limpiarFiltroReservacion()">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card" style="background-color: rgba(255, 255, 204, 255)">
            <br>
            <div class="card-tools">
                <ul class="pagination pagination-sm float-right  border border-dark" id="contenedorUL">

                </ul>
            </div>
            <div class="card-body table-responsive p-0" style="background-color: #FEF1E6">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr style="background-color: rgba(255, 255, 204, 255)">
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

<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/listarProducto.js"></script>
<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/general.js"></script>
<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/eliminar.js"></script>
<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/limpiarFormFiltros.js"></script>
<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/validaciones.js"></script>
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