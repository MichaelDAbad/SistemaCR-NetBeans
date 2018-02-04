<?php include_once"cabecera.php"; ?>
<?php include_once"navbar.php"; ?>
<?php
require_once './config.php';
@$id=$_GET['id'];
if(!isset($_SESSION["password"])){//puede ser $_SESSION["username"];
    header("location: login.php");
}else if(isset ($_POST["guardarr"])){
    $categoria=$_POST['category'];
    $nombre=$_POST['nombre'];
    $cantidad=$_POST['cantidad'];
    $precioc=$_POST['precioc'];
    $preciov=$_POST['preciov'];
    $proveedor=$_POST['proveedor'];
    $sql="UPDATE products SET category='$categoria',NAME='$nombre',quantity='$cantidad',purchase='$precioc',retail='$preciov',supplier='$proveedor' WHERE id='$id'";
    $respuesta= mysqli_query($conexion, $sql);
    header("location: productos.php");
    
}
?>
<!--Javascript popup editar-->
<script type="text/javascript">
  function visualizar_popup(id){
    var e=document.getElementById(id);
    if(e.style.display=='block'){
      e.style.display='none';
    }else {
      e.style.display='block';
    }
  }
</script>
<style media="screen">
  /*Estilo de popup*/
  .popup-container{
    background-color: #fff;
    border: 1px solid red;
    width: 450px;;
    height: auto;
    text-align: center;
    border-radius: 10px;
    margin-left: 35%;

  }
  .popup-header{
  background-color: #f2f2f2;
  padding: 0px 0px 20px;
  border-radius: 10px;
  }
  .popup-body{
    margin-bottom: 25px;
    justify-content: center;
  }
  .popup_posicionar{
    position: fixed;
    display: block;
    top: 0;
    left: 0;
    background-color: rgba(0,0,0,0.7);
    width: 100%;
    height: 100%;
  }
  .popup-centar {
      margin-top: 70px;
      text-align: center;
  }
  input[type=text]{
    padding: 1px !important;
    border: 1px solid green;
    background-color: white !important;
    border-radius: 3px !important;
  }
</style>

  <div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="col-lg-5"></div>
        <div class="col-lg-3">
          <div class=""><form action=""><input type="text" name="buscarproductos" value="" placeholder="Buscar" style="  width: 100%;
            padding: 12px;
            outline-color: #19CF90;
            border: none;
            border-bottom: 2px solid #19CF86;
            resize: vertical;
            font-size: 18px;
            color: #aaa;
            font-family: cursive;
            margin-top:18px;"></input></form></div>
        </div>
        <div class="col-lg-2"><button class="btn btn--claro btn--md">Bsucar</button></div>
        <div class="col-lg-2"><input type="button" name="" value="Agregar" class="btn btn--claro btn--md" onclick="editar_popup('popup-box2')"></div>
      </div>
      <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <table width="100%" border="0" cellspacing="0px" class="contenido">
          <tr class="table__cat">
            <th colspan="8">TABLA INFORMACION DE PRODUCTOS</th>
          </tr>
          <tr class="contenido--tr">
            <th>Categoria</th>
            <th>Nombre</th>
            <th>Cantidad estok</th>
            <th>Precio de compra</th>
            <th>precio de venta</th>
            <th>Proveedor</th>
            <th colspan="2">Action</th>
          </tr>
          <?php
          $sql="SELECT * FROM products";
          $resultado= mysqli_query($conexion, $sql);
          while ($fila= mysqli_fetch_array($resultado)){
          ?>
          <tr class="contenido--tr">
            <td><?php echo $fila[1];?></td>
            <td><?php echo $fila[2];?></td>
            <td><?php echo $fila[3];?></td>
            <td><?php echo $fila[4];?></td>
            <td><?php echo $fila[5];?></td>

            <td><?php echo $fila[6];?></td>
            <td>
                <a href="productos_editar_procesar.php?id=<?php echo($fila['id'])?>" class="btnlk btnlk--mediano btnlk--verde fa fa-pencil fa-lg" onclick="visualizar_popup('popup-box1')"></a>
            </td>
            <td>
              <a href="" class="btnlk btnlk--mediano btnlk--rojo fa fa-trash-o fa-lg"></a>
            </td>
          </tr>
          <?php }?>
        </table>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
<?php 
      require_once './config.php';
      @$id=$_GET['id'];
      
      $sql="SELECT * FROM products WHERE id='$id'";
      $ejecutar=$conexion->query($sql);
      $fila=$ejecutar->fetch_assoc();
      echo $id;
?>
<!--_Inicio Popup-->
<div class="popup_posicionar" id="popup-box2">
  <div class="popup-centar">
    <div class="popup-container">
      <div class="popup-header">
          <br>
        <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;">EDITAR PRODUCTOS</p>
      </div>
      <div class="popup-body">
      <form class="" action="" method="post">
      <table border="0" align="center">
      <tr>
        <td>Categoria</td>
        <td>
          <select class="" name="category">
            <option> Finger Food </option>
            <option> Dessert </option>
            <option> Hamburger </option>
            <option> Sandwich </option>
          </select>
        </td>
        <td width="20px;" colspan="2"></td>
      </tr>
      <tr>
        <td>Nombre</td>
        <td><input type="text" name="nombre" value="<?php echo $fila['name'];?>" placeholder="cantidad" required></td>
        <td></td>
      </tr>
      <tr>
        <td>Cantidad</td>
        <td><input type="text" name="cantidad" value="<?php echo $fila['quantity'];?>" placeholder="cantidad" required></td>
        <td></td>
      </tr>
      <tr>
        <td>Precio de compra</td>
        <td><input type="text" name="precioc" value="<?php echo $fila['purchase']?>" required></td>
        <td></td>
      </tr>
      <tr>
        <td>Precio de venta</td>
        <td><input type="text" name="preciov" value="<?php echo $fila['retail'];?>" required></td>
        <td></td>
      </tr>
      <tr>
        <td>Proveedor</td>
        <td>
          <select class="" name="proveedor">
            <?php
            $sql="SELECT * FROM supplier";
            $respuesta=mysqli_query($conexion,$sql);
            while($fila= mysqli_fetch_array($respuesta)){
            ?>
          <option value="<?php echo $fila['suppliername'];?>"><?php echo  $fila['suppliername'];?></option>
            <?php }?>
          </select>
        </td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td><br><input type="submit" name="guardarr" value="Guardar cambios" class="btn--claro btnlk btnlk--verde"></td>
        <td></td>
      </tr>
      <tr>
          <td></td>
          <td><br><a href="productos.php" class="btn--claro btnlk btnlk--rojo">Cancelar</a></td>
          <td></td>
      </tr>
      </table>
      </form>
      </div>
    </div>
  </div>
</div>
