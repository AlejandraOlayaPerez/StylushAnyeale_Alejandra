<?php

require_once 'conexionDB.php';

class empresa{
 public $idEmpresa=0;
 public $nombreEmpresa="";
 public $Nit="";
 public $direccion="";

 function nuevaEmpresa(){
    //instancia la clase conectar
    $oConexion=new conectar();
    //se establece la conexión con la base datos
    $conexion=$oConexion->conexion();
    //sentencia SQL para instertar estudiante

    $sql="INSERT INTO empresa (nombreEmpresa, Nit, direccion, eliminado)
    VALUES ('$this->nombreEmpresa', '$this->Nit', '$this->direccion', false)";

    //ejecuta la sentencia
    $result=mysqli_query($conexion,$sql);
    return $result;
 }

function NitEmpresa(){
    $oConexion= new conectar();
   $conexion=$oConexion->conexion();

   $sql="SELECT * FROM empresa WHERE idEmpresa!=$this->idEmpresa AND Nit='$this->Nit'";

   $result=mysqli_query($conexion,$sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

 function ListarEmpresa(){
    //se instancia el objeto conectar
    $oConexion=new conectar();
    //se establece conexión con la base datos
    $conexion=$oConexion->conexion();

    $sql="SELECT * FROM empresa WHERE eliminado=false";

    //se ejecuta la consulta en la base de datos
    $result=mysqli_query($conexion,$sql);
    $result= mysqli_fetch_all($result, MYSQLI_ASSOC);
    //organiza resultado de la consulta y lo retorna
    return $result;
    }

    function consultarEmpresa($idEmpresa){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();

        //consulta para retornar un solo registro
        $sql="SELECT * FROM empresa WHERE idEmpresa=$idEmpresa";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);

        foreach($result as $registro){ 
            //se registra la consulta en los parametros
         $this->idEmpresa=$registro['idEmpresa'];
         $this->nombreEmpresa=$registro['nombreEmpresa'];
         $this->Nit=$registro['Nit'];
         $this->direccion=$registro['direccion'];
        }
    }

    function actualizarEmpresa(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();

        //consulta para actualizar el registro
        $sql="UPDATE empresa SET nombreEmpresa='$this->nombreEmpresa',
        Nit='$this->Nit',
        direccion='$this->direccion'
        WHERE idEmpresa=$this->idEmpresa";
        
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function eliminarEmpresa(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();

        $sql="UPDATE empresa SET eliminado=1 WHERE idEmpresa=$this->idEmpresa";
    
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
}
