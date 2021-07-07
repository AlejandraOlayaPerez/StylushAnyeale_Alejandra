<?php

require_once 'conexiondb.php';
require_once 'usuario.php';

class rol{
    public $idRol=0;
    public $nombreRol="";
    public $nombre="";

    function nuevoRol(){
    //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();

    //Sentencia SQL para insertar nuevo usuario.
    $sql="INSERT INTO rol (nombreRol)
    VALUES ('$this->nombreRol')";

    $result=mysqli_query($conexion,$sql);
    return $result;
    }

    function listarRol(){
    //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();

    $sql="SELECT * FROM rol WHERE eliminado=false";

    //se ejecuta la consulta en la base de datos
    $result=mysqli_query($conexion,$sql);
    //organiza resultado de la consulta y lo retorna
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function consultarRol($idRol){
    //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();

    $sql="SELECT * FROM rol WHERE idRol=$idRol";
    //se ejecuta la consulta
    $result=mysqli_query($conexion,$sql);
    $result=mysqli_fetch_all($result,MYSQLI_ASSOC);

        //almacena los datos de un solo registro en el objeto rol
        foreach($result as $registro){
            $this->idRol=$registro['idRol'];
            $this->nombreRol=$registro['nombreRol'];
        }
    }

    function actualizarRol(){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();

        //consulta para actualizar el registro
        $sql="UPDATE rol SET nombreRol='$this->nombreRol'
        WHERE idRol=$this->idRol";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function eliminarRol(){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();
        //consulta para eliminar el registro
        $sql="UPDATE rol SET eliminado=1 WHERE idRol=$this->idRol";
        // $sql="DELETE FROM estudiante idRol=$this->idRol";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;

    }

}

?>