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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href=""><i class="fas fa-calendar-plus"></i> Crea Una Reservacion</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href=""><i class="fas fa-calendar"></i> Edita Tu Reservacion</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href=""><i class="fas fa-calendar-times"></i> Elimina Tu Reservacion</li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="pricing-header p-3 pb-md-4 mx-auto text-center" style="background-color: rgb(249, 201, 242); border: 2px solid black">
            <h1 style="font-family: 'Times New Roman', Times, serif; font-size: 100px; font-weight: 600; -webkit-text-fill-color: black; ">¡HAZ UNA RESERVACION SEGUN TU HORARIO!</h1>
        </div>
        <hr class="dropdown-divider">

        <div class="card card-primary" style="background-color: rgba(255, 255, 204, 255);">
            <form action="../controller/reservacionController.php" method="GET">
                <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                    <div class="row">
                        <input type="time" class="form-control" name="idCliente" value="<?php echo $idCliente; ?>" style="display: none;">
                        <label class="card-title" style="-webkit-text-fill-color: black; font-size: 40px;">INFORMACION PERSONAL</label>
                        <br>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" class="form-label" style="-webkit-text-fill-color: black;">Tipo de Documento</label>
                            <select class="form-control" name="tipoDocumento">
                                <option value="" selected>Selecciones una opción</option>
                                <option value="TI" <?php if ($oUsuario->tipoDocumento == "TI") {
                                                        echo "selected";
                                                    } ?>>Tarjeta de Identidad</option>
                                <option value="CC" <?php if ($oUsuario->tipoDocumento == "CC") {
                                                        echo "selected";
                                                    } ?>>Cedula Ciudadanía</option>
                                <option value="CE" <?php if ($oUsuario->tipoDocumento == "CE") {
                                                        echo "selected";
                                                    } ?>>Cedula Extranjería</option>
                            </select>
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label class="form-label" style="-webkit-text-fill-color: black;">Documento Identidad</label>
                            <input type="text" class="form-control" name="documentoIdentidad" placeholder="Documento Identidad">
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label class="form-label" style="-webkit-text-fill-color: black;">Nombre</label>
                            <input type="text" class="form-control" name="primerNombre" placeholder="Nombre">
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label class="form-label" style="-webkit-text-fill-color: black;">Apellido</label>
                            <input type="text" class="form-control" name="primerApellido" placeholder="Apellido">
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label class="form-label" style="-webkit-text-fill-color: black;">Telefono</label>
                            <input type="number" class="form-control" name="telefono" placeholder="Telefono">
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <label class="card-title" style="-webkit-text-fill-color: black; font-size: 40px;">INFORMACION DEL SERVICIO</label>
                        <br>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" class="form-label" style="-webkit-text-fill-color: black;">Fecha Reservacion</label>
                            <input type="date" class="form-control" name="fechaReservacion">
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label class="form-label" style="-webkit-text-fill-color: black;">Hora Reservacion</label>
                            <input type="time" class="form-control" name="horaReservacion">
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <?php
                            require_once '../model/servicio.php';
                            $oServicio = new servicio();
                            $result = $oServicio->mostrarServicio();
                            ?>
                            <label class="form-label" style="-webkit-text-fill-color: black;">Servicio</label>
                            <select select class="form-select" name="servicio">
                                <option value="" disabled selected>Selecciones una opción</option>
                                <?php foreach ($result as $registro) {
                                ?>
                                    <option value="<?php echo $registro['idServicio']; ?>"><?php echo $registro['nombreServicio']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <?php
                            require_once '../model/usuario.php';
                            $oUsuario = new usuario();
                            $result = $oUsuario->listarUsuarioCargoEstilista();
                            ?>
                            <label class="form-label" style="-webkit-text-fill-color: black;">Estilista</label>
                            <select select class="form-select" name="estilista">
                                <option value="" disabled selected>Selecciones una opción</option>
                                <?php foreach ($result as $registro) {
                                ?>
                                    <option value="<?php echo $registro['idUser']; ?>"><?php echo $registro['primerNombre'] . " " . $registro['primerApellido']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label class="form-label" style="-webkit-text-fill-color: black;">Domicilio</label>
                            <select class="form-control" name="domicilio">
                                <option value="" selected>Selecciones una opción</option>
                                <option value="SI" <?php if ($oReservacion->domicilio == "SI") {
                                                        echo "selected";
                                                    } ?>>SI</option>
                                <option value="NO" <?php if ($oReservacion->domicilio == "NO") {
                                                        echo "selected";
                                                    } ?>>NO</option>
                            </select>
                        </div>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label class="form-label" style="-webkit-text-fill-color: black;">Direccion</label>
                            <input type="text" class="form-control" name="direccion">
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                    <a href="paginaPrincipalCliente.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> INICIO</a>
                    <button type="submit" class="btn btn-success" name="funcion" value="registrarReservacion"><i class="fas fa-save"></i> Registrar Reservacion</button>
                </div>
            </form>
        </div>


    </main>




    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>