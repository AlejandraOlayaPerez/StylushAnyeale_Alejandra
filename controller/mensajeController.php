<?php 

//este Php es el que permite mostrar mensajes en la pantalla despues de cierta accion ejecutada por el usuario.
class mensajes{
    public $tipoError="danger";
    public $tipoAdvertencia="warning";
    public $tipoCorrecto="success";
    public $tipoInformacion="info";
    public $tipoBlanco="light";

 
    public function mensaje($tipoMensaje, $mensaje){
        return '<div class="alert alert-'.$tipoMensaje.' alert-dismissible fade show" role="alert">
        '.$mensaje.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}
