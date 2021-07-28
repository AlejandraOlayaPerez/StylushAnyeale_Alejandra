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
        case "registro":
        $oUsuarioController->registrarUsuario();
        break;
        case "habilitarDeshabilitarUsuario":
        $oUsuarioController->habilitarDeshabilitarUsuario();
        break;
        case "registrarUsuarioEnRol":
        $oUsuarioController->registrarUsuarioEnRol();
        break;
        case "actualizarUsuario":
        $oUsuarioController->actualizarUsuario();
        break;
        case "eliminarUsuarioDeRol":
        $oUsuarioController->eliminarUsuarioDeRol();
        break;

    }

class usuarioController{

    //funcion para registrar el usuario
    public function registrarUsuario(){
        
        require_once '../model/usuario.php';
        $oUsuario=new usuario();
        $oUsuario->tipoDocumento=$_GET['tipoDocumento'];
        $oUsuario->documentoIdentidad=$_GET['documentoIdentidad'];
        $oUsuario->primerNombre=$_GET['primerNombre'];
        $oUsuario->segundoNombre=$_GET['segundoNombre'];
        $oUsuario->primerApellido=$_GET['primerApellido'];
        $oUsuario->segundoApellido=$_GET['segundoApellido'];
        $oUsuario->fechaNacimiento=$_GET['fechaNacimiento'];
        $oUsuario->genero=$_GET['genero'];
        $oUsuario->direccion=$_GET['direccion'];
        $oUsuario->barrio=$_GET['barrio'];
        $oUsuario->telefono=$_GET['telefono'];
        $oUsuario->estadoCivil=$_GET['estadoCivil'];
        $oUsuario->correoElectronico=$_GET['correoElectronico'];
        $oUsuario->contrasena=$_GET['contrasena'];
        $confirmarContrasena=$_GET['confirmarContrasena'];

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();
        
        if($oUsuario->contrasena==$confirmarContrasena){
            
            //si son iguales la contraseña y confirmar contraseña se va a general un registro
            if ($oUsuario->consultarCorreoElectronico($oUsuario->correoElectronico)==0){
            //se registra usuario
            $result=$oUsuario->nuevoUsuario();
                if($result){
                    header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=El+usuario+fue+registrado+correctamente"."&ventana=usuario");
                    // echo "Se registro correctamente";
                }else{
                    header("location: ../view/nuevoUsuario.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error"."&ventana=usuario");
                    // echo "error";
                }
            }else{
                header("location: ../view/nuevoUsuario.php?tipoMensaje=".$oMensaje->tipoAdvertencia."&mensaje=Este+correo+electronico+ya+existe"."&ventana=usuario");
                // echo "Ya existe un registro con este correo electronico";
                //existe un registro con este correo electronico
            }
        }else{
            header("location: ../view/nuevoUsuario.php?tipoMensaje=".$oMensaje->tipoAdvertencia."&mensaje=La+contraseña+y+la+confirmacion+de+contraseña+no+coinciden"."&ventana=usuario");
            // echo "La contraseña y confirmacion de la contraseña no coincide";
            //si no son diferentes, indicamos al usuario que son iguales
            //no genera registro
        }
    }

    public function habilitarDeshabilitarUsuario(){
        //define variables y se asigna el valor que tiene GET.
        $habilitar=$_GET['habilitar'];
        $idUser=$_GET['idUser'];

        require_once '../model/usuario.php'; //esta importando el contenido del archivo para ser accesible las funciones y atributos.
        
        require_once 'mensajeController.php';
        $oMensaje=new mensajes();
        
        $oUser=new usuario(); //se define y se instancia el objeto user
        if ($oUser->comprobarEliminado($habilitar, $idUser)){ //si se va por la parte del si es correcta
            if($habilitar==true) header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=El+usuario+ha+sido+habilitado+correctamente"."&ventana=usuario"); //ventana: me permite saber cual ventana se esta trabajando//echo "habilitado";//si habilitado es verdadero, se habilitara el usuario, siendo al contrario, se deshabilitara
            else header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=El+usuario+ha+sido+deshabilitado+correctamente"."&ventana=usuario"); //echo "deshabilitado";
        }else{ //si se va por la parte del no,  la funcion presento algun error
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error"."&ventana=usuario");
            // echo "error";
        }
    }

    public function mostrarUsuarioPorIdRol($idRol){
        require_once '../model/usuario.php';

        $oUsuario=new usuario();
        $listaUsuario=$oUsuario->mostrarUsuariosPorIdRol($idRol);

        return $listaUsuario;
    }

    public function usuarioDiferenteEnRol($idRol){
        require_once '../model/usuario.php'; 

        $oRol=new usuario();
        $listarDeUsuarioDiferente=$oRol->mostrarUsuariosPorIdDiferente($idRol);

        return $listarDeUsuarioDiferente;
    }

    public function registrarUsuarioEnRol(){
        require_once '../model/usuario.php';

        $idRol=$_GET['idRol'];
        $idUser=$_GET['idUser'];

        $oUsuario=new usuario();
        $result=$oUsuario->actualizarUsuarioDeRol($idRol, $idUser);

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($result){
            header("location: ../view/listarDetalleRol.php?idRol=$idRol"."&tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+agregado+el+empleado+al+rol");
        }else{
            header("location: ../CRUD_roles/listarDetalleRol.php"."&tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
            // echo "Error al registrar el usuario";
        }
    }

    public function eliminarUsuarioDeRol(){
        $idUser=$_GET['idUser'];
        $idRol=$_GET['idRol'];

        require_once '../model/usuario.php';
        $oUsuario=new usuario();
        $result=$oUsuario->actualiazadoEliminadoUsuario($idUser);

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if($result){
            header("location: ../view/listarDetalleRol.php?idRol=$idRol"."&tipoMensaje=".$oMensaje->tipoError."&mensaje=El+usuario+ha+sido+eliminado+del+rol");
        }else{
            header("location: ../view/listarDetalleRol.php"."&tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
            //echo "Error al eliminar el usuario de rol";
        }
    }

    public function consultarUsuarioId(){
        require_once '../model/usuario.php';
        $idUser=$_GET['idUser'];

        $oUsuario=new usuario();
        $oUsuario->consultarUsuario($idUser);

        return $oUsuario;
    }

    public function actualizarUsuario(){
        // require_once '../model/usuario.php';

        // $oUsuario=new usuario();
        // $oUsuario->idUser=$_GET['idUser'];
        // $oUsuario->nombreUser=$_GET['nombreUser'];
        // $oUsuario->correoElectronico=$_GET['correoElectronico'];
        // $oUsuario->contrasena=$_GET['contrasena'];
        // $confirmarContrasena=$_POST['confirmarContrasena'];
        // $oUsuario->actualizarUsuario();

        // require_once 'mensajeController.php';
        // $oMensaje=new mensajes();

        // if ($oUsuario->actualizarUsuario()) {
        //     //header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+actualizado+correctamente+el+usuario"."&ventana=usuario");
        //     echo "actualizar";
        // }else{
        //     echo "error";
        //     //header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error"."&ventana=usuario");
        // }
    }
}

?>