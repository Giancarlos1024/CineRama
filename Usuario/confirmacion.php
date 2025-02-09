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
    <link rel="stylesheet" href="../css/style7.css">
    <!-- <script src="bootstrap.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Usuario</title>
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
        <div class="col colF"><a class="hpvblanco" href="../index.php">Usuario</a></div>
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
        <div class="col alinear"><h3> Usuario </h3></div>
    </div>
</div>
</div>

<!-- Caja De Notificación. -->


<div class="container">
    <div class="row">
    <?php
    $usuario=$_SESSION['id'];
    $sql=$con->query("SELECT * FROM entradas INNER JOIN funciones ON entradas.id_funcion=funciones.id_funcion and id_usuario='$usuario'");
    $row=mysqli_num_rows($sql);
    $i=0;

    if ($sql) {
        
    while ($filas=$sql->fetch_array()) {
        
    if (strtotime(date($filas['fecha'])) > strtotime(date('Y-m-d')) && $filas['confirmado'] == 1) {
    ?>

        <div class="col">
            <div class="notif">
                <div class="notifEncab text-center">
                    <span id="notifFecha"> Notificación de Pago </span>
                </div>
                <div class="notifBody">
                    <p> Informe de su Pago. </p>
                    <p> Su pago de un monto de <?php echo $filas['qty']*$filas['precio'].",00bs";?>, para la función del día <?php echo date('d-m',strtotime($filas['fecha'])); ?> a las <?php echo date('h:i A',strtotime($filas['hora']))?>, ha sido verificado. </p>
                    <p> El número de su entrada es (#<?php echo $filas['id_entrada'];?>)</p>
                </div>

                <div class="notifBody">
                    <p> Estado del pago: </p>
                    <p class="estPago" id="green"> Recibido </p>
                </div>
            </div><br>
        </div><?php
        }elseif(strtotime(date($filas['fecha'])) > strtotime(date('Y-m-d')) && $filas['confirmado'] == 2){
        ?>
        <div class="col">
            <div class="notif">
                <div class="notifEncab text-center">
                    <span id="notifFecha"> Notificación de Pago </span>
                </div>
                <div class="notifBody">
                    <p> Informe de su Pago. </p>
                    <p> Su pago de un monto de <?php echo $filas['qty']*$filas['precio'].",00bs";?>, para la función del día <?php echo date('d-m',strtotime($filas['fecha'])); ?> a las <?php echo date('h:i A',strtotime($filas['hora']))?>, no ha sido verificado. </p>
                </div>

                <div class="notifBody">
                    <p> Estado del pago: </p>
                    <p class="estPago" id="red"> Sin verificar </p>
                </div> 
            </div><br>
        </div>
    <?php
}elseif(strtotime(date($filas['fecha'])) > strtotime(date('Y-m-d')) && $filas['confirmado'] == 0){
?>

        <div class="col">
            <div class="notif">
                <div class="notifEncab text-center">
                    <span id="notifFecha"> Notificación de Pago </span>
                </div>
                <div class="notifBody">
                    <p> Informe de su Pago. </p>
                    <p> Su pago de un monto de <?php echo $filas['qty']*$filas['precio'].",00bs";?>, para la función del día <?php echo date('d-m',strtotime($filas['fecha'])); ?> a las <?php echo date('h:i A',strtotime($filas['hora']))?>, ha sido verificado y rechazado. </p>
                </div>

                <div class="notifBody">
                    <p> Estado del pago: </p>
                    <p class="estPago" id="red"> Denegado </p>
                </div> 
            </div><br>
        </div><?php
}elseif (strtotime(date($filas['fecha'])) < strtotime(date('Y-m-d'))) {
    $i++;
}
}
if ($i == $row) {?>
    <div class="row text-center">
        <div class="col">
            <div class="btn btn-light">
                En este momento no tiene pagos para verificar
            </div>
        </div>
    </div>
<?php    
}
}
?>
    </div>
</div>



</body>
</html>