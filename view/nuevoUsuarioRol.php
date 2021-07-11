<?php
require 'headGerente.php';
require_once '../model/conexionDB.php';
require_once '../model/rol.php';
require_once '../controller/usuarioController.php';;

$idRol = $_GET['idRol'];

$oUsuarioController = new usuarioController();
$listarDeUsuarioDiferente = $oUsuarioController->usuarioDiferenteEnRol($idRol);
?>

<html>

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>Nuevo Empleado</title>
</head>

<body>
    <div class="container">

        <form action="../controller/usuarioController.php" method="GET">
            <h3 class="tituloGrande">Empleados: </h3>
            <input name="idRol" value="<?php echo $idRol; ?>" style="display:none">

            <select class="form-select" name="idUser" id="" required>
                <option value="" disabled selected>Selecciones una opción</option>
                <?php foreach ($listarDeUsuarioDiferente as $registro) {
                ?>
                    <option value="<?php echo $registro['idUser']; ?>"><?php echo $registro['nombreUser']; ?></option>
                <?php
                }
                ?>
            </select>
            <br>
            <button type="submit" class="btn btn-success" name="funcion" value="registrarUsuarioEnRol">Guardar</button>
            <a href="listarDetalleRol.php?idRol=<?php echo $idRol; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
        </form>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>