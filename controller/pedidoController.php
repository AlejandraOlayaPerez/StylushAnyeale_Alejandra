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

        case "actualizarEmpresa":
        $oPedidoController->actualizarEmpresa();
        break;
        case "eliminarEmpresa":
        $oPedidoController->eliminarEmpresa();
        break;
        case "nuevaEmpresa":
        $oPedidoController->nuevaEmpresa();
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

            require_once 'mensajeController.php';
            $oMensaje=new mensajes();
    
            $Oconfig=new Config;
            $oPedido=new pedido;
    
            do {
                $codigo=$Oconfig->generarCodigoPedido();
                $existeCodigo=$oPedido->consultarExistePedido($codigo);
            }while(count($existeCodigo)>0);
    
            $oPedido->idPedido=$codigo;
            $oPedido->idEmpresa=$_GET['idEmpresa'];
            $oPedido->documentoIdentidad=$_GET['documentoIdentidad'];
            $oPedido->responsablePedido=$_GET['responsablePedido'];
            $oPedido->Nit=$_GET['Nit'];
            $oPedido->empresa=$_GET['nombreEmpresa'];
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
                $oProducto->codigoProducto;
                $oProducto->IdProducto;
                $oDetalle->guardarProducto($codigo, $productoLista[$i], $oProducto->codigoProducto, $oProducto->nombreProducto, $cantidadProductoLista[$i]);
                $oProducto->cantidad=$cantidadProductoLista[$i];
                $oProducto->sumarPedido();
                
            }
                    header("location: ../view/listarPedido.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+h+generado+el+pedido+correctamente");
            // echo "registro pedido";
            }else{
                header("location: ../view/listarPedido.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
                // echo "error";
            }
           
        }

        public function consultarPedidoId($idPedido){
            require_once '../model/pedido.php';
            
            $oPedido=new pedido();
            $oPedido->consultarPedido($idPedido);
            return $oPedido;
    
        }

        public function consultarProductosIdPedido($idPedido){
            require_once '../model/detalle.php';
            
            $oDetalle=new detalle();
            $result=$oDetalle->consultarProductosIdPedido($idPedido);
            return $result;
    
        }

        public function consultarEmpresaId($idEmpresa){
            require_once '../model/empresa.php';
            
            $oEmpresa=new empresa();
            $oEmpresa->consultarEmpresa($idEmpresa);
            return $oEmpresa;
    
        }

        public function actualizarEmpresa(){
            require_once '../model/empresa.php';

            $oEmpresa=new empresa();
            $oEmpresa->idEmpresa=$_GET['idEmpresa'];
            $oEmpresa->Nit=$_GET['Nit'];
            $oEmpresa->nombreEmpresa=$_GET['nombreEmpresa'];
            $oEmpresa->direccion=$_GET['direccion'];
            $result=$oEmpresa->actualizarEmpresa();

            require_once 'mensajeController.php';
            $oMensaje=new mensajes();

            if($result){
                header("location: ../view/listarEmpresa.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+actualizado+correctamente+la+empresa");
                // echo "actualizo";
            }else{
                header("location: ../view/listarEmpresa.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
                // echo "error";
            }
        }

        public function eliminarEmpresa(){
            require_once '../model/empresa.php';
            
            $oEmpresa=new empresa();
            $oEmpresa->idEmpresa=$_GET['idEmpresa'];
            $result=$oEmpresa->eliminarEmpresa();
    
            require_once 'mensajeController.php';
            $oMensaje=new mensajes();
    
            if ($result) {
                header("location: ../view/listarEmpresa.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+eliminado+la+empresa");
            }else{
                header("location: ../view/listarEmpresa.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
            }
        }

        public function nuevaEmpresa(){
            require_once '../model/empresa.php';

            require_once 'mensajeController.php';
            $oMensaje=new mensajes();
            
            $oEmpresa= new empresa();
            $oEmpresa->Nit=$_GET['Nit'];
            $oEmpresa->nombreEmpresa=$_GET['nombreEmpresa'];
            $oEmpresa->direccion=$_GET['direccion'];

            if ($oEmpresa->NitEmpresa($oUsuario->Nit)!=0){
                header("location: ../view/nuevaEmpresa.php?tipoMensaje=".$oMensaje->tipoAdvertencia."&mensaje=Ya+existe+este+Nit+Registrado");
            }else{
            $result=$oEmpresa->nuevaEmpresa();

            if($result){
                header("location: ../view/listarEmpresa.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+creado+correctamente+una+empresa");
                // echo "registro";
            }else{
                header("location: ../view/listarEmpresa.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
                // echo "error";
            }
        }
        }
    }
?>