<?php require_once 'headpagina.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header cardHeader">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group m-b-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="number" class="form-control" placeholder="Buscar codigo Factura.." data-bs-toggle="tooltip" data-bs-placement="right" title="Busca por el codigo de la factura" value="" id="factura" onkeyup="consultarfactura()">
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
            </div>

            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table colorestabla">
                        <thead>
                            <tr class="estiloTr">
                                <th>Codigo</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="listarFactura">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table colorestabla">
                        <thead>
                            <tr class="estiloTr">
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Activas</td>
                                <td><a href="estadosfactura.php?vista=activas"><i class="fas fa-angle-double-right"></i></a></td>
                            </tr>
                            <tr>
                                <td>Pendiente</td>
                                <td><a href="estadosfactura.php?vista=pendiente"><i class="fas fa-angle-double-right"></i></a></td>
                            </tr>
                            <tr>
                                <td>Pago</td>
                                <td><a href="estadosfactura.php?vista=pago"><i class="fas fa-angle-double-right"></i></a></td>
                            </tr>
                            <tr>
                                <td>Cancelada</td>
                                <td><a href="estadosfactura.php?vista=canceladas"><i class="fas fa-angle-double-right"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

<?php require_once 'footer.php'; ?>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/eliminar.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/listarfactura.js"></script>


<div class="modal fade" id="validarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header estiloModalHeader">
                <h5 class="modal-title" id="Label">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body estiloModalBody">
                <p>¿Desea validar la factura?</p>
            </div>
            <div class="modal-footer estiloModalBody">
                <form action="../controller/productoServicioController.php" method="GET">
                    <input type="text" name="idFactura" id="validar" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="funcion" value="validarFactura"><i class="fas fa-check-circle"></i> Validar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header estiloModalHeader">
                <h5 class="modal-title" id="Label">Cancelar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body estiloModalBody">
                <p>¿Esta seguro que desea cancelar la factura?</p>
            </div>
            <div class="modal-footer estiloModalBody">
                <form action="../controller/productoServicioController.php" method="GET">
                    <input type="text" name="idFactura" id="cancelar" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="cancelarFactura"><i class="fas fa-ban"></i> Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>