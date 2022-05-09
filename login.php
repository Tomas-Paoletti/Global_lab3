<?php
$dbhost= "localhost";
$dbuser ="root";
$dbpass ="1qazzaq1";
$dbname = "stock";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    die("no hya conexion: ".mysqli_connect_error());
}

$email= $_POST["email"];
$pass = $_POST["contraseña"];

$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE mailusuario = '".$email."' and contraseña ='".$pass."'");
$nro = mysqli_num_rows($query);
if($nro == 1){
    echo "bienvenido";
}
?>