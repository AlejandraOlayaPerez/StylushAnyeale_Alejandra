<?php
date_default_timezone_set('America/Bogota');

//clase usuarioController .php genera las comunicaciones entre las vistas y el modelo
//contiene las funciones nesesarias para alimentar la vista

$funcion=""; //Me permite verificar si la variable esta vacia
//El if diferenciar metodo POST o GET o ninguno.
if (isset($_POST['funcion'])){ //Si esta definifa y su valor es diferente a NULO(ISSET), almacena la variable funcion.
    $funcion=$_POST['funcion'];
}else{ if (isset($_GET['funcion'])){
    $funcion=$_GET['funcion'];
}
}

$oReservacionController=new reservacionController();
    switch($funcion){
        case "validarReservacion":
        $oReservacionController->validarReservacion();
        break;
    }

    class reservacionController{
    
        public function validarReservacion(){
            require_once '../model/reservaciones.php';
    
            $oReservacion=new reservacion();
            $oReservacion->idReservacion=$_GET['idReservacion'];
            $oReservacion->validarReservacion();
    
            require_once 'mensajeController.php';
            $oMensaje=new mensajes();
    
            if ($oReservacion->validarReservacion()) {
                header("location: ../view/mostrarReservacion.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+validado+correctamente+la+reservacion");
                // echo "valido";
            }else{
                header("location: ../view/mostrarReservacion.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
                // echo "error";
            }
        }

        public function crearReservacion(){
            require_once '../model/reservaciones.php';
            $oReservacion=new reservacion();

            require_once 'configCrontroller.php';
            $Oconfig=new Config;

            do {
                $codigo=$Oconfig->generarCodigoPedido();
                $existeCodigo=$oReservacion->consultarExisteReservacion($codigo);
            }while(count($existeCodigo)>0);

            $fechaActual= Date("Y-m-d");
            $horaActual= Date("H:i:s");

            require_once '../model/servicio.php';
            $oServicio=new servicio();
            $oServicio->consultarServicio($_POST['servicio']);
            $nombreServicio=$oServicio->nombreServicio;

            require_once '../model/usuario.php';
            $oUsuario=new usuario();
            $oUsuario->consultarUsuario($_POST['estilista']);
            $nombreUsuario=$oUsuario->primerNombre." ".$oUsuario->primerApellido;

            $oReservacion->idCliente=$_POST['idCliente'];
            $oReservacion->nombres=$_POST['primerNombre'];
            $oReservacion->apellidos=$_POST['primerApellido'];
            $oReservacion->telefono=$_POST['telefono'];
            $oReservacion->fechaReservacion=$_POST['fechaReservacion'];
            $oReservacion->horaReservacion=$_POST['horaReservacion'];
            $oReservacion->servicio=$nombreServicio;
            $oReservacion->estilista=$nombreUsuario;
            $oReservacion->domicilio=$_POST['domicilio'];
            $oReservacion->direccion=$_POST['direccion'];

            require_once 'mensajeController.php';
            $oMensaje=new mensajes();

            if($oReservacion->fechaReservacion<$fechaActual){
                header("location: ../view/nuevaReservacion.php?tipoMensaje=".$oMensaje->tipoAdvertencia."&mensaje=No+se+permiten+reservaciones+con+fechas+menores+a+hoy"); 
            }else{
            //consulta para saber si esta esa fecha disponible
            //consulta para saber la hora disponibles
            //consulta domicilio

            $result=$oReservacion->nuevaReservacion($codigo);
            if($result){
                // echo "si";
                header("location: ../view/nuevaReservacion.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+registrado+su+reservacion");
            }else{
            //    echo "no";
            header("location: ../view/mostrarReservacion.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
            } 
            }
        }
    }
