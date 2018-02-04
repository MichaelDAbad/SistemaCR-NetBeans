<?php include_once"cabecera.php"; ?>
<?php include_once"navbar.php"; ?>
<?php

if(!isset($_SESSION["username"])){
    header("location: login.php");

}
?>
<style media="screen">
.popup-container{
  background-color: #fff;
  border: 1px solid red;
  width: 500px;
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
}
.popup_posicionar{
  position: fixed;
  display: none;
  top: 0;
  left: 0;
  background-color: rgba(0,0,0,0.7);
  width: 100%;
  height: 100%;
}
.popup-centrar {
    margin: 70px auto;
    text-align: center;
}

/*textos*/
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
      <form action="" method="post">
      <div class="col-lg-8">
        <div class="col-lg-7"></div>
        <div class="col-lg-3">
          <div class=""><form action=""><input type="text" name="buscarproductos"value="" placeholder="Buscar" style="  width: 100%;
            margin-top:18px;
            padding:129px;
            outline-color: #19CF90;
            border: none;
            border-bottom: 2px solid #19CF86;
            resize: vertical;
            font-size: 18px;
            color: #aaa;
            font-family: cursive;" autofocus=""></form></div>
        </div>
        <div class="col-lg-2"><input type="submit" value="Buscar" name="buscar" class="btn btn--claro btn--md"></div>
      </div>
    </form>

      <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <table width="100%" border="0" cellspacing="0px" class="contenido">
          <tr class="table__cat">
            <th colspan="6">SELECCIONAR PRODUCTOS</th>
          </tr>
          <tr class="contenido--tr">
            <th>Categoria</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad estok</th>
            <th>Proveedor</th>
            <th>agregar</th>
          </tr>
            <?php
            require_once './config.php';
            if(!isset($_POST['buscar'])){
            $sql="SELECT * FROM products";
            $resultado= mysqli_query($conexion, $sql);
            
            }else if(isset($_POST['buscar'])){
            
            $buscar=$_POST['buscarproductos'];
            $cantida="SELECT COUNT(*) AS cant FROM products  WHERE category LIKE('%$buscar%') OR NAME LIKE('%$buscar%') OR supplier LIKE('%$buscar%');";
            $cresp=$conexion->query($cantida);
            $cant=$cresp->fetch_assoc();
            $sql="SELECT * FROM products  WHERE category LIKE('%$buscar%') OR NAME LIKE('%$buscar%') OR supplier LIKE('%$buscar%');";
            $resultado= mysqli_query($conexion, $sql);
             if($cant['cant']>=1){
               echo $cant['cant']." listas con "."<font color=green>'".$buscar."'</font>";
             }else{
                 echo "<font color=red> No hay ninguna lista con '".$buscar."'</font>";
             }
            
            
            }
            while ($fila= mysqli_fetch_array($resultado)){
                
                
            ?>
          <tr class="contenido--tr">
            <td><?php echo $fila['category'];?></td>
            <td><?php echo $fila[2];?></td>
            <td><?php echo $fila['retail'];?></td>
            <td><?php echo $fila['quantity'];?></td>
            <td><?php echo $fila['supplier'];?></td>
            <td><form method="get"><a href="ventas_pedir.php?id=<?php echo $fila[0]?>" class="btnlk btnlk--mediano btnlk--verde"  onclick="toggle_visibility('popup-box1')"></form>Pedir</a></td>
          </tr>
            <?php }?>
        </table>

      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>