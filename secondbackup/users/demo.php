<?php
include_once('../includes/database.php'); 

echo "Connected successfully";
 
$sql = "INSERT INTO registration (firstname, lastname, email, password, confirmpassword, phone, location) VALUES ('hetal', 'jilka', 'HET@some.com','123','123','5445415','surat')";
if (mysqli_query($connection, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>