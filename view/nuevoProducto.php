<?php
require_once 'headpagina.php';
require_once '../model/producto.php';
$oProducto = new producto();
?>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card cardHeader">
          <div class="card-header">
            <label class="card-title">NUEVO PRODUCTO</label>
          </div>

          <form id="formulario" action="../controller/productoserviciocontroller.php" method="POST"
            enctype="multipart/form-data">
            <input type="text" name="funcion" value="crearProducto" style="display: none;">
            <input type="text" name="idUser" value="<?php echo $_SESSION['idUser']; ?>" style="display: none;">
            <div class="card-body p-0">
              <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                  <div class="step" data-target="#logins-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                      id="logins-part-trigger">
                      <span class="bs-stepper-circle">1</span>
                      <span class="bs-stepper-label">Imagen Producto</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#information-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part"
                      id="information-part-trigger">
                      <span class="bs-stepper-circle">2</span>
                      <span class="bs-stepper-label">Producto</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#clave-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="clave-part"
                      id="clave-part-trigger">
                      <span class="bs-stepper-circle">3</span>
                      <span class="bs-stepper-label">Tags</span>
                    </button>
                  </div>
                </div>

                <div class="bs-stepper-content">

                  <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">

                    <div class="row" style="margin: 5px;">
                      <div class="col col-md-12">
                        <div class="col col-md-6">
                          <label for="">Fotos</label>
                          <input name="fotos[]" id="fotos" type="file" class="form-control" multiple accept="image/*"
                            onchange="validarCampo(this);" required>
                          <span id="fotosSpan"></span>
                        </div>
                      </div>
                    </div>
                    <br>
                    <button style="margin: 5px;" class="btn btn-info float-right" type="button"
                      onclick="validarPagina1();"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                    <a href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/listarProducto.php" class="btn btn-dark">
                      <i class="fas fa-arrow-circle-left"></i> Atras</a>
                    <br>
                  </div>

                  <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="card-body">
                      <div class="row" style="margin: 5px;">
                        <div class="col col-xl-4 col-md-6 col-12">
                          <label for="" class="form-label">Codigo Producto</label>
                          <input class="form-control" type="text" id="codigoProducto" name="codigoProducto"
                            placeholder="Codigo Producto" onchange="validarCampo(this);" required maxlength="20">
                          <span id="codigoProductoSpan"></span>
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                          <label for="" class="form-label">Producto</label>
                          <input class="form-control" type="text" id="nombreProducto" name="nombreProducto"
                            placeholder="Nombre Producto" onchange="validarCampo(this);" required maxlength="50"
                            minlength="2">
                          <span id="nombreProductoSpan"></span>
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                          <label for="" class="form-label">Descripcion Producto</label>
                          <textarea class="form-control" rows="3" type="text" id="descripcion" name="descripcion"
                            placeholder="Describe el producto" onchange="validarCampo(this);" required minlength="10"
                            maxlength="500"></textarea>
                          <span id="descripcionSpan"></span>
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                          <label for="" class="form-label">Caracteristicas</label>
                          <textarea class="form-control " rows="3" type="text" id="caracteristicas"
                            name="caracteristicas" placeholder="Describe las caracteristicas del producto"
                            onchange="validarCampo(this);" required minlength="10" maxlength="500"></textarea>
                          <span id="caracteristicasSpan"></span>
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                          <label for="" class="form-label">Valor Unitario</label>
                          <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                            <input class="form-control" type="text" id="valorUnitario" name="valorUnitario"
                              placeholder="Valor Unitario" minlength="1" maxlength="1000"
                              onkeyup="separadorMilesCuadroTexto(this);" required>
                          </div>
                          <span id="valorUnitarioSpan"></span>
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                          <label for="" class="form-label">Costo de compra</label>
                          <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                            <input class="form-control" type="text" id="costo" name="costo" placeholder="Costo"
                              minlength="1" maxlength="1000" onkeyup="separadorMilesCuadroTexto(this);" required>
                          </div>
                          <span id="costoSpan"></span>
                        </div>
                      </div>
                    </div>
                    <br>
                    <button style="margin: 5px;" class="btn btn-info float-right" type="button"
                      onclick="validarPagina2();"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                    <button style="margin: 5px;" class="btn btn-info" type="button" onclick="stepper.previous()"><i
                        class="fas fa-arrow-circle-left"></i> Anterior</button>
                    <br>
                  </div>

                  <div id="clave-part" class="content" role="tabpanel" aria-labelledby="clave-part-trigger">
                    <div class="row">
                      <?php
                      require_once '../model/tags.php';
                      $oTags = new tags();
                      $result = $oTags->tags();
                      ?>
                      <div class="col col-xl-4 col-md-6 col-12">
                        <div class="form-group">
                          <label for="" class="form-label">Etiquetas (Tags)</label>
                          <select class="select2" multiple="multiple" data-placeholder="Seleccione las etiquetas"
                            style="width: 100%; font-family: 'Times New Roman', Times, serif;" id="tags" name="tags[]"
                            onchange="validarCampo(this);" required>
                            <option disabled>Seleccione las etiquetas</option>
                            <?php
                            foreach ($result as $registro) {
                            ?>
                            <option value="<?php echo $registro['idTags']; ?>"><?php echo $registro['tags']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <span id="tagsSpan"></span>
                        </div>
                      </div>
                      <div class="col col-xl-4 col-md-6 col-12">
                        <?php
                        require_once '../model/categoria.php';
                        $oCategoria = new categoria();
                        $consulta = $oCategoria->categoria();
                        ?>
                        <label for="" class="form-label">Categoria</label>
                        <select class="form-control" id="idCategoria" name="idCategoria" onchange="validarCampo(this);"
                          required>
                          <option value="" selected>Selecciones una opción</option>
                          <?php foreach ($consulta as $registro) {
                          ?>
                          <option value="<?php echo $registro['idCategoria']; ?>">
                            <?php echo $registro['nombreCategoria']; ?></option>
                          <?php } ?>
                        </select>
                        <span id="idCategoriaSpan"></span>
                      </div>

                    </div>
                    <br>
                    <button style="margin: 5px;" class="btn btn-info" type="button" onclick="stepper.previous()"><i
                        class="fas fa-arrow-circle-left"></i> Anterior</button>
                    <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i
                        class="far fa-save"></i> Registrar Producto</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<?php require_once 'linkjs.php'; ?>
<?php require_once 'footer.php'; ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
</script>

<script>
  //crear una función con los campos de cada pagina
  function validarPagina1() {
    var valido = true;
    // agregar el id de cada campo de la página para poder validar
    var campos = ["fotos"];
    campos.forEach(element => {
      var campo = document.getElementById(element);
      if (!validarCampo(campo))
        valido = false;
    });
    if (valido)
      stepper.next();
  }
  //crear una función con los campos de cada pagina
  function validarPagina2() {
    var valido = true;
    // agregar el id de cada campo de la página para poder validar
    var campos = ["codigoProducto", "nombreProducto", "descripcion", "caracteristicas", "valorUnitario", "costo"];
    campos.forEach(element => {
      var campo = document.getElementById(element);
      if (!validarCampo(campo))
        valido = false;
    });
    if (valido)
      stepper.next();
  }

  function validarPaginaFinal() {
    // evento.preventDefault();
    var valido = true;
    // agregar el id de cada campo de la página para poder validar
    var campos = ["tags", "idCategoria"];
    campos.forEach(element => {
      var campo = document.getElementById(element);
      if (!validarCampo(campo))
        valido = false;
    });
    if (valido) {
      document.getElementById('formulario').submit();
    }
  }
</script>