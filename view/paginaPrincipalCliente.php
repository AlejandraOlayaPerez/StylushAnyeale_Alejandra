<?php
require_once '../controller/correoController.php';

if (isset($_POST['correoElectronico']) != "") {
    echo $_POST['correoElectronico'];

    $oCorreo = new correo();
    $correoDestino = "stylushAnyeale@gmail.com";
    $nombre = $_POST['nombre'];
    $correoElectronico = $_POST['correoElectronico'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    $oCorreo = $oCorreo->enviarCorreoCliente($correoDestino, $nombre, $correoElectronico, $asunto, $mensaje);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylush Anyeale</title>

    <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/all.min.css" rel="stylesheet">
    <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/css-font.css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <link rel="shortcut icon" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" type="image/x-icon">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/"><i class="fas fa-home"></i> Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="galeria.php"><i class="fas fa-image"></i> Galeria</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="vistaProducto.php"><i class="fas fa-wine-bottle"></i> Producto</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="vistaServicio.php"><i class="fas fa-cut"></i> Servicios</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="listarReservacion.php"><i class="fas fa-clock"></i> Reserva</a></li>
                    </ul>
                    <?php
                    session_start(); //¡FUNDAMENTAL!
                    if (isset($_SESSION['idCliente'])) {
                    ?>
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-right: 60px;">
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
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../image/maquillaje.jpg" style="height: 100%; width: auto;" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../image/como-mantener-pelo-alisado-noche.jpg" style="height: 100%; width: auto;" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../image/manicura_pedicura.jpg" style="height: 100%; width: auto;" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container marketing">
            <div class="row">
                <div class="col-lg-4">
                    <img class="profile-user-img img-fluid rounded-circle" src="../image/productos.jpg" style="height: 50%; width: 60%; border:solid black 2px" alt="User profile picture">

                    <h1>Productos</h1>
                    <p>"Puedes comprar nuestros productos atravez de esta plataforma, solo ingresa"</p>
                    <a class="btn btn-info" href="vistaProducto.php">Ver. Productos</a>
                </div>

                <div class="col-lg-4">
                    <img class="profile-user-img img-fluid rounded-circle" src="../image/servicio.jpg" style="height: 50%; width: 60%; border:solid black 2px" alt="User profile picture">

                    <h1>Servicios</h1>
                    <p>"Puedes explorar entre los servicios que ofrecemos, y para tu comodidad puedes realizar reservaciones segun tu tiempo al servicio que te interese, intentalo."</p>
                    <a class="btn btn-info" href="vistaServicio.php">Ver. Servicios</a>
                </div>

                <div class="col-lg-4">
                    <img class="profile-user-img img-fluid rounded-circle" src="../image/anyeale.png" style="height: 50%; width: 60%; border:solid black 2px" alt="User profile picture">

                    <h1>Stylus Anyeale</h1>
                    <p>"Nuestro nombre es Stylush Anyeale, brindamos atencion completa con nuestros servicios y cada dia iremos mejorando mas. "</p>
                    <a class="btn btn-info" href="">Conoce sobre nosotros</a>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h1 class="featurette-heading">¿Quienes somos?</h1>
                    <p class="lead">Stylush Anyeale le permite a los clientes tener un acceso mas rapido
                        y practico desde la comodidad de su casa o trabajo, ofreciendo la venta de productos y reservaciones
                        de los diferentes servicios que se manejan dentro del salon de belleza.</p>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false" src="../image/estetica.jpg">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h1 class="featurette-heading">¡Reserva con nosotros!</h1>
                    <p class="lead">""</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false" src="../image/cosmetica-1024x718.jpg">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h1 class="featurette-heading">Productos y Servicios</h1>
                    <p class="lead">""</p>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false" src="../image/interior.jpg">
                </div>
            </div>

            <hr class="featurette-divider">
        </div>

        <footer class="container">
            <form action="" method="POST">
                <div class="card" style="background-color: rgba(255, 255, 204, 255);">
                    <div class="card-body row">
                        <div class="col-5 text-center d-flex align-items-center justify-content-center">
                            <div class="">
                                <h1><strong>¡CONTACTANOS!</strong></h1>
                                <p class="lead mb-1"><strong>Direccion: </strong> </p>
                                <p class="lead mb-1"><strong>Telefono: </strong> </p>
                                <p class="lead mb-1"><strong>Correo Electronico: </strong> StylushAnyeale@gmail.com </p>
                                <p class="lead mb-2"><a href="https://www.instagram.com/__anyeale/?hl=es"><i class="fab fa-instagram"></i></a> <a href="https://www.youtube.com/channel/UCAIAHNzp71toK21oTYZtN1Q"><i class="fab fa-youtube"></i></a> <a href=""><i class="fab fa-whatsapp"></i></a></p>

                            </div>
                        </div>


                        <div class="col-7">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" id="inputName" name="nombre" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="">Correo Electronico</label>
                                <input type="email" id="inputEmail" name="correoElectronico" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="">Asunto</label>
                                <input type="text" id="inputSubject" name="asunto" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="">Mensaje</label>
                                <textarea id="inputMessage" name="mensaje" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" value="Enviar Mensaje">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </footer>
    </main>
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>