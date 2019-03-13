<?php
$servername = "localhost";
$database = "euphotel";
$username = "root";
$password = "";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "INSERT INTO registration (firstname, lastname, email, password, confirmpassword, phone, location) VALUES ('hetal', 'jilka', 'HET@some.com','123','123','5445415','surat')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>