<DOCTYPE html>
<head>
<link rel="stylesheet" href="estil1.css">
<body background="#fcbacb">
<meta charset="utf_8" />
<style>
.error{font-weight:  bold; color;red;}
.mensaje{color:#030;}
.listadoImagenes img{float:left;border:1px solid#fd5da8; padding:2px;margin:2px;background:#e11584;}
</style>
</head>


<div id="encabezado">


<img src="ofi.png"></img>

</div>
<div id="menu">
<ul>
<li> <a href="index.html">Yo alebrije!!! </a> </li><br>
<li>  <a href="Sabias.html">&iquest;Sab&iacute;as qu&eacute;? </a> </li><br>
<li> <a href="Fotogaleria1.php">Fotogaler&iacute;a </a> </li><br>
<li> <a href="tipos.html">Tipos</a> </li><br>
<li> <a href="como.html">&iquest;C&oacute;mo hacerlo?</a> </li><br>
<li> <a href="video.html">Videos</a> </li><br>
<li> <a href="libro.html">Libro de Visitas</a> </li><br></div>
<div  id="seccion" id="scroll"><center id="scroll">
<h1><font face="Britannic Bold"  color="black">En este apartado queremos que nos compartas tu dise&ntilde;o de como te ha quedado tu Alebrije </font></h1>
	
	

<?php
if(isset($_POST['userfile'])){

$_FILES=$_POST['userfile'];
}
error_reporting(E_ALL^E_NOTICE);
$mysqli=new mysqli("localhost","root","","imagenes");
if(mysqli_connect_errno())
{
	die("Error al conectar:" .mysqli_connect_errno());
}
if(is_uploaded_file($_FILES['userfile']['tmp_name']))
{
if($_FILES["userfile"]["type"]=="image/jpeg"||$_FILES["userfile"]["type"]==
"image/pjpeg"||
$_FILES["userfile"]["type"]=="image/gif"||$_FILES["userfile"]["type"]=="image/bmp"
||$_FILES["userfile"]["type"]=="image/png")
{
	$info=getimagesize($_FILES["userfile"]["tmp_name"]);
	$imagenEscapes=base64_encode(file_get_contents($_FILES["userfile"]["tmp_name"]));
$sql="INSERT INTO imagephp(anchura,altura,tipo,imagen)
VALUES(". $info[0].",".$info[1].",'".$_FILES["userfile"]["type"]."','".$imagenEscapes."')";
//echo $sql;
$mysqli->query($sql);
$id=$mysqli->insert_id;

}
else{
	echo"<div class='error'Error:El archivo del formato tiene que ser un JPG, GIF, BMP></div>";
}
}
?>
<h2>Selecciona una imagen</h2>
<form enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
<p><input name="userfile" type="file"></p>
<p><input type="submit" value="Guardar imagen">
</form>
<h2>Listado de im&aacute;genes a&ntilde;adidas a base de datos</h2>
<div class="ListadoImagenes">
<?php
$sql="SELECT * FROM imagephp";
$result=mysqli_query($mysqli,$sql);
$campos=mysqli_num_fields($result);
echo"<table border='3' bordercolor='#e11584'bordercolordark='#ff1694' cellspacing='10'>";
echo"<tr>";
echo"<th width='.5%' >Id</th>";

echo"<th>imagen</th>";
while($row=mysqli_fetch_array($result))
{
	echo"<tr><td bgcolor='pink'>".$row["id"]."</td>"
	
	."<td bgcolor='pink'>"."<img src='data:".$row["tipo"].";base64,\n".$row["imagen"]."'width='500' heigth='500'>"."</td></tr>";
}
?></div></center></div>

<div>
<footer id="pie"><a href="creditos.html" id="a1">Yo Alebrije!!! CECYTEM Villa del Carb&oacute;n Generaci&oacute;n 2017-2020 Grupo 404 </a> </li>
</footer>
</div>

</body>
</html>