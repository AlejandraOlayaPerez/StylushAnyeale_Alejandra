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

    public function enviarCorreoCliente($correoDestino,$codigo,$nombreUser){
        $asunto="Comentarios de clientes.";
        $mensaje="
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <link href='/phpCRUD/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
            <link href='/phpCRUD/css/all.min.css' rel='stylesheet'>
            <script src='/phpCRUD/js/bootstrap.min.js'></script>
            <script src='/phpCRUD/js/popper.min.js'></script>
            <script src='/phpCRUD/js/jquery-3.6.0.min.js'></script>
        </head>

        <body style='background-color:rgb(170, 243, 236);'>
            <div class='container' style='background-color: background-color: rgba(255, 255, 204, 255);'>
            <div style='margin-top: 5px;'>

            
            
        </div>
        </div>
        </body>
        </html>
        ";
        // $url=$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."?funcion=restablecerContrasena&codigo=$codigo";
        // // $mensaje.="<a href='".$url."'>Click acá para restablecer la contraseña</a>";
        // $this->enviarCorreo($asunto,$mensaje,$correoDestino);
        // // echo $mensaje;
    }
}
