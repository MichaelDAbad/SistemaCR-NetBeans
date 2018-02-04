<?php
if(isset ($_POST['buscar'])){
    $buscar=$_POST['buscarproductos'];
echo $buscar;
require_once './config.php';
$sql="SELECT * FROM supplier WHERE suppliername LIKE('%$buscar%') OR address LIKE ('%$buscar%') OR  note LIKE('%$buscar%') OR contactperson LIKE('$buscar');";
$respuesta= mysqli_query($conexion, $sql);
header("location: ventas.php");
}
?>
<?php include_once"cabecera.php"; ?>
<?php include_once"navbar.php"; ?>
<?php

if(!isset($_SESSION["username"])){
    header("location: login.php");
}
//esto es para mostrar las categorias en el popup
if(isset($_GET['id'])){
     $idv=$_GET['id'];
     echo $idv;
     require_once './config.php';
     $sql="SELECT * FROM products WHERE id='$idv';";
     $respuesta=$conexion->query($sql);
     $filac=$respuesta->fetch_assoc();
     
}
if(isset($_POST['GuardarAgregar'])){
    require_once './config.php';
     $idv=$_GET['id'];
     $fecha=$_POST['fechaA'];
     $n_clie=$_POST['cliente'];
     $categoria=$_POST['categoria'];
     $n_producto=$_POST['Nombrep'];
     $p_venta=$_POST['pventa'];
     $cantidad=$_POST['cantidad'];
     $montopagar=$_POST['montop'];
     $ganancia=$_POST['ganancia'];
     $monto_cancelado=$_POST['montocancelado'];
     $devolver=$_POST['devolver'];

     $sql = "UPDATE products set quantity = quantity - '$cantidad' where id = '$idv'";
     $insert = "INSERT INTO sales(dates,customers,category,name,amnt,quantity,total,profit,tendered,changed) VALUES('$fecha','$n_clie','$categoria',"
             . "'$n_producto','$p_venta','$cantidad','$montopagar','$ganancia','$monto_cancelado','$devolver');"or die("error".mysqli_errno($db_link));
     mysqli_query($conexion, $insert);
     if($conexion->query($sql)==TRUE){
         echo "Actualizado";
         header("location: ventas.php");
         
     }
}
?>
<script type="text/javascript">
  function toggle_visibility(id){
  var e = document.getElementById(id);
  if(e.style.display=='block'){
    e.style.display='none';
  }else {
    e.style.display='block';
  }
  }
</script>
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
  display: block;
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
            <td><form method="post"><input type="submit" name="pedir" value="Pedir" class="btnlk btnlk--mediano btnlk--verde"  onclick="toggle_visibility('popup-box1')"></form></td>
          </tr>
            <?php }?>
        </table>

      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
<?php
if(isset($_POST['pedir'])){
    
}

?>

        <?php 
        if(isset($_POST['calmonto'])){
            $pventa=$_POST['pventa'];
            $cantidad=$_POST['cantidad'];
            $pcompra=$_POST['preciocompra'];
            $montocancelado=$_POST['montocancelado'];
            $montopagar=$cantidad*$pventa;
            $ganacia=$montopagar-$cantidad*$pcompra;
            $devolver=$montocancelado-$montopagar;
            
        }
        ?>

<!--_Inicio Popup -->
  <div class="popup_posicionar" id="popup-box1">
    <div class="popup-centrar">
      <div class="popup-container">
        <div class="popup-header">
          <p style="text-align:right;"><a href= "javascript:void(0)" onclick="toggle_visibility('popup-box1')"><font color="red"> X </font></a></p>
          <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;">FORMULARIO DE TRANSACCION</p>
        </div>
        <div class="popup-body">
        <form class="" action="" method="post">
        <table border="0" align="center">
        <tr>
          <td>Fecha actual</td>
          <td><input type="text" name="fechaA" value="<?php echo date("d/m/Y");?>"></td>
          <td width="20px;" colspan="2"><input type="text" name="preciocompra" value="<?php echo $filac['purchase'];?>" hidden=""></td>
        </tr>
        <tr>
          <td>Clientes</td>
          <td>
                      <?php 
        $sql="SELECT * FROM customers;";
        $resultado= mysqli_query($conexion, $sql);
        ?>
            <select class="" name="cliente">
                <?php 
                   while ($fila= mysqli_fetch_array($resultado)){?>
            <option value="<?php echo $fila['name'];?>"><?php echo $fila['name'];?></option>
                <?php }?>
            </select>
          </td>
          <td></td>
        </tr>
        <tr>
          <td>Categoria</td>
          <td>
              <input type="text" name="categoria"  value="<?php echo $filac['category'];?>"readonly>
          </td>
          <td></td>
        </tr>
        <tr>
          <td>Nombre de producto</td>
          <td>
              <input type="text" name="Nombrep"  value="<?php echo $filac['name'];?>" readonly>
          </td>
          <td></td>
        </tr>
        <tr>
          <td>Precio de venta</td>
          <td><input type="text" name="pventa" value="<?php echo $filac['retail'];?>" readonly></td>
          <td></td>
        </tr>
        <tr>
          <td>Cantidad</td>
          <td><input type="text" name="cantidad" value="<?php echo @$cantidad;?>"></td>
          <td></td>
        </tr>
        <tr>
          <td>Monto total a pagar</td>
          <td><input type="text" name="montop" value="<?php echo @$montopagar;?>" readonly></td>
          <td><input type="submit" name="calmonto" value="calcular" class=" btnlk--mediano btn--claro btnlk btnlk--verde"></td>
        </tr>
        <tr>
          <td>Ganancia</td>
          <td><input type="text" name="ganancia" value="<?php echo @$ganacia;?>" readonly=""></td>
          <td></td>
        </tr>
        <tr>
          <td>Monto cancelado</td>
          <td><input type="text" name="montocancelado" value="<?php echo @$montocancelado; ?>"></td>
          <td><input type="submit" name="calmonto" value="calcular" class=" btnlk--mediano btn--claro btnlk btnlk--verde"></td>
        </tr>
        
        <tr>
          <td>Devolver</td>
          <td><input type="text" name="devolver" value="<?php echo @$devolver; ?>" readonly=""></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" name="GuardarAgregar" value="Agregar" class="btn btn--claro btn--md"><br><br><a href="ventas.php" class="btn--claro btnlk btnlk--rojo">Cancelar</a></td>
          <td></td>
        </tr>
        </table>
        </form>
        </div>
      </div>
    </div>
  </div>
<!--Fin Popup -->