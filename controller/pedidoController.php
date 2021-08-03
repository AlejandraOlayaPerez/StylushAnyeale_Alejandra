<?php

//clase usuarioController .php genera las comunicaciones entre las vistas y el modelo
//contiene las funciones nesesarias para alimentar la vista

$funcion=""; //Me permite verificar si la variable esta vacia
//El if diferenciar metodo POST o GET o ninguno.
if (isset($_POST['funcion'])){ //Si esta definifa y su valor es diferente a NULO(ISSET), almacena la variable funcion.
    $funcion=$_POST['funcion'];
}else{ if (isset($_GET['funcion'])){
    $funcion=$_GET['funcion'];
}
}

$oPedidoController=new pedidoController();
    switch($funcion){
        case "validarPedido":
        $oPedidoController->validarPedido();
        break;
        case "nuevoPedido":
        $oPedidoController->nuevoPedido();
        break;
    }

    class pedidoController{
        public function validarPedido(){
            require_once '../model/pedido.php';
    
            $oPedido=new pedido();
            $oPedido->idPedido=$_GET['idPedido'];
            $oPedido->validarPedido();
    
            require_once 'mensajeController.php';
            $oMensaje=new mensajes();
    
            if ($oPedido->validarPedido()) {
                header("location: ../view/listarPedido.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+validado+correctamente+la+reservacion");
                // echo "valido";
            }else{
                header("location: ../view/listarPedido.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
                // echo "error";
            }
        }
    
        public function nuevoPedido(){
            require_once '../model/pedido.php';
            require_once 'configCrontroller.php';
    
            $Oconfig=new Config;
            $oPedido=new pedido;
    
            do {
                $codigo=$Oconfig->generarCodigoPedido();
                $existeCodigo=$oPedido->consultarExistePedido($codigo);
            }while(count($existeCodigo)>0);
    
            $oPedido->idPedido=$codigo;
            $oPedido->documentoIdentidad=$_GET['documentoIdentidad'];
            $oPedido->responsablePedido=$_GET['responsablePedido'];
            $oPedido->empresa=$_GET['empresa'];
            $oPedido->direccion=$_GET['direccion'];
            $oPedido->fechaPedido=$_GET['fechaPedido'];
            // echo $oPedido->nuevoPedido();
    
            if ($oPedido->nuevoPedido()){
            require_once '../model/detalle.php';
            $oDetalle=new detalle;
            $productoLista=$_GET['productos'];
            $cantidadProductoLista=$_GET['cantidadProducto'];
        
            for ($i=0; $i<count($productoLista); $i++){
                require_once '../model/producto.php';
                $oProducto=new producto();
                $oProducto->consultarProducto($productoLista[$i]);
                $oProducto->nombreProducto;
                $oDetalle->guardarProducto($codigo, $productoLista[$i], $oProducto->nombreProducto, $cantidadProductoLista[$i]);
            }
            echo "registro pedido";
            }else{
                echo "error";
            }
           
        }
    }
?>