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
    case "actualizarCliente":
        $oClienteController->actualizarCliente();
        break;
    case "buscarReservacionPorCC":
        $oClienteController->buscarReservacionPorCC();
        break;
    case "buscarProductoAjax":
        $oClienteController->buscarProductoAjax();
        break;
}

class clienteController
{
    public function iniciarSesion()
    {
        require_once '../model/cliente.php';
        session_start();

        $oCliente = new cliente();
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];
        $oCliente->iniciarSesion($email, $contrasena);

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($oCliente->getIdCliente() != 0) {
            //si entra el usuario y contraseña son correcto
            //se almacena la informacion del usuario en las variables de sesion
            //estas variables vamos a aceder en cualquier momento del proyecto
            $_SESSION['idCliente'] = $oCliente->getIdCliente();
            $_SESSION['nombreUser'] = $oCliente->getNombreUser();
            // echo "Inicio sesion correctamente";
            header("location: /anyeale_proyecto/stylushAnyeale_alejandra/view/paginaprincipalcliente.php");
        } else {
            //error al iniciar sesion
            //usuario o contraseña incorrecto
            // echo "Usuario o contraseña incorrecto";
            header("location: ../view/logincliente.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Error+al+iniciar+sesion+,+revise+su+correo+y+contraseña");
        }
        return $email;
    }

    public function cerrarSesion()
    {
        session_start();
        session_unset(); //borra las variables de sesion
        session_destroy(); //destruye o elimina la sesion
        header("location: /anyeale_proyecto/stylushAnyeale_alejandra/view/paginaprincipalcliente.php");
        die();
    }

    public function registrarCliente()
    {

        require_once '../model/cliente.php';
        $oCliente = new cliente();

        $oCliente->tipoDocumento = $_POST['tipoDocumento'];
        $oCliente->documentoIdentidad = $_POST['documentoIdentidad'];
        $oCliente->primerNombre = $_POST['primerNombre'];
        $oCliente->primerApellido = $_POST['primerApellido'];
        $oCliente->direccion = $_POST['direccion'];
        $oCliente->telefono = $_POST['telefono'];
        $oCliente->email = $_POST['correoElectronico'];
        $oCliente->contrasena = $_POST['contrasena'];
        $confirmarContrasena = $_POST['confirmarContrasena'];

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($oCliente->contrasena != $confirmarContrasena) {
            // echo "error contraseña";
            $_GET['tipoMensaje'] = $oMensaje->tipoAdvertencia;
            $_GET['mensaje'] = "Contraseña y confirmar contraseña son diferentes";
        } else {
            if ($oCliente->consultarCorreoElectronico($oCliente->email) != 0) {
                // echo "error correo";
                $_GET['tipoMensaje'] = $oMensaje->tipoAdvertencia;
                $_GET['mensaje'] = "Este correo electrónico ya esta registrado";
            } else {
                if ($oCliente->documentoIdCliente($oCliente->tipoDocumento, $oCliente->documentoIdentidad) != 0) {
                    // echo "error documento";
                    $_GET['tipoMensaje'] = $oMensaje->tipoAdvertencia;
                    $_GET['mensaje'] = "Este documento ya esta registrado";
                } else {
                    $result = $oCliente->nuevoCliente();
                    if ($result) {
                        // echo "registro";
                        $oCliente = new cliente(); //se reinicio la variable 
                        header("location: ../view/paginaPrincipalCliente.php");
                    } else {
                        // echo "error registro";
                        $_GET['tipoMensaje'] = $oMensaje->tipoError;
                        $_GET['mensaje'] = "Se ha producido un error";
                    }
                }
            }
        }

        return $oCliente;
    }

    public function actualizarCliente()
    {
        require_once '../model/cliente.php';

        $idCliente = $_POST['idCliente'];

        $oCliente = new cliente();
        $oCliente->tipoDocumento = $_POST['tipoDocumento'];
        $oCliente->documentoIdentidad = $_POST['documentoIdentidad'];
        $oCliente->primerNombre = $_POST['primerNombre'];
        $oCliente->segundoNombre = $_POST['segundoNombre'];
        $oCliente->primerApellido = $_POST['primerApellido'];
        $oCliente->segundoApellido = $_POST['segundoApellido'];
        $oCliente->email = $_POST['correoElectronico'];
        $oCliente->telefono = $_POST['telefono'];
        $oCliente->fechaNacimiento = $_POST['fechaNacimiento'];
        $oCliente->genero = $_POST['genero'];
        $oCliente->direccion = $_POST['direccion'];
        $oCliente->barrio = $_POST['barrio'];

        $yearActual = Date("Y");

        //explode: divide el string en arreglo
        $yearNacimiento = explode("-", $oCliente->fechaNacimiento);
        $yearNacimiento = $yearNacimiento[0]; //arreglo 1
        $edadUsuario = $yearActual - $yearNacimiento; //Operacion para saber edad.

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($oCliente->consultarCorreoElectronicoExiste($oCliente->email, $idCliente) != 0) {
            // echo "error correo";
            header("location: ../view/perfilcliente.php?tipoMensaje=" . $oMensaje->tipoAdvertencia . "&mensaje=Ya+existe+un+registro+del+correo+electronico");
        } else {
            if ($oCliente->documentoIdUsuarioExiste($idCliente, $oCliente->tipoDocumento, $oCliente->documentoIdentidad) != 0) {
                // echo "error documento";
                header("location: ../view/perfilcliente.php?tipoMensaje=" . $oMensaje->tipoAdvertencia . "&mensaje=Ya+existe+un+registro+de+este+documento+identidad");
            } else {
                if ($edadUsuario < 15) {
                    // echo "error fecha";
                    header("location: ../view/perfilcliente.php?tipoMensaje=" . $oMensaje->tipoAdvertencia . "&mensaje=Fecha+incorrecta+,+ +El+usuario+debe+mínimo+15+años");
                } else {
                    $result = $oCliente->actualizarCliente($idCliente);
                    if ($result) {
                        // echo "actualizo";
                        header("location: ../view/perfilcliente.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+la+informacion");
                    } else {
                        // echo "error actualizar";
                        header("location: ../view/perfilcliente.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
                    }
                }
            }
        }

        return $oCliente; //Cuando se devuelven los datos.
    }



    public function consultarCliente($idCliente)
    {
        require_once '../model/cliente.php';

        $oCliente = new cliente();
        $oCliente->consultarCliente($idCliente);

        return $oCliente;
    }

    public function perfilCliente($idCliente)
    {
        require_once '../model/cliente.php';

        $oCliente = new cliente();
        $oCliente->perfilCliente($idCliente);

        return $oCliente;
    }

    public function fotoPerfilCliente($idCliente)
    {
        require_once '../model/imagen.php';

        $oFoto = new foto();
        $result = $oFoto->mostrarFotoClientePerfil($idCliente);

        return $oFoto;
    }

    public function reservacionesPorIdCliente($idCliente)
    {
        require_once '../model/reservaciones.php';

        $oReservacion = new reservacion();
        return $oReservacion->listarReservacionesPorIdCliente($idCliente);
    }

    public function buscarReservacionPorCC()
    {
        require_once '../model/reservaciones.php';

        $oReservacion = new reservacion();
        $result = $oReservacion->consultarClientePorCC($_GET['tipoDocumento'], $_GET['documentoIdentidad']);
        echo json_encode($result);
    }

    public function mostrarReservacionIdCliente($idCliente)
    {
        require_once '../model/reservaciones.php';

        $oReservacion = new reservacion();
        $result = $oReservacion->consultarReservacionId($idCliente);
        return $result;
    }

    public function buscarProductoAjax()
    {
        require_once '../model/producto.php';

        $oProducto = new producto();
        $paginacion = $oProducto->paginacionProducto($_GET['codigoProducto'], $_GET['nombreProducto'], $_GET['pagina']);
        echo $paginacion;
        $delimitador = "®";
        echo $delimitador;
        $datos = $oProducto->buscarProductoAjax($_GET['codigoProducto'], $_GET['nombreProducto'], $_GET['pagina']);
        echo json_encode($datos);
    }
}
