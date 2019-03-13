<?php
include_once('../includes/database.php'); 
include_once('../includes/constants.php'); 

$viewnumber_time=date("Y-m-d H:i:s");
$sql="INSERT INTO action_trail (type) VALUES ('" . $viewnumber_time . "')";
$result = mysqli_query($connection, $sql);
die($result);
?>