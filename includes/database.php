<?php

// database config
define('DATABASE_HOST', 'localhost');
define('DATABASE_NAME', 'euphotel');
define('DATABASE_USERNAME', 'root');
define('DATABASE_PASSWORD', '');

$connection = mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}