<?php
require_once 'conexionDB.php';

class tags{
    public $idPalabrasClaves=0;
    public $idProducto="";
    public $IdServicio="";
    public $palabrasClaves="";

    function actualizarTagsProducto($idProducto, $tags){
        $result="";
       foreach($tags as $registro){
           $this->tags=$registro;
           $result=$this->actualizarTagsProductos($idProducto);
           if(!$result) 
           break;
       }
       return $result;
   }

   function crearTags($idProducto)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO palabrasClaves (idProducto, IdServicios, palabraClave) 
        VALUES ($idProducto, NULL, '$this->tags')";

        $result = mysqli_query($conexion, $sql);
        echo $sql;
        return $result;
    }

    function actualizarTagsProductos($idProducto){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia que permite actualizar un  cargo
        $sql="UPDATE palabrasClaves SET idProducto=$idProducto
        WHERE idPalabraClave=$this->idPalabrasClaves";
            
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        echo $sql;
        return $result;
    }

    function nuevaTags()
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO palabrasClaves (idProducto, IdServicios, palabraClave) 
        VALUES (NULL, NULL, '$this->palabraClave')";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function listarTags($pagina){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //Buscar numero de registro por filtros
        $sql="SELECT count(idPalabraClave) as numRegistro FROM palabrasclaves WHERE eliminado=false;";
        $result=mysqli_query($conexion, $sql);
        foreach ($result as $registro){
            $this->numRegistro=$registro['numRegistro'];
        }

        //indicamos cuantos elementos vamos a tomar, se le indican los registros que se van a mostrar
        $inicio=(($pagina-1)*10);
        $sql="SELECT * FROM palabrasclaves WHERE eliminado=false LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function mostrarTags($tags){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        if ($tags != "") {
            $sql = "SELECT * FROM palabrasclaves WHERE eliminado=false AND  (palabraClave LIKE '%$tags%')"; //FUNCION PARA BUSCAR TANTO EN CENTRO, LADO DERECHO Y IZQUIERDO
        } else {
            $sql = "SELECT * FROM palabrasclaves WHERE eliminado=false";
        }

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function tags(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();
        
        $sql = "SELECT * FROM palabrasclaves WHERE eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function eliminarTags()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE palabrasclaves SET eliminado=1 WHERE idPalabraClave=$this->idPalabraClave";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function consultarTags($idTags){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //esta sentencia me permite consultar un cargo
        $sql="SELECT * FROM palabrasClaves WHERE idPalabraClave=$idTags";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);

        foreach($result as $registro){ 
        //se registra la consulta en los parametros
        $this->idPalabraClave=$registro['idPalabraClave'];
        $this->palabraClave=$registro['palabraClave'];
        }
    }

    function actualizarTags(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia que permite actualizar un  cargo
        $sql="UPDATE palabrasClaves SET palabraClave='$this->palabraClave'
        WHERE idPalabraClave=$this->idPalabraClave";
            
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
}


?>