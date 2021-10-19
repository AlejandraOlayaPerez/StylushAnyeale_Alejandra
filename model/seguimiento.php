<?php
require_once 'conexionDB.php';

class seguimiento
{
    public $idSeguimiento = 0;
    public $idPedido = "";
    public $idProducto = "";
    public $idServicio = "";
    public $idFactura = "";
    public $idUser = "";
    public $observacion = "";
    public $fechaSeguimiento = "";
    public $horaSeguimiento = "";

    function seguimientoNuevoPedido($fechaSeguimiento, $horaSeguimiento)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO seguimiento (idUser, idPedido, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, $this->idPedido, NULL, 'Ha creado un nuevo pedido', '$fechaSeguimiento', '$horaSeguimiento')";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function seguimientoNuevoProducto($fechaSeguimiento, $horaSeguimiento)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO seguimiento (idUser, idPedido, idProducto, idServicio, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, NULL, $this->idProducto, NULL, NULL, 'Ha creado un nuevo producto', '$fechaSeguimiento', '$horaSeguimiento')";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function seguimientoNuevoServicio($fechaSeguimiento, $horaSeguimiento)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO seguimiento (idUser, idPedido, idProducto, idServicio, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, NULL, NULL, $this->idServicio, NULL, 'Ha creado un nuevo servicio', '$fechaSeguimiento', '$horaSeguimiento')";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function seguimientoEliminarProducto($fechaSeguimiento, $horaSeguimiento)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO seguimiento (idUser, idPedido, idProducto, idServicio, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, NULL, $this->idProducto, NULL, NULL, 'Se ha eliminado el producto', '$fechaSeguimiento', '$horaSeguimiento')";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function seguimientoEliminarServicio($fechaSeguimiento, $horaSeguimiento){
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO seguimiento (idUser, idPedido, idProducto, idServicio, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, NULL, NULL, $this->idServicio, NULL, 'Se ha eliminado el servicio', '$fechaSeguimiento', '$horaSeguimiento')";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function seguimientoActualizarCantidadProducto($fechaSeguimiento, $horaSeguimiento)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO seguimiento (idUser, idPedido, idProducto, idServicio, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, NULL, $this->idProducto,NULL,NULL, '$this->observacion', '$fechaSeguimiento', '$horaSeguimiento')";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        echo $sql;
        return $result;
    }

    function seguimientoEditarPedido($fechaSeguimiento, $horaSeguimiento)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO seguimiento (idUser, idPedido, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, $this->idPedido, NULL, 'Ha modificado un pedido', '$fechaSeguimiento', '$horaSeguimiento')";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function seguimientoValidarPedido($fechaSeguimiento, $horaSeguimiento)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO seguimiento (idUser, idPedido, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, $this->idPedido, NULL, 'Ha validado un pedido', '$fechaSeguimiento', '$horaSeguimiento')";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function seguimientoCancelarPedido($fechaSeguimiento, $horaSeguimiento)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO seguimiento (idUser, idPedido, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, $this->idPedido, NULL, 'Ha cancelado un pedido', '$fechaSeguimiento', '$horaSeguimiento')";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function seguimientoCambioContrasena($fechaSeguimiento, $horaSeguimiento)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO seguimiento (idUser, idPedido, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, NULL, NULL, 'Ha cambiado su contraseña', '$fechaSeguimiento', '$horaSeguimiento')";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function listarSeguimientos()
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT u.primerNombre, u.primerApellido, s.idSeguimiento, 
    s.IdPedido, s.idFactura, s.idUser, s.idProducto, s.observacion, s.fechaSeguimiento, s.horaSeguimiento 
    FROM usuario u INNER JOIN seguimiento s 
    ON u.idUser=s.idUser";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function listarSeguimientosProductos()
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT u.primerNombre, u.primerApellido, s.idSeguimiento, 
    s.idUser, s.idProducto, s.observacion, s.fechaSeguimiento, s.horaSeguimiento 
    FROM usuario u INNER JOIN seguimiento s 
    ON u.idUser=s.idUser";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function consultarSeguimientoPedido($idPedido)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM usuario u INNER JOIN seguimiento s 
    ON u.idUser=s.idUser WHERE IdPedido=$idPedido";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function consultarSeguimientoFactura($idFactura)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM usuario u INNER JOIN seguimiento s 
        ON u.idUser=s.idUser WHERE idFactura=$idFactura";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function consultarSeguimientoProducto($idProducto)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM usuario u INNER JOIN seguimiento s 
            ON u.idUser=s.idUser WHERE idProducto=$idProducto";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function consultarSeguimientoServicio($idServicio)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM usuario u INNER JOIN seguimiento s 
                ON u.idUser=s.idUser WHERE idServicio=$idServicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function consultarSeguimientoUser($idUser)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM usuario u INNER JOIN seguimiento s 
                    ON u.idUser=s.idUser WHERE idUser=$idUser";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
