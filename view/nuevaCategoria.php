<?php
require_once 'headPagina.php';
require_once '../model/categoria.php';

$oCategoria = new categoria();
?>

<body>
    <div class="container-fluid">
        <?php
        require_once '../controller/mensajeController.php';

        if (isset($_GET['mensaje'])) {
            $oMensaje = new mensajes();
            echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
        }
        ?>
        <div class="card">
            <div class="card-header" style="background-color: rgb(249, 201, 242);">
                <label class="card-title" style="-webkit-text-fill-color: black;">NUEVA CATEGORIA</label>
            </div>
            <form action="../controller/productoServicioController.php" method="GET" id="formUsuario">
                <input type="text" name="funcion" value="nuevaCategoria" style="display: none;">
                <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                    <div class="row">
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" class="form-label">Categoria</label>
                            <input class="form-control" type="text" id="categoria" name="nombreCategoria" placeholder="Categoria" onchange="validarCampo(this);" required maxlength="50" minlength="2">
                            <span id="categoriaSpan"></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                    <a href="tags.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                    <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="far fa-save"></i> Registrar Categoria</button>
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