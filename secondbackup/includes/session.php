<?php

session_start();

if(!isset($_SESSION['is_loggedin']) || $_SESSION['is_loggedin'] != true || !isset($_SESSION['user'])) {
    header("location: ../index.php");
}

$isLoggedIn = $_SESSION['is_loggedin'];
$user_data = $_SESSION['user'];