<?php 
include('controladores.php');
if (isset($_SESSION["user"])) {
  if ($_SESSION["user"]["rol"] == "user") {
    header('Location: index.php');
  }else{
    header('Location: admin.php');
  }

  
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <!--Link css-->
    <link rel="stylesheet" href="../css/styleLogin.css">
  

    <!--Link Icons-->
    <link rel="icon" href="../img/logo.png" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--Conexion fuentes-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    
</head>

<body>

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


      
       <h2 class="name"><?php if (true) {
        
       }echo $_SESSION["user"]["user"] ?></h2>

      <?php else:?>
      <?php endif?>
      

        <li><a href="index.php" translate="no">Home</a></li>
        <li class="etiqueta" id="chollon" onclick="showMenu()" >
        Tienda <img src="../img/flecha-hacia-abajo.png" alt="" class="efecto" id="chollon">
          <ul id="submenu" class="dropDown">
            <a href="filtros.php?tipo=camisa"><li class="li_submenu">Camisas</li></a>
            <a href="filtros.php?tipo=hoodie"><li class="li_submenu">Hoodies</li></a>
            <a href="filtros.php?tipo=gorra"><li class="li_submenu">Gorras</li></a>
            <a href="filtros.php?tipo=otro"><li class="li_submenu">Otros</li></a>
            
          </ul>
        </li>

     
        <li><a href="contacto.php">Contactanos</a></li>
        <?php if (($_SESSION)) :?>
        <li><a href="close.php"> Cerrar sesion </a></li>
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
    
   <div class="hidden">

       <div class="container-form register">
           <div class="information">

          

               <div class="info-childs">

               
               
                <h2>¡Bienvenido a ChivoChop!</h2>
                   <p>Si ya eres parte de ChivoChop por favor Inicia Sesión con tus datos</p>
                   <input type="button" value="Iniciar Sesión" id="sign-in">
                   <a href="index.php" class="retroceder"><img src="../img/atras.png" alt=""></a>
               </div>
           </div>
           <div class="form-information">
               <div class="form-information-childs">
                   <h2>Crea una cuenta</h2>
                   <br>
                   <div class="icons">
                       <i class="bx bxl-facebook"></i>
                       <i class="bx bxl-instagram"></i>
                       <i class="bx bxl-whatsapp"></i>
                   </div>
                   <p>Siguenos en nuestras redes sociales</p>
                   
                   <form class="form" method="post">
                       <label>
                           <i class='bx bxs-user-circle'></i>
                           <input type="text" placeholder="Nombre" name="user" required>
                       </label>
                       <label>
                           <i class='bx bxs-envelope'></i>
                           <input type="email" pattern=".+@.+com" placeholder="Correo Electronico" name="email" required>
                       </label>
                       <label>
                           <i class='bx bxs-lock'></i>
                           <input type="passwrod" placeholder="Contraseña" name="pass" required>
                       </label>
                       <input type="submit" value="Registrarme" name="registro">
                     
                       </form>

                     

               </div>
           </div>
       </div>
   
   
   
   
   
       <div class="container-form login hide">
           <div class="information">

               <div class="info-childs">


               
                <h2>¡Bienvenido de vuelta Torogoz!</h2>
                   <p>Si aun no formas parte de ChivoChop, puedes registrarte y convertirte en un Torogoz</p>
                   <input type="button" value="Registrarse" id="sign-up">
                   <a  class="retroceder" href="index.php"><img src="../img/atras.png" alt=""></a>
               </div>
           </div>
           <div class="form-information">
               <div class="form-information-childs">
                   <h2>Inicia sesión</h2>
                   <br>
                   <div class="icons">
                       <i class="bx bxl-facebook"></i>
                       <i class="bx bxl-instagram"></i>
                       <i class="bx bxl-whatsapp"></i>
                   </div>
                   <p>Siguenos en nuestras redes sociales</p>
                   <form class="form" method="post">
                       <label>
                           <i class='bx bxs-envelope'></i>
                           <input type="email" placeholder="Correo Electronico" name="email" required>
                       </label>
                       <label>
                           <i class='bx bxs-lock'></i>
                           <input type="password" placeholder="Contraseña" name="pass" required>
                       </label>
                       <input type="submit" value="Iniciar sesión" name="login">
                       
                       </form>
               </div>
      
           </div> 
        </div>
    </div>
    
 


  

</body>
</html>


<script src="../js/script.js"></script>

<script src="../js/preloader.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

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
