<?php

require_once 'conexiondb.php';

class factura
{

    //La funcion constructor se ejecuta cuando se intancia los objetos, se utiliza para configurar los elementos basicos.
    //Siempre usar :(
    public function __construct()
    {
    }

    public $idFactura = 0;
    public $idReservacion = "";
    public $idUser = "";
    public $idCliente = "";
    public $fechaCreacion = "";
    public $fechaModificar = "";
    public $horaCreacion = "";
    public $horaModificar = "";
    public $valorTotal = "";
    public $activa = 1;
    public $pendiente = 2;
    public $pago = 3;
    public $cancelada = 4;


    function consultarExisteFactura($idFactura)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM factura WHERE idFactura='$idFactura'";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function consultarIdFactura($idCliente)
    {
        $oConexion = new conectar();
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM factura WHERE idCliente=$idCliente AND estado=1";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            $this->idFactura = $registro['idFactura'];
        }
    }

    function estadoActivaFactura($idCliente)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM `factura` WHERE idCliente=$idCliente AND estado=1";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            $this->idFactura = $registro['idFactura'];
        }
    }

    function crearFacturaProducto($idFactura, $idCliente, $fechaCreacion, $horaCreacion)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();
        //sentencia SQL para instertar estudiante

        $sql = "INSERT INTO factura(idFactura, idReservacion, idUser, idCliente, fechaCreacion, fechaModificar, horaCreacion, horaModificar, valorTotal, eliminado, estado)
        VALUES ($idFactura, NULL, NULL, $idCliente, '$fechaCreacion', '$fechaCreacion', '$horaCreacion', '$horaCreacion', 0, false, $this->activa)";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function productoFactura($idProducto, $idFactura,  $codigoProducto,  $producto, $cantidad, $precio)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO detalle (idProducto, idFactura, idPedido, IdServicio, idReservacion, codigoProducto, producto, cantidad, precio, eliminado) 
    VALUES ($idProducto, $idFactura, NULL, NULL, NULL, '$codigoProducto', '$producto', $cantidad, $precio, false)";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function insertarFacturaReservacion($idFactura, $fechaCreacion, $horaCreacion)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();
        //sentencia SQL para instertar estudiante

        $sql = "INSERT INTO factura(idFactura, idReservacion, idUser, idCliente, fechaCreacion, fechaModificar, horaCreacion, horaModificar, valorTotal, eliminado, estado)
        VALUES ($idFactura, $this->idReservacion, $this->idUser, $this->idCliente, '$fechaCreacion', '$fechaCreacion', '$horaCreacion', '$horaCreacion', $this->valorTotal, false, $this->pago)";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function insertarFacturaProducto($idFactura, $fechaCreacion, $horaCreacion)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();
        //sentencia SQL para instertar estudiante

        $sql = "INSERT INTO factura(idFactura, idReservacion, idUser, idCliente, fechaCreacion, fechaModificar, horaCreacion, horaModificar, valorTotal, eliminado, estado)
        VALUES ($idFactura, NULL, $this->idUser, NULL, '$fechaCreacion', '$fechaCreacion', '$horaCreacion', '$horaCreacion', $this->valorTotal, false, $this->pago)";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function paginacionFactura($factura)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros
        $where = "eliminado=false ";
        if ($factura != "") {
            $where .= "AND idFactura LIKE '%$factura%' ";
        }
        $sql = "SELECT count(idFactura) as numRegistro FROM factura WHERE $where";
        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }

    public function factura($factura, $pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $where = "eliminado=false ";
        if ($factura != "") {
            $where .= "AND idFactura LIKE '%$factura%' ";
        }

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT * FROM factura WHERE $where ORDER BY fechaCreacion DESC LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $sql;
        return $result;
    }

    function validarFactura($fechaModificar, $horaModificar)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE factura SET fechaModificar='$fechaModificar', horaModificar='$horaModificar', estado=$this->pago WHERE idFactura=$this->idFactura";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function restarProducto($cantidad, $idProducto)
    {
        $oConexion = new conectar();
        $conexion = $oConexion->conexion();

        $sql = "UPDATE producto SET cantidad=cantidad-$cantidad WHERE IdProducto=$idProducto";

        $result = mysqli_query($conexion, $sql);
        echo $sql;
        return $result;
    }

    function consultarFactura($idFactura)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para retornar un solo registro
        $sql = "SELECT * FROM factura WHERE idFactura=$idFactura";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->idFactura = $registro['idFactura'];
            $this->idReservacion = $registro['idReservacion'];
            $this->idUser = $registro['idUser'];
            $this->idCliente = $registro['idCliente'];
            $this->fechaCreacion = $registro['fechaCreacion'];
            $this->fechaModificar = $registro['fechaModificar'];
            $this->horaCreacion = $registro['horaCreacion'];
            $this->horaModificar = $registro['horaModificar'];
            $this->valorTotal = $registro['valorTotal'];
            $this->estado = $registro['estado'];
        }
    }

    function cancelarFactura($fechaModificar, $horaModificar)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE factura SET fechaModificar='$fechaModificar', horaModificar='$horaModificar', estado=$this->cancelada WHERE idFactura=$this->idFactura";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        echo $sql;
        return $result;
    }

    public function facturaActivas()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM factura WHERE estado = $this->activa";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function facturaIdCliente($idCliente)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();
        $sql = "SELECT * FROM factura WHERE idCliente=$idCliente ORDER BY fechaCreacion DESC";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function facturaPendiente()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM factura WHERE estado = $this->pendiente";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function facturaPaga()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM factura WHERE estado = $this->pago";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function facturaCancelada()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM factura WHERE estado = $this->cancelada";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
