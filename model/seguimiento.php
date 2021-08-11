<?php
require_once 'conexionDB.php';

class seguimiento{
    public $idSeguimiento=0;
    public $idPedido="";
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

    function seguimientoCancelarPedido(){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        $sql="INSERT INTO seguimiento (idUser, idPedido, idFactura, observacion, fechaSeguimiento, horaSeguimiento)
        VALUES ($this->idUser, $this->idPedido, NULL, 'Ha cancelado un pedido', $'$this->fechaSeguimiento', $this->horaSeguimiento)";
        
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
}
?>