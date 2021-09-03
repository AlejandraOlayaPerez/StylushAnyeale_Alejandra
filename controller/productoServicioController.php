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
    case "eliminarServicio":
        $oProductoServicioController->eliminarServicio();
        break;
}


class productoServicioController
{

    public function crearProducto()
    {
        require_once 'configCrontroller.php';
        require_once '../model/producto.php';

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        $Oconfig = new Config();
        
        $oProducto = new producto();

        do {
            $codigoProducto = $Oconfig->generarCodigoPedido();
            $existeCodigo = $oServicio->consultarExisteProducto($codigoProducto);
        } while (count($existeCodigo) > 0);
        
        foreach ($_FILES["fotos"]['tmp_name'] as $key => $tmp_name) {
            //Validamos que el archivo exista
            if ($_FILES["fotos"]["name"][$key]) {
                $filename = $_FILES["fotos"]["name"][$key]; //Obtenemos el nombre original del archivo
                $source = $_FILES["fotos"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
                $ubicacion = '/image/productos/'.$codigoProducto;
                $directorio = $_SERVER['DOCUMENT_ROOT'].'/Anyeale_proyecto/StylushAnyeale_Alejandra/'.$ubicacion; //Declaramos un  variable con la ruta donde guardaremos los archivos
                // echo $directorio;
                //Validamos si la ruta de destino existe, en caso de no existir la creamos
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0, true) or die("No se puede crear el directorio de extracci&oacute;n");
                }
                // require_once 'configController.php';
                // $oConfig=new config(); 
                // $codigo=$oConfig->generarCodigoUniqid();
                $dir = opendir($directorio); //Abrimos el directorio de destino
                $target_path = $directorio.'/producto.jpg';; //Indicamos la ruta de destino, así como el nombre del archivo
                //Movemos y validamos que el archivo se haya cargado correctamente
                //El primer campo es el origen y el segundo el destino
                if(file_exists($target_path)) unlink($target_path);
                if(move_uploaded_file($source, $target_path)) {	
                    // require_once '../model/imagen.php';
                    // $oFoto=new foto();
                    // $oFoto->fotos=$ubicacion.'/perfilUsuario.jpg';
                    // $result=$oFoto->nuevasFotosProductoMasivo($codigoProducto);
                    // if($result){
                    //    echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                    // }   
                 
                } else {
                    echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
                }
                closedir($dir); //Cerramos el directorio de destino
            }
        }

      
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
        $oServicio->tiempoDuracion = $_GET['tiempoDuracion'];
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

    // public function consultarProductoPorId($IdProducto){
    //     require_once '../model/producto.php';

    //     $oProducto=new producto();
    //     $result=$oProducto->consultarProductoId();
    //     return $result;
    // }

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
        $oServicio->tiempoDuracion = $_GET['tiempoDuracion'];
        $oServicio->costo = $_GET['costo'];
        $result = $oServicio->actualizarServicio();

        if ($result) {
            header("location: ../view/listarServicio.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+la+informacion+del+servicio");
            // echo "actualizo";
        } else {
            header("location: ../view/listarServicio.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }

    public function consultarProductosIdServicio($idServicio)
    {
        require_once '../model/detalle.php';

        $oDetalle = new detalle();
        $result = $oDetalle->consultarProductosIdServicio($idServicio);
        return $result;
    }

    public function actualizarServicioProducto()
    {
        require_once '../model/detalle.php';
        $oDetalle = new detalle;
        $oDetalle->idServicio = $_GET['idServicio'];
        $oDetalle->idProducto = $_GET['idProducto'];
        $productoBorrado = $oDetalle->borrarProductoDelPedido();

        $productoLista = $_GET['productos'];
        $cantidadProductoLista = $_GET['cantidadProducto'];

        for ($i = 0; $i < count($productoLista); $i++) {
            require_once '../model/producto.php';
            $oProducto = new producto();
            $oDetalle->idServicio = $_GET['idServicio'];
            $oProducto->consultarProducto($productoLista[$i]);
            $oProducto->nombreProducto;
            $oProducto->codigoProducto;
            $oProducto->costoProducto;
            $oProducto->IdProducto;
            if ($oDetalle->consultarProductoIgualesServicio($oDetalle->idServicio, $oDetalle->idProducto) != 0) {
            } else {
                $oDetalle->guardarProducto($oDetalle->idPedido, $productoLista[$i], $oProducto->codigoProducto, $oProducto->nombreProducto, $cantidadProductoLista[$i], $oProducto->costoProducto);
            }
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
            header("location: ../view/listarServicio.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+eliminado+correctamente+el+producto");
            // echo "elimino";
        }else{
             header("location: ../view/listarServicio.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
            //echo "error";
        }
    }

}
