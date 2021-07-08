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

        case "crearRol":
        $oUsuarioController->nuevoRol();
        break;
        case "actualizarRol":
        $oUsuarioController->actualizarRol();
        break; 
        case "eliminarRol":
        $oUsuarioController->eliminarRol();
        break; 

        case "crearModulo":
        $oUsuarioController->nuevoModulo();
        break;
        case "actualizarModulo":
        $oUsuarioController->actualizarModulo();
        break;
        case "eliminarModulo":
        $oUsuarioController->eliminarModulo();
        break;

        case "crearPagina":
        $oUsuarioController->nuevaPagina();
        break;
        case "actualizarPagina":
        $oUsuarioController->actualizarPagina();
        break;
        case "eliminarPagina":
        $oUsuarioController->eliminarPagina();
        break;

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
        case "actualizarModulo":
        $oUsuarioController->actualizarEmpleado();
        break;
        case "eliminarEmpleado":
        $oUsuarioController->eliminarEmpleado();
        break;
    }

class usuarioController{

    //funcion para registrar el usuario
    public function registrarUsuario(){
        
        require_once '../model/usuario.php';
        $oUsuario=new usuario();
        $nombreUser=$_POST['nombreUser'];
        $correoElectronico=$_POST['correoElectronico'];
        $contrasena=$_POST['contrasena'];
        $confirmarContrasena=$_POST['confirmarContrasena'];

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();
        
        if($contrasena==$confirmarContrasena){
            //si son iguales la contraseña y confirmar contraseña se va a general un registro
            if ($oUsuario->consultarCorreoElectronico($correoElectronico)==0){
            //se registra usuario
            $result=$oUsuario->nuevoUsuario($nombreUser, $correoElectronico,$contrasena);
                if($result){
                    header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=El+usuario+fue+registrado+correctamente");
                    // echo "Se registro correctamente";
                }else{
                    header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+produjo+un+error+al+registrar+el+usuario");
                    // echo "error";
                }
            }else{
                header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoAdvertencia."&mensaje=Este+correo+electronico+ya+existe");
                // echo "Ya existe un registro con este correo electronico";
                //existe un registro con este correo electronico
            }
        }else{
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoAdvertencia."&mensaje=La+contraseña+y+la+confirmacion+de+contraseña+no+coinciden");
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
            if($habilitar==true) header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=El+usuario+ha+sido+habilitado+correctamente"); //echo "habilitado";//si habilitado es verdadero, se habilitara el usuario, siendo al contrario, se deshabilitara
            else header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=El+usuario+ha+sido+deshabilitado+correctamente"); //echo "deshabilitado";
        }else{ //si se va por la parte del no,  la funcion presento algun error
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
            // echo "error";
        }
    }

    public function nuevoRol(){
        require_once '../model/rol.php';

        $oRol=new rol();
        $oRol->nombreRol=$_GET['nombreRol'];
        $result=$oRol->nuevoRol();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();
        
        if ($result) {
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+registrado+correctamente+un+nuevo+rol");
            // echo "registro";
        }else{
            // echo "error";
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
        }
    }

    public function consultarRolId($idRol){
        require_once '../model/rol.php';

        $oRol=new rol();
        $oRol->consultarRol($idRol);

        return $oRol;
    }

    public function actualizarRol(){
        require_once '../model/rol.php';

        $oRol=new rol();
        $oRol->idRol=$_GET['idRol'];
        $oRol->nombreRol=$_GET['nombreRol'];
        $oRol->actualizarRol();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($oRol->actualizarRol()) {
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+actualizado+correctamente+el+rol");
            //echo "actualizar";
        }else{
            //echo "error";
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
        }
    }

    public function eliminarRol(){
        require_once '../model/rol.php';

        $oRol=new rol();
        $oRol->idRol=$_GET['idRol'];
        $oRol->eliminarRol();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($oRol->eliminarRol()) {
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+eliminado+correctamente+el+rol");
            //echo "elimino rol";
        }else{
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
            //echo "error";
        }
    }

    public function nuevoModulo(){
        require_once '../model/modulo.php';
        $idModulo=$_GET['idModulo'];

        $oModulo=new modulo();
        $oModulo->nombreModulo=$_GET['nombreModulo'];
        $result=$oModulo->nuevoModulo($idModulo);

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($result) {
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+creado+un+nuevo+modulo+correctamente");
            //echo "registro modulo";
        }else{
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
            //echo "error";
        }
    }

    //Funcion me permite consulta el modulo por Id.
    public function consultarModuloId($idModulo){
        require_once '../model/modulo.php'; //esta importando el contendio del archivo para ser usado.
        
        $oModulo=new modulo(); //define e instancia el objeto oModulo
        $oModulo->consultarModulo($idModulo); //Se ejecuta la funcion ActualizarModulo de modulo.php

        return $oModulo; //se esta retornando la instancia de usuario que tiene la informacion
    }

    public function actualizarModulo(){
        require_once '../model/modulo.php';
        
        $oModulo=new modulo();
        $oModulo->idModulo=$_GET['idModulo'];
        $oModulo->nombreModulo=$_GET['nombreModulo'];

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();
        
        if($oModulo->actualizarModulo()){
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+actualizado+el+modulo+correctamente");
            //echo "actualizo modulo";
        }else{
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
            //echo "error";
        }
    }

    public function eliminarModulo(){
        require_once '../model/modulo.php';

        $oModulo=new modulo();
        $oModulo->idModulo=$_GET['idModulo'];
        $oModulo->eliminarModulo();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($oModulo->eliminarModulo()) {
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+eliminado+el+modulo+correctamente");
            //echo "elimino modulo";
        }else{
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
            //echo "error";
        }
    }

    public function nuevaPagina(){
        require_once '../model/pagina.php';

        $oPagina=new Pagina();
        $oPagina->idModulo=$_GET['idModulo'];
        $oPagina->nombrePagina=$_GET['nombrePagina'];
        $oPagina->enlace=$_GET['enlace'];
        $oPagina->requireSession=$_GET['requireSession'];
        $result=$oPagina->nuevoPagina();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if($result){
           header("location: ../view/listarPagina.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+creo+correctamente+una+nueva+pagina"."&idModulo=".$_GET['idModulo']);
           //echo "nueva pagina";
        }else {
            header("location: ../view/listarPagina.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error"."&idModulo=".$_GET['idModulo']);
            //echo "Error al registrar la pagina";
        }
    }

    //Funcion me permite consulta el pagina por Id.
    public function consultarPaginaId($idPagina){
        require_once '../model/pagina.php'; //esta importando el contendio del archivo para ser usado.
        
        $oPagina=new pagina(); //define e instancia el objeto oModulo
        $oPagina->consultarPagina($idPagina); //Se ejecuta la funcion ActualizarModulo de modulo.php

        return $oPagina; //se esta retornando la instancia de usuario que tiene la informacion
    }
    
    public function actualizarPagina(){
        require_once '../model/pagina.php';
        
        $oPagina=new pagina();
        $oPagina->idPagina=$_GET['idPagina'];
        $oPagina->nombrePagina=$_GET['nombrePagina'];
        $oPagina->enlace=$_GET['enlace'];
        $oPagina->requireSession=$_GET['requireSession'];

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if($oPagina->actualizarPagina()){
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+edito+correctamente+la+pagina"."&idModulo=".$_GET['idModulo']);
            //echo "actualizoPagina";
        }else{
            header("location: ../view/home/paginaPrincipalGerente.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error"."&idModulo=".$_GET['idModulo']);
            //echo "error";
        }
    }

    public function eliminarPagina(){
        require_once '../model/pagina.php';
        
        $oPagina=new pagina();
        $oPagina->idPagina=$_GET['idPagina'];
        $oPagina->eliminarPagina();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($oPagina->eliminarPagina()) {
            header("location: ../view/listarPagina.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+elimino+correctamente+la+pagina"."&idModulo=".$_GET['idModulo']);
            //echo "pagina eliminada";
        }else{
            header("location: ../view/listarPagina.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error"."&idModulo=".$_GET['idModulo']);
            //echo "error";
        }
    }

    public function nuevoCargo(){
        require_once '../model/cargo.php';

        $oCargo=new cargo();
        $oCargo->cargo=$_GET['cargo'];
        $oCargo->descripcionCargo=$_GET['descripcionCargo'];
        $result=$oCargo->nuevoCargo();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();
        
        if ($result) {
            header("location: ../view/listarCargo.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+creado+un+nuevo+cargo");
        }else{
            header("location: ../view/listarCargo.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
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

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($oCargo->actualizarCargo()) {
            header("location: ../view/listarCargo.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+actualizado+el+registro+del+cargo");
        }else{
            header("location: ../view/listarCargo.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
        }
    }

    public function eliminarCargo(){
        require_once '../model/cargo.php';
        
        $oCargo=new cargo();
        $oCargo->idCargo=$_GET['idCargo'];
        $oCargo->eliminarCargo();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($oCargo->eliminarCargo()) {
            header("location: ../view/listarCargo.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+eliminado+el+registro+del+cargo");
        }else{
            header("location: ../view/listarCargo.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
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
        $oEmpleado->hojaDeVida=$_GET['hojaDeVida'];
        $oEmpleado->telefono=$_GET['telefono'];
        $oEmpleado->nivelEstudio=$_GET['nivelEstudio'];
        $oEmpleado->experienciaLaboral=$_GET['experienciaLaboral'];
        $oEmpleado->estadoCivil=$_GET['estadoCivil'];
        $result=$oEmpleado->nuevoEmpleado();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($result==1) {
            header("location: ../view/listarEmpleado.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+creado+el+registro+del+empleado+correctamente"."&idCargo=".$_GET['idCargo']);
            //echo "se registro";
        }else if($result=="empleado existe"){
            header("location: ../view/listarEmpleado.php?tipoMensaje=".$oMensaje->tipoAdvertencia."&mensaje=Ya+existe+un+registro+del+empleado"."&idCargo=".$_GET['idCargo']);
            //echo "ya existe";
        }else{
            header("location: ../view/listarEmpleado.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error"."&idCargo=".$_GET['idCargo']);
            //echo "error";
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
        $oEmpleado->hojaDeVida=$_GET['hojaDeVida'];
        $oEmpleado->telefono=$_GET['telefono'];
        $oEmpleado->nivelEstudio=$_GET['nivelEstudio'];
        $oEmpleado->experienciaLaboral=$_GET['experienciaLaboral'];
        $oEmpleado->estadoCivil=$_GET['estadoCivil'];
        $oEmpleado->actualizarEmpleado();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if($oEmpleado->actualizarEmpleado()){
            header("location: ../view/listarEmpleado.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+actualizado+el+registro+del+empleado+correctamente"."&idCargo=".$_GET['idCargo']);
        }else{
            header("location: ../view/listarEmpleado.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error"."&idCargo=".$_GET['idCargo']);
        }
    }

    public function eliminarEmpleado(){
        require_once '../model/empleado.php';
        $idCargo=$_GET['idCargo'];
        
        $oEmpleado=new empleado();
        $oEmpleado->idEmpleado=$_GET['idEmpleado'];
        $oEmpleado->eliminarEmpleado();

        require_once 'mensajeController.php';
        $oMensaje=new mensajes();

        if ($oEmpleado->eliminarEmpleado()) {
            header("location: ../view/listarEmpleado.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+eliminado+el+registro+del+empleado+correctamente"."&idCargo=".$_GET['idCargo']);
        }else{
            header("location: ../view/listarEmpleado.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error"."&idCargo=".$_GET['idCargo']);
        }
    }

}

?>