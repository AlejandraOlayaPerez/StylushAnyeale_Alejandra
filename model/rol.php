<?php

require_once 'conexiondb.php';

class rol
{
    public $idRol = 0;
    public $nombreRol = "";
    public $nombre = "";
    public $numRegistro = "";
    public $numPagina = "";

    function nuevoRol()
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //Sentencia SQL para insertar nuevo usuario.
        $sql = "INSERT INTO rol (nombreRol)
    VALUES ('$this->nombreRol')";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function listarRol()
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM rol WHERE eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function mostrarServicio()
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql="SELECT c.idCargo, (SELECT s.nombreServicio FROM servicios s WHERE s.IdServicio=c.IdServicio) as rol FROM cargo c WHERE c.eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function paginacionDetalleRol($idRol, $pagina)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros

        $sql = "SELECT count(documentoIdentidad) as numRegistro FROM usuario WHERE idRol=$idRol AND eliminado=false ORDER BY primerNombre ASC";

        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }

    function detalleRol($idRol, $pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT * FROM usuario WHERE idRol=$idRol AND eliminado=false ORDER BY primerNombre ASC LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $sql;
        return $result;
    }

    function paginacionRol($pagina)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros

        $sql = "SELECT count(nombreRol) as numRegistro FROM rol WHERE eliminado=false ORDER BY nombreRol ASC";

        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }

    function rol($pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT * FROM rol WHERE eliminado=false ORDER BY nombreRol ASC LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $sql;
        return $result;
    }

    function consultarRol($idRol)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM rol WHERE idRol=$idRol";
        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //almacena los datos de un solo registro en el objeto rol
        foreach ($result as $registro) {
            $this->idRol = $registro['idRol'];
            $this->nombreRol = $registro['nombreRol'];
        }
    }

    function actualizarRol()
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //consulta para actualizar el registro
        $sql = "UPDATE rol SET nombreRol='$this->nombreRol'
        WHERE idRol=$this->idRol";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function eliminarRol()
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();
        //consulta para eliminar el registro
        $sql = "UPDATE rol SET eliminado=1 WHERE idRol=$this->idRol";
        // $sql="DELETE FROM estudiante idRol=$this->idRol";
        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }
}
