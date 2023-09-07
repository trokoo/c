<?php

include('conexion.php');
session_start();
error_reporting(E_ALL ^ E_NOTICE);




//Subir producto
if (isset($_POST['subirProducto'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $nombreimagen = $_FILES['img']['name'];
    $tipo = $_POST['tipo'];

    $folder = $_SERVER['DOCUMENT_ROOT'] . '/chivochop/' . '/img/';
    move_uploaded_file($_FILES['img']['tmp_name'], $folder . $nombreimagen);


    $sql = "INSERT INTO productos (nombre, precio, descripcion, img, tipo) VALUES ('$nombre', '$precio', '$descripcion', '$nombreimagen', '$tipo')";
    $run = mysqli_query($connex, $sql);

    if ($run) {
        header("Location: admin.php", true, 303);
    }
}


//contacto
if (isset($_POST['enviarContacto'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $comentario = $_POST['comentario'];

    $sql = "INSERT INTO contacto (nombre, correo, comentario) VALUES ('$nombre', '$correo', '$comentario')";
    $run = mysqli_query($connex, $sql);

    if ($run) {

        echo "<script> languaje 'JavaScript';
            alert('Su comentario ha sido enviado con exito');</script>";
        header('Location: index.php');


        } else {
        echo "<script> languaje 'JavaScript';
            alert('Su comentario NO se ha podido enviar con exito');</script>";
    }
}



//Editar producto
if (isset($_POST['enviarEditar'])) {

    $idItem = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $img = $_FILES['img']['name'];
    $tipo = $_POST['tipo'];

    $folder = $_SERVER['DOCUMENT_ROOT'] . '/chivochop/' . '/img/';
    move_uploaded_file($_FILES['img']['tmp_name'], $folder . $img);

    if($img){
        $sql = "UPDATE productos SET nombre ='$nombre', descripcion ='$descripcion', precio ='$precio', img = '$img', tipo = '$tipo' WHERE id = '$idItem'";
    }else {
        $sql = "UPDATE productos SET nombre ='$nombre', descripcion ='$descripcion', precio ='$precio', tipo = '$tipo' WHERE id = '$idItem'";
    }

    $run = mysqli_query($connex, $sql);

    header("Location: admin.php", true, 303);
}




//Eliminar producto 
if (isset($_POST['eliminarBase'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM productos WHERE id = '$id'";
    $run = mysqli_query($connex, $sql);
    header("Location: admin.php", true, 303);
}



//Gestionar carrito (Eliminar)
if (isset($_POST['eliminarCarrito'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM carrito WHERE id = '$id'";
    $run = mysqli_query($connex, $sql);
    header("Location: carrito.php", true, 303);
}

//Producto espera

if (isset($_POST['esperaCarrito'])) {
    $id = $_POST['id'];

    $sql = "UPDATE carrito SET estado = 'espera' WHERE id = '$id'";
    $run = mysqli_query($connex, $sql);
    header("Location: carrito.php", true, 303);
}

//Eliminar notify

if (isset($_POST['eliminarNotify'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM carrito WHERE id = '$id'";
    $run = mysqli_query($connex, $sql);
    header("Location: pedidos.php", true, 303);
}

//Producto carrito

if (isset($_POST['intoCarrito'])) {
    $id = $_POST['id'];

    $sql = "UPDATE carrito SET estado = 'carrito' WHERE id = '$id'";
    $run = mysqli_query($connex, $sql);
    header("Location: carrito.php", true, 303);
}

//login
if (isset($_POST['login'])) {
    $correo = $_POST['email'];
    $contraseña = $_POST['pass'];

    $consulta = "SELECT * FROM usuarios WHERE email = '$correo' AND pass = '$contraseña'";
    $resultado = mysqli_query($connex, $consulta);

    if (mysqli_num_rows($resultado)) {
        $row = mysqli_fetch_assoc($resultado);
        $_SESSION["user"] = $row;

        if ($row["rol"] == "user") {
            header('Location: index.php');
        } else {
            header('Location: admin.php');
        }

    } else {
        echo 'Datos incorrectos';
    }
}

//registro
if (isset($_POST['registro'])) {
    $nombre = $_POST['user'];
    $correo = $_POST['email'];
    $contraseña = $_POST['pass'];

    $sql = "SELECT * from usuarios where email = '$correo' ";
    $runn = mysqli_query($connex, $sql);

    if (mysqli_num_rows($runn)) {
        echo '<script type="text/javascript">
            alert("Correo ya registrado");
            window.location.href = "/ChivoChop/html/registro.php"
            globalThis.login = true;
            </script>';
        return;
    }


    $insert_data = "INSERT INTO usuarios (user, email, pass, rol) VALUES ('$nombre', '$correo', '$contraseña', 'user')";
    $run = mysqli_query($connex, $insert_data);

    if ($run) {


        echo '<script type="text/javascript">
            window.location.href = "/ChivoChop/html/registro.php?login=true"
            </script>';
        return;


    } else {
        echo 'Datos incorrectos';
    }
}

//añadir al carrito
if (isset($_POST['agregarCarrito'])) {
    $id_producto = $_GET['id'];
    $id_usuario = $_SESSION["user"]["id"];
    $cantidad = $_POST['cantidad'];
    $talla = $_POST['talla'];

    $sql = "INSERT INTO carrito (id_producto, id_user, cantidad, talla, estado) VALUES ('$id_producto', '$id_usuario', '$cantidad', '$talla', 'carrito')";

    $run = mysqli_query($connex, $sql);

    if ($run) {
        header('Location: carrito.php');
    } else {
        echo 'Datos incorrectos';
    }
}

//Contactos

if (isset($_POST['confirmPay'])) {
    $sql = "UPDATE carrito SET estado = 'comprado' WHERE id_user = {$_SESSION["user"]["id"]} AND estado = 'carrito'";
    $run = mysqli_query($connex, $sql);

    if ($run) {
        echo'<script type="text/javascript">
    alert("¡Pago realizado exitosamente!");
    window.location.href="pedidos.php";
    </script>';
    }
}


?>