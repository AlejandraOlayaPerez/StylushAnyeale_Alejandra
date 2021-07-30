<?php
require_once 'headPagina.php';

date_default_timezone_set('America/Bogota');
$fechaActual = Date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERFILES</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <section class="content">
                    <div class="card card-solid">
                        <div class="card-body pb-0" style="background-color: rgba(255, 255, 204, 255);">
                            <div class="row">
                                <?php
                                require_once '../model/usuario.php';
                                $oUsuario = new usuario();
                                $consulta = $oUsuario->listarUsuario();
                                foreach ($consulta as $registro) {
                                ?>
                                    <div class="col col-xl-4 col-md-6 col-12 d-flex align-items-stretch flex-column">
                                        <div class="card bg-light d-flex flex-fill">
                                            <div class="card-header text-muted border-bottom-0" style="background-color: rgb(249, 201, 242);">
                                                <h1 style="-webkit-text-fill-color: black;">Perfil</h1>
                                            </div>
                                            <div class="card-body pt-0" style="background-color: rgba(255, 255, 204, 255);">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <p><?php echo $registro['Rol']; ?></p>
                                                        <p><?php echo $registro['primerNombre'] . " " . $registro['primerApellido']; ?></p>
                                                        <p><?php echo $fechaActual; ?></p>
                                                        <p><?php echo $registro['correoElectronico']; ?></p>
                                                        <p><?php echo $registro['telefono']; ?></p>
                                                    </div>
                                                    <div class="col-5 text-center">
                                                        <br>
                                                        <img src="../image/perfilPreterminado.png" alt="" class="img-circle img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer" style="background-color: rgb(249, 201, 242);">
                                                <div class="text-right">
                                                    <a href="perfilEmpleado.php?idUser=<?php echo $registro['idUser']; ?>" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-user"></i> Ver Perfil
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>