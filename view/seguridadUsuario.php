<div class="row" style="margin: 20px;">
    <div class="col-md-12">

        <form id="formulario2" action="../controller/usuariocontroller.php" method="POST">
            <input type="text" name="funcion" value="actualizarContrasena" style="display: none;">
            <input type="text" name="idUser" value="<?php echo $_SESSION['idUser']; ?>" style="display: none;">
            <div class="form-group">
                <label for="">Contraseña Actual</label>
                <input type="password" class="form-control" autocomplete="off" id="contrasenaActual" name="contrasenaActual" onchange="validarCampo(this);" minlength="5" maxlength="15" required>
                <span id="contrasenaActualSpan"></span>
            </div>

            <div class="form-group">
                <label for="">Nueva Contraseña</label>
                <input type="password" class="form-control" autocomplete="off" id="contrasenaNueva" name="contrasenaNueva" onchange="validarCampo(this);" minlength="5" maxlength="15" required>
                <span id="contrasenaNuevaSpan"></span>
            </div>

            <div class="form-group">
                <label for="">Confirmar Contraseña</label>
                <input type="password" class="form-control" autocomplete="off" id="confirmarContrasena" name="confirmarContrasena" autocomplete="false" onchange="validarCampo(this);" minlength="5" maxlength="15" required>
                <span id="confirmarContrasenaSpan"></span>
            </div>

            <button type="button" class="btn btn-success float-right" onclick="validarPaginaFinal();"><i class="fas fa-edit"></i>Actualizar Contraseña</button>

        </form>
    </div>
</div>


<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/validaciones.min.js"></script>

<script>
    function validarPaginaFinal() {
        // evento.preventDefault();
        var valido = true;
        // agregar el id de cada campo de la página para poder validar
        var campos = ["contrasenaActual", "contrasenaNueva", "confirmarContrasena"];
        campos.forEach(element => {
            var campo = document.getElementById(element);
            if (!validarCampo(campo))
                valido = false;
        });
        if (valido)
            document.getElementById('formulario2').submit();
    }
</script>