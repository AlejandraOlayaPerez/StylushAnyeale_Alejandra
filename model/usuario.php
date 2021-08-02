<?php
require_once 'conexiondb.php';


class usuario{
    //el modificador private no permite acceder a los atributos fuera de la clase
    //atributos del modelo usuario
    //$idUser almacenara el id del usuario en la base de datos
    public $idUser=0;
    public $idRol="";
    public $idCargo="";
    public $tipoDocumento="";
    public $documentoIdentidad="";
    public $primerNombre="";
    public $segundoNombre="";
    public $primerApellido="";
    public $segundoApellido="";
    public $fechaNacimiento="";
    public $correoElectronico="";
    public $contrasena="";
    public $telefono="";
    public $genero="";
    public $estadoCivil="";
    public $direccion="";
    public $barrio="";
    public $eliminado="";


    public function nuevoUsuario(){
        //funcion para encriptar la contraseña utilizando el metodo md5
        $this->contrasena=md5($this->contrasena);
        //instancia la clase conecta    r
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        //se crea la sentencia sql para registrar el usuario
        $sql="INSERT INTO usuario (idRol, idCargo, tipoDocumento, documentoIdentidad, primerNombre, segundoNombre, primerApellido, segundoApellido,
        fechaNacimiento, correoElectronico, contrasena, telefono, genero, estadoCivil, direccion, barrio, eliminado) 
        VALUES (9, NULL, '$this->tipoDocumento', $this->documentoIdentidad, '$this->primerNombre', '$this->segundoNombre', '$this->primerApellido', 
        '$this->segundoApellido', '$this->fechaNacimiento', '$this->correoElectronico', '$this->contrasena', $this->telefono, '$this->genero', '$this->estadoCivil', '$this->direccion', '$this->barrio', false)";

        //ejecuta secuencia, solo cuando es insert.
        $result=mysqli_query($conexion, $sql);
        echo $sql;
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

    function mostrarUsuariosPorIdRol($idRol){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();
    
        //Esta consulta nos permite conocer los usuarios registrados en un rol
        $sql="SELECT * FROM usuario WHERE idRol=$idRol AND eliminado=false";
        
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        //arreglo asosiativo de la base de datos
    }
    
    function nuevoUsuarioPorCargo($idCargo, $idUser){
        //instancia la clase conectar
         $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();
    
        $sql="UPDATE usuario SET idCargo=$idCargo WHERE idUser=$idUser";
    
        $result=mysqli_query($conexion,$sql);
        echo $sql;
        return $result;
    }

    function eliminarUsuarioCargo(){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();

        //esta consulta nos permite actualizar el idCargo, volviendola Nulo
        $sql="UPDATE usuario SET idCargo=NULL WHERE idUser=$this->idUser";
        
        //ejecuta la consulta. query=ejecuta y se utiliza como parametros la conexion y la consulta.
        $result=mysqli_query($conexion,$sql);
        //retorna el resultado de la consulta.
        return $result;
    }
    
    function mostrarUsuariosPorIdDiferente($idRol){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();
            
        //esta consulta nos permite conocer a los usuarios que no estan registrados en ese tol
        $sql="SELECT * FROM usuario WHERE idRol IS NULL OR idRol!=$idRol AND eliminado=false";
                
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC); 
    }

    function mostrarUsuario(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia para seleccionar un empleado 
        $sql="SELECT * FROM usuario WHERE eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function actualiazadoEliminadoUsuario($idUser){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();
    
        //esta consulta nos permite actualizar el idRol, volviendola Nulo
        $sql="UPDATE usuario SET idRol=16 WHERE idUser=$idUser";
            
        //ejecuta la consulta. query=ejecuta y se utiliza como parametros la conexion y la consulta.
        $result=mysqli_query($conexion,$sql);
        //retorna el resultado de la consulta.
        return $result;
    }

    function actualizarUsuarioDeRol($idRol, $idUser){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();
    
        $sql="UPDATE usuario SET idRol=$idRol WHERE idUser=$idUser";
            
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
        }

        function listarUsuarioPorCargo($idCargo){
            //se instancia el objeto conectar
            $oConexion=new conectar();
            //se establece conexión con la base datos
            $conexion=$oConexion->conexion();
    
            //sentencia para seleccionar un empleado 
            $sql="SELECT * FROM usuario WHERE idCargo=$idCargo AND eliminado=false";
    
            //se ejecuta la consulta en la base de datos
            $result=mysqli_query($conexion,$sql);
            //organiza resultado de la consulta y lo retorna
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

    function listarUsuario(){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();

        $sql="SELECT u.idUser, u.documentoIdentidad, u.primerNombre, u.primerApellido, u.correoElectronico, u.telefono, u.eliminado, (SELECT r.nombreRol FROM rol r WHERE r.idRol=u.idRol) AS Rol FROM usuario u"; //esta consulta me permite traer el NOMBRE ROL DESDE LA TABLA ROL
        
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function consultarUsuario($idUser){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();

        $sql="SELECT * FROM usuario WHERE idUser=$idUser";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);

        foreach($result as $registro){
            $this->idUser=$registro['idUser'];
            $this->idRol=$registro['idRol'];
            $this->idCargo=$registro['idCargo'];
            $this->tipoDocumento=$registro['tipoDocumento'];
            $this->documentoIdentidad=$registro['documentoIdentidad'];
            $this->primerNombre=$registro['primerNombre'];
            $this->segundoNombre=$registro['segundoNombre'];
            $this->primerApellido=$registro['primerApellido'];
            $this->segundoApellido=$registro['segundoApellido'];
            $this->correoElectronico=$registro['correoElectronico'];
            $this->contrasena=$registro['contrasena'];
            $this->telefono=$registro['telefono'];
            $this->genero=$registro['genero'];
            $this->direccion=$registro['direccion'];
            $this->barrio=$registro['barrio'];
            $this->eliminado=$registro['eliminado'];
        }
    }

    function actualizarUsuario(){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();

        //consulta para actualizar el registro
        $sql="UPDATE usuario SET idRol='$this->idRol',
        tipoDocumento='$this->tipoDocumento',
        documentoIdentidad=$this->documentoIdentidad,
        primerNombre='$this->primerNombre',
        segundoApellido='$this->segundoApellido',
        primerApellido='$this->primerApellido',
        segundoApellido='$this->segundoApellido',
        fechaNacimiento='$this->fechaNacimiento',
        correoElectronico='$this->correoElectronico',
        contrasena='$this->contrasena',
        telefono=$this->telefono,
        genero='$this->genero',
        direccion='$this->direccion',
        barrio='$this->barrio'
        WHERE idUser=$this->idUser";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
}
?>