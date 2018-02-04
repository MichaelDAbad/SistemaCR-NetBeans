<?php
$servidor="localhost";
$usuarior="root";
$contraseña="";
$basedatos="dbPOS";
$conexion=null;
$conexion=mysqli_connect($servidor,$usuarior,$contraseña,$basedatos) or die("ERROR".mysqli_error($conexion));
/*
$consulta="select * from sales";
$eresultado=mysqli_query($conexion,$consulta);
while($fila=mysqli_fetch_array($eresultado)){
echo $fila[0]."---";
echo $fila[1]."<--->";
echo $fila[2]."<br>";
}
 */
?>
