<?php

require_once 'conexionDB.php';


class foto
{
    public $ifFoto = 0;
    public $idServicio = "";
    public $idProducto = "";
    public $idCliente = "";
    public $idUser = "";
    public $fotoProducto = "";
    public $fotoServicio1 = "";
    public $fotoperfilUsuario = "";
    public $fotoBiografiaUsuario = "";
    public $fotoperfilCliente = "";


    function mostrarFotoUsuario($idUser)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT fotoPerfilUsuario FROM detalleFoto WHERE idUser=$idUser";

        //ejecuta la consulta. query=ejecuta y se utiliza como parametros la conexion y la consulta.
        $result = mysqli_query($conexion, $sql);
        //retorna el resultado de la consulta.

        foreach ($result as $registro) {
            $this->fotoPerfilUsuario = $registro['fotoPerfilUsuario'];
        }
    }

    function mostrarFotoClientePerfil($idCliente)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT fotoPerfilCliente FROM detalleFoto WHERE idCliente=$idCliente";

        //ejecuta la consulta. query=ejecuta y se utiliza como parametros la conexion y la consulta.
        $result = mysqli_query($conexion, $sql);
        //retorna el resultado de la consulta.

        foreach ($result as $registro) {
            $this->fotoPerfilCliente = $registro['fotoPerfilCliente'];
        }
    }

    function actualizarFotoPerfil($idUser)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "UPDATE detalleFoto SET fotoPerfilUsuario='$this->fotoPerfilUsuario' WHERE idUser=$idUser";

        //ejecuta la consulta. query=ejecuta y se utiliza como parametros la conexion y la consulta.
        $result = mysqli_query($conexion, $sql);
        echo $sql;
        //retorna el resultado de la consulta.
        return $result;
    }

    function actualizarFotoPerfilCliente($idCliente)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "UPDATE detalleFoto SET fotoPerfilCliente='$this->fotoPerfilCliente' WHERE idCliente=$idCliente";

        //ejecuta la consulta. query=ejecuta y se utiliza como parametros la conexion y la consulta.
        $result = mysqli_query($conexion, $sql);
        echo $sql;
        //retorna el resultado de la consulta.
        return $result;
    }

    public function insertarImagenCliente()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO detalleFoto(idProducto, IdServicio, idUser, idCliente, fotoPerfilCliente)
    VALUES (NULL, NULL, NULL, $this->idCliente, '$this->fotoPerfilCliente')";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function insertarImagenesProducto()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO detalleFoto(idProducto, IdServicios, idUser, idCliente, fotoProducto)
     VALUES ($this->idProducto, NULL, NULL, NULL, '$this->fotoProducto')";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function consultarImagenesIdProducto($idProducto)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql="SELECT *, (SELECT d.fotoProducto FROM detallefoto d WHERE d.idProducto=p.IdProducto LIMIT 1) as fotoProducto FROM producto p WHERE p.eliminado=false AND p.IdProducto=$idProducto";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }
}
