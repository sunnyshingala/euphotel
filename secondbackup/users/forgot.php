<html>

<body>
    <form>
        <?php

if(isset($_POST['pass'])){
$pass = $_POST['pass'];
$acode=$_POST['code'];

$con=mysqli_connect("localhost","tpotsco_euphotel","S5yusXQh7zkyhRPb","tpotsco_euphotel");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query = mysqli_query($con,"select * from login where activation_code='$acode'")
or die(mysqli_error($con)); 

if (mysqli_num_rows ($query)==1) 
{
$query3 = mysqli_query($con,"update login set Password='$pass' where activation_code='$acode'")
or die(mysqli_error($con)); 

echo 'Password Changed';
}
else
{
echo 'Wrong CODE';
}
}
?>

        <form action="resetpass.php" method="POST">
            <p>New Password:</p><input type="password" name="pass" />
            <input type="submit" name="submit" value="Signup!" />
            <input type="hidden" name="code" value="<?php echo $_GET['code'];?>" />
        </form>
</body>

</html>