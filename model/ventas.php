<?php

require_once 'conexiondb.php';

class venta{
    public $idVentas=0;
    public $idProducto="";
    public $idCliente="";
    public $fechaVenta="";
    public $cantidadProducto="";

    function listarVenta($filtroFecha){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();

        $sql="SELECT p.nombreProducto, p.costoProducto, v.fechaVenta, v.cantidadProducto
        FROM producto p INNER JOIN ventas v ON p.IdProducto=v.idProducto
        WHERE v.eliminado=false AND v.fechaVenta='$filtroFecha';";

        $result=mysqli_query($conexion, $sql);
        $result= mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function consultarVenta(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //esta sentencia me permite consultar un empleado
        $sql="SELECT * FROM ventas WHERE idVentas=$this->idVentas";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);

        foreach($result as $registro){ 
        //se registra la consulta en los parametros
        $this->idVentas=$registro['idVentas'];
        $this->idProducto=$registro['idProducto'];
        $this->idCliente=$registro['idCliente'];
        $this->fechaVenta=$registro['fechaVenta'];
        $this->cantidadProducto=$registro['cantidadProducto'];
        }
    }
}

?>