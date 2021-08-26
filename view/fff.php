<?php
//hora inicio
$horarioInicio=new DateTime();
date_time_set($horarioInicio,8,0);
$horarioInicio->format("H:i:s");

//hora cierre
$horarioCierre=new DateTime();
date_time_set($horarioCierre,20,0);
$horarioCierre->format("H:i:s");

$horario=[];


$hi=$horarioInicio;
// echo $hi->format("H:i:s");
while($hi<=$horarioCierre){
  array_push($horario,$hi->format("H:i:s"));
  // echo $hi->format("H:i:s");
  $hi->add(new DateInterval('PT30M'));
}

require_once '../controller/reservacionController.php';
$oReservacionController=new reservacionController();
$result=$oReservacionController->consultarReservacion();
// print_r($result);
// print_r($horario);


?>