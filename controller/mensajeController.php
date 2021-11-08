<?php

//este Php es el que permite mostrar mensajes en la pantalla despues de cierta accion ejecutada por el usuario.
class mensajes
{
    //La funcion constructor se ejecuta cuando se intancia los objetos, se utiliza para configurar los elementos basicos.
    //Siempre usar :(
    public function __construct()
    {
    }

    public $tipoError = "error";
    public $tipoAdvertencia = "warning";
    public $tipoCorrecto = "success";
    public $tipoInformacion = "info";
    public $tipoBlanco = "question";


    public function mensaje($tipoMensaje, $mensaje)
    {
        return "Toast.fire({
            icon: '" . $tipoMensaje . "',
            title: '" . $mensaje . "'
          })";
    }
}
