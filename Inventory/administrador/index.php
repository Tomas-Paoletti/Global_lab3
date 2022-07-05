<?php
session_start();

if(!isset($_SESSION['administrador'])){
  header("location: http://localhost/Facultad/Global_lab3/Login/index.html");
}
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
  $cant_filas= mysqli_num_rows($guardar);
  $articulos_por_pagina=6;
  
  $paginas= ceil( $cant_filas/$articulos_por_pagina);
  
  if(isset($_GET['Producto'])){
    $nombre = $_GET['Producto'];
  }else{
   $nombre= 'ASC';
  }
  if(isset($_GET['idcolumn'])){
    $idcolumn = $_GET['idcolumn'];
  }else{
   $idcolumn= 'id';
  }
  //lo que hacemos en estos 2 if es obtenr las variable spara mas abajo  ordenar la query sql



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
                  <a href="./logout.php"> <button type="button"class="btn btn-lg btn-outline-primary ">Salir</button></a>
                  <a href="insertar.php"> <button class="btn btn-lg btn-outline-success" type="submit">Agregar</button></a>
            </div>
              </div>
            </div>
          </nav>
   

          <div class="titulo">
              <h1>Inventariado de productos</h1>
          </div>

          <div class="table-responsive table-hover table-dark" id="Tabla-productos">
            <br>
            <?php 
              if($nombre=='DESC'){
                   $nombre = 'ASC' ;
              } else if($nombre = 'ASC'){
                $nombre='DESC';// aqui lo que hacemos es ordenar de manera descendente o ascendente segun nos traiga el get
              } ?>
              <table class="table ">
                  <thead class="text-muted table-dark" >
                        <th class="text-center"> <a href="?idcolumn=id&Producto=<?php echo $nombre?>&pagina= <?php echo $_GET['pagina'] ?>">ID <a/></th>
                        <th class="text-center"><a href="?idcolumn=Producto&Producto=<?php echo $nombre?>&pagina=<?php echo $_GET['pagina'] ?>">Nombre Producto<a/></th>
                        <th class="text-center">Descripcion</th>
                        <th class="text-center">Marca</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Opciones</th>
                        
                  </thead>
                  <tbody>
                  <?php
                  if(!$_GET['pagina']){
                    header('location: index.php?pagina=1');
                  }

               
               
                  $iniciar_paginacion = ($_GET['pagina']-1)*$articulos_por_pagina;

                  $query = "SELECT * FROM productos ORDER BY $idcolumn $nombre LIMIT $iniciar_paginacion, $articulos_por_pagina";
                $result = mysqli_query($conn, $query);

                 //while($row =$productos_de_la_pag->fetch_assoc()){ 
               foreach($result as $row):
              
                   ?>
                      <tr>
                        <td class="text-center"> <?php echo $row['id'];?></td>
                        <td class="text-center"> <?php echo $row['Producto'];?></td>
                        <td class="text-center"> <?php echo $row['Descripcion'];?></td>
                        <td class="text-center"> <?php echo $row['Marca'];?></td>
                        <td class="text-center "> <img  width="100px" src="data:image/jpg;base64 ,<?php echo base64_encode($row['Foto']);?> " /></td>
                        <td class="text-center"> <?php echo $row['Precio'];?></td>
                        <td class="text-center"> <?php echo $row['Cantidad'];?></td>
                        <!-- pasamos los datos de esa fila a travez del campo id -->
                        <td class="text-center"> <a href="editar.php?id=<?php echo $row['id']  ?>">Editar-<a href="borrar.php?id=<?php echo $row['id']?> ">Borrar</a></td>
                      </tr>
                      <?php endforeach ?>
                  </tbody>
              </table>

              
              <nav aria-label="Page navigation example " class="paginas">
  <ul class="pagination">
    <li class="page-item <?php echo $_GET['pagina']<$paginas? 'disabled': '' ?>"><a class="page-link" href=" <?php echo 'index.php?pagina='.$_GET['pagina']-1 ?> ">Anterior</a></li>
   <?php for ($i=0; $i < $paginas; $i++):  ?>
    <li class="page-item <?php echo $_GET['pagina']==$i+1  ? 'active' : ''  ?>"> <!--esta linea de codigo php muestra en que pagina estamos -->
      <a class="page-link" href="index.php?pagina=<?php echo $i+1?>"><?php echo $i+1?></a></li>
    <?php endfor ?>
    <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled': '' ?>"><a class="page-link" href="<?php echo 'index.php?pagina='.$_GET['pagina']+1 ?>">Siguiente</a></li>
  </ul>
</nav>
          </div>

    
  </body>
</html>