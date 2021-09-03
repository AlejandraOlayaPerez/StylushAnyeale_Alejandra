<?php


$funcion = ""; //Me permite verificar si la variable esta vacia
//El if diferenciar metodo POST o GET o ninguno.
if (isset($_POST['funcion'])) { //Si esta definifa y su valor es diferente a NULO(ISSET), almacena la variable funcion.
    $funcion = $_POST['funcion'];
} else {
    if (isset($_GET['funcion'])) {
        $funcion = $_GET['funcion'];
    }
}

$oFacturaController = new facturaController();
switch ($funcion) {
    case "registroFactura":
        $oFacturaController->registrarFactura();
        break;
}

class facturaController
{
    public function registrarFactura(){
    require_once '../model/factura.php';
    $oFactura=new factura();

    require_once 'configCrontroller.php';
    $Oconfig=new Config;
       
    do {
        $codigo=$Oconfig->generarCodigoPedido();
        $existeCodigo=$oFactura->consultarExisteFactura($codigo);
    }while(count($existeCodigo)>0);

   
    $oFactura->idReservacion=$_GET['idReservacion'];
    $oFactura->idUser=$_GET['idUser'];
    $oFactura->idCliente=$_GET['idCliente'];
    $oFactura->codigoFactura=$codigo;
    $oFactura->documentoIdentidad=$_GET['documentoIdentidad'];
    $oFactura->responsableFactura=$_GET['responsableFactura'];
    $oFactura->fechaFactura=$_GET['fechaFactura'];
    $oFactura->horaFactura=$_GET['horaFactura'];
    $oFactura->valorTotal=$_GET['totalServicio'];
    print_r($oFactura->valorTotal);
    $result=$oFactura->registroFacturaReservacion();

    
    }
}
