<?php
require_once 'headpagina.php';
require_once '../model/modulo.php';

$oModulo = new modulo();
?>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header cardHeader">
                <h4>Mostrar Modulos</h4>
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
                            <th>Nombre_Modulo</th>
                            <th><a class="btn btn-info" href="nuevomodulo.php"><i class="fas fa-plus-square"></i> Nuevo Modulo</a></th>
                        </tr>
                    </thead>
                    <tbody id="listarModulo">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<?php require_once 'footer.php'; ?>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/eliminar.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/listarmodulo.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>

<!-- Modal -->
<div class="modal fade" id="eliminarFormulario3" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header estiloModalHeader">
                <h5 class="modal-title" id="Label">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body estiloModalBody">
                <p>¿Esta seguro que desea eliminar el modulo?</p>
            </div>
            <div class="modal-footer estiloModalBody">
                <form action="../controller/gestioncontroller.php" method="GET">
                    <input type="text" name="idModulo" id="eliminarModulo" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarModulo"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>