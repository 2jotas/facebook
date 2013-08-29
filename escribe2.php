<?php

$fp = fopen('datos.txt','a') or die("Problemas al crear");

foreach($_GET as $clave => $valor)
{
fwrite($fp,"\n".$clave." => ".$valor."\n");
}
fclose($fp);


?>
