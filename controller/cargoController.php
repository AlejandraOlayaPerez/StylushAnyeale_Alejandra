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
        case "nuevoCargo":
        $oUsuarioController->nuevoCargo();
        break;
        case "actualizarCargo":
        $oUsuarioController->actualizarCargo();
        break;
        case "eliminarCargo":
        $oUsuarioController->eliminarCargo();
        break;
        case "actualizarCargoEnEmpleado":
        $oUsuarioController->actualizarCargoEnEmpleado();
        break;
        case "eliminarEmpleadoCargo":
        $oUsuarioController->eliminarEmpleadoCargo();
        break;
    }

class usuarioController{
    public function nuevoCargo(){
        require_once '../model/cargo.php';

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        $oCargo=new cargo();
        $oCargo->cargo=$_GET['cargo'];
        $oCargo->descripcionCargo=$_GET['descripcionCargo'];
        //este if me permite conocer su el campo esta vacio o trae informacion
        if ($_GET['cargo'] && $_GET['descripcionCargo']!= ""){// en caso de que traiga informacion, ejecutara la funcion nuevoCargo()
        $result=$oCargo->nuevoCargo();

        if ($result) {
            header("location: ../view/listarCargo.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+creado+un+nuevo+cargo");
        }else{
            header("location: ../view/listarCargo.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
        }

        }else{//en caso de que este vacio, mostrara un mensaje de advertencia
            header("location: ../view/nuevoCargo.php?tipoMensaje=".$oMensaje->tipoAdvertencia."&mensaje=Campo+vacio,+por+favor+complete+la+informacion");
            //echo "Campo vacio";
        }
        
    }

    public function consultarCargoPorId($idCargo){
        require_once '../model/cargo.php';

        $oCargo=new cargo();
        $oCargo->consultarCargo($idCargo);

        return $oCargo;
    }

    public function actualizarCargo(){
        require_once '../model/cargo.php';

        $oCargo=new cargo();
        $oCargo->idCargo=$_GET['idCargo'];
        $oCargo->cargo=$_GET['cargo'];
        $oCargo->descripcionCargo=$_GET['descripcionCargo'];
        $oCargo->actualizarCargo();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($oCargo->actualizarCargo()) {
           header("location: ../view/listarCargo.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+actualizado+el+registro+del+cargo");
        }else{
           header("location: ../view/listarCargo.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
        }
    }

    public function eliminarCargo(){
        require_once '../model/cargo.php';
        
        $oCargo=new cargo();
        $oCargo->idCargo=$_GET['idCargo'];
        $oCargo->eliminarCargo();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($oCargo->eliminarCargo()) {
            header("location: ../view/listarCargo.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+eliminado+el+registro+del+cargo");
        }else{
            header("location: ../view/listarCargo.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
        }
    }

    public function actualizarCargoEnEmpleado(){
        require_once '../model/usuario.php';

        $idCargo=$_GET['idCargo'];
        $idUser=$_GET['idUser'];

        $oUsuario=new usuario();
        $result=$oUsuario->nuevoUsuarioPorCargo($idCargo, $idUser);

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($result){
             header("location: ../view/mostrarUsuarioCargo.php?idCargo=$idCargo"."&tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+agregado+el+empleado+al+cargo");
            // echo "nuevo";
        }else{
            header("location: ../view/mostrarUsuarioCargo.php?idCargo=$idCargo"."&tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
            // echo "Error";
        }
}

public function eliminarEmpleadoCargo(){
    require_once '../model/usuario.php';
    $idCargo=$_GET['idCargo'];

    $oUsuario=new usuario();
    $oUsuario->idUser=$_GET['idUser'];
    $result=$oUsuario->eliminarUsuarioCargo();

    require_once 'mensajeController.php';
    $oMensaje=new mensajes();

    if ($result){
        header("location: ../view/mostrarUsuarioCargo.php?idCargo=$idCargo"."&tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+eliminado+el+empleado+al+cargo");
        // echo "eliminar";
    }else{
        header("location: ../view/mostrarUsuarioCargo.php?idCargo=$idCargo"."&tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
        // echo "Error";
    }
}






}
?>