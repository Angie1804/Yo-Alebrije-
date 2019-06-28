<!DOCTYPE html>
<head>
<meta content="text/html;charset=utf-8" http-equiv="content-type">
<title>ALMACENAMIENTO DE REGISTROS</title>
</head>

<link rel="stylesheet" href="estil.css">
</head>
<center>
<body background="fondo.png">

<div id="encabezado">

<center>
<br><br><font face="Times New Roman" size="45" color="#000000"><strong>YO ALEBRIJE!!!</strong></font>
</center>
</div>
<div id="menu">
<ul>
<li> <a href="alebrijes.html">Yo alebrije!!! </a> </li><br>
<li> <a href="Sabias.html">&iquest;Sabias que? </a> </li><br>
<li> <a href="Fotogaleria.php">Fotogaler&iacute;a </a> </li><br>
<li> <a href="tipos.html">Tipos</a> </li><br>
<li> <a href="como.html">Como hacerlo</a> </li><br>
<li> <a href="video.html">Videos</a> </li><br>
<li> <a href="libro.html">Libro de Visitas</a> </li><br>

</div>
<div id="seccion">
<h1><font face="Britannic Bold"  color="black"></br>

</font></h1>
	
	<div/>
<div>
<footer id="pie">
</footer>

<?php

$nombre=$_POST['nombre'];
$comentario=$_POST['comentario'];

$link= mysql_connect('localhost','root','','imagenes');
if(!$link){
	die('Could not connect:'.mysql_error());
}

$db_selected= mysql_select_db('imagenes',$link);
if(!$db_selected){
	die('LA BASE DE DATOS ES INACCESIBLE:'.mysql_error());
}

$que="INSERT INTO base(nombre,comentario)";
$que="VALUES('".$nombre."','".$comentario.")";
echo "<h2>".'COMENTARIO ENVIADO EXITOSAMENTE...'."<br>"."<br>"."<br>"."<br>"."<h2>";
//$res=mysql_error(mysql_query($que,$link));

mysql_close($link); 

?>
</center>
</body>
</html>