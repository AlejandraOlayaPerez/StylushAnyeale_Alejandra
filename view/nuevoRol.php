<?php
require 'headGerente.php';
require_once '../model/rol.php';
require_once '../model/conexionDB.php';

$oRol = new rol();
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>NUEVO ROL</title>
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

            <div class="card" style="background-color: rgb(119, 167, 191);">
                <div class="card-header">
                    <h1 class="card-title" style=" font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600;">NUEVO ROL</h1>
                </div>
                <form action="../controller/gestionController.php" method="GET">
                    <div class="row" style="margin: 5px; ">
                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="" class="form-label">Nombre_Rol</label>
                            <input class="form-control" type="text" name="nombreRol" placeholder="Nombre del Rol" minlength="10" maxlength="20">
                        </div>
                    </div> <br>
                    <button type="submit" class="btn btn-success" name="funcion" value="crearRol"><i class="far fa-save"></i> Guardar</button>
                    <a href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/home/paginaPrincipalGerente.php?ventana=rol" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                </form>
            </div>
        </section>

    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>