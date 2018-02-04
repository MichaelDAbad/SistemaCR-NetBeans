<?php
/*
@$idproducto=$_GET['id'];
require_once './config.php';
if(empty($idproducto)){

}elseif (!empty ($_GET['id'])) {
    $idclientes=$_GET['id'];
    echo $idclientes;
}

 *  */
@$idpro=$_GET['idp'];
@$idcli=$_GET['idc'];
@$idprov=$_GET['idprov'];
require_once './config.php';
if(isset($idpro)){
    $sql="DELETE FROM products WHERE id='$idpro';";
    mysqli_query($conexion, $sql);
    header('location: productos.php');
}else if(isset($idcli)){
    $sql="DELETE FROM customers WHERE id='$idcli';";
    mysqli_query($conexion, $sql);
    header('location: clientes.php');
}else if(isset($idprov)){
    $sql="DELETE FROM supplier WHERE id='$idprov'";
    mysqli_query($conexion, $sql);
    header('location: proveedores.php');
}