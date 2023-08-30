<?php include('controladores.php') ;

if(!isset($_SESSION['user']['id'])){
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Conexion fuentes-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!--Link Icon-->

    <link rel="icon" href="../img/logo.png" />

    <title>Chivo Admin</title>
    
</head>
<style><?php include '../css/style.css'; ?></style>

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

    <div class="saludo">
    <h3 class="holi">Bienvenido <?php echo $_SESSION["user"]["user"]?></h3>
    <h3 ><a href="close.php" class="chao"> Cerrar sesion </a></h3>
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
    </div>


<div class="form_admin">

<div class="form_into">
    <h1 class="products">Subir</h1>


    <form method="post" enctype="multipart/form-data" >



        <input type="text" placeholder="Nombre del articulo" name="nombre"  required>
        <input type="number" placeholder="Precio" step="0.01" name="precio" required>
        <input type="text" placeholder="Descripcion" name="descripcion" required>
        <div class="file-input-container">
        <input type="file" name="img" id="file-input"  required>
        <img src="../img/noimg.png" alt="" id="img" class="img_selected">

        <h1 class="tipo"> Tipo </h1>
          
        <select name="tipo" required>

                <option value="gorra">Gorra</option>
                <option value="hoodie">Hoodie</option>
                <option value="camisa">Camisa</option>
                <option value="otro">Otro</option>

            </select>
          
            <div class="envio">
        <input type="submit" value="Subir" name="subirProducto" class="botones_admin">
    </div>
  </div>
</div>
        
    </form>
    </div>

    <div class="tittle_admin">
    <h1 class="products">Todos los productos</h1>
    </div>

    <?php 
        $sql = "SELECT * FROM carrito INNER JOIN productos ON carrito.id_producto = productos.id WHERE carrito.id_user = {$_SESSION['user']['id']} ";
        $run = mysqli_query($connex, $sql);
     
        
    
     
        
        while ($data = mysqli_fetch_array($run)) {
       
        }
          ?>
   

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
  
              
              <form method="post" class = "crud"> 

                
                <input type="button" onclick=" location.href='ver.php?id=<?php echo $fetch['id'] ?>' " class="ver" value="Ver"><!--Ve el registro-->

                <input type="button" onclick=" location.href='editar.php?id=<?php echo $fetch['id'] ?>' " class="editar" name="editarBase" value="Editar"></input><!--Edita el registro-->
                
                <input type="submit" value="Eliminar" name="eliminarBase" class="eliminar">
                <input type="hidden" name="id" value="<?php echo $fetch['id']?>"><!--Elimina el registro-->

            </form>
             
            </div>
          </div>
        <?php
        }
        ?>
      </div>


    <!--Footer-->
    <footer>

<img src="../img/logo.png" alt="" class="logo">

</div>

<span class="copyright">&copy;2023 ChivoChop - Todos los derechos reservados</span>


</footer>

<!--End Footer-->
</body>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="../js/preloader.js"></script>
  <script src="../js/cargar_imagen.js"></script>

</html>