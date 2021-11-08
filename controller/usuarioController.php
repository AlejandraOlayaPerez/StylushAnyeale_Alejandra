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
    case "actualizarContrasena":
        $oUsuarioController->actualizarUsuarioContrasena();
        break;
    case "usuarioCargo":
        $oUsuarioController->usuarioCargo();
        break;
    case "registrarUsuarioCargo":
        $oUsuarioController->registrarUsuarioCargo();
        break;
    case "registrarUsuarioRol":
        $oUsuarioController->registrarUsuarioRol();
        break;
    case "eliminarUsuarioDeRol":
        $oUsuarioController->eliminarUsuarioDeRol();
        break;
    case "buscarUsariosAjax":
        $oUsuarioController->buscarUsariosAjax();
        break;
}

class usuarioController
{
    //La funcion constructor se ejecuta cuando se intancia los objetos, se utiliza para configurar los elementos basicos.
    //Siempre usar :(
    public function __construct()
    {
    }
    
    public $tipoMensaje = "";
    public $mensaje = "";
    //funcion para registrar el usuario
    public function registrarUsuario()
    {
        require_once '../model/usuario.php';
        $oUsuario = new usuario();
        $oUsuario->idRol = $_POST['idRol'];
        $oUsuario->idCargo = $_POST['idCargo'];
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

        $yearActual = Date("Y");

        //explode: divide el string en arreglo
        $yearNacimiento = explode("-", $oUsuario->fechaNacimiento);
        $yearNacimiento = $yearNacimiento[0]; //arreglo 1
        $edadUsuario = $yearActual - $yearNacimiento; //Operacion para saber edad.

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($oUsuario->contrasena != $confirmarContrasena) {
            // echo "error contraseña";
            $this->tipoMensaje = $oMensaje->tipoAdvertencia;
            $this->mensaje = "Contraseña y confirmar contraseña son diferentes";
        } else {
            if ($oUsuario->consultarCorreoElectronico($oUsuario->correoElectronico) != 0) {
                // echo "error correo";
                $this->tipoMensaje = $oMensaje->tipoAdvertencia;
                $this->mensaje = "Este correo electrónico ya esta registrado";
            } else {
                if ($oUsuario->documentoIdUsuario($oUsuario->tipoDocumento, $oUsuario->documentoIdentidad) != 0) {
                    // echo "error documento";
                    $this->tipoMensaje = $oMensaje->tipoAdvertencia;
                    $this->mensaje = "Este documento ya esta registrado";
                } else {
                    if ($edadUsuario < 15) {
                        // echo "error fecha nacimiento";
                        $this->tipoMensaje = $oMensaje->tipoAdvertencia;
                        $this->mensaje = "Fecha incorrecta, El usuario debe mínimo 15 años";
                    } else {
                        $result = $oUsuario->nuevoUsuario();
                        if ($result) {
                            require_once '../model/imagen.php';
                            $oFoto = new foto();
                            $foto = $oFoto->insertarFotoPreterminada($oUsuario->getIdUser(), "image/perfilpreterminado.png");
                            if ($foto) {
                                // echo "registro";
                                $oUsuario = new usuario(); //se reinicio la variable 
                                $this->tipoMensaje = $oMensaje->tipoCorrecto;
                                $this->mensaje = "Se ha generado correctamente el registro del usuario";
                            }
                        } else {
                            // echo "error registro";
                            $this->tipoMensaje = $oMensaje->tipoError;
                            $this->mensaje = "Se ha producido un error";
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
        echo  $habilitar = $_GET['habilitar'];
        $idUser = $_GET['idUser'];

        require_once '../model/usuario.php'; //esta importando el contenido del archivo para ser accesible las funciones y atributos.

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        $oUser = new usuario(); //se define y se instancia el objeto user
        if ($oUser->comprobarEliminado($habilitar, $idUser)) { //si se va por la parte del si es correcta
            if ($habilitar == true) header("location: ../view/listarusuario.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=El+usuario+ha+sido+habilitado+correctamente");
            // if ($habilitar == true) echo "usuario habilitado";
            // else echo "usuario deshabilitado";
            else header("location: ../view/listarusuario.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=El+usuario+ha+sido+deshabilitado+correctamente");
        } else { //si se va por la parte del no,  la funcion presento algun error
            header("location: ../view/listarusuario.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
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

        $idUser = $_POST['idUser'];

        $oUsuario = new usuario();
        $oUsuario->idRol = $_POST['idRol'];
        $oUsuario->tipoDocumento = $_POST['tipoDocumento'];
        $oUsuario->documentoIdentidad = $_POST['documentoIdentidad'];
        $oUsuario->primerNombre = $_POST['primerNombre'];
        $oUsuario->segundoNombre = $_POST['segundoNombre'];
        $oUsuario->primerApellido = $_POST['primerApellido'];
        $oUsuario->segundoApellido = $_POST['segundoApellido'];
        $oUsuario->telefono = $_POST['telefono'];
        $oUsuario->fechaNacimiento = $_POST['fechaNacimiento'];
        $oUsuario->correoElectronico = $_POST['correoElectronico'];
        $oUsuario->genero = $_POST['genero'];
        $oUsuario->estadoCivil = $_POST['estadoCivil'];
        $oUsuario->direccion = $_POST['direccion'];
        $oUsuario->barrio = $_POST['barrio'];

        $yearActual = Date("Y");

        //explode: divide el string en arreglo
        $yearNacimiento = explode("-", $oUsuario->fechaNacimiento);
        $yearNacimiento = $yearNacimiento[0]; //arreglo 1
        $edadUsuario = $yearActual - $yearNacimiento; //Operacion para saber edad.

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($oUsuario->consultarCorreoElectronicoExiste($oUsuario->correoElectronico, $idUser) != 0) {
            // echo "error correo";
            header("location: ../view/perfilempleado.php?tipoMensaje=" . $oMensaje->tipoAdvertencia . "&mensaje=Ya+existe+un+registro+del+correo+electronico&ventana=informacion");
        } else {
            if ($oUsuario->documentoIdUsuarioExiste($idUser, $oUsuario->tipoDocumento, $oUsuario->documentoIdentidad) != 0) {
                // echo "error documento";
                header("location: ../view/perfilempleado.php?tipoMensaje=" . $oMensaje->tipoAdvertencia . "&mensaje=Ya+existe+un+registro+de+este+documento+identidad&ventana=informacion");
            } else {
                if ($edadUsuario < 15) {
                    // echo "error fecha";
                    header("location: ../view/perfilempleado.php?tipoMensaje=" . $oMensaje->tipoAdvertencia . "&mensaje=Fecha+incorrecta+,+ +El+usuario+debe+mínimo+15+años&ventana=informacion");
                } else {
                    $result = $oUsuario->actualizarUsuario($idUser);
                    if ($result) {
                        // echo "actualizo";
                        header("location: ../view/perfilempleado.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+la+informacion&ventana=informacion");
                    } else {
                        // echo "error actualizar";
                        header("location: ../view/perfilempleado.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error&ventana=informacion");
                    }
                }
            }
        }

        return $oUsuario; //Cuando se devuelven los datos.
    }

    public function iniciarSesion()
    {
        require_once '../model/usuario.php';
        session_start();

        $oUsuario = new usuario();
        $correoElectronico = $_POST['correoElectronico'];
        $contrasena = $_POST['contrasena'];
        $oUsuario->iniciarSesion($correoElectronico, $contrasena);

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($oUsuario->getIdUser() != 0) {
            //si entra el usuario y contraseña son correcto
            //se almacena la informacion del usuario en las variables de sesion
            //estas variables vamos a aceder en cualquier momento del proyecto
            $_SESSION['idUser'] = $oUsuario->getIdUser();
            $_SESSION['nombreUser'] = $oUsuario->getNombreUser();
            // echo "Inicio sesion correctamente";
            header("location: /anyeale_proyecto/stylushanyeale_alejandra/view/paginaprincipalgerente.php");
        } else {
            //error al iniciar sesion
            //usuario o contraseña incorrecto
            // echo "Usuario o contraseña incorrecto";
            header("location: ../view/loginusuario.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Error+al+iniciar+sesion+,+revise+su+correo+y+contraseña");
        }
        return $oUsuario;
    }

    public function cerrarSesion()
    {
        session_start();
        session_unset(); //borra las variables de sesion
        session_destroy(); //destruye o elimina la sesion
        header("location: /anyeale_proyecto/stylushanyeale_alejandra/view/loginusuario.php");
        die();
    }

    public function actualizarUsuarioContrasena()
    {
        require_once '../model/usuario.php';

        $fechaActual = Date("Y-m-d");
        $horaActual = Date("H:i:s");
        $idUser = $_POST['idUser'];


        require_once '../model/seguimiento.php';
        $oSeguimiento = new seguimiento();
        $oSeguimiento->idUser = $idUser;
        $oSeguimiento->seguimientoCambioContrasena($fechaActual, $horaActual);

        $oUsuario = new usuario();
        $contrasenaActual = $_POST['contrasenaActual'];
        echo  $contrasena = $_POST['contrasenaNueva'];
        echo  $confirmarContrasena = $_POST['confirmarContrasena'];

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($oUsuario->consultarContrasena($idUser, $contrasenaActual) != 0) {
            if ($contrasena == $confirmarContrasena) {
                $result = $oUsuario->actualizarContrasenaUsuario($idUser, $contrasena);
                if ($result) {
                    // echo "actualizo contrasena";
                    header("location: ../view/perfilempleado.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Su+contraseña+se+ha+actualizado+correctamente+su+contrasena&ventana=seguridad");
                } else {
                    // echo "error";
                    header("location: ../view/perfilempleado.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error&ventana=seguridad");
                }
            } else {
                // echo "contraseñas diferentes";
                header("location: ../view/perfilempleado.php?tipoMensaje=" . $oMensaje->tipoAdvertencia . "&mensaje=La+nueva+contrasena+y+confirmar+contraseña+son+diferentes&ventana=seguridad");
            }
        } else {
            // echo "error contraseña actual";
            header("location: ../view/perfilempleado.php?tipoMensaje=" . $oMensaje->tipoAdvertencia . "&mensaje=La+nueva+actual+es+diferente+a+la+registrada&ventana=seguridad");
        }
    }

    public function usuarioCargo()
    {
        require_once '../model/usuario.php';

        $oUsuario = new usuario();
        $result = $oUsuario->listarUsuarioPorCargo($_POST['idServicio']);

        echo json_encode($result);
    }

    public function registrarUsuarioCargo()
    {

        $idUser = $_GET['cargoUsuario'];
        $idCargo = $_GET['idCargo'];

        require_once '../model/usuario.php';

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        $oUsuario = new usuario();
        $result = $oUsuario->nuevoUsuarioRegistroMasivo($idUser, $idCargo);

        if ($result) {
            // echo "registro";
            header("location: ../view/mostrarusuariocargo.php?idCargo=$idCargo" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+registrado+un+nuevo+usuario+en+este+cargo");
        } else {
            // echo "error";
            header("location: ../view/mostrarusuariocargo.php?idCargo=$idCargo" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function eliminarUsuarioDeRol()
    {
        $idUser = $_GET['idUser'];
        $idRol = $_GET['idRol'];

        require_once '../model/usuario.php';
        $oUsuario = new usuario();
        $result = $oUsuario->actualiazadoEliminadoUsuario($idUser);

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/listardetallerol.php?idRol=$idRol" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=El+usuario+ha+sido+eliminado+del+rol");
        } else {
            header("location: ../view/listardetallerol.php" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            //echo "Error al eliminar el usuario de rol";
        }
    }

    public function registrarUsuarioRol()
    {

        $idUser = $_GET['rolUsuario'];
        $idRol = $_GET['idRol'];

        require_once '../model/usuario.php';

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        $oUsuario = new usuario();
        $result = $oUsuario->nuevoUsuarioRegistroMasivoRol($idUser, $idRol);

        if ($result) {
            // echo "registro";
            header("location: ../view/listardetallerol.php?idRol=$idRol" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+registrado+un+nuevo+usuario+en+este+rol");
        } else {
            // echo "error";
            header("location: ../view/listardetallerol.php?idRol=$idRol" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function buscarUsariosAjax()
    {
        require_once '../model/usuario.php';

        $oUsuario = new usuario();
        $paginacion = $oUsuario->paginacionUsuario($_GET['busquedaUsuario'], $_GET['documento'], $_GET['pagina']);
        echo $paginacion;
        $delimitador = "®";
        echo $delimitador;
        $datos = $oUsuario->usuarios($_GET['busquedaUsuario'], $_GET['documento'], $_GET['pagina']);
        echo json_encode($datos);
    }

    public function nombreRol($idUser)
    {
        require_once '../model/usuario.php';
        $oUsuario = new usuario();
        $result = $oUsuario->nombreRol($idUser);

        return $oUsuario;
    }

    public function nombreCargo($idUser)
    {
        require_once '../model/usuario.php';
        $oUser = new usuario();
        $result = $oUser->nombreCargo($idUser);

        return $oUser;
    }
}
