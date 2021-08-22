<?php

date_default_timezone_set('America/Bogota');

$funcion = ""; 
if (isset($_POST['funcion'])) {
    $funcion = $_POST['funcion'];
} else {
    if (isset($_GET['funcion'])) {
        $funcion = $_GET['funcion'];
    }
}

$oClienteController = new clienteController();
switch ($funcion) {
    case "iniciarSesion":
    $oClienteController->iniciarSesion();
    break;
    case "cerrarSesion":
    $oClienteController->cerrarSesion();
    break; 
    case "registroCliente":
    $oClienteController->registrarCliente();
    break;
}

class clienteController
{
    public function iniciarSesion(){
        require_once '../model/cliente.php';
        session_start();

        $oCliente= new cliente();
        $email=$_POST['email'];
        $contrasena=$_POST['contrasena'];
        $oCliente->iniciarSesion($email, $contrasena);

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if($oCliente->getIdCliente()!=0){
        //si entra el usuario y contraseña son correcto
        //se almacena la informacion del usuario en las variables de sesion
        //estas variables vamos a aceder en cualquier momento del proyecto
        $_SESSION['idCliente']=$oCliente->getIdCliente();
        $_SESSION['nombreUser']=$oCliente->getNombreUser();
        // echo "Inicio sesion correctamente";
            header("location: http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/paginaPrincipalCliente.php");
        }else{
            //error al iniciar sesion
            //usuario o contraseña incorrecto
            // echo "Usuario o contraseña incorrecto";
            header("location: ../view/loginCliente.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Error+al+iniciar+sesion+,+revise+su+correo+y+contraseña");
        }
    }

    public function cerrarSesion(){
        session_start();
        session_unset(); //borra las variables de sesion
        session_destroy(); //destruye o elimina la sesion
        header("location: http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/paginaPrincipalCliente.php");
        die();
    }

    public function registrarCliente(){
        require_once '../model/cliente.php';

        $oCliente=new cliente();
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $contrasena=$_POST['contrasena'];
        $confirmContrasena=$_POST['confirmContrasena'];

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if($contrasena==$confirmContrasena){
            if ($oCliente->consultarCorreoElectronico($email)==0){
            $result=$oCliente->registroUsuario($nombre, $email,$contrasena);
                if($result){
                    // echo "Se registro correctamente";
                }else{
                    header("location: ../view/registroCliente.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
                    // echo "error";
                }
            }else{
                header("location: ../view/registroCliente.php?tipoMensaje=".$oMensaje->tipoAdvertencia."&mensaje=El+correo+electronico+ya+existe");
                // echo "existe correo";
            }
        }else{
            header("location: ../view/registroCliente.php?tipoMensaje=".$oMensaje->tipoAdvertencia."&mensaje=La+contraseña+y+la+confirmacion+de+contraseña+no+coinciden");
            // echo "contraseña";
        }
    }

    public function consultarCliente($idCliente){
    require_once '../model/cliente.php';

    $oCliente=new cliente();
    $oCliente->consultarCliente($idCliente);

    return $oCliente;
    }

    public function reservacionesPorIdCliente($idCliente){
        require_once '../model/reservaciones.php';

        $oReservacion=new reservacion();
        return $oReservacion->listarReservacionesPorIdCliente($idCliente);
    }

    public function buscarReservacionPorCC($tipoDocumento, $documentoIdentidad){
        require_once '../model/reservaciones.php';

        $oReservacion=new reservacion();
        $result=$oReservacion->consultarClientePorCC($tipoDocumento, $documentoIdentidad);
        return $result;
        print_r($oReservacion);
    }

}

?>