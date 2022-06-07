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

$email= $_POST["email"];
$pass = $_POST["contraseña"];

$query = mysqli_query($conn,"SELECT * FROM usuario WHERE email = '$email' and password ='$pass'");

$nro = mysqli_num_rows($query);
if($nro == 1){
   $_SESSION['login']='administrador';
    header("location:../Inventory/index.php");
}else{
    
    echo "<script>alert('Hola');
        window.location =  'http://localhost/Facultad/Global_lab3/Login/index.html';  
    </script>";
 //   header("location: http://localhost/Facultad/Global_lab3/Login/index.html");
}
?>