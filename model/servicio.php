<?php
require_once 'conexionDB.php';

class servicio
{
    public $idServicio = 0;
    public $idProducto = "";
    public $idCategoria = "";
    public $codigoServicio = "";
    public $nombreServicio = "";
    public $detalleServicio = "";
    public $tiempoDuracion = "";
    public $cantidadUsar = "";
    public $costo = "";
    public $numRegistro = "";
    public $numPagina = "";


    function nuevoServicio($idServicio)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO servicios (IdServicio, idCategoria, codigoServicio, nombreServicio, detalleServicio, tiempoDuracion, costo, eliminado)
        VALUES ($idServicio, $this->idCategoria, '$this->codigoServicio', '$this->nombreServicio', '$this->detalleServicio', $this->tiempoDuracion, $this->costo, false)";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function consultarExisteServicio($idServicio)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM servicios WHERE IdServicio=$idServicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function listarServicio($pagina, $filtroCodigoServicio)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT count(nombreServicio) as numRegistro FROM servicios WHERE eliminado=false;";
        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }

        //indicamos cuantos elementos vamos a tomar, se le indican los registros que se van a mostrar
        $inicio = (($pagina - 1) * 10);

        if ($filtroCodigoServicio != "") {
            $sql = "SELECT * FROM servicios WHERE eliminado=false AND (codigoServicio LIKE '%$filtroCodigoServicio%' OR nombreServicio LIKE '%$filtroCodigoServicio%') LIMIT 10 OFFSET $inicio";
        } else {
            $sql = "SELECT * FROM servicios WHERE eliminado=false  LIMIT 10 OFFSET $inicio";
        }



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

        $sql = "SELECT * FROM servicios WHERE eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function mostrarServicioId($idServicio)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM servicios WHERE eliminado=false AND IdServicio=$idServicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function eliminarProductoServicio($idServicio)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "UPDATE detalle SET eliminado=1 WHERE IdServicio=$idServicio";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function consultarProductosIdServicio($idServicio, $idProducto){
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM detalle WHERE IdServicio=$idServicio AND idProducto=$idProducto";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->idProducto = $registro['idProducto'];
            $this->codigoProducto = $registro['codigoProducto'];
            $this->producto = $registro['producto'];
            $this->cantidad = $registro['cantidad'];
        }
    }

    function guardarProducto($idServicio, $idProducto,  $codigoProducto,  $producto, $cantidad, $precio)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO detalle (idProducto, IdServicio, codigoProducto, producto, cantidad, precio) 
        VALUES ($idProducto, $idServicio, '$codigoProducto', '$producto', $cantidad, $precio)";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        echo $sql;
        return $result;
    }

    function actualizarCantidad($cantidad, $idServicio, $idProducto)
    {
        $oConexion = new conectar();
        $conexion = $oConexion->conexion();

        $sql = "UPDATE detalle SET eliminado=false, cantidad=$cantidad WHERE IdServicio=$idServicio AND idProducto=$idProducto";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function consultarServicio($idServicio)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();
        //consulta para retornar un solo registro

        $sql = "SELECT * FROM servicios WHERE IdServicio=$idServicio";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->idServicio = $registro['IdServicio'];
            $this->idCategoria = $registro['idCategoria'];
            $this->codigoServicio = $registro['codigoServicio'];
            $this->nombreServicio = $registro['nombreServicio'];
            $this->detalleServicio = $registro['detalleServicio'];
            $this->tiempoDuracion = $registro['tiempoDuracion'];
            $this->costo = $registro['costo'];
        }
    }

    function consultarCosto($idServicio)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();
        //consulta para retornar un solo registro

        $sql = "SELECT * FROM servicios WHERE IdServicio=$idServicio";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->costo = $registro['costo'];
        }
    }

    function actualizarServicio()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();
        //consulta para actualizar el registro

        //sentencia para actualizar un producto
        $sql = "UPDATE servicios SET codigoServicio='$this->codigoServicio',
        nombreServicio='$this->nombreServicio',
        detalleServicio='$this->detalleServicio',
        tiempoDuracion=$this->tiempoDuracion,
        costo=$this->costo
        WHERE IdServicio=$this->idServicio";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function actualizarCategoriaServicio()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();
        //consulta para actualizar el registro

        //sentencia para actualizar un producto
        $sql = "UPDATE servicios SET idCategoria=$this->idCategoria
        WHERE IdServicio=$this->idServicio";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function eliminarServicio()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE servicios SET eliminado=1 WHERE IdServicio=$this->IdServicio";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function paginacionServicio($servicio)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $where = "eliminado=false ";
        if ($servicio != "") {
            $where .= " AND nombreServicio LIKE '%$servicio%' ";
        }

        $sql = "SELECT count(codigoServicio) as numRegistro FROM servicios WHERE $where";
        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }

    function servicios($servicio, $pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $where = "eliminado=false ";
        if ($servicio != "") {
            $where .= " AND nombreServicio LIKE '%$servicio%' ";
        }

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT * FROM servicios WHERE $where ORDER BY nombreServicio ASC LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }
}
