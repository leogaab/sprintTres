<?php
	session_start();

	$contenido= json_encode($_SESSION);

	$ingresaDatos = file_put_contents("usuarios.json", $contenido, FILE_APPEND | LOCK_EX );

	$ver = file_get_contents('usuarios.json');

	var_dump($ver);
	echo "<hr>";

	if (file_exists('usuarios.json')) {
		$verDos = file_get_contents('usuarios.json');
		$mostrarJson = json_decode($verDos,true);
		
		var_dump($mostrarJson);
		echo "<hr>";

		// foreach ($mostrarJson as $campo => $dato) {
		// 	if($_SESSION[$campo]){
		// 		$mostrarJson[$campo]=$_SESSION[$campo];
		// 		$fh = fopen("usuarios.json", 'a');
	 //      		fwrite($fh, json_encode($mostrarJson,JSON_UNESCAPED_UNICODE));
		// 		fclose($fh);
		// 	}
		// }
		//header("Location:../index.php");	

		foreach ($mostrarJson as $datojson) {
				var_dump($datojson);	
			}
		} 


?>