<?php
//$time = 0.05;
//$costo = 6;
//do {
  //  $costo ++;
    //$inicio = microtime(true);
    //password_hash("test", PASSWORD_BCRYPT, ["cost"=>$costo]);
    //$fin = microtime(true);
//}
//while (($fin - $inicio) < $time);
//echo "El costo apropiado encontrado:".$costo."\n";

$nombre = "Octavio";
//$nombre_cifrado = password_hash ($nombre, PASSWORD_DEFAULT);
//echo $nombre_cifrado

$nombre_cifrado = password_hash($nombre, PASSWORD_DEFAULT, array("cost" => 10));
echo $nombre_cifrado;

$hash = '$2y$20$PjMEI5ZdxxuM6uAa8Nf8DuJjZDtPAlO95lzXExglRyZtkaXO67qEy';
if (password_verify('Octavio', $hash)){
    echo "Valido";
}else{
    echo "Error";
}
?>