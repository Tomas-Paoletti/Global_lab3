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

if(isset($_POST['modificar'])){
    //extraer los datos del formulario 
//$id= $conn->$_REQUEST['id'];
$nProducto= $conn->real_escape_string($_POST['Producto']);
$descripcion= $conn->real_escape_string($_POST['Descripcion']);
$marca= $conn->real_escape_string($_POST['Marca']);
if($_FILES==0){
  $foto= '../../img/productos-Foto (1).bin';
}else{
$foto=addslashes(file_get_contents($_FILES['Foto']['tmp_name']));
}
$precio= $conn->real_escape_string($_POST['Precio']);
$cantidad= $conn->real_escape_string($_POST['Cantidad']);
//hacer query para modifiacr los datos de la tabla
$actualizaq= "UPDATE productos SET Producto= '$nProducto', Descripcion = '$descripcion', Marca = '$marca', Foto = '$foto',  Precio = '$precio' , Cantidad='$cantidad'  WHERE id = '$id' ";
$actualizar= $conn->query($actualizaq);
header("location:index.php");

}
if(!isset($_SESSION['administrador'])){
  header("location:../Login/login.html");
}
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
                  
                 <a href="insertar.php"> <button class="btn btn-lg btn-outline-success" type="submit">Agregar</button></a>
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
              <h1>Modificar producto</h1>
          </div>

         <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <input type="hidden" name="id" value="<?php echo $dato['id']; ?>">
            <input type="text" name="Producto" value="<?php echo $dato['Producto']?>" class="form-control" placeholder="Nombre del producto" required>
        </div>
        <div class="row">
            <input type="text" name="Descripcion" value="<?php echo $dato['Descripcion']?>" class="form-control" placeholder="Descripcion del producto" required>
        </div>
        <div class="row">
            <input type="text" name="Marca" value="<?php echo $dato['Marca']?>" class="form-control" placeholder="Marca" required>
        </div>
        
        <div class="row">
        <img  width="100px" src="data:image/jpg;base64 ,<?php echo base64_encode($dato['Foto']);?> " />
        
        <input type="file" name="Foto">
        </div>
        <div class="row">
           <input type="number" name="Precio" value="<?php echo $dato['Precio']?>" placeholder="Precio del producto" required>
        </div>
        <div class="row">
        <br>
           <input type="number" name="Cantidad"  placeholder="Cantidad del producto" required>
           
        </div>
        <div class="row">
            <input type="submit" name="modificar" value="modificar" class="btn btn-success " >
        </div>
        
        </form>

    
  </body>
</html>