<?php
require_once 'conexionDB.php';

class seguimiento{
    public $idSeguimiento=0;
    public $idPedido="";
    public $idProducto="";
    public $idFactura="";
    public $idUser="";
    public $observacion="";
    public $fechaSeguimiento="";
    public $horaSeguimiento="";

    function seguimientoNuevoPedido($fechaSeguimiento, $horaSeguimiento){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        $sql="INSERT INTO seguimiento (idUser, idPedido, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, $this->idPedido, NULL, 'Ha creado un nuevo pedido', '$fechaSeguimiento', '$horaSeguimiento')";
        
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function seguimientoActualizarCantidadProducto($fechaSeguimiento, $horaSeguimiento){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        $sql="INSERT INTO seguimiento (idUser, idPedido, idProducto, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, NULL,$this->idProducto,NULL, '$this->observacion', '$fechaSeguimiento', '$horaSeguimiento')";
        
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function seguimientoEditarPedido($fechaSeguimiento, $horaSeguimiento){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        $sql="INSERT INTO seguimiento (idUser, idPedido, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, $this->idPedido, NULL, 'Ha modificado un pedido', '$fechaSeguimiento', '$horaSeguimiento')";
        
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function seguimientoValidarPedido($fechaSeguimiento, $horaSeguimiento){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        $sql="INSERT INTO seguimiento (idUser, idPedido, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, $this->idPedido, NULL, 'Ha validado un pedido', '$fechaSeguimiento', '$horaSeguimiento')";
        
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function seguimientoCancelarPedido($fechaSeguimiento, $horaSeguimiento){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        $sql="INSERT INTO seguimiento (idUser, idPedido, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, $this->idPedido, NULL, 'Ha cancelado un pedido', '$fechaSeguimiento', '$horaSeguimiento')";
        
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function seguimientoCambioContrasena($fechaSeguimiento, $horaSeguimiento){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        $sql="INSERT INTO seguimiento (idUser, idPedido, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, NULL, NULL, 'Ha cambiado su contraseña', '$fechaSeguimiento', '$horaSeguimiento')";
        
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function listarSeguimientos(){
    //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();

    $sql="SELECT u.primerNombre, u.primerApellido, s.idSeguimiento, 
    s.IdPedido, s.idFactura, s.idUser, s.idProducto, s.observacion, s.fechaSeguimiento, s.horaSeguimiento 
    FROM usuario u INNER JOIN seguimiento s 
    ON u.idUser=s.idUser";

    //se ejecuta la consulta en la base de datos
    $result=mysqli_query($conexion,$sql);
    //organiza resultado de la consulta y lo retorna
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function listarSeguimientosProductos(){
      //Instancia clase conectar
    $oConexion=new conectar();
    //Establece conexion con la base de datos.
    $conexion=$oConexion->conexion();

    $sql="SELECT u.primerNombre, u.primerApellido, s.idSeguimiento, 
    s.idUser, s.idProducto, s.observacion, s.fechaSeguimiento, s.horaSeguimiento 
    FROM usuario u INNER JOIN seguimiento s 
    ON u.idUser=s.idUser";

    //se ejecuta la consulta en la base de datos
    $result=mysqli_query($conexion,$sql);
    //organiza resultado de la consulta y lo retorna
    return mysqli_fetch_all($result, MYSQLI_ASSOC);  
    }
}
?>