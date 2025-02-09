<?php
include "../db/database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style5.css">
    <!-- <script src="bootstrap.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Noticias</title>
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
        <div class="col colG"><a href="comprar.php">Comprar</a></div>
        <div class="col colH"><a class="hpvblanco" href="noticias.php">Noticias</a></div>
        <div class="col colI"><a href="info.php">Info</a></div>
        <div class="col colJ"></div>
        <div class="col colK"></div>
        <div class="col colL alinear equis"></div>
    </div>
</div>

 <!-- Recuadro De Información. -->
  <div class="alinear">
<div class="container cont2 ">
    <div class="row">
        <div class="col alinear"><h3> Noticias </h3></div>
    </div>
</div>
</div>

<!-- Noticias. -->
<div class="container">
    <div class="row">
    <?php
        $sql=$con->query("SELECT * FROM funciones INNER JOIN peliculas ON funciones.id_pelicula=peliculas.id_pelicula");

        while ($row=$sql->fetch_array()) {
            if (strtotime(date($row['fecha'])) >= strtotime(date('Y-m-d'))) {?>
    
        <div class="col" id="noticia1">
            <div class="noticia">
                    <h3 id="tituloNoticia" class="text-center"><?php echo $row['titulo']?></h3>
                    <img id="imgNoticia" src="data:image/jpg;base64,<?php echo base64_encode($row['img'])?>" alt="">
                    <p id="textoNoticia"><?php echo $row['descripcion'].". Una duración de ".$row['duracion']?></p>
                    <p id="textoNoticia"><?php echo "FECHA: ".date("d/m/Y",strtotime($row['fecha']))."<br>HORA: ".date("h:i A",strtotime($row['hora']))."<br>PRECIO/ENTRADA: ".$row['precio'].",00bs"?></p>
                    <p class="text-center">¡¡¡No te lo pierdas!!!</p>
            </div>    
        </div>
    <?php
    }
}?> 
        </div>
    </div>

    </body>
</html>