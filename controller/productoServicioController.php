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
    case "buscarProductosVista":
        $oProductoServicioController->buscarProductosVista();
        break;
    case  "actualizarTagsProducto":
        $oProductoServicioController->actualizarTagsProducto();
        break;
    case "actualizarCategoriaProducto":
        $oProductoServicioController->actualizarCategoriaProducto();
        break;

    case "buscarServicio":
        $oProductoServicioController->buscarServicio();
        break;
    case "actualizarInformacion":
        $oProductoServicioController->actualizarInformacion();
        break;
    case  "actualizarTagsServicio":
        $oProductoServicioController->actualizarTagsServicio();
        break;
    case "actualizarCategoriaServicio":
        $oProductoServicioController->actualizarCategoriaServicio();
        break;
    case "actualizarProductoServicio":
        $oProductoServicioController->actualizarProductoServicio();
        break;
    case "crearServicio":
        $oProductoServicioController->crearServicio();
        break;
    case "eliminarServicio":
        $oProductoServicioController->eliminarServicio();
        break;
    case "traerServicio":
        $oProductoServicioController->traerServicio();
        break;

    case "buscarCategoria":
        $oProductoServicioController->buscarCategoria();
        break;
    case "paginacionDetalleCategoria":
        $oProductoServicioController->paginacionDetalleCategoria();
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
    case "registrarProductoCategoria":
        $oProductoServicioController->registrarProductoCategoria();
        break;
    case "eliminarCategoriaProducto":
        $oProductoServicioController->eliminarCategoriaProducto();
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
        $fechaActual = Date("Y-m-d");
        $horaActual = Date("H:i:s");

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        require_once 'configcrontroller.php';
        $Oconfig = new Config();

        require_once '../model/producto.php';
        $oProducto = new producto();

        require_once '../model/palabrasclaves.php';
        $oPalabraClave = new palabraClave();

        do {
            $idProducto = $Oconfig->generarCodigoPedido();
            $existeCodigo = $oProducto->consultarExisteProducto($idProducto);
        } while (count($existeCodigo) > 0);

        require_once '../model/seguimiento.php';
        $oSeguimiento = new seguimiento();
        $oSeguimiento->idUser = $_POST['idUser'];
        $oSeguimiento->idProducto = $idProducto;
        $oSeguimiento->seguimientoNuevoProducto($fechaActual, $horaActual);

        $oProducto->idCategoria = $_POST['idCategoria'];
        $oProducto->codigoProducto = $_POST['codigoProducto'];
        $oProducto->nombreProducto = $_POST['nombreProducto'];
        $oProducto->descripcionProducto = $_POST['descripcion'];
        $oProducto->caracteristicas = $_POST['caracteristicas'];
        $oProducto->valorUnitario = str_replace(".", "", $_POST['valorUnitario']);
        $oProducto->costoProducto = str_replace(".", "", $_POST['costo']);
        $result = $oProducto->nuevoProducto($idProducto);

        if ($result) {
            if ($this->imagenesProducto($idProducto)) {
                $idTags = $_POST['tags'];
                $registro = $oPalabraClave->actualizarTagsProducto($idProducto, $idTags);
                if ($registro) {
                    // echo "se registro correctamente";
                    header("location: ../view/listarproducto.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+creado+correctamente+el+producto");
                }
            }
        } else {
            // echo "error";
            header("location: ../view/nuevoproducto.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
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
                $numImagen += 1;
                $target_path = $directorio . '/' . $numImagen . '.jpg'; //Indicamos la ruta de destino, así como el nombre del archivo
                //Movemos y validamos que el archivo se haya cargado correctamente
                //El primer campo es el origen y el segundo el destino
                // unlink($target_path);
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
        $oProducto->IdProducto = $_GET['idProducto'];
        $oProducto->codigoProducto = $_GET['codigoProducto'];
        $oProducto->nombreProducto = $_GET['nombreProducto'];
        $oProducto->descripcionProducto = $_GET['descripcionProducto'];
        $oProducto->caracteristicas = $_GET['caracteristicas'];
        $oProducto->valorUnitario = $_GET['valorUnitario'];
        $result = $oProducto->actualizarProducto();

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/formularioeditarproducto.php?idProducto=$oProducto->IdProducto" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+el+producto");
            // echo "registro";
        } else {
            // echo "error";
            header("location: ../view/formularioeditarproducto.php?idProducto=$oProducto->IdProducto" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function eliminarProducto()
    {
        $fechaActual = Date("Y-m-d");
        $horaActual = Date("H:i:s");

        require_once '../model/seguimiento.php';
        $oSeguimiento = new seguimiento();
        $oSeguimiento->idUser = $_GET['idUser'];
        $oSeguimiento->idProducto = $_GET['IdProducto'];
        $oSeguimiento->seguimientoEliminarProducto($fechaActual, $horaActual);

        require_once '../model/producto.php';
        $oProducto = new producto();
        $oProducto->IdProducto = $_GET['IdProducto'];
        $result = $oProducto->eliminarProducto();

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/listarproducto.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+eliminado+correctamente+el+producto");
            // echo "elimino";
        } else {
            header("location: ../view/listarproducto.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }

    public function detalleProducto($idProducto)
    {
        require_once '../model/producto.php';

        $oProducto = new producto();
        $oProducto->detalleProducto($idProducto);

        return $oProducto;
    }

    public function detalleFotoProducto($idProducto)
    {
        require_once '../model/producto.php';

        $oProducto = new producto();
        return $oProducto->detalleFotoProducto($idProducto);;
    }

    public function buscarProductoInventario()
    {
        require_once '../model/producto.php';

        $oProducto = new producto();
        $paginacion = $oProducto->paginacionProducto($_GET['codigo'], $_GET['nombre'], $_GET['pagina']);
        echo $paginacion;
        $delimitador = "®";
        echo $delimitador;
        $datos = $oProducto->productos($_GET['codigo'], $_GET['nombre'], $_GET['pagina']);
        echo json_encode($datos);
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

        require_once 'mensajecontroller.php';
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
                header("location: ../view/listarInventario.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+la+cantidad");
            } else {
                header("location: ../view/listarInventario.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            }
        } else {
            header("location: ../view/listarInventario.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function busquedaProducto()
    {
        require_once '../model/producto.php';

        $oProducto = new producto();
        $result = $oProducto->busquedaProducto($_GET['codigoProducto'], $_GET['nombreProducto'], $_GET['pagina']);
        echo json_encode($result);
    }

    public function buscarProductosVista()
    {
        require_once '../model/producto.php';

        $oProducto = new producto();
        $paginacion = $oProducto->paginacionVistaCliente($_GET['categoria'], $_GET['tags'], $_GET['vista'], $_GET['rangoMenor'], $_GET['rangoMayor'], $_GET['buscar']);
        echo $paginacion;
        $delimitador = "®";
        echo $delimitador;
        $producto = $oProducto->vistaClienteProducto($_GET['categoria'], $_GET['tags'], $_GET['vista'], $_GET['rangoMenor'], $_GET['rangoMayor'], $_GET['buscar'], $_GET['pagina']);
        echo json_encode($producto);
    }

    public function actualizarTagsProducto()
    {
        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();
        require_once '../model/palabrasclaves.php';

        $oPalabraClave = new palabraClave();
        $oPalabraClave->idProducto = $_GET['idProducto'];
        $result = $oPalabraClave->eliminarTagsProducto();

        if ($result) {
            $idTags = $_GET['tags'];
            $palabras = $oPalabraClave->actualizarTagsProducto($oPalabraClave->idProducto, $idTags);

            if ($palabras) {
                header("location: ../view/formularioeditarproducto.php?idProducto=$oPalabraClave->idProducto" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+las+tags+del+servicio" . "&ventana=tags");
                // echo "actualizo";
            } else {
                header("location: ../view/formularioeditarproducto.php?idProducto=$oPalabraClave->idProducto" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&ventana=tags");
                // echo "error";
            }
        }
    }

    public function actualizarCategoriaProducto()
    {
        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();
        require_once '../model/producto.php';

        $oProducto = new producto();
        $oProducto->idProducto = $_GET['idProducto'];
        $oProducto->idCategoria = $_GET['idCategoria'];
        $result = $oProducto->actualizarCategoriaProducto();

        if ($result) {
            header("location: ../view/formularioeditarproducto.php?idProducto=$oProducto->idProducto" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+la+categoria+del+servicio" . "&ventana=categoria");
            // echo "actualizo";
        } else {
            header("location: ../view/formularioeditarproducto.php?idProducto=$oProducto->idProducto" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&ventana=categoria");
            // echo "error";
        }
    }

    //servicios

    public function crearServicio()
    {
        $fechaActual = Date("Y-m-d");
        $horaActual = Date("H:i:s");

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        require_once 'configcrontroller.php';
        $Oconfig = new Config();

        require_once '../model/servicio.php';
        $oServicio = new servicio();

        require_once '../model/palabrasclaves.php';
        $oPalabraClave = new palabraClave();

        do {
            $idServicio = $Oconfig->generarCodigoPedido();
            $existeCodigo = $oServicio->consultarExisteServicio($idServicio);
        } while (count($existeCodigo) > 0);

        $oServicio->idCategoria = $_POST['idCategoria'];
        $oServicio->codigoServicio = $_POST['codigoServicio'];
        $oServicio->nombreServicio = $_POST['nombreServicio'];
        $oServicio->detalleServicio = $_POST['detalleServicio'];
        $oServicio->tiempoDuracion = $_POST['tiempoDuracion'];
        $oServicio->costo = $_POST['costo'];
        $result = $oServicio->nuevoServicio($idServicio);

        require_once '../model/seguimiento.php';
        $oSeguimiento = new seguimiento();
        $oSeguimiento->idUser = $_POST['idUser'];
        $oSeguimiento->idServicio = $idServicio;
        $oSeguimiento->seguimientoNuevoServicio($fechaActual, $horaActual);

        if ($result) {
            if ($this->imagenesServicio($idServicio)) {
                $idTags = $_POST['tags'];
                $registro = $oPalabraClave->actualizarTagsServicio($idServicio, $idTags);
                if ($registro) {
                    require_once '../model/detalle.php';
                    $oDetalle = new detalle;
                    $productoLista = $_POST['productos'];
                    $cantidadProductoLista = $_POST['cantidadProducto'];

                    for ($i = 0; $i < count($productoLista); $i++) {
                        require_once '../model/producto.php';
                        $oProducto = new producto();
                        $oProducto->consultarProducto($productoLista[$i]);
                        $oProducto->nombreProducto;
                        $oProducto->codigoProducto;
                        $oProducto->costoProducto;
                        $oProducto->IdProducto;
                        $oDetalle->guardarServicio($idServicio, $productoLista[$i], $oProducto->codigoProducto, $oProducto->nombreProducto, $cantidadProductoLista[$i], $oProducto->valorUnitario);
                    }
                    // echo "se registro correctamente";
                    header("location: ../view/listarservicio.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+creado+correctamente+un+servicio");
                }
            }
        } else {
            // echo "error";
            header("location: ../view/nuevoservicio.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function imagenesServicio($idServicio)
    {
        $numImagen = 0;
        foreach ($_FILES["fotos"]['tmp_name'] as $key => $tmp_name) {
            //Validamos que el archivo exista
            if ($_FILES["fotos"]["name"][$key]) {
                $filename = $_FILES["fotos"]["name"][$key]; //Obtenemos el nombre original del archivo
                $source = $_FILES["fotos"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
                $ubicacion = 'image/' . $idServicio;
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
                $numImagen += 1;
                $target_path = $directorio . '/' . $numImagen . '.jpg'; //Indicamos la ruta de destino, así como el nombre del archivo
                //Movemos y validamos que el archivo se haya cargado correctamente
                //El primer campo es el origen y el segundo el destino
                // unlink($target_path);
                if (move_uploaded_file($source, $target_path)) {
                    require_once '../model/imagen.php';
                    $oImagen = new foto();
                    $oImagen->idServicio = $idServicio;
                    $oImagen->fotoProducto = $ubicacion . '/' . $numImagen . '.jpg';
                    $oImagen->insertarImagenesServicio();
                    // echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                } else {
                    // echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
                }
                closedir($dir); //Cerramos el directorio de destino
            }
        }
        return true;
    }


    public function consultarServicio($idServicio)
    {
        require_once '../model/servicio.php';

        $oServicio = new servicio();
        $oServicio->consultarServicio($idServicio);

        return $oServicio;
    }

    public function consultarTagsidServicio($idServicio)
    {
        require_once '../model/tags.php';

        $oTags = new tags();
        return $oTags->consultarTagsIdServicio($idServicio);
    }

    public function consultarTagsidProducto($idProducto)
    {
        require_once '../model/tags.php';

        $oTags = new tags();
        return $oTags->consultarTagsidProducto($idProducto);
    }

    public function buscarServicio()
    {
        require_once '../model/servicio.php';

        $oServicio = new servicio();
        $paginacion = $oServicio->paginacionServicio($_GET['servicio']);
        echo $paginacion;
        $delimitador = "®";
        echo $delimitador;
        $datos = $oServicio->servicios($_GET['servicio'], $_GET['pagina']);
        echo json_encode($datos);
    }

    public function consultarServicioIdServicio($idServicio)
    {
        require_once '../model/detalle.php';

        $oDetalle = new detalle();
        $result = $oDetalle->consultarServicioIdServicio($idServicio);
        return $result;
    }

    public function actualizarInformacion()
    {
        $idServicio = $_GET['idServicio'];

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        require_once '../model/servicio.php';

        $oServicio = new servicio();
        $oServicio->idServicio = $_GET['idServicio'];
        $oServicio->codigoServicio = $_GET['codigoServicio'];
        $oServicio->nombreServicio = $_GET['nombreServicio'];
        $oServicio->detalleServicio = $_GET['detalleServicio'];
        $oServicio->tiempoDuracion = $_GET['tiempoDuracion'];
        $oServicio->costo = str_replace(".", "", $_GET['costo']);
        $result = $oServicio->actualizarServicio();

        if ($result) {
            header("location: ../view/formularioeditarservicio.php?idServicio=$idServicio" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+la+informacion+del+servicio" . "&ventana=informacion");
            // echo "actualizo";
        } else {
            header("location: ../view/formularioeditarservicio.php?idServicio=$idServicio" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&ventana=informacion");
            // echo "error";
        }
    }

    public function actualizarTagsServicio()
    {
        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();
        require_once '../model/palabrasclaves.php';

        $oPalabraClave = new palabraClave();
        $oPalabraClave->idServicio = $_GET['idServicio'];
        $result = $oPalabraClave->eliminarTagsServicio();

        if ($result) {
            $idTags = $_GET['tags'];
            $palabras = $oPalabraClave->actualizarTagsServicio($oPalabraClave->idServicio, $idTags);

            if ($palabras) {
                header("location: ../view/formularioeditarservicio.php?idServicio=$oPalabraClave->idServicio" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+las+tags+del+servicio" . "&ventana=tags");
                // echo "actualizo";
            } else {
                header("location: ../view/formularioeditarservicio.php?idServicio=$oPalabraClave->idServicio" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&ventana=tags");
                // echo "error";
            }
        }
    }

    public function actualizarCategoriaServicio()
    {
        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();
        require_once '../model/servicio.php';

        $oServicio = new servicio();
        $oServicio->idServicio = $_GET['idServicio'];
        $oServicio->idCategoria = $_GET['idCategoria'];
        $result = $oServicio->actualizarCategoriaServicio();

        if ($result) {
            header("location: ../view/formularioeditarservicio.php?idServicio=$oServicio->idServicio" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+la+categoria+del+servicio" . "&ventana=categoria");
            // echo "actualizo";
        } else {
            header("location: ../view/formularioeditarservicio.php?idServicio=$oServicio->idServicio" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&ventana=categoria");
            // echo "error";
        }
    }

    public function actualizarProductoServicio()
    {
        //instanciamos mensajeController.php
        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        //recibimos pedido
        $idServicio = $_GET['idServicio'];
        //recibimos arreglo de los idProducto
        $idProducto = $_GET['productos'];
        //recibimos arreglo de cantidad
        $cantidad = $_GET['cantidadProducto'];

        //instanciamos pedido
        require_once '../model/servicio.php';
        $oServicio = new servicio();
        //eliminamos todos los productos del pedido en que estamos trabajando
        $result = $oServicio->eliminarProductoServicio($idServicio);

        if ($result) {
            //recorrer arreglos que se envian desde javascript de php
            //count=length
            for ($i = 0; $i < count($idProducto); $i++) {
                //Se nesesita instanciar nuevamente, para reiniciar la variable IdProducto cada vez que recorre el ciclo for.
                $oServicio = new servicio();
                //consulta los productos en la tabla detalle por pedido y producto
                $result = $oServicio->consultarProductosIdServicio($idServicio, $idProducto[$i]);
                //si la consulta nos trae un producto
                // echo "id producto a guardar ".$idProducto[$i];
                // echo "id Producto existente". $oServicio->idProducto;

                if ($oServicio->idProducto != "") {
                    // print_r($oServicio);
                    //actualiza la cantidad, por la nueva cantidad y eliminado de los productos existentes
                    $result = $oServicio->actualizarCantidad($cantidad[$i], $idServicio, $idProducto[$i]);
                } else {
                    //instanciamos producto
                    require_once '../model/producto.php';
                    $oProducto = new producto();
                    //consultamos un producto para conocer informacion como codigo, nombre y precio
                    $oProducto->consultarProducto($idProducto[$i]);
                    //guardamos el nuevo producto en detalle
                    $result = $oServicio->guardarProducto($idServicio, $idProducto[$i], $oProducto->codigoProducto, $oProducto->nombreProducto, $cantidad[$i], $oProducto->valorUnitario);
                }

                // si result es false
                if (!$result) {
                    //mostramos mensaje
                    // echo "error al registrar los productos";
                    header("location: ../view/formularioeditarservicio.php?idServicio=$idServicio" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&ventana=producto");
                    //rompemos for
                    break;
                } else {
                    //se ejecuto correctamente
                    header("location: ../view/formularioeditarservicio.php?idServicio=$idServicio" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+los+productos+del+servicio" . "&ventana=producto");
                    // echo "se actualizo correctamente";
                }
            }
        } else {
            // echo "error eliminado producto del pedido";
            header("location: ../view/formularioeditarservicio.php?idServicio=$idServicio" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&ventana=producto");
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
        $fechaActual = Date("Y-m-d");
        $horaActual = Date("H:i:s");

        require_once '../model/seguimiento.php';
        $oSeguimiento = new seguimiento();
        $oSeguimiento->idUser = $_GET['idUser'];
        $oSeguimiento->idServicio = $_GET['IdServicio'];
        $oSeguimiento->seguimientoEliminarServicio($fechaActual, $horaActual);

        require_once '../model/servicio.php';
        $oServicio = new servicio();
        $oServicio->IdServicio = $_GET['IdServicio'];
        $result = $oServicio->eliminarServicio();

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/listarservicio.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+eliminado+correctamente+el+producto");
            // echo "elimino";
        } else {
            header("location: ../view/listarservicio.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            //echo "error";
        }
    }

    public function traerServicio()
    {
        require_once '../model/detalle.php';

        $oDetalle = new detalle();
        $result = $oDetalle->consultarProductosIdServicio($_POST['idServicio']);
        echo json_encode($result);
    }

    //categoria

    public function buscarCategoria()
    {
        require_once '../model/categoria.php';

        $oCategoria = new categoria();
        $paginacion = $oCategoria->paginacionCategoria($_GET['categoria']);
        echo $paginacion;
        $delimitador = "®";
        echo $delimitador;
        $categoria = $oCategoria->mostrarCategoria($_GET['categoria'], $_GET['pagina']);
        echo json_encode($categoria);
    }

    public function paginacionDetalleCategoria()
    {
        require_once '../model/categoria.php';

        $oCategoria = new categoria();
        $paginacion = $oCategoria->paginacionProductos($_GET['idCategoria']);
        echo $paginacion;
        $delimitador = "®";
        echo $delimitador;
        $categoria = $oCategoria->productoIdCategoria($_GET['idCategoria'], $_GET['pagina']);
        echo json_encode($categoria);
    }

    public function eliminarCategoria()
    {
        require_once '../model/categoria.php';

        $oCategoria = new categoria();
        $oCategoria->idCategoria = $_GET['idCategoria'];
        $result = $oCategoria->eliminarCategoria();

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/categoria.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+eliminado+correctamente+la+categoria");
            // echo "elimino";
        } else {
            header("location: ../view/categoria.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }

    public function consultarCategoria($idCategoria)
    {
        require_once '../model/categoria.php';

        $oCategoria = new categoria();
        $oCategoria->consultarCategoria($idCategoria);

        return $oCategoria;
    }

    public function actualizarCategoria()
    {
        require_once '../model/categoria.php';

        $oCategoria = new categoria();
        $oCategoria->idCategoria = $_GET['idCategoria'];
        $oCategoria->nombreCategoria = $_GET['nombreCategoria'];
        $result = $oCategoria->actualizarCategoria();

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/categoria.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+la+categoria");
            // echo "registro";
        } else {
            // echo "error";
            header("location: ../view/categoria.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function nuevaCategoria()
    {
        require_once '../model/categoria.php';

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        $oCategoria = new categoria();
        $oCategoria->nombreCategoria = $_GET['nombreCategoria'];
        $result = $oCategoria->crearCategoria();

        if ($result) {
            header("location: ../view/categoria.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+creado+un+nuevo+cargo");
        } else {
            header("location: ../view/categoria.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function registrarProductoCategoria()
    {
        $productoCategoria = $_GET['categoriaProducto'];
        $idCategoria = $_GET['idCategoria'];

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        require_once '../model/categoria.php';
        $oCategoria = new categoria();
        $result = $oCategoria->registroMasivoProducto($productoCategoria, $idCategoria);

        if ($result) {
            // echo "registro";
            header("location: ../view/detallecategoria.php?idCategoria=$idCategoria" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+registrado+los+productos+en+esta+categoria");
        } else {
            // echo "error";
            header("location: ../view/detallecategoria.php?idCategoria=$idCategoria" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function eliminarCategoriaProducto()
    {
        require_once '../model/producto.php';
        $idCategoria = $_GET['idCategoria'];

        $oProducto = new producto();
        $oProducto->idProducto = $_GET['idProducto'];
        $result = $oProducto->eliminarCategoriaProducto();

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/detallecategoria.php?idCategoria=$idCategoria" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+eliminado+correctamente+el+producto");
            // echo "elimino";
        } else {
            header("location: ../view/detallecategoria.php?idCategoria=$idCategoria" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }


    //tags

    public function buscarTags()
    {
        require_once '../model/tags.php';

        $oTags = new tags();
        $paginacion = $oTags->paginacionTags($_GET['tags']);
        echo $paginacion;
        $delimitador = "®";
        echo $delimitador;
        $tags = $oTags->mostrarTags($_GET['tags'], $_GET['pagina']);
        echo json_encode($tags);
    }

    public function eliminarTags()
    {
        require_once '../model/tags.php';


        $oTags = new tags();
        $oTags->idTags = $_GET['idpalabraclave'];
        $result = $oTags->eliminarTags();

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/tags.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+eliminado+correctamente+la+tags");
            // echo "elimino";
        } else {
            header("location: ../view/tags.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }

    public function consultarTags($idTags)
    {
        require_once '../model/tags.php';

        $oTags = new tags();
        $oTags->consultarTags($idTags);

        return $oTags;
    }

    public function actualizarTags()
    {
        require_once '../model/tags.php';

        $oTags = new tags();
        $oTags->idTags = $_GET['idTags'];
        $oTags->tags = $_GET['tags'];
        $result = $oTags->actualizarTags();

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/tags.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+la+tags");
            // echo "registro";
        } else {
            // echo "error";
            header("location: ../view/tags.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function nuevaTags()
    {
        require_once '../model/tags.php';

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        $oTags = new tags();
        $oTags->tags = $_GET['palabraClave'];
        $result = $oTags->nuevaTags();

        if ($result) {
            header("location: ../view/tags.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+creado+un+nuevo+cargo");
        } else {
            header("location: ../view/tags.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }
}
