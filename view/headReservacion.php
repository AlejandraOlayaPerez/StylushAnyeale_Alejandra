<?php 
require_once 'permisoscliente.php';
date_default_timezone_set('America/Bogota');
$fechaActual = Date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'linkHead.php'; ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/anyeale_proyecto/stylushanyeale_alejandra/assets/css/anyealecss/vistaheader.min.css" type="text/css">
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
    <title>Stylush Anyeale</title>
</head>

<body>
    <div class="container-fluid">
        <div class="event-schedule-area-two cabecera">
            <div class="row">
                <div class="col-md-8">
                    <a href="/anyeale_proyecto/stylushanyeale_alejandra/view/paginaprincipalcliente.php" class="brand-link">
                        <img src="/anyeale_proyecto/stylushanyeale_alejandra/image/logo.png" id="img" class="brand-image img-circle elevation-3">
                        <h1 class="titulo">Stylush Anyeale<h1>
                    </a>
                </div>

                <div class="col-md-4">
                    <nav class="navbar navbar-expand-md float-right" style="margin-right: 70px;">
                        <?php
                        if (isset($_SESSION['idCliente'])) {
                        ?>
                            <nav class="navbar" id="nav">
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item dropdown">
                                                <a class="estiloLi nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo  $_SESSION['nombreUser']; ?></a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li class="nav-item"><a class="dropdown-item" href="perfilcliente.php">Perfil</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li class="nav-item "><a class="dropdown-item" href="../controller/clientecontroller.php?funcion=cerrarSesion">Cerrar Sesion</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        <?php } else {
                        ?>
                            <ul class="navbar-nav">
                                <li class=" nav-item"><a class="estiloLi" aria-current="page" href="logincliente.php"><i class="fas fa-sign-in-alt"></i> Iniciar sesion</a></li>
                                <li class="estiloLi nav-item"><a class="estiloLi" aria-current="page" href="registrocliente.php"><i class="fas fa-user-plus"></i> Registrarse</a></li>
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
                                <a class="nav-item nav-link titulo " href="listarreservacion.php"><i class="fas fa-calendar"></i> Tus Reservaciones</a></li>
                                <a class="nav-item nav-link titulo " href="nuevareservacion.php"><i class="fas fa-calendar-plus"></i> Crea Una Reservacion</a></li>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>