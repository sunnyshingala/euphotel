<?php
$con=mysqli_connect("localhost","root","","euphotel");


// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


// escape variables for security
$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$password = md5($password);
$confirmpassword = mysqli_real_escape_string($con,$_POST['confirmpassword']);
$confirmpassword = md5($confirmpassword);
$phone = mysqli_real_escape_string($con,$_POST['phone']);
$location = mysqli_real_escape_string($con,$_POST['location']);


$sql="INSERT INTO Persons (FirstName, LastName, email, password, confirmpassword, phone, location)
VALUES ('$firstname', '$lastname', '$email','$password','$confirmpassword','$phone','$location')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "insert successfully";

mysqli_close($con);
?>