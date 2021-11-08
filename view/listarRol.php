<?php require_once 'headpagina.php'; ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header cardHeader">
            <h4>Mostrar Roles</h4>
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
                        <th>Nombre Rol</th>
                        <th><a class="btn btn-info" href="nuevorol.php"><i class="fas fa-plus-square"></i> Nuevo Rol</a></th>
                    </tr>
                </thead>
                <tbody id="listarRol">

                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

</html>
 
<?php require_once 'footer.php'; ?>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/eliminar.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/listarrol.min.js"></script>

<!-- Modal -->
<div class="modal fade" id="eliminarFormulario2" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header estiloModalHeader">
                <h5 class="modal-title" id="Label">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body estiloModalBody">
                <p>¿Esta seguro que desea eliminar el rol?</p>
            </div>
            <div class="modal-footer estiloModalBody">
                <form action="../controller/gestioncontroller.php" method="GET">
                    <input type="text" name="idRol" id="eliminarRol" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarRol"><i class="fas fa-trash-alt"></i>Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>