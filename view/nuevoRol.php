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
    <title>Nuevo Rol</title>
</head>

<body>
    <div class="container">

        <H1 class="tituloGrande">NUEVO ROL</H1>
        <form action="../controller/usuarioController.php" method="GET">
            <div class="row">
                <div class="col col-6">
                    <label for="" class="form-label">Nombre_Rol</label>
                    <select class="form-select" id="" name="nombreRol" required>
                        <option value="" disabled selected>Selecciones una opción</option>
                        <option value="Gerente" <?php if ($oRol->nombreRol == "Gerente") {echo "selected";} ?>>Gerente</option>
                        <option value="Recepcionista" <?php if ($oRol->nombreRol == "Recepcionista") {echo "selected";} ?>>Recepcionista</option>
                        <option value="Cajero" <?php if ($oRol->nombreRol == "Cajero") {echo "selected";} ?>>Cajero</option>
                        <option value="Vendedor" <?php if ($oRol->nombreRol == "Vendedor") {echo "selected";} ?>>Vendedor</option>
                        <option value="Personal" <?php if ($oRol->nombreRol == "Personal") {echo "selected";} ?>>Personal</option>
                        <option value="Tecnicos" <?php if ($oRol->nombreRol == "Tecnicos") {echo "selected";} ?>>Tecnicos</option>
                    </select>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success" name="funcion" value="crearRol">Guardar</button>
            <a href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/home/paginaPrincipalGerente.php?ventana=rol" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
        </form>
    </div>
</body>

</html>