<?php
$servername = "localhost";
$username = "tpotsco_euphotel";
$password = "S5yusXQh7zkyhRPb";
$dbname = "tpotsco_euphotel";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

date_default_timezone_set('Asia/Kolkata');
$viewnumber_time=date("Y-m-d H:i:s");
// $timer = ($next_call_time - $viewnumber_time) /60;
// $next_call_time =date("i:s".$timer);
$sql="INSERT INTO action_trail (id,) VALUES ('" . $viewnumber_time . "')";
// $sql="INSERT INTO action_trail (created_at,timer) VALUES ('" . $viewnumber_time . "',)";
$result = mysqli_query($conn, $sql);
die($result);
// mysqli_query($sql);

// mysqli_query($sql);
mysqli_close($conn);
// echo " Date stored in table  ";
?>