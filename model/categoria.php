<?php
require_once 'conexionDB.php';

class categoria{
    public $idCategoria=0;
    public $idProducto="";
    public $categoriaNombre="";

   function crearCategoria()
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO categoria (idProducto, nombreCategoria, eliminado) 
        VALUES (NULL, '$this->nombreCategoria', false)";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function actualizarCategoriaProductos($idProducto){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia que permite actualizar un  cargo
        $sql="UPDATE categoria SET idProducto=$idProducto
        WHERE idCategoria=$this->idCategoria";
            
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function listarCategoriaPaginacion($pagina){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //Buscar numero de registro por filtros
        $sql="SELECT count(idCategoria) as numRegistro FROM categoria WHERE eliminado=false;";
        $result=mysqli_query($conexion, $sql);
        foreach ($result as $registro){
            $this->numRegistro=$registro['numRegistro'];
        }

        //indicamos cuantos elementos vamos a tomar, se le indican los registros que se van a mostrar
        $inicio=(($pagina-1)*10);
        $sql="SELECT * FROM categoria WHERE eliminado=false LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function mostrarCategoriaAjax($categoria){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        if ($categoria != "") {
            $sql = "SELECT * FROM categoria WHERE eliminado=false AND  (nombreCategoria LIKE '%$categoria%')"; //FUNCION PARA BUSCAR TANTO EN CENTRO, LADO DERECHO Y IZQUIERDO
        } else {
            $sql = "SELECT * FROM categoria WHERE eliminado=false";
        }

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function categoria(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();
        
        $sql = "SELECT * FROM categoria WHERE eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function eliminarCategoria()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE categoria SET eliminado=1 WHERE idCategoria=$this->idCategoria";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function consultarCategoria($idCategoria){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //esta sentencia me permite consultar un cargo
        $sql="SELECT * FROM categoria WHERE idCategoria=$idCategoria";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);

        foreach($result as $registro){ 
        //se registra la consulta en los parametros
        $this->idCategoria=$registro['idCategoria'];
        $this->nombreCategoria=$registro['nombreCategoria'];
        }
    }

    function actualizarCategoria(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia que permite actualizar un  cargo
        $sql="UPDATE Categoria SET nombreCategoria='$this->nombreCategoria'
        WHERE idCategoria=$this->idCategoria";
            
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
}


?>