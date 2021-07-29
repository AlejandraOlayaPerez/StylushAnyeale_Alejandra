<?php

$funcion=""; //Me permite verificar si la variable esta vacia
//El if diferenciar metodo POST o GET o ninguno.
if (isset($_POST['funcion'])){ //Si esta definifa y su valor es diferente a NULO(ISSET), almacena la variable funcion.
    $funcion=$_POST['funcion'];
}else{ if (isset($_GET['funcion'])){
    $funcion=$_GET['funcion'];
}
}

$oUsuarioController=new usuarioController();
    switch($funcion){
    case "crearProducto":
    $oUsuarioController->crearProducto();
    break;
    case "actualizarProducto":
    $oUsuarioController->actualizarProducto();
    break;
    case "eliminarProducto":
    $oUsuarioController->eliminarProducto();
    break;
    }


class usuarioController{

    public function crearProducto(){
        require_once '../model/producto.php';

        $oProducto=new producto();
        $oProducto->codigoProducto=$_GET['codigoProducto'];
        $oProducto->tipoProducto=$_GET['tipoProducto'];
        $oProducto->nombreProducto=$_GET['nombreProducto'];
        $oProducto->cantidad=$_GET['cantidad'];
        $oProducto->recomendaciones=$_GET['Recomendaciones'];
        $oProducto->valorUnitario=$_GET['valorUnitario'];
        $oProducto->costoProducto=$_GET['costoProducto'];
        $result=$oProducto->nuevoProducto();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($result) {
            header("location: ../view/listarProducto.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+creado+correctamente+el+producto");
            //echo "registro";
        }else{
            // echo "error";
            header("location: ../view/listarProducto.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
        }
    }

    public function consultarProducto($IdProducto){
        require_once '../model/producto.php';

        $oProducto=new producto();
        $oProducto->consultarProducto($IdProducto);

        return $oProducto;
    }

    public function actualizarProducto(){
        require_once '../model/producto.php';

        $oProducto=new producto();
        $oProducto->IdProducto=$_GET['IdProducto'];
        $oProducto->codigoProducto=$_GET['codigoProducto'];
        $oProducto->tipoProducto=$_GET['tipoProducto'];
        $oProducto->nombreProducto=$_GET['nombreProducto'];
        $oProducto->cantidad=$_GET['cantidad'];
        $oProducto->recomendaciones=$_GET['Recomendaciones'];
        $oProducto->valorUnitario=$_GET['valorUnitario'];
        $oProducto->costoProducto=$_GET['costoProducto'];
        $result=$oProducto->actualizarProducto();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($result) {
            header("location: ../view/listarProducto.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+actualizado+correctamente+el+producto");
            // echo "registro";
        }else{
            // echo "error";
            header("location: ../view/listarProducto.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
        }
    }

    public function eliminarProducto(){
        require_once '../model/producto.php';

        $oProducto=new producto();
        $oProducto->IdProducto=$_GET['IdProducto'];
        $result=$oProducto->eliminarProducto();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($result) {
            // header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+eliminado+correctamente+el+producto");
            echo "elimino";
        }else{
            // header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
            echo "error";
        }
    }
}