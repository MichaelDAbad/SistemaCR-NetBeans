<?php include_once"cabecera.php";?>
<?php include_once"navbar.php";?>
<?php 
//session_start();
//en esta parte se pregunta si es que no hay una session iniciada, y si de ser asi se redirige a la pagina de login.php. esto se hace en todo las páginas.php

if(!isset($_SESSION["username"])){
    header("location: login.php");
}
?>
<div class="container">
<div class="row">
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
    <table width="100%" border="0" cellspacing="40px" class="tablem">
      <tr>
        <td width="33%"><a href="ventas.php"><img src="fuentes\ventas.svg"  alt="ventas" class=""></a></td>
        <td width="33%"><a href="productos.php"><img src="fuentes\productos.svg" alt="productos" class=""></a></td>
        <td width="33%"><a href="clientes.php"><img src="fuentes\clientes.svg" alt="clientes" class=""></a></td>
      </tr>
      <tr>
        <td width="33%"><a href="proveedores.php"><img src="fuentes\proveedores.svg" alt="proveedor" class=""></a></td>
        <td width="33%"><a href="reportes.php"><img src="fuentes\reportes.svg" alt="reportes" class=""></a></td>
        <td width="33%"><a href="#"><img src="fuentes\cerrar.svg" alt="cerrar" class=""></a></td>
      </tr>
    </table>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
  </div>
</div>
