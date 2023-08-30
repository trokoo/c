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

    <div class="contenedor" >
        <li><a href="close.php"> Cerrar sesion </a></li>
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
      </ul>
    </div>
    <!--End Nav-->

      <!--compra-->

      <div class="cont">
        <div class="item"><img src="../img/<?php echo  $item["img"] ?>" alt=""></div>

        <form action="" method="post" class="datos">
        <h1 ><?php echo  $item["nombre"] ?></h1>
        <p><?php echo  $item["descripcion"] ?></p>
        <h3>$<?php echo  $item["precio"] ?></h3>
        <p>Tipo     <?php echo  $item["tipo"] ?></p>

         
          </form>
         
      </div>

      <a href="admin.php"><img src="../img/atras.png" alt="" class="retroceder"></a>

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