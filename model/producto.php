<?php
require_once '../model/conexionDB.php';

class producto{
    public $idProducto=0;
    public $idCategoria="";
    public $codigoProducto="";
    public $tipoProducto="";
    public $nombreProducto="";
    public $cantidad="";
    public $detalle="";
    public $recomendaciones="";
    public $valorUnitario="";
    public $costoProducto="";

    //funcion para mostrar los productos
    function listarProducto($filtroCodigoProducto){
    //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();

    $sql="SELECT * FROM producto WHERE eliminado=false AND codigoProducto='$filtroCodigoProducto'";

    //se ejecuta la consulta en la base de datos
    $result=mysqli_query($conexion,$sql);
    //organiza resultado de la consulta y lo retorna
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function consultarProducto(){
    //se instancia el objeto conectar
    $oConexion= new conectar();
    //se establece conexión con la base de datos
    $conexion=$oConexion->conexion();
    //consulta para retornar un solo registro

    $sql="SELECT * FROM producto WHERE idProducto=$this->idProducto";

    //se ejecuta la consulta
    $result=mysqli_query($conexion,$sql);
    $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($result as $registro){ 
        //se registra la consulta en los parametros
        $this->idProducto=$registro['idProducto'];
        $this->idCategoria=$registro['idCategoria'];
        $this->codigoProducto=$registro['codigoProducto'];
        $this->tipoProducto=$registro['tipoProducto'];
        $this->nombreProducto=$registro['nombreProducto'];
        $this->cantidad=$registro['cantidad'];
        $this->detalle=$registro['detalle'];
        $this->recomendaciones=$registro['recomendaciones'];
        $this->valorUnitario=$registro['valorUnitario'];
        $this->costoProducto=$registro['costoProducto'];
        }
    }

    
}
?>
