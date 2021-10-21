<?php
require_once 'headPagina.php';
require_once 'linkcss.php';
?>

<body>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header cardHeaderFondo">
        <label class="card-title">Nuevo Cargo</label>
      </div>
      <form action="../controller/cargocontroller.php" method="GET" id="formUsuario">
        <div class="card-body cardBody">
          <input type="text" name="funcion" value="nuevoCargo" style="display: none;">
          <div class="row">
            <?php
            require_once '../model/servicio.php';
            $oServicio = new servicio();
            $result = $oServicio->mostrarServicio();
            ?>
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="" style="-webkit-text-fill-color: black;">Servicio</label>
              <select select class="form-select" id="idServicio" name="idServicio">
                <option value="" disabled selected>Selecciones una opción</option>
                <?php
                foreach ($result as $registro) {
                ?>
                  <option value="<?php echo $registro['IdServicio']; ?>"><?php echo $registro['nombreServicio']; ?></option>
                <?php
                }
                ?>
              </select>
              <span id="idServicioSpan"></span>
            </div>
          </div>

        </div>
        <div class="card-footer cardBody">
          <a href="listarcargo.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
          <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="far fa-save"></i> Registrar Cargo</button>
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
    var campos = ["idServicio"];
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