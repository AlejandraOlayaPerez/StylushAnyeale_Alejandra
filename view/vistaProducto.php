<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'linkHead.php'; ?>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/productos.min.css" type="text/css">
  <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/vistaHeader.min.css" type="text/css">
  <title>Stylush Anyeale</title>
</head>

<body>
  <div class="container-fluid">
    <div class="event-schedule-area-two cabecera">
      <div class="row">
        <div class="col-md-8">
          <a href="/anyeale_proyecto/StylushAnyeale_Alejandra/view/paginaPrincipalCliente.php" class="brand-link">
            <img src="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" id="img" class="brand-image img-circle elevation-3">
            <h1 class="titulo">Stylush Anyeale<h1>
          </a>
        </div>
        <div class="col-md-4">
          <nav class="navbar navbar-expand-md float-right">
            <?php
            session_start(); //¡FUNDAMENTAL!
            if (isset($_SESSION['idCliente'])) {
            ?>
              <nav class="navbar" id="nav">
                <div class="container-fluid">
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo  $_SESSION['nombreUser']; ?></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="perfilCliente.php">Perfil</a></li>
                          <li>
                            <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="../controller/clienteController.php?funcion=cerrarSesion">Cerrar Sesion</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
            <?php } else {
            ?>
              <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="loginCliente.php"><i class="fas fa-sign-in-alt"></i> Iniciar sesion</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="registroCliente.php"><i class="fas fa-user-plus"></i> Registrarse</a></li>
              </ul>
            <?php } ?>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg navbar-light cabecera">
            <a class="nav-item nav-link titulo" href="paginaPrincipalCliente.php"><i class="fas fa-home"></i> INICIO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-item nav-link titulo " href="pedidosClientes.php"><i class="fas fa-shopping-bag"></i> Mis Pedidos</a>
                <a class="nav-item nav-link titulo " href="comprasCliente.php"><i class="fas fa-shopping-basket"></i> Compras recientes</a>
                <a class="nav-item nav-link titulo " href="comentariosProductoCliente.php"><i class="fas fa-comments"></i> Comentarios</a>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>

    <br>

    <div class="row">
      <div class="col-md-12">
        <div class="body search">
          <div class="input-group m-b-0">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-search"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Buscar producto.." name="buscaProducto" id="buscaProducto" onkeyup="buscarProducto()">
          </div>
        </div>
      </div>
    </div>

    <br>

    <div class="row clearfix">
      <div class="col-md-3">
        <div class="card">
          <div class="card-header cabeceraCard">
            <h5><i class="fas fa-list-alt"></i> Categoria</h5>
          </div>
          <div class="card-body bodyCard">

          </div>
        </div>

        <div class="card">
          <div class="card-header cabeceraCard">
            <h5><i class="fas fa-tags"></i> Tags</h5>
          </div>
          <div class="card-body bodyCard">

          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-header cabeceraCard">
            <h5><i class="fas fa-boxes"></i> Lista de productos:</h5>
          </div>
          <div class="card-body bodyCard">
            <div class="row">
              <?php
              require_once '../controller/productoServicioController.php';
              $oProductoServicioController = new productoServicioController();
              $consulta = $oProductoServicioController->vistaProducto();
              foreach ($consulta as $registro) {
              ?>
                <div class="col-md-6">
                  <div class="card">
                    <img class="card-img-top imgCard" src="../<?php echo $registro['fotoProducto']; ?>">
                    <div class="card-body cardProducto">
                      <h5 class="card-title"><?php echo $registro['nombreProducto']; ?></h5>
                      <p class="card-text">Precio: $</p>
                    </div>
                    <div class="card-footer cardProducto">
                      <a href="detalleProducto.php?idProducto=<?php echo $registro['IdProducto']; ?>" class="btn btn-info">Detalle</a>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="card-header cabeceraCard">
            <h5><i class="fas fa-sort"></i> Organizar vista por:</h5>
          </div>
          <div class="card-body bodyCard">
            <select class="form-select desingSelect" name="lista" id="lista">
              <option value="" disabled>Selecciones una opción</option>
              <option>Orden preterminado</option>
              <option>Menor precio</option>
              <option>Mayor precio</option>
            </select>
          </div>
        </div>

        <div class="card">
          <div class="card-header cabeceraCard">
            <h5><i class="fas fa-dollar-sign"></i> Rango por precio:</h5>
          </div>
          <div class="card-body bodyCard">
            <div class="row">
              <div class="col-md-6">
                <input type="number" class="form-control input" name="rangoMenor" id="rangoMenor" placeholder="Valor Minimo">
              </div>
              <div class="col-md-6">
                <input type="number" class="form-control input" name="rangoMenor" id="rangoMenor" placeholder="Valor Maximo">
              </div>
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
<?php require_once 'linkFooter.php'; ?>


</html>