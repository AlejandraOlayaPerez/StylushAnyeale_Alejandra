<?php

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
        case "crearRol":
        $oUsuarioController->nuevoRol();
        break;
        case "actualizarRol":
        $oUsuarioController->actualizarRol();
        break; 
        case "eliminarRol":
        $oUsuarioController->eliminarRol();
        break; 
        case "registrarUsuarioEnRol":
        $oUsuarioController->registrarUsuarioEnRol();
        break;
        case "eliminarUsuarioDeRol":
        $oUsuarioController->eliminarUsuarioDeRol();
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

        
        case "ActualizarPermisoDePagina":
        $oUsuarioController->ActualizarPermisoDePagina();
        break;
        }
    
    class usuarioController{

        public function nuevoRol(){
            require_once '../model/rol.php';
    
            require_once 'mensajeController.php';
            $oMensaje=new mensajes();
    
            $oRol=new rol();
            $oRol->nombreRol=$_GET['nombreRol'];
            if ($_GET['nombreRol']!=""){
                $result=$oRol->nuevoRol();
    
                if ($result) {
                    header("location: ../view/listarRol.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+registrado+correctamente+un+nuevo+rol");
                    // echo "registro";
                }else{
                    // echo "error";
                    header("location: ../view/listarRol.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
                }
            }else{
                header("location: ../view/nuevoRol.php?tipoMensaje=".$oMensaje->tipoAdvertencia."&mensaje=Campo+vacio,+por+favor+complete+la+informacion");
            }
        }
    
        public function consultarRolId($idRol){
            require_once '../model/rol.php';
    
            $oRol=new rol();
            $oRol->consultarRol($idRol);
    
            return $oRol;
        }

        public function usuarioDiferenteEnRol($idRol){
            require_once '../model/usuario.php'; 
    
            $oRol=new usuario();
            $listarDeUsuarioDiferente=$oRol->mostrarUsuariosPorIdDiferente($idRol);
    
            return $listarDeUsuarioDiferente;
        }

        public function mostrarUsuarioPorIdRol($idRol){
            require_once '../model/usuario.php';
    
            $oUsuario=new usuario();
            $listaUsuario=$oUsuario->mostrarUsuariosPorIdRol($idRol);
    
            return $listaUsuario;
        }

        public function registrarUsuarioEnRol(){
            require_once '../model/usuario.php';
    
            $idRol=$_GET['idRol'];
            $idUser=$_GET['idUser'];
    
            $oUsuario=new usuario();
            $result=$oUsuario->actualizarUsuarioDeRol($idRol, $idUser);
    
            require_once 'mensajeController.php';
            $oMensaje=new mensajes();
    
            if ($result){
                header("location: ../view/listarDetalleRol.php?idRol=$idRol"."&tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+agregado+el+usuario+al+rol");
            }else{
                header("location: ../CRUD_roles/listarDetalleRol.php"."&tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
                // echo "Error al registrar el usuario";
            }
        }
    
        public function eliminarUsuarioDeRol(){
            $idUser=$_GET['idUser'];
            $idRol=$_GET['idRol'];
    
            require_once '../model/usuario.php';
            $oUsuario=new usuario();
            $result=$oUsuario->actualiazadoEliminadoUsuario($idUser);
    
            require_once 'mensajeController.php';
            $oMensaje=new mensajes();
    
            if($result){
                header("location: ../view/listarDetalleRol.php?idRol=$idRol"."&tipoMensaje=".$oMensaje->tipoError."&mensaje=El+usuario+ha+sido+eliminado+del+rol");
            }else{
                header("location: ../view/listarDetalleRol.php"."&tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
                //echo "Error al eliminar el usuario de rol";
            }
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
                header("location: ../view/listarRol.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+actualizado+correctamente+el+rol");
                die();
            }else{
                //echo "error";
                header("location: ../view/listarRol.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
                die();
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
                header("Location: ../view/listarRol.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+eliminado+correctamente+el+rol");
                //echo "elimino rol";
            }else{
                header("Location: ../view/listarRol.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
                //echo "error";
            }
        }
    
        public function nuevoModulo(){
            require_once '../model/modulo.php';
            $idModulo=$_GET['idModulo'];
    
            require_once 'mensajeController.php';
            $oMensaje=new mensajes();
    
            $oModulo=new modulo();
            $oModulo->nombreModulo=$_GET['nombreModulo'];
            if ($_GET['nombreModulo']!=""){
            $result=$oModulo->nuevoModulo($idModulo);
    
                if ($result) {
                header("location: ../view/listarModulo.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+creado+un+nuevo+modulo+correctamente");
                //echo "registro modulo";
                }else{
                header("location: ../view/listarModulo.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
                //echo "error";
                }
            }else{
                header("location: ../view/nuevoModulo.php?tipoMensaje=".$oMensaje->tipoAdvertencia."&mensaje=Campo+vacio,+por+favor+complete+la+informacion");
            }
        }
    
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
                header("location: ../view/listarModulo.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+ha+actualizado+el+modulo+correctamente");
                //echo "actualizo modulo";
            }else{
                header("location: ../view/listarModulo.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error");
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
                header("location: ../view/listarModulo.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+eliminado+el+modulo+correctamente"."&ventana=modulo");
                //echo "elimino modulo";
            }else{
                header("location: ../view/listarModulo.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error"."&ventana=modulo");
                //echo "error";
            }
        }
    
        public function nuevaPagina(){
            require_once '../model/pagina.php';
    
            require_once 'mensajeController.php';
            $oMensaje=new mensajes();
    
            $oPagina=new Pagina();
            $oPagina->idModulo=$_GET['idModulo'];
            $oPagina->nombrePagina=$_GET['nombrePagina'];
            $oPagina->enlace=$_GET['enlace'];
            $oPagina->requireSession=$_GET['requireSession'];
            if ($_GET['nombrePagina'] && $_GET['enlace'] && $_GET['requireSession']!=""){
            $result=$oPagina->nuevoPagina();
    
            if($result){
               header("location: ../view/listarPagina.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+creo+correctamente+una+nueva+pagina"."&idModulo=".$_GET['idModulo']."&ventana=pagina");
               //echo "nueva pagina";
            }else {
                header("location: ../view/listarPagina.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error"."&idModulo=".$_GET['idModulo']."&ventana=pagina");
                //echo "Error al registrar la pagina";
            }
        }else{
            header("location: ../view/nuevaPagina.php?tipoMensaje=".$oMensaje->tipoAdvertencia."&mensaje=Campo+vacio,+por+favor+complete+la+informacion"."&idModulo=".$_GET['idModulo']);
        }
        }
    
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
                header("location: ../view/listarPagina.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Se+edito+correctamente+la+pagina"."&idModulo=".$_GET['idModulo']."&ventana=pagina");
                //echo "actualizoPagina";
            }else{
                header("location: ../view/listarPagina.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error"."&idModulo=".$_GET['idModulo']."&ventana=pagina");
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
                header("location: ../view/listarPagina.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+elimino+correctamente+la+pagina"."&idModulo=".$_GET['idModulo']."&ventana=pagina");
                echo "pagina eliminada";
            }else{
                header("location: ../view/listarPagina.php?tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error"."&idModulo=".$_GET['idModulo']."&ventana=pagina");
                echo "error";
            }
        }

        public function verificarPermiso($idPagina,$idRol){
            require_once '../model/permiso.php';
    
            $oPermiso=new permiso();
            $result=$oPermiso->consultarPermiso($idRol, $idPagina);
            if(sizeof($result)>0){
               return true;
            }else{
                return false;
            }
        }
    
        public function ActualizarPermisoDePagina(){
        
            $arregloPagina=$_GET['arregloPagina'];
            $idRol=$_GET['idRol'];
    
            require_once 'mensajeController.php';
            $oMensaje=new mensajes();
            
            require_once '../model/permiso.php';
            $oPermiso=new permiso();
            $result=$oPermiso->eliminarPermisoDeRol($idRol);
            if ($result==true){
                
            require_once '../model/pagina.php';
            $oPagina=new pagina();
            foreach($arregloPagina as $idPagina){
            $oPagina->consultarPagina($idPagina);
            $idModulo=$oPagina->idModulo; //Se retorna toda la consulta y solo escoge el idModulo
            $result=$oPermiso->insertarPermisoDeRol($idRol,$idModulo,$idPagina);  
            }
                header("location: ../view/listarDetalleRol.php?idRol=$idRol"."&tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=Los+permisos+del+rol+han+sido+actualizados+correctamente"."&ventana=permiso");
                // echo "permiso";
            }else{
                header("location: ../view/listarDetalleRol.php"."&tipoMensaje=".$oMensaje->tipoError."&mensaje=Se+ha+producido+un+error"."&ventana=permiso");   
                // echo "error";
            }
        }  
    }




?>