<?php
//header('Content-Type: text/plain');

//TESTEANDO SI FUNCA EL JSON
//$archivo = file_get_contents('../php/usuarios.json');
//var_dump(json_decode($archivo));

/**************************************
SCRIPT PARA MIGRAR JSON A BASE DE DATOS
**************************************/


// SETEAR VARIABLES ****************

$dsn = 'mysql:host=127.0.0.1;dbname=huellaPet;port=8889';
$db_user = 'root';
$db_pass = 'root';
$database = 'huellaPet';

$opt = [ PDO::ATTR_ERRMODE
 => PDO::ERRMODE_EXCEPTION ];

$archivo = file_get_contents('../php/usuarios.json');
$tabla = 'usuarios';

$db = new PDO($dsn, $db_user, $db_pass, $opt);


// SE TRAEN LOS DATOS DEL ARCHIVO JSON *********

$decodeo = json_decode($archivo, true);

//REVISO QUE FUNCIONE EL DECODE
//var_dump($decodeo);

/* INFORMO LO QUE VOY A HACER PARA ENTENDER -  SIEMPRE VEO EN CONSOLA
	echo "\n";
	echo "Estoy viendo el valor del foreach decodeo as key =>valorArray\n";
	echo "\n";
*/

// CREAR TABLA SI NO EXISTE

$db->query("use $database");
$query = $db->query("SHOW TABLES");
$array = $query->fetchAll(PDO::FETCH_ASSOC);

if (empty($array)) {
	$encontrado = 0;
} else{
	$encontrado = 1;
}

if ($encontrado === 0) {

	$tablaNacionalidades = "CREATE TABLE nacionalidades (
    id tinyint(1) unsigned not null auto_increment primary key,
	nacionalidad varchar (200) not null unique
	)";

	//TENGO QUE EJECUTAR PRIMERO
	$db->exec($tablaNacionalidades);

	$agregarNac = "INSERT INTO nacionalidades VALUES (null, 'Argentina'), (null, 'Uruguay'), (null, 'Brasil'), (null, 'Otro')";
	$query = $db->prepare($agregarNac);
		
	//Ejecuto la acción
	$query->execute();
	

	$crearTabla = "CREATE TABLE usuarios (
    id tinyint(2) unsigned zerofill auto_increment primary key,
	nombre varchar (200) not null,
	apellido varchar(200) not null,
	email varchar(200) not null unique,
	password varchar(200) not null,
	imagen varchar(200) not null,
	id_nacionalidad tinyint(1) unsigned,
	FOREIGN KEY (id_nacionalidad) REFERENCES nacionalidades(id) on update cascade on delete restrict
	)";

	//TENGO QUE EJECUTAR SEGUNDO
    $db->exec($crearTabla);

} else {
	echo "La tabla \"$tabla\" ya existe, continuando...\n";
}

// Terminaria ac

foreach ($decodeo as $key => $valorArray) {

	/*Testeo foreach valores json 
		echo "VALOR ASIGNADO EN valorArray\n";
		echo "\n";
		var_dump($valorArray);
		echo "\n";
	*/
	
	foreach ($valorArray as $llave => $resultado) {

		//echo "VALOR SEGUNDO FOREACH valorArray as llave => RESULTADO\n";

		//var_dump($resultado["nombre"]);

		//Inserto los datos recorridos del array en la base de datos
		$insert ='INSERT INTO usuarios (nombre,apellido,email,password,imagen,id_nacionalidad) VALUES ("'. $resultado["nombre"] . '","'. $resultado["apellido"] . '", "'. $resultado["email"] . '", "'. $resultado["clave"] . '", "'. $resultado["foto"] . '", "'. $resultado["nacionalidad"] . '")';
		
		$query = $db->prepare($insert);
		
		//Ejecuto la acción
		$query->execute();
	}
}

//GENERAR CONEXIÓN

try {
	$db = new PDO($dsn, $db_user, $db_pass, $opt);
}
catch( PDOException $Exception ) {
	echo $Exception->getMessage();
}

//HAGO UN DUMP PARA VER SI HAGO LA CONEXION
//var_dump($db)

echo "Proceso finalizado, todo se ha realizado correctamente.\n";
//TODO LISO VIEJA

?>
