<?php

require_once 'conexiondb.php';

class pagina
{
    //atributos de la tabla pagina
    public $idPagina = 0;
    public $idModulo = "";
    public $nombrePagina = "";
    public $enlace = "";
    public $numRegistro = "";
    public $numPagina = "";
    // public $nombreModulo="";
    // public $idRol="";
    public $requireSession = "";
    public $menu = "";


    function nuevoPagina()
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();
        //sentencia SQL para instertar estudiante

        //sentencia de insertar en la tabla pagina
        $sql = "INSERT INTO pagina (idModulo, nombrePagina, enlace, requireSession, menu, eliminado)
        VALUES ($this->idModulo, '$this->nombrePagina', '$this->enlace', $this->requireSession, $this->menu, false)";

        //ejecuta la sentencia
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function paginacionPagina($idModulo, $pagina)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros

        $sql = "SELECT count(idPagina) as numRegistro FROM pagina WHERE idModulo=$idModulo AND eliminado=false ORDER BY nombrePagina ASC";

        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }

    function pagina($idModulo, $pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT * FROM pagina WHERE idModulo=$idModulo AND eliminado=false ORDER BY nombrePagina ASC LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $sql;
        return $result;
    }

    function mostrarPagina()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM pagina WHERE idModulo=$this->idModulo AND eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function consultarPagina($idPagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();
        //consulta para retornar un solo registro
        $sql = "SELECT * FROM pagina WHERE idPagina=$idPagina";
        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->idPagina = $registro['idPagina'];
            $this->idModulo = $registro['idModulo'];
            $this->nombrePagina = $registro['nombrePagina'];
            $this->enlace = $registro['enlace'];
            $this->requireSession = $registro['requireSession'];
            $this->menu = $registro['menu'];
        }
    }

    function actualizarPagina()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();
        //consulta para actualizar el registro

        $sql = "UPDATE pagina SET nombrePagina='$this->nombrePagina',
        enlace='$this->enlace',
        requireSession=$this->requireSession,
        menu=$this->menu
        WHERE idPagina=$this->idPagina";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function consultarPaginaPorUrl($url)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();
        //consulta para retornar un solo registro
        $sql = "SELECT * FROM pagina WHERE enlace='$url'";
        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->idPagina = $registro['idPagina'];
            $this->idModulo = $registro['idModulo'];
            $this->nombrePagina = $registro['nombrePagina'];
            $this->enlace = $registro['enlace'];
            $this->requireSession = $registro['requireSession'];
        }
        // print_r($result);
        // echo $url;
    }

    function paginasPorModulo($idModulo, $idRol)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();
        //consulta para retornar un solo registro

        $sql = "SELECT * FROM pagina p INNER JOIN permiso per ON p.idPagina=per.IdPagina WHERE 
        p.idModulo=$idModulo AND p.menu=true AND per.idRol=$idRol";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $result;
    }

    function eliminarPagina()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE pagina SET idModulo=8 WHERE idPagina=$this->idPagina";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }
}
