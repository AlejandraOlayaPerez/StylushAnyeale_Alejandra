<?php
require_once 'conexionDB.php';

class cargo{

    //atributos de la tabla de cargo
    public $idCargo=0;
    public $cargo="";
    public $descripcionCargo="";

    //funcion encargada de insertar un nuevo cargo
    function nuevoCargo(){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia para insertar un nuevo cargo
        $sql="INSERT INTO cargo (cargo, descripcionCargo, eliminado) VALUES ('$this->cargo', '$this->descripcionCargo', false)";

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    //esta funcion me permitira mostrar toda la informacion
    function listarCargo(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia para seleccionar un cargo 
        $sql="SELECT * FROM cargo WHERE eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //esta funcion me permite consultar un cargo
    function consultarCargo($idCargo){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //esta sentencia me permite consultar un cargo
        $sql="SELECT * FROM cargo WHERE idCargo=$idCargo";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);

        foreach($result as $registro){ 
        //se registra la consulta en los parametros
        $this->idCargo=$registro['idCargo'];
        $this->cargo=$registro['cargo'];
        $this->descripcionCargo=$registro['descripcionCargo'];
        }
    }

    //esta funcion me permite actualizar la informacion del cargo
    function actualizarCargo(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();

        //sentencia que permite actualizar un  cargo
        $sql="UPDATE cargo SET cargo='$this->cargo',
        '$this->descripcionCargo';
        WHERE idCargo=$this->idCargo";
            
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function eliminarCargo(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();

        //consulta para eliminar el registro
        $sql="UPDATE cargo SET eliminado=1 WHERE idCargo=$this->idCargo";

        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
}
?>