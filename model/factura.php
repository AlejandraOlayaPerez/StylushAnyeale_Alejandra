<?php

require_once 'conexiondb.php';

class factura
{
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

    function registroFacturaReservacion()
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();
        //sentencia SQL para instertar estudiante

        $sql = "INSERT INTO factura(idReservacion, idUser, idCliente, codigoFactura, documentoIdentidad, responsableFactura, fechaFactura, horaFactura, valorTotal, eliminado)
    VALUES ($this->idReservacion, $this->idUser, $this->idCliente, '$this->codigoFactura',$this->documentoIdentidad, '$this->responsableFactura', '$this->fechaFactura', '$this->horaFactura', $this->valorTotal, false)";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }



    function consultarExisteFactura($idFactura)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM factura WHERE idFactura=$idFactura";

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
        echo $sql;
        return $result;
    }
}
