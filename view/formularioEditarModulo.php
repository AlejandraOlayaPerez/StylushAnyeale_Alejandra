<?php
require 'headGerente.php';
require_once '../controller/gestionController.php';
//se hace referencia a los archivos estudiante y conexiondb


$oUsuarioController = new usuarioController();
$oModulo = $oUsuarioController->consultarModuloId($_GET['idModulo']); //la consultaModuloId retorna la instancia completa del modulo, la esta almacenando en la variable $oModulo

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>EDITAR MODULO</title>
</head>


<body>
    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background-color: rgb(119, 167, 191);">
                        <div class="card-header">
                            <h1 class="card-title" style=" font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600;">EDITAR MODULO</h1>
                        </div>
                        <form action="../controller/gestionController.php" method="GET">
                            <div class="row" style="margin: 5px;">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="">Nombre_Modulo</label>
                                    <input type="text" name="idModulo" value="<?php echo $oModulo->idModulo; ?>" style="display:none;">
                                    <input class="form-control" type="text" name="nombreModulo" value="<?php echo $oModulo->nombreModulo; ?>" required>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success" name="funcion" value="actualizarModulo">Guardar</button>
                            <a href="home/paginaPrincipalGerente.php?ventana=modulo" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>