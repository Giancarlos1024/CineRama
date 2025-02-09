<?php
include "../db/database.php";

session_start();
if (empty($_SESSION['id'])) {
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style8.css">
    <script src="bootstrap.js"></script>
    <title>Comprar</title>
</head>
<body>
 
    <!-- Barra De Navegación.-->
<div class="container cont1">
    <div class="row">
        <div class="col colA"></div>
        <div class="col colB"></div>
        <div class="col colC"></div>
        <div class="col colD"><a href="home.php">Home</a></div>
        <div class="col colE"><a href="peliculas.php">Películas</a></div>
        <div class="col colF"><a href="../index.php">Usuario</a></div>
        <div class="col colG"><a class="hpvblanco" href="comprar.php">Comprar</a></div>
        <div class="col colH"><a href="noticias.php">Noticias</a></div>
        <div class="col colI"><a href="info.php">Info</a></div>
        <div class="col colJ"></div>
        <?php
        if($_SESSION['id_rol'] == 1){?>
        <div class="col colK"> <a href="../Admin/añadir_pelicula.php"><img src="../img/icon1.png" id="admin" alt="Admin"></a></div><?php
        }
        ?>
        <div class="col colL alinear equis"><a href="cerrar_sesion.php">✖️</a></div>
    </div>
</div>

 <!-- Recuadro De Información. -->
<a href="#form">
<div class="container cont2">
    <div class="row">
        <div class="col">
            <h3>Compra</h3>
        </div>
    </div>
    <div class="row">
        <div class="col"> 
            Compra tu entrada y no te pierdas la función.
        </div>
    </div>
</div>
</a>

    <!-- Imagen De Las Rubias. -->
<div class="container" id="rubias">
    <div class="row">
        <div class="col">
            <img class="rubiaC" src="../img/rub.png" alt="">
        </div>
    </div>
    
</div>

   

    <!-- Realizar Compra -->
<div class="container cajaLogin">
    <div class="row">
        <div class="col alinear"><h5>Realizar Compra</h5></div>

    </div>

    <div class="row">
        <div class="col entrar alinear" id="form">
            
            <!-- Formulario de Inicio de Compra de Entradas. -->
             <form action="detalles_de_compra.php" method="post">

                <label class="inicio" for=""> Pelicula: </label>
                <select class="form-select" name="funcion" required>
                <?php
                $query=$con->query("SELECT * FROM funciones");
                while ($filas=$query->fetch_array()) {
                    $pelicula=$filas['id_pelicula'];
                    $sql=$con->query("SELECT * FROM peliculas WHERE id_pelicula='$pelicula'");
                        while ($row=$sql->fetch_array()) {
                            if (strtotime(date('Y-m-d')) <= strtotime(date($filas['fecha']))) {
                                echo "<option value=".$filas['id_funcion'].">".$row['titulo']."</option>";
                            }       
                        }  
                    }
                    ?>  
                </select>

                <label> Asientos: </label>
                <input class="form-control" type="number" name="asientos" required>

                <div class="alinear final"><input type="submit" name="btnsiguiente" class="btn btn-danger"></div>
            </form>
        </div>
    </div>
    
</div>



</body>
</html>