<?php require_once 'headPagina.php'; ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header cardHeader">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group m-b-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Buscar categoria.." data-bs-toggle="tooltip" data-bs-placement="right" title="Busca una categoria" value="" id="categoriaBusqueda" onkeyup="buscarCategoria()">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card-tools">
                        <ul class="pagination pagination-sm contenedorUL" id="contenedorUL">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>´

    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table colorestabla">
                <thead>
                    <tr class="estiloTr">
                        <th>Categoria</th>
                        <th><a class="btn btn-info" href="nuevaCategoria.php"><i class="fas fa-plus-square"></i> Crear Categoria</a></th>
                    </tr>
                </thead>
                <tbody id="categoria">

                </tbody>
            </table>
        </div>
    </div>
    <a href="listarProducto.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
</div>
</body>

</html>

<div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header estiloModalHeader">
                <h5 class="modal-title" id="Label">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body estiloModalBody">
                <p>¿Esta seguro que desea eliminar la categoria?</p>
            </div>
            <div class="modal-footer estiloModalBody">
                <form action="../controller/productoServicioController.php" method="GET">
                    <input type="text" name="idCategoria" id="eliminarCategoria" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarCategoria"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'linkjs.php'; ?>
<?php require_once 'footer.php'; ?>