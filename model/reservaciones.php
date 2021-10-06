<?php
require_once 'conexionDB.php';

class reservacion
{

    //atributos de la tabla reservacion
    public $idReservacion = 0;
    public $idCliente = "";
    public $servicio = "";
    public $nombres = "";
    public $apellidos = "";
    public $telefono = "";
    public $detalleReservacion = "";
    public $estilista = "";
    public $fechaReservacion = "";
    public $horaReservacion = "";
    public $domicilio = "";
    public $direccion = "";
    public $validar = "";
    public $primerNombre = "";
    public $primerApellido = "";

    function servicioMasivo($idReservacion, $servicio, $idCliente, $nombres, $apellidos, $telefono, $fechaReservacion, $horaReservacion, $domicilio, $direccion)
    {
        $result = "";
        foreach ($servicio as $registro) {
            $this->idServicio = $registro;
            $result = $this->nuevaReservacion($idReservacion, $idCliente, $nombres, $apellidos, $telefono, $fechaReservacion, $horaReservacion, $domicilio, $direccion);
            if (!$result)
                break;
        }
        return $result;
    }



    //funcion para crear una reservacion
    function nuevaReservacion($horaFinal, $costo)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia que me permite insertar una reservacion
        $sql = "INSERT INTO reservacion (idReservacion, idCliente, idUser, idServicio, nombres, apellidos, telefono, fechaReservacion, horaReservacion, horaFinal, domicilio, direccion, precio, validar, eliminado)
        VALUES ($this->idReservacion, $this->idCliente, $this->idUser, $this->idServicio, '$this->nombres', '$this->apellidos', $this->telefono, '$this->fechaReservacion', '$this->horaReservacion', '$horaFinal',
        '$this->domicilio', '$this->direccion', $costo, false, false)";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        echo $sql;
        return $result;
    }

    function consultarExisteReservacion($idReservacion)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM reservacion WHERE idReservacion='$idReservacion'";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //funcion para mostrar las reservaciones
    function listarReservaciones()
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia para listar las reservaciones
        $sql = "SELECT c.primerNombre, c.primerApellido, r.idReservacion,
        r.servicio, r.domicilio, r.direccion, r.fechaReservacion, r.horaReservacion, r.validar 
        FROM cliente c INNER JOIN reservacion r ON c.idCliente=r.idCliente
        WHERE r.eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //esta funcion me trae las reservaciones que existen con el nombre del cliente
    function mostrarReservacion($fecha, $domicilio, $validar, $cancelar)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT *, 
        (SELECT s.nombreServicio FROM servicios s WHERE s.IdServicio=r.idServicio) AS nombreServicio 
        FROM cliente c INNER JOIN reservacion r ON c.idCliente=r.idCliente ";

        //concatenamos a la consulta.
        if ($fecha != "") {
            $sql .= "WHERE r.fechaReservacion='$fecha' ";
        }
        if ($domicilio != "") {
            $sql .= "WHERE r.domicilio=$domicilio ";
        }
        if ($validar != "") {
            $sql .= "WHERE r.validar=$validar";
        }
        if ($cancelar != "") {
            $sql .= "WHERE r.eliminado=$cancelar";
        }

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    public function consultarClientePorCC($tipoDocumento, $documentoIdentidad)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia que nos permite conocer la existencia de un correo electronico
        $sql = "SELECT * FROM cliente WHERE eliminado=false ";

        if ($tipoDocumento != "") {
            $sql .= " AND tipoDocumento='$tipoDocumento' ";
        }
        if ($documentoIdentidad != "") {
            $sql .= " AND documentoIdentidad=$documentoIdentidad ";
        }

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    public function consultarReservacionId($idCliente)
    {
        // instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT r.idReservacion, r.fechaReservacion, r.horaReservacion, r.domicilio, r.direccion, r.precio, 
        (SELECT s.nombreServicio FROM servicios s WHERE s.IdServicio=r.idServicio) AS nombreServicio 
        FROM reservacion r WHERE r.idCliente=$idCliente AND r.eliminado=false AND r.validar=false";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    public function consultarTiempoServicio($idServicio)
    {
        // instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT tiempoDuracion FROM servicios WHERE IdServicio=$idServicio";

        $result = mysqli_query($conexion, $sql);

        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($result as $registro) {
            $this->tiempoDuracion = $registro['tiempoDuracion'];
        }
        return $this->tiempoDuracion;
    }

    function consultarReservacion($idReservacion)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();
        //consulta para retornar un solo registro

        $sql = "SELECT * FROM reservacion WHERE idReservacion=$idReservacion";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->idReservacion = $registro['idReservacion'];
            $this->idCliente = $registro['idCliente'];
            $this->idUser = $registro['idUser'];
            $this->idServicio = $registro['idServicio'];
            $this->nombres = $registro['nombres'];
            $this->apellidos = $registro['apellidos'];
            $this->telefono = $registro['telefono'];
            $this->fechaReservacion = $registro['fechaReservacion'];
            $this->horaReservacion = $registro['horaReservacion'];
            $this->horaFinal = $registro['horaFinal'];
            $this->domicilio = $registro['domicilio'];
            $this->validar = $registro['validar'];
            $this->direccion = $registro['direccion'];
            $this->precio = $registro['precio'];
        }
    }

    function consultarReservacionParaHorario($idUser, $fechaReservacion, $horarioReservacion)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //Estilista, fechaReservacion, hora solicitar
        $sql = "SELECT * FROM reservacion WHERE idUser=$idUser AND fechaReservacion='$fechaReservacion' AND '$horarioReservacion' BETWEEN horaReservacion AND horaFinal";
        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    //esta funcion me permite actualizar la informacion del empleado
    function actualizarReservacion($horaFinal)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia que permite actualizar un  empleado
        $sql = "UPDATE reservacion SET idCliente=$this->idCliente, 
        idServicio=$this->idUser, 
        idUser=$this->idUser, 
        nombres='$this->nombres', 
        apellidos='$this->apellidos', 
        telefono=$this->telefono, 
        fechaReservacion='$this->fechaReservacion', 
        horaReservacion='$this->horaReservacion', 
        horaFinal='$horaFinal', 
        domicilio=$this->domicilio, 
        direccion='$this->direccion', 
        precio=0.00,
        validar=0 
        WHERE idReservacion=$this->idReservacion;";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    //elimina una reservacion
    function eliminarReservacion()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE reservacion SET eliminado=1 WHERE idReservacion=$this->idReservacion";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function listarReservacionesPorIdCliente($idCliente)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia para listar las reservaciones
        $sql = "SELECT c.idCliente, 
        r.idReservacion, r.fechaReservacion, r.horaReservacion, r.horaFinal, r.domicilio, r.validar, r.direccion, r.precio,
        s.IdServicio, s.nombreServicio, 
        u.idUser, CONCAT(u.primerNombre,' ',u.primerApellido) as estilista 
        FROM cliente c 
        INNER JOIN reservacion r ON c.idCliente=r.idCliente 
        INNER JOIN usuario u ON u.idUser=r.idUser 
        INNER JOIN servicios s ON r.idServicio=s.IdServicio 
        WHERE r.eliminado=false AND r.idCliente=$idCliente AND r.validar=false";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //elimina una reservacion
    function validarReservacion()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE reservacion SET validar=1 WHERE idReservacion=$this->idReservacion";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }
}
