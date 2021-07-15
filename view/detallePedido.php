<?php
//referenciamos archivos de la carpeta Model
require_once 'headGerente.php';
require_once '../model/pedido.php';
require_once '../model/conexionDB.php';
require_once '../controller/usuarioController.php';

$idPedido = $_GET['idPedido'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>Informacion Empleado</title>
</head>

<body>
    <div class="container">

    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>