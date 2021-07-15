<?php 
require_once 'conexiondb.php';

class permiso{
  public $idRol="";
  public $idModulo="";
  public $idPagina="";
  public $idUser="";

    function consultarPermiso($idRol, $idPagina){
    //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();
    
    $sql="SELECT * FROM permiso per INNER JOIN pagina pag ON per.idPagina=pag.idPagina
    WHERE per.idRol=$idRol AND pag.idPagina=$idPagina";
    
    $result=mysqli_query($conexion,$sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;
    }

    //esta funcion nos permite consultar un permiso por medio de la URL
    function consultarPermisoUrl($idUser, $url){
    //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();

    $sql="SELECT * FROM permiso p INNER JOIN usuario u ON p.idRol=u.idRol
    INNER JOIN pagina pa ON pa.idPagina=p.idPagina 
    WHERE u.idUser=$idUser AND pa.enlace='$url'";

    $result=mysqli_query($conexion,$sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;
    }

    function mostrarPermisos(){
    //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();
    
    $sql="SELECT nombre FROM pagina p INNER JOIN permiso per ON p.idPagina=per.idPagina WHERE idRol=$this->idRol";

    $result=mysqli_query($conexion,$sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;
    }

    function eliminarPermisoDeRol($idRol){
    //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();

    $sql="DELETE FROM permiso WHERE idRol=$idRol";
    $result=mysqli_query($conexion,$sql);
    return $result;
    }

    function insertarPermisoDeRol($idRol,$idModulo,$idPagina){
    //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();
    
    $sql="INSERT INTO permiso (idRol,idModulo,idPagina) VALUES ($idRol, $idModulo, $idPagina)";

    $result=mysqli_query($conexion,$sql);
    return $result;
    }
}
?>