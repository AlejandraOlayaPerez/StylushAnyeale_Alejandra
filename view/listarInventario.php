<?php require_once 'headPagina.php'; ?>

<body>
    <div class="container-fluid">

        <div class="card">
            <div class="card-header cardHeader">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Buscar por codigo producto.." data-bs-toggle="tooltip" data-bs-placement="right" title="Busca el codigo o nombre de un producto" value="" id="busquedaProductoCodigo" onkeyup="buscarProducto()">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Buscar por nombre producto.." data-bs-toggle="tooltip" data-bs-placement="right" title="Busca el codigo o nombre de un producto" value="" id="busquedaProductoNombre" onkeyup="buscarProducto()">
                        </div>
                    </div>

                    <div class="col-md-4">
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
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Valor Unitario</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="productosBusqueda">

                    </tbody>
                </table>
            </div>

        </div>

        <?php require_once 'linkjs.php'; ?>
        <?php require_once 'footer.php'; ?>


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
                            <input type="text" id="idProducto" name="idProducto" style="display: none;">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" name="funcion" value="actualizarCantidad">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>