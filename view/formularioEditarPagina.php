<?php
require_once 'headpagina.php';
require_once '../controller/gestioncontroller.php';

$oGestionController = new gestionController();
$oPagina = $oGestionController->consultarPaginaId($_GET['idPagina']);

?>

<body>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header cardHeaderFondo">
        <label class="card-title">Editar Pagina</label>
      </div>

      <form action="../controller/gestioncontroller.php" method="GET" id="formUsuario">
        <input type="text" name="funcion" value="actualizarPagina" style="display: none;">
        <input type="text" name="idModulo" value="<?php echo $_GET['idModulo']; ?>" style="display: none;">
        <input type="text" name="idPagina" value="<?php echo $_GET['idPagina']; ?>" style="display: none;">
        <div class="card-body cardBody">
          <div class="row">
            <div class="col col-xl-4 col-md-8 col-12">
              <label for="" style="-webkit-text-fill-color: black;">Nombre Pagina</label>
              <input type="text" name="idPagina" value="<?php echo $oPagina->idPagina; ?>" style="display:none;">
              <input type="text" name="idModulo" value="<?php echo $oPagina->idModulo; ?>" style="display:none;">
              <input class="form-control" type="text" id="nombrePagina" name="nombrePagina" value="<?php echo $oPagina->nombrePagina; ?>" required>
              <span id="nombrePaginaSpan"></span>
            </div>
            <div class="col col-xl-4 col-md-8 col-12">
              <label for="" style="-webkit-text-fill-color: black;">Enlace Pagina</label>
              <input class="form-control" type="text" id="enlace" name="enlace" value="<?php echo $oPagina->enlace; ?>" required maxlength="50" minlength="2" onchange="validarCampo(this)">
              <span id="enlaceSpan"></span>
            </div>
            <div class="col col-xl-4 col-md-8 col-12">
              <label for="" class="form-label" style="-webkit-text-fill-color: black;">¿Se requiere inicio de sesion?</label>
              <select class="form-select" id="requireSession" name="requireSession" required onchange="validarCampo(this)">
                <option value="" disabled selected>Selecciones una opción</option>
                <option value="true" <?php if ($oPagina->requireSession) {
                                        echo "selected";
                                      } ?>>SI</option>
                <option value="false" <?php if (!$oPagina->requireSession) {
                                        echo "selected";
                                      } ?>>NO</option>
              </select>
              <span id="requireSessionSpan"></span>
            </div>
            <div class="col col-xl-4 col-md-8 col-12">
              <label for="" class="form-label" style="-webkit-text-fill-color: black;">¿Vista Menu?</label>
              <select class="form-select" id="menu" name="menu" required onchange="validarCampo(this)">
                <option value="" disabled selected>Selecciones una opción</option>
                <option value="true" <?php if ($oPagina->menu) {
                                        echo "selected";
                                      } ?>>SI</option>
                <option value="false" <?php if (!$oPagina->menu) {
                                        echo "selected";
                                      } ?>>NO</option>
              </select>
              <span id="menuSpan"></span>
            </div>
          </div>
        </div>
        <div class="card-footer cardFooter">
          <a href="listarPagina.php?idModulo=<?php echo $oPagina->idModulo; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
          <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="fas fa-edit"></i> Actualizar Pagina</button>
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
    var campos = ["nombrePagina", "requireSession", "enlace", "menu"];
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