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

    case "crearServicio":
    $oUsuarioController->crearServicio();
    break;
    case "actualizarServicio":
    $oUsuarioController->actualizarServicio();
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

    public function crearServicio(){
        require_once '../model/servicio.php';

        $oServicio=new servicio();
        $oServicio->codigoServicio=$_GET['codigoServicio'];
        $oServicio->nombreServicio=$_GET['nombreServicio'];
        $oServicio->detalleServicio=$_GET['detalleServicio'];
        $oServicio->costo=$_GET['costo'];
        $result=$oServicio->nuevoServicio();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($result) {
            header("location: ../view/listarServicio.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+creado+correctamente+el+servicio");
            //echo "registro";
        }else{
            // echo "error";
            header("location: ../view/listarServicio.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
        }
    }

    public function consultarServicio($idServicio){
        require_once '../model/servicio.php';

        $oServicio=new servicio();
        $oServicio->consultarServicio($idServicio);

        return $oServicio;
    }

    public function actualizarServicio(){
        require_once '../model/servicio.php';

        $oServicio=new servicio();
        $oServicio->IdServicio=$_GET['IdServicio'];
        $oServicio->codigoServicio=$_GET['codigoServicio'];
        $oServicio->nombreServicio=$_GET['nombreServicio'];
        $oServicio->detalleServicio=$_GET['detalleServicio'];
        $oServicio->costo=$_GET['costo'];
        $result=$oServicio->actualizarServicio();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($result) {
            header("location: ../view/listarServicio.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+actualizado+correctamente+el+servicio");
            // echo "registro";
        }else{
            //  echo "error";
            header("location: ../view/listarServicio.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
        }
    }

    public function eliminarServicio(){
        require_once '../model/servicio.php';

        $oServicio=new servicio();
        $oServicio->IdServicio=$_GET['IdServicio'];
        $result=$oServicio->eliminarServicio();

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