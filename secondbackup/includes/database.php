<?php

// database config
define('DATABASE_HOST', 'localhost');
define('DATABASE_NAME', 'tpotsco_euphotel');
define('DATABASE_USERNAME', 'tpotsco_euphotel');
define('DATABASE_PASSWORD', 'S5yusXQh7zkyhRPb');

$connection = mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}