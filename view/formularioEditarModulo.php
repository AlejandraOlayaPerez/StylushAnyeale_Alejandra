<?php
require_once 'headpagina.php';
require_once '../controller/gestioncontroller.php';


$oGestionController = new gestionController();
$oModulo = $oGestionController->consultarModuloId($_GET['idModulo']);
?>

<div class="container-fluid">
  <div class="card">
    <div class="card-header cardHeaderFondo">
      <label class="card-title">Editar Modulo</label>
    </div>
    <form id="formUsuario" action="../controller/gestioncontroller.php" method="GET">
      <div class="card-body cardBody">
        <div class="row">
          <div class="col col-xl-4 col-md-6 col-12">
            <label for="">Nombre Modulo<span class="text-danger">*</span></label>
            <input type="text" name="funcion" value="actualizarModulo" style="display: none;">
            <input type="text" name="idModulo" value="<?php echo $oModulo->idModulo; ?>" style="display:none;">
            <input class="form-control" type="text" id="nombreModulo" name="nombreModulo" value="<?php echo $oModulo->nombreModulo; ?>" required onchange="validarCampo(this);" required maxlength="50" minlength="2">
            <span id="nombreModuloSpan"></span>
          </div>
          <div class="col col-xl-4 col-md-6 col-12">
            <label for="" class="form-label">Seleccione un icono<span class="text-danger">*</span></label>
            <select class="form-control fa" id="icono" name="icono" required onchange="validarCampo(this)">
              <option value="" selected>Seleccione una opción</option>
              <?php
              require_once '../controller/icono.php';
              $oIcono = new icono();
              $iconos = $oIcono->mostrarIcono();
              foreach ($iconos as $registro) {
              ?>
                <option class="fa" value="<?php echo $registro; ?>" <?php if($oModulo->icono==$registro){
                  echo "selected";
                } ?>>
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
        <a href="listarmodulo.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
        <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="fas fa-edit"></i> Actualizar Modulo</button>
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