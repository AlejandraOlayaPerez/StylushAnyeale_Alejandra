<?php
require_once 'conexiondb.php';


class usuario{
    //el modificador private no permite acceder a los atributos fuera de la clase
    //atributos del modelo usuario
    //$idUser almacenara el id del usuario en la base de datos
    private $idUser="";
    private $nombreUser="";
    private $correoElectronico="";
    private $contrasena="";
    public $idRol="";
    public $eliminado="";

    //estas funciones permitian obtener la informacion de la variable privada
    //funcion get: para obtener o capturar la informacion de la variable, idUser y nombre
    //funcion set: para configurar la informacion de la variable
    public function getIdUser(){
        return $this->idUser;
    }

    public function getNombreUser(){
        return $this->nombreUser;
    }

    public function setIdUsers($idUser){
        $this->idUser=$idUser;
    }

    public function setNombre($nombreUser){
        $this->nombreUser=$nombreUser;
    }
    //funcion que gestiona el registro de los usuarios
    //las variables dentro de los parentesis son parametros que se requieren al utilizar la funcion

    public function nuevoUsuario($nombreUser,$correoElectronico,$contrasena){
        //funcion para encriptar la contraseña utilizando el metodo md5
        $contrasena=md5($contrasena);
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        //se crea la sentencia sql para registrar el usuario
        $sql="INSERT INTO usuario (nombreUser, correoElectronico, contrasena, idRol, eliminado) 
        VALUES ('$nombreUser', '$correoElectronico', '$contrasena', null, false)";

        //ejecuta secuencia, solo cuando es insert.
        $result=mysqli_query($conexion, $sql);
        return $result;
    }

    public function consultarCorreoElectronico($correoElectronico){
       //instancia la clase conectar
       $oConexion=new conectar();
       //se establece la conexión con la base datos
       $conexion=$oConexion->conexion();

       //sentencia que nos permite conocer la existencia de un correo electronico
        $sql="SELECT * FROM usuario WHERE  correoElectronico='$correoElectronico'";
        $result=mysqli_query($conexion, $sql);
        $result=mysqli_fetch_all($result, MYSQLI_ASSOC);

        //retorna el numero de los registros
        foreach($result as $registro){
            $this->idUser=$registro['idUser'];
            $this->nombreUser=$registro['nombreUser'];
            $this->correoElectronico=$registro['correoElectronico'];
        }

        return count($result); 
    }

    function comprobarEliminado($habilitar, $idUser){ //recibe las variables como parametros.
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();
        
        if($habilitar==true){
            //esta condicion se ejecuta si habilitado es verdadero. 
            $sql="UPDATE usuario SET eliminado=0 WHERE idUser=$idUser";
        }else{
            //esta condicion se ejecuta si habilitado es falso.
            $sql="UPDATE usuario SET eliminado=1 WHERE idUser=$idUser";
        }
        //ejecuta la consulta. query=ejecuta y se utiliza como parametros la conexion y la consulta.
        $result=mysqli_query($conexion,$sql);
        //retorna el resultado de la consulta.
        return $result;
    }

    function listarUsuario(){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();

        $sql="SELECT u.idUser, u.nombreUser, u.correoElectronico, u.eliminado, (SELECT r.nombreRol FROM rol r WHERE r.idRol=u.idRol) AS Rol FROM usuario u"; //esta consulta me permite traer el NOMBRE ROL DESDE LA TABLA ROL
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function consultarUsuario(){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();

        $sql="SELECT * FROM usuario WHERE idUser=$this->idUser";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);

        foreach($result as $registro){
            $this->idUser=$registro['idUser'];
            $this->nombre=$registro['nombreUser'];
            $this->correoElectronico=$registro['correoElectronico'];
            $this->contrasena=$registro['contrasena'];
            $this->idRol=$registro['idRol'];
            $this->eliminado=$registro['eliminado'];
        }
    }

    function actualizarUsuario(){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();

        //consulta para actualizar el registro
        $sql="UPDATE usuario SET nombre='$this->nombre',
        correoElectronico='$this->correoElectronico',
        contrasena='$this->contrasena',
        idRol='$this->idRol',
        WHERE idUser=$this->idUser";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
}
?>