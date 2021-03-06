<?php

$funcion = ""; //Me permite verificar si la variable esta vacia
//El if diferenciar metodo POST o GET o ninguno.
if (isset($_POST['funcion'])) { //Si esta definifa y su valor es diferente a NULO(ISSET), almacena la variable funcion.
    $funcion = $_POST['funcion'];
} else {
    if (isset($_GET['funcion'])) {
        $funcion = $_GET['funcion'];
    }
}

$oGestionController = new gestionController();
switch ($funcion) {
    case "crearRol":
        $oGestionController->nuevoRol();
        break;
    case "actualizarRol":
        $oGestionController->actualizarRol();
        break;
    case "eliminarRol":
        $oGestionController->eliminarRol();
        break;
    case "buscarRol":
        $oGestionController->buscarRol();
        break;
    case "buscarUsuarioRol":
        $oGestionController->buscarUsuarioRol();
        break;

    case "crearModulo":
        $oGestionController->nuevoModulo();
        break;
    case "actualizarModulo":
        $oGestionController->actualizarModulo();
        break;
    case "eliminarModulo":
        $oGestionController->eliminarModulo();
        break;
    case "buscarModulo":
        $oGestionController->buscarModulo();
        break;

    case "crearPagina":
        $oGestionController->nuevaPagina();
        break;
    case "actualizarPagina":
        $oGestionController->actualizarPagina();
        break;
    case "eliminarPagina":
        $oGestionController->eliminarPagina();
        break;
    case "buscarPagina":
        $oGestionController->buscarPagina();
        break;

    case "ActualizarPermisoDePagina":
        $oGestionController->ActualizarPermisoDePagina();
        break;
}

class gestionController
{
    //La funcion constructor se ejecuta cuando se intancia los objetos, se utiliza para configurar los elementos basicos.
    //Siempre usar :(
    public function __construct()
    {
    }

    public function nuevoRol()
    {
        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        require_once '../model/rol.php';
        $oRol = new rol();
        $oRol->nombreRol = $_GET['nombreRol'];
        $result = $oRol->nuevoRol();

        if ($result) {
            header("location: ../view/listarrol.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+registrado+correctamente+un+nuevo+rol");
            // echo "registro";
        } else {
            // echo "error";
            header("location: ../view/listarrol.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function consultarRolId($idRol)
    {
        require_once '../model/rol.php';

        $oRol = new rol();
        $oRol->consultarRol($idRol);

        return $oRol;
    }

    public function usuarioDiferenteEnRol($idRol)
    {
        require_once '../model/usuario.php';

        $oRol = new usuario();
        $listarDeUsuarioDiferente = $oRol->mostrarUsuariosPorIdDiferente($idRol);

        return $listarDeUsuarioDiferente;
    }

    public function registrarUsuarioEnRol()
    {
        require_once '../model/usuario.php';

        $idRol = $_GET['idRol'];
        $idUser = $_GET['idUser'];

        $oUsuario = new usuario();
        $result = $oUsuario->actualizarUsuarioDeRol($idRol, $idUser);

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/listardetallerol.php?idRol=$idRol" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+agregado+el+usuario+al+rol");
        } else {
            header("location: ../view/listardetallerol.php" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "Error al registrar el usuario";
        }
    }

    public function actualizarRol()
    {
        require_once '../model/rol.php';

        $oRol = new rol();
        $oRol->idRol = $_GET['idRol'];
        $oRol->nombreRol = $_GET['nombreRol'];
        $oRol->actualizarRol();

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($oRol->actualizarRol()) {
            header("location: ../view/listarrol.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+el+rol");
            die();
        } else {
            //echo "error";
            header("location: ../view/listarrol.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            die();
        }
    }

    public function eliminarRol()
    {
        require_once '../model/rol.php';

        $oRol = new rol();
        $oRol->idRol = $_GET['idRol'];
        $oRol->eliminarRol();

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($oRol->eliminarRol()) {
            header("Location: ../view/listarrol.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+eliminado+correctamente+el+rol");
            //echo "elimino rol";
        } else {
            header("Location: ../view/listarrol.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            //echo "error";
        }
    }

    public function buscarRol()
    {
        require_once '../model/rol.php';

        $oRol = new rol();
        $paginacion = $oRol->paginacionRol($_GET['pagina']);
        echo $paginacion;
        $delimitador = "??";
        echo $delimitador;
        $datos = $oRol->rol($_GET['pagina']);
        echo json_encode($datos);
    }

    public function buscarUsuarioRol()
    {
        require_once '../model/rol.php';

        $oRol = new rol();
        $paginacion = $oRol->paginacionDetalleRol($_GET['idRol'], $_GET['pagina']);
        echo $paginacion;
        $delimitador = "??";
        echo $delimitador;
        $datos = $oRol->detalleRol($_GET['idRol'], $_GET['pagina']);
        echo json_encode($datos);
    }


    public function nuevoModulo()
    {
        require_once '../model/modulo.php';
        $idModulo = $_GET['idModulo'];

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        $oModulo = new modulo();
        $oModulo->nombreModulo = $_GET['nombreModulo'];
        echo $oModulo->icono = $_GET['icono'];
        $result = $oModulo->nuevoModulo($idModulo);

        if ($result) {
            header("location: ../view/listarmodulo.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+creado+un+nuevo+modulo+correctamente");
            // echo "registro modulo";
        } else {
            header("location: ../view/listarmodulo.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }

    public function consultarModuloId($idModulo)
    {
        require_once '../model/modulo.php';

        $oModulo = new modulo();
        $oModulo->consultarModulo($idModulo);

        return $oModulo;
    }

    public function actualizarModulo()
    {
        require_once '../model/modulo.php';

        $oModulo = new modulo();
        $oModulo->idModulo = $_GET['idModulo'];
        $oModulo->nombreModulo = $_GET['nombreModulo'];
        $oModulo->icono = $_GET['icono'];

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($oModulo->actualizarModulo()) {
            header("location: ../view/listarmodulo.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+el+modulo+correctamente");
            //echo "actualizo modulo";
        } else {
            header("location: ../view/listarmodulo.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            //echo "error";
        }
    }

    public function eliminarModulo()
    {
        require_once '../model/modulo.php';

        $oModulo = new modulo();
        $oModulo->idModulo = $_GET['idModulo'];
        $oModulo->eliminarModulo();

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($oModulo->eliminarModulo()) {
            header("location: ../view/listarmodulo.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+eliminado+el+modulo+correctamente" . "&ventana=modulo");
            //echo "elimino modulo";
        } else {
            header("location: ../view/listarmodulo.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&ventana=modulo");
            //echo "error";
        }
    }

    public function buscarModulo()
    {
        require_once '../model/modulo.php';

        $oModulo = new modulo();
        $paginacion = $oModulo->paginacionModulo($_GET['pagina']);
        echo $paginacion;
        $delimitador = "??";
        echo $delimitador;
        $datos = $oModulo->modulo($_GET['pagina']);
        echo json_encode($datos);
    }

    public function nuevaPagina()
    {
        require_once '../model/pagina.php';

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        $oPagina = new Pagina();
        $oPagina->idModulo = $_GET['idModulo'];
        $oPagina->nombrePagina = $_GET['nombrePagina'];
        $oPagina->enlace = $_GET['enlace'];
        $oPagina->requireSession = $_GET['requireSession'];
        $oPagina->menu = $_GET['menu'];
        $result = $oPagina->nuevoPagina();

        if ($result) {
            header("location: ../view/listarpagina.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+creo+correctamente+una+nueva+pagina" . "&idModulo=" . $_GET['idModulo'] . "&ventana=pagina");
            // echo "nueva pagina";
        } else {
            header("location: ../view/listarpagina.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&idModulo=" . $_GET['idModulo'] . "&ventana=pagina");
            // echo "Error al registrar la pagina";
        }
    }

    public function consultarPaginaId($idPagina)
    {
        require_once '../model/pagina.php'; //esta importando el contendio del archivo para ser usado.

        $oPagina = new pagina(); //define e instancia el objeto oModulo
        $oPagina->consultarPagina($idPagina); //Se ejecuta la funcion ActualizarModulo de modulo.php

        return $oPagina; //se esta retornando la instancia de usuario que tiene la informacion
    }

    public function actualizarPagina()
    {
        require_once '../model/pagina.php';

        $oPagina = new pagina();
        $oPagina->idPagina = $_GET['idPagina'];
        $oPagina->nombrePagina = $_GET['nombrePagina'];
        $oPagina->enlace = $_GET['enlace'];
        $oPagina->requireSession = $_GET['requireSession'];
        $oPagina->menu = $_GET['menu'];
        $result = $oPagina->actualizarPagina();

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/listarpagina.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+edito+correctamente+la+pagina" . "&idModulo=" . $_GET['idModulo'] . "&ventana=pagina");
            // echo "actualizoPagina";
        } else {
            header("location: ../view/listarpagina.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&idModulo=" . $_GET['idModulo'] . "&ventana=pagina");
            // echo "error";
        }
    }

    public function eliminarPagina()
    {
        require_once '../model/pagina.php';
        $oPagina = new pagina();
        $oPagina->idPagina = $_GET['idPagina'];
        $oPagina->eliminarPagina();

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        if ($oPagina->eliminarPagina()) {
            header("location: ../view/listarpagina.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+elimino+correctamente+la+pagina" . "&idModulo=" . $_GET['idModulo'] . "&ventana=pagina");
            // echo "pagina eliminada";
        } else {
            header("location: ../view/listarpagina.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&idModulo=" . $_GET['idModulo'] . "&ventana=pagina");
            // echo "error";
        }
    }

    public function buscarPagina()
    {
        require_once '../model/pagina.php';

        $oPagina = new pagina();
        $paginacion = $oPagina->paginacionPagina($_GET['idModulo'], $_GET['pagina']);
        echo $paginacion;
        $delimitador = "??";
        echo $delimitador;
        $datos = $oPagina->pagina($_GET['idModulo'], $_GET['pagina']);
        echo json_encode($datos);
    }

    public function verificarPermiso($idPagina, $idRol)
    {
        require_once '../model/permiso.php';

        $oPermiso = new permiso();
        $result = $oPermiso->consultarPermiso($idRol, $idPagina);
        if (sizeof($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function ActualizarPermisoDePagina()
    {

        $arregloPagina = $_GET['arregloPagina'];
        $idRol = $_GET['idRol'];

        require_once 'mensajecontroller.php';
        $oMensaje = new mensajes();

        require_once '../model/permiso.php';
        $oPermiso = new permiso();
        $result = $oPermiso->eliminarPermisoDeRol($idRol);
        if ($result == true) {

            require_once '../model/pagina.php';
            $oPagina = new pagina();
            foreach ($arregloPagina as $idPagina) {
                $oPagina->consultarPagina($idPagina);
                $idModulo = $oPagina->idModulo; //Se retorna toda la consulta y solo escoge el idModulo
                $result = $oPermiso->insertarPermisoDeRol($idRol, $idModulo, $idPagina);
            }
            header("location: ../view/listardetallerol.php?idRol=$idRol" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Los+permisos+del+rol+han+sido+actualizados+correctamente");
            // echo "permiso";
        } else {
            header("location: ../view/listardetallerol.php" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }

    public function consultarPaginaPorUrl($url)
    {
        require_once '../model/pagina.php';

        $oPagina = new pagina();
        $oPagina->consultarPaginaPorUrl($url);
        return $oPagina;
    }

    public function mostrarModulo($idUser)
    {
        require_once '../model/usuario.php';
        $oUsuario = new usuario();
        $oUsuario = new usuario();
        $oUsuario->consultarUsuario($idUser);
        $idRol = $oUsuario->idRol;

        require_once '../model/modulo.php';
        $oModulo = new modulo();
        $result = $oModulo->mostrarModulos($idRol);
        return $result;
    }

    public function paginasPorModulo($idModulo)
    {
        $idUser = $_SESSION['idUser']; //recibiendo con cookie

        //consultar idRol
        require_once '../model/usuario.php';
        $oUsuario = new usuario();
        $oUsuario->consultarUsuario($idUser);
        $idRol = $oUsuario->idRol;

        require_once '../model/pagina.php';
        $oPagina = new pagina();
        $result = $oPagina->paginasPorModulo($idModulo, $idRol);
        return $result;
    }

    public function verificarPermisoUrl($url)
    {

        $idUser = $_SESSION['idUser']; //recibiendo con cookie

        //consultar idRol
        require_once '../model/usuario.php';
        $oUsuario = new usuario();
        $oUsuario->consultarUsuario($idUser);
        $idRol = $oUsuario->idRol;

        //consultar idPagina
        require_once '../model/pagina.php';
        $oPagina = new pagina();
        $oPagina->consultarPaginaPorUrl($url);
        $idPagina = $oPagina->idPagina;


        require_once $_SERVER['DOCUMENT_ROOT'] . '/anyeale_proyecto/stylushanyeale_alejandra/model/permiso.php';

        $oPermiso = new permiso();
        $result = $oPermiso->consultarPermisoUrl($idRol, $idPagina);
        if (count($result) == 0) {
            header("location: ../view/403error.php");
            // echo "denegado";
            die();
        }
    }
}
