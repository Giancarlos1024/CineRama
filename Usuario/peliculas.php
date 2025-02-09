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
    <link rel="stylesheet" href="../css/style3.css">
    <script src="bootstrap.js"></script>
    <title>Películas</title>
</head>
<body>
    
    <!-- Barra De Navegación.-->
<div class="container cont1">
    <div class="row">
        <div class="col colA"></div>
        <div class="col colB"></div>
        <div class="col colC"></div>
        <div class="col colD"><a href="home.php">Home</a></div>
        <div class="col colE"><a class="hpvblanco" href="peliculas.php">Películas</a></div>
        <div class="col colF"><a href="../index.php">Usuario</a></div>
        <div class="col colG"><a href="comprar.php">Comprar</a></div>
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
  <div class="alinear">
<div class="container cont2 ">
    <div class="row">
        <div class="col alinear"><h3>Películas</h3></div>
    </div>
</div>
</div>

<!-- Tarjetas de películas. -->

  <div class="container">
    <div class="row">
    <?php  
    $sql=$con->query("SELECT * FROM peliculas");

    while($filas=$sql->fetch_array()){
        
    
    ?>
    <div class="card" style="width: 18rem;">
      <img src="data:image/jpg;base64,<?php echo base64_encode($filas['img'])?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title alinear"><?php echo $filas['titulo']?></h5>
        <p class="card-text"><?php echo $filas['descripcion']?></p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><?php echo $filas['genero1']?></li>
        <li class="list-group-item"><?php echo $filas['genero2']?></li>
      </ul>
      <div class="card-body">
        <a href="./comprar.php" class="card-link alinear">Comprar Entrada</a>
      </div>
    </div>

<?php  
}
?>
</div>
  </div>
   
</body>
</html>