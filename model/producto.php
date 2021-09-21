<?php
require_once 'conexionDB.php';

class producto
{
    public $IdProducto = 0;
    public $codigoProducto = "";
    public $nombreProducto = "";
    public $cantidad = "";
    public $detalle = "";
    public $descripcionProducto = "";
    public $caracteristicas = "";
    public $valorUnitario = "";
    public $costoProducto = "";
    public $numRegistro = "";
    public $numPagina = "";

    function nuevoProducto($idProducto)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO producto (idProducto, codigoProducto, nombreProducto, descripcionProducto, caracteristicas, valorUnitario, eliminado)
    VALUES ($idProducto, '$this->codigoProducto', '$this->nombreProducto', '$this->descripcionProducto', '$this->caracteristicas', $this->valorUnitario, false)";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function buscarProducto($busquedaProducto)
    {
        $oConexion = new conectar();
        $conexion = $oConexion->conexion();

        if ($busquedaProducto != "") {
            $sql = "SELECT * FROM producto WHERE eliminado=false AND (codigoProducto LIKE '%$busquedaProducto%' OR nombreProducto LIKE '%$busquedaProducto%')"; //FUNCION PARA BUSCAR TANTO EN CENTRO, LADO DERECHO Y IZQUIERDO
        } else {
            $sql = "SELECT * FROM producto WHERE eliminado=false";
        }

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function rangoFechas($fechaInicio, $fechaFinal)
    {
        $oConexion = new conectar();
        $conexion = $oConexion->conexion();

        $sql = "SELECT d.producto, d.cantidad, d.precio, f.fechaFactura, f.codigoFactura 
        FROM detalle d 
        INNER JOIN factura f 
        ON d.idFactura=f.idFactura 
        WHERE f.eliminado=false AND f.fechaFactura 
        Between '$fechaInicio' AND '$fechaFinal'";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }


    //funcion para mostrar los productos
    function listarProducto($filtroCodigoProducto)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        if ($filtroCodigoProducto != "") {
            $sql = "SELECT * FROM producto WHERE eliminado=false AND (codigoProducto LIKE '%$filtroCodigoProducto%' OR nombreProducto LIKE '%$filtroCodigoProducto%')"; //FUNCION PARA BUSCAR TANTO EN CENTRO, LADO DERECHO Y IZQUIERDO
        } else {
            $sql = "SELECT * FROM producto WHERE eliminado=false";
        }

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }



    //funcion para mostrar los productos
    function buscarProductoAjax($codigoProducto, $nombreProducto, $pagina)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();
        $where = "WHERE eliminado=false AND (codigoProducto LIKE '%$codigoProducto%' OR nombreProducto LIKE '%$nombreProducto%')";

        $inicio = (($pagina - 1) * 5);
        $sql = "SELECT * FROM producto $where LIMIT 5 OFFSET $inicio"; //FUNCION PARA BUSCAR TANTO EN CENTRO, LADO DERECHO Y IZQUIERDO


        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function busquedaProducto($codigoProducto, $nombreProducto)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM producto WHERE eliminado=false AND (codigoProducto LIKE '%$codigoProducto%' OR nombreProducto LIKE '%$nombreProducto%')";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function vistaProducto()
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql="SELECT *, (SELECT d.fotoProducto FROM detallefoto d WHERE d.idProducto=p.IdProducto LIMIT 1) as fotoProducto FROM producto p WHERE p.eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function detalleProducto($IdProducto)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT P.IdProducto, p.nombreProducto, p.descripcionProducto, p.costoProducto, 
        d.fotoProducto1, d.fotoProducto2, d.fotoProducto3, d.fotoProducto4, d.fotoProducto5 
        FROM producto p 
        INNER JOIN detallefoto d 
        ON p.IdProducto=d.idProducto 
        WHERE p.eliminado=false AND p.IdProducto=$IdProducto";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->IdProducto = $registro['IdProducto'];
            $this->nombreProducto = $registro['nombreProducto'];
            $this->descripcionProducto = $registro['descripcionProducto'];
            $this->costoProducto = $registro['costoProducto'];
            $this->fotoProducto1 = $registro['fotoProducto1'];
            $this->fotoProducto2 = $registro['fotoProducto2'];
            $this->fotoProducto3 = $registro['fotoProducto3'];
            $this->fotoProducto4 = $registro['fotoProducto4'];
            $this->fotoProducto5 = $registro['fotoProducto5'];
        }
    }

    function paginacionProducto($codigoProducto, $nombreProducto)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();
        $where = "WHERE eliminado=false AND (codigoProducto LIKE '%$codigoProducto%' OR nombreProducto LIKE '%$nombreProducto%')";
        $sql = "SELECT count(codigoProducto) as numRegistro FROM producto $where";
        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function mostrarProducto2($producto)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM producto WHERE eliminado=false AND (codigoProducto LIKE '%$producto%' OR nombreProducto LIKE '%$producto%')";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function mostrarProducto($pagina)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros
        $sql = "SELECT count(nombreProducto) as numRegistro FROM producto WHERE eliminado=false;";
        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        //indicamos cuantos elementos vamos a tomar, se le indican los registros que se van a mostrar
        $inicio = (($pagina - 1) * 10);

        $sql = "SELECT * FROM producto WHERE eliminado=false LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function consultarExisteProducto($idProducto)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM producto WHERE Idproducto='$idProducto'";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function consultarProducto($IdProducto)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();
        //consulta para retornar un solo registro

        $sql = "SELECT * FROM producto WHERE IdProducto=$IdProducto";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->IdProducto = $registro['IdProducto'];
            $this->codigoProducto = $registro['codigoProducto'];
            $this->nombreProducto = $registro['nombreProducto'];
            $this->descripcionProducto = $registro['descripcionProducto'];
            $this->cantidad = $registro['cantidad'];
            $this->caracteristicas = $registro['caracteristicas'];
            $this->valorUnitario = $registro['valorUnitario'];
        }
    }

    function actualizarProducto()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();
        //consulta para actualizar el registro

        //sentencia para actualizar un producto
        $sql = "UPDATE producto SET codigoProducto='$this->codigoProducto',
        tipoProducto='$this->tipoProducto',
        nombreProducto='$this->nombreProducto',
        recomendaciones='$this->recomendaciones',
        valorUnitario=$this->valorUnitario,
        costoProducto=$this->costoProducto
        WHERE IdProducto=$this->IdProducto";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);

        return $result;
    }

    function eliminarProducto()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE producto SET eliminado=1 WHERE IdProducto=$this->IdProducto";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function sumarPedido($cantidad, $idProducto)
    {
        $oConexion = new conectar();
        $conexion = $oConexion->conexion();

        $sql = "UPDATE producto SET cantidad=cantidad+$cantidad WHERE IdProducto=$idProducto";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function restarProducto()
    {
        $oConexion = new conectar();
        $conexion = $oConexion->conexion();

        $sql = "UPDATE producto SET cantidad=cantidad-$this->cantidad WHERE IdProducto=$this->idProducto";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function traerIdCantidad()
    {

        $oConexion = new conectar();
        $conexion = $oConexion->conexion();

        $sql = "SELECT p.IdProducto, d.cantidad 
        FROM detalle d 
        INNER JOIN producto p 
        ON d.idProducto=p.IdProducto 
        WHERE d.idPedido=$this->idPedido";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->IdProducto = $registro['IdProducto'];
            $this->cantidad = $registro['cantidad'];
        }
    }
}
