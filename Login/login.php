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
$arr=mysqli_fetch_row($query);

$nro = mysqli_num_rows($query);
if($nro == 1){
    if($arr[3]==1){
   $_SESSION['administrador']='login';
    header("location:../Inventory/administrador/index.php");}
    if($arr[3]==2){
        $_SESSION['usuario']='login';
        header("location: http://localhost/Facultad/Global_lab3/Inventory/usuario/index.php");
    }
}else{
    
    echo "<script>alert('Error nombre o usuario incorrecto');
        window.location =  'http://localhost/Facultad/Global_lab3/Login/index.html';  
    </script>";
 //   header("location: http://localhost/Facultad/Global_lab3/Login/index.html");
}
?> 