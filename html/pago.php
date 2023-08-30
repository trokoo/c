<?php 

    include('controladores.php');

    if(!isset($_SESSION['user']['id'])){
      header("location: registro.php");
    }

    if(!isset($_GET['isPay'])){
      header("location: index.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
  <title>Compra</title>
  <link rel="stylesheet" href="../css/styles_card.css">
  <link rel="icon" href="../img/logo.png">



<!--Conexion fuentes-->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!--Link Icon-->

<link rel="icon" href="../img/logo.png" />
<title>ChivoChop</title>
</head>

</head>
<body>

 <!--Nav-->
 <div class="contenedor_logo">
      <img src="../img/logo.png" width="90px" />
    </div>

    <div class="contenedor">
      <ul class="contenedor_ul">


      <?php if (($_SESSION)) :?>


      
       <h2 class="name" translate="no"><?php if (true) {
        
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
        <li><a href="registro.php">Registrarse</a></li>
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

  <main class="main-container">
    


    <section class="main-container__form-section">
      <form method="post" class="form">
        <label class="form__label" for="cardholder" >Nombre del titular de la tarjeta</label>
        <input class="form__input" translate="no" type="text" name="cardholder" id="cardholder" placeholder="Nombre completo" maxlength="18">
        <div class="form__cardholder--error error"></div>

        <label class="form__label" for="cardNumber">Numero de tarjeta</label>
        <input class="form__input" type="text" name="cardNumber" id="cardNumber" maxlength="19" placeholder="Numero">
        <div class="form__inputnumber--error error"></div>

        <div class="form__date-cvc">
          
          <label class="form__label" for="cardMonth">Fecha Exp. (MM/YY)</label>
          
          <label class="form__label" for="cardCvc">CVC</label>
          
          <div class="form__date">
            <input class="form__input" type="text" maxlength="2" name="cardMonth" id="cardMonth" placeholder="MM">
            <input class="form__input" type="text" maxlength="2" name="cardYear" id="cardYear" placeholder="YY">
          </div>
          
          <input class="form__input" type="text" maxlength="3" name="cardCvc" id="cardCvc" placeholder="CVC">
          
          <div class="form__errors-container">
            <div class="form__input-mm--error error"></div>
            <div class="form__input-yy--error error"></div>
          </div>
          
          <div class="form__input-cvc--error error"></div>
        </div>
        <input class="form__submit" type="submit" name="confirmPay" value="Confirmar">
      </form>
    </section>


      <section class="main-container__background-section">
      <div class="card">
        <img class="card__logo" src="../img/logo.png" alt="logo">
        <p class="card__number">0000 0000 0000 0000</p>
        <div class="card__details">
          <p class="card__details-name" translate="no">ChivoChop</p>
          <p><span class="card__month" >00</span><p class="barrr">/</p><span class="card__year">00</span></p>
        </div>
      </div>

      <div class="card-back">
        <p class="card-back__cvc">000</p>
      </div>
    </section>





      <!-- Cuando ya se enviaron los datos -->

      <section class="thanks-section">
        <img class="thanks-section__img" src="./images/check-mark.png" alt="complete icon">
        <h1 class="thanks-section__title">¡Gracias!</h1>
        <p class="thanks-section__text">Tu compra se ha realizado correctamente</p>
        <button class="thanks-section__button" src="carrito.php">Regresar al carrito</button>
      </section>

    </section>
  </main>


  <script>
    window.history.replaceState(null,null,window.location.href);
  </script>

  <!--Footer-->
  <footer>

<img src="../img/logo.png" alt="" class="logo">
<div class="social-icons-container">
  <a href="" class="social-icon"></a>
  <a href="https://www.instagram.com/chivochop/" class="social-icon"></a>
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

<script src="../js/main.js"></script>
<script src="../js/preloader.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

</html>


  


