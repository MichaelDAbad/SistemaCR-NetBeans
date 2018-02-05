<?php include_once"cabecera.php"; ?>
<?php include_once"navbar.php"; ?>
<?php
if(!isset($_SESSION["username"])){
    header("location: login.php");
}
?>
  <div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="col-lg-5"></div>
        <div class="col-lg-3">
            <div class=""><form action="" method="post"><input type="text" name="buscarproductos"value="" placeholder="Buscar" autofocus=""></input></div>
        </div>
        <div class="col-lg-2"><input type="submit" name="buscar" value="Buscaar" class="btn btn--claro btn--md"></div>
      </form>
        <form action="clientes_agregar.php">
        <div class="col-lg-2"><input type="submit" name="" value="Agregar" class="btn btn--claro btn--md" onclick="clientes_agregar('popup-box1')"></div>
      </form>
      </div>
      <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <table width="100%" border="0" cellspacing="0px" class="contenido">
          <tr class="table__cat">
            <th colspan="8">TABLA INFORMACION DE CLIENTE</th>
          </tr>
          <tr class="contenido--tr">
            <th>Nombre</th>
            <th>Contacto</th>
            <th>Direccion</th>
            <th>Notas</th>
            <th>Action</th>
          </tr>
          <?php
          require_once './config.php';
          if(!isset($_POST['buscar'])){
          $sql="SELECT * FROM customers";
          $resultado= mysqli_query($conexion, $sql);
          }else if(isset ($_POST['buscar'])){
              @$buscar=$_POST['buscarproductos'];
              $sql="SELECT * FROM customers WHERE NAME LIKE ('%$buscar%') OR contact LIKE ('%$buscar%') OR address LIKE ('%$buscar%');";
              $resultado= mysqli_query($conexion, $sql);  
          }
          while($fila= mysqli_fetch_array($resultado)){
          ?>
          <tr class="contenido--tr">
            <td><?php echo $fila[1];?></td>
            <td><?php echo $fila[2];?></td>
            <td><?php echo $fila[3];?></td>
            <td><?php echo $fila[4];?></td>
            <td><a href="eliminar.php?idc=<?php echo $fila[0];?>" class="btnlk btnlk--mediano btnlk--rojo fa fa-trash-o fa-lg"></a></td>
          </tr>
          <?php }?>
        </table>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
<?php include_once './pie.php';?>

