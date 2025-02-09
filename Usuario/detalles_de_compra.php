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
    <script src="../sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../sweetalert/sweetalert2.min.css">
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
        <div class="col colH"><a href="Noticias.html">Noticias</a></div>
        <div class="col colI"><a href="Info.html">Info</a></div>
        <div class="col colJ"></div>
        <?php
        if($_SESSION['id_rol'] == 1){?>
        <div class="col colK"> <a href="../Admin/añadir_pelicula.php"><img src="../img/icon1.png" id="admin" alt="Admin"></a></div><?php
        }
        ?>
        <div class="col colL alinear equis"><a href="../cerrar_sesion.php">✖️</a></div>
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
             <form action="" method="post" enctype="multipart/form-data">
                <?php
                if (isset($_POST['btnsiguiente'])) {
                    $funcion=$_POST['funcion'];
                    $asientos=$_POST['asientos'];
                    $sql=mysqli_query($con, "SELECT * FROM funciones WHERE id_funcion='$funcion'");
                    $row=mysqli_fetch_array($sql);
                    $pelicula=$row['id_pelicula'];
                    $query=$con->query("SELECT * FROM peliculas WHERE id_pelicula='$pelicula'");
                    $filas=mysqli_fetch_array($query);
                        if ($query) {            
?>  

                <label class="inicio" for=""> Pelicula </label>
                <input type="hidden" name="pelicula" value="<?php echo $filas['id_pelicula']?>">
                <div class="card col-9"><?php echo $filas['titulo']?></div>
                

                <label for=""> Fecha </label>
                <div class="card col-6"><?php echo $row['fecha']?></div>

                <label for=""> Hora </label>
                <input type="hidden" name="funcion" value="<?php echo $funcion?>">
                <div class="card col-6"><?php echo date("h:i A",strtotime($row['hora']))?></div>

                <label for=""> Usuario </label>
                <div class="card col-6"><?php echo $_SESSION['nombre']." ".$_SESSION['apellido']?></div>
                
                <label for=""> Total: </label>
                <input type="hidden" name="total" value="<?php echo $asientos?>">
                <div class="card col-6"><?php echo $asientos*$row['precio'].",00bs"?></div>

                <label for=""> Comprobante </label>
                <input class="final" type="file" id="password" required name="image">

                <div class="alinear final"><input type="submit" name="btnprocesar" class="btn btn-danger"></div>
            </form>
            <?php 
    } 
}
        if (isset($_POST['btnprocesar'])) {
            $pelicula=$_POST['pelicula'];
            $usuario=$_SESSION['id'];
            $funcion=$_POST['funcion'];
            $asientos=$_POST['total'];
            $tamaño=$_FILES['image']['size'];

            if ($tamaño != 0 && $tamaño <= 1000000) {   
            $comprobante=addslashes(file_get_contents($_FILES['image']['tmp_name']));    
        
        $sql=$con->query("INSERT INTO entradas(id_pelicula,id_usuario,id_funcion,comprobante,qty,confirmado) VALUES('$pelicula','$usuario','$funcion','$comprobante','$asientos','2')");

        if ($sql) {?>
            <script type="text/javascript">
            Swal.fire({
            icon: "success",
            title: "ENTRADA REGISTRADA",
            text: "Su pago será revisado, podrá verificar su estado en el apartado de usuario",
            showConfirmButton: true
            });
            setTimeout("location.href='comprar.php'",5000);
            </script>
        <?php
        }else{?>
            <script type="text/javascript">
            Swal.fire({
            icon: "error",
            title: "Oops",
            text: "ERROR AL REGISTRAR",
            showConfirmButton: false,
            timer: 1500
            });
            setTimeout("location.href='comprar.php'",1500);
            </script>
        <?php
        }

        }else{?>
            <script type="text/javascript">
            Swal.fire({
            icon: "error",
            title: "Oops",
            text: "SU IMÁGEN ES MUY PESADA",
            showConfirmButton: false,
            timer: 1500
            });
            setTimeout("location.href='comprar.php'",1500);
            </script>
        <?php
            
        }
    }
?>    
        </div>
    </div>
    
</div>




</body>
</html>