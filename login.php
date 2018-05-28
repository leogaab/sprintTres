<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta lang="es">
        <meta name="author" content="DH, Coudeu, Baier, Gaab, Ojeda">
        <meta name="description" content="Huella Pet es tu Pet Shop amigo y lo mejor es que Online, no tenes que salir de tu casa, comprá lo que necesitas cuando queres.">
        <meta name="keywords" content="Huella Pet, pet shop, online, mascota, alimentos, perro">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Huella Pet</title>

        <link rel="stylesheet" type="text/css" href="./css/huellacss.css">
        <link href="./css/login.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    </head>

    <!-- Encabezado -->

    <body>
        <div class="container">
            <header>
                <div class="datosarribacontacto">
                </div>
                <div class="encabezado">
                    <div class="cont-reg-carr">
                    <div class="logo">
                        <a href="index.html"><img src="images/logo.png"></a>
                    </div>
                    <nav class="navegadorprincipal"></nav>
                    </div>
                </div>  
            </header>

            <!-- Formulario -->
            <?php
               /*
			   $nombre=null;
			   $emaillogin=null;
			   $clavelogin=null;
				
				if(array_key_exists('emaillogin', $_POST) && $_POST['emaillogin']){
					
					$onlyconsonants=$_POST['emaillogin'];
					$nombreUsuario = str_replace(".", "", $onlyconsonants);
					$ext=".json";
					$nombreArchivoUsuario=$nombreUsuario.$ext;
					$ruta = dirname(__FILE__);
					$dir = $ruta."/php/".$nombreArchivoUsuario;
						
						if (file_exists($dir)) {
							$lectura=file_get_contents($dir);
							$mostrar = json_decode($lectura,true);
								
								if( $mostrar["email"]==$_POST['emaillogin'] ){
									if((array_key_exists('clavelogin', $_POST) && $_POST['clavelogin'])){
												
										$hash1 = $mostrar["clave"];
										$hash2 = $_POST["clavelogin"];
										if(password_verify($hash2, $hash1)){
											$_SESSION["nombre"] = $mostrar["nombre"];
											$_SESSION["apellido"] = $mostrar["apellido"];
											$_SESSION["email"] = $_POST["emaillogin"];
											$_SESSION["nacionalidad"] = $mostrar["nacionalidad"];
											$_SESSION["clave"] = $hasclave;
											$_SESSION["foto"] = $mostrar["foto"];
											header("Location:./POO/usuarioLogueado.php");
										}elseif(!password_verify($hash1, $hash2)){ "<p>la clave es incorrecta</p>";}
									}
								}
						}elseif(!file_exists($dir)){echo "<p>Este email no esta registrado</p>"; }
				}
			*/
			
			 $nombre=null;
			 $emaillogin=null;
			 $clavelogin=null;
			 if(array_key_exists('emaillogin', $_POST) && $_POST['emaillogin']){
					
					$_SESSION["email"] = $_POST["emaillogin"];
						if((array_key_exists('clavelogin', $_POST) && $_POST['clavelogin'])){
							
							$_SESSION["clave"] = $_POST['clavelogin'];
							
							header("Location:./POO/usuarioLogueado.php");
						}elseif((!array_key_exists('clavelogin', $_POST) && $_POST['clavelogin'])){ "<p>la clave es incorrecta</p>";}
					
			 }
			
            ?>

            <div class="login-user">
                <h3><strong>¡Hola! <?= $nombre;?></strong></h3>
                <form class="contact_form"  method="post">
                    <ul>
                        <li>
                          <input type="text" name="emaillogin" value='<?= $emaillogin;?>'placeholder="Ingrese su usuario" required/>
						  <?php if (array_key_exists('emaillogin', $_POST) && $_POST['emaillogin']==null ){
									echo"<p>Este dato es requerido</p>";
								}
						  ?>
                        </li>
                        <li>
                            <input type="password" name="clavelogin" value='<?= $clavelogin;?>' placeholder="Ingrese su clave" required/>
                        </li>
                        <li>
                            <label>Recordarme</label>
                            <input type="checkbox" name="remember" value="ok">
                        </li>
                    </ul>
                    <input type="submit" name="login" value="login" class="boton"><br>
              </form>
            </div>

       </div>    

  </body>

  </html>
