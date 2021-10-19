<?php
require_once 'headPagina.php';
require_once '../controller/pedidoController.php';

$idEmpresa = $_GET['idEmpresa'];
$oPedidoController = new pedidoController();
$oEmpresa = $oPedidoController->consultarEmpresaId($idEmpresa);
?>

<body>
    <div class="container-fluid">
        <div class="card cardHeader">
            <div class="card-header">
                <label class="card-title" style="-webkit-text-fill-color: black;">Editar Empresa</label>
            </div>
            <form action="../controller/pedidoController.php" method="GET" id="formUsuario">
                <input type="text" name="funcion" value="actualizarEmpresa" style="display: none;">
                <input type="text" name="idEmpresa" value="<?php echo $_GET['idEmpresa']; ?>" style="display: none;">
                <div class="card-body">
                    <div class="row">
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="">Nit</label>
                            <input type="text" class="form-control" id="Nit" name="Nit" placeholder="NIT Empresa" value="<?php echo $oEmpresa->Nit; ?>" onchange="validarCampo(this);" required maxlength="10" minlength="2">
                            <span id="NitSpan"></span>
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="">Nombre Empresa</label>
                            <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" placeholder="Nombre Empresa" value="<?php echo $oEmpresa->nombreEmpresa; ?>" onchange="validarCampo(this);" required maxlength="50" minlength="2">
                            <span id="nombreEmpresaSpan"></span>
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Escribe una direccion" value="<?php echo $oEmpresa->direccion; ?>" onchange="validarCampo(this);" required maxlength="100" minlength="2">
                            <span id="direccionSpan"></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer cardFooter">
                    <a href="listarEmpresa.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                    <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="far fa-save"></i> Registrar Empresa</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php require_once 'linkjs.php'; ?>

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