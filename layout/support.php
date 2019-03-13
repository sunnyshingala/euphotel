<?php
include_once('../includes/database.php');
include_once('../includes/session.php');
include_once('../includes/constants.php');

$post = $_POST;
$priority = $post['priority'];
$name = $post['name'];
$email = $post['email'];
$message = $post['message'];
$url = $post['url'];

$action_by = $user_data['id'];
$created_at = date("Y-m-d H:i:s");
$insertQuery = "INSERT INTO support_request (priority, name, email, message, url, user_id, created_at) VALUES('" . $priority . "', '" . $name . "', '" . $email . "', '" . $message. "','" . $url. "','" . $action_by. "','" . $created_at. "')";  


$insertResult = mysqli_query($connection, $insertQuery);



?>