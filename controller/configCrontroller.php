<?php

$oConfig=new config();
$oConfig->enlaceRaiz();


class config{

function enlaceRaiz(){
    //Enlace de carpeta raiz.
    $_SESSION['urlRaiz']="https://anyeale_proyecto/stylushAnyeale_alejandra/";

    //Enlace de dominio
    //return "https://www.stylushAnyeale.com/stylushanyeale_alejandra";
}

function generarCodigoPedido(){
    return mt_rand(1,1000000000);
}
}
?>