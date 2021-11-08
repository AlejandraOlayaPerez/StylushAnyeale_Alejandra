<?php

require_once 'conexiondb.php';


class modulo
{

    //La funcion constructor se ejecuta cuando se intancia los objetos, se utiliza para configurar los elementos basicos.
    //Siempre usar :(
    public function __construct()
    {
    }

    //atributos de la tabla modulo
    public $idModulo = 0;
    public $nombreModulo = "";
    public $icono;
    public $numRegistro = "";
    public $numPagina = "";

    //esta funcion nos permitira crear un nuevo registro en modulo
    function nuevoModulo()
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();
        //sentencia SQL para instertar estudiante

        //sentencia de insertar
        $sql = "INSERT INTO modulo (nombreModulo, icono)
    VALUES ('$this->nombreModulo', '$this->icono')";

        //ejecuta la sentencia
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    //esta funcion me permitira listar todos los modulos
    function ListarModulo($pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros
        $sql = "SELECT count(nombreModulo) as numRegistro FROM modulo WHERE eliminado=false;";
        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        //indicamos cuantos elementos vamos a tomar, se le indican los registros que se van a mostrar
        $inicio = (($pagina - 1) * 10);
        //se registra la consulta sql
        $sql = "SELECT * FROM modulo WHERE eliminado=false LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function mostrarModulos($idRol)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //se registra la consulta sql
        $sql = "SELECT * FROM modulo m WHERE m.idModulo 
        IN (SELECT DISTINCT p.idModulo FROM permiso p 
        WHERE p.idRol=$idRol AND p.idModulo=m.idModulo) AND m.eliminado=false 
        ORDER BY m.nombreModulo ASC;";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function paginacionModulo($pagina)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros

        $sql = "SELECT count(idModulo) as numRegistro FROM modulo WHERE eliminado=false ORDER BY nombreModulo ASC";

        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }

    function modulo($pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT * FROM modulo WHERE eliminado=false ORDER BY nombreModulo ASC LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $sql;
        return $result;
    }


    //esta funcion permitira consultar un modulo por Id
    function consultarModulo($idModulo)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para retornar un solo registro
        $sql = "SELECT * FROM modulo WHERE idModulo=$idModulo";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->idModulo = $registro['idModulo'];
            $this->nombreModulo = $registro['nombreModulo'];
            $this->icono = $registro['icono'];
        }
    }

    //esta funcion permitira actualizar un modulo
    function actualizarModulo()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para actualizar el registro
        $sql = "UPDATE modulo SET nombreModulo='$this->nombreModulo',
        icono='$this->icono'
        WHERE idModulo=$this->idModulo";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    //Esta funcion permitira eliminar un modulo
    function eliminarModulo()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE modulo SET eliminado=1 WHERE idModulo=$this->idModulo";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }
}
