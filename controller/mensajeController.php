<?php 

//este Php es el que permite mostrar mensajes en la pantalla despues de cierta accion ejecutada por el usuario.
class mensajes{
    public $tipoError="error";
    public $tipoAdvertencia="warning";
    public $tipoCorrecto="success";
    public $tipoInformacion="info";
    public $tipoBlanco="question";

 
    public function mensaje($tipoMensaje, $mensaje){
        return "Toast.fire({
            icon: '".$tipoMensaje."',
            title: '".$mensaje."'
          })";
    }
}
