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

$db = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$db) {
die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["submit"]))
{
    $name =  $_POST["name"];
    $email =  $_POST["email"];
    $password =  $_POST["password"];
    $contact = $_POST["contact"];
    $altercontact = $_POST["altercontact"];
    $city = $_POST["city"];
    $dob = $_POST["dob"];
    $education = $_POST["education"];
    $role = $_POST["role"];
}


// echo $name.$email.$password.$contact.$altercontact.$city.$dob.$role;
    $name = mysqli_real_escape_string($db, $name);
    $email = mysqli_real_escape_string($db, $email);
    $password = mysqli_real_escape_string($db, $password);
    $password = md5($password);
    $contact = mysqli_real_escape_string($db, $contact);
    $altercontact = mysqli_real_escape_string($db, $altercontact);
    $city = mysqli_real_escape_string($db, $city);
    $dob = mysqli_real_escape_string($db, $dob);
    $education = mysqli_real_escape_string($db, $education);
    $role = mysqli_real_escape_string($db, $role);

    $sql = "SELECT email FROM users WHERE email='$email'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  
    if(mysqli_num_rows($result) == 1)
    {
        echo "Sorry...This email already exist..";
    }
    else
    {
        $query = mysqli_query($db, "INSERT INTO users (name, email, password, contact_no, city, dob, education, alternate_contact_no, role_id)VALUES ('$name', '$email', '$password','$contact','$city','$dob','$education','$altercontact','$role')");    
        echo "Inserted ???";
        if($query)
        {
            header('Location: ../index.php');
            echo "Thank You! you are now registered.";
        }
    }

?>

