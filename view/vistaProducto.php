<?php require_once 'headproducto.php'; ?>

<div class="row">
  <div class="col col-md-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb estilo">
        <li class="breadcrumb-item"><a href="paginaprincipalcliente.php">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Productos</li>
      </ol>
    </nav>
  </div>
</div>
<br>

<div class="row" style="margin-top: 15px;">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header cabeceraCard">
        <h5><i class="fa fa-search"></i> Buscar Producto: </h5>
      </div>
      <div class="card-body bodyCard">
        <div class="body search">
          <div class="input-group m-b-0">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-search"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Buscar producto.." name="buscar" id="buscar" onkeyup="vistaProducto()">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row clearfix">
  <div class="col-md-3">
    <div class="card">
      <div class="card-header cabeceraCard">
        <h5><i class="fas fa-funnel-dollar"></i> Filtros</h5>
      </div>
      <div class="card-body bodyCard">
        <table class="table table-hover">
          <tbody>
            <tr data-widget="expandable-table" aria-expanded="false">
              <td>
                <i class="fas fa-list-alt"></i> Categoria
              </td>
            </tr>

            <tr class="expandable-body">
              <td>
                <div class="p-0">
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <table class="table table-hover">
          <tbody>
            <tr data-widget="expandable-table" aria-expanded="false">
              <td>
                <i class="fas fa-dollar-sign"></i> Rango por precio:
              </td>
            </tr>

            <tr class="expandable-body">
              <td>
                <div class="p-0">
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                        <td><input type="number" class="form-control input" name="rangoMenor" id="rangoMenor" placeholder="Valor Minimo" onkeyup="vistaProducto()"></td>
                        <td><input type="number" class="form-control input" name="rangoMenor" id="rangoMayor" placeholder="Valor Maximo" onkeyup="vistaProducto()"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <table class="table table-hover">
          <tbody>
            <tr data-widget="expandable-table" aria-expanded="false">
              <td><i class="fas fa-tags"></i> Tags</td>
            </tr>

            <tr class="expandable-body">
              <td>
                <div class="p-0">
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-md-9">
    <div class="card">
      <div class="card-header cabeceraCard">
        <div class="row">
          <div class="col-md-5">
            <h5><i class="fas fa-boxes"></i> Lista de productos:<h5>
          </div>
          <div class="col-md-3">
            <select class="form-select desingSelect" name="vista" id="vista" onchange="vistaProducto()">
              <option value="" disabled>Selecciones una opción</option> -->
              <option value="preterminado" selected>Orden preterminado</option>
              <option value="asc">Nombre A-Z</option>
              <option value="des">Nombre Z-A</option>
              <option value="menor">Menor precio</option>
              <option value="mayor">Mayor precio</option>
            </select>
          </div>

          <div class="col col-md-4">
            <div class="card-tools">
              <ul class="pagination pagination-sm contenedorUL" id="contenedorUL">

              </ul>
            </div>
          </div>
        </div>

      </div>

      <div class="card-body bodyCard">
        <div class="row" id="listaProducto">

        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <footer class="piePagina">
      <h7 class="piePagina">"Estilo y confianza te brinda Anyeale"</h7> <small>Aleja(2021)</small>
    </footer>
  </div>
</div>
<br>
</div>
</body>
<?php require_once 'linkfooter.php'; ?>
<?php require_once 'linkjs.php'; ?>

</html>