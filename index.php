<?php
include_once('includes/guest.php');
 ?>
<html>

<head>
    <title>Login Page </title>
    <link href="css/login.css" rel="stylesheet">
</head>

<body>
    <div class="mainlogo">
        <img src="/img/euphotel.png" alt="logo">
    </div>
    <div class="container">
        <div class="logo">Sign in</div>
        <div class="login-item">
            <form action="loginserv.php" method="post" class="form form-login">
                <div class="form-field">
                    <label class="user" for="user"><span class="hidden">Username</span></label>
                    <input id="email" type="text" name="email" class="form-input" placeholder="Username" required>
                </div>
                <div class="form-field">
                    <label class="lock" for="password"><span class="hidden">Password</span></label>
                    <input id="password" name="pass" type="password" class="form-input" placeholder="Password" required>
                </div>
                <div class="form-field">
                    <input type="submit" value="Log in" name="submit">
                </div>
                <div class="form-field">
                    <span class="reg"><b>Not registered?</b> <a href="registration.php">Create an account</a></span>
                </div>
            </form>
        </div>
    </div>
</body>

</html>