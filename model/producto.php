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

    function nuevoProducto(){
    //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();

    $sql="INSERT INTO producto (codigoProducto, tipoProducto, nombreProducto, cantidad, detalle, recomendaciones, valorUnitario, costroProducto, eliminado)
    VALUES ('$this->codigoProducto', '$this->tipoProducto', '$this->nombreProducto', $this->cantidad, '$this->recomendaciones' $this->valorUnitarios, $this->costoProducto', false)";
    
    $result=mysqli_query($conexion,$sql);
    return $result;
    }

    //funcion para mostrar los productos
    function listarProducto($filtroCodigoProducto){
    //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();

    if ($filtroCodigoProducto!=""){
        $sql="SELECT * FROM producto WHERE eliminado=false AND (codigoProducto LIKE '%$filtroCodigoProducto%' OR nombreProducto LIKE '%$filtroCodigoProducto%')"; //FUNCION PARA BUSCAR TANTO EN CENTRO, LADO DERECHO Y IZQUIERDO
    }else{
        $sql="SELECT * FROM producto WHERE eliminado=false";
    }

    //se ejecuta la consulta en la base de datos
    $result=mysqli_query($conexion,$sql);
    //organiza resultado de la consulta y lo retorna
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


    function mostrarProducto(){
        //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();

    $sql="SELECT * FROM producto WHERE eliminado=false";

    //se ejecuta la consulta en la base de datos
    $result=mysqli_query($conexion,$sql);
    //organiza resultado de la consulta y lo retorna
    return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

    function consultarProducto($idProducto){
    //se instancia el objeto conectar
    $oConexion= new conectar();
    //se establece conexión con la base de datos
    $conexion=$oConexion->conexion();
    //consulta para retornar un solo registro

    $sql="SELECT * FROM producto WHERE IdProducto=$idProducto";

    //se ejecuta la consulta
    $result=mysqli_query($conexion,$sql);
    $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($result as $registro){ 
        //se registra la consulta en los parametros
        $this->IdProducto=$registro['IdProducto'];
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

    function actualizarProducto(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();
        //consulta para actualizar el registro

        //sentencia para actualizar un producto
        $sql="UPDATE producto SET idCategoria=$this->idCategoria,
        codigoProducto='$this->codigoProducto',
        tipoProducto='$this->tipoProducto',
        nombreProducto='$this->nombreProducto',
        cantidad=$this->cantidad,
        detalle='$this->detalle',
        recomendaciones='$this->recomendaciones',
        valorUnitario='$this->costoProducto'
        WHERE IdProducto=$this->IdProducto";
        
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function eliminarProducto(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();
        
        //consulta para eliminar el registro
        $sql="UPDATE producto SET eliminado=1 WHERE IdPagina=$this->IdProducto";
        
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
        }

    
}
