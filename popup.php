<?php include_once"cabecera.php"; ?>
<?php include_once"navbar.php"; ?>
<style media="screen">

.popup_posicion{
    display:none;
    position: fixed;
    top: 0;
    left: 0;
    background-color: rgba(0,0,0,0.7);
    width: 100%;
    height: 100%;
}

#popup-wrapper {
    width: 500px;
    margin: 70px auto;
    text-align: center;
}
#popup-container {
    background-color: #fff;
    border-radius: 4px;
    text-align: center;
    height: 400px;
}

#popup-head-color3 {
    width: 500px;
    height: 1px;
    color: #FFF;
    background: #4AA02C;
    margin-left: auto;
    margin-right: auto;
    padding: 0px 0px 70px;
}
</style>

  <div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="col-lg-7"></div>
        <div class="col-lg-3">
          <div class=""><form action=""><input type="text" name="buscarproductos"value="" placeholder="Buscar"></input></form></div>
        </div>
        <div class="col-lg-2"><button class="btn btn--claro btn--md">Bsucar</button></div>
      </div>
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
            $sql="SELECT * FROM products";
            $resultado= mysqli_query($conexion, $sql);
            while ($fila= mysqli_fetch_array($resultado)){
            ?>
          <tr class="contenido--tr">
            <td><?php echo $fila['category'];?></td>
            <td><?php echo $fila[2];?></td>
            <td><?php echo $fila['retail'];?></td>
            <td><?php echo $fila['quantity'];?></td>
            <td><?php echo $fila['supplier'];?></td>
            <td><a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')" class="btnlk btnlk--mediano btnlk--verde">Pedir</a></td>
          </tr>
            <?php }?>
        </table>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
  <!--Pedir Popup-->
  <script>
  	function toggle_visibility(id){
  		var e = document.getElementById(id);
  		if(e.style.display=='block')
  			e.style.display = 'none';
  		else
  			e.style.display = 'block';
  		}
  </script>
  <?php
  if(!isset($_SESSION["username"])){
      header("location: login.php");
  }
  ?>

  <!--_Inicio Popup ventas-->
  <div id="popup-box1" class="popup_posicion">
    <div id="popup-wrapper">
    <div id="popup-container">
      <div id="popup-head-color3">
          <p style="text-align:right !important; font-family: 'Courier New', Courier, monospace;font-size:15px;"><a href= "javascript:void(0)" onclick="toggle_visibility('popup-box1')"><font color="#FFF"> X </font></a></p>
          <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Formulario Iniciar Sesión </p>
      </div>
      <form action="login_process.php" method="POST"  width="50px">
      <table border="0" align="center">
      <tr>
      <td>Nombre de Usuario:</td>
      <td align="center"><input type="text" id="txtbox" name="username" placeholder="Usuario" required><br></td>
      </tr>

      <tr>
      <td>Contraseña:</td>
      <td align="center"><input type="password" id="txtbox" name="password" placeholder="contraseña" required><br></td>
      </tr>

      <tr>
      	<td> &nbsp; </td>
      </tr>

      <tr>
      	<td> &nbsp; </td>
      	<td  align="left"><input type="SUBMIT" id="btnnav" value="Iniciar Sesión"></td>
      </tr>

      </table>
      </form>
  </div>
  </div>
  </div>
  <!--_fin popup -->
