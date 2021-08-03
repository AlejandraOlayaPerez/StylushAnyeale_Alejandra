<?php
require_once 'conexionDB.php';

class reservacion{

    //atributos de la tabla reservacion
    public $idReservacion=0;
    public $idCliente="";
    public $servicio="";
    public $detalleReservacion="";
    public $estilista="";
    public $fechaReservacion="";
    public $horaReservacion="";
    public $domicilio="";
    public $direccion="";
    public $validar="";
    public $primerNombre="";
    public $primerApellido="";

    //funcion para crear una reservacion
    function nuevaReservacion(){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia que me permite insertar una reservacion
        $sql="INSERT INTO reservacion (idCliente, servicio, detalleReservacion, estilista, fechaReservacion, horaReservacion, domicilio, direccion,validar, eliminado)
        VALUES ($this->idCliente, '$this->servicio', '$this->detalleServicio', '$this->estilista', '$this->fechaReservacion', '$this->horaReservacion',
        '$this->domicilio', '$this->direccion', '$this->validar' false)";

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    //funcion para mostrar las reservaciones
    function listarReservaciones(){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia para listar las reservaciones
        $sql="SELECT * FROM reservacion WHERE eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //esta funcion me trae las reservaciones que existen con el nombre del cliente
    function mostrarReservacion($filtroFecha, $filtroDomicilio, $filtroReservaciones){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        $sql="SELECT c.primerNombre, c.primerApellido, r.idReservacion,
        r.servicio, r.domicilio, r.direccion, r.fechaReservacion, r.horaReservacion, r.validar 
        FROM cliente c INNER JOIN reservacion r ON c.idCliente=r.idCliente
        WHERE r.eliminado=false ";

        //concatenamos a la consulta.
        if ($filtroFecha!=""){
            $sql.="AND r.fechaReservacion='$filtroFecha' ";
        }
        if ($filtroDomicilio!=""){
            $sql.="AND r.domicilio='$filtroDomicilio' ";
        }
        if ($filtroReservaciones!=""){
            $sql.="AND r.validar=$filtroReservaciones";
        }

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion, $sql);
        $result= mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function mostrarReservacionPorIdUser($idUser, $filtroFecha, $filtroDomicilio, $filtroReservaciones){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        $sql="SELECT c.primerNombre, c.primerApellido, r.idReservacion,
        r.servicio, r.domicilio, r.direccion, r.fechaReservacion, r.horaReservacion, r.validar 
        FROM cliente c INNER JOIN reservacion r ON c.idCliente=r.idCliente
        WHERE r.eliminado=false AND r.idUser=$idUser ";

        //concatenamos a la consulta.
        if ($filtroFecha!=""){
            $sql.="AND r.fechaReservacion='$filtroFecha' ";
        }
        if ($filtroDomicilio!=""){
            $sql.="AND r.domicilio='$filtroDomicilio' ";
        }
        if ($filtroReservaciones!=""){
            $sql.="AND r.validar=$filtroReservaciones";
        }

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion, $sql);
        echo $sql; 
        $result= mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    //esta funcion me permite consultar un empleado
     function consultarReservacion(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //esta sentencia me permite consultar un empleado
        $sql="SELECT * FROM reservacion WHERE idReservacion=$this->idReservacion";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);

        foreach($result as $registro){ 
        //se registra la consulta en los parametros
        $this->idReservacion=$registro['idReservacion'];
        $this->idCliente=$registro['idCliente'];
        $this->servicio=$registro['servicio'];
        $this->detalleServicio=$registro['detalleServicio'];
        $this->estilista=$registro['estilista'];
        $this->fechaReservacion=$registro['fechaReservacion'];
        $this->horaReservacion=$registro['horaReservacion'];
        $this->domicilio=$registro['domicilio'];
        $this->direccion=$registro['direccion'];
        $this->validar=$registro['validar'];
        }
    }

    //esta funcion me permite actualizar la informacion del empleado
    function actualizarReservacion(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia que permite actualizar un  empleado
        $sql="UPDATE reservacion SET idCliente=$this->idCliente,
        servicio='$this->servicio',
        detalleServicio='$this->detalleServicio',
        estilista='$this->estilista',
        fechaReservacion='$this->fechaReservacion',
        horaReservacion='$this->horaReservacion',
        domicilio='$this->domicilio',
        direccion='$this->direccion',
        validar='$this->validar'
        WHERE idReservacion=$this->idReservacion";
       
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;

    }

    //elimina una reservacion
    function eliminarReservacion(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();

        //consulta para eliminar el registro
        $sql="UPDATE reservacion SET eliminado=1 WHERE idReservacion=$this->idReservacion";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
    
    //elimina una reservacion
    function validarReservacion(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();

        //consulta para eliminar el registro
        $sql="UPDATE reservacion SET validar=1 WHERE idReservacion=$this->idReservacion";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

}
?>