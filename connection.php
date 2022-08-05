<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "vip_number";

$conn = mysqli_connect($dbhost , $dbuser , $dbpass , $dbname);

if(!isset($conn)){
    echo die("Database connection failed");
}
?>