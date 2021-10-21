<?php
require_once 'conexiondb.php';

class categoria
{
    public $idCategoria = 0;
    public $idProducto = "";
    public $categoriaNombre = "";

    function registroMasivoProducto($productoCategoria, $idCategoria){
        $result = "";
        foreach($productoCategoria as $registro){
            $this->productoCategoria = $registro;
            $result = $this->nuevaCategoriaProducto($idCategoria);
            if(!$result)
            break;
        }
        return $result;
    }

    function nuevaCategoriaProducto($idCategoria)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "UPDATE producto SET idCategoria=$idCategoria WHERE IdProducto=$this->productoCategoria";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }


    function crearCategoria()
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO categoria (idProducto, nombreCategoria, eliminado) 
        VALUES (NULL, '$this->nombreCategoria', false)";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function actualizarCategoriaProductos($idProducto)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia que permite actualizar un  cargo
        $sql = "UPDATE categoria SET idProducto=$idProducto
        WHERE idCategoria=$this->idCategoria";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function listarCategoriaPaginacion($pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros
        $sql = "SELECT count(idCategoria) as numRegistro FROM categoria WHERE eliminado=false;";
        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }

        //indicamos cuantos elementos vamos a tomar, se le indican los registros que se van a mostrar
        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT * FROM categoria WHERE eliminado=false LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function paginacionProductos($idCategoria)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT count(idProducto) as numRegistro FROM categoria WHERE idCategoria!=$idCategoria or idCategoria IS NULL AND eliminado=false";
        $result = mysqli_query($conexion, $sql);

        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }

    function productoIdCategoria($idCategoria, $pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT * FROM categoria WHERE idCategoria!=$idCategoria or idCategoria IS NULL AND eliminado=false ORDER BY nombreProducto ASC LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $sql;
        return $result;
    }

    function paginacionCategoria($categoria)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $where = "eliminado=false ";
        if ($categoria != "") {
            $where .= " AND nombreCategoria LIKE '%$categoria%' ";
        }

        $sql = "SELECT count(idCategoria) as numRegistro FROM categoria WHERE $where";
        $result = mysqli_query($conexion, $sql);

        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }

    function mostrarCategoria($categoria, $pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $where = "eliminado=false ";
        if ($categoria != "") {
            $where .= " AND nombreCategoria LIKE '%$categoria%' ";
        }

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT * FROM categoria WHERE $where ORDER BY nombreCategoria ASC LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $sql;
        return $result;
    }

    function categoria()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM categoria WHERE eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function categoriaPorIdProducto($idCategoria)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM producto WHERE eliminado=false AND idCategoria=$idCategoria";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function eliminarCategoria()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE categoria SET eliminado=1 WHERE idCategoria=$this->idCategoria";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function consultarCategoria($idCategoria)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //esta sentencia me permite consultar un cargo
        $sql = "SELECT * FROM categoria WHERE idCategoria=$idCategoria";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->idCategoria = $registro['idCategoria'];
            $this->nombreCategoria = $registro['nombreCategoria'];
        }
    }

    function actualizarCategoria()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia que permite actualizar un  cargo
        $sql = "UPDATE Categoria SET nombreCategoria='$this->nombreCategoria'
        WHERE idCategoria=$this->idCategoria";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }
}
