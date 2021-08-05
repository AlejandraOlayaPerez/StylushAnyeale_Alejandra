<?php
require_once 'conexionDB.php';

class cliente{

    //atributos de la tabla de cliente
    public $idCliente=0;
    public $tipoDocumento="";
    public $documentoIdentidad="";
    public $primerNombre="";
    public $segundoNombre="";
    public $primerApellido="";
    public $segundoApellido="";
    public $fechaNacimiento="";
    public $genero="";
    public $direccion="";
    public $barrio="";
    public $email="";
    public $telefono="";

    //funcion encargada de insertar un nuevo cliente
    function nuevoCliente(){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia para insertar un nuevo Cliente
        $sql="INSERT INTO cliente (Tipodocumento, Documentoidentidad, primerNombre, segundoNombre, 
        primerApellido, segundoApellido, fechaNacimiento, genero, direccion, barrio, email, telefono, eliminado) 
        VALUES ('$this->tipoDocumento', $this->documentoIdentidad, '$this->primerNombre', '$this->segundoNombre', '$this->primerApellido', 
        '$this->segundoApellido', '$this->fechaNacimiento', '$this->genero', '$this->direccion', '$this->barrio', '$this->email', $this->telefono, false)";

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    public function consultarCorreoElectronico($email){
        $oConexion=new conectar();
        $conexion=$oConexion->conexion();

        $sql="SELECT * FROM cliente WHERE email='$email'";
        $result=mysqli_query($conexion, $sql);
        $result=mysqli_fetch_all($result, MYSQLI_ASSOC);

        //retorna el numero de los registros
        foreach($result as $registro){
            $this->idUser=$registro['idCliente'];
            $this->primerNombre=$registro['primerNombre'];
            $this->email=$registro['email'];
        }
        return count($result); 
    }

    public function registroUsuario($nombre,$email,$contrasena){
        //funcion para encriptar la contraseña utilizando el metodo md5
        $contrasena=md5($contrasena);
        $oConexion=new conectar();
        $conexion=$oConexion->conexion();

        //se crea la sentencia sql para registrar el usuario
        $sql="INSERT INTO cliente (primerNombre, email, contrasena, eliminado) 
        VALUES ('$nombre', '$email', '$contrasena', false)";
        
        //ejecuta secuencia, solo cuando es insert.
        $result=mysqli_query($conexion, $sql);
        return $result;
    }

    //esta funcion me permitira mostrar toda la informacion
    function listarCliente(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia para seleccionar un cliente
        $sql="SELECT * FROM cliente WHERE eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //esta funcion me permite consultar un cliente
    function consultarCliente($idCliente){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //esta sentencia me permite consultar un cliente
        $sql="SELECT * FROM cliente WHERE idCliente=$idCliente";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);

        foreach($result as $registro){ 
        //se registra la consulta en los parametros
        $this->idCliente=$registro['idCliente'];
        $this->tipoDocumento=$registro['tipoDocumento'];
        $this->documentoIdentidad=$registro['documentoIdentidad'];
        $this->primerNombre=$registro['primerNombre'];
        $this->segundoNombre=$registro['segundoNombre'];
        $this->primerApellido=$registro['primerApellido'];
        $this->segundoApellido=$registro['segundoApellido'];
        $this->fechaNacimiento=$registro['fechaNacimiento'];
        $this->genero=$registro['genero'];
        $this->direccion=$registro['direccion'];
        $this->barrio=$registro['barrio'];
        $this->email=$registro['email']; 
        $this->telefono=$registro['telefono'];
        }
    }

    //esta funcion me permite actualizar la informacion del cliente
    function actualizarCliente(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia que permite actualizar cliente
        $sql="UPDATE cliente SET tipoDocumento='$this->tipoDocumento',
        documentoIdentidad=$this->documentoIdentidad,
        primerNombre='$this->primerNombre',
        segundoApellido='$this->segundoApellido',
        primerApellido='$this->primerApellido',
        segundoApellido='$this->segundoApellido',
        fechaNacimiento=$this->fechaNacimiento,
        genero='$this->genero',
        direccion='$this->direccion',
        barrio='$this->barrio',
        email='$this->email',
        telefono=$this->telefono
        WHERE idCliente=$this->idCliente";
       
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;

    }

    function eliminarCliente(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();

        //consulta para eliminar el registro
        $sql="UPDATE cliente SET eliminado=1 WHERE idCliente=$this->idCliente";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
}
