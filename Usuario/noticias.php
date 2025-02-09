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
    <div class="ContenedorNoticias">
    <?php
        $sql=$con->query("SELECT * FROM funciones INNER JOIN peliculas ON funciones.id_pelicula=peliculas.id_pelicula");

        while ($row=$sql->fetch_array()) {
            if (strtotime(date($row['fecha'])) >= strtotime(date('Y-m-d'))) { 
                $descripcion_corta = substr($row['descripcion'], 0, 50);
                $descripcion_completa = $row['descripcion'];
                ?>
    
        <div class="SubNoticias">
            <div class="noticia">
                <h3 class="tituloNoticias"><?php echo $row['titulo']?></h3>
                <img id="imgNoticia" src="data:image/jpg;base64,<?php echo base64_encode($row['img'])?>" alt="">
                <p class="descripcionNoticias">
                    <span class="TextDescripcion">Descripción:</span> 
                    <span class="short"><?php echo $descripcion_corta; ?>...</span>
                    <span class="full" style="display: none;"><?php echo $descripcion_completa; ?></span>
                    
                    <button class="ver-mas-btn opcionButtonVer" onclick="toggleDescripcion(this)">Ver más</button><br>
                    <b class="TextDescripcion">Duración:</b> <?php echo $row['duracion'] ?>
                </p>
                <p class="fechasNoticias">
                    <?php echo "FECHA: ".date("d/m/Y",strtotime($row['fecha']))."<br>HORA: ".date("h:i A",strtotime($row['hora']))."<br>PRECIO/ENTRADA: ".$row['precio'].",00bs"?>
                </p>
                <p class="text-center">¡¡¡No te lo pierdas!!!</p>
            </div>    
        </div>
    <?php
    }
}?> 
    </div>
</div>

<script>
function toggleDescripcion(btn) {
    var container = btn.parentElement;
    var shortText = container.querySelector(".short");
    var fullText = container.querySelector(".full");

    if (fullText.style.display === "none") {
        shortText.style.display = "none";
        fullText.style.display = "inline";
        btn.textContent = "Ver menos";
    } else {
        shortText.style.display = "inline";
        fullText.style.display = "none";
        btn.textContent = "Ver más";
    }
}
</script>

    </body>
</html>