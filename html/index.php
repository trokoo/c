<?php 
include('controladores.php');
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--Link css-->

    <link rel="stylesheet" href="../css/style.css" />


    <!--Conexion fuentes-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--Link Icon-->

    <link rel="icon" href="../img/logo.png" />
    <title>ChivoChop</title>
  </head>

  
    
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


      <?php if (($_SESSION)) :?>


      
        <a href="perfil.php"><h2 class="name" translate="no"><?php if (true) {
        
       }echo $_SESSION["user"]["user"] ?></h2></a>

      <?php else:?>
      <?php endif?>
      

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

     
        <li><a href="contacto.php">Contactanos</a></li>
        <?php if (($_SESSION)) :?>
        <li><a href="close.php"> Cerrar sesion </a></li>
        <li><a href="pedidos.php">Pedidos</a></li>
        <?php else:?>
        <li><a href="registro.php">Registrarme</a></li>
        <?php endif?>

        
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

    <!--Bienvenida-->

    <div class="home">
        <h1 translate="no">ChivoChop</h1> 
        <h3>Porque comprar es chivo</h3>
        <a href="#ancla"><img src="../img/down_grande.png" alt="" class="down"></a>
    </div>

    <!--End Bienvenida-->


    <div class="content">
  <img src="../img/muchoslogos.png" alt="">
      <div class="info">
      <h1 class="what">¿Que es <span translate="no">  ChivoChop</span>?</h1>
      <p>ChivoChop es mucho más que una simple página web; es un portal en línea que te sumerge en la rica y 
        vibrante cultura salvadoreña a través de una amplia gama de productos auténticos y únicos. Desde ropa 
        inspirada en las tradiciones y colores de El Salvador hasta juguetes que reflejan la alegría y la creatividad 
        de su gente, ChivoChop se ha convertido en el vínculo perfecto entre aquellos que desean experimentar la cultura 
        salvadoreña y los talentosos emprendedores y artesanos que la hacen posible.
      </p>
      </div>
    </div>


    

 <!--GALERIA DE IMAGENES ANIMADA-->

 <h3 class="h3">#chivochop2023</h3>
 <h1 class="separador">Camina con estilo</h1>

<section class="container_img">

    <div class="redireccion"></div>
    <div class="redireccion"></div>
    <div class="redireccion"></div>
    <div class="redireccion"></div>
    <div class="redireccion"></div>
    <div class="redireccion"></div>
    <div class="redireccion"></div>
    <div class="redireccion"></div>
    <div class="redireccion"></div>
    <div class="redireccion"></div>

    
</section>

     <!--Inicio de ventas-->

     <?php if (($_SESSION)) :?>

      
     <h1 class="products" id="ancla">Productos Destacados</h1>

      <div class="container-card">
        <?php
        $productos = "SELECT * FROM productos";
        $run = mysqli_query($connex, $productos);
        while ($fetch = mysqli_fetch_array($run)){
        ?>   
            <div class="card">
            <div class="contenido-card">
            <figure>
              <?php echo '<img src="../img/'.$fetch["img"].'">' ?>
            </figure>
              <h3 translate="no"><?php echo $fetch['nombre'] ?></h3>
              <p>$<?php echo $fetch['precio'] ?></p>
              <a class="" href="item.php?id=<?php echo $fetch['id'] ?>">Agregar al carrito</a><!-- envia la id a la pagina de item.php-->
            </div>
          </div>
        <?php
        }
        ?>
      </div>
      
      <?php else:?>
    
        <h1 class="products" id="ancla">Productos Destacados</h1>

      <div class="container-card">
        <?php
        $productos = "SELECT * FROM productos";
        $run = mysqli_query($connex, $productos);
        while ($fetch = mysqli_fetch_array($run)){
        ?>   
            <div class="card">
            <div class="contenido-card">
            <figure>
              <?php echo '<img src="../img/'.$fetch["img"].'">' ?>
            </figure>
              <h3 translate="no"><?php echo $fetch['nombre'] ?></h3>
              <p>$<?php echo $fetch['precio'] ?></p>
              <a class="" href="registro.php?id=<?php echo $fetch['id'] ?>">Agregar al carrito</a><!-- envia la id a la pagina de registro.php-->
            </div>
          </div>
        <?php
        }
        ?>
      </div>

      <?php endif?>
     <!--Fin de ventas-->

    
     

    

<!--Footer-->
<footer>

<img src="../img/logo.png" alt="" class="logo">
<div class="social-icons-container">
  <a href="#" class="social-icon"></a>
  <a href="https://www.instagram.com/chivochop/" class="social-icon"></a>
  <a href="#" class="social-icon"></a>
  <a href="#" class="social-icon"></a>
</div>

<span class="copyright">&copy;2023 ChivoChop - Todos los derechos reservados</span>


</footer>

<!--End Footer-->
  


  </body>
      

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="../js/preloader.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

  <script>

    //Submenu
    const showMenu = () => {
        document.getElementById("submenu").classList.toggle("open")
    };
    document.addEventListener("click", function(E){
      console.log(E.target)
      if(E.target.id == "chollon") return
      document.getElementById("submenu").classList.remove("open")
    });
  </script>
</html>
