<?php
//si no esta definida o no tiene valor e redirige al login
//en caso contrario no hace nada
$url = str_replace("/anyeale_proyecto/StylushAnyeale_Alejandra/", "", $_SERVER['REQUEST_URI']);
$url = (explode("?", $url))[0];
require_once '../controller/gestionController.php';
$oGestionController = new gestionController();
$oPagina = $oGestionController->consultarPaginaPorUrl($url);
// print_r($oPagina);
require_once '../controller/configCrontroller.php';
//Si la pagina requiere sesion y no inice sesion lo devuelve a loginç

if ($oPagina->requireSession and !isset($_SESSION['idCliente'])) {
  // echo "<script>alert('no tiene permiso');</script>";
  header("location: ../view/loginCliente.php");
  die(); // es para recomendado cuando se hace una rederecion, destruir o cerrar la pagina actual.
}
?>