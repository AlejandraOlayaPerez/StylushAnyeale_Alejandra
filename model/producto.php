<?php
require_once 'conexiondb.php';

class producto
{
    public $IdProducto = 0;
    public $idCategoria = "";
    public $codigoProducto = "";
    public $nombreProducto = "";
    public $cantidad = "";
    public $descripcionProducto = "";
    public $caracteristicas = "";
    public $valorUnitario = "";
    public $numRegistro = "";
    public $numPagina = "";

    function nuevoProducto($idProducto)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO producto (idProducto, idCategoria, codigoProducto, nombreProducto, descripcionProducto, caracteristicas, valorUnitario, costoProducto, eliminado)
        VALUES ($idProducto, $this->idCategoria, '$this->codigoProducto', '$this->nombreProducto', '$this->descripcionProducto', '$this->caracteristicas', $this->valorUnitario, $this->costoProducto, false)";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function actualizarCategoriaProducto()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();
        //consulta para actualizar el registro

        //sentencia para actualizar un producto
        $sql = "UPDATE producto SET idCategoria=$this->idCategoria
        WHERE IdProducto=$this->idProducto";

        //se ejecuta la consulta
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
    function productoIdCategoria($idCategoria)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT codigoProducto, nombreProducto, IdProducto, idCategoria FROM producto WHERE idCategoria!=$idCategoria or idCategoria IS NULL AND eliminado=false";

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
        // $where = "WHERE eliminado=false AND (codigoProducto LIKE '%$codigoProducto%' OR nombreProducto LIKE '%$nombreProducto%')"
        // $sql = "SELECT * FROM producto WHERE eliminado=false AND (codigoProducto LIKE '%$codigoProducto%' OR nombreProducto LIKE '%$nombreProducto%') LIMIT 5 OFFSET $inicio"; //FUNCION PARA BUSCAR TANTO EN CENTRO, LADO DERECHO Y IZQUIERDO

        $where = "eliminado=false ";
        if ($codigoProducto != "") {
            $where .= "AND codigoProducto LIKE '%$codigoProducto%' ";
        }
        if ($nombreProducto != "") {
            $where .= "AND  nombreProducto LIKE '%$nombreProducto%' ";
        }

        $inicio = (($pagina - 1) * 5);
        $sql = "SELECT * FROM producto WHERE $where LIMIT 5 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function productos($codigo, $nombre, $pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $where = "eliminado=false ";
        if ($codigo != "") {
            $where .= " AND codigoProducto LIKE '%$codigo%'";
        }
        if ($nombre != "") {
            $where .= " AND nombreProducto LIKE '%$nombre%' ";
        }

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT * FROM producto WHERE $where ORDER BY nombreProducto ASC LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $sql;
        return $result;
    }

    function paginacionProducto($codigoProducto, $nombreProducto, $pagina)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros
        $where = "eliminado=false ";
        if ($codigoProducto != "") {
            $where .= "AND codigoProducto LIKE '%$codigoProducto%' ";
        }
        if ($nombreProducto != "") {
            $where .= "AND  nombreProducto LIKE '%$nombreProducto%' ";
        }
        $sql = "SELECT count(codigoProducto) as numRegistro FROM producto WHERE $where";
        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }

    function paginacionVistaCliente($categoria, $tags, $vista, $rangoMenor, $rangoMayor, $buscar)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $where = "WHERE eliminado=false ";
        $organizar = " ";
        if ($categoria !== "") {
            $where .= " AND idCategoria=$categoria";
        }
        // if ($tags !==""){
        //     $where .= " AND "
        // }
        if ($vista == "asc") {
            $organizar = "ORDER BY nombreProducto ASC";
        }
        if ($vista == "des") {
            $organizar = "ORDER BY nombreProducto DESC";
        }
        if ($vista == "menor") {
            $organizar = "ORDER BY valorUnitario ASC";
        }
        if ($vista == "mayor") {
            $organizar = "ORDER BY valorUnitario DESC";
        }
        if ($rangoMenor != "" && $rangoMayor == "") {
            $where .= " AND valorUnitario >= $rangoMenor";
        }
        if ($rangoMenor == "" && $rangoMayor != "") {
            $where .= " AND valorUnitario <= $rangoMayor";
        }
        if ($rangoMenor != "" && $rangoMayor != "") {
            $where .= " AND valorUnitario BETWEEN $rangoMenor AND $rangoMayor";
        }
        if ($buscar != "") {
            $where .= " AND nombreProducto LIKE '%$buscar%'";
        }
        $sql = "SELECT count(codigoProducto) as numRegistro FROM producto $where $organizar";
        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }

    function vistaClienteProducto($categoria, $tags, $vista, $rangoMenor, $rangoMayor, $buscar, $pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $where = "WHERE eliminado=false ";
        $organizar = " ";
        if ($categoria !== "") {
            $where .= " AND idCategoria=$categoria";
        }
        // if ($tags !==""){
        //     $where .= " AND "
        // }
        if ($vista == "asc") {
            $organizar = "ORDER BY nombreProducto ASC";
        }
        if ($vista == "des") {
            $organizar = "ORDER BY nombreProducto DESC";
        }
        if ($vista == "menor") {
            $organizar = "ORDER BY valorUnitario ASC";
        }
        if ($vista == "mayor") {
            $organizar = "ORDER BY valorUnitario DESC";
        }
        if ($rangoMenor != "" && $rangoMayor == "") {
            $where .= " AND valorUnitario >= $rangoMenor";
        }
        if ($rangoMenor == "" && $rangoMayor != "") {
            $where .= " AND valorUnitario <= $rangoMayor";
        }
        if ($rangoMenor != "" && $rangoMayor != "") {
            $where .= " AND valorUnitario BETWEEN $rangoMenor AND $rangoMayor";
        }
        if ($buscar != "") {
            $where .= " AND nombreProducto LIKE '%$buscar%'";
        }

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT *, (SELECT d.fotoProducto FROM detallefoto d WHERE d.idProducto=p.IdProducto LIMIT 1) as fotoProducto FROM producto p $where $organizar LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $sql;
        return $result;
    }

    function detalleProducto($IdProducto)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM producto WHERE IdProducto=$IdProducto";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->IdProducto = $registro['IdProducto'];
            $this->nombreProducto = $registro['nombreProducto'];
            $this->descripcionProducto = $registro['descripcionProducto'];
            $this->caracteristicas = $registro['caracteristicas'];
            $this->valorUnitario = $registro['valorUnitario'];
        }
    }

    function detalleFotoProducto($IdProducto)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM detalleFoto WHERE idProducto=$IdProducto";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function paginacionProductoPedido($producto, $pagina)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros
        $where = "eliminado=false ";
        if ($producto != "") {
            $where .= "AND codigoProducto LIKE '%$producto%' OR nombreProducto LIKE '%$producto%' ";
        }

        $sql = "SELECT count(codigoProducto) as numRegistro FROM producto WHERE $where";
        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }

    function productoPedido($producto, $pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $where = "eliminado=false ";
        if ($producto != "") {
            $where .= "AND codigoProducto LIKE '%$producto%' OR nombreProducto LIKE '%$producto%' ";
        }

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT * FROM producto WHERE $where ORDER BY nombreProducto ASC LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $sql;
        return $result;
    }

    // function mostrarProducto2($producto)
    // {
    //     //Instancia clase conectar
    //     $oConexion = new conectar();
    //     //Establece conexion con la base de datos.
    //     $conexion = $oConexion->conexion();

    //     $sql = "SELECT * FROM producto WHERE eliminado=false AND ()";

    //     $result = mysqli_query($conexion, $sql);
    //     $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //     return $result;
    // }

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
            $this->idCategoria = $registro['idCategoria'];
            $this->codigoProducto = $registro['codigoProducto'];
            $this->nombreProducto = $registro['nombreProducto'];
            $this->descripcionProducto = $registro['descripcionProducto'];
            $this->cantidad = $registro['cantidad'];
            $this->caracteristicas = $registro['caracteristicas'];
            $this->valorUnitario = $registro['valorUnitario'];
            $this->costoProducto = $registro['costoProducto'];
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
        nombreProducto='$this->nombreProducto',
        descripcionProducto='$this->descripcionProducto',
        caracteristicas='$this->caracteristicas',
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

    function eliminarCategoriaProducto()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE producto SET idCategoria=NULL WHERE IdProducto=$this->idProducto";

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
        echo $sql;
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
        return $result;
    }

    function buscarIdCantidad()
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
        return $result;
        foreach ($result as $registro) {
            $this->IdProducto = $registro['IdProducto'];
            $this->cantidad = $registro['cantidad'];
        }
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
}
