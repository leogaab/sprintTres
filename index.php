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
	    
	    <link rel="stylesheet" href="./css/huellacss.css">

	    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet">
	    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
	</head>

	<body>
		<div class="container">
				<header>
					<div class="datosarribacontacto">
						<div class="dtc">
						<img src="images/iconoemail.png" alt="email"><p>ventas@huellapet.com</p>
						</div>
						<div class="dtc">
						<img src="images/iconowatsap.png" alt="email"><p>(011)1548352738</p>
						</div>
					</div>
					<div class="encabezado" id="alturaencabezado">
						<?php if ($_SESSION): $fotoUsuario = $_SESSION["foto"]; ?>
						<div class='cont-reg-carr'>
							<nav class='nav-reg'>
								<ul>
								<li><img src='<?= $fotoUsuario ?>' width='30px'></li>
								<li><?php echo "Hola: " . $_SESSION['nombre'] ?></li>
									<li><a href=''>Mi Cuenta</a>
										<ul>
											<li><a href='./modificarDatos.php'>Modificar Datos</a></li>
											<li><a href='./cerrarSesion.php'>Salir</a></li>
										</ul>
									</li>
								</ul>
							</nav>
							<div class='carrito'>
								<img src='images/carrito.png' alt='email'><p>Carrito: Vacio</p>
							</div>
						</div>

						<?php else: ?>

						<div class='cont-reg-carr'>
							<nav class='nav-reg'>
								<ul>
									<li><a href='./login.php'>Ingresa</a></li>
									<li><a href='./registro.php'>Registrate</a></li>
								</ul>
							</nav>
							<div class='carrito'>
							<img src='images/carrito.png' alt='email'><p>Carrito: Vacio</p>
							</div>
						</div>

						<?php endif; ?>
						
						<div class="logo">
							<img src="images/logo.png">
						</div>
						<nav class="navegadorprincipal">
								<ul>
									<li><a href="./index.php">Home</a></li>
									<li><a href="./nosotros.php">Nosotros</a></li>
									<li><a href="#productos">Tienda</a></li>
									<li><a href="./faqs.php">Preguntas</a></li>
									<li><a href="#contacto">Contacto</a></li>
								</ul>
						</nav>
						<nav class="navegadorprincipalmobile">
		                    <div class="dropdown">
		                        <button class="dropbtn" onclick="desplegar(this)"><img src="images/logoMenu.png"></button>
		                        <div class="dropdown-content">
		                        	<a href="./index.php">Home</a>
		                            <a href="./nosotros.php">Nosotros</a>
		                            <a href="./index.php">Tienda</a>
		                            <a href="./faqs.php">Preguntas</a>
		                            <a href="./index.php">Contacto</a>
		                        </div>
		                    </div>
	                	</nav>
					</div>	
				</header>
				
				<div class="contenedorbanner" onclick="contraer(this)">
					<div class="banner">
						<img src="images/carrusel.png" alt="mascotas">
					</div>
					<div class="banneruno">
						<img src="images/promouno.png" alt="mascotas">
					</div>
					<div class="bannerdos">
						<img src="images/promodos.png" alt="mascotas">
					</div>
				</div>

				<div class="productos" id="productos">
					<h1>PRODUCTOS DEL MES</h1>
					<hr>
					<div class="todoslosproductos">
						<article class="product">
							<img src="images/productouno.jpg" alt="comida para perro">
							<h2>Pedegree Adultos</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut recusandae eaque debitis sint necessitatibus, officia ex.</p>
							<div class="btn-comprar">
								<a href="#">Comprar</a>
							</div>
						</article>
						
						<article class="product">
							<img src="images/productouno.jpg" alt="comida para perro">
							<h2>Pedegree Adultos</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut recusandae eaque debitis sint necessitatibus, officia ex.</p>
							<div class="btn-comprar">
								<a href="#">Comprar</a>
							</div>
						</article>
						
						<article class="product">
							<img src="images/productouno.jpg" alt="comida para perro">
							<h2>Pedegree Adultos</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut recusandae eaque debitis sint necessitatibus, officia ex.</p>
							<div class="btn-comprar">
								<a href="#">Comprar</a>
							</div>
						</article>
						
						<article class="product">
							<img src="images/productouno.jpg" alt="comida para perro">
							<h2>Pedegree Adultos</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut recusandae eaque debitis sint necessitatibus, officia ex.</p>
							<div class="btn-comprar">
								<a href="#">Comprar</a>
							</div>
						</article>
						
						<article class="product">
							<img src="images/productouno.jpg" alt="comida para perro">
							<h2>Pedegree Adultos</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut recusandae eaque debitis sint necessitatibus, officia ex.</p>
							<div class="btn-comprar">
								<a href="#">Comprar</a>
							</div>

						</article>
						
						<article class="product">
							<img src="images/productouno.jpg" alt="comida para perro">
							<h2>Pedegree Adultos</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut recusandae eaque debitis sint necessitatibus, officia ex.</p>
							<div class="btn-comprar">
								<a href="#">Comprar</a>
							</div>
						</article>

						<article class="product ocultar">
							<img src="images/productouno.jpg" alt="comida para perro">
							<h2>Pedegree Adultos</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut recusandae eaque debitis sint necessitatibus, officia ex.</p>
							<div class="btn-comprar">
								<a href="#">Comprar</a>
							</div>
						</article>		
						
						<article class="product ocultar">
							<img src="images/productouno.jpg" alt="comida para perro">
							<h2>Pedegree Adultos</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut recusandae eaque debitis sint necessitatibus, officia ex.</p>
							<div class="btn-comprar">
								<a href="#">Comprar</a>
							</div>
						</article>
						
						<article class="product ocultar">
							<img src="images/productouno.jpg" alt="comida para perro">
							<h2>Pedegree Adultos</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut recusandae eaque debitis sint necessitatibus, officia ex.</p>
							<div class="btn-comprar">
								<a href="#">Comprar</a>
							</div>
						</article>
						
						<article class="product ocultar">
							<img src="images/productouno.jpg" alt="comida para perro">
							<h2>Pedegree Adultos</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut recusandae eaque debitis sint necessitatibus, officia ex.</p>
							<div class="btn-comprar">
								<a href="#">Comprar</a>
							</div>
						</article>

						<article class="product ocultar">
							<img src="images/productouno.jpg" alt="comida para perro">
							<h2>Pedegree Adultos</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut recusandae eaque debitis sint necessitatibus, officia ex.</p>
							<div class="btn-comprar">
								<a href="#">Comprar</a>
							</div>
						</article>

						<article class="product ocultar">
							<img src="images/productouno.jpg" alt="comida para perro">
							<h2>Pedegree Adultos</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut recusandae eaque debitis sint necessitatibus, officia ex.</p>
							<div class="btn-comprar">
								<a href="#">Comprar</a>
							</div>
						</article>
					</div>
				</div>
		
				<div class="prefinal">
					<div class="newsleterr">
					<h3><strong>SABE MAS DE TU AMIGO</strong></h3>
					<hr>
					<form class="contact_form" action="newslater.php" method="post" name="contact_form">
			     		<ul>
							<li>
								<input type="text" name="email" placeholder="*tu email" required/>
							</li>
							<li>
								<input type="submit" name="enviarnews" value="enviar" placeholder="ENVIAR">
							</li>
			    		</ul>
					</div>	
					</form>
					
					<div class="consulta" id="contacto">
					<h3>CONSULTANOS!</h3>
					<hr>
					<form class="contact_form" action="" method="post" name="contact_form">
						<ul>
							<li>
			            		<input type="text" name="nombre" placeholder="*tu nombre" required/>
							</li>
							<li>
								<input type="text" name="email" placeholder="*tu email" required/>
							</li>
							<li>
			  					<textarea type="textarea" name="mensaje" placeholder="*tu mensaje"></textarea>
							</li>
			        		<li>
								<input type="submit" name="enviarcons" value="enviar" placeholder="ENVIAR">
							</li>
			    		</ul>
					</form>
					</div>
				  
					<div class="nosotros">
					<h3>NOSOTROS</h3>
					<hr>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
					</p>
					</div>
				</div>
				<div class="ubicanos">
					<h3>Ubicanos!</h3>
					<hr>
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13136.066850016401!2d-58.3815704!3d-34.6037389!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x11bead4e234e558b!2sObelisco!5e0!3m2!1ses!2sar!4v1521055859994" width="100%" height="280px" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			<footer>
				<div class="seguinos">
					<ul>
						<li><a href="http://facebook.com" target="new"><img src="images/fb.png" alt="Facebook"></a></li>
						<li><a href="http://twitter.com" target="new"><img src="images/tw.png" alt="Twitter"></a></li>
						<li><a href="http://instagram.com" target="new"><img src="images/it.png" alt="Instagram"></a></li>
				    </ul>
				</div>
					
				<div class="legal">
					<p class="legales2">Copy right Lorem ipsum dolor sit amet.</p>
				</div>
			</footer>
		</div>
	</body>
<script type="text/javascript">
function desplegar(alturaencabezado){
var obj = document.getElementById('alturaencabezado'); 
obj.style.height = "380px";

}
function contraer(alturaencabezado){
var obj = document.getElementById('alturaencabezado'); 
obj.style.height = "400px";

}

</script>
</html>
