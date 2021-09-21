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
$oReservacionController = new reservacionController();
switch ($funcion) {
    case "validarReservacion":
        $oReservacionController->validarReservacion();
        break;
    case "mostrarHorariosDisponibles":
        $oReservacionController->mostrarHorariosDisponibles();
        break;
    case "buscarReservacionIdAjax":
        $oReservacionController->buscarReservacionIdAjax();
        break;
    case "eliminarReservacion":
        $oReservacionController->eliminarReservacion();
        break;
}

class reservacionController
{

    public function validarReservacion()
    {
        require_once '../model/reservaciones.php';

        $oReservacion = new reservacion();
        $oReservacion->idReservacion = $_GET['idReservacion'];
        $oReservacion->validarReservacion();

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        if ($oReservacion->validarReservacion()) {
            header("location: ../view/mostrarReservacion.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+validado+correctamente+la+reservacion");
            // echo "valido";
        } else {
            header("location: ../view/mostrarReservacion.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }

    public function mostrarHorariosDisponibles()
    {
        $fechaActual = Date("Y-m-d");
        $horaActual = new DateTime();
        $horaActual->format("H:i:s");
        $estilista = $_POST['estilista']; //recibiendo los valores directamente desde ajax.
        $fechaReservacion = $_POST['fechaReservacion']; //recibiendo los valores directamente desde ajax.
        $domicilio = $_POST['domicilio'];
        //hora de inicio, de 8:00 Am
        $horarioInicio = new DateTime();
        date_time_set($horarioInicio, 8, 0);
        $horarioInicio->format("H:i:s");

        //hora cierre, a 8:00 pm
        $horarioCierre = new DateTime();
        date_time_set($horarioCierre, 20, 0);
        $horarioCierre->format("H:i:s");

        $horario = []; //Se esta creando un arreglo vacio

        require_once '../model/reservaciones.php';
        $oReservacion = new reservacion();

        $tiempoServicio = $oReservacion->consultarTiempoServicio($_POST['idServicio']);

        $hi = $horarioInicio;
        while ($hi < $horarioCierre) {
            //esta condicion seria, si fecha actual es igual a fecha reservacion y la hi es mayor a hora actual,  
            if ($fechaActual == $fechaReservacion && $hi > $horaActual || $fechaReservacion > $fechaActual) {
                $result = $oReservacion->consultarReservacionParaHorario($estilista, $fechaReservacion, $hi->format("H:i:s"));
                if (count($result) == 0) {
                    array_push($horario, $hi->format("H:i:s"));
                }
            }

            $hi->add(new DateInterval('PT' . $tiempoServicio . 'M'));
            if ($domicilio == "SI") {
                $hi->add(new DateInterval('PT30M'));
            }
        }
        echo json_encode($horario);
    }

    public function consultarReservacion($idReservacion)
    {
        require_once '../model/reservaciones.php';

        $oReservacion = new reservacion();
        $oReservacion->consultarReservacion($idReservacion);
        return $oReservacion;
        
    }

    public function crearReservacion()
    {
        require_once '../model/reservaciones.php';
        $oReservacion = new reservacion();

        require_once 'configCrontroller.php';
        $Oconfig = new Config;

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        $fechaActual = Date("Y-m-d");
        $horaActual = Date("H:i:s");

        $tiempoDuracion=$oReservacion->consultarTiempoServicio($_POST['servicio']);

        do {
            $codigo = $Oconfig->generarCodigoPedido();
            $existeCodigo = $oReservacion->consultarExisteReservacion($codigo);
        } while (count($existeCodigo) > 0);

        $oReservacion->idReservacion = $codigo;
        $oReservacion->idCliente = $_POST['idCliente'];
        $oReservacion->nombres = $_POST['primerNombre'];
        $oReservacion->apellidos = $_POST['primerApellido'];
        $oReservacion->telefono = $_POST['telefono'];
        $oReservacion->idServicio = $_POST['servicio'];
        $oReservacion->idUser = $_POST['estilista'];
        $oReservacion->fechaReservacion = $_POST['fechaReservacion'];
        $oReservacion->horaReservacion = $_POST['horaReservacion'];
        $oReservacion->horaFinal=$tiempoDuracion;
        $oReservacion->domicilio = $_POST['domicilio'];
        

        $horaFinal = new DateTime();
        $hora = explode(":", $oReservacion->horaReservacion);
        date_time_set($horaFinal, $hora[0], $hora[1]);
        $horaFinal->add(new DateInterval('PT' . $tiempoDuracion . 'M'));
        $horaFinal->format("H:i:s");

        if ($oReservacion->domicilio == 1) {
            $horaFinal->add(new DateInterval('PT30M'));
            $oReservacion->direccion = $_POST['direccion'];
        }

        $horaFinal->modify('-1 minute');

        // echo $horaFinal->format("H:i:s");

        if($oReservacion->fechaReservacion<$fechaActual){
            // echo "no fecha anterior";
            header("location: ../view/nuevaReservacion.php?tipoMensaje=" . $oMensaje->tipoAdvertencia . "&mensaje=No+se+permiten+reservaciones+con+fechas+menores+a+hoy: $fechaActual");
        }else{
            $result=$oReservacion->nuevaReservacion($horaFinal->format("H:i:s"));
            if($result){
                // echo "registro reservacion";
                header("location: ../view/listarReservacion.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Su+reservacion+ha+sido+registrada+de+manera+correcta");
            }else{
                // echo "error";
                header("location: ../view/nuevaReservacion.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            }
        }
    }

    public function actualizarReservacion()
    {
        require_once '../model/reservaciones.php';
        $oReservacion = new reservacion();

        require_once 'mensajeController.php';
        $oMensaje = new mensajes();

        $fechaActual = Date("Y-m-d");

        $tiempoDuracion=$oReservacion->consultarTiempoServicio($_POST['servicio']);

        $oReservacion->idReservacion = $_POST['idReservacion'];
        $oReservacion->idCliente = $_POST['idCliente'];
        $oReservacion->nombres = $_POST['primerNombre'];
        $oReservacion->apellidos = $_POST['primerApellido'];
        $oReservacion->telefono = $_POST['telefono'];
        $oReservacion->idServicio = $_POST['servicio'];
        $oReservacion->idUser = $_POST['estilista'];
        $oReservacion->fechaReservacion = $_POST['fechaReservacion'];
        $oReservacion->horaReservacion = $_POST['horaReservacion'];
        $oReservacion->horaFinal=$tiempoDuracion;
        $oReservacion->domicilio = $_POST['domicilio'];
        

        $horaFinal = new DateTime();
        $hora = explode(":", $oReservacion->horaReservacion);
        date_time_set($horaFinal, $hora[0], $hora[1]);
        $horaFinal->add(new DateInterval('PT' . $tiempoDuracion . 'M'));
        $horaFinal->format("H:i:s");

        if ($oReservacion->domicilio == 1) {
            $horaFinal->add(new DateInterval('PT30M'));
            $oReservacion->direccion = $_POST['direccion'];
        }

        $horaFinal->modify('-1 minute');

        if($oReservacion->fechaReservacion<$fechaActual){
            // echo "no fecha anterior";
            header("location: ../view/formularioEditarReservacion.php?tipoMensaje=" . $oMensaje->tipoAdvertencia . "&mensaje=No+se+permiten+reservaciones+con+fechas+menores+a+hoy: $fechaActual");
        }else{
            $result=$oReservacion->actualizarReservacion($horaFinal->format("H:i:s"));
            if($result){
                // echo "registro reservacion";
                header("location: ../view/listarReservacion.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Su+reservacion+ha+sido+actualizada+de+manera+correcta");
            }else{
                // echo "error";
                header("location: ../view/formularioEditarReservacion.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            }
        }
    }

    public function buscarReservacionIdAjax()
    {
        require_once '../model/reservaciones.php';

        $oReservacion = new reservacion();
        $result = $oReservacion->consultarReservacionId($_GET['idCliente']);
        echo json_encode($result);
    }

    public function eliminarReservacion(){
        require_once '../model/reservaciones.php';
        
        $oReservacion=new reservacion();
        $oReservacion->idReservacion=$_GET['idReservacion'];
        $result=$oReservacion->eliminarReservacion();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($result) {
            // echo "eliminado";
            header("location: ../view/listarReservacion.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+eliminado+su+reservacion");
        }else{
            // echo "error";
            header("location: ../view/ListarReservacion.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
        }
    }
}
