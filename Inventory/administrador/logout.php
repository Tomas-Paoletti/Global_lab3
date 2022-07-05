<?php 
session_start();
session_unset();
session_destroy();

header('location: http://localhost/Facultad/Global_lab3/Home/home.html')
?>