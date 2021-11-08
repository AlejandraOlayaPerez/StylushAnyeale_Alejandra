<?php
require_once 'conexiondb.php';

class pedido
{

    //La funcion constructor se ejecuta cuando se intancia los objetos, se utiliza para configurar los elementos basicos.
    //Siempre usar :(
    public function __construct()
    {
    }

    //atributos de la tabla pedido
    public $idPedido = 0;
    public $idProducto = "";
    public $idEmpresa = "";
    public $documentoIdentidad = "";
    public $responsablePedido = "";
    public $Nit = "";
    public $empresa = "";
    public $direccion = "";
    public $fechaPedido = "";
    public $filtroFecha = "";
    public $entregaPedido = "";


    //funcion encargada de insertar un nuevo pedido
    function nuevoPedido()
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia para insertar un nuevo pedido
        $sql = "INSERT INTO pedido (idPedido, idEmpresa, documentoIdentidad, responsablePedido, Nit, empresa, direccion, fechaPedido, entregaPedido, eliminado) VALUES
        ($this->idPedido, $this->idEmpresa, $this->documentoIdentidad, '$this->responsablePedido','$this->Nit', '$this->empresa', '$this->direccion', '$this->fechaPedido', false, false)";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        echo $sql;
        return $result;
    }

    function consultarExistePedido($idPedido)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM pedido WHERE idPedido='$idPedido'";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //esta funcion me permitira mostrar toda la informacion
    function listarPedido($fecha, $recibido, $cancelado, $codigo, $pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $where = "1 ";
        if ($fecha != "") {
            $where .= " AND fechaPedido='$fecha' ";
        }
        if ($recibido != "") {
            $where .= " AND entregaPedido=$recibido ";
        }
        if ($cancelado != "") {
            $where .= " AND eliminado=$cancelado ";
        }
        if ($codigo != "") {
            $where .= " AND idPedido LIKE '%$codigo%' ";
        }

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT * FROM pedido WHERE $where ORDER BY fechaPedido DESC LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $sql;
        return $result;
    }

    function paginacionPedido($fecha, $recibido, $cancelado, $codigo)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $where = "1 ";
        if ($fecha != "") {
            $where .= " AND fechaPedido='$fecha' ";
        }
        if ($recibido != "") {
            $where .= " AND entregaPedido=$recibido ";
        }
        if ($cancelado != "") {
            $where .= " AND eliminado=$cancelado ";
        }
        if ($codigo != "") {
            $where .= " AND idPedido LIKE '%$codigo%' ";
        }

        $sql = "SELECT count(idPedido) as numRegistro FROM pedido WHERE $where";
        $result = mysqli_query($conexion, $sql);
        // echo $sql;
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }



    //esta funcion me permite consultar un pedido
    function consultarPedido($idPedido)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //esta sentencia me permite consultar un pedido
        $sql = "SELECT * FROM pedido WHERE idPedido=$idPedido";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->idPedido = $registro['idPedido'];
            $this->documentoIdentidad = $registro['documentoIdentidad'];
            $this->responsablePedido = $registro['responsablePedido'];
            $this->idEmpresa = $registro['idEmpresa'];
            $this->Nit = $registro['Nit'];
            $this->empresa = $registro['empresa'];
            $this->direccion = $registro['direccion'];
            $this->fechaPedido = $registro['fechaPedido'];
            $this->entregaPedido = $registro['entregaPedido'];
        }
    }

    function guardarProducto($idPedido, $idProducto,  $codigoProducto,  $producto, $cantidad, $precio)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "INSERT INTO detalle (idProducto, idPedido, codigoProducto, producto, cantidad, precio) 
        VALUES ($idProducto, $idPedido, '$codigoProducto', '$producto', $cantidad, $precio)";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        echo $sql;
        return $result;
    }


    function eliminarProductoPedido($idPedido)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "UPDATE detalle SET eliminado=1 WHERE idPedido=$idPedido";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function consultarProductosIdPedido($idPedido, $idProducto)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM detalle WHERE idPedido=$idPedido AND idProducto=$idProducto";

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

    function actualizarCantidad($cantidad, $idPedido, $idProducto)
    {
        $oConexion = new conectar();
        $conexion = $oConexion->conexion();

        $sql = "UPDATE detalle SET eliminado=false, cantidad=$cantidad WHERE idPedido=$idPedido AND idProducto=$idProducto";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    //esta funcion me permite actualizar la informacion de un pedido
    function actualizarPedido()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia que permite actualizar un pedido
        $sql = "UPDATE pedido SET idEmpresa=$this->idEmpresa,
        documentoIdentidad=$this->documentoIdentidad,
        responsablePedido='$this->responsablePedido',
        Nit='$this->Nit',
        empresa='$this->empresa',
        direccion='$this->direccion',
        fechaPedido='$this->fechaPedido'
        WHERE idPedido=$this->idPedido";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        echo $sql;
        return $result;
    }

    function eliminarPedido()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE pedido SET eliminado=1 WHERE idPedido=$this->idPedido";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function validarPedido()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE pedido SET entregaPedido=1 WHERE idPedido=$this->idPedido";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }
}
