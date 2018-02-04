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
        <div class="col-lg-4"></div>
        <div class="col-lg-3">
          <form action=""><input type="text" name="buscarproductos"value="" placeholder="fecha de inicio"></input></form>
        </div>
        <div class="col-lg-3">
          <form action=""><input type="text" name="buscarproductos"value="" placeholder="Fecha final"></input></form>
        </div>
        <div class="col-lg-2"><button class="btn btn--claro btn--md">Buscar</button></div>
      </div>
      <div class="col-lg-2"></div>
    </div>
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
          <tr class="contenido--tr">
            <td>fecha</td>
            <td>clien</td>
            <td>pro ven</td>
            <td>Cantidad vend</td>
            <td>mont pag</td>
            <td>gananc</td>
          </tr>
          <tr class="contenido--tr">
            <td colspan="4">Total de ingresos</td>
            <td>ventas</td>
            <td>ganancias</td>
          </tr>
          <tr class="contenido--tr">
            <td colspan="4">Total de ingresos</td>
            <td>262$</td>
            <td>12$</td>
          </tr>
        </table>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
