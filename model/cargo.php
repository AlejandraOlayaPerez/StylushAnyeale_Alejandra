<?php
require_once 'conexionDB.php';

class cargo
{

    //atributos de la tabla de cargo
    public $idCargo = 0;
    public $idServicio = "";
    public $numRegistro = "";
    public $numPagina = "";

    //funcion encargada de insertar un nuevo cargo
    function nuevoCargo()
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia para insertar un nuevo cargo
        $sql = "INSERT INTO cargo (IdServicio, eliminado) VALUES ('$this->idServicio', false)";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function paginacionCargo($pagina)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros

        $sql = "SELECT count(IdServicio) as numRegistro, c.idCargo, (SELECT s.nombreServicio FROM servicios s WHERE s.IdServicio=c.IdServicio) 
        as nombreServicio FROM cargo c WHERE c.eliminado=false";

        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }

    public function cargo($pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT c.idCargo, (SELECT s.nombreServicio FROM servicios s WHERE s.IdServicio=c.IdServicio) 
        as nombreServicio FROM cargo c WHERE c.eliminado=false LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $sql;
        return $result;
    }

    function paginacionUsuarioCargo($idCargo, $pagina)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros

        $sql = "SELECT count(idCargo) as numRegistro FROM usuario WHERE idCargo!=$idCargo OR idCargo IS NULL AND eliminado=false";

        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }

    public function usuarioCargo($idCargo, $pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT * FROM usuario WHERE idCargo!=$idCargo OR idCargo IS NULL AND eliminado=false LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $sql;
        return $result;
    }

    function mostrarUsuario($idCargo)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia para seleccionar un empleado 
        $sql = "SELECT * FROM usuario WHERE idCargo!=$idCargo OR idCargo IS NULL AND eliminado=false;";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //esta funcion me permite consultar un cargo
    function consultarCargo($idCargo)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //esta sentencia me permite consultar un cargo
        $sql = "SELECT * FROM cargo WHERE idCargo=$idCargo";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->idCargo = $registro['idCargo'];
            $this->IdServicio = $registro['IdServicio'];
        }
    }

    //esta funcion me permite actualizar la informacion del cargo
    function actualizarCargo()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia que permite actualizar un  cargo
        $sql = "UPDATE cargo SET IdServicio=$this->idServicio
        WHERE idCargo=$this->idCargo";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function eliminarCargo()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE cargo SET eliminado=1 WHERE idCargo=$this->idCargo";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }
}
