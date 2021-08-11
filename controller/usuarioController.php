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
    case "registroCliente":
    $oUsuarioController->registrarCliente();
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
        echo $oUsuario->fechaNacimiento = $_POST['fechaNacimiento'];
        $oUsuario->genero = $_POST['genero'];
        $oUsuario->direccion = $_POST['direccion'];
        $oUsuario->barrio = $_POST['barrio'];
        $oUsuario->telefono = $_POST['telefono'];
        $oUsuario->estadoCivil = $_POST['estadoCivil'];
        $oUsuario->correoElectronico = $_POST['correoElectronico'];
        $oUsuario->contrasena = $_POST['contrasena'];
        $confirmarContrasena = $_POST['confirmarContrasena'];

        $yearActual = Date("Y");

        //explode: divide el string en arreglo
        $yearNacimiento=explode("-", $oUsuario->fechaNacimiento);
        $yearNacimiento=$yearNacimiento[0]; //arreglo 1
        $edadUsuario=$yearActual-$yearNacimiento; //Operacion para saber edad.

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if($oUsuario->contrasena!=$confirmarContrasena){
            echo "error contraseña";
        }else{
            if($oUsuario->consultarCorreoElectronico($oUsuario->correoElectronico)!=0){
                echo "error correo";
            }else{
                if($oUsuario->documentoIdUsuario($oUsuario->tipoDocumento,$oUsuario->documentoIdentidad)!=0){
                    echo "error documento";
                }else{
                    if($edadUsuario<15){
                        echo "error fecha nacimiento";
                    }else{
                        $result=$oUsuario->nuevoUsuario();
                        if($result){
                            echo "registro";
                        }else{
                            echo "error registro";
                        }
                    }
                }
            }
        }
        return $oUsuario; //Cuando se devuelven los datos.
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

    // public function mostrarUsuarioPorIdRol($idRol)
    // {
    //     require_once '../model/usuario.php';

    //     $oUsuario = new usuario();
    //     $listaUsuario = $oUsuario->mostrarUsuariosPorIdRol($idRol);

    //     return $listaUsuario;
    // }

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

        $idUser=$_GET['idUser'];
        $oUsuario = new usuario();
        $oUsuario->idRol = $_GET['idRol'];
        $oUsuario->tipoDocumento = $_GET['tipoDocumento'];
        $oUsuario->documentoIdentidad = $_GET['documentoIdentidad'];
        $oUsuario->primerNombre = $_GET['primerNombre'];
        $oUsuario->segundoNombre = $_GET['segundoNombre'];
        $oUsuario->primerApellido = $_GET['primerApellido'];
        $oUsuario->segundoApellido = $_GET['segundoApellido'];
        $oUsuario->correoElectronico = $_GET['correoElectronico'];
        $oUsuario->telefono = $_GET['telefono'];
        $oUsuario->fechaNacimiento = $_GET['fechaNacimiento'];
        $oUsuario->genero = $_GET['genero'];
        $oUsuario->estadoCivil = $_GET['estadoCivil'];
        $oUsuario->direccion = $_GET['direccion'];
        $oUsuario->barrio = $_GET['barrio'];
    
        $result = $oUsuario->actualizarUsuario($idUser);

        $fechaActual = Date("Y-m-d");

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        // if ($oUsuario->fechaNacimiento >= $fechaActual) {
        //     // header("location: ../view/perfilEmpleado.php?tipoMensaje=" . $oMensaje->tipoAdvertencia . "&mensaje=La+fecha+de+nacimiento+no+es+correcta"."idUser=$idUser");
        //     echo "fecha incorrecta";
        // } else {

            if ($result){ 
                // header("location: ../view/perfilEmpleado.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente"."idUser=$idUser");
                echo "actualizar";
            } else {
                 echo "error";
                // header("location: ../view/perfilEmpleado.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error"."idUser=$idUser");
            }
        // }
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
}