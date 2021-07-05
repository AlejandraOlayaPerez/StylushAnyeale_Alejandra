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
        case "nuevoCargo":
        $oUsuarioController->nuevoCargo();
        break;
        case "actualizarCargo":
        $oUsuarioController->actualizarCargo();
        break;
        case "eliminarCargo":
        $oUsuarioController->eliminarCargo();
        break;
        case "nuevoEmpleado":
        $oUsuarioController->nuevoEmpleado();
        break;
        case "actualizarEmpleado":
        $oUsuarioController->actualizarEmpleado();
        break;
        case "eliminarEmpleado":
        $oUsuarioController->eliminarEmpleado();
        break;
    }

class usuarioController{

    public function nuevoCargo(){
        require_once '../model/cargo.php';

        $oCargo=new cargo();
        $oCargo->cargo=$_GET['cargo'];
        $result=$oCargo->nuevoCargo();
        
        if ($result) {
            header("location: ../view/listarCargo.php");
        }else{
            header("location: ../view/listarCargo.php");
        }
    }

    public function consultarCargoPorId($idCargo){
        require_once '../model/cargo.php';

        $oCargo=new cargo();
        $oCargo->consultarCargo($idCargo);

        return $oCargo;
    }

    public function actualizarCargo(){
        require_once '../model/cargo.php';

        $oCargo=new cargo();
        $oCargo->idCargo=$_GET['idCargo'];
        $oCargo->cargo=$_GET['cargo'];
        $oCargo->actualizarCargo();

        if ($oCargo->actualizarCargo()) {
            header("location: ../view/listarCargo.php");
        }else{
            header("location: ../view/listarCargo.php");
        }
    }

    public function eliminarCargo(){
        require_once '../model/cargo.php';
        
        $oCargo=new cargo();
        $oCargo->idCargo=$_GET['idCargo'];
        $oCargo->eliminarCargo();

        if ($oCargo->eliminarCargo()) {
            header("location: ../view/listarCargo.php");
        }else{
            header("location: ../view/listarCargo.php");
        }
    }

    public function nuevoEmpleado(){
        require_once '../model/empleado.php';
        $idCargo=$_GET['idCargo'];

        $oEmpleado=new empleado();
        $oEmpleado->idCargo=$_GET['idCargo'];
        $oEmpleado->tipoDocumento=$_GET['tipoDocumento'];
        $oEmpleado->documentoIdentidad=$_GET['documentoIdentidad'];
        $oEmpleado->primerNombre=$_GET['primerNombre'];
        $oEmpleado->segundoNombre=$_GET['segundoNombre'];
        $oEmpleado->primerApellido=$_GET['primerApellido'];
        $oEmpleado->segundoApellido=$_GET['segundoApellido'];
        $oEmpleado->fechaNacimiento=$_GET['fechaNacimiento'];
        $oEmpleado->genero=$_GET['genero'];
        $oEmpleado->direccion=$_GET['direccion'];
        $oEmpleado->barrio=$_GET['barrio'];
        $oEmpleado->email=$_GET['email']; 
        $oEmpleado->telefono=$_GET['telefono'];
        $oEmpleado->nivelEstudio=$_GET['nivelEstudio'];
        $oEmpleado->experienciaLaboral=$_GET['experienciaLaboral'];
        $oEmpleado->estadoCivil=$_GET['estadoCivil'];
        $result=$oEmpleado->nuevoEmpleado();

        if ($result==1) {
            // header("location: ../view/listarEmpleado.php?idCargo=$idCargo");
            echo "se registro";
        }else if($result=="empleado existe"){
            echo "ya existe";
        }else{
            // header("location: ../view/listarEmpleado.php");
            echo "error";
        }
    }

    public function consultarEmpleadoPorId($idEmpleado){
        require_once '../model/empleado.php';

        $oEmpleado=new empleado();
        $oEmpleado->consultarEmpleado($idEmpleado);

        return $oEmpleado;
    }

    public function actualizarEmpleado(){
        require_once '../model/empleado.php';
        $idCargo=$_GET['idCargo'];

        $oEmpleado=new empleado();
        $oEmpleado->idEmpleado=$_GET['idEmpleado'];
        $oEmpleado->tipoDocumento=$_GET['tipoDocumento'];
        $oEmpleado->documentoIdentidad=$_GET['documentoIdentidad'];
        $oEmpleado->primerNombre=$_GET['primerNombre'];
        $oEmpleado->segundoNombre=$_GET['segundoNombre'];
        $oEmpleado->primerApellido=$_GET['primerApellido'];
        $oEmpleado->segundoApellido=$_GET['segundoApellido'];
        $oEmpleado->fechaNacimiento=$_GET['fechaNacimiento'];
        $oEmpleado->genero=$_GET['genero'];
        $oEmpleado->direccion=$_GET['direccion'];
        $oEmpleado->barrio=$_GET['barrio'];
        $oEmpleado->email=$_GET['email']; 
        $oEmpleado->telefono=$_GET['telefono'];
        $oEmpleado->nivelEstudio=$_GET['nivelEstudio'];
        $oEmpleado->experienciaLaboral=$_GET['experienciaLaboral'];
        $oEmpleado->estadoCivil=$_GET['estadoCivil'];
        $oEmpleado->actualizarEmpleado();

        if($oEmpleado->actualizarEmpleado()){
            header("location: ../view/listarEmpleado.php?idCargo=$idCargo");
        }else{
            header("location: ../view/listarEmpleado.php");
        }
    }

    public function eliminarEmpleado(){
        require_once '../model/empleado.php';
        $idCargo=$_GET['idCargo'];
        
        $oEmpleado=new empleado();
        $oEmpleado->idEmpleado=$_GET['idEmpleado'];
        $oEmpleado->eliminarEmpleado();

        if ($oEmpleado->eliminarEmpleado()) {
            header("location: ../view/listarEmpleado.php?idCargo=$idCargo");
        }else{
            header("location: ../view/listarEmpleado.php");
        }
    }

}

?>