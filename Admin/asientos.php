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
    <link rel="stylesheet" href="../css/admin4.css">
    <link rel="stylesheet" href="../css/admin3.css">
    <script src="bootstrap.js"></script>
    <title>Asientos</title>
</head>
<body>
 
    <!-- Barra De Navegación.-->
<div class="container cont1">
    <div class="row">
        <div class="col colA"></div>
        <div class="col colB"></div>
        <div class="col colC"></div>
        <div class="col colD"><a href="añadir_pelicula.php"> Cartelera </a></div>
        <div class="col colE"><a href="ventas.php"> Ventas </a></div>
        <div class="col colF"><a href="usuarios.php"> Usuarios </a></div>
        <div class="col colG"><a class="hpvblanco" href="asientos.php"> Asientos </a></div>
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
        <div class="col alinear"><h3>Panel De Asientos</h3></div>
        
    </div>
    <div class="row">
        <div class="my-2">
        <form action="" method="post">
        <?php
        $fecha = date("Y-m-d"); // Convierte el timestamp a formato de fecha
        $query = $con->query("SELECT * FROM funciones WHERE fecha >= '$fecha'");
        
        if ($rn == 0) {
            header('location: asientos2.php');
        }
        if ($query) {
            while ($row=$query->fetch_array()) {?>
                <button class="btn btn-dark" name="btnfuncion" value="<?php echo $row['id_funcion']?>"><?php echo "Función: ".date('d-m',strtotime($row['fecha']));?></button>
           <?php }
        }
        ?>
        </form>
        </div>
    </div>
</div>
</div>
    <?php
     if (isset($_POST['btnfuncion'])) {
         $funcion=$_POST['btnfuncion'];
         $sql=$con->query("SELECT * FROM entradas WHERE confirmado='1' and id_funcion='$funcion'");

    if ($sql) { 
    $asientos=0;   
    while ($filas=$sql->fetch_array()) {
       $asientos+=$filas['qty'];   
    }

    $asientosAsig=$asientos;
    $asientosDispo=162-$asientos;?>
<div class="alinear">
<div class="container cont2">
    <div class="row">
    </div>
    <div class="row">
        <div class="col"><h4 class="h4"> Asientos Asignados <?php echo ": ".$asientosAsig;?> </h4></div>
        <div class="col text-end"><h4 class="h4"> Asientos Disponibles <?php echo ": ".$asientosDispo;?> </h4></div>
    </div>
</div>
</div>

<div class="container">
<div class="row"><?php
    for ($i=1; $i <= $asientosAsig && $i <=14; $i++) {?>
            <div style="background-color: #951d1d; color: white;" class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <= $asientosAsig && $i <=27; $i++) {?>
            <div style="background-color: #951d1d; color: white;" class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <= $asientosAsig && $i <=41; $i++) {?>
            <div style="background-color: #951d1d; color: white;" class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <= $asientosAsig && $i <=54; $i++) {?>
            <div style="background-color: #951d1d; color: white;" class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <= $asientosAsig && $i <=68; $i++) {?>
            <div style="background-color: #951d1d; color: white;" class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <= $asientosAsig && $i <=81; $i++) {?>
            <div style="background-color: #951d1d; color: white;" class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <= $asientosAsig && $i <=95; $i++) {?>
            <div style="background-color: #951d1d; color: white;" class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <= $asientosAsig && $i <=108; $i++) {?>
            <div style="background-color: #951d1d; color: white;" class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <= $asientosAsig && $i <=122; $i++) {?>
            <div style="background-color: #951d1d; color: white;" class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <= $asientosAsig && $i <=135; $i++) {?>
            <div style="background-color: #951d1d; color: white;" class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <= $asientosAsig && $i <=149; $i++) {?>
            <div style="background-color: #951d1d; color: white;" class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <= $asientosAsig && $i <=162; $i++) {?>
            <div style="background-color: #951d1d; color: white;" class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>


<div class="row"><?php
    for ($i=$asientosAsig+1; $i <=14; $i++) {?>
            <div class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <=27; $i++) {?>
            <div class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <=41; $i++) {?>
            <div class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <=54; $i++) {?>
            <div class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <=68; $i++) {?>
            <div class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <=81; $i++) {?>
            <div class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <=95; $i++) {?>
            <div class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <=108; $i++) {?>
            <div class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <=122; $i++) {?>
            <div class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <=135; $i++) {?>
            <div class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <=149; $i++) {?>
            <div class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
?></div>
<div class="row"><?php
    for ($i; $i <=162; $i++) {?>
            <div class="col Asientos" id="1"><?php echo $i;?></div><?php
    }
}
}
?></div>
</div>
</body>               

