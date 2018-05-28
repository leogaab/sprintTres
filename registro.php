<?php
session_start();
require_once('POO/registerOPP.php');


  $nombre=null;
  $apellido=null;
  $email=null;
  $clave=null;
  $confirmaclave=null;
  $archivo=null;


$usuario =[
  "nombre"=>$_POST,
  "apellido"=>$_POST,
  "email"=>$_POST,
  "nacionalidad"=>$_POST,
  "clave"=>$_POST,
  "confirmaclave"=>$_POST,
  "archivo"=>"archivo"
];

$usuarioValido=[];
  foreach ($usuario as $nombreCampo => $tipoDato){
    if($tipoDato ==$_POST){
      if(array_Key_exists($nombreCampo,$_POST)){
        $usuarioValido[$nombreCampo]=$_POST[$nombreCampo];
      }
    }elseif ($tipoDato == "archivo"){
      
      if(array_Key_exists($nombreCampo,$_FILES) && $_FILES["archivo"]["error"] === UPLOAD_ERR_OK){
        $usuarioValido[$nombreCampo]=$usuario[$nombreCampo];
        $nombre = $_FILES["archivo"]["name"];
        
        //$funcionpathinfo = pathinfo($nombre, PATHINFO_EXTENSION); // devuleve la extencion del archivo
        $archivo = $_FILES["archivo"]["tmp_name"]; // C:\xampp\tmp\phpE633.tmp esta es la ruta dnd esta guardado el archivo

        $ext = pathinfo($nombre, PATHINFO_EXTENSION); // te da la extencion del archiv 
        
        
        $miArchivo = dirname(__FILE__); // en que carpeta estoy parado y ahi crea la carpeta espues con mkdir
  
        $nombrearchivo=$_POST["nombre"].rand(100,10000);
        $nombre_carpeta = "foto_usuario/"; 

        if(!is_dir($nombre_carpeta))
        { 
          mkdir($nombre_carpeta, 0777); // lectura escritura  
        } else{$nombre_carpeta=$nombre_carpeta;}
  
        $miArchivo = $nombre_carpeta;// el nombre lo pongo a mano porque no toma la variable $nombre_carpeta
        $miArchivo = $miArchivo.$nombrearchivo . "." . $ext;
      
        move_uploaded_file($archivo, $miArchivo);
  
        $miArchivo="./".$miArchivo;
        
      }
      }
    }

  $countUsuarios=count($usuario);
  $countValidos=count($usuarioValido);
  if($countUsuarios==$countValidos){
      //$hasclaveconf= password_hash($_POST["confirmaclave"], PASSWORD_DEFAULT);
               
      $_SESSION["nombre"] = $_POST["nombre"];
      $_SESSION["apellido"] = $_POST["apellido"];
      $_SESSION["email"] = $_POST["email"];
      $_SESSION["nacionalidad"] = $_POST["nacionalidad"];
      $_SESSION["clave"] = $_POST["clave"];
      //$_SESSION["confirmaclave"] =$hasclaveconf;
      $_SESSION["foto"] = $miArchivo;
      
    $usuario = new Usuario($_SESSION['nombre'], $_SESSION['apellido'], $_SESSION['email'], $_SESSION['clave'], $_SESSION['foto'], $_SESSION['nacionalidad']);
    $usuario->save();
    if($usuario){
      header("Location:login.php");
    }

  }
?>
<!DOCTYPE html>

<html>

  <head>
    <meta charset="utf-8">
    <meta lang="es">
    <meta name="author" content="DH, Coudeu, Baier, Gaab, Ojeda">
    <meta name="description" content="Huella Pet es tu Pet Shop amigo y lo mejor es que Online, no tenes que salir de tu casa, comprá lo que necesitas cuando queres.">
    <meta name="keywords" content="Huella Pet, pet shop, online, mascota, alimentos, perro">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Huella Pet</title>

    <link rel="stylesheet" type="text/css" href="./css/huellacss.css">
    <link href="./css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
  </head>


  <!-- Encabezado -->

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
   </div>

<!-- Formulario html -->
    <div class="newsleterr" onclick="contraer(this)">
      <h3><strong>CREAR CUENTA</strong></h3>

      <form class="contact_form" method="POST" enctype="multipart/form-data">
      <ul>
        <li>
          <input type="text" name="nombre" value='<?= array_key_exists('nombre', $_POST) && $_POST['nombre'] ? $_POST['nombre'] : null; ?>' placeholder="*Nombre" />
          <?php if (array_key_exists('nombre', $_POST) && $_POST['nombre']==null){
                echo"<p>Este dato es requerido</p>";
          }
          ?>
        </li>
        <li>
          <input type="text" name="apellido" value='<?= array_key_exists('apellido', $_POST) && $_POST['apellido'] ? $_POST['apellido'] : null; ?>' placeholder="*Apellido" />
          <?php if (array_key_exists('apellido', $_POST) && $_POST['apellido']==null){
                echo"<p>Este dato es requerido</p>";

          }
          ?>
        </li>
        <li>
          <input type="text" name="email" value='<?= array_key_exists('email', $_POST) && $_POST['email'] ? $_POST['email'] : null; ?>' placeholder="*Email" />
          <?php if (array_key_exists('email', $_POST) && $_POST['email']==null){
                echo"<p>Este dato es requerido</p>";
          }
          ?>
        </li>
        <li>
          <select name="nacionalidad" placeholder="Nacionalidad">
            <option value=1>Argentina</option>
            <option value=2>Uruguay</option>
            <option value=3>Brasil</option>
            <option value=4">Otro..</option>
          </select>
        </li>
        <li>
          <input type="password" name="clave" value='<?= array_key_exists('clave', $_POST) && $_POST['clave'] ? $_POST['clave'] : null; ?>' placeholder="*Clave" />
          <?php if (array_key_exists('clave', $_POST) && $_POST['clave']==null){
                echo"<p>Este dato es requerido</p>";
                 
          }
          
        ?>
        </li>
        <li>
          <input type="password" name="confirmaclave" value='<?= array_key_exists('confirmaclave', $_POST) && $_POST['confirmaclave'] ? $_POST['confirmaclave'] : null; ?>' placeholder="*Confirmar Clave" />
          <?php if (array_key_exists('confirmaclave', $_POST) && $_POST['confirmaclave']!=null){
                echo"<p>Este dato es requerido</p>";
          }
        ?>
        </li>
        <li>
          <input type="file" name="archivo" placeholder="Subi tu foto" />

        </li>
        <li>
          <input type="submit" name="registro" value="registro" >
        </li>
      </ul>
      </form>
      <p class="legales">Al registrarme, declaro que soy mayor de edad y acepto los Términos y condiciones y las Políticas de Huella Pet.</p>
    </div>


<!-- Footer -->


    <footer>

      <div class="seguinos">
        <p class="legales2">Copy right Lorem ipsum dolor sit amet.</p>
      </div>

    </footer>

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
