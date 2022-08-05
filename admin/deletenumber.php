<?php 

require_once "../connection.php";

$id =  $_GET["id"];
    
$sql_query = "DELETE FROM number WHERE id = $id";

mysqli_query($conn , $sql_query); 
header("Location: list-of-number.php");
?>