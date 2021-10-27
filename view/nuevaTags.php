<?php
require_once 'headpagina.php';
require_once '../model/tags.php';

$oTags = new tags();
?>

<body>
    <div class="container-fluid">
        <div class="card">
        <div class="card-header cardHeaderFondo">
                <label class="card-title" style="-webkit-text-fill-color: black;">Nueva Tags</label>
            </div>
            <form action="../controller/productoserviciocontroller.php" method="GET" id="formUsuario">
                <input type="text" name="funcion" value="nuevaTags" style="display: none;">
                <div class="card-body cardBody">
                    <div class="row">
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" class="form-label" style="-webkit-text-fill-color: black;">Tags</label>
                            <input class="form-control" type="text" id="tags" name="palabraClave" placeholder="Tags" onchange="validarCampo(this);" required maxlength="50" minlength="2">
                            <span id="tagsSpan"></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer cardBody">
                    <a href="tags.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                    <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="far fa-save"></i> Registrar Tags</button>
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