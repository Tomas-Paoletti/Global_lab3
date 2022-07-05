<?php 
session_start();
if(!isset($_SESSION['usuario'])){
  header("location:http://localhost/Facultad/Global_lab3/Login/index.html");
}

$dbhost= "localhost";
$dbuser ="root";
$dbpass ="";
$dbname = "checkinventory";
$conn= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    die("no hay conexion: ".mysqli_connect_error());
}
$condicion="";
//validar formulario para buscar por producto
if(!empty($_POST)){
$valor= $_POST['buscar'];
if(!empty($valor)){
    $condicion= "WHERE Producto LIKE '%$valor%'";
}
}
$consulta= "SELECT * FROM productos $condicion";
$resultado= $conn->query($consulta);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Check Inventory</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../administrador/index.php">
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
                  
              
                <a href="./logout.php"> <button type="button"class="btn btn-lg btn-outline-primary ">Salir</button></a>
            </div>
              </div>
            </div>
          </nav>
   
    <h1 class="titulo">Busqueda de productos</h1>
    <br>
    <br>
    <div class="col-sm-12 col-md-12 col-lg12">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="d-grid gap-2 col-6 mx-auto">
        <input type="text" name="buscar" class="form-control" placeholder="Ingrese el nombre del producto" ><br>
        <input type="submit" class=" btn btn-outline-success btn-lg boton " value="Buscar" name="buscando">
        <br>
    </div>
        </form>
    
    <div class="table-responsive table-hover" id="Tabla-productos">
        <?php if($resultado->num_rows>0){ ?>
              <table class="table ">
                  <thead class="text-muted table-dark">
                        <th class="text-center">ID</th>
                        <th class="text-center">Nombre Producto</th>
                        <th class="text-center">Descripcion</th>
                        <th class="text-center">Marca</th>
                        <th class="text-center">Precio</th>
                     
                  </thead>
                  <tbody>
                    <?php
                    while($row =$resultado->fetch_assoc()){ ?>
                      <tr>
                        <td class="text-center"> <?php echo $row['id'];?></td>
                        <td class="text-center"> <?php echo $row['Producto'];?></td>
                        <td class="text-center"> <?php echo $row['Descripcion'];?></td>
                        <td class="text-center"> <?php echo $row['Marca'];?></td>
                        <td class="text-center"> <?php echo $row['Precio'];?></td>
                       
                      </tr>
                    <?php } ?>
                  </tbody>
              </table>
                <?php }else{ ?>
                     <p class="text-center text-danger"> No se encuentran este producto </p>
                <?php } ?>
          </div>
          </div>
</body>
</html>