<?php

require_once 'conexionDB.php';

class factura{
    public $idFactura=0;
    public $codigoFactura="";
    public $idEmpleado="";
    public $idCliente="";
    public $documentoIdentidad="";
    public $responsableFactura="";
    public $fechaFactura="";
    public $cantidad="";
    public $iva="";
    public $valorUnitario="";
    public $valorTotal="";

    function listarFactura($filtroFactura){
    //instancia la clase conectar
    $oConexion=new conectar();
    //se establece la conexión con la base datos
    $conexion=$oConexion->conexion();
    //sentencia SQL para instertar estudiante

    if ($filtroFactura!=""){
        $sql="SELECT * FROM factura WHERE eliminado=false AND (codigoFactura LIKE '%$filtroFactura%')"; //FUNCION PARA BUSCAR TANTO EN CENTRO, LADO DERECHO Y IZQUIERDO
    }else{
        $sql="SELECT * FROM factura WHERE eliminado=false";
    }

    //se ejecuta la consulta en la base de datos
    $result=mysqli_query($conexion,$sql);
    //organiza resultado de la consulta y lo retorna
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function mostrarFactura($filtroFecha){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();

        $sql="SELECT p.nombreProducto, p.costoProducto, f.fechaFactura, f.cantidad FROM producto p 
        INNER JOIN factura f ON p.IdProducto=f.idProducto 
        WHERE f.eliminado=false AND f.fechaFactura='$filtroFecha'";

        $result=mysqli_query($conexion, $sql);
        $result= mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function mostrarFacturaCompleto(){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();

        $sql="SELECT * FROM ventas WHERE eliminado=false";

        $result=mysqli_query($conexion, $sql);
        $result= mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }
}

?>