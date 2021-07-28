<?php
require_once '../model/conexionDB.php';

class producto{
    public $IdProducto=0;
    public $idCategoria="";
    public $codigoProducto="";
    public $tipoProducto="";
    public $nombreProducto="";
    public $cantidad="";
    public $detalle="";
    public $recomendaciones="";
    public $valorUnitario="";
    public $costoProducto="";

    

    function listarServicio(){
        //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();

    $sql="SELECT * FROM servicio WHERE eliminado=false";

    //se ejecuta la consulta en la base de datos
    $result=mysqli_query($conexion,$sql);
    //organiza resultado de la consulta y lo retorna
    return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

    // function consultarProducto($idProducto){
    // //se instancia el objeto conectar
    // $oConexion= new conectar();
    // //se establece conexión con la base de datos
    // $conexion=$oConexion->conexion();
    // //consulta para retornar un solo registro

    // $sql="SELECT * FROM producto WHERE IdProducto=$idProducto";

    // //se ejecuta la consulta
    // $result=mysqli_query($conexion,$sql);
    // $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
    // foreach($result as $registro){ 
    //     //se registra la consulta en los parametros
    //     $this->IdProducto=$registro['IdProducto'];
    //     $this->idCategoria=$registro['idCategoria'];
    //     $this->codigoProducto=$registro['codigoProducto'];
    //     $this->tipoProducto=$registro['tipoProducto'];
    //     $this->nombreProducto=$registro['nombreProducto'];
    //     $this->cantidad=$registro['cantidad'];
    //     $this->detalle=$registro['detalle'];
    //     $this->recomendaciones=$registro['recomendaciones'];
    //     $this->valorUnitario=$registro['valorUnitario'];
    //     $this->costoProducto=$registro['costoProducto'];
    //     }
    // }

    // function actualizarProducto(){
    //     //se instancia el objeto conectar
    //     $oConexion= new conectar();
    //     //se establece conexión con la base de datos
    //     $conexion=$oConexion->conexion();
    //     //consulta para actualizar el registro

    //     //sentencia para actualizar un producto
    //     $sql="UPDATE producto SET idCategoria=$this->idCategoria,
    //     codigoProducto='$this->codigoProducto',
    //     tipoProducto='$this->tipoProducto',
    //     nombreProducto='$this->nombreProducto',
    //     cantidad=$this->cantidad,
    //     detalle='$this->detalle',
    //     recomendaciones='$this->recomendaciones',
    //     valorUnitario='$this->costoProducto'
    //     WHERE IdProducto=$this->IdProducto";
        
    //     //se ejecuta la consulta
    //     $result=mysqli_query($conexion,$sql);
    //     return $result;
    // }

    function eliminarServicio(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();
        
        //consulta para eliminar el registro
        $sql="UPDATE servicio SET eliminado=1 WHERE idServicio=$this->idServicio";
        
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
        }

    
}
