<?php
include_once './config.php';
$category=$_POST['category'];
$nombre=$_POST['nombre'];
$cantidad=$_POST["cantidad"];
$precioc=$_POST["precioc"];
$preciov=$_POST["preciov"];
$proveedor=$_POST["proveedor"];
echo $category."<br>";
echo $nombre."<br>";
echo $cantidad."<br>";
echo $precioc."<br>";
echo $preciov."<br>";
echo $proveedor."<br>";
$sql="INSERT INTO products(category,NAME,quantity,purchase,retail,supplier) VALUES('$category','$nombre','$cantidad','$precioc','$preciov','$proveedor')" or die("error".mysqli_errno($conexion));

mysqli_query($conexion, $sql);
header("location: productos.php");
mysqli_close($conexion);
