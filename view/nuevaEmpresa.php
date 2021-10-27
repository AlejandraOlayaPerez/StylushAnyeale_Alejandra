<?php require_once 'headpagina.php'; ?>

<body>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header cardHeaderFondo">
                <label class="card-title" style="-webkit-text-fill-color: black;">Nueva Empresa</label>
            </div>
            <form action="../controller/pedidocontroller.php" method="GET" id="formUsuario">
                <input type="text" name="funcion" value="nuevaEmpresa" style="display: none;">
                <div class="card-body cardBody">
                    <div class="row">
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" style="-webkit-text-fill-color: black;">Nit</label>
                            <input type="text" class="form-control" id="Nit" name="Nit" placeholder="NIT" onchange="validarCampo(this);" required maxlength="10" minlength="2">
                            <span id="NitSpan"></span>
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" style="-webkit-text-fill-color: black;">Nombre Empresa</label>
                            <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" placeholder="Nombre Empresa" onchange="validarCampo(this);" required maxlength="50" minlength="2">
                            <span id="nombreEmpresaSpan"></span>
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" style="-webkit-text-fill-color: black;">dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" onchange="validarCampo(this);" required maxlength="100" minlength="2">
                            <span id="direccionSpan"></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer cardBody">
                    <?php
                    if (isset($_GET['pedido'])) {
                    ?>
                        <a href="nuevopedido.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Volver al pedido</a>
                    <?php
                    } else {
                    ?>
                        <a href="listarempresa.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                    <?php } ?>
                    <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="far fa-save"></i> Registrar Empresa</button>
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
        var campos = ["Nit", "nombreEmpresa", "direccion"];
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