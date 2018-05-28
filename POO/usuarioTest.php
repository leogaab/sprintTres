<?php 
require_once("registerOPP.php");

function imprimir($data){
  print("<pre>".print_r($data, true)."</pre>");
}

$usuario = new Usuario('Ayelen', 'Coudeu', 'ayelen@gmail.com', '123456', 'estoesunaimagen.jpg', 1);
$usuario->save();
imprimir($usuario);

?>