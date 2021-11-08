<?php

class correo
{
    //La funcion constructor se ejecuta cuando se intancia los objetos, se utiliza para configurar los elementos basicos.
    //Siempre usar :(
    public function __construct()
    {
    }
    //funcion que me permite enviar el correo electronico
    public function enviarCorreoMensaje($asunto, $mensaje, $correoDestino, $correoElectronico)
    {
        $header = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $header .= "From: $correoElectronico" . "\r\n ";
        $header .= "Reply-To: $correoElectronico" . "\r\n";
        $header .= "X-Mailer: PHP/" . phpversion();
        $cuerpoMensaje = "<html>";
        $cuerpoMensaje .= "<body>$mensaje</body>";
        $cuerpoMensaje .= "</html>";
        $mail = mail($correoDestino, $asunto, $cuerpoMensaje, $header);
        if ($mail) echo "Se envió correctamente";
        else echo "error al enviar";
    }

    public function enviarCorreoCliente($correoDestino, $nombre, $correoElectronico, $asunto, $mensaje)
    {
        $asunto = "Comentarios de clientes.";
        $mensaje = "
        <!DOCTYPE html>
        <html lang='es'>

        <head>
            <link href='/phpCRUD/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
            <link href='/phpCRUD/css/all.min.css' rel='stylesheet'>
            <script src='/phpCRUD/js/bootstrap.min.js'></script>
            <script src='/phpCRUD/js/popper.min.js'></script>
            <script src='/phpCRUD/js/jquery-3.6.0.min.js'></script>
        </head>

        <body style='background-color: rgba(255, 255, 204, 255);'>
            <div style='background-color: rgba(255, 255, 204, 255); margin: 20px;'>
                <div class='row'>
                    <div class='col col-md-6'>
                        <img src='../image/PNG_LOGO.png' style='height: 80%; width: 60%;' class='d-block w-60'>
                    </div>
                    <div class='col col-md-6'>
                        <h1 style='font-family: 'Times New Roman', Times, serif; font-size:40px; margin: 10px;'>COMENTARIO DE CLIENTES</h1>
                    </div>
                </div>
            </div>

            <hr>

            <div class='col col-md-4'>
                <p><strong>Nombre Cliente: </strong> $nombre </p>
            </div>
            <div class='col col-md-4'>
                <p><strong>Correo Electronico del cliente: </strong> $correoElectronico </p>
            </div>
            <div class='col col-md-4'>
                <p><strong>Asunto del mensaje: </strong> $asunto </p>
            </div>
            <div class='col col-md-4'>
                <p><strong>Mensaje: </strong> $mensaje </p>
            </div>

            <hr>

            <div class='col col-md-12'>
                <h1 style='font-family: 'Times New Roman', Times, serif; font-size:40px; margin: 10px;'>Stylush Anyeale</h1>
            </div>

    </div>
</body>
</html>
    ";
        $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        // $mensaje.="<a href='".$url."'>Click acá para restablecer la contraseña</a>";
        $this->enviarCorreoMensaje($asunto, $mensaje, $correoDestino, $correoElectronico);
        // echo $mensaje;
    }
}
