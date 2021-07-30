<?php
require_once 'conexionDB.php';

class pedido{

    //atributos de la tabla pedido
    public $idPedido=0;
    public $idProducto="";
    public $documentoIdentidad="";
    public $responsablePedido="";
    public $empresa="";
    public $direccion="";
    public $fechaPedido="";
    public $entregaPedido="";


    //funcion encargada de insertar un nuevo pedido
    function nuevoPedido(){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia para insertar un nuevo pedido
        $sql="INSERT INTO pedido (idPedido, documentoIdentidad, responsablePedido, empresa, direccion, fechaPedido, entregaPedido, eliminado) VALUES
        ($this->idPedido, $this->documentoIdentidad, '$this->responsablePedido', '$this->empresa', '$this->direccion', '$this->fechaPedido', false, false)";

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function consultarExistePedido($idPedido){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        $sql="SELECT * FROM pedido WHERE idPedido='$idPedido'";

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //esta funcion me permitira mostrar toda la informacion
    function listarPedido(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia para seleccionar un pedido
        $sql="SELECT * FROM pedido WHERE eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //esta funcion me permite consultar un pedido
    function consultarPedido($idPedido){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //esta sentencia me permite consultar un pedido
        $sql="SELECT * FROM pedido WHERE idPedido=$idPedido";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);

        foreach($result as $registro){ 
        //se registra la consulta en los parametros
        $this->idPedido=$registro['idPedido'];
        $this->documentoIdentidad=$registro['documentoIdentidad'];
        $this->responsablePedido=$registro['responsablePedido'];
        $this->empresa=$registro['empresa'];
        $this->direccion=$registro['direccion'];
        $this->fechaPedido=$registro['fechaPedido'];
        $this->entregaPedido=$registro['entregaPedido'];
        }
    }

    //esta funcion me permite actualizar la informacion de un pedido
    function actualizarPedido(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia que permite actualizar un pedido
        $sql="UPDATE pedido SET idProducto='$this->idProducto',
        codigoPedido='$this->codigoPedido',
        codigoProducto='$this->codigoProducto',
        producto='$this->producto',
        cantidad=$this->cantidad,
        fechaPedido='$this->fechaPedido',
        entregaPedido='$this->entregaPedido'
        WHERE idPedido=$this->idPedido";
            
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function eliminarPedido(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();

        //consulta para eliminar el registro
        $sql="UPDATE pedido SET eliminado=1 WHERE idPedido=$this->idPedido";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function validarPedido(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();

        //consulta para eliminar el registro
        $sql="UPDATE pedido SET eliminado=1 WHERE idPedido=$this->idPedido";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
}
?>