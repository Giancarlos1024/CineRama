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
        <div class="col Asientos" id="1" onclick="marcarOcupado(1)">1</div>
        <div class="col Asientos" id="2" onclick="marcarOcupado(2)">2</div>
        <div class="col Asientos" id="3" onclick="marcarOcupado(3)">3</div>
        <div class="col Asientos" id="4" onclick="marcarOcupado(4)">4</div>
        <div class="col Asientos" id="5" onclick="marcarOcupado(5)">5</div>
        <div class="col Asientos" id="6" onclick="marcarOcupado(6)">6</div>
        <div class="col Asientos" id="7" onclick="marcarOcupado(7)">7</div>
        <div class="col Asientos" id="8" onclick="marcarOcupado(8)">8</div>
        <div class="col Asientos" id="9" onclick="marcarOcupado(9)">9</div>
        <div class="col Asientos" id="10" onclick="marcarOcupado(10)">10</div>
        <div class="col Asientos" id="11" onclick="marcarOcupado(11)">11</div>
        <div class="col Asientos" id="12" onclick="marcarOcupado(12)">12</div>
        <div class="col Asientos" id="13" onclick="marcarOcupado(13)">13</div>
        <div class="col Asientos" id="14" onclick="marcarOcupado(14)">14</div>
        <div class="col Asientos" id="15" onclick="marcarOcupado(15)">15</div>
        <div class="col Asientos" id="16" onclick="marcarOcupado(16)">16</div>
        <div class="col Asientos" id="17" onclick="marcarOcupado(17)">17</div>
        <div class="col Asientos" id="18" onclick="marcarOcupado(18)">18</div>
        <div class="col Asientos" id="19" onclick="marcarOcupado(19)">19</div>
        <div class="col Asientos" id="20" onclick="marcarOcupado(20)">20</div>
        <div class="col Asientos" id="21" onclick="marcarOcupado(21)">21</div>
        <div class="col Asientos" id="22" onclick="marcarOcupado(22)">22</div>
        <div class="col Asientos" id="23" onclick="marcarOcupado(23)">23</div>
        <div class="col Asientos" id="24" onclick="marcarOcupado(24)">24</div>
        <div class="col Asientos" id="25" onclick="marcarOcupado(25)">25</div>
        <div class="col Asientos" id="26" onclick="marcarOcupado(26)">26</div>
        <div class="col Asientos" id="27" onclick="marcarOcupado(27)">27</div>
        <div class="col Asientos" id="28" onclick="marcarOcupado(28)">28</div>
        <div class="col Asientos" id="29" onclick="marcarOcupado(29)">29</div>
        <div class="col Asientos" id="30" onclick="marcarOcupado(30)">30</div>
        <div class="col Asientos" id="31" onclick="marcarOcupado(31)">31</div>
        <div class="col Asientos" id="32" onclick="marcarOcupado(32)">32</div>
        <div class="col Asientos" id="33" onclick="marcarOcupado(33)">33</div>
        <div class="col Asientos" id="34" onclick="marcarOcupado(34)">34</div>
        <div class="col Asientos" id="35" onclick="marcarOcupado(35)">35</div>
        <div class="col Asientos" id="36" onclick="marcarOcupado(36)">36</div>
        <div class="col Asientos" id="37" onclick="marcarOcupado(37)">37</div>
        <div class="col Asientos" id="38" onclick="marcarOcupado(38)">38</div>
        <div class="col Asientos" id="39" onclick="marcarOcupado(39)">39</div>
        <div class="col Asientos" id="40" onclick="marcarOcupado(40)">40</div>
        <div class="col Asientos" id="41" onclick="marcarOcupado(41)">41</div>
        <div class="col Asientos" id="42" onclick="marcarOcupado(42)">42</div>
        <div class="col Asientos" id="43" onclick="marcarOcupado(43)">43</div>
        <div class="col Asientos" id="44" onclick="marcarOcupado(44)">44</div>
        <div class="col Asientos" id="45" onclick="marcarOcupado(45)">45</div>
        <div class="col Asientos" id="46" onclick="marcarOcupado(46)">46</div>
        <div class="col Asientos" id="47" onclick="marcarOcupado(47)">47</div>
        <div class="col Asientos" id="48" onclick="marcarOcupado(48)">48</div>
        <div class="col Asientos" id="49" onclick="marcarOcupado(49)">49</div>
        <div class="col Asientos" id="50" onclick="marcarOcupado(50)">50</div>
        <div class="col Asientos" id="51" onclick="marcarOcupado(51)">51</div>
        <div class="col Asientos" id="52" onclick="marcarOcupado(52)">52</div>
        <div class="col Asientos" id="53" onclick="marcarOcupado(53)">53</div>
        <div class="col Asientos" id="54" onclick="marcarOcupado(54)">54</div>
        <div class="col Asientos" id="55" onclick="marcarOcupado(55)">55</div>
        <div class="col Asientos" id="56" onclick="marcarOcupado(56)">56</div>
        <div class="col Asientos" id="57" onclick="marcarOcupado(57)">57</div>
        <div class="col Asientos" id="58" onclick="marcarOcupado(58)">58</div>
        <div class="col Asientos" id="59" onclick="marcarOcupado(59)">59</div>
        <div class="col Asientos" id="60" onclick="marcarOcupado(60)">60</div>
        <div class="col Asientos" id="61" onclick="marcarOcupado(61)">61</div>
        <div class="col Asientos" id="62" onclick="marcarOcupado(62)">62</div>
        <div class="col Asientos" id="63" onclick="marcarOcupado(63)">63</div>
        <div class="col Asientos" id="64" onclick="marcarOcupado(64)">64</div>
        <div class="col Asientos" id="65" onclick="marcarOcupado(65)">65</div>
        <div class="col Asientos" id="66" onclick="marcarOcupado(66)">66</div>
        <div class="col Asientos" id="67" onclick="marcarOcupado(67)">67</div>
        <div class="col Asientos" id="68" onclick="marcarOcupado(68)">68</div>
        <div class="col Asientos" id="69" onclick="marcarOcupado(69)">69</div>
        <div class="col Asientos" id="70" onclick="marcarOcupado(70)">70</div>
        <div class="col Asientos" id="71" onclick="marcarOcupado(71)">71</div>
        <div class="col Asientos" id="72" onclick="marcarOcupado(72)">72</div>
        <div class="col Asientos" id="73" onclick="marcarOcupado(73)">73</div>
        <div class="col Asientos" id="74" onclick="marcarOcupado(74)">74</div>
        <div class="col Asientos" id="75" onclick="marcarOcupado(75)">75</div>
    </div>
</div>




<script>
    // Ejemplo de cómo marcar un asiento como ocupado (puedes adaptar según tu lógica)
    function marcarOcupado(id) {
        var asiento = document.getElementById(id);
        
        // Verificar si el asiento ya está marcado como ocupado
        if (asiento.classList.contains("ocupado")) {
            // Si ya está ocupado, desmarcarlo
            asiento.classList.remove("ocupado");
        } else {
            // Si no está ocupado, marcarlo como ocupado
            asiento.classList.add("ocupado");
        }
    }

    // Para desbloquear un asiento
    function desbloquearAsiento(id) {
        var asiento = document.getElementById(id);
        asiento.classList.remove("ocupado");
    }
</script>

</body>
</html>

