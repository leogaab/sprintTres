<?php 
session_start();
$contenido=json_encode($_SESSION);
$onlyconsonants=$_SESSION['email'];
$nombreUsuario = str_replace(".", "", $onlyconsonants);
$ext=".json";
$nombreArchivoUsuario=$nombreUsuario.$ext;

$verificarchivoexist = $nombreArchivoUsuario;
if (!file_exists($verificarchivoexist)) {
 	$archivo = $nombreArchivoUsuario;
	$datosAgragados = $contenido;
	$datosusuario=file_put_contents($archivo, $datosAgragados, FILE_APPEND | LOCK_EX);
	header("Location:../login.php");
	
} else {
		$lectura=file_get_contents($nombreArchivoUsuario);
		$mostrarJson = json_decode($lectura,true);
		header("Location:../login.php");
		
}

?>