<?php 

require_once 'conexionDB.php';


class modulo{
    //atributos de la tabla modulo
    public $idModulo=0;
    public $nombreModulo="";

    //esta funcion nos permitira crear un nuevo registro en modulo
    function nuevoModulo(){
    //instancia la clase conectar
    $oConexion=new conectar();
    //se establece la conexión con la base datos
    $conexion=$oConexion->conexion();
    //sentencia SQL para instertar estudiante

    //sentencia de insertar
    $sql="INSERT INTO modulo (nombreModulo)
    VALUES ('$this->nombreModulo')";

    //ejecuta la sentencia
    $result=mysqli_query($conexion,$sql);
    return $result;
    }

    //esta funcion me permitira listar todos los modulos
    function ListarModulo(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //se registra la consulta sql
        $sql="SELECT * FROM modulo WHERE eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //esta funcion permitira consultar un modulo por Id
    function consultarModulo($idModulo){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();

        //consulta para retornar un solo registro
        $sql="SELECT * FROM modulo WHERE idModulo=$idModulo";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);

        foreach($result as $registro){ 
            //se registra la consulta en los parametros
         $this->idModulo=$registro['idModulo'];
         $this->nombreModulo=$registro['nombreModulo'];
        }
    }

    //esta funcion permitira actualizar un modulo
    function actualizarModulo(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();

        //consulta para actualizar el registro
        $sql="UPDATE modulo SET nombreModulo='$this->nombreModulo'
        WHERE idModulo=$this->idModulo";
        
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    //Esta funcion permitira eliminar un modulo
    function eliminarModulo(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();

        //consulta para eliminar el registro
        $sql="UPDATE modulo SET eliminado=1 WHERE idModulo=$this->idModulo";
    
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
}

?>