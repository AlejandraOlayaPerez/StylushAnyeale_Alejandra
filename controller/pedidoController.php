<?php
date_default_timezone_set('America/Bogota');

//clase usuarioController .php genera las comunicaciones entre las vistas y el modelo
//contiene las funciones nesesarias para alimentar la vista
$funcion = ""; //Me permite verificar si la variable esta vacia
//El if diferenciar metodo POST o GET o ninguno.
if (isset($_POST['funcion'])) { //Si esta definifa y su valor es diferente a NULO(ISSET), almacena la variable funcion.
    $funcion = $_POST['funcion'];
} else {
    if (isset($_GET['funcion'])) {
        $funcion = $_GET['funcion'];
    }
}


$oPedidoController = new pedidoController();
switch ($funcion) {
    case "validarPedido":
        $oPedidoController->validarPedido();
        break;
    case "nuevoPedido":
        $oPedidoController->nuevoPedido();
        break;
    case "actualizarPedido":
        $oPedidoController->actualizarPedido();
        break;
    case "actualizarPedidoProducto":
        $oPedidoController->actualizarPedidoProducto();
        break;
    case "cancelarPedido":
        $oPedidoController->cancelarPedido();
        break;
    case "listarpedido":
        $oPedidoController->listarpedido();
        break;
    case "traerProductos":
        $oPedidoController->traerProductos();
        break;
    case "buscarPedido":
        $oPedidoController->buscarPedido();
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
    case "buscarEmpresa":
        $oPedidoController->buscarEmpresa();
        break;
    case "buscarProducto":
        $oPedidoController->buscarProducto();
        break;
    case "listarEmpresa":
        $oPedidoController->listarempresa();
        break;
}

class pedidoController
{

    //La funcion constructor se ejecuta cuando se intancia los objetos, se utiliza para configurar los elementos basicos.
    //Siempre usar :(
    public function __construct()
    {
    }

    public function validarPedido()
    {
        require_once '../model/pedido.php';

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        $fechaActual = Date("Y-m-d");
        $horaActual = Date("H:i:s");

        require_once '../model/seguimiento.php';
        $oSeguimiento = new seguimiento();
        $oSeguimiento->idUser = $_GET['idUser'];
        $oSeguimiento->idPedido = $_GET['idPedido'];
        $oSeguimiento->seguimientoValidarPedido($fechaActual, $horaActual);

        require_once '../model/producto.php';
        $oProducto = new producto();
        $oProducto->idPedido = $_GET['idPedido'];
        $cantidad = $oProducto->traerIdCantidad();

        foreach ($cantidad as $registro) {
            $resultSuma = $oProducto->sumarPedido($registro['cantidad'], $registro['IdProducto']);
        }

        $oPedido = new pedido();
        $oPedido->idPedido = $_GET['idPedido'];

        if ($resultSuma) {
            if ($oPedido->validarPedido()) {
                header("location: ../view/listarpedido.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+validado+correctamente+el+pedido");
                // echo "valido";
            } else {
                header("location: ../view/listarpedido.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
                // echo "error";
            }
        } else {
            header("location: ../view/listarpedido.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error al sumar";
        }
    }

    public function cancelarPedido()
    {
        require_once '../model/pedido.php';

        $fechaActual = Date("Y-m-d");
        $horaActual = Date("H:i:s");

        require_once '../model/seguimiento.php';
        $oSeguimiento = new seguimiento();
        $oSeguimiento->idUser = $_GET['idUser'];
        $oSeguimiento->idPedido = $_GET['idPedido'];
        $oSeguimiento->seguimientoCancelarPedido($fechaActual, $horaActual);

        $oPedido = new pedido();
        $oPedido->idPedido = $_GET['idPedido'];
        $result = $oPedido->eliminarPedido();

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/listarpedido.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+cancelado+correctamente+el+pedido");
            // echo "valido";
        } else {
            header("location: ../view/listarpedido.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }

    public function nuevoPedido()
    {
        require_once '../model/pedido.php';
        require_once 'configcrontroller.php';

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        $Oconfig = new Config;
        $oPedido = new pedido;

        do {
            $codigo = $Oconfig->generarCodigoPedido();
            $existeCodigo = $oPedido->consultarExistePedido($codigo);
            $fechaActual = Date("Y-m-d");
            $horaActual = Date("H:i:s");
        } while (count($existeCodigo) > 0);

        $oPedido->idPedido = $codigo;
        $oPedido->idEmpresa = $_GET['idEmpresa'];
        $oPedido->documentoIdentidad = $_GET['documentoIdentidad'];
        $oPedido->responsablePedido = $_GET['responsablePedido'];
        $oPedido->Nit = $_GET['Nit'];
        $oPedido->empresa = $_GET['empresa'];
        $oPedido->direccion = $_GET['direccion'];
        $oPedido->fechaPedido = $_GET['fechaPedido'];
        $result = $oPedido->nuevoPedido();


        if ($result) {
            require_once '../model/detalle.php';
            $oDetalle = new detalle;
            $productoLista = $_GET['productos'];
            $cantidadProductoLista = $_GET['cantidadProducto'];

            require_once '../model/seguimiento.php';
            $oSeguimiento = new seguimiento();
            $oSeguimiento->idUser = $_GET['idUser'];
            $oSeguimiento->idPedido = $codigo;
            $oSeguimiento->seguimientoNuevoPedido($fechaActual, $horaActual);

            for ($i = 0; $i < count($productoLista); $i++) {
                require_once '../model/producto.php';
                $oProducto = new producto();
                $oProducto->consultarProducto($productoLista[$i]);
                $oProducto->nombreProducto;
                $oProducto->codigoProducto;
                $oProducto->costoProducto;
                $oProducto->IdProducto;
                $oDetalle->guardarProducto($codigo, $productoLista[$i], $oProducto->codigoProducto, $oProducto->nombreProducto, $cantidadProductoLista[$i], $oProducto->valorUnitario);
            }
            header("location: ../view/listarpedido.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+generado+el+pedido+correctamente");
            // echo "registro pedido";
        } else {
            header("location: ../view/listarpedido.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }

    public function actualizarPedido()
    {
        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        $fechaActual = Date("Y-m-d");
        $horaActual = Date("H:i:s");

        require_once '../model/pedido.php';
        $oPedido = new pedido();
        $oPedido->idPedido = $_GET['idPedido'];
        $oPedido->fechaPedido = $_GET['fechaPedido'];
        $oPedido->documentoIdentidad = $_GET['documentoIdentidad'];
        $oPedido->responsablePedido = $_GET['responsablePedido'];
        $oPedido->idEmpresa = $_GET['idEmpresa'];
        $oPedido->Nit = $_GET['Nit'];
        $oPedido->empresa = $_GET['empresa'];
        $oPedido->direccion = $_GET['direccion'];
        $result = $oPedido->actualizarPedido();

        require_once '../model/seguimiento.php';
        $oSeguimiento = new seguimiento();
        $oSeguimiento->idUser = $_GET['idUser'];
        $oSeguimiento->idPedido = $_GET['idPedido'];
        $oSeguimiento->seguimientoEditarPedido($fechaActual, $horaActual);

        if ($result) {
            header("location: ../view/formularioeditarpedido.php?idPedido=$oPedido->idPedido " . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+la+informacion+del+pedido" . "&ventana=informacion");
            // echo "actualizo";
        } else {
            header("location: ../view/formularioeditarpedido.php?idPedido=$oPedido->idPedido " . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&ventana=informacion");
            // echo "error";
        }
    }

    public function actualizarPedidoProducto()
    {
        //instanciamos mensajeController.php
        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        //recibimos pedido
        $idPedido = $_GET['idPedido'];
        //recibimos arreglo de los idProducto
        $idProducto = $_GET['productos'];
        //recibimos arreglo de cantidad
        ($cantidad = $_GET['cantidadProducto']);

        //instanciamos pedido
        require_once '../model/pedido.php';
        $oPedido = new pedido();
        //eliminamos todos los productos del pedido en que estamos trabajando
        $result = $oPedido->eliminarProductoPedido($idPedido);

        if ($result) {
            //recorrer arreglos que se envian desde javascript de php
            //count=length
            for ($i = 0; $i < count($idProducto); $i++) {
                //Se nesesita instanciar nuevamente, para reiniciar la variable IdProducto cada vez que recorre el ciclo for.
                $oPedido = new pedido();
                //consulta los productos en la tabla detalle por pedido y producto
                $result = $oPedido->consultarProductosIdPedido($idPedido, $idProducto[$i]);
                //si la consulta nos trae un producto
                // echo "id producto a guardar ".$idProducto[$i];
                // echo "id Producto existente". $oPedido->idProducto;
                if ($oPedido->idProducto != "") {
                    //actualiza la cantidad, por la nueva cantidad y eliminado de los productos existentes
                    $result = $oPedido->actualizarCantidad($cantidad[$i], $idPedido, $idProducto[$i]);
                } else {
                    //instanciamos producto
                    require_once '../model/producto.php';
                    $oProducto = new producto();
                    //consultamos un producto para conocer informacion como codigo, nombre y precio
                    $oProducto->consultarProducto($idProducto[$i]);
                    //guardamos el nuevo producto en detalle
                    $result = $oPedido->guardarProducto($idPedido, $idProducto[$i], $oProducto->codigoProducto, $oProducto->nombreProducto, $cantidad[$i], $oProducto->valorUnitario);
                }

                // si result es false
                if (!$result) {
                    //mostramos mensaje
                    // echo "error al registrar los productos";
                    header("location: ../view/formularioeditarpedido.php?idPedido=$idPedido" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&ventana=producto");
                    //rompemos for
                    break;
                } else {
                    //se ejecuto correctamente
                    header("location: ../view/formularioeditarpedido.php?idPedido=$idPedido" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+los+productos+del+pedido" . "&ventana=producto");
                    // echo "se actualizo correctamente";
                }
            }
        } else {
            // echo "error eliminado producto del pedido";
            header("location: ../view/formularioeditarpedido.php?idPedido=$idPedido" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&ventana=producto");
        }
    }

    public function consultarPedidoId($idPedido)
    {
        require_once '../model/pedido.php';

        $oPedido = new pedido();
        $oPedido->consultarPedido($idPedido);
        return $oPedido;
    }

    public function buscarPedido()
    {
        require_once '../model/pedido.php';

        $oPedido = new pedido();
        $paginacion = $oPedido->paginacionPedido($_GET['fecha'], $_GET['recibido'], $_GET['cancelado'], $_GET['codigo']);
        echo $paginacion;
        $delimitador = "®";
        echo $delimitador;
        $producto = $oPedido->listarpedido($_GET['fecha'], $_GET['recibido'], $_GET['cancelado'], $_GET['codigo'], $_GET['pagina']);
        echo json_encode($producto);
    }


    public function listarpedido()
    {
        // require_once '../model/pedido.php';

        // $fechaFiltro = $_GET['fechaFiltro'];

        // $oPedido = new pedido();
        // $result = $oPedido->listarpedido();
        // return $fechaFiltro;
    }

    public function consultarProductosIdPedido($idPedido)
    {
        require_once '../model/detalle.php';

        $oDetalle = new detalle();
        $result = $oDetalle->consultarProductosIdPedido($idPedido);
        return $result;
    }

    public function consultarPorPedidoProducto($idPedido)
    {
        require_once '../model/detalle.php';

        $oDetalle = new detalle();
        return $oDetalle->consultarPorPedidoProducto($idPedido);
    }

    public function consultarEmpresaId($idEmpresa)
    {
        require_once '../model/empresa.php';

        $oEmpresa = new empresa();
        $oEmpresa->consultarEmpresa($idEmpresa);
        return $oEmpresa;
    }

    public function actualizarEmpresa()
    {
        require_once '../model/empresa.php';

        $oEmpresa = new empresa();
        $oEmpresa->idEmpresa = $_GET['idEmpresa'];
        $oEmpresa->Nit = $_GET['Nit'];
        $oEmpresa->nombreEmpresa = $_GET['nombreEmpresa'];
        $oEmpresa->direccion = $_GET['direccion'];
        $result = $oEmpresa->actualizarEmpresa();

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/listarempresa.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+la+empresa");
            // echo "actualizo";
        } else {
            header("location: ../view/listarempresa.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }

    public function eliminarEmpresa()
    {
        require_once '../model/empresa.php';

        $oEmpresa = new empresa();
        $oEmpresa->idEmpresa = $_GET['idEmpresa'];
        $result = $oEmpresa->eliminarEmpresa();

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/listarempresa.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+eliminado+la+empresa");
        } else {
            header("location: ../view/listarempresa.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function nuevaEmpresa()
    {
        require_once '../model/empresa.php';

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        $oEmpresa = new empresa();
        $oEmpresa->Nit = $_GET['Nit'];
        $oEmpresa->nombreEmpresa = $_GET['nombreEmpresa'];
        $oEmpresa->direccion = $_GET['direccion'];

        if ($oEmpresa->NitEmpresa($oEmpresa->Nit) == 0) {
            // header("location: ../view/nuevaEmpresa.php?tipoMensaje=".$oMensaje->tipoAdvertencia."&mensaje=Ya+existe+este+Nit+Registrado");
        } else {
            $result = $oEmpresa->nuevaEmpresa();

            if ($result) {
                header("location: ../view/listarempresa.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+creado+correctamente+una+empresa");
                // echo "registro";
            } else {
                header("location: ../view/listarempresa.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
                // echo "error";
            }
        }
    }

    public function buscarEmpresa()
    {
        require_once '../model/empresa.php';

        $oEmpresa = new empresa();
        $result = $oEmpresa->buscarEmpresa($_GET['empresa']);
        echo json_encode($result);
    }

    public function buscarProducto()
    {
        require_once '../model/producto.php';

        $oProducto = new producto();
        $paginacion = $oProducto->paginacionProductoPedido($_GET['producto'], $_GET['pagina']);
        echo $paginacion;
        $delimitador = "®";
        echo $delimitador;
        $datos = $oProducto->productoPedido($_GET['producto'], $_GET['pagina']);
        echo json_encode($datos);
    }

    public function traerProductos()
    {
        require_once '../model/detalle.php';

        $oDetalle = new detalle();
        $result = $oDetalle->consultarProductosIdPedido($_POST['idPedido']);
        echo json_encode($result);
    }

    public function listarempresa()
    {
        require_once '../model/empresa.php';

        $oEmpresa = new empresa();
        $paginacion = $oEmpresa->paginacionEmpresa($_GET['empresa'], $_GET['pagina']);
        echo $paginacion;
        $delimitador = "®";
        echo $delimitador;
        $datos = $oEmpresa->empresa($_GET['empresa'], $_GET['pagina']);
        echo json_encode($datos);
    }
}
