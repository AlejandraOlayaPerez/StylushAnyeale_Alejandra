<?php
require_once 'headpagina.php';
require_once '../model/tags.php';
require_once '../controller/productoserviciocontroller.php';

$oProductoServicioController = new productoServicioController();
$oTags = $oProductoServicioController->consultarTags($_GET['idTags']);
?>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header cardHeaderFondo">
                <label class="card-title" style="-webkit-text-fill-color: black;">Editar Tag</label>
            </div>
            <form action="../controller/productoserviciocontroller.php" method="GET" id="formUsuario">
                <input type="text" name="funcion" value="actualizarTags" style="display: none;">
                <div class="card-body cardBody">
                    <input type="text" name="idTags" value="<?php echo $_GET['idTags']; ?>" style="display: none;">

                    <div class="row">
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" >Tags<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="tags" name="tags" placeholder="Tags" value="<?php echo $oTags->tags; ?>" onchange="validarCampo(this);" minlength="2" maxlength="50" required>
                            <span id="tagsSpan"></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer cardBody">
                    <a href="tags.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                    <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="fas fa-edit"></i> Actualizar Tag</button>
                </div>
            </form>
        </div>

    </div>
</body>

</html>

<?php require_once 'footer.php'; ?>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/validaciones.min.js"></script>

<script>
    function validarPaginaFinal() {
        // evento.preventDefault();
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var campos = ["tags"];
        campos.forEach(element => {
            var campo = document.getElementById(element);
            if (!validarCampo(campo))
                valido = false;
        });
        if (valido) {
            document.getElementById('formUsuario').submit();
        }
    }
</script>