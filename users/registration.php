<?php
$servername = "localhost";
$username = "tpotsco_euphotel";
$password = "S5yusXQh7zkyhRPb";
$dbname = "tpotsco_euphotel";

$db = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$db) {
die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($db, "SELECT * FROM roles where id > 1 ORDER BY name ASC");

// $row = mysqli_num_rows($result);
mysqli_close($db);
?>
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- <link href="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.js"></script>    -->
        <style>
body {
    font: normal 18px/1.5 "Fira Sans", "Helvetica Neue", sans-serif;
    /* background: #3AAFAB; */
    background:white;
    color:black;
    padding: 20px 0;
  }
  
  .container {
    width: 80%;
    max-width: 1200px;
    margin: 0 auto;
    
  }
  
  .container * {
    box-sizing: border-box;
  }
  
  .flex-outer,
  .flex-inner {
    list-style-type: none;
    padding: 0;
  }
  
  .flex-outer {
    max-width: 800px;
    margin: 0 auto;
  }
  
  .flex-outer li,
  .flex-inner {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    
  }
  
  .flex-inner {
    padding: 0 8px;
    justify-content: space-between;  
  }
  
  .flex-outer > li:not(:last-child) {
    margin-bottom: 20px;
  }
  
  .flex-outer li label,
  .flex-outer li p {
    padding: 8px;
    font-weight: 300;
    letter-spacing: .09em;
    text-transform: uppercase;
  }
  
  .flex-outer > li > label,
  .flex-outer li p {
    flex: 1 0 120px;
    max-width: 220px;
  }
  
  .flex-outer > li > label + *,
  .flex-inner {
    flex: 1 0 220px;
  }
  
  .flex-outer li p {
    margin: 0;
  }
  
  .flex-outer li input:not([type='checkbox']),
  .flex-outer li textarea {
    padding: 15px;
    /* border: none; */
  }
  
  .flex-outer li button {
    margin-left: auto;
    padding: 8px 16px;
    border: none;
    background: #002e5a;
    color: #f2f2f2;
    text-transform: uppercase;
    letter-spacing: .09em;
    border-radius: 2px;
  }
  
  .flex-inner li {
    width: 100px;
  }

  .mainlogo {
  display: flex;  
  /* flex-direction: column; */
  justify-content: center; 
  background-color:white;
 /* align-items: center; */
 padding-left:20px; 
}

.register {
    
    text-align: center;
}
.dropdown {
    padding: 15px;
}


 /* / Style the top navigation bar / */
 .navbar { display: flex; background-color: #002e5a; justify-content: flex-start; }

.navbar.mainnavbar {display: flex; background-color: #000000; justify-content: center;}

/* / Style the navigation bar links / */
.navbar a { color: white; padding: 14px 20px; text-decoration: none; text-align: center; }

/* / Change color on hover / */
.navbar a:hover { background-color: #ddd; color: black; }

</style>

</head>

<body>

    <div class="mainlogo">
        <img src="euphotel.png" alt="logo">
      </div>
     <!-- Navigation Bar -->
<div class="navbar">
    <!-- <a href=""><i class="material-icons">home</i></a> -->
    <a href="login.php" class="navbar-right"> Back To Login</a>
    <!-- <a href="#">Registration</a>
    <a href="#">Start calling</a>
    <a href="#">Logout</a> -->
</div>

        <div class="register">
                <h1 >Register</h1>
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
                    <input type="password" id="password" name="password" placeholder="Enter your password here" required>
                  </li>
           
                    <li>
                            <label for="confirmpassword">Confirm Password</label>
                            <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Enter your confirm password here" required>
                          </li>
                    <li>    
              <label for="contact">Contact No</label>
              <input type="text" id="contact" placeholder="Enter your contact number here" name="contact" required>
            </li>
            <li>    
              <label for="alternatecontact">Alternate Contact No</label>
              <input type="text" id="altercontact" placeholder="Enter your another contact number here" name="altercontact" required>
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
      // document.getElementById('submit').onclick = function(){
	    // swal("Thank you!", "You are Register successfully!", "success");
      //   };

        var password = document.getElementById("password")
  , confirmpassword = document.getElementById("confirmpassword");

function validatePassword(){
  if(password.value != confirmpassword.value) {
    confirmpassword.setCustomValidity("Passwords Don't Match");
  } else {
    confirmpassword.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirmpassword.onkeyup = validatePassword;

// function contact(inputtxt)
// {
//   var contact = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
//   if((inputtxt.value.match(contact))
//         {
//       return true;
//         }
//       else
//         {
//         alert("not valid");
//         return false;
//         }
// }
// const Toast = Swal.mixin({
// toast: true,
// position: 'top-end',
// showConfirmButton: false,
// timer: 3000
// });

// Toast.fire({
// type: 'success',
// title: 'Signed in successfully'
// })
</script>
