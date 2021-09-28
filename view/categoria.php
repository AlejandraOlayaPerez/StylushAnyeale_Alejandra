<?php
require_once 'headPagina.php';
require_once '../model/categoria.php';

$oCategoria = new categoria();
?>
<div class="container-fluid">

    <?php
    require_once '../controller/mensajeController.php';

    if (isset($_GET['mensaje'])) {
        $oMensaje = new mensajes();
        echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
    }
    ?>


    <?php
    /*Isset si al variable page esta definida y su valor es difeente a nulo, si es nulo,
                el valor preterminado sera 1*/
    if (isset($_GET['page'])) $pagina = $_GET['page'];
    else $pagina = 1;

    $consulta = $oCategoria->listarCategoriaPaginacion($pagina);
    $numeroRegistro = $oCategoria->numRegistro;
    $numPagina = intval($numeroRegistro / 10); //intval, traera el resultado en Entero en caso de que sea decimal
    if (fmod($numeroRegistro, 10) > 0) $numPagina++; //fmod es el modulo, para conocer el residuo
    // echo $numPagina;
    ?>

    <div class="card border border-dark">
        <div class="card-header" style="background-color: rgb(249, 201, 242); font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;">
            <form action="" method="GET">
                <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600; margin-right: 10px;">Buscar Categoria:</label>
                <input type="text" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Busca una categoria" value="" id="categoriaBusqueda" onkeyup="buscarCategoria()">
            </form>
            <!--Paginacion-->
            <div class="card-tools">
                <ul class="pagination pagination-sm float-right border border-dark">
                    <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="categoria.php?page=1">&laquo;</a></li>
                    <?php
                    for ($i = 1; $i <= $numPagina; $i++) {
                    ?>
                        <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="categoria.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                    }
                    ?>
                    <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="categoria.php?page=<?php echo $numPagina; ?>">&raquo;</a></li>
                </ul>
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr style="background-color: rgb(249, 201, 242);">
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
            <div class="modal-header">
                <h5 class="modal-title" id="Label">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Esta seguro que desea eliminar la categoria?</p>
            </div>
            <div class="modal-footer">
                <form action="../controller/productoServicioController.php" method="GET">
                    <input type="text" name="idCategoria" id="eliminarCategoria" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarCategoria"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/anyealeJS/filtros.js"></script>
<script>
    buscarCategoria();
</script>
<?php require_once 'footer.php'; ?>