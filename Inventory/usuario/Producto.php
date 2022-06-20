<?php
session_start();


$dbhost= "localhost";
$dbuser ="root";
$dbpass ="";
$dbname = "checkinventory";
$conn= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);



if(!$conn){
    die("no hay conexion: ".mysqli_connect_error());
}
$id= $_REQUEST['id'];
$modificar= "SELECT * FROM productos WHERE id='$id' ";

$m = $conn->query($modificar);
$dato = $m->fetch_array();


if(!isset($_SESSION['usuario'])){
  header("location:../Login/login.html");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Producto</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../Home/home.html">
                    <img
                      src="../../img/logo check inventory.png"
                      alt=""
                      width="100"
                      height="100"
                      class="d-inline-block align-text-center logo-image"
                    />
                    Check Inventory
                  </a>
              
                </div>
              
                <div class="d-flex">
                  
                 <a href="busqueda.php"> <button class="btn btn-lg btn-outline-success" type="submit">Buscar</button></a>
                  <a href="../../Home/home.html"> <button type="button"class="btn btn-lg btn-outline-primary ">Salir</button></a>
                
            </div>
              </div>
            </div>
          </nav>
          <br>
          <br>

          <div class="card text-center ms-10 producto-div" style="width: 18rem;">
  <img src="data:image/jpg;base64 ,<?php echo base64_encode($dato['Foto']);?> " class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Producto: <?php echo $dato['Producto'] ?></h5>
    <p class="card-text"> Descripcion:<?php echo $dato['Descripcion'] ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Marca: <?php echo $dato['Marca'] ?></li>
    <li class="list-group-item">Precio: <?php echo $dato['Precio'] ?></li>
    <li class="list-group-item">Cantidad: <?php echo $dato['Cantidad'] ?></li>
  </ul>
  
</div>

<br>
<br>

<div >
  <a href="./index.php"><button type="button" class="btn volver-boton btn-outline-success">Volver</button></a>
</div>

</body>
</html>