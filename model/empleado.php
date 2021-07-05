
<?php 

require_once 'conexionDB.php';

class empleado{

    //atributos de la tabla de empleado
    public $idEmpleado=0;
    public $idCargo="";
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
    public $nivelEstudio="";
    public $experienciaLaboral="";
    public $estadoCivil="";

    //funcion encargada de insertar un nuevo empleado
    function nuevoEmpleado(){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        //me permite saber si la funcion es diferente a cero
         if(sizeof($this->consultarIdDiferenteDeEmpleado())!=0){
             return "empleado existe";
        }else{
            //sentencia para insertar un nuevo empleado
            $sql="INSERT INTO empleado (idCargo, Tipodocumento, Documentoidentidad, primerNombre, segundoNombre, 
            primerApellido, segundoApellido, fechaNacimiento, genero, direccion, barrio, email, telefono, nivelEstudio, experienciaLaboral, estadoCivil, eliminado) 
            VALUES ($this->idCargo, '$this->tipoDocumento', $this->documentoIdentidad, '$this->primerNombre', '$this->segundoNombre', '$this->primerApellido', 
            '$this->segundoApellido', $this->fechaNacimiento, '$this->genero', '$this->direccion', '$this->barrio', '$this->email', $this->telefono, '$this->nivelEstudio',
            '$this->experienciaLaboral', '$this->estadoCivil', false)";
        }

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    //esta funcion me permite consultar un empleado con numero documento, con idempleado distinto.
    function consultarIdDiferenteDeEmpleado(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia para seleccionar empleados con  idempleado diferentes.
       $sql="SELECT * FROM empleado WHERE idEmpleado!=$this->idEmpleado AND tipoDocumento='$this->tipoDocumento' AND documentoIdentidad=$this->documentoIdentidad";

       //se ejecuta la consulta en la base de datos
       $result=mysqli_query($conexion,$sql);
       echo $sql;
       //organiza resultado de la consulta y lo retorna
       return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //esta funcion me permitira mostrar toda la informacion
    function listarEmpleado($idCargo){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia para seleccionar un empleado 
        $sql="SELECT * FROM empleado WHERE idCargo=$idCargo AND eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //esta funcion me permite consultar un empleado
    function consultarEmpleado($idEmpleado){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //esta sentencia me permite consultar un empleado
        $sql="SELECT * FROM empleado WHERE idEmpleado=$idEmpleado";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);

        foreach($result as $registro){ 
        //se registra la consulta en los parametros
        $this->idEmpleado=$registro['idEmpleado'];
        $this->idCargo=$registro['idCargo'];
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
        $this->nivelEstudio=$registro['nivelEstudio'];
        $this->experienciaLaboral=$registro['experienciaLaboral'];
        $this->estadoCivil=$registro['estadoCivil'];
        }
    }

    //esta funcion me permite actualizar la informacion del empleado
    function actualizarEmpleado(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia que permite actualizar un  empleado
        $sql="UPDATE empleado SET tipoDocumento='$this->tipoDocumento',
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
        telefono=$this->telefono,
        nivelEstudio='$this->nivelEstudio',
        experienciaLaboral='$this->experienciaLaboral',
        estadoCivil='$this->estadoCivil'
        WHERE idEmpleado=$this->idEmpleado";
       
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;

    }

    function eliminarEmpleado(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();

        //consulta para eliminar el registro
        $sql="UPDATE empleado SET eliminado=1 WHERE idEmpleado=$this->idEmpleado";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
}
?>