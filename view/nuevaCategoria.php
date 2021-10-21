<?php
require_once 'headpagina.php';
require_once '../model/categoria.php';

$oCategoria = new categoria();
?>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header cardHeader">
                <label class="card-title" style="-webkit-text-fill-color: black;">Nueva Categoria</label>
            </div>
            <form action="../controller/productoserviciocontroller.php" method="GET" id="formUsuario">
                <input type="text" name="funcion" value="nuevaCategoria" style="display: none;">
                <div class="card-body cardBody">
                    <div class="row">
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" class="form-label">Nueva categoria</label>
                            <input class="form-control" type="text" id="categoria" name="nombreCategoria" placeholder="Categoria" onchange="validarCampo(this);" required maxlength="50" minlength="2">
                            <span id="categoriaSpan"></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer cardFooter">
                    <a href="tags.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                    <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="far fa-save"></i> Registrar Categoria</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php require_once 'footer.php'; ?>
<?php require_once 'linkjs.php'; ?>

<script>
    function validarPaginaFinal() {
        // evento.preventDefault();
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var campos = ["categoria"];
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