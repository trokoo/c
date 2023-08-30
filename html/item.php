<?php 


include('controladores.php');
session_start();

$idItem = $_GET["id"];
$consulta = "SELECT * FROM productos WHERE id = $idItem";

$resultado = mysqli_query($connex,$consulta);


if (mysqli_num_rows($resultado)){
    $item = mysqli_fetch_assoc($resultado);
} else {
    header("location: index.php");
}


if(!isset($_SESSION['user']['id'])){
  header("location: registro.php");
}




?>


<!DOCTYPE html>
<html lang="en">
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
            <a href="filtros.php?tipo=hoodie"><li class="li_submenu">Hoodies</li></a>
            <a href="filtros.php?tipo=gorra"><li class="li_submenu">Gorras</li></a>
            <a href="filtros.php?tipo=otro"><li class="li_submenu">Otros</li></a>
           
          </ul>
        </li>

        
        <li><a href="">Contactanos</a></li>
      
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

      <!--compra-->

      <div class="cont">
        <div class="item"><img src="../img/<?php echo  $item["img"] ?>" alt=""></div>


        <form action="" method="post" class="datos">
            <h1 translate="no"><?php echo  $item["nombre"] ?></h1>

            <p><?php echo  $item["descripcion"] ?></p>


           
            <?php if (($item["tipo"] != "otro")):?>
          
            <h1>Talla <select name="talla" id="">

                <option value="XS" translate="no">XS</option>
                <option value="S" translate="no">S</option>
                <option value="M" translate="no">M</option>
                <option value="L" translate="no">L</option>
                <option value="XL" translate="no">XL</option>

            </select>



            <?php endif?>

            <h1>Cantidad <select name="cantidad" id="" type="number">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                
            </select>


            <h3>$<?php echo  $item["precio"] ?></h3>

         
            <input type="submit" value="Añadir al carrito" name="agregarCarrito" class="button"></input>
          </form>
         
      </div>

      

   
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