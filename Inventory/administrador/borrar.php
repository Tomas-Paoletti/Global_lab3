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

//consulta sql para eliminar
$id= $_GET['id'];
 $queryEliminar= "DELETE FROM productos WHERE id = '$id'";
 $elimina = $conn->query($queryEliminar);
 header("location:index.php");
 $conn->close();
?>