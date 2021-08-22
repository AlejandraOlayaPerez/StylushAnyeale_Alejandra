<?php
session_start();

require_once '../controller/clienteController.php';
$oClienteController = new clienteController();
?>
<!DOCTYPE html>
<html lang="en">

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
    <title>PERFIL</title>
</head>

<body>
    <div class="container-md" style="background-color: rgb(249, 201, 242);">

        <?php
        $oCliente = $oClienteController->consultarCliente($_SESSION['idCliente']);
        ?>

        <div class="row" style="border-style: inset rgb(249, 201, 242);">
            <div class="col col-xl-4 col-md-6 col-12">
                <strong>
                    <p style="text-align: center; margin: 2px;">Perfil</p>
                </strong>
                <div>
                    <hr class="dropdown-divider">
                </div>
                <div class="card-body box-profile">
                    <div class="text-center"><img class="profile-user-img img-fluid img-circle" src="../image/perfilPreterminado.png" alt=""></div>

                    <h1 class="profile-username text-center"><?php echo $oCliente->primerNombre . " " . $oCliente->primerApellido; ?> <a href="">(Editar Foto)</a></h1>
                </div>
            </div>
            <div class="col col-xl-4 col-md-6 col-12">
                <strong>
                    <p style="text-align: center; margin: 2px;">Editar Informacion</p>
                </strong>
                <div>
                    <hr class="dropdown-divider">
                </div>
                <div class="card card-primary">
                    <div class="card-body" style="background-color:  rgba(255, 255, 204, 255);">
                        <strong><i class="fas fa-info-circle"></i> Nombres: </strong>
                        <p><?php echo $oCliente->primerNombre . " " . $oCliente->segundoNombre . " " . $oCliente->primerApellido . " " . $oCliente->segundoApellido; ?></p>
                        <hr>
                        <strong><i class="fas fa-at"></i> Correo Electronico: </strong>
                        <p><?php echo $oCliente->email; ?></p>
                        <hr>
                        <strong><i class="fas fa-phone-square"></i> Telefono: </strong>
                        <p><?php echo $oCliente->telefono; ?></p>

                        <a href="" class="btn btn-info float-right"><i class="fas fa-eye"></i> Ver. Informacion Personal</a>
                    </div>
                </div>
            </div>

            <div class="col col-xl-4 col-md-6 col-12">
                <strong>
                    <p style="text-align: center; margin: 2px;">Reservaciones</p>
                </strong>
                <div>
                    <hr class="dropdown-divider">
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle" style="border: 2px solid black;">
                        <thead>
                            <tr style="border: 2px solid black;">
                                <th style="border: 2px solid black;">Fecha</th>
                                <th style="border: 2px solid black;">Hora</th>
                                <th style="border: 2px solid black;">Servicio</th>
                                <th style="border: 2px solid black;"><a class="btn btn-info" href=""><i class="fas fa-calendar-plus"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $oCliente = $oClienteController->reservacionesPorIdCliente($_SESSION['idCliente']);
                            foreach ($oCliente as $registro) {
                            ?>
                                <tr>
                                    <td style="border: 2px solid black;"><?php echo $registro['fechaReservacion']; ?></td>
                                    <td style="border: 2px solid black;"><?php echo $registro['horaReservacion']; ?></td>
                                    <td style="border: 2px solid black;"><?php echo $registro['servicio']; ?></td>
                                    <td style="border: 2px solid black;"><a class="btn btn-info" href=""><i class="fas fa-calendar-times"></i></i></a></td>
                                </tr>
                        </tbody>
                    <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <a href="paginaPrincipalCliente.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
    </div>
</body>

</html>