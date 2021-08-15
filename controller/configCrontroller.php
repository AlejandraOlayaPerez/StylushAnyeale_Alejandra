<?php

$oConfig=new config();
$oConfig->enlaceRaiz();


class config{

function enlaceRaiz(){
    //Enlace de carpeta raiz.
    $_SESSION['urlRaiz']="https://Anyeale_proyecto/StylushAnyeale_Alejandra/";

    //Enlace de dominio
    //return "https://www.stylushAnyeale.com/stylushAnyeale_Alejandra";
}

function generarCodigoPedido(){
    return mt_rand(1,1000000000);
}
}
?>