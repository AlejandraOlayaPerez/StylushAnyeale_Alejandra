<?php
require_once 'conexiondb.php';

class tags
{
    //La funcion constructor se ejecuta cuando se intancia los objetos, se utiliza para configurar los elementos basicos.
    //Siempre usar :(
    public function __construct()
    {
    }

    public $idTags = 0;
    public $tags = "";

    function nuevaTags()
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO tags (tags, eliminado) 
        VALUES ('$this->tags', false)";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function consultarTagsIdServicio($idServicio)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM palabrasclaves p RIGHT JOIN tags t ON t.idTags=p.idTags and p.IdServicios=$idServicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function consultarTagsIdProducto($idProducto)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM palabrasclaves p RIGHT JOIN tags t ON t.idTags=p.idTags and p.idProducto=$idProducto";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function tags()
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM tags WHERE eliminado=false";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function paginacionTags($tags)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $where = "eliminado=false ";
        if ($tags != "") {
            $where .= " AND tags LIKE '%$tags%' ";
        }

        $sql = "SELECT count(idTags) as numRegistro FROM tags WHERE $where";
        $result = mysqli_query($conexion, $sql);

        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }

    function mostrarTags($tags, $pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $where = "eliminado=false ";
        if ($tags != "") {
            $where .= " AND tags LIKE '%$tags%' ";
        }

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT * FROM tags WHERE $where ORDER BY tags ASC LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $sql;
        return $result;
    }

    function eliminarTags()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE tags SET eliminado=1 WHERE idTags=$this->idTags";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function consultarTags($idTags)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //esta sentencia me permite consultar un cargo
        $sql = "SELECT * FROM tags WHERE idTags=$idTags";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->idTags = $registro['idTags'];
            $this->tags = $registro['tags'];
        }
    }

    function actualizarTags()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia que permite actualizar un  cargo
        $sql = "UPDATE tags SET tags='$this->tags'
        WHERE idTags=$this->idTags";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }
}
