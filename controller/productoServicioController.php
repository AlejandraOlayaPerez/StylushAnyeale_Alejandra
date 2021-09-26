<?php
date_default_timezone_set('America/Bogota');
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
    case "buscarProductoInventario":
        $oProductoServicioController->buscarProductoInventario();
        break;
    case "rangoFechas":
        $oProductoServicioController->rangoFechas();
        break;
    case "actualizarCantidad":
        $oProductoServicioController->actualizarCantidad();
        break;
    case "busquedaProducto":
        $oProductoServicioController->busquedaProducto();
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

    case "buscarCategoria":
        $oProductoServicioController->buscarCategoria();
        break;
    case "eliminarCategoria":
        $oProductoServicioController->eliminarCategoria();
        break;
    case "actualizarCategoria":
        $oProductoServicioController->actualizarCategoria();
        break;
    case "nuevaCategoria":
        $oProductoServicioController->nuevaCategoria();
        break;

    case "buscarTags":
        $oProductoServicioController->buscarTags();
        break;
    case "eliminarTags":
        $oProductoServicioController->eliminarTags();
        break;
    case "actualizarTags":
        $oProductoServicioController->actualizarTags();
        break;
    case "nuevaTags":
        $oProductoServicioController->nuevaTags();
        break;
}


class productoServicioController
{

    public function crearProducto()
    {
        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        require_once 'configCrontroller.php';
        $Oconfig = new Config();

        require_once '../model/producto.php';
        $oProducto = new producto();

        require_once '../model/tags.php';
        $oTags = new tags();

        do {
            $idProducto = $Oconfig->generarCodigoPedido();
            $existeCodigo = $oProducto->consultarExisteProducto($idProducto);
        } while (count($existeCodigo) > 0);

        $oProducto->codigoProducto = $_POST['codigoProducto'];
        $oProducto->nombreProducto = $_POST['nombreProducto'];
        $oProducto->descripcionProducto = $_POST['descripcion'];
        $oProducto->caracteristicas = $_POST['caracteristicas'];
        $oProducto->valorUnitario = $_POST['valorUnitario'];
        $result = $oProducto->nuevoProducto($idProducto);

        if ($result) {
            if ($this->imagenesProducto($idProducto)) {
                echo $idPalabraClave = $_POST['tags'];
                $registro = $oTags->actualizarTagsProducto($idProducto, $idPalabraClave);
                if ($registro) {
                    // echo "se registro correctamente";
                    header("location: ../view/listarProducto.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+creado+correctamente+el+producto");
                }
            }
        } else {
            // echo "error";
            header("location: /view/listarProducto.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function imagenesProducto($idProducto)
    {
        $numImagen = 0;
        foreach ($_FILES["fotos"]['tmp_name'] as $key => $tmp_name) {
            //Validamos que el archivo exista
            if ($_FILES["fotos"]["name"][$key]) {
                $filename = $_FILES["fotos"]["name"][$key]; //Obtenemos el nombre original del archivo
                $source = $_FILES["fotos"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
                $ubicacion = 'image/' . $idProducto;
                $directorio = $_SERVER['DOCUMENT_ROOT'] . '/Anyeale_proyecto/StylushAnyeale_Alejandra/' . $ubicacion; //Declaramos un  variable con la ruta donde guardaremos los archivos
                // echo $directorio;
                //Validamos si la ruta de destino existe, en caso de no existir la creamos
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0, true) or die("No se puede crear el directorio de extracci&oacute;n");
                }
                // require_once 'configController.php';
                // $oConfig=new config(); 
                // $codigo=$oConfig->generarCodigoUniqid();
                $dir = opendir($directorio); //Abrimos el directorio de destino
                $target_path = $directorio . '/' . $numImagen . '.jpg'; //Indicamos la ruta de destino, así como el nombre del archivo
                $numImagen += 1;
                //Movemos y validamos que el archivo se haya cargado correctamente
                //El primer campo es el origen y el segundo el destino
                unlink($target_path);
                if (move_uploaded_file($source, $target_path)) {
                    require_once '../model/imagen.php';
                    $oImagen = new foto();
                    $oImagen->idProducto = $idProducto;
                    $oImagen->fotoProducto = $ubicacion . '/' . $numImagen . '.jpg';
                    $oImagen->insertarImagenesProducto();
                    // echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                } else {
                    // echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
                }
                closedir($dir); //Cerramos el directorio de destino
            }
        }
        return true;
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

    public function detalleProducto($idProducto)
    {
        require_once '../model/producto.php';

        $oProducto = new producto();
        $oProducto->detalleProducto($idProducto);

        return $oProducto;
    }

    public function vistaProducto()
    {
        require_once '../model/producto.php';

        $oProducto = new producto();
        $consulta = $oProducto->vistaProducto();

        return $consulta;
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


    public function eliminarServicio()
    {
        require_once '../model/servicio.php';

        $oServicio = new servicio();
        $oServicio->IdServicio = $_GET['IdServicio'];
        $result = $oServicio->eliminarServicio();

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/listarServicio.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+eliminado+correctamente+el+producto");
            // echo "elimino";
        } else {
            header("location: ../view/listarServicio.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            //echo "error";
        }
    }

    public function buscarProductoInventario()
    {
        require_once '../model/producto.php';

        $oProducto = new producto();
        $result = $oProducto->buscarProducto($_GET['busquedaProducto']);
        echo json_encode($result);
    }

    public function rangoFechas()
    {
        require_once '../model/producto.php';

        $oProducto = new producto();
        $result = $oProducto->rangoFechas($_GET['fechaInicio'], $_GET['fechaFinal']);
        echo json_encode($result);
    }

    public function actualizarCantidad()
    {
        session_start();
        $fechaActual = Date("Y-m-d");
        $horaActual = Date("H:i:s");

        require_once '../model/producto.php';
        $oProducto = new producto();

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        require_once '../model/seguimiento.php';
        $oSeguimiento = new seguimiento();
        $oSeguimiento->idUser = $_SESSION['idUser'];
        $oSeguimiento->idProducto = $_GET['idProducto'];
        $oSeguimiento->observacion = $_GET['justificacion'];
        $resultSeguimiento = $oSeguimiento->seguimientoActualizarCantidadProducto($fechaActual, $horaActual);

        if ($resultSeguimiento) {
            $oProducto->cantidad = $_GET['cantidad'];
            $oProducto->idProducto = $_GET['idProducto'];
            $result = $oProducto->restarProducto();
            if ($result) {
                // header("location: ../view/listarProducto.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+la+cantidad");
            } else {
                // header("location: ../view/listarProducto.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            }
        } else {
            // header("location: ../view/listarProducto.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function busquedaProducto()
    {
        require_once '../model/producto.php';

        $oProducto = new producto();
        $result = $oProducto->busquedaProducto($_GET['codigoProducto'], $_GET['nombreProducto'], $_GET['pagina']);
        echo json_encode($result);
    }

    //categoria

    public function buscarCategoria(){
        require_once '../model/categoria.php';

        $oCategoria = new categoria();
        $result = $oCategoria->mostrarCategoriaAjax($_GET['categoria']);
        echo json_encode($result);
    }

    public function eliminarCategoria()
    {
        require_once '../model/categoria.php';

        $oCategoria = new categoria();
        $oCategoria->idCategoria = $_GET['idCategoria'];
        $result = $oCategoria->eliminarCategoria();

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($result) {
             header("location: ../view/categoria.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+eliminado+correctamente+la+categoria");
            // echo "elimino";
        } else {
            header("location: ../view/categoria.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }

    public function consultarCategoria($idCategoria){
        require_once '../model/categoria.php';

        $oCategoria = new categoria();
        $oCategoria->consultarCategoria($idCategoria);

        return $oCategoria;
    }

    public function actualizarCategoria(){
        require_once '../model/categoria.php';

        $oCategoria = new categoria();
        $oCategoria->idCategoria = $_GET['idCategoria'];
        $oCategoria->nombreCategoria = $_GET['nombreCategoria'];
        $result = $oCategoria->actualizarCategoria();

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/categoria.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+la+categoria");
            // echo "registro";
        } else {
            // echo "error";
            header("location: ../view/categoria.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function nuevaCategoria(){
        require_once '../model/categoria.php';

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        $oCategoria = new categoria();
        $oCategoria->nombreCategoria = $_GET['nombreCategoria'];
        $result = $oCategoria->crearCategoria();

        if ($result) {
            header("location: ../view/categoria.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+creado+un+nuevo+cargo");
        
        }else{
            header("location: ../view/categoria.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
        }
    }

    //tags

    public function buscarTags(){
        require_once '../model/tags.php';

        $tags = new tags();
        $result = $tags->mostrarTags($_GET['tags']);
        echo json_encode($result);
    }

    public function eliminarTags()
    {
        require_once '../model/tags.php';


        $oTags = new tags();
        $oTags->idPalabraClave = $_GET['idpalabraclave'];
        $result = $oTags->eliminarTags();

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($result) {
             header("location: ../view/tags.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+eliminado+correctamente+la+tags");
            // echo "elimino";
        } else {
            header("location: ../view/tags.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }

    public function consultarTags($idPalabrasClaves){
        require_once '../model/tags.php';

        $oTags = new tags();
        $oTags->consultarTags($idPalabrasClaves);

        return $oTags;
    }

    public function actualizarTags(){
        require_once '../model/tags.php';

        $oTags = new tags();
        $oTags->idPalabraClave = $_GET['idPalabraClave'];
        $oTags->palabraClave = $_GET['palabraClave'];
        $result = $oTags->actualizarTags();

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/tags.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+la+tags");
            // echo "registro";
        } else {
            // echo "error";
            header("location: ../view/tags.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function nuevaTags(){
        require_once '../model/tags.php';

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        $oTags = new tags();
        $oTags->palabraClave = $_GET['palabraClave'];
        $result = $oTags->nuevaTags();

        if ($result) {
            header("location: ../view/tags.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+creado+un+nuevo+cargo");
        
        }else{
            header("location: ../view/tags.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
        }
    }
}
