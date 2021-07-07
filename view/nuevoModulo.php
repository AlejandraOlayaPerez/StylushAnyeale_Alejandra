<?php
require 'headGerente.php';
require_once '../model/modulo.php';
require_once '../model/conexionDB.php';

$oModulo = new modulo();
?>

<html>

<head>
    <title>Nuevo Modulo</title>
</head>

<body>
    <div class="container">

        <H1>NUEVO MODULO</H1>
        <form action="../controller/usuarioController.php" method="GET">
            <div class="row">
                <div class="col col-6">
                    <label for="" class="form-label">Nombre_Modulo</label>
                    <input type="text" name="idModulo" value="<?php echo $oModulo->idModulo; ?>" style="display:none">
                    <input type="text" class="form-control" id="" name="nombreModulo" placeholder="Nombre Modulo" value="<?php echo $oModulo->nombreModulo; ?>" required>
                </div>
                <div>
                    <br>
                    <button type="submit" class="btn btn-success" name="funcion" value="crearModulo">Guardar</button>
                    <a href="home/paginaPrincipalGerente.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
        </form>
    </div>
</body>

</html>