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
    <!-- <div class="row">
        <div class="col"> <h3> No hay funciones disponibles </h3> </div>
    </div> -->
</div>
</div>
<div class="container">
    <div class="asientosCine">
        <script>
            let totalAsientos = 162;
            let asientoNumero = 1;
            let filas = "";
            
            for (let i = 0; asientoNumero <= totalAsientos; i++) {
                let asientosEnFila = i % 2 === 0 ? 14 : 13; // Alterna entre 14 y 13 asientos por fila
                filas += '<div class="filas">';
                for (let j = 0; j < asientosEnFila && asientoNumero <= totalAsientos; j++) {
                    filas += `<div class="col Asientos" id="${asientoNumero}" onclick="marcarOcupado(${asientoNumero})">${asientoNumero}</div>`;
                    asientoNumero++;
                }
                filas += '</div>';
            }
            document.write(filas);
        </script>
    </div>
</div>




<script>
    document.addEventListener("DOMContentLoaded", function () {
        cargarAsientos(); 
    });

    function marcarOcupado(id) {
        var asiento = document.getElementById(id);
        
        // Verificar si está ocupado
        if (asiento.classList.contains("ocupado")) {
            asiento.classList.remove("ocupado");
            eliminarAsientoLocalStorage(id); 
        } else {
            asiento.classList.add("ocupado");
            guardarAsientoLocalStorage(id); 
        }
    }

    function guardarAsientoLocalStorage(id) {
        let asientosOcupados = JSON.parse(localStorage.getItem("asientosOcupados")) || [];
        if (!asientosOcupados.includes(id)) {
            asientosOcupados.push(id);
        }
        localStorage.setItem("asientosOcupados", JSON.stringify(asientosOcupados));
    }

    function eliminarAsientoLocalStorage(id) {
        let asientosOcupados = JSON.parse(localStorage.getItem("asientosOcupados")) || [];
        asientosOcupados = asientosOcupados.filter(asiento => asiento != id);
        localStorage.setItem("asientosOcupados", JSON.stringify(asientosOcupados));
    }

    function cargarAsientos() {
        let asientosOcupados = JSON.parse(localStorage.getItem("asientosOcupados")) || [];
        asientosOcupados.forEach(id => {
            let asiento = document.getElementById(id);
            if (asiento) {
                asiento.classList.add("ocupado");
            }
        });
    }
</script>


</body>
</html>

