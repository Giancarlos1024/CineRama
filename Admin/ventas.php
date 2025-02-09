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
    <link rel="stylesheet" href="../css/admin1.css">
    <script src="../sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../sweetalert/sweetalert2.min.css">
    <script src="../db/jquery-3.7.1.min.js"></script>
    <script src="../db/jquery.print.min.js"></script>
    <script src="../db/bootstrap.bundle.min.js"></script> 
    <script src="bootstrap.js"></script>
    <title>Ventas</title>
</head>
<body>
 
    <!-- Barra De Navegación.-->
<div class="container cont1">
    <div class="row">
        <div class="col colA"></div>
        <div class="col colB"></div>
        <div class="col colC"></div>
        <div class="col colD"><a href="añadir_pelicula.php"> Cartelera </a></div>
        <div class="col colE"><a class="hpvblanco" href="ventas.php"> Ventas </a></div>
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
        <div class="col alinear"><h3>Ventas</h3></div>
    </div>
</div>
</div>

<!-- Boton de agregar -->
<div class="container3">
  <div class="row">
    <div class="col btnAgg"> <button class="btn btn-danger" id="btnAggVenta">Agregar Función</button> <button class="btn btn-primary" id="imprimir">Descargar registro</button> <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal_descarga"> Eliminar registros </button></div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const boton = document.getElementById('btnAggVenta');
            const elemento = document.getElementById('formulario');

            boton.addEventListener('click', function() {
               if(elemento.style.display === "none"){
                   elemento.style.display = "block";
               }else{
                 elemento.style.display = "none";
               }
            });
        });
    </script>
  </div>

</body>
</html>
    <div class="row justify-content-center">
    <div class="col-3 formStyle" id="formulario">
      <form action="" method="post">
        <label for=""> Película </label>
        <select name="pelicula" required>
          <?php
                    $query=$con->query("SELECT * FROM peliculas");  
                    while ($filas=$query->fetch_array()) {
                    echo "<option value=".$filas['id_pelicula'].">".$filas['titulo']."</option>";
                }
                ?>  
        </select>
        <label for=""> Fecha </label>
        <input type="date" name="fecha" required>
        <label for=""> Hora </label>
        <input type="time" name="hora" required>
        <label for=""> Precio/Entrada (bs) </label>
        <input type="number" name="precio" required>
        <button class="btn btn-danger" id="btnAggVenta2" name="btnregistrar"> Agregar </button>
      </form>
      <?php
        if (isset($_POST['btnregistrar'])) {
            $pelicula=$_POST['pelicula'];
            $fecha=$_POST['fecha'];
            $hora=$_POST['hora'];
            $precio=$_POST['precio'];

            $sql=$con->query("INSERT INTO funciones(id_pelicula,fecha,hora,precio) VALUES('$pelicula','$fecha','$hora','$precio')");

          if ($sql) {?>
            <script type="text/javascript">
            Swal.fire({
            icon: "success",
            title: "ÉXITO",
            text: "FUNCIÓN REGISTRADA",
            showConfirmButton: false,
            timer:1500
            });
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
            </script>
        <?php
        }
    }
    ?>
    </div>
  </div>

<!-- Tabla de ventas. -->
<div class="contaniner cont4" id="imprimible">
  <div class="row">
    <div class="col tituloRegistro" >
      Registro de Entradas Vendidas.
    </div>
  </div>
  <div class="row">
    <div class="col"> Función </div>
    <div class="col"> Usuario </div>
    <div class="col"> N° de Asientos </div>
    <div class="col"> Monto </div>
  </div>

  <?php
    $sql=$con->query("SELECT * FROM entradas INNER JOIN funciones ON entradas.id_funcion=funciones.id_funcion and confirmado=1");

    if ($sql) {
        while ($filas=$sql->fetch_array()) { 
        $usuario=$filas['id_usuario'];  
        $query=$con->query("SELECT * FROM usuarios WHERE id_usuario='$usuario'");
        if ($query) {
            $row=$query->fetch_array();
  ?>
  <div class="row" id="infoVenta">
    <div class="col"> <?php echo date('Y-m-d',strtotime($filas['fecha']))." / ".date('h:i A',strtotime($filas['hora']));?> </div>
    <div class="col"> <?php echo $row['nombre']." ".$row['apellido'];?> </div>
    <div class="col"> <?php echo $filas['qty'];?> </div>
    <div class="col"> <?php echo $filas['qty']*$filas['precio'].",00bs";?> </div>
  </div>
<?php
}
}
}
?>
</div>
<script>
     $(document).ready(() => {
      $('#imprimir').click(function(){
        $.print('#imprimible');
      })
    })
   </script>
<div class="modal fade" id="modal_descarga">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="ventas.php" method="post">
      <div class="row text-center">
          <h5 class="text-center">¿Está seguro que desea eliminar los registros?</h5>
          <p>Se eliminarán todas las ventas de la tabla al igual que las funciones registradas</p>
          <div class="col">
            <input type="submit" name="btneliminar" class="btn btn-danger" value="Eliminar">
            <input type="submit" name="btncancelar" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancelar">
          </div>
      </div>
      <?php
    if (isset($_POST['btneliminar'])) {
      $sql=$con->query("DELETE FROM entradas");

      if ($sql) {
        $query=$con->query("DELETE FROM funciones");
        if ($query) {?>
          <script type="text/javascript">
            window.location.href = 'ventas.php';
          </script><?php
        }
      }
    }
    ?>
    </form>
  </div>
  </div>
</div>
</body>
</html>