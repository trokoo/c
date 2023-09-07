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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/styleProfile2.css">
</head>

<body> 
    

    <section class="seccion-perfil-usuario">
    <div class="perfil-usuario-header">
        <div class="perfil-usuario-portada">
            <div class="perfil-usuario-avatar">
                <img src="../img/logooo.png" alt="img-avatar">
            </div>
        </div>
    </div>
    <div class="perfil-usuario-body">
        <div class="perfil-usuario-bio">

            <h3 class="titulo">Usuario ChivoChop</h3>

            <div class="yes">


            <p class="texto"><strong>Nombre de usuario:</strong> 

            <span class="name" translate="no"><?php if (true) {
            }echo $_SESSION["user"]["user"] ?></span></p>&#160;

            <p class="texto2"><strong>Correo electronico:</strong>
            
            <span class="name" translate="no"><?php if (true) {
            }echo $_SESSION["user"]["email"] ?></span></p>

           
            </div>


        <div class="chaosito">
            <a href="index.php" class="out">Regresar</a>
            <a href="close.php" class="out"> Cerrar sesion </a> 
        </div>
            
        </div>

    </div>
</section>


 

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

