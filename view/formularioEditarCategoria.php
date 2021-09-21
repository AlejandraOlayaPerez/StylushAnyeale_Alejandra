<?php
require_once 'headPagina.php';
require_once '../model/categoria.php';
require_once '../controller/productoServicioController.php';

$oProductoServicioController = new productoServicioController();
$oCategoria = $oProductoServicioController->consultarCategoria($_GET['idCategoria']);
?>

<body>
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header" style="background-color: rgb(249, 201, 242);">
                <label class="card-title" style="-webkit-text-fill-color: black;">Editar Categoria</label>
            </div>
            <form action="../controller/productoServicioController.php" method="GET" id="formUsuario">
            <input type="text" name="funcion" value="actualizarCategoria" style="display: none;">
                <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                    <input type="text" name="idCategoria" value="<?php echo $_GET['idCategoria']; ?>" style="display: none;">

                    <div class="row" style="margin: 5px;">

                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="">Categoria</label>
                            <input type="text" class="form-control" id="categoria" name="nombreCategoria" placeholder="Categoria" value="<?php echo $oCategoria->nombreCategoria; ?>">
                            <span id="categoriaSpan"></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                    <a href="categoria.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                    <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="far fa-save"></i> Actualizar Categoria</button>
                </div>
            </form>
        </div>

    </div>
</body>

</html>

<?php require_once 'footer.php'; ?>
<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/validaciones.js"></script>

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