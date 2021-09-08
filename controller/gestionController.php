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

    case "crearModulo":
        $oGestionController->nuevoModulo();
        break;
    case "actualizarModulo":
        $oGestionController->actualizarModulo();
        break;
    case "eliminarModulo":
        $oGestionController->eliminarModulo();
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

    case "ActualizarPermisoDePagina":
        $oGestionController->ActualizarPermisoDePagina();
        break;
}

class gestionController
{

    public function nuevoRol()
    {
        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        require_once '../model/rol.php';
        $oRol = new rol();
        $oRol->nombreRol = $_GET['nombreRol'];
        $result = $oRol->nuevoRol();

        if ($result) {
            header("location: ../view/listarRol.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+registrado+correctamente+un+nuevo+rol");
            // echo "registro";
        } else {
            // echo "error";
            header("location: ../view/listarRol.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
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

    public function mostrarUsuarioPorIdRol($idRol, $pagina)
    {
        require_once '../model/usuario.php';

        $oUsuario = new usuario();
        $listaUsuario = $oUsuario->mostrarUsuariosPorIdRol($idRol, $pagina);

        return $listaUsuario;
    }

    public function registrarUsuarioEnRol()
    {
        require_once '../model/usuario.php';

        $idRol = $_GET['idRol'];
        $idUser = $_GET['idUser'];

        $oUsuario = new usuario();
        $result = $oUsuario->actualizarUsuarioDeRol($idRol, $idUser);

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/listarDetalleRol.php?idRol=$idRol" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+agregado+el+usuario+al+rol");
        } else {
            header("location: ../view/listarDetalleRol.php" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
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

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($oRol->actualizarRol()) {
            header("location: ../view/listarRol.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+el+rol");
            die();
        } else {
            //echo "error";
            header("location: ../view/listarRol.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            die();
        }
    }

    public function eliminarRol()
    {
        require_once '../model/rol.php';

        $oRol = new rol();
        $oRol->idRol = $_GET['idRol'];
        $oRol->eliminarRol();

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($oRol->eliminarRol()) {
            header("Location: ../view/listarRol.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+eliminado+correctamente+el+rol");
            //echo "elimino rol";
        } else {
            header("Location: ../view/listarRol.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            //echo "error";
        }
    }

    public function nuevoModulo()
    {
        require_once '../model/modulo.php';
        $idModulo = $_GET['idModulo'];

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        $oModulo = new modulo();
        $oModulo->nombreModulo = $_GET['nombreModulo'];
        $result = $oModulo->nuevoModulo($idModulo);

        if ($result) {
            header("location: ../view/listarModulo.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+creado+un+nuevo+modulo+correctamente");
            //echo "registro modulo";
        } else {
            header("location: ../view/listarModulo.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            //echo "error";
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

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($oModulo->actualizarModulo()) {
            header("location: ../view/listarModulo.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+el+modulo+correctamente");
            //echo "actualizo modulo";
        } else {
            header("location: ../view/listarModulo.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            //echo "error";
        }
    }

    public function eliminarModulo()
    {
        require_once '../model/modulo.php';

        $oModulo = new modulo();
        $oModulo->idModulo = $_GET['idModulo'];
        $oModulo->eliminarModulo();

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($oModulo->eliminarModulo()) {
            header("location: ../view/listarModulo.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+eliminado+el+modulo+correctamente" . "&ventana=modulo");
            //echo "elimino modulo";
        } else {
            header("location: ../view/listarModulo.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&ventana=modulo");
            //echo "error";
        }
    }

    public function nuevaPagina()
    {
        require_once '../model/pagina.php';

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        $oPagina = new Pagina();
        $oPagina->idModulo = $_GET['idModulo'];
        $oPagina->nombrePagina = $_GET['nombrePagina'];
        $oPagina->enlace = $_GET['enlace'];
        $oPagina->requireSession = $_GET['requireSession'];
        $oPagina->menu = $_GET['menu'];
        $result = $oPagina->nuevoPagina();

        if ($result) {
            header("location: ../view/listarPagina.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+creo+correctamente+una+nueva+pagina" . "&idModulo=" . $_GET['idModulo'] . "&ventana=pagina");
            // echo "nueva pagina";
        } else {
            header("location: ../view/listarPagina.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&idModulo=" . $_GET['idModulo'] . "&ventana=pagina");
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

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/listarPagina.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+edito+correctamente+la+pagina" . "&idModulo=" . $_GET['idModulo'] . "&ventana=pagina");
            // echo "actualizoPagina";
        } else {
            header("location: ../view/listarPagina.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&idModulo=" . $_GET['idModulo'] . "&ventana=pagina");
            // echo "error";
        }
    }

    public function eliminarPagina()
    {
        require_once '../model/pagina.php';
        $oPagina = new pagina();
        $oPagina->idPagina = $_GET['idPagina'];
        $oPagina->eliminarPagina();

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($oPagina->eliminarPagina()) {
            header("location: ../view/listarPagina.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+elimino+correctamente+la+pagina" . "&idModulo=" . $_GET['idModulo'] . "&ventana=pagina");
            echo "pagina eliminada";
        } else {
            header("location: ../view/listarPagina.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error" . "&idModulo=" . $_GET['idModulo'] . "&ventana=pagina");
            echo "error";
        }
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

        require_once 'mensajeController.php';
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
            header("location: ../view/listarDetalleRol.php?idRol=$idRol" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Los+permisos+del+rol+han+sido+actualizados+correctamente");
            // echo "permiso";
        } else {
            header("location: ../view/listarDetalleRol.php" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
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

    public function mostrarModulo()
    {
        require_once '../model/modulo.php';
        $oModulo = new modulo();
        $result = $oModulo->mostrarModulos();
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


        require_once $_SERVER['DOCUMENT_ROOT'] . '/anyeale_proyecto/StylushAnyeale_Alejandra/model/permiso.php';

        $oPermiso = new permiso();
        $result = $oPermiso->consultarPermisoUrl($idRol, $idPagina);
        if (count($result) == 0) {
            header("location: ../view/403error.php");
            // echo "denegado";
            die();
        }
    }
}
