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

$oImagenController = new imagenController();
switch ($funcion) {
    case "fotoPerfilUsuario":
        $oImagenController->fotoPerfilUsuario();
        break;
    case "actualizarFotoCliente":
        $oImagenController->actualizarFotoCliente();
        break;
}

class imagenController
{

    public function fotoPerfilUsuario(){
    
        // Validamos que el archivo exista
            if($_FILES["archivos"]["name"]) {
                $filename = $_FILES["archivos"]["name"]; //Obtenemos el nombre original del archivo
                $source = $_FILES["archivos"]["tmp_name"]; //Obtenemos un nombre temporal del archivo
                session_start();
                $ubicacion = 'image/perfilusuario/'.$_SESSION['idUser'];
                $directorio = $_SERVER['DOCUMENT_ROOT'].'/anyeale_proyecto/stylushanyeale_alejandra/'.$ubicacion; //Declaramos un  variable con la ruta donde guardaremos los archivos
                // echo $directorio;
                //Validamos si la ruta de destino existe, en caso de no existir la creamos
                if(!file_exists($directorio)){
                    mkdir($directorio,0,true) or die("No se puede crear el directorio de extracci&oacute;n");	
                }
                // require_once 'configController.php';
                // $oConfig=new config(); 
                // $codigo=$oConfig->generarCodigoUniqid();
                $dir=opendir($directorio); //Abrimos el directorio de destino
                $target_path = $directorio.'/perfilUsuario.jpg'; //Indicamos la ruta de destino, así como el nombre del archivo
                //Movemos y validamos que el archivo se haya cargado correctamente
                //El primer campo es el origen y el segundo el destino
                if(file_exists($target_path)) unlink($target_path);
                if(move_uploaded_file($source, $target_path)) {	
                    require_once '../model/imagen.php';
                    $oFoto=new foto();
                    $oFoto->fotoPerfilUsuario=$ubicacion.'/perfilusuario.jpg';
                    $result=$oFoto->actualizarFotoPerfil($_SESSION['idUser']);
                    require_once 'mensajecontroller.php';
                    $oMensaje = new mensajes();
                    if($result){
                    // echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                    header("location: ../view/perfilEmpleado.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+correctamente+la+imagen"."&ventana=foto");
                    }   
                } 
                else 
                {	
                    // echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
                    header("location: ../view/perfilEmpleado.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error"."&ventana=foto");
                }
                closedir($dir); //Cerramos el directorio de destino
            }
        // }
    }

    public function actualizarFotoCliente(){
        require_once 'mensajeController.php';
        $oMensaje = new mensajes();
         // Validamos que el archivo exista
         if($_FILES["archivos"]["name"]) {
            $filename = $_FILES["archivos"]["name"]; //Obtenemos el nombre original del archivo
            $source = $_FILES["archivos"]["tmp_name"]; //Obtenemos un nombre temporal del archivo
            session_start();
            $ubicacion = 'image/perfilcliente/'.$_SESSION['idCliente'];
            $directorio = $_SERVER['DOCUMENT_ROOT'].'/anyeale_proyecto/stylushanyeale_alejandra/'.$ubicacion; //Declaramos un  variable con la ruta donde guardaremos los archivos
            // echo $directorio;
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
                mkdir($directorio,0,true) or die("No se puede crear el directorio de extracci&oacute;n");	
            }
            // require_once 'configController.php';
            // $oConfig=new config(); 
            // $codigo=$oConfig->generarCodigoUniqid();
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/perfilCliente.jpg'; //Indicamos la ruta de destino, así como el nombre del archivo
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(file_exists($target_path)) unlink($target_path);
            if(move_uploaded_file($source, $target_path)) {	
                require_once '../model/imagen.php';
                $oFoto=new foto();
                $oFoto->fotoPerfilCliente=$ubicacion.'/perfilCliente.jpg';
                $result=$oFoto->actualizarFotoPerfilCliente($_SESSION['idCliente']);
                if($result){
                //    echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                header("location: ../view/perfilcliente.php?tipoMensaje=" . $oMensaje->tipoCorrecto . "&mensaje=Se+ha+actualizado+el+perfil+de+manera+correcta");
                }   
            } 
            else 
            {	
                // echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
                header("location: ../view/perfilcliente.php?tipoMensaje=" . $oMensaje->tipoError . "&mensaje=Se+ha+producido+un+error");
            }
            closedir($dir); //Cerramos el directorio de destino
        }
     }

    
    public function listarImagenPerfilUsuario($idUser){
        require_once '../model/imagen.php';
        
        $oFoto=new foto();
        $result=$oFoto->mostrarFotoUsuario($idUser);

        return $oFoto;
    }

    public function consultarImagenesId($idProducto){
        require_once '../model/imagen.php';

        $oFoto=new foto();
        $oFoto->consultarImagenesIdProducto($idProducto);

        return $oFoto;
    }
}
