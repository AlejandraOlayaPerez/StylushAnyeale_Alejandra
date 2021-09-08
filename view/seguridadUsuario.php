<div class="row">
    <div class="col-md-6">
        <div class="card card-primary" style="background-color: rgba(255, 255, 204, 255);">
            <div class="card-header" style="background-color: rgb(249, 201, 242);">
                <label class="card-title" style="-webkit-text-fill-color: black;">Cambio Contraseña</label>
            </div>
            <form id="formulario2" action="../controller/usuarioController.php" method="POST">
                <div class="card-body">
                    <input type="text" name="funcion" value="actualizarContrasena" style="display: none;">
                    <input type="text" name="idUser" value="<?php echo $_SESSION['idUser']; ?>" style="display: none;">
                    <div class="form-group">
                        <label for="">Contraseña Actual</label>
                        <input type="password" class="form-control" id="contrasenaActual" name="contrasenaActual" onchange="validarCampo(this);" minlength="5" maxlength="15" required>
                        <span id="contrasenaActualSpan"></span>
                    </div>

                    <div class="form-group">
                        <label for="">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="contrasenaNueva" name="contrasenaNueva" onchange="validarCampo(this);" minlength="5" maxlength="15" required>
                        <span id="contrasenaNuevaSpan"></span>
                    </div>

                    <div class="form-group">
                        <label for="">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="confirmarContrasena" name="confirmarContrasena" onchange="validarCampo(this);" minlength="5" maxlength="15" required>
                        <span id="confirmarContrasenaSpan"></span>
                    </div>
                </div>
                <div class="card-footer" style="background-color: rgb(249, 201, 242);">
                    <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="fas fa-edit"></i>Actualizar Contraseña</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
  function validarPaginaFinal() {
    // evento.preventDefault();
    var valido = true;
    // agregar el id de cada campo de la página para poder validar
    var campos = ["contrasenaActual","contrasenaNueva", "confirmarContrasena"];
    campos.forEach(element => {
      var campo = document.getElementById(element);
      if (!validarCampo(campo))
        valido = false;
    });
    if (valido)
      document.getElementById('formulario2').submit();
  }
</script>