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
<!--Javascript popup Agregar-->
<script type="text/javascript">
  function popup_agregar_proveedores(id){
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
    display: none;
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
            <div class=""><form action="" method="post"><input type="text" name="buscarproductos"value="" placeholder="Buscar" style="  width: 100%;
            padding: 12px;
            outline-color: #19CF90;
            border: none;
            border-bottom: 2px solid #19CF86;
            resize: vertical;
            font-size: 18px;
            color: #aaa;
            font-family: cursive;
            margin-top:18px;"></input></div>
        </div>
<div class="col-lg-2"><input type="submit" name="buscar" value="Buscar" class="btn btn--claro btn--md"></div></form>
        <div class="col-lg-2"><input type="button" name="" value="Agregar" class="btn btn--claro btn--md" onclick="popup_agregar_proveedores('popup-box2')"></div>
      </div>
      <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
          <form class="" action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
        <table width="100%" border="0" cellspacing="0px" class="contenido">
          <tr class="table__cat">
            <th colspan="7">TABLA INFORMACION DE PROVEEDOR</th>
          </tr>
          <tr class="contenido--tr">
            <th>Nombre de proveedor</th>
            <th>Persona de contacto</th>
            <th>Direccion</th>
            <th>Numero de telefono</th>
            <th>notas</th>
            <th colspan="2">Action</th>
          </tr>
          <?php
          require_once './config.php';
          if(!isset($_POST['buscar'])){
          $sql="SELECT * FROM supplier";
          $resultado= mysqli_query($conexion, $sql);
          }else if(isset($_POST['buscar'])){
              $buscar=$_POST['buscarproductos'];
              $sql="SELECT * FROM supplier WHERE suppliername LIKE('$buscar') OR contactperson LIKE ('%$buscar%') OR address LIKE ('%$buscar%');";
              $resultado= mysqli_query($conexion, $sql);
          }
          while($fila= mysqli_fetch_array($resultado)){
          ?>
          <tr class="contenido--tr">
            <td><?php echo $fila[1];?></td>
            <td><?php echo $fila[2];?></td>
            <td><?php echo $fila[3];?></td>
            <td><?php echo $fila[4];?></td>
            <td><?php echo $fila[5];?></td>
            <td><a href="proveedores_editar.php?id=<?php echo md5($fila['id'])?>" class="btnlk btnlk--mediano btnlk--verde fa fa-pencil fa-lg" onclick="popup_editar_proveedores('popup-box1')"></a></th>
            <td><a href="eliminar.php?idprov=<?php echo $fila[0]?>" class="btnlk btnlk--mediano btnlk--rojo fa fa-trash-o fa-lg"></a></td>
          </tr>
          <?php }?>
        </table>
        </form>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
<?php
      require_once './config.php';
if(isset($_POST['guardar'])){
    @$proveedor=$_POST['proveedor'];
@$pcontacto=$_POST['pcontacto'];
@$direccion=$_POST['direccion'];
@$telefono=$_POST['telefono'];
@$nota=$_POST['nota'];
$sql="INSERT INTO supplier(suppliername,contactperson,address,contactno,note) VALUES ('$proveedor','$pcontacto','$direccion','$telefono','$nota')";
mysqli_query($conexion, $sql);
}
?>
<!--_Inicio Popup-->
<div class="popup_posicionar" id="popup-box2">
  <div class="popup-centar">
    <div class="popup-container">
      <div class="popup-header">
        <p style="text-align:right;"><a href= "javascript:void(0)" onclick="popup_agregar_proveedores('popup-box2')"><font color="red"> X </font></a></p>
        <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;">AGREGAR PROVEEDORES</p>
      </div>
      <div class="popup-body">
          <form class="" action="" method="post">
        <table border="0" align="center">
        <tr>
          <td>Nombre de proveedor</td>
          <td><input type="text" name="proveedor"  placeholder="cantidad" required></td>
          <td width="20px;" colspan="2"></td>
        </tr>
        <tr>
          <td>Persona de contacto</td>
          <td><input type="text" name="pcontacto"  placeholder="cantidad" required></td>
          <td></td>
        </tr>
        <tr>
          <td>Direccion</td>
          <td><input type="text" name="direccion"  placeholder="" required></td>
          <td></td>
        </tr>
        <tr>
          <td>Numero de telefono</td>
          <td><input type="text" name="telefono" required></td>
          <td></td>
        </tr>
        <tr>
          <td>Notas</td>
          <td><input type="text" name="nota"></td>
          <td></td>
        </tr>
        <tr>
        <td></td>
        <td><br><input type="submit" name="guardar" value="Guardar cambios" class="btn--claro btnlk btnlk--verde"></td>
        <td></td>
      </tr>
      </table>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include_once './pie.php';?>