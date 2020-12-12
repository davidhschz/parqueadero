<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbparkinglot";
$Conexion = new mysqli($servername, $username, $password, $dbname);
mysqli_query($Conexion,"SET NAMES 'utf8'");
?>