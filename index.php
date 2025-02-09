<?php
include "db/database.php";

session_start();
if (isset($_SESSION['id'])) {
    header('location: Usuario/confirmacion.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/Style1.css">
    <script src="sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert/sweetalert2.min.css">
    <script src="bootstrap.js"></script>
    <title>Cine Comunitario</title>
</head>
<body>
 
<!-- Barra De Navegación.-->
<div class="container cont1">
    <div class="row">
        <div class="col colA"></div>
        <div class="col colB"></div>
        <div class="col colC"></div>
        <div class="col colD"><a href="Usuario/home.php">Home</a></div>
        <div class="col colE"><a href="Usuario/peliculas.php">Películas</a></div>
        <div class="col colF"><a class="hpvblanco" href="index.php">Usuario</a></div>
        <div class="col colG"><a href="Usuario/comprar.php">Comprar</a></div>
        <div class="col colH"><a href="Usuario/noticias.php">Noticias</a></div>
        <div class="col colI"><a href="Usuario/info.php">Info</a></div>
        <div class="col colJ"></div>
        <div class="col colK"></div>
        <div class="col colL"></div>
    </div>
</div>

<!-- Enunciado De Inicio de Sesión. -->
<!-- Al darle Click Conlleva al Formulario. -->
<a href="#inicioDeSesion">
<div class="container cont2">
    <div class="row">
        <div class="col"><h3>Inicio de Sesión</h3></div>
    </div>
    <div class="row">
        <div class="col"> Inicia Sesión Para Poder Realizar Una Compra.</div>
    </div>
</div>
</a>

<!-- Imagen Principal. -->
<div class="container">
    <img class="spider" src="img/1.jpg" alt="">
</div>

<!-- Login -->
<div class="container cajaLogin">
    <div class="row">
        <!-- Encabezados deñ Login Y Registro. -->
        <div class="col alinear" id="inicioDeSesion"><h5>Inicio de Sesión</h5></div>
        <div class="col alinear"><h5>Registrate</h5></div>
    </div>

    <div class="row">
        <div class="col entrar alinear">
            
            <!-- Formulario de Inicio de Sesión o Login. -->
             <form action="" method="post">
                
                <label class="inicio" for="username"> Usuario </label>
                <input class="final" type="text" id="username" required placeholder="Usuario" name="usuario">

                <label for="password"> Contraseña </label>
                <input class="final" type="password" id="password" required placeholder="Contraseña" name="contraseña">
                
                <div class="alinear final"><input type="submit" name="btningresar" class="btn btn-danger" value="Entrar"></div>
             </form>
        </div>

        <!-- Función de ingreso -->
            <?php 
        if (isset($_POST['btningresar'])) {
                $usuario=$_POST['usuario'];
                $contraseña=$_POST['contraseña'];
                $contraseña=hash('sha512', $contraseña);

                $query=mysqli_query($con, "SELECT * FROM usuarios WHERE usuario='$usuario' and contraseña='$contraseña'");
                $rn=mysqli_fetch_array($query);

            if (mysqli_num_rows($query)) {
                    session_start();
                    header('location: Usuario/home.php');
                    $_SESSION['nombre']=$rn['nombre'];
                    $_SESSION['id']=$rn['id_usuario'];
                    $_SESSION['id_rol']=$rn['id_rol'];
                    $_SESSION['apellido']=$rn['apellido'];
                }else{?>
                    <script type="text/javascript">
                        Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "ACCESO DENEGADO",
                        showConfirmButton: false,
                        timer: 1500
                        });
                    </script><?php
                }
}?>

        <div class="col regist alinear">
            <!-- Formulario de Registrarse. -->
            <form action="" method="post">

                <label class="inicio" for=""> Nombre </label>
                <input class="final" type="text" id="name" required placeholder="Escribe tu Nombre" name="nombre">

                <label for=""> Apellido </label>
                <input class="final" type="text" id="lastname" required placeholder="Escribe tu Apellido" name="apellido">

                <label for=""> Usuario </label>
                <input class="final" type="text" id="username" required placeholder="Crear Nombre de Usuario" name="usuario">

                <label for=""> Contraseña </label>
                <input class="final" type="password" id="password" required placeholder="Crear Contraseña" name="contraseña">
                
                <div class="alinear final"><input type="submit" name="btnregistrar" class="btn btn-danger" value="Registrar"></div>
            </form>
        </div>
    </div>
    <!-- Función de registro -->
            <?php  
        if (isset($_POST['btnregistrar'])) {
                $nombre=$_POST['nombre'];
                $apellido=$_POST['apellido'];
                $usuario=$_POST['usuario'];
                $contraseña=$_POST['contraseña'];
                $contraseña=hash('sha512', $contraseña);
                 
                $sql=$con->query("SELECT * FROM usuarios WHERE usuario='$usuario'");
                $filas=mysqli_num_rows($sql);

                if ($filas['usuario'] == $usuario) {
                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                        icon: "error",
                        title: "Oops",
                        text: "ESTE USUARIO YA EXISTE",
                        showConfirmButton: false,
                        timer: 1500
                        });
                    </script>
                    <?php   
                }else{

                $query=$con->query("INSERT INTO usuarios(nombre,apellido,usuario,contraseña,id_rol) VALUES('$nombre','$apellido','$usuario','$contraseña','2')");
                if ($query) {
                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                        icon: "success",
                        title: "ÉXITO",
                        text: "USUARIO REGISTRADO",
                        showConfirmButton: false,
                        timer: 1500
                        });
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "ERROR AL REGISTRAR",
                        showConfirmButton: false,
                        timer: 1500
                        });
                    </script>
                    <?php
                }
            }
        }
            ?>
</div>

</body>
</html>