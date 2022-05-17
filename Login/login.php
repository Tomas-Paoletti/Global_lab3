<?php
$dbhost= "sql10.freemysqlhosting.net";
$dbuser ="sql10491482";
$dbpass ="IIdqIIQD1I";
$dbname = "sql10491482";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    die("no hya conexion: ".mysqli_connect_error());
}

$email= $_POST["email"];
$pass = $_POST["contraseña"];

$query = mysqli_query($conn,"SELECT * FROM Usuarios WHERE mailusuario = '".$email."' and contrasena ='".$pass."'");
$nro = mysqli_num_rows($query);
if($nro == 1){
    echo "bienvenido";
}
?>