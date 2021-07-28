<?php
require 'headGerente.php';
require_once '../model/pagina.php';
require_once '../model/conexiondb.php';

$oPagina = new pagina();
$idModulo = $_GET['idModulo'];
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>NUEVA PAGINA</title>
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
                <div class="">
                    <div class="card" style="background-color: rgb(119, 167, 191);">
                        <div class="card-header">
                            <h1 class="card-title" style=" font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600;">NUEVA PAGINA</h1>
                        </div>
                        <form action="../controller/gestionController.php" method="GET">
                            <div class="row" style="margin: 5px;">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Nombre_Pagina</label>
                                    <input type="text" name="idModulo" value="<?php echo $idModulo; ?>" style="display:none;">
                                    <input type="text" class="form-control" id="" name="nombrePagina" placeholder="Nombre de la pagina" value="<?php echo $oPagina->nombrePagina; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Enlace_Pagina</label>
                                    <input type="text" class="form-control" id="" name="enlace" placeholder="enlace de la pagina" value="<?php echo $oPagina->enlace; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">¿Se requiere inicio de sesion?</label>
                                    <select class="form-select" id="" name="requireSession">

                                        <option value="" disabled selected>Selecciones una opción</option>
                                        <option value="true" <?php if ($oPagina->requireSession == "SI") {
                                                                    echo "selected";
                                                                } ?>>SI</option>
                                        <option value="false" <?php if ($oPagina->requireSession == "NO") {
                                                                    echo "selected";
                                                                } ?>>NO</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success" name="funcion" value="crearPagina">Guardar</button>
                            <a href="listarPagina.php?idModulo=<?php echo $idModulo; ?>" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
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