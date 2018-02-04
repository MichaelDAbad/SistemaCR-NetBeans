<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css\estilos.css">
  <link rel="stylesheet" href="css\grid.css">
  <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="cabecera">
      <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="col-lg-2 col-md-2 col-sm-2">
          <div class="cabecera__nombresistema">
           SistemNet
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="cabecera__iconocentro">
            <i class="fa fa-free-code-camp fa-2x" aria-hidden="true"></i>
          </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1">
          <div class="cabecera__nombreusuario">
           <?php session_start(); echo $_SESSION["access"]; ?>
          </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1">
          <div class="">
           <img id="cabecera_usuario"src="fuentes\mr.jpg" alt="usuario">
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2">
            <div class="">
                <a href="logout.php"> <button class="btn btn--claro">cerrar</button></a> 
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
    </div>
    <!----------------------------------------------------------------------------->
