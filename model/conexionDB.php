<?php

class conectar{
    //estos parameteros perment la conexión con la base datos
    //variable $servidor indica donde está ubicada la base de datos
    private $servidor="localhost";
    // private $servidor="31.170.167.52";
    //variable $baseDatos almace el nombre de la base de datos
    private $baseDatos="proyectostylushanyeale";
    // private $baseDatos="u587320923_anyeale";
    //variable $usuario almacena el usuario que tiene acceso a la base datos
    private $usuario="root";
    // private $usuario="u587320923_alejandra";
    // variable $contrasena almacena la contraseña del usuario
    private $contrasena="";
    // private $contrasena="Alejandra123";


    //esta función establece conexión con la base de datos
    function conexion(){
        //se llama la clase mysqli_connect y se le agrega los parametros para conectar la base de datos
        $conexion=mysqli_connect(
            $this->servidor,
            $this->usuario,
            $this->contrasena,
            $this->baseDatos
        );
        //la función devuelve un objeto con la conexión a la base de datos
        return $conexion;
    }
}
?>