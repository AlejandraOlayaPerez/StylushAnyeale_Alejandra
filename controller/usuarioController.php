<?php

date_default_timezone_set('America/Bogota');

//clase usuarioController .php genera las comunicaciones entre las vistas y el modelo
//contiene las funciones nesesarias para alimentar la vista

$funcion = ""; //Me permite verificar si la variable esta vacia
//El if diferenciar metodo POST o GET o ninguno.
if (isset($_POST['funcion'])) { //Si esta definifa y su valor es diferente a NULO(ISSET), almacena la variable funcion.
    $funcion = $_POST['funcion'];
} else {
    if (isset($_GET['funcion'])) {
        $funcion = $_GET['funcion'];
    }
}

$oUsuarioController = new usuarioController();
switch ($funcion) {
    case "habilitarDeshabilitarUsuario":
        $oUsuarioController->habilitarDeshabilitarUsuario();
        break;
    case "ActualizarUsuario":
        $oUsuarioController->actualizarUsuario();
        break;
    case "iniciarSesion":
        $oUsuarioController->iniciarSesion();
        break;
    case "cerrarSesion":
        $oUsuarioController->cerrarSesion();
        break; 
}

class usuarioController
{
    //funcion para registrar el usuario
    public function registrarUsuario()
    {
        require_once '../model/usuario.php';
        $oUsuario = new usuario();
        $oUsuario->tipoDocumento = $_POST['tipoDocumento'];
        $oUsuario->documentoIdentidad = $_POST['documentoIdentidad'];
        $oUsuario->primerNombre = $_POST['primerNombre'];
        $oUsuario->segundoNombre = $_POST['segundoNombre'];
        $oUsuario->primerApellido = $_POST['primerApellido'];
        $oUsuario->segundoApellido = $_POST['segundoApellido'];
        $oUsuario->fechaNacimiento = $_POST['fechaNacimiento'];
        $oUsuario->genero = $_POST['genero'];
        $oUsuario->direccion = $_POST['direccion'];
        $oUsuario->barrio = $_POST['barrio'];
        $oUsuario->telefono = $_POST['telefono'];
        $oUsuario->estadoCivil = $_POST['estadoCivil'];
        $oUsuario->correoElectronico = $_POST['correoElectronico'];
        $oUsuario->contrasena = $_POST['contrasena'];
        $confirmarContrasena = $_POST['confirmarContrasena'];
        $fechaActual = Date("Y-m-d");

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($oUsuario->fechaNacimiento >= $fechaActual) {
            // header("location: ../view/nuevoUsuario.php?tipoMensaje=" . $oMensaje->tipoAdvertencia . "&mensaje=La+fecha+de+nacimiento+no+es+correcta");
            $_GET['tipoMensaje']=$oMensaje->tipoAdvertencia;
            $_GET['mensaje']="No se puede registrar fecha futura";
        } else {

            if ($oUsuario->contrasena == $confirmarContrasena) {
                if ($oUsuario->consultarCorreoElectronico($oUsuario->correoElectronico) == 0) {
                    $result = $oUsuario->nuevoUsuario();
                    if ($result) {
                        header("location: ../view/listarUsuario.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=El+usuario+fue+registrado+correctamente");
                    } else {
                        $_GET['tipoMensaje']=$oMensaje->tipoError;
                        $_GET['mensaje']="Se ha producido un error";
                    }
                } else {
                    $_GET['tipoMensaje']=$oMensaje->tipoAdvertencia;
                    $_GET['mensaje']="Este correo ya existe";
                }
            } else {
                $_GET['tipoMensaje']=$oMensaje->tipoAdvertencia;
                $_GET['mensaje']="La contraseña y la confirmacion de contraseña no coinciden";
            }
        }
        return $oUsuario;
    }

    public function habilitarDeshabilitarUsuario()
    {
        //define variables y se asigna el valor que tiene GET.
        $habilitar = $_GET['habilitar'];
        $idUser = $_GET['idUser'];

        require_once '../model/usuario.php'; //esta importando el contenido del archivo para ser accesible las funciones y atributos.

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        $oUser = new usuario(); //se define y se instancia el objeto user
        if ($oUser->comprobarEliminado($habilitar, $idUser)) { //si se va por la parte del si es correcta
            if ($habilitar == true) header("location: ../view/listarUsuario.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=El+usuario+ha+sido+habilitado+correctamente"); 
            else header("location: ../view/listarUsuario.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=El+usuario+ha+sido+deshabilitado+correctamente");
        } else { //si se va por la parte del no,  la funcion presento algun error
            header("location: ../view/listarUsuario.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }

    public function mostrarUsuarioPorIdRol($idRol)
    {
        require_once '../model/usuario.php';

        $oUsuario = new usuario();
        $listaUsuario = $oUsuario->mostrarUsuariosPorIdRol($idRol);

        return $listaUsuario;
    }

    public function usuarioDiferenteEnRol($idRol)
    {
        require_once '../model/usuario.php';

        $oRol = new usuario();
        $listarDeUsuarioDiferente = $oRol->mostrarUsuariosPorIdDiferente($idRol);

        return $listarDeUsuarioDiferente;
    }

    public function consultarUsuarioId($idUser)
    {
        require_once '../model/usuario.php';

        $oUsuario = new usuario();
        $oUsuario->consultarUsuario($idUser);

        return $oUsuario;
    }

    public function actualizarUsuario()
    {
        require_once '../model/usuario.php';

        $oUsuario = new usuario();
        $oUsuario->idUser = $_GET['idUser'];
        $oUsuario->idRol = $_GET['idRol'];
        $oUsuario->tipoDocumento = $_GET['tipoDocumento'];
        $oUsuario->documentoIdentidad = $_GET['documentoIdentidad'];
        $oUsuario->primerNombre = $_GET['primerNombre'];
        $oUsuario->segundoNombre = $_GET['segundoNombre'];
        $oUsuario->primerApellido = $_GET['primerApellido'];
        $oUsuario->segundoApellido = $_GET['segundoApellido'];
        $oUsuario->fechaNacimiento = $_GET['fechaNacimiento'];
        $oUsuario->genero = $_GET['genero'];
        $oUsuario->direccion = $_GET['direccion'];
        $oUsuario->barrio = $_GET['barrio'];
        $oUsuario->correoElectronico = $_GET['correoElectronico'];
        $oUsuario->telefono = $_GET['telefono'];
        $oUsuario->estadoCivil = $_GET['estadoCivil'];
        $result = $oUsuario->actualizarUsuario();
        $fechaActual = Date("Y-m-d");

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($oUsuario->fechaNacimiento >= $fechaActual) {
            // header("location: ../view/perfilEmpleado.php?tipoMensaje=" . $oMensaje->tipoAdvertencia . "&mensaje=La+fecha+de+nacimiento+no+es+correcta"."idUser=$idUser");
            echo "fecha incorrecta";
        } else {

            if ($result){ 
                // header("location: ../view/perfilEmpleado.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente"."idUser=$idUser");
                echo "actualizar";
            } else {
                 echo "error";
                // header("location: ../view/perfilEmpleado.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error"."idUser=$idUser");
            }
        }
    }

    public function iniciarSesion(){
        require_once '../model/usuario.php';
        session_start();

        $oUsuario=new usuario();
        $correoElectronico=$_POST['correoElectronico'];
        $contrasena=$_POST['contrasena'];
        $oUsuario->iniciarSesion($correoElectronico, $contrasena);

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if($oUsuario->getIdUser()!=0){
        //si entra el usuario y contraseña son correcto
        //se almacena la informacion del usuario en las variables de sesion
        //estas variables vamos a aceder en cualquier momento del proyecto
        $_SESSION['idUser']=$oUsuario->getIdUser();
        $_SESSION['nombreUser']=$oUsuario->getNombreUser();
        // echo "Inicio sesion correctamente";
            header("location: http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/index.php");
        }else{
            //error al iniciar sesion
            //usuario o contraseña incorrecto
            // echo "Usuario o contraseña incorrecto";
             header("location: ../view/loginUsuario.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Error+al+iniciar+sesion+,+revise+su+correo+y+contraseña");
        }
    }

    public function cerrarSesion(){
        session_start();
        session_unset(); //borra las variables de sesion
        session_destroy(); //destruye o elimina la sesion
        header("location: http://localhost/anyeale_proyecto/StylushAnyeale_Alejandra/view/loginUsuario.php");
        die();
    }
}