<?php

    include('controladores.php');

    if(!isset($_SESSION['user']['id'])){
        header("location: registro.php");
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>


   

    <!--Conexion fuentes-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
 <!--Link Icon-->

    <link rel="icon" href="../img/logo.png" />
    
</head>
<style><?php include '../css/contact.css'; ?></style>

<body class="hidden">

<!--animacion-->

<div class="centrado" id="onload">
   <div class="lds-dual-ring"></div>
</div>

<!--End animacion-->

<!--Nav-->
<div class="contenedor_logo">
      <img src="../img/logo.png" width="90px" />
    </div>

    <div class="contenedor">
      <ul class="contenedor_ul">

      
       <h2 class="name" translate="no"><?php if (true) {
        
       }echo $_SESSION["user"]["user"] ?></h2>

    
<li><a href="index.php" translate="no">Home</a></li>
        <li class="etiqueta" id="chollon" onclick="showMenu()" >
        Tienda <img src="../img/flecha-hacia-abajo.png" alt="" class="efecto" id="chollon">
          <ul id="submenu" class="dropDown">
          <a href="filtros.php?tipo=camisa"><li class="li_submenu">Camisas</li></a>
            <a href="filtros.php?tipo=hoodie"><li class="li_submenu">Sudaderas</li></a>
            <a href="filtros.php?tipo=gorra"><li class="li_submenu">Gorras</li></a>
            <a href="filtros.php?tipo=otro"><li class="li_submenu">Otros</li></a>
           
          </ul>
        </li>

    
        <li><a href="">Contactanos</a></li>
        <li><a href="pedidos.php">Pedidos</a></li>
        <li><a href="close.php"> Cerrar sesion </a></li>
  
        <li class="imagen"><a href="carrito.php"><img src="../img/carrito.png" alt=""  /></a></li>
       
        <div id="google_translate_element"></div>

<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
function googleTranslateElementInit(){
  new google.translate.TranslateElement(
    {
      // pageLanguage: 'es',
      includedLanguages: 'es,en',
      layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
      autoDisplay: false
    }, 
  'google_translate_element');
}
  </script>

</ul>
</div>
    <!--End Nav-->



    <div class="container">

        <form class="form" method="post">
            <br>
            <h2>Contactanos</h2>
            <p>Puedes contactar con nosotros a través de este formulario, simplemente escribe los datos que se te solicitan en sus respectivos campos, y puedes informarnos sobre cualquier sugerencia, duda o queja que tu desees compartir con ChivoChop.</p>

            <label for="nombre">Escribe tu nombre</label>
            <input type="text" id="nombre" class="box" name="nombre">

            <label for="correo">Escribe tu correo</label>
            <input type="email" id="correo" class="box" name="correo">

            <label for="mensaje">Escribe aqui</label>
            <textarea id="mensaje" cols="30" rows="10" class="box" name="comentario"></textarea>

            <input type="submit" value="Enviar" class="submit" name="enviarContacto">

        </form>

        <div class="info">
            <img src="../img/logoW.png" class="img-1" alt="">
            <div class="icons">
                <img src="../img/gps-svgrepo-com.svg" alt="">
                <p>Buscanos en persona</p>
            </div>

            <div class="icons">
                <img src="../img/phone-svgrepo-com.svg" alt="">
                <p>Llamanos</p>
            </div>

            <div class="icons">
                <img src="../img/email-svgrepo-com.svg" alt="">
                <p>Contactanos por correo</p>
            </div>
        </div>
    </div>


     <!--Footer-->
     <footer>

      <img src="../img/logo.png" alt="" class="logo">
      <div class="social-icons-container">
        <a href="" class="social-icon"></a>
        <a href="" class="social-icon"></a>
        <a href="" class="social-icon"></a>
        <a href="" class="social-icon"></a>
      </div>
    
      <span class="copyright">&copy;2023 ChivoChop - Todos los derechos reservados</span>
    
    
    </footer>

    <!--End Footer-->


</body>


  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="../js/preloader.js"></script>

<script>
  //Submenu
  const showMenu = () => {
    document.getElementById("submenu").classList.toggle("open")
  };
  document.addEventListener("click", function (E) {
    console.log(E.target)
    if (E.target.id == "chollon") return
    document.getElementById("submenu").classList.remove("open")
  });
</script>
</html>