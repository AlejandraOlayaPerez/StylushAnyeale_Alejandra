<?php
require_once 'headpagina.php';
?>
<div class="container-fluid">
  <div class="card">
    <div class="card-header cardHeaderFondo">
      <label class="card-title">Nuevo Modulo</label>
    </div>

    <form action="../controller/gestioncontroller.php" method="GET" id="formUsuario">
      <input type="text" name="funcion" value="crearModulo" style="display: none;">
      <div class="card-body cardBody">
        <div class="row">
          <div class="col col-xl-4 col-md-6 col-12">
            <label for="" class="form-label">Nombre Modulo<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nombreModulo" name="nombreModulo" placeholder="Nombre Modulo" onchange="validarCampo(this);" minlength="5" maxlength="50" required>
            <span id="nombreModuloSpan"></span>
          </div>
          <div class="col col-xl-4 col-md-6 col-12">
            <label for="" class="form-label">Seleccione un icono<span class="text-danger">*</span></label>
            <select class="form-control fa" id="icono" name="icono" required onchange="validarCampo(this)">
              <option value="" selected>Selecciones una opción</option>
              <?php
              require_once '../controller/icono.php';
              $oIcono = new icono();
              $iconos = $oIcono->mostrarIcono();
              foreach ($iconos as $registro) {
              ?>
                <option class="fa" value="<?php echo $registro; ?>">
                  <?php
                  echo $oIcono->descripcionIcono($registro);
                  ?>
                </option>
              <?php } ?>
            </select>
            <span id="iconoSpan"></span>
          </div>
        </div>
      </div>
      <div class="card-footer cardFooter">
        <a href="listarmodulo.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
        <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="far fa-save"></i> Registrar Modulo</button>
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
    var campos = ["nombreModulo", "icono"];
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