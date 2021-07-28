<?php

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

$oUsuarioController=new usuarioController();
    switch($funcion){
        case "validarReservacion":
        $oUsuarioController->validarReservacion();
        break;
    }

    class usuarioController{
    
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
    }

?>