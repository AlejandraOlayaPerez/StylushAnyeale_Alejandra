<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/all.min.css" rel="stylesheet">
  <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/carousel.css" rel="stylesheet">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/ionicons.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/css-font.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/productos.css" type="text/css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <link rel="shortcut icon" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" type="image/x-icon">
  <title>Stylush Anyeale</title>
</head>

<body>
  <div class="container">
    <div class="row clearfix">
      <div class="col-md-3">
        <div class="card">
          <div class="body search">
            <div class="input-group m-b-0">
              <p>Categoria</p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="header">
            <h2>Etiquetas</h2>
          </div>
          <div class="body widget">
            <ul class="list-unstyled categories-clouds m-b-0">
              <li><a href="javascript:void(0);">eCommerce</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <?php
        require_once '../controller/productoServicioController.php';
        $oProductoServicioController = new productoServicioController();
        $consulta = $oProductoServicioController->vistaProducto();
        foreach ($consulta as $registro) {
        ?>
          <div class="card single_post">
            <div class="body">
              <div class="img-post">
                <img class="d-block img-fluid" src="../<?php echo $registro['fotoProducto']; ?>" alt="First slide">
              </div>
              <h3><a href="blog-details.html"><?php echo $registro['nombreProducto']; ?></a></h3>
              <p><?php echo $registro['descripcionProducto']; ?></p>
              <p>Precio: $</p>
            </div>
            <div class="footer">
              <div class="actions">
                <a href="detalleProducto.php?idProducto=<?php echo $registro['IdProducto']; ?>" class="btn btn-info">Detalle</a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="body search">
            <div class="input-group m-b-0">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-search"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Buscar producto.." name="buscaProducto" id="buscaProducto" onkeyup="buscarProducto()">
            </div>
          </div>
        </div>
        <div class="card">
          <div class="body card">
            <p>Organizar vista por:</p>
            <select class="form-select" name="lista" id="lista">
              <option value="" selected>Selecciones una opción</option>
              <option>Orden preterminado</option>
              <option>Menor precio</option>
              <option>Mayor precio</option>
            </select>
          </div>
        </div>
        <div class="card">
          <div class="body card">
            <h3>Rango por precio: </h3><br>
            <div class="row">
              <div class="col-md-6">
                <input type="number" class="form-control" name="rangoMenor" id="rangoMenor" placeholder="Valor Minimo">
              </div>
              <div class="col-md-6">
                <input type="number" class="form-control" name="rangoMenor" id="rangoMenor" placeholder="Valor Maximo">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>