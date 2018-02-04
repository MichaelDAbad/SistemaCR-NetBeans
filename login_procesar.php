<?php
session_start();
if(isset($_POST["button"])){
    require_once 'config.php';
@$username=$_POST["nombre"];
@$password=$_POST["contrasenia"];
$login="SELECT * FROM users WHERE username='$username' AND PASSWORD='$password'";
$resultado_login= mysqli_query($conexion, $login);
if(@mysqli_num_rows($resultado_login)==1){
    $_SESSION= mysqli_fetch_array($resultado_login,MYSQLI_ASSOC);
    header("location: tablero.php");
} else { 
    $_SESSION["error"]="<p style='color:red'>Nombre o contraseña incorrecto</p>";
    header("location: login.php");
}
mysqli_close($conexion);
}
