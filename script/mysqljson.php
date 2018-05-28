<?php
    header('Content-Type: text/plain');

    // SCRIPT PARA MIGRAR MYSQL A JSON 

    $db_user = 'root';
    $db_pass = 'root';
    $database = 'huellaPet';
    $tabla = 'usuarios';
    $archivo = '../php/usuarios.json';
    $opt = [ PDO::ATTR_ERRMODE
 => PDO::ERRMODE_EXCEPTION ];
    $dsn = 'mysql:host=127.0.0.1;dbname=huellaPet;port=8889';
    
    $agregar = 0; // SI SE SETEA EN 1 AÑADE DATOS AL FINAL, EN 0 BORRA LOS EXISTENTES

    try {
        $db = new PDO($dsn, $db_user, $db_pass, $opt);
    }
    catch( PDOException $Exception ) {
        echo $Exception->getMessage();
    }

    $results = $db->query("SELECT * FROM $tabla");
    $results = $results->fetchAll(PDO::FETCH_ASSOC);

    if ($agregar === 0) {
        if (file_exists($archivo)){
            unlink($archivo);
            echo "Borrando archivo original... Comenzando de 0...\n";
        } else {
            echo "El archivo requerido no existe. Creando...\n";
        }
    }

    foreach ($results as $key => $value) {
        foreach ($results[$key] as $index => $valor) {
            if (is_numeric($valor)) {
                $results[$key][$index] = intval($valor);
            }
        }

        // var_dump($results[$key]);
        $linea = json_encode($results[$key]);
        file_put_contents($archivo, $linea . PHP_EOL, FILE_APPEND);
        echo "Datos agragados: " . $linea . "\n";
    }

    echo "Script ejecutado. Proceso finalizado.";
?>
