<?php
require_once 'headpagina.php';
require_once '../controller/gestioncontroller.php';

$oGestionController = new gestionController();
$oModulo = $oGestionController->consultarModuloId($_GET['idModulo']);
?>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header cardHeader">
                <h4>Paginas del modulo: <?php echo $oModulo->nombreModulo; ?></h4>
                <div class="card-tools">
                    <ul class="pagination pagination-sm contenedorUL" id="contenedorUL">

                    </ul>
                </div>
            </div>
        </div>

        <input type="text" id="idModulo" value="<?php echo $_GET['idModulo']; ?>" style="display: none;">

        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table colorestabla">
                    <thead>
                        <tr class="estiloTr">
                            <th>Nombre_Pagina</th>
                            <th>Enlace</th>
                            <th>¿Se requiere inicio de sesion?</th>
                            <th>¿Vista Menu?</th>
                            <th><a class="btn btn-info" href="nuevaPagina.php?idModulo=<?php echo $_GET['idModulo']; ?>"><i class="fas fa-plus-square"></i> Nuevo Pagina</a></th>
                        </tr>
                    </thead>
                    <tbody id="listarPagina">

                    </tbody>
                </table>
            </div>
        </div>
        <a href="listarmodulo.php?idModulo=<?php echo $_GET['idModulo']; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
    </div>

    <?php require_once 'footer.php'; ?>
    <script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/eliminar.min.js"></script>
    <script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/listarPagina.min.js"></script>
    <script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>


    <div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header estiloModalHeader">
                    <h5 class="modal-title" id="Label">Eliminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body estiloModalBody">
                    <p>¿Esta seguro que desea eliminar la pagina?</p>
                </div>
                <div class="modal-footer estiloModalBody">
                    <form action="../controller/gestionController.php" method="GET">
                        <input type="text" name="idPagina" id="eliminarPagina" style="display:none;">
                        <input type="text" name="idModulo" value="<?php echo $_GET['idModulo']; ?>" style="display:none;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger" name="funcion" value="eliminarPagina"><i class="fas fa-trash-alt"></i> Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>