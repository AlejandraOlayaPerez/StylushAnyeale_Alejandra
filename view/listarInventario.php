<?php
require_once 'headPagina.php';

date_default_timezone_set('America/Bogota');
$fechaActual = Date("Y-m-d");
?>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-0" style="background-color: rgba(255, 255, 204, 255);">
                <div class="row">
                    <div class="col-md-12">
                        <label for="" class="form-label">Buscar: </label>
                        <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Buscar producto.." style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Busca el codigo o nombre de un producto" value="" id="busquedaProducto" onkeyup="buscarProducto()">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr style="background-color: rgb(249, 201, 242);">
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

    <script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/eliminar.js"></script>
    <script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/inventario.js"></script>
    <script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/validaciones.js"></script>
    <script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/general.js"></script>
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
                        <input type="text" id="idProducto" name="idProducto">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="funcion" value="actualizarCantidad">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>