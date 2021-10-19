<?php

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

$ocargoController = new cargoController();
switch ($funcion) {
    case "nuevoCargo":
        $ocargoController->nuevoCargo();
        break;
    case "actualizarCargo":
        $ocargoController->actualizarCargo();
        break;
    case "eliminarCargo":
        $ocargoController->eliminarCargo();
        break;
    case "actualizarCargoEnEmpleado":
        $ocargoController->actualizarCargoEnEmpleado();
        break;
    case "eliminarEmpleadoCargo":
        $ocargoController->eliminarEmpleadoCargo();
        break;
    case "buscarCargo":
        $ocargoController->buscarCargo();
        break;
    case "buscarUsuarioCargo":
        $ocargoController->buscarUsuarioCargo();
        break;
}

class cargoController
{
    public function nuevoCargo()
    {
        require_once '../model/cargo.php';

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        $oCargo = new cargo();
        $oCargo->idServicio = $_GET['idServicio'];
        $result = $oCargo->nuevoCargo();

        if ($result) {
            header("location: ../view/listarCargo.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+creado+un+nuevo+cargo");
        } else {
            header("location: ../view/listarCargo.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function consultarCargoPorId($idCargo)
    {
        require_once '../model/cargo.php';

        $oCargo = new cargo();
        $oCargo->consultarCargo($idCargo);

        return $oCargo;
    }

    public function actualizarCargo()
    {
        require_once '../model/cargo.php';

        $oCargo = new cargo();
        $oCargo->idCargo = $_GET['idCargo'];
        $oCargo->idServicio = $_GET['idServicio'];
        $result = $oCargo->actualizarCargo();

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/listarCargo.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+el+registro+del+cargo");
            // echo "registro";
        } else {
            header("location: ../view/listarCargo.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function eliminarCargo()
    {
        require_once '../model/cargo.php';

        $oCargo = new cargo();
        $oCargo->idCargo = $_GET['idCargo'];
        $oCargo->eliminarCargo();

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($oCargo->eliminarCargo()) {
            header("location: ../view/listarCargo.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+eliminado+el+registro+del+cargo");
        } else {
            header("location: ../view/listarCargo.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
        }
    }

    public function actualizarCargoEnEmpleado()
    {
        require_once '../model/usuario.php';

        $idCargo = $_GET['idCargo'];
        $idUser = $_GET['idUser'];

        $oUsuario = new usuario();
        $result = $oUsuario->nuevoUsuarioPorCargo($idCargo, $idUser);

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/mostrarUsuarioCargo.php?idCargo=$idCargo" . "&tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+agregado+el+empleado+al+cargo");
            // echo "nuevo";
        } else {
            header("location: ../view/mostrarUsuarioCargo.php?idCargo=$idCargo" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "Error";
        }
    }

    public function eliminarEmpleadoCargo()
    {
        require_once '../model/usuario.php';
        $idCargo = $_GET['idCargo'];

        $oUsuario = new usuario();
        $result = $oUsuario->eliminarUsuarioCargo($_GET['idUser']);

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($result) {
            header("location: ../view/mostrarUsuarioCargo.php?idCargo=$idCargo" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+eliminado+el+empleado+al+cargo");
            // echo "eliminar";
        } else {
            header("location: ../view/mostrarUsuarioCargo.php?idCargo=$idCargo" . "&tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "Error";
        }
    }

    public function buscarCargo()
    {
        require_once '../model/cargo.php';

        $oCargo = new cargo();
        $paginacion = $oCargo->paginacionCargo($_GET['pagina']);
        echo $paginacion;
        $delimitador = "®";
        echo $delimitador;
        $datos = $oCargo->cargo($_GET['pagina']);
        echo json_encode($datos);
    }

    public function buscarUsuarioCargo()
    {
        require_once '../model/cargo.php';

        $oCargo = new cargo();
        $paginacion = $oCargo->paginacionUsuarioCargo($_GET['idCargo'], $_GET['pagina']);
        echo $paginacion;
        $delimitador = "®";
        echo $delimitador;
        $datos = $oCargo->usuarioCargo($_GET['idCargo'], $_GET['pagina']);
        echo json_encode($datos);
    }
}
