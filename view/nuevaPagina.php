<?php
require_once 'headpagina.php';
?>

<body>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header cardHeaderFondo">
        <label class="card-title">Nueva Pagina</label>
      </div>

      <form action="../controller/gestioncontroller.php" method="GET" id="formUsuario">
      <input type="text" name="idModulo" value="<?php echo $_GET['idModulo']; ?>" style="display: none;">
      <input type="text" name="funcion" value="crearPagina" style="display: none;">
        <div class="card-body cardBody">
          <div class="row" style="margin: 5px;">
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="" class="form-label">Nombre Pagina<span class="text-danger">*</span></label>
              <input type="text" name="idModulo" value="<?php echo $_GET['idModulo']; ?>" style="display:none;">
              <input type="text" class="form-control" id="nombrePagina" name="nombrePagina" placeholder="Nombre de la pagina" onchange="validarCampo(this);" minlength="5" maxlength="50" required>
              <span id="nombrePaginaSpan"></span>
            </div>
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="" class="form-label">Enlace Pagina<span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="enlace" name="enlace" placeholder="enlace de la pagina" onchange="validarCampo(this);" minlength="5" maxlength="100" required>
              <span id="enlaceSpan"></span>
            </div>
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="" class="form-label">¿Se requiere inicio de sesion?<span class="text-danger">*</span></label>
              <select class="form-select" id="requireSession" name="requireSession" onchange="validarCampo(this);" required>
                <option value="" disabled selected>Selecciones una opción</option>
                <option value="true">SI</option>
                <option value="false">NO</option>
              </select>
              <span id="requireSessionSpan"></span>
            </div>
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="" class="form-label">¿Requiere vista menu?<span class="text-danger">*</span></label>
              <select class="form-select" id="menu" name="menu" onchange="validarCampo(this);" required>
                <option value="" disabled selected>Selecciones una opción</option>
                <option value="true">SI</option>
                <option value="false">NO</option>
              </select>
              <span id="menuSpan"></span>
            </div>
          </div>
        </div>
        <div class="card-footer cardBody">
          <a href="listarpagina.php?idModulo=<?php echo $_GET['idModulo']; ?>" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
          <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="fas fa-save"></i> Registrar Pagina</button>
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
    var campos = ["nombrePagina", "enlace", "requireSession", "menu"];
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