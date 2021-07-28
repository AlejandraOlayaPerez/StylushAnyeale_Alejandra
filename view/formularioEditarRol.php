<?php
require_once 'headGerente.php';
require_once '../controller/gestionController.php';

$oUsuarioController = new usuarioController();
$oRol = $oUsuarioController->consultarRolId($_GET['idRol']); //la consultaRolId retorna la instancia completa del rol, la esta almacenando en la variable $oRol

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>EDITAR ROL</title>
</head>

<body>
    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col col-xl-4 col-md-6 col-12">
                    <div class="card" style="background-color: rgb(119, 167, 191);">
                        <div class="card-header">
                            <h1 class="card-title" style=" font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600;">EDITAR ROL</h1>
                        </div>
                        <form action="../controller/gestionController.php" method="GET">
                            <input type="text" name="idRol" value="<?php echo $oRol->idRol; ?>" style="display:none;">
                            <div class="row" style="margin: 5px; ">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Nombre_Rol</label>
                                    <input class="form-control" type="text" name="nombreRol" placeholder="Nombre del Rol" value="<?php echo $oRol->nombreRol ?>">
                                </div>
                            </div> <br>
                            <button type="submit" class="btn btn-success" name="funcion" value="actualizarRol">Guardar</button>
                            <a href="home/paginaPrincipalGerente.php?ventana=rol" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>