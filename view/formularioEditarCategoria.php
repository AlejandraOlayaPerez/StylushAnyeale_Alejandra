<?php
require_once 'headpagina.php';
require_once '../model/categoria.php';
require_once '../controller/productoserviciocontroller.php';

$oProductoServicioController = new productoServicioController();
$oCategoria = $oProductoServicioController->consultarCategoria($_GET['idCategoria']);
?>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header cardHeader">
                <label class="card-title" style="-webkit-text-fill-color: black;">Editar Categoria</label>
            </div>
            <form action="../controller/productoserviciocontroller.php" method="GET" id="formUsuario">
                <input type="text" name="funcion" value="actualizarCategoria" style="display: none;">
                <div class="card-body cardBody">
                    <input type="text" name="idCategoria" value="<?php echo $_GET['idCategoria']; ?>" style="display: none;">
                    <div class="row">
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="">Categoria</label>
                            <input type="text" class="form-control" id="categoria" name="nombreCategoria" placeholder="Categoria" value="<?php echo $oCategoria->nombreCategoria; ?>" onchange="validarCampo(this);" required maxlength="50" minlength="2">
                            <span id="categoriaSpan"></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer cardFooter">
                    <a href="categoria.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                    <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="fas fa-edit"></i> Actualizar Categoria</button>
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