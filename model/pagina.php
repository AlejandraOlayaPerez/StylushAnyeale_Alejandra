<?php

require_once 'conexionDB.php';

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

    function ListarPagina($pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros
        $sql = "SELECT count(nombrePagina) as numRegistro FROM pagina WHERE idModulo=$this->idModulo AND eliminado=false;";
        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        //indicamos cuantos elementos vamos a tomar, se le indican los registros que se van a mostrar
        $inicio = (($pagina - 1) * 10);
        //se registra la consulta sql
        $sql = "SELECT * FROM pagina WHERE idModulo=$this->idModulo AND eliminado=false LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
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

    function paginasPorModulo($idModulo, $idRol){
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();
        //consulta para retornar un solo registro

        $sql="SELECT * FROM pagina p INNER JOIN permiso per ON p.idPagina=per.IdPagina WHERE 
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
