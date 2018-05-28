<?php
session_start();
require_once("registerOPP.php");
function imprimir($data){
  print("<pre>".print_r($data, true)."</pre>");
  
}
$usuario = Usuario::find($_SESSION['email'],$_SESSION['clave']);
if($usuario)
{
	header("Location:../index.php");
}else{header("Location:../login.php");}



?>