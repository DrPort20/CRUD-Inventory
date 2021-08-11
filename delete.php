<?php
include_once("connection.php");
 
$id = $_GET['id'];
 
$result = mysqli_query($conn, "DELETE FROM datatrans WHERE id=$id");
 
header("Location:transaction.php");
?>