<?php

require_once 'conexiondb.php';

class detalle
{
    public $idDetalleFactura = 0;
    public $idProducto = "";
    public $idFactura = "";
    public $idPedido = "";
    public $codigoProducto = "";
    public $producto = "";
    public $cantidad = "";
    public $precio = "";

    function guardarProducto($idPedido, $idProducto,  $codigoProducto,  $producto, $cantidad, $precio)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO detalle (idProducto, idPedido, codigoProducto, producto, cantidad, precio) 
        VALUES ($idProducto, $idPedido, '$codigoProducto', '$producto', $cantidad, $precio)";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function productosFactura($idFactura, $idProducto,  $codigoProducto,  $producto, $cantidad, $precio)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO detalle (idProducto, idFactura, codigoProducto, producto, cantidad, precio) 
        VALUES ($idProducto, $idFactura, '$codigoProducto', '$producto', $cantidad, $precio)";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function existeProductoFactura($idProducto, $idFactura)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM detalle WHERE idProducto=$idProducto AND idFactura=$idFactura";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function actualizarCantidadPrecio($idProducto, $idFactura, $cantidad, $precio)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "UPDATE detalle SET cantidad=cantidad+$cantidad, precio=precio+$precio WHERE idProducto=$idProducto AND idFactura=$idFactura";

        $result = mysqli_query($conexion, $sql);
        echo $sql;
        return $result;
    }

    function guardarServicio($idServicio, $idProducto,  $codigoProducto,  $producto, $cantidad, $precio)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO detalle (idProducto, idPedido, idServicio, codigoProducto, producto, cantidad, precio) 
    VALUES ($idProducto, NULL, $idServicio, '$codigoProducto', '$producto', $cantidad, $precio)";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }


    function guardarProductoServicio($idServicio, $idProducto,  $codigoProducto,  $producto, $cantidad, $precio)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO detalle (idProducto, idServicio, codigoProducto, producto, cantidad, precio) 
        VALUES ($idProducto, $idServicio, '$codigoProducto', '$producto', $cantidad, $precio)";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function productosFacturasValidar($idFactura)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT d.idProducto, d.cantidad 
        FROM detalle d INNER JOIN factura f 
        ON d.idFactura=f.idFactura WHERE d.idFactura=$idFactura";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function borrarProductoDelPedido()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE detalle SET eliminado=1 WHERE idPedido=$this->idPedido AND idProducto=$this->idProducto";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function borrarProductoDelServicio()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE detalle SET eliminado=1 WHERE idServicio=$this->idServicio AND idProducto=$this->idProducto";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function consultarProductoIguales($idPedido, $idProducto)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM detalle WHERE idPedido=$idPedido AND idProducto=$idProducto AND eliminado=false";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return count(mysqli_fetch_all($result, MYSQLI_ASSOC));
    }

    function consultarProductoIgualesServicio($idServicio, $idProducto)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM detalle WHERE idServicio=$idServicio AND idProducto=$idProducto AND eliminado=false";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return count(mysqli_fetch_all($result, MYSQLI_ASSOC));
    }

    function consultarServiciosIguales($idServicio, $idProducto)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM detalle WHERE IdServicio=$idServicio AND idProducto=$idProducto AND eliminado=false";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return count(mysqli_fetch_all($result, MYSQLI_ASSOC));
    }

    function actualizarCantidad()
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "UPDATE detalle SET cantidad=cantidad+$this->cantidad WHERE idProducto=$this->IdProducto AND idPedido=$this->idPedido";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function actualizarCantidadDetalle($idProducto, $idFactura, $cantidad)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "UPDATE detalle SET cantidad=$cantidad WHERE idProducto=$idProducto AND idFactura=$idFactura";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function eliminarProductoCarrito()
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "UPDATE detalle SET eliminado=1 WHERE idProducto=$this->idProducto AND idFactura=$this->idFactura";

        $result = mysqli_query($conexion, $sql);
        echo $sql;
        return $result;
    }

    function listarProductoPorPedido($idPedido)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM detalle WHERE idPedido=$idPedido";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function consultarProductosIdPedido($idPedido)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM detalle WHERE idPedido=$idPedido AND eliminado=false";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function consultarProductosIdFactura($idFactura)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM detalle WHERE idFactura=$idFactura AND eliminado=false";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function consultarPorPedidoProducto($idPedido)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM detalle WHERE idPedido=$idPedido";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function consultarProductosIdServicio($idServicio)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM detalle WHERE IdServicio=$idServicio AND eliminado=false";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function consultarServicioIdServicio($idServicio)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM detalle WHERE idServicio=$idServicio AND eliminado=false";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function fotoProducto($idFactura)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT *, 
        (SELECT d.fotoProducto FROM detallefoto d WHERE d.idProducto=de.idProducto LIMIT 1) as fotoProducto 
        FROM producto p INNER JOIN detalle de ON p.IdProducto=de.idProducto WHERE
        de.idFactura=$idFactura AND de.eliminado=false";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }
}
