<?php session_start();
require_once 'linkhead.php'; //¡FUNDAMENTAL! 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/anyeale_proyecto/stylushanyeale_alejandra/assets/css/anyealecss/chat.min.css" type="text/css">
    <title>Stylush Anyeale</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/anyeale_proyecto/stylushanyeale_alejandra/"><i class="fas fa-home"></i> Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="galeria.php"><i class="fas fa-image"></i> Galeria</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="vistaproducto.php"><i class="fas fa-wine-bottle"></i> Producto</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="vistaservicio.php"><i class="fas fa-cut"></i> Servicios</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="listarreservacion.php"><i class="fas fa-clock"></i> Reserva</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="manualcliente.pdf"><i class="fas fa-question-circle"></i></a></li>
                    </ul>
                    <?php
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
                                                <li><a class="dropdown-item" href="../controller/clientecontroller.php?funcion=cerrarSesion">Cerrar Sesión</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    <?php } else {
                    ?>
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="logincliente.php"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a></li>
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="registrocliente.php"><i class="fas fa-user-plus"></i> Registrarse</a></li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </header>

    <main style="background-color: FEF1E6;">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../image/maquillaje.jpg" style="height: auto; max-height: 500px; width: 90% !important;" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../image/como-mantener-pelo-alisado-noche.jpg" style="height: auto; max-height: 500px; width: 90% !important;" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../image/manicura_pedicura.jpg" style="height: auto; max-height: 500px; width: 90% !important;" class="d-block w-100" alt="...">
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
                    <a class="btn btn-info" href="vistaproducto.php">Ver. Productos</a>
                </div>

                <div class="col-lg-4">
                    <img class="profile-user-img img-fluid rounded-circle" src="../image/servicio.jpg" style="height: 50%; width: 60%; border:solid black 2px" alt="User profile picture">

                    <h1>Servicios</h1>
                    <p>"Puedes explorar entre los servicios que ofrecemos, y para tu comodidad puedes realizar reservaciones segun tu tiempo al servicio que te interese, intentalo."</p>
                    <a class="btn btn-info" href="vistaservicio.php">Ver. Servicios</a>
                </div>

                <div class="col-lg-4">
                    <img class="profile-user-img img-fluid rounded-circle" src="../image/anyeale.png" style="height: 50%; width: 60%; border:solid black 2px" alt="User profile picture">

                    <h1>Stylus Anyeale</h1>
                    <p>"Nuestro nombre es Stylush Anyeale, brindamos atencion completa con nuestros servicios y cada dia iremos mejorando mas. "</p>
                    <a class="btn btn-info" href="conocenosotros.php">Conoce sobre nosotros</a>
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
                    <p class="lead">Stylush Anyeale te permite la posibilidad de realizar una reservación de los servicios
                        que se ofrecen como salón de belleza, estas reservaciones son dependiendo de tu disponibilidad
                        o tu estilista de preferencia. Reservar es muy sencillo y podrás hacerlo desde la comodidad de
                        tu ubicación, tu puedes escoger tu horario y fecha de reservación. </p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false" src="../image/cosmetica-1024x718.jpg">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h1 class="featurette-heading">Productos y Servicios</h1>
                    <p class="lead">Stylush Anyeale de brinda la posibilidad de conocer nuestros servicios y
                        productos de manera virtual, puedes realizar reservaciones o comprar nuestros productos
                        de manera online y tener la certeza de la compra que se realizo.</p>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false" src="../image/interior.jpg">
                </div>
            </div>

            <hr class="featurette-divider">
        </div>

        <footer class="container">
            <div class="card" style="background-color: FEF1E6">
                <div class="card-body row">
                    <div class="col-md-5 text-center d-flex align-items-center justify-content-center">
                        <div class="">
                            <h1><strong>¡CONTACTANOS!</strong></h1>
                            <p class="lead mb-1"><strong>Direccion: </strong> Carr 18 N 24 A 34</p>
                            <p class="lead mb-1"><strong>Horarios: </strong>Lunes a viernes (8AM-8PM)</p>
                            <p class="lead mb-1"><strong>Telefono: </strong> 3204995486</p>
                            <p class="lead mb-1"><strong>Correo Electronico: </strong> StylushAnyeale@gmail.com </p>
                            <p class="lead mb-2"><a href="https://www.instagram.com/__anyeale/?hl=es"><i class="fab fa-instagram"></i></a> <a href="https://www.youtube.com/channel/UCAIAHNzp71toK21oTYZtN1Q"><i class="fab fa-youtube"></i></a> <a href="https://wa.link/nc743x"><i class="fab fa-whatsapp"></i></a></p>

                        </div>
                    </div>

                    <?php if (isset($_SESSION['idCliente'])) { ?>
                        <div class="col-md-7">
                            <form action="../controller/clientecontroller.php" method="GET">
                                <input type="text" id="idCliente" name="idCliente" value="<?php echo $_SESSION['idCliente']; ?>" style="display: none;">
                                <div class="form-group">
                                    <label for="">Mensaje</label>
                                    <textarea id="comentarioMensaje" name="comentario" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" name="funcion" value="comentarioCliente">Comentar</button>
                                </div>
                            </form>
                        </div>
                    <?php  } else {
                    ?>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label class="text-center d-flex align-items-center justify-content-center" style="font-family:'Times New Roman', Times, serif; font-size:200%; position:absolute; top:40%; left:20%">Inicie session para poder comentar.</label>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
        </footer>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="chat-discussion" style="height: 800px;">
                        <div class="chat-message left" id="comentario">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once 'linkfooter.php'; ?>
    <script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>
    <script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/comentariocliente.min.js"></script>
</body>

</html>