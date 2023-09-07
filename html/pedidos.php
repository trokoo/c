<?php 
  include('controladores.php');

  $precioTotal = 0;


  if(isset($_SESSION['isPay'])){
    unset($_SESSION['isPay']);
  }

  
  if(!isset($_SESSION['user']['id'])){
    header("location: index.php");
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
    <link rel="stylesheet" href="../css/hover.css" />

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

       
        <li><a href="contacto.php">Contactanos</a></li>
      
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

  <?php 
        $sql = "SELECT * FROM carrito INNER JOIN productos ON carrito.id_producto = productos.id WHERE carrito.id_user = {$_SESSION['user']['id']} AND carrito.estado = 'comprado' ";
        $run = mysqli_query($connex, $sql);
        $cantidad = 'cantidad';
        $precio = 'precio';
        
        if (mysqli_num_rows($run)) {
          ?>
            <h1 class="car_tittle">Pedidos</h1>
          <?php
        }else{
          ?>
          <h1 class="car_tittle"> No se ha registrado ningun pedido</h1>
          <?php
        }
     
        
        while ($data = mysqli_fetch_array($run)) {
          $precioTotal += $data['precio'] * $data['cantidad'];
       
          ?>
            <div class="car"> 
            <div class="car__info">
            <h1 translate="no"><?php echo  $data["nombre"] ?></h1><img src="../img/<?php echo  $data["img"] ?>" height="100px" alt="">
              
              <div class="car__info__text">
                
                <?php if (($data["tipo"] != "otro")):?>
                
                <p>Talla: <span translate="no"><?php echo  $data["talla"] ?></span></p>

                <?php endif?>

                <p>Cantidad: <?php echo  $data["cantidad"] ?></p>
                <p>Precio: $ <?php echo  $data["precio"] * $data["cantidad"] ?></p>

                <form method="post">
                <input type="submit" value="Eliminar Notificacion" name="eliminarNotify" class="botones">
                <input type="text" name="id" value="<?php echo $data[0]?>"  hidden >
                </form>

                </form>

              </div>
            </div>
            <br>
          <?php
        }
      ?>
    
    
  </body>

  <script src="confirmacion.js"></script> 

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

  