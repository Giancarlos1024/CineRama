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
        <div class="col"> <h3> No hay funciones disponibles </h3> </div>
    </div>
</div>
</div>

<div class="container">
<div class="row">
    <div class="col Asientos" id="1">1</div>
    <div class="col Asientos" id="2">2</div>
    <div class="col Asientos" id="3">3</div>
    <div class="col Asientos" id="4">4</div>
    <div class="col Asientos" id="5">5</div>
    <div class="col Asientos" id="6">6</div>
    <div class="col Asientos" id="7">7</div>
    <div class="col Asientos" id="8">8</div>
    <div class="col Asientos" id="9">9</div>
    <div class="col Asientos" id="10">10</div>
    <div class="col Asientos" id="11">11</div>
    <div class="col Asientos" id="12">12</div>
    <div class="col Asientos" id="13">13</div>
    <div class="col Asientos" id="14">14</div>
</div>    
<div class="row">
    <div class="col Asientos" id="15">15</div>
    <div class="col Asientos" id="16">16</div>
    <div class="col Asientos" id="17">17</div>
    <div class="col Asientos" id="18">18</div>
    <div class="col Asientos" id="19">19</div>
    <div class="col Asientos" id="20">20</div>
    <div class="col Asientos" id="21">21</div>
    <div class="col Asientos" id="22">22</div>
    <div class="col Asientos" id="23">23</div>
    <div class="col Asientos" id="24">24</div>
    <div class="col Asientos" id="25">25</div>
    <div class="col Asientos" id="26">26</div>
    <div class="col Asientos" id="27">27</div>
</div>
<div class="row">
    <div class="col Asientos" id="28">28</div>
    <div class="col Asientos" id="29">29</div>
    <div class="col Asientos" id="30">30</div>
    <div class="col Asientos" id="31">31</div>
    <div class="col Asientos" id="32">32</div>
    <div class="col Asientos" id="33">33</div>
    <div class="col Asientos" id="34">34</div>
    <div class="col Asientos" id="35">35</div>
    <div class="col Asientos" id="36">36</div>
    <div class="col Asientos" id="37">37</div>
    <div class="col Asientos" id="38">38</div>
    <div class="col Asientos" id="39">39</div>
    <div class="col Asientos" id="40">40</div>
    <div class="col Asientos" id="41">41</div>
</div>
<div class="row">
    <div class="col Asientos" id="42">42</div>
    <div class="col Asientos" id="43">43</div>
    <div class="col Asientos" id="44">44</div>
    <div class="col Asientos" id="45">45</div>
    <div class="col Asientos" id="46">46</div>
    <div class="col Asientos" id="47">47</div>
    <div class="col Asientos" id="48">48</div>
    <div class="col Asientos" id="49">49</div>
    <div class="col Asientos" id="50">50</div>
    <div class="col Asientos" id="51">51</div>
    <div class="col Asientos" id="52">52</div>
    <div class="col Asientos" id="53">53</div>
    <div class="col Asientos" id="54">54</div>
</div>
<div class="row">
    <div class="col Asientos" id="55">55</div>
    <div class="col Asientos" id="56">56</div>
    <div class="col Asientos" id="57">57</div>
    <div class="col Asientos" id="58">58</div>
    <div class="col Asientos" id="59">59</div>
    <div class="col Asientos" id="60">60</div>
    <div class="col Asientos" id="61">61</div>
    <div class="col Asientos" id="62">62</div>
    <div class="col Asientos" id="63">63</div>
    <div class="col Asientos" id="64">64</div>
    <div class="col Asientos" id="65">65</div>
    <div class="col Asientos" id="66">66</div>
    <div class="col Asientos" id="67">67</div>
    <div class="col Asientos" id="68">68</div>
</div>
<div class="row">
    <div class="col Asientos" id="69">69</div>
    <div class="col Asientos" id="70">70</div>
    <div class="col Asientos" id="71">71</div>
    <div class="col Asientos" id="72">72</div>
    <div class="col Asientos" id="73">73</div>
    <div class="col Asientos" id="74">74</div>
    <div class="col Asientos" id="75">75</div>
    <div class="col Asientos" id="76">76</div>
    <div class="col Asientos" id="77">77</div>
    <div class="col Asientos" id="78">78</div>
    <div class="col Asientos" id="79">79</div>
    <div class="col Asientos" id="80">80</div>
    <div class="col Asientos" id="81">81</div>
</div>
<div class="row">
    <div class="col Asientos" id="82">82</div>
    <div class="col Asientos" id="83">83</div>
    <div class="col Asientos" id="84">84</div>
    <div class="col Asientos" id="85">85</div>
    <div class="col Asientos" id="86">86</div>
    <div class="col Asientos" id="87">87</div>
    <div class="col Asientos" id="88">88</div>
    <div class="col Asientos" id="89">89</div>
    <div class="col Asientos" id="90">90</div>
    <div class="col Asientos" id="91">91</div>
    <div class="col Asientos" id="92">92</div>
    <div class="col Asientos" id="93">93</div>
    <div class="col Asientos" id="94">94</div>
    <div class="col Asientos" id="95">95</div>
</div>
<div class="row">
    <div class="col Asientos" id="96">96</div>
    <div class="col Asientos" id="97">97</div>
    <div class="col Asientos" id="98">98</div>
    <div class="col Asientos" id="99">99</div>
    <div class="col Asientos" id="100">100</div>
    <div class="col Asientos" id="101">101</div>
    <div class="col Asientos" id="102">102</div>
    <div class="col Asientos" id="103">102</div>
    <div class="col Asientos" id="104">104</div>
    <div class="col Asientos" id="105">105</div>
    <div class="col Asientos" id="106">106</div>
    <div class="col Asientos" id="107">107</div>
    <div class="col Asientos" id="108">108</div>
</div>
<div class="row">
    <div class="col Asientos" id="109">109</div>
    <div class="col Asientos" id="110">110</div>
    <div class="col Asientos" id="111">111</div>
    <div class="col Asientos" id="112">112</div>
    <div class="col Asientos" id="113">113</div>
    <div class="col Asientos" id="114">114</div>
    <div class="col Asientos" id="115">115</div>
    <div class="col Asientos" id="116">116</div>
    <div class="col Asientos" id="117">117</div>
    <div class="col Asientos" id="118">118</div>
    <div class="col Asientos" id="119">119</div>
    <div class="col Asientos" id="120">120</div>
    <div class="col Asientos" id="121">121</div>
    <div class="col Asientos" id="122">122</div>
</div>
<div class="row">
    <div class="col Asientos" id="123">123</div>
    <div class="col Asientos" id="124">124</div>
    <div class="col Asientos" id="125">125</div>
    <div class="col Asientos" id="126">126</div>
    <div class="col Asientos" id="127">127</div>
    <div class="col Asientos" id="128">128</div>
    <div class="col Asientos" id="129">129</div>
    <div class="col Asientos" id="130">130</div>
    <div class="col Asientos" id="131">131</div>
    <div class="col Asientos" id="132">132</div>
    <div class="col Asientos" id="133">133</div>
    <div class="col Asientos" id="134">134</div>
    <div class="col Asientos" id="135">135</div>
</div>
<div class="row">
    <div class="col Asientos" id="136">136</div>
    <div class="col Asientos" id="137">137</div>
    <div class="col Asientos" id="138">138</div>
    <div class="col Asientos" id="138">139</div>
    <div class="col Asientos" id="140">140</div>
    <div class="col Asientos" id="141">141</div>
    <div class="col Asientos" id="142">142</div>
    <div class="col Asientos" id="143">143</div>
    <div class="col Asientos" id="144">144</div>
    <div class="col Asientos" id="145">145</div>
    <div class="col Asientos" id="146">146</div>
    <div class="col Asientos" id="147">147</div>
    <div class="col Asientos" id="148">148</div>
    <div class="col Asientos" id="149">149</div>
</div>
<div class="row">
    <div class="col Asientos" id="150">150</div>
    <div class="col Asientos" id="151">151</div>
    <div class="col Asientos" id="152">152</div>
    <div class="col Asientos" id="153">153</div>
    <div class="col Asientos" id="154">154</div>
    <div class="col Asientos" id="155">155</div>
    <div class="col Asientos" id="156">156</div>
    <div class="col Asientos" id="157">157</div>
    <div class="col Asientos" id="158">158</div>
    <div class="col Asientos" id="159">159</div>
    <div class="col Asientos" id="160">160</div>
    <div class="col Asientos" id="161">161</div>
    <div class="col Asientos" id="162">162</div>
</div>
    
</div>



</body>
</html>

