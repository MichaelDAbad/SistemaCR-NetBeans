PASOS PARA CREAR UN SISTEMA(no poo)
1.- Realizar la conexión (ya sea mysqli o PDO)
2.- crear un formulario que al enviar a una pagina login_procesar.php valida  el formulario recibido, si todo esta bien crea una session y a la vez envia al menu principal, y si de no ser así devuelve al login con una alerta de error.
3.- una vez iniciado la session(ya que guardamos el nombre del usuario en una session) solo mostramos el nombre del usuario.
4.- para salir, presionado el borton salir obiamente, damos click en el boton y nos ennvia auna pagina nueva en la que destruimos la session con el metodo
sessios_destroy();
 unset($_SESSION["nombre"]);
 y redirigimos a la pagina de login.php con header("");
  exit();
5.-para no aceder ingresando al url ejemplo ventas.php se hace lo siguiente
   if(!isset($_SESSION["username"])){
    header("location: login.php");
    }
    //eso hace que te devuelve al login si es que no se inicio sesion.
    
    para asociar los datos sql a php
$sql="select * from alimnos";
$result=$conexion->query($sql);
$fila=$result->fetch_assoc();

con esto podemos acceder a las listas asi :( $fila['nombre'];)

conexion: config.php
--------
$conexion=mysqli_connect($servidor,$usuarior,$contraseña,$basedatos) or die("ERROR".mysqli_error($conexion));



login: login_procesar.php
-----------------
session_start();
if(isset($_POST["button"])){
    require_once 'config.php';
@$username=$_POST["nombre"];//captura de login
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

//logout.php
-----------------------------------------
desde el boton enviar envia para correr este codigo y salir(borrar session)

session_start();
session_destroy();
unset($_SESSION["username"]);
header("location: login.php");
exit();
