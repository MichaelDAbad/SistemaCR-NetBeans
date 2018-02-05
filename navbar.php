
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <nav class="navbar__nav">
      <ul class="navbar__ul">
        <li class="navbar__li"><a class="enlace navbar__nav_inicio" href="tablero.php">Tablero</a></li>
        <li class="navbar__li"><a class="enlace" href="ventas.php">Ventas</a></li>
        <li class="navbar__li"><a class="enlace" href="productos.php">Productos</a></li>
        <li class="navbar__li"><a class="enlace" href="clientes.php">Clientes</a></li>
        <li class="navbar__li navbar__li"><a class="enlace" href="proveedores.php">Proveedores</a></li>
        <li class="navbar__li"><a class="enlace" href="reportes.php">Reporde de ventas</a></li>
        <li class="navbar__li--fecha" style="color:white"><?php
        date_default_timezone_set('America/Lima');
        echo date('g:ia'); ?></li>
        <li class="navbar__li--fecha" style="color:white"><?php echo date('d/m/Y'); ?></li>

      </ul>
    </nav>
  </div>
</div>
</div>
<br>