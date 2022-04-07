<?php

// Script to connect to the database
// $servername = "0.0.0.0:3306";
$servername = "localhost";
$username= "root";
// $password = "root";
$password = "";
$database = "neubsscdb";

$con = mysqli_connect($servername, $username, $password, $database);

?>

