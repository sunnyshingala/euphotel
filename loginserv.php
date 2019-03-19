<?php
include_once('includes/guest.php');
include_once('includes/database.php');
$error = ''; //Variable to Store error message;
if(isset($_POST['submit'])) {
        if(empty($_POST['email']) || empty($_POST['pass'])){
                $error = "Username or Password is Invalid";
                header("Location: index.php");
        }
        else {
                //Define $user and $pass
                $email=$_POST['email'];
                $pass=md5($_POST['pass']);
                //sql query to fetch information of registerd user and finds user match.
                
                $query = "SELECT u.id, u.name, u.email, r.name as role FROM users as u, roles as r WHERE u.role_id = r.id AND u.password= '" . $pass . "' AND u.email = '" . $email . "'";
                
                if ($result = mysqli_query($connection, $query)) {
                        if(mysqli_num_rows($result) > 0){
                                // initiate user's session
                                $_SESSION['is_loggedin'] = true;
                                while($row = mysqli_fetch_assoc($result)){
                                        $_SESSION['user'] = $row;
                                        header("Location: /users/dashboard.php"); // Redirecting to other page
                                        break;
                                }
                        }else{
                                header("Location: index.php");
                        }
                } else {
                        ?>
<input type="hidden" id="error">
<?php
                        header("Location: index.php"); // Redirecting to other page
                }

        }
}
?>