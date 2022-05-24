<?php
$dbhost= "localhost";
$dbuser ="root";
$dbpass ="";
$dbname = "checkinventory";
$conn= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    die("no hay conexion: ".mysqli_connect_error());
}
$consulta= "SELECT * FROM productos";
$guardar = $conn->query($consulta);

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Check Inventory</title>
  </head>
  <body>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../Home/home.html">
                    <img
                      src="../img/logo check inventory.png"
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
                  <button
                  type="button"
                  class="btn btn-lg btn-outline-primary "
                >
                  Salir
                </button>
            </div>
              </div>
            </div>
          </nav>
   

          <div class="titulo">
              <h1>Inventariado de productos</h1>
          </div>

          <div class="table-responsive table-hover table-dark" id="Tabla-productos">
            <br>
              <table class="table">
                  <thead class="text-muted table-dark">
                        <th class="text-center">ID</th>
                        <th class="text-center">Nombre Producto</th>
                        <th class="text-center">Descripcion</th>
                        <th class="text-center">Marca</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Opciones</th>
                  </thead>
                  <tbody>
                    <?php
                    while($row =$guardar->fetch_assoc()){ ?>
                      <tr>
                        <td class="text-center"> <?php echo $row['id'];?></td>
                        <td class="text-center"> <?php echo $row['Producto'];?></td>
                        <td class="text-center"> <?php echo $row['Descripcion'];?></td>
                        <td class="text-center"> <?php echo $row['Marca'];?></td>
                        <td class="text-center"> <?php echo $row['Precio'];?></td>
                        <!-- pasamos los datos de esa fila a travez del campo id -->
                        <td class="text-center"> <a href="editar.php?id=<?php echo $row['id']  ?>">Editar</a>- <a href="#">Borrar</a></td>
                      </tr>
                    <?php } ?>
                  </tbody>
              </table>

          </div>

    
  </body>
</html>