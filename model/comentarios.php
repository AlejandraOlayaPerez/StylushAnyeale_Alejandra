<?php
require_once 'conexiondb.php';

class comentario
{
    //La funcion constructor se ejecuta cuando se intancia los objetos, se utiliza para configurar los elementos basicos.
    //Siempre usar :(
    public function __construct()
    {
    }
    
    //atributos de la tabla de cliente
    public $idPregunta = 0;
    public $idProducto = "";
    public $idUser = "";
    public $idCliente = "";
    public $pregunta = "";
    public $idRespuesta = "";
    public $fechaComentario = "";
    public $horaComentario = "";

    function insertarComentarioProducto($fechaComentario, $horaComentario)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO comentario (idProducto, idCliente, pregunta, idRespuesta, fechaComentario, horaComentario)
        VALUES ($this->idProducto, $this->idCliente, '$this->comentario', NULL, '$fechaComentario', '$horaComentario')";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function insertarComentarioCliente($fechaComentario, $horaComentario)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO comentario (idProducto, idUser, idCliente, pregunta, idRespuesta, fechaComentario, horaComentario)
        VALUES (NULL, NULL, $this->idCliente, '$this->comentario', NULL, '$fechaComentario', '$horaComentario')";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function respuestaComentario($fechaComentario, $horaComentario)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO comentario (idProducto, idCliente, pregunta, idRespuesta, fechaComentario, horaComentario)
         VALUES ($this->idProducto, $this->idCliente, '$this->respuesta', $this->idPregunta, '$fechaComentario', '$horaComentario')";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function listarComentario($idProducto, $idCliente)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT *, (SELECT df.fotoPerfil FROM detallefoto df WHERE df.idCliente=c.idCliente) as perfilCliente FROM cliente c INNER JOIN comentario cm ON c.idCliente=cm.idCliente WHERE cm.idProducto=$idProducto";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function listarComentarioCliente()
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT *, (SELECT df.fotoPerfil FROM detallefoto df WHERE df.idCliente=c.idCliente) as perfilCliente FROM cliente c INNER JOIN comentario cm ON c.idCliente=cm.idCliente WHERE cm.idProducto IS NULL";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }
}
