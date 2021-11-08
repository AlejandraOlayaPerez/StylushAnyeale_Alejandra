<?php

require_once 'conexiondb.php';


class contar
{
    //La funcion constructor se ejecuta cuando se intancia los objetos, se utiliza para configurar los elementos basicos.
    //Siempre usar :(
    public function __construct()
    {
    }
    
    public $totalProducto = "";

    function contarProductos()
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();
        //sentencia SQL para instertar estudiante

        $sql = "SELECT COUNT(codigoProducto) AS totalProducto FROM producto WHERE eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->totalProducto = $registro['totalProducto'];
        }
    }

    function contarPersonal()
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();
        //sentencia SQL para instertar estudiante

        $sql = "SELECT COUNT(primerNombre) AS totalPersonal FROM usuario WHERE eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->totalPersonal = $registro['totalPersonal'];
        }
    }

    function contarCliente()
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();
        //sentencia SQL para instertar estudiante

        $sql = "SELECT COUNT(primerNombre) AS totalCliente FROM cliente WHERE eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->totalCliente = $registro['totalCliente'];
        }
    }
}
