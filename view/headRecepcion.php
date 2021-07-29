<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bs-stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assests/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/assests/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="shortcut icon" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div id="head">
            <img src="/Anyeale_proyecto/StylushAnyeale_Alejandra/image/PNG_LOGO.png" id="imgLogo">
            <h1 id="headStylushAnyeale">STYLUSH ANYEALE</h1>
        </div>
        <div>
            <nav class="navbar navbar-expand-lg" id="navbar">
                <div class="container-fluid" id="container-fluid">
                    <a class="nav-link active" id="Anyeale" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/home/paginaPrincipalGerente.php"><i class="fas fa-home"></i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" id="texto2" aria-current="page" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/mostrarReservacion.php"><i class="fas fa-calendar-day"></i> Reservaciones</a></li>
                        <li class="nav-item"><a class="nav-link active" id="texto2" aria-current="page" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/perfilUsuario.php"> Perfiles</a></li>
                    </ul>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <nav>
                            <div class="container-fluid">
                                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/listarVenta.php" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><strong>Ventas</strong></a>
                                            <ul class="dropdown-menu dropdown-menu-ligth" aria-labelledby="navbarDarkDropdownMenuLink">
                                                <li class="nav-item"><a class="nav-link active" id="texto1" aria-current="page" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/listarVenta.php">Ventas</li>
                                                <li class="nav-item"><a class="nav-link active" id="texto1" aria-current="page" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/listarProducto.php">Productos</li>
                                                <li class="nav-item"><a class="nav-link active" id="texto1" aria-current="page" href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/listarServicio.php">Servicios</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</body>

</html>