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
    <link rel="stylesheet" href="../css/Style4.css">
    <link rel="stylesheet" href="../css/style2.css">
    <script src="../sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../sweetalert/sweetalert2.min.css">
    <script src="bootstrap.js"></script>
    <title>Administrador</title>
</head>
<body>
 
    <!-- Barra De Navegación.-->
<div class="container cont1">
    <div class="row">
        <div class="col colA"></div>
        <div class="col colB"></div>
        <div class="col colC"></div>
        <div class="col colD"><a class="hpvblanco" href="añadir_pelicula.php"> Cartelera </a></div>
        <div class="col colE"><a href="ventas.php"> Ventas </a></div>
        <div class="col colF"><a href="usuarios.php"> Usuarios </a></div>
        <div class="col colG"><a href="asientos.php"> Asientos </a></div>
        <div class="col colJ"></div>
        <?php
        if($_SESSION['id_rol'] == 1){?>
        <div class="col colK"> <a href="../Usuario/home.php"><img src="../img/icon1.png" id="admin" alt="Admin"></a></div><?php
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
    $sql = $con->query("SELECT * FROM peliculas");

    while ($filas = $sql->fetch_array()) {
        $descripcion_corta = substr($filas['descripcion'], 0, 50);
        $descripcion_completa = $filas['descripcion'];
    ?>
    <div class="card" style="width: 18rem;">
      <img src="data:image/jpg;base64,<?php echo base64_encode($filas['img']) ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title alinear"><?php echo $filas['titulo'] ?></h5>
        <p class="card-text">
            <span class="short"><?php echo $descripcion_corta; ?>...</span>
            <span class="full" style="display: none;"><?php echo $descripcion_completa; ?></span>
            <button class="ver-mas-btn opcionButtonVer" onclick="toggleDescripcion(this)">Ver más</button>
        </p>
        
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><?php echo $filas['genero1'] ?></li>
        <li class="list-group-item"><?php echo $filas['genero2'] ?></li>
      </ul>

      <div class="card-body">
        <form action="" method="post">
          <input type="hidden" name="pelicula" value="<?php echo $filas['id_pelicula'] ?>">
          <button type="submit" name="btneliminar" class="btn btn-danger">Eliminar Película</button>
        </form>
      </div>
    </div>  
    <?php  
    }
    if (isset($_POST['btneliminar'])) {
      $pelicula = $_POST['pelicula'];
      $sql = $con->query("DELETE FROM peliculas WHERE id_pelicula='$pelicula'");

      if ($sql) {
          echo "<script>
              Swal.fire({
                  icon: 'success',
                  title: 'ÉXITO',
                  text: 'PELÍCULA ELIMINADA',
                  showConfirmButton: false,
                  timer: 1500
              }).then(() => window.location.href = 'añadir_pelicula.php');
          </script>";
      } else {
          echo "<script>
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'ERROR AL ELIMINAR',
                  showConfirmButton: false,
                  timer: 1500
              }).then(() => window.location.href = 'añadir_pelicula.php');
          </script>";
      }
  }
  ?>          

    <div class="card cardAgPeli" id="formulario">
      <form action="" method="post" enctype="multipart/form-data">
        <div id="agImg"><label for=""> Agregar Imagen </label></div>     
        <div class="alinear"><input name="imagen" type="file" accept="image/*" required></div>

        <div id="agTitulo" class="alinear"><label for=""> Titulo </label></div>
        <div class="alinear"><input name="titulo" type="text" class="tituloAgregar" required></div>

        <div id="agDesc" class="alinear"><label for=""> Descripción </label></div>
        <div class="alinear"><textarea name="descripcion" type="text"  id="descInput" required> </textarea></div>

        <div class="alinear"><label for=""> Géneros </label></div>
        <div class="alinear"><select class="w-50" name="genero1" required>
          <option>Ciencia Ficción</option>
            <option>Comedia</option>
            <option>Acción</option>
            <option>Drama</option>
            <option>Musical</option>
            <option>Fantasía</option>
            <option>Documental</option>
            <option>Aventura</option>
            <option>Animación</option>
            <option>Historia</option>
            <option>Suspenso</option>
            <option>Deportiva</option>
            <option>Crimen</option>
            <option>Terror</option>
            <option>Religión</option>
        </select>

        <select class="w-50" name="genero2" required>
          <option>Ciencia Ficción</option>
            <option>Comedia</option>
            <option>Acción</option>
            <option>Drama</option>
            <option>Musical</option>
            <option>Fantasía</option>
            <option>Documental</option>
            <option>Aventura</option>
            <option>Animación</option>
            <option>Historia</option>
            <option>Suspenso</option>
            <option>Deportiva</option>
            <option>Crimen</option>
            <option>Terror</option>
            <option>Religión</option>
        </select></div>

        <div class="alinear"> Duración </div>
        <div class="alinear col">
          <input class="w-50" type="number" name="hora" placeholder="H" min="0" required>
          <input class="w-50" type="number" name="min" placeholder="M" max="59" min="0" required>
        </div>
        <div class="alinear"><input type="submit" name="btnañadir" class="btn btn-danger" value="Añadir"></div>
    </form>
    </div>  

    <?php
    if (isset($_POST['btnañadir'])) {
      $titulo=$_POST['titulo'];
      $descripcion=$_POST['descripcion'];
      $genero1=$_POST['genero1'];
      $genero2=$_POST['genero2'];
      $tamaño=$_FILES['imagen']['size'];
      $hora=$_POST['hora'];
      $minutos=$_POST['min'];
      $duracion=$hora.':'.$minutos.':00';

        if ($tamaño != 0 && $tamaño <= 1000000) {
      $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
      $sql=$con->query("INSERT INTO peliculas(titulo,descripcion,genero1,genero2,img,duracion) VALUES('$titulo','$descripcion','$genero1','$genero2','$imagen','$duracion')");

      if ($sql) {?>
        <script type="text/javascript">
          Swal.fire({
          icon: "success",
          title: "ÉXITO",
          text: "PELÍCULA REGISTRADA",
          showConfirmButton: false,
          timer: 1500
          });
          window.location.href = 'añadir_pelicula.php';
        </script><?php
      }else{?>
        <script type="text/javascript">
          Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "ERROR AL REGISTRAR",
          showConfirmButton: false,
          timer: 1500
          });
          window.location.href = 'añadir_pelicula.php';
        </script><?php
      }

    }else{?>
      <script type="text/javascript">
        Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "SU IMÁGEN ES MUY PESADA",
        showConfirmButton: false,
        timer: 1500
        });
      </script><?php
    }
    }
    ?>

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