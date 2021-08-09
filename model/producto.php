<?php
require_once 'conexionDB.php';

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
    public $numRegistro = "";
    public $numPagina = "";

    function nuevoProducto(){
    //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();

    $sql="INSERT INTO producto (codigoProducto, tipoProducto, nombreProducto, cantidad, recomendaciones, valorUnitario, costoProducto, eliminado)
    VALUES ('$this->codigoProducto', '$this->tipoProducto', '$this->nombreProducto', $this->cantidad, '$this->recomendaciones', $this->valorUnitario, $this->costoProducto, false)";
    
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


    function mostrarProducto($pagina){
        //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();

    //Buscar numero de registro por filtros
    $sql = "SELECT count(nombreModulo) as numRegistro FROM modulo WHERE eliminado=false;";
    $result = mysqli_query($conexion, $sql);
    foreach ($result as $registro) {
        $this->numRegistro = $registro['numRegistro'];
    }
    //indicamos cuantos elementos vamos a tomar, se le indican los registros que se van a mostrar
    $inicio = (($pagina - 1) * 10);

    $sql="SELECT * FROM producto WHERE eliminado=false LIMIT 10 OFFSET $inicio";

    //se ejecuta la consulta en la base de datos
    $result=mysqli_query($conexion,$sql);
    //organiza resultado de la consulta y lo retorna
    return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

    function consultarProducto($IdProducto){
    //se instancia el objeto conectar
    $oConexion= new conectar();
    //se establece conexión con la base de datos
    $conexion=$oConexion->conexion();
    //consulta para retornar un solo registro

    $sql="SELECT * FROM producto WHERE IdProducto=$IdProducto";

    //se ejecuta la consulta
    $result=mysqli_query($conexion,$sql);
    $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($result as $registro){ 
        //se registra la consulta en los parametros
        $this->IdProducto=$registro['IdProducto'];
        $this->codigoProducto=$registro['codigoProducto'];
        $this->tipoProducto=$registro['tipoProducto'];
        $this->nombreProducto=$registro['nombreProducto'];
        $this->cantidad=$registro['cantidad'];
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
        $sql="UPDATE producto SET codigoProducto='$this->codigoProducto',
        tipoProducto='$this->tipoProducto',
        nombreProducto='$this->nombreProducto',
        cantidad=$this->cantidad,
        recomendaciones='$this->recomendaciones',
        valorUnitario=$this->valorUnitario,
        costoProducto=$this->costoProducto
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
        $sql="UPDATE producto SET eliminado=1 WHERE IdProducto=$this->IdProducto";
        
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        echo $sql;
        return $result;
        }

    function sumarPedido(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();

        // $sql="SELECT * FROM producto WHERE IdProducto=$this->IdProducto";

        // $result=mysqli_query($conexion,$sql);
        // foreach ($result as $registro){
        //     $this->cantidad+=$registro['cantidad'];
        // }

        $sql="UPDATE producto SET cantidad=cantidad+$this->cantidad WHERE IdProducto=$this->IdProducto";
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    
}
