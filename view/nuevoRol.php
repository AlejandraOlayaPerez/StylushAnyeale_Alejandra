<?php require_once 'headpagina.php'; ?>

<body>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header cardHeaderFondo">
        <label class="card-title">Nuevo Rol</label>
      </div>

      <form id="formUsuario" action="../controller/gestioncontroller.php" method="GET" novalidate>
        <div class="card-body cardBody">
          <input type="text" name="funcion" value="crearRol" style="display: none;">
          <div class="row">
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="" class="form-label" style="-webkit-text-fill-color: black;">Nombre Rol</label>
              <input class="form-control" type="text" id="nombreRol" name="nombreRol" placeholder="Nombre del Rol" required maxlength="50" minlength="2" onchange="validarCampo(this)">
              <span id="nombreRolSpan"></span>
            </div>
          </div>
        </div>
        <div class="card-footer cardBody">
          <a href="listarrol.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
          <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="far fa-save"></i> Registrar Rol</button>
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