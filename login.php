
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <?php
  session_start();
 if(isset($_SESSION["username"])){
    header("location: tablero.php");
    }
  ?>
  <div class="cabecera__inicio">
    <div class="nombre__sis">
      SistemNet
    </div>
  </div>
<style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: cursive;
}
.cabecera__inicio{
  padding: 18px;
  background: #19CF86;
  border-bottom-left-radius: 40px;
  border-bottom-right-radius:20px;
  border-bottom-style:outset;
}
.nombre__sis{
margin-left:26px;
font-size: 26px;

}
input[type=text], input[type=password], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}
input[type=text]{
  background-color: white;
  background-image: url('fuentes/user-1.svg');
  background-position: 1px 1px;
  background-repeat: no-repeat;
  padding-left: 50px;

}
input[type=password]{
  padding-left: 50px;
  background-image: url('fuentes/padlock.svg');
  background-repeat: no-repeat;
}
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  width: 100%;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  margin-top: 7%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width: 300px;
  margin-left: 40%;
}
</style>
</head>
<body>
<div class="container">
    <form action="http://localhost/SistemaCR-NetBeans/login_procesar.php" method="post">
  <div class="row">
    <div class="col-25">
      <label for="fname"></label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="nombre" placeholder="Nombre de usuario">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname"></label>
    </div>
    <div class="col-75">
      <input type="password" id="lname" name="contrasenia" placeholder="Contraseña">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="country"></label>
    </div>
    <div class="col-75">
      <select id="country" name="country">
        <option value="australia">Vendedor</option>
        <option value="canada">Administrador</option>
        <option value="usa">Administrativo V2.0</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
        <?php
        $error="";
        @$error=$_SESSION["error"];?>
      <label for="subject"><?php echo $error;?></label>
    </div>
      <input type="submit" name="button"value="Ingresar">
  </div>
</form>
</div>
</body>
</html>
