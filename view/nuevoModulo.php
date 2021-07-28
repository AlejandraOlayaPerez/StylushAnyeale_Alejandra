<?php
require 'headGerente.php';
require_once '../model/modulo.php';
require_once '../model/conexionDB.php';

$oModulo = new modulo();
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>NUEVO MODULO</title>
</head>

<body>
    <div class="container">

        <?php
        require_once '../controller/mensajeController.php';

        if (isset($_GET['mensaje'])) {
            $oMensaje = new mensajes();
            echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
        }
        ?>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background-color: rgb(119, 167, 191);">
                        <div class="card-header">
                            <h1 class="card-title" style=" font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600;">NUEVO MODULO</h1>
                        </div>
                        <form action="../controller/gestionController.php" method="GET">
                            <div class="row" style="margin: 5px;">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Nombre_Modulo</label>
                                    <input type="text" name="idModulo" value="<?php echo $oModulo->idModulo; ?>" style="display:none">
                                    <input type="text" class="form-control" id="" name="nombreModulo" placeholder="Nombre Modulo" minlength="10" maxlength="20" value="<?php echo $oModulo->nombreModulo; ?>">
                                </div>
                                <div>
                                    <br>
                                    <button type="submit" class="btn btn-success" name="funcion" value="crearModulo"><i class="far fa-save"></i> Guardar</button>
                                    <a href="home/paginaPrincipalGerente.php?ventana=modulo" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>