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

        <H1 class="tituloGrande">NUEVA PAGINA</H1>
        <form action="../controller/usuarioController.php" method="GET">
            <div class="row">
                <div class="col col-6">
                    <label for="" class="form-label">Nombre_Pagina</label>
                    <input type="text" name="idModulo" value="<?php echo $idModulo; ?>" style="display:none;">
                    <input type="text" class="form-control" id="" name="nombrePagina" placeholder="Nombre de la pagina" value="<?php echo $oPagina->nombrePagina; ?>" required>
                </div>
                <div class="col col-6">
                    <label for="" class="form-label">Enlace_Pagina</label>
                    <input type="text" class="form-control" id="" name="enlace" placeholder="enlace de la pagina" value="<?php echo $oPagina->enlace; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">¿Se requiere inicio de sesion?</label>
                    <select class="form-select" id="" name="requireSession" required>

                        <option value="" disabled selected>Selecciones una opción</option>
                        <option value="true" <?php if ($oPagina->requireSession == "SI") {
                                                    echo "selected";
                                                } ?>>SI</option>
                        <option value="false" <?php if ($oPagina->requireSession == "NO") {
                                                    echo "selected";
                                                } ?>>NO</option>
                    </select>
                </div>
                <div>
                    <br>
                    <button type="submit" class="btn btn-success" name="funcion" value="crearPagina">Guardar</button>
                    <a href="listarPagina.php?idModulo=<?php echo $idModulo; ?>" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
        </form>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>