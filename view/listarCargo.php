<?php require_once 'headpagina.php'; ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header cardHeader">
            <h4>Mostrar Cargos</h4>
            <div class="card-tools">
                <ul class="pagination pagination-sm contenedorUL" id="contenedorUL">

                </ul>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table colorestabla">
                <thead>
                    <tr class="estiloTr">
                        <th>Cargo</th>
                        <th><a class="btn btn-info" href="nuevocargo.php"><i class="fas fa-plus-square"></i> Nuevo</a></th>
                    </tr>
                </thead>
                <tbody id="listarCargo">

                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

</html>

<?php require_once 'footer.php'; ?>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/listarcargo.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/eliminar.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>


<div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header estiloModalHeader">
                <h5 class="modal-title" id="Label">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body estiloModalBody">
                <p>¿Esta seguro que desea eliminar el cargo?</p>
            </div>
            <div class="modal-footer estiloModalBody">
                <form action="../controller/cargocontroller.php" method="GET">
                    <input type="text" name="idCargo" id="eliminarCargo" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarCargo"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>