<?php include('controladores.php') ;

$idItem = $_GET["id"];

$consulta = "SELECT * FROM productos WHERE id = $idItem";

$resultado = mysqli_query($connex,$consulta);

if (mysqli_num_rows($resultado)){
    $item = mysqli_fetch_assoc($resultado);
  
    mysqli_close($connex);

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Conexion fuentes-->

        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!--Link Icon-->

    <link rel="icon" href="../img/logo.png" />

    <title>Editar</title>
</head>
<style><?php include '../css/admin.css'; ?></style>

<body class="hidden">

     <!--animacion-->


     <div class="centrado" id="onload">
        <div class="lds-dual-ring"></div>
     </div>
     
   <!--End animacion-->

   
<div class="contenedor_logo">
      <img src="../img/logo.png" width="90px" />
    </div>
    <h1 class="tittle">Editar</h1>

    <form class="editar_form" method="post" enctype="multipart/form-data">

        <label ><strong>Nombre actual:</strong></label>
        <input type="text" transale="no" name="nombre" value="<?php echo $item['nombre'] ?>">

        <label><strong>Precio actual:</strong> <?php echo $item['precio'] ?></label>
        <input type="number" step="0.01" name="precio" value="<?php echo $item['precio'] ?>">

        <label><strong>Descripcion actual:</strong> <?php echo $item['descripcion'] ?></label>
        <input type="text" name="descripcion" value="<?php echo $item['descripcion'] ?>">


        <img class="editar_img" src="../img/<?php echo  $item["img"] ?>" alt="">
        <input type="file" id="imgsEdit" name="img" value="<?php echo $item['img'] ?>">

        <script>

        const imgsEdit = document.getElementById('imgsEdit')

        </script>

        <select name="tipo" required>

        <option value="gorra">Gorra</option>
        <option value="hoodie">Hoodie</option>
        <option value="camisa">Camisa</option>
        <option value="otro">Otro</option>

        </select>


        <input type="hidden" name="id" translate="no"
        value="<?php echo $idItem; ?>">

        <div class="envio">
        <input type="submit" name="enviarEditar" value="Actualizar">
        </div>
        
        <a href="admin.php"><img src="../img/atras.png" alt="" class="retroceder"></a>

    </form>
</body>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="../js/preloader.js"></script>

</html>