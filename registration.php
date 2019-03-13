<?php
include_once('includes/database.php');  
$result = mysqli_query($connection, "SELECT * FROM roles where id > 1 ORDER BY name ASC");
?>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="mainlogo">
        <img src="euphotel.png" alt="logo">
    </div>
    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="index.php" class="navbar-right"> Back To Login</a>
    </div>
    <div class="register">
        <h1>Register</h1>
    </div>
    <br>
    <div class="container">
        <form action="reginsert.php" method="post">
            <ul class="flex-outer">
                <li>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your full name here" required>
                </li>
                <li>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email here" required>
                </li>
                <li>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password here"
                        required>
                </li>
                <li>
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" id="confirmpassword" name="confirmpassword"
                        placeholder="Enter your confirm password here" required>
                </li>
                <li>
                    <label for="contact">Contact No</label>
                    <input type="text" id="contact" placeholder="Enter your contact number here" name="contact"
                        required>
                </li>
                <li>
                    <label for="alternatecontact">Alternate Contact No</label>
                    <input type="text" id="altercontact" placeholder="Enter your another contact number here"
                        name="altercontact" required>
                </li>
                <li>
                    <label for="city">City</label>
                    <select name="city" class="dropdown" required>
                        <option value="0">Select</option>
                        <option value="surat">Surat</option>
                        <option value="Mumbai">Mumbai</option>
                        <option value="Ahemdabad">Ahemdabad</option>
                        <option value="Delhi">Delhi</option>
                    </select>
                </li>
                <li>
                    <label for="dob">BirthDate</label>
                    <input type="date" name="dob" id="dob" required>
                </li>
                <li>
                    <label for="education">Education</label>
                    <select name="education" class="dropdown" required>
                        <option value="0">Select</option>
                        <option value="ssc">SSC-10th</option>
                        <option value="hsc">HSC-12TH</option>
                        <option value="graduation">Graduation </option>
                        <option value="postgraduation">Post Graduation</option>
                        <option value="other">Other</option>
                    </select>
                </li>
                <li>
                    <label for="role">Role</label>
                    <select name="role" class="dropdown" required>
                        <option value="0"> Select Role</option>
                        <?php 
                while($row = mysqli_fetch_assoc($result)){
                  echo "<option value='". $row['id'] ."'>" .$row['name'] ."</option>" ;
                }
              ?>
                    </select>
                </li>
                <li>
                    <button type="submit" name="submit" id="submit">Submit</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>
<script>
var password = document.getElementById("password"),
    confirmpassword = document.getElementById("confirmpassword");

function validatePassword() {
    if (password.value != confirmpassword.value) {
        confirmpassword.setCustomValidity("Passwords Don't Match");
    } else {
        confirmpassword.setCustomValidity('');
    }
}
password.onchange = validatePassword;
confirmpassword.onkeyup = validatePassword;
</script>