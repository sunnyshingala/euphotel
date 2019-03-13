<?php
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_DATABASE', 'euphotel');
 
// $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$servername = "localhost";
$username = "tpotsco_euphotel";
$password = "S5yusXQh7zkyhRPb";
$dbname = "tpotsco_euphotel";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["submit"]))
{
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $phone = $_POST["phone"];
    $location = $_POST["location"];
}
    $firstname = mysqli_real_escape_string($db, $firstname);
    $lastname = mysqli_real_escape_string($db, $lastname);
    $email = mysqli_real_escape_string($db, $email);
    $password = mysqli_real_escape_string($db, $password);
    $password = md5($password);
    $confirmpassword = mysqli_real_escape_string($db, $confirmpassword);
    $confirmpassword = md5($confirmpassword);
    $phone = mysqli_real_escape_string($db, $phone);
    $location = mysqli_real_escape_string($db, $location);

    $sql = "SELECT email FROM registration WHERE email='$email'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $encrypt_password=md5($password);
    if(mysqli_num_rows($result) == 1)
    {
        echo "Sorry...This email already exist..";
    }
    else
    {
        $query = mysqli_query($db, "INSERT INTO registration (firstname, lastname, email, password, confirmpassword, phone, location)VALUES ('$firstname','$lastname', '$email', '$password','$confirmpassword','$phone','$location')");    
        $encrypt_password=md5($password);
        if($query)
        {
           // header('Location: login.php');
            echo "Thank You! you are now registered.";
        }
    }

?>

