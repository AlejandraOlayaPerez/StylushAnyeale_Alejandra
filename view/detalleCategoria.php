<?php
require_once 'headpagina.php';
require_once '../model/producto.php';
require_once '../model/categoria.php';
require_once '../controller/productoserviciocontroller.php';

$oProductoServicioController = new productoServicioController();
$oCategoria = $oProductoServicioController->consultarCategoria($_GET['idCategoria']);
?>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header cardHeader">
                <h4>Productos de la categoria: <?php echo $oCategoria->nombreCategoria; ?></h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table colorestabla">
                    <thead>
                        <tr class="estiloTr">
                            <th>Codigo Producto</th>
                            <th>Producto</th>
                            <th> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#pagoProducto" onclick="buscarProducto()"><i class="fas fa-plus-square"></i> Agregar Producto</button></th>
                        </tr>
                    </thead>
                    <tbody id="listarDetalleCategoria">
                        <?php
                        require_once '../model/categoria.php';
                        $oCategoria = new categoria();
                        $consulta = $oCategoria->categoriaPorIdProducto($_GET['idCategoria']);
                        foreach ($consulta as $registro) {
                        ?>
                            <tr>
                                <td><?php echo $registro['codigoProducto']; ?></td>
                                <td><?php echo $registro['nombreProducto']; ?></td>
                                <td><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="eliminarDetalleCategoria(<?php echo $registro['IdProducto']; ?>)"><i class="fas fa-trash-alt"></i> Eliminar</a></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <a href="categoria.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
    </div>

</body>

</html>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/detalleCategoria.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/eliminar.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>
<?php require_once 'footer.php'; ?>

<div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header estiloModalHeader">
                <h5 class="modal-title" id="Label">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body estiloModalBody">
                <p>¿Esta seguro que desea eliminar el producto de esta categoria?</p>
            </div>
            <div class="modal-footer estiloModalBody">
                <form action="../controller/productoserviciocontroller.php" method="GET">
                    <input type="text" name="idCategoria" value="<?php echo $_GET['idCategoria']; ?>" style="display:none">
                    <input type="text" name="idProducto" id="idProducto" value="" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarCategoriaProducto"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pagoProducto">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Busqueda producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" class="form-control" placeholder="Buscar por codigo.." id="codigoProducto" name="codigoProducto" autocomplete="off" onkeyup="buscarProducto()">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" class="form-control" placeholder="Buscar por nombre.." id="nombreProducto" name="nombreProducto" autocomplete="off" onkeyup="buscarProducto()">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card-tools">
                            <ul class="pagination pagination-sm contenedorUL" id="contenedorUL">

                            </ul>
                        </div>
                    </div>
                </div>
                <form action="../controller/productoserviciocontroller.php" method="GET">
                    <input type="text" name="idCategoria" value="<?php echo $_GET['idCategoria']; ?>" style="display: none;">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Codigo Producto</th>
                                    <th>Producto</th>
                                </tr>
                            </thead>
                            <tbody id="informacionProducto">

                            </tbody>
                        </table>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" name="funcion" value="registrarProductoCategoria">Registrar productos</button>
            </div>
            </form>
        </div>
    </div>
</div>