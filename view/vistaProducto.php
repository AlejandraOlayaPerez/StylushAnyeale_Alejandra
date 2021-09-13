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
      <div class="col-lg-8 col-md-12 left-box">
        <?php
        require_once '../controller/productoServicioController.php';
        $oProductoServicioController = new productoServicioController();
        $consulta = $oProductoServicioController->vistaProducto();
        foreach ($consulta as $registro) {
        ?>
          <div class="card single_post">
            <div class="body">
              <div class="img-post">
                <img class="d-block img-fluid" src="../<?php echo $registro['fotoProducto1']; ?>" alt="First slide">
              </div>
              <h3><a href="blog-details.html"><?php echo $registro['nombreProducto']; ?></a></h3>
              <p><?php echo $registro['descripcionProducto']; ?></p>
              <p>Precio: $<?php echo $registro['costoProducto']; ?></p>
            </div>
            <div class="footer">
              <div class="actions">
                <a href="detalleProducto.php?idProducto=<?php echo $registro['IdProducto']; ?>" class="btn btn-info">Detalle</a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="col-lg-4 col-md-12 right-box">
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
          <div class="header">
            <h2>Categories Clouds</h2>
          </div>
          <div class="body widget">
            <ul class="list-unstyled categories-clouds m-b-0">
              <li><a href="javascript:void(0);">eCommerce</a></li>
              <li><a href="javascript:void(0);">Microsoft Technologies</a></li>
              <li><a href="javascript:void(0);">Creative UX</a></li>
              <li><a href="javascript:void(0);">Wordpress</a></li>
              <li><a href="javascript:void(0);">Angular JS</a></li>
              <li><a href="javascript:void(0);">Enterprise Mobility</a></li>
              <li><a href="javascript:void(0);">Website Design</a></li>
              <li><a href="javascript:void(0);">HTML5</a></li>
              <li><a href="javascript:void(0);">Infographics</a></li>
              <li><a href="javascript:void(0);">Wordpress Development</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>