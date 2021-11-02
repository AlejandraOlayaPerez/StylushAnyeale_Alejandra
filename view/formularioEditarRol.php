<?php
require_once 'headpagina.php';
require_once '../controller/gestioncontroller.php';

$oGestionController = new gestioncontroller();
$oRol = $oGestionController->consultarRolId($_GET['idRol']); //la consultaRolId retorna la instancia completa del rol, la esta almacenando en la variable $oRol
?>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header cardHeaderFondo">
                <label class="card-title">Editar Rol</label>
            </div>

            <form id="formUsuario" action="../controller/gestioncontroller.php" method="GET">
                <input type="text" name="funcion" value="actualizarRol" style="display: none;">
                <div class="card-body cardBody">
                    <input type="text" name="idRol" value="<?php echo $oRol->idRol; ?>" style="display:none;">
                    <div class="row">
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" class="form-label">Nombre_Rol<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="nombreRol" name="nombreRol" placeholder="Nombre del Rol" value="<?php echo $oRol->nombreRol ?>" required maxlength="50" minlength="2" onchange="validarCampo(this)">
                        </div>
                    </div>
                    <span id="nombreRolSpan"></span>
                </div>
                <div class="card-footer cardBody">
                    <a href="listarrol.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                    <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="fas fa-edit"></i>Actualizar Rol</button>
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
        var campos = ["nombreRol"];
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