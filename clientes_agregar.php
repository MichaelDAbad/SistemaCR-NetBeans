<?php include_once"cabecera.php"; ?>
<?php include_once"navbar.php"; ?>
<?php
    require_once './config.php';
if(!isset($_SESSION["username"])){
    header("location: login.php");
}else if(isset($_POST['guardar'])){
    @$nombre=$_POST['nombre'];
    @$contacto=$_POST['contacto'];
    @$direccion=$_POST['direccion'];
    @$nota=$_POST['nota'];
    $sql="INSERT INTO customers (NAME,contact,address, note) VALUES('$nombre','$contacto','$direccion','$nota');";
    mysqli_query($conexion, $sql);
    mysqli_close($conexion);
    header("location: clientes.php");
    
}
?>
<!--Javascript popup Agregar-->
<script type="text/javascript">
  function clientes_agregar(id){
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
    width: 350px;;
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
          <div class=""><form action=""><input type="text" name="buscarproductos"value="" placeholder="Buscar"></input></form></div>
        </div>
        <div class="col-lg-2"><button class="btn btn--claro btn--md">Bsucar</button></div>
        <div class="col-lg-2"><input type="button" name="" value="Agregar" class="btn btn--claro btn--md" onclick="clientes_agregar('popup-box1')"></div>
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
          $sql="SELECT * FROM customers";
          $resultado= mysqli_query($conexion, $sql);
          while($fila= mysqli_fetch_array($resultado)){
          ?>
          <tr class="contenido--tr">
            <td><?php echo $fila[1];?></td>
            <td><?php echo $fila[2];?></td>
            <td><?php echo $fila[3];?></td>
            <td><?php echo $fila[4];?></td>
            <td><a href="#" class="btnlk btnlk--mediano btnlk--rojo fa fa-trash-o fa-lg"></a></td>
          </tr>
          <?php }?>
        </table>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
<!--_Inicio Popup-->
<div class="popup_posicionar" id="popup-box1">
  <div class="popup-centar">
    <div class="popup-container">
      <div class="popup-header">
          <br>
        <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;">AGREGAR CLIENTES</p>
      </div>
      <div class="popup-body">
      <form class="" action="" method="post">
      <table border="0" align="center">
      <tr>
        <td>Nombre</td>
        <td><input type="text" name="nombre" value=""></td>
        <td></td>
      </tr>
      <tr>
        <td>Contacto</td>
        <td><input type="text" name="contacto" value=""></td>
        <td></td>
      </tr>
      <tr>
        <td>Direccion</td>
        <td><input type="text" name="direccion" value=""></td>
        <td></td>
      </tr>
      <tr>
        <td>Notas</td>
        <td><input type="text" name="nota" value=""></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td><br>
        <input type="submit" name="guardar" value="Guardar cambios" class="btn--claro btnlk btnlk--verde"></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td><br>
            <a href="clientes.php" class="btn--claro btnlk btnlk--rojo">Cancelar</a>
        <td></td>
      </tr>
      </table>
      </form>
      </div>
    </div>
  </div>
</div>
<!--_Fin de popup-->
