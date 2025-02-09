<?php
include "../db/database.php";

session_start();
if (empty($_SESSION['id'])) {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/admin2.css">
    <script src="bootstrap.js"></script>
    <title>Pagos de Usuarios</title>
</head>
<body>
 
    <!-- Barra De Navegación.-->
<div class="container cont1">
    <div class="row">
        <div class="col colA"></div>
        <div class="col colB"></div>
        <div class="col colC"></div>
        <div class="col colD"><a href="añadir_pelicula.php"> Cartelera </a></div>
        <div class="col colE"><a href= "ventas.php"> Ventas </a></div>
        <div class="col colF"><a class="hpvblanco" href="usuarios.php"> Usuarios </a></div>
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
        <div class="col alinear"><h3>Revisión de Pagos</h3></div>
    </div>
</div>
</div>

<!-- Panel para recibir la notificación de compra realizada. -->
<div class="container">
    <div class="row">
        <?php
        $sql=$con->query("SELECT * FROM entradas INNER JOIN funciones ON entradas.id_funcion=funciones.id_funcion and confirmado='2'");
        $row=mysqli_num_rows($sql);

        if ($sql) {
            while ($filas=$sql->fetch_array()) {    
        ?>
        <div class="col d-flex ">
            <figure>
                <img class="capture" src="data:image/jpg;base64,<?php echo base64_encode($filas['comprobante'])?>" alt="">
                <div class="captureTexto">
                <p> Fecha y hora de la Función </p>
                <p> <?php echo date("d-m",strtotime($filas['fecha']))." / ".date("h:i A",strtotime($filas['hora']));?> </p>
                <p> Precio de la Entrada </p>
                <p> <?php echo $filas['precio'].",00bs";?> </p>
                <p> N° De Asientos </p>
                <p> <?php echo $filas['qty'];?> </p>
                <p> Monto Total </p>
                <p> <?php echo $filas['qty']*$filas['precio'].",00bs";?> </p>
                <form action="" method="post">
                <input type="hidden" name="entrada" value="<?php echo $filas['id_entrada'];?>">
                <input class="btn btn-primary" type="submit" name="btnconfirmar" value="Confirmar"> <input class="btn btn-danger" type="submit" name="btnrechazar" value="Rechazar">
                </form>
            </div>
            </figure>
        </div><?php
            }
        }
        if ($row == 0) {?>
            <div class="row text-center">
                <div class="col">
                    <div class="btn btn-light">
                        No existen pagos para revisar
                    </div>
                </div>
            </div>
        <?php  
        }
        ?>
    </div>
</div>

         <?php
        if (isset($_POST['btnconfirmar'])) {
            $entrada=$_POST['entrada'];
            $sql=$con->query("UPDATE entradas SET confirmado='1' WHERE id_entrada='$entrada'");
            if ($sql) {?>
                <script type="text/javascript">
                    window.location.href = 'usuarios.php';
                </script>
                <?php
            }
        }

        if (isset($_POST['btnrechazar'])) {
            $entrada=$_POST['entrada'];
            $sql=$con->query("UPDATE entradas SET confirmado='0' WHERE id_entrada='$entrada'");
            if ($sql) {?>
                <script type="text/javascript">
                    window.location.href = 'usuarios.php';
                </script>
                <?php
            }
        }
?>

</body>
</html>