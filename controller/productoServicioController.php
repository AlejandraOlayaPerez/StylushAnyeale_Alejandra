<?php

// session_start();
// require_once '../controller/configCrontroller.php';

$funcion = ""; //Me permite verificar si la variable esta vacia
//El if diferenciar metodo POST o GET o ninguno.
if (isset($_POST['funcion'])) { //Si esta definifa y su valor es diferente a NULO(ISSET), almacena la variable funcion.
    $funcion = $_POST['funcion'];
} else {
    if (isset($_GET['funcion'])) {
        $funcion = $_GET['funcion'];
    }
}

$oProductoServicioController = new productoServicioController();
switch ($funcion) {
    case "crearProducto":
        $oProductoServicioController->crearProducto();
        break;
    case "actualizarProducto":
        $oProductoServicioController->actualizarProducto();
        break;
    case "eliminarProducto":
        $oProductoServicioController->eliminarProducto();
        break;

    case "crearServicio":
        $oProductoServicioController->crearServicio();
        break;
    case "actualizarServicio":
        $oProductoServicioController->actualizarServicio();
        break;
    case "actualizarServicioProducto":
        $oProductoServicioController->actualizarServicioProducto();
        break;
        // case "eliminarServicio":
        // case $oProductoServicioController->eliminarServicio();
        // break;
}


class productoServicioController
{

    public function crearProducto()
    {
        // $url=$_SESSION['urlRaiz']."model/producto.php";
        require_once '../model/producto.php';

        $oProducto = new producto();
        $oProducto->codigoProducto = $_GET['codigoProducto'];
        $oProducto->tipoProducto = $_GET['tipoProducto'];
        $oProducto->nombreProducto = $_GET['nombreProducto'];
        $oProducto->cantidad = $_GET['cantidad'];
        $oProducto->recomendaciones = $_GET['Recomendaciones'];
        $oProducto->valorUnitario = $_GET['valorUnitario'];
        $oProducto->costoProducto = $_GET['costoProducto'];
        $result = $oProducto->nuevoProducto();

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/listarProducto.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+creado+correctamente+el+producto");
            //echo "registro";
        } else {
            // echo "error";
            header("location: /view/listarProducto.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function consultarProducto($IdProducto)
    {
        require_once '../model/producto.php';

        $oProducto = new producto();
        $oProducto->consultarProducto($IdProducto);

        return $oProducto;
    }

    public function actualizarProducto()
    {
        require_once '../model/producto.php';

        $oProducto = new producto();
        $oProducto->IdProducto = $_GET['IdProducto'];
        $oProducto->codigoProducto = $_GET['codigoProducto'];
        $oProducto->tipoProducto = $_GET['tipoProducto'];
        $oProducto->nombreProducto = $_GET['nombreProducto'];
        $oProducto->cantidad = $_GET['cantidad'];
        $oProducto->recomendaciones = $_GET['Recomendaciones'];
        $oProducto->valorUnitario = $_GET['valorUnitario'];
        $oProducto->costoProducto = $_GET['costoProducto'];
        $result = $oProducto->actualizarProducto();

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/listarProducto.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+el+producto");
            // echo "registro";
        } else {
            // echo "error";
            header("location: ../view/listarProducto.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function eliminarProducto()
    {
        require_once '../model/producto.php';


        $oProducto = new producto();
        $oProducto->IdProducto = $_GET['IdProducto'];
        $result = $oProducto->eliminarProducto();

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/listarProducto.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+eliminado+correctamente+el+producto");
            // echo "elimino";
        } else {
            header("location: ../view/listarProducto.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }

    public function crearServicio()
    {
        require_once '../model/servicio.php';
        require_once 'configCrontroller.php';

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        $Oconfig = new Config;
        $oServicio = new servicio();

        do {
            $codigo = $Oconfig->generarCodigoPedido();
            $existeCodigo = $oServicio->consultarExisteServicio($codigo);
        } while (count($existeCodigo) > 0);


        $oServicio->idServicio = $codigo;
        $oServicio->codigoServicio = $_GET['codigoServicio'];
        $oServicio->nombreServicio = $_GET['nombreServicio'];
        $oServicio->detalleServicio = $_GET['detalleServicio'];
        $oServicio->costo = $_GET['costo'];
        $result = $oServicio->nuevoServicio();

        if ($result) {
            require_once '../model/detalle.php';
            $oDetalle = new detalle;
            $productoLista = $_GET['productos'];
            $cantidadProductoLista = $_GET['cantidadProducto'];


            for ($i = 0; $i < count($productoLista); $i++) {
                require_once '../model/producto.php';
                $oProducto = new producto();
                $oProducto->consultarProducto($productoLista[$i]);
                $oProducto->nombreProducto;
                $oProducto->codigoProducto;
                $oProducto->costoProducto;
                $oProducto->IdProducto;
                $oDetalle->guardarProductoServicio($codigo, $productoLista[$i], $oProducto->codigoProducto, $oProducto->nombreProducto, $cantidadProductoLista[$i], $oProducto->costoProducto);
            }
            header("location: ../view/listarServicio.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+creado+un+nuevo+servicio+correctamente");
            // echo "registro pedido";
        } else {
            header("location: ../view/listarServicio.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }

    public function consultarServicio($idServicio)
    {
        require_once '../model/servicio.php';

        $oServicio = new servicio();
        $oServicio->consultarServicio($idServicio);

        return $oServicio;
    }

    public function consultarServicioIdServicio($idServicio)
    {
        require_once '../model/detalle.php';

        $oDetalle = new detalle();
        $result = $oDetalle->consultarServicioIdServicio($idServicio);
        return $result;
    }

    public function actualizarServicio()
    {
        require_once '../model/servicio.php';

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        $oServicio = new servicio();
        $oServicio->idServicio = $_GET['idServicio'];
        $oServicio->codigoServicio = $_GET['codigoServicio'];
        $oServicio->nombreServicio = $_GET['nombreServicio'];
        $oServicio->detalleServicio = $_GET['detalleServicio'];
        $oServicio->costo = $_GET['costo'];
        $result = $oServicio->actualizarServicio();

        if($result){
            header("location: ../view/formularioEditarServicio.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+actualizado+correctamente+la+informacion+del+servicio");
            //  echo "actualizo";
        }else{
             header("location: ../view/formularioEditarServicio.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
            //  echo "error";
        }

    }

    public function actualizarServicioProducto(){

        // require_once '../model/detalle.php';
        // $oDetalle = new detalle;
        // $oDetalle->idServicio = $_GET['idServicio'];
        // $oDetalle->idProducto = $_GET['idProducto'];
        // $productoBorrado = $oDetalle->borrarProductoDelServicio();
        // $productoLista = $_GET['productos'];
        // $cantidadProductoLista = $_GET['cantidadProducto'];

        // for ($i = 0; $i < count($productoLista); $i++) {
        //     require_once '../model/producto.php';
        //     $oProducto = new producto();
        //     $oDetalle->idServicio = $_GET['idServicio'];
        //     $oProducto->consultarProducto($productoLista[$i]);
        //     $oProducto->nombreProducto;
        //     $oProducto->codigoProducto;
        //     $oProducto->costoProducto;
        //     $oProducto->IdProducto;
        //     $result = $oDetalle->consultarServiciosIguales($oDetalle->idServicio, $oDetalle->idProducto);
        //     if ($result != 0) {
        //         $oDetalle->guardarProductoServicio($oDetalle->idServicio, $productoLista[$i], $oProducto->codigoProducto, $oProducto->nombreProducto, $cantidadProductoLista[$i], $oProducto->costoProducto);
        //     }
        // }
    }

    // public function eliminarServicio(){
    //     require_once '../model/servicio.php';

    //     $oServicio=new servicio();
    //     $oServicio->IdServicio=$_GET['IdServicio'];
    //     $result=$oServicio->eliminarServicio();

    //     require_once 'mensajeController.php';
    //     $oMensaje=new mensajes();

    //     if ($result) {
    //         // header("location: ../view/listarSerivio.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+eliminado+correctamente+el+producto");
    //          echo "elimino";
    //     }else{
    //         // header("location: ../view/listarSerivio.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
    //         echo "error";
    //     }
    // }

}
