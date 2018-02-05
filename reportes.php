<?php include_once"cabecera.php"; ?>
<?php include_once"navbar.php"; ?>
<?php
if(!isset($_SESSION["username"])){
    header("location: login.php");
}
if($_SESSION["access"]!=='Admin'){
    header("location: error.php");
}
?>
<?php
if(isset($_POST['btnbuscar'])){
    require_once './config.php';
    $idf1=$_POST['buscar1'];
    $idf2=$_POST['buscar2'];
    $sql="SELECT * FROM sales WHERE dates BETWEEN '$idf1' and '$idf2'";
    $resultado= mysqli_query($conexion, $sql);
    
    $ventas = "SELECT sum(total) as totalventas FROM sales WHERE dates BETWEEN '$idf1' and '$idf2'";//total de ventas
    $query_ventas=$conexion->query($ventas);
    $rpta_ventas=$query_ventas->fetch_assoc();
    $ganacias = "SELECT sum(profit) as totalganancias FROM sales WHERE dates BETWEEN '$idf1' and '$idf2'";//total de ganancias
    $query_ganancias=$conexion->query($ganacias);
    $rpta_ganancias=$query_ganancias->fetch_assoc();
}

?>
  <div class="container">
      <form action="" method="POST">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="col-lg-4"></div>
        <div class="col-lg-3">
            <input type="date" name="buscar1"value="<?php echo $idf1; ?>" placeholder="fecha de inicio">
        </div>
        <div class="col-lg-3">
            <input type="date" name="buscar2"value="<?php echo $idf2; ?>" placeholder="Fecha final">
        </div>
        <div class="col-lg-2"><button  type="submit" name="btnbuscar" class="btn btn--claro btn--md">Buscar</button></div>
      </div>
      <div class="col-lg-2"></div>
    </div>
   </form>
    <br>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <table width="100%" border="0" cellspacing="0px" class="contenido">
          <tr class="table__cat">
            <th colspan="6">RESUMEN DE VENTAS</th>
          </tr>
          <tr class="contenido--tr">
            <th>Fecha</th>
            <th>Clientes</th>
            <th>producto vendido</th>
            <th>Cantidad vendida</th>
            <th>Monto pagado</th>
            <th>Ganancias</th>
          </tr>
          <?php
          if(isset($_POST['btnbuscar'])){
          while ($fila= mysqli_fetch_array($resultado)){ ?>
          <tr class="contenido--tr">
            <td><?php echo $fila['dates'];?></td>
            <td><?php echo $fila['customers'];?></td>
            <td><?php echo $fila['name'];?></td>
            <td><?php echo $fila['quantity'];?></td>
            <td><?php echo '$ '.$fila['total'];?></td>
            <td><?php echo '$ '.$fila['profit'];?></td>
          </tr>
          <?php } }?>
          <tr class="contenido--tr">
            <td colspan="4"></td>
            <td>ventas</td>
            <td>ganancias</td>
          </tr>
          <tr class="contenido--tr">
            <td colspan="4">Total de ingresos</td>
            <td><?php echo '$ '.@$rpta_ventas['totalventas']; ?></td>
            <td><?php echo '$ '.@$rpta_ganancias['totalganancias']?></td>
          </tr>
        </table>
      </div>
      <div class="col-lg-2"></div>
    </div>
    <div class="row">
        <?php if(isset($_POST['btnbuscar'])){?>
     <div class="col-lg-2"></div>
      <div class="col-lg-8">
          <input type="button" name="imprimir" value="Imprimir P&aacute;gina" onclick="window.print();" class="btn--md">
      </div>
        <?php } ?>
    </div>
  </div>
<br>
<br>
<br>
<?php include_once './pie.php';?>