<?php

require_once 'conexionDB.php';

class pagina{
    //atributos de la tabla pagina
    public $idPagina=0;
    public $idModulo="";
    public $nombrePagina="";
    public $enlace="";
    // public $nombreModulo="";
    // public $idRol="";
    public $requireSession="";


    function nuevoPagina(){
    //instancia la clase conectar
    $oConexion=new conectar();
    //se establece la conexión con la base datos
    $conexion=$oConexion->conexion();
    //sentencia SQL para instertar estudiante

    //sentencia de insertar en la tabla pagina
    $sql="INSERT INTO pagina (idModulo, nombrePagina, enlace, requireSession, eliminado)
    VALUES ($this->idModulo, '$this->nombrePagina', '$this->enlace', $this->requireSession, false)";

    //ejecuta la sentencia
    $result=mysqli_query($conexion,$sql);
    return $result;
    }

    function ListarPagina(){
    //se instancia el objeto conectar
    $oConexion=new conectar();
    //se establece conexión con la base datos
    $conexion=$oConexion->conexion();

    //se registra la consulta sql
    $sql="SELECT * FROM pagina WHERE idModulo=$this->idModulo AND eliminado=false";
    
    //se ejecuta la consulta en la base de datos
    $result=mysqli_query($conexion,$sql);
    //organiza resultado de la consulta y lo retorna
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function consultarPagina($idPagina){
    //se instancia el objeto conectar
    $oConexion= new conectar();
    //se establece conexión con la base de datos
    $conexion=$oConexion->conexion();
    //consulta para retornar un solo registro
    $sql="SELECT * FROM pagina WHERE idPagina=$idPagina";
    //se ejecuta la consulta
    $result=mysqli_query($conexion,$sql);
    $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($result as $registro){ 
        //se registra la consulta en los parametros
        $this->idPagina=$registro['idPagina'];
        $this->idModulo=$registro['idModulo'];
        $this->nombrePagina=$registro['nombrePagina'];
        $this->enlace=$registro['enlace'];
        $this->requireSession=$registro['requireSession'];
        }
    }
    
    // function consultarPaginaPorUrl($url){
    //     //se instancia el objeto conectar
    //     $oConexion= new conectar();
    //     //se establece conexión con la base de datos
    //     $conexion=$oConexion->conexion();
    //     //consulta para retornar un solo registro
    //     $sql="SELECT * FROM pagina WHERE enlace='$url'";
    //     //se ejecuta la consulta
    //     $result=mysqli_query($conexion,$sql);
    //     $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
    //     foreach($result as $registro){ 
    //         //se registra la consulta en los parametros
    //         $this->id=$registro['id'];
    //         $this->idModulo=$registro['idModulo'];
    //         $this->nombre=$registro['nombre'];
    //         $this->enlace=$registro['enlace'];
    //         $this->requireSession=$registro['requireSession'];
    //         }
    //         // print_r($result);
    //         // echo $url;
    //     }

    function actualizarPagina(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();
        //consulta para actualizar el registro

        $sql="UPDATE pagina SET nombrePagina='$this->nombrePagina',
        enlace='$this->enlace',
        requireSession=$this->requireSession
        WHERE idPagina=$this->idPagina";
        
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        
        return $result;
    }

    function eliminarPagina(){
    //se instancia el objeto conectar
    $oConexion= new conectar();
    //se establece conexión con la base de datos
    $conexion=$oConexion->conexion();
    
    //consulta para eliminar el registro
    $sql="UPDATE pagina SET eliminado=1 WHERE idPagina=$this->idPagina";
    
    //se ejecuta la consulta
    $result=mysqli_query($conexion,$sql);
    return $result;
    }

}
