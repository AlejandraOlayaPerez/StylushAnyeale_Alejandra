<?php 

class detalle{
    public $idDetalleFactura=0;
    public $idProducto="";
    public $idFactura="";
    public $idPedido="";
    public $codigoProducto="";
    public $producto="";
    public $cantidad="";

    function guardarProducto($idPedido, $idProducto, $producto, $cantidad){
    //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();

    $sql="INSERT INTO detalle (idProducto, idPedido, producto, cantidad) 
    VALUES ($idProducto, $idPedido, '$producto', $cantidad)";

    //se ejecuta la consulta en la base de datos
    $result=mysqli_query($conexion,$sql);
    echo $sql;
    return $result;
    }

    function listarProductoPorPedido($idPedido){
    //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();
    
    $sql="SELECT * FROM detalle WHERE idPedido=$idPedido";

    //se ejecuta la consulta en la base de datos
    $result=mysqli_query($conexion,$sql);
    //organiza resultado de la consulta y lo retorna
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

?>