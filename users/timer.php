<?php

include_once('../includes/session.php');
include_once('../includes/constants.php');
include_once('../includes/database.php');

$post = $_POST;
$end_time= MICROTIME(TRUE);

$start_time = $post['start_time'];
$timer = ($end_time - $start_time);

$type = 3;
$created_at = date("Y-m-d H:i:s");
$action_by = $user_data['id'];
$data_id = $post['data_id'];
$message = $timer;

$on_hold_time = $post['on_hold_time'];

$insertQuery = "INSERT into audit_trail (data_id, message, action_by, created_at, type) VALUES (" . $data_id . ", '" . $message . "', " . $action_by . ", '" . $created_at . "', " . $type . ")";
$insertResult = mysqli_query($connection, $insertQuery);

$insertMapdata = "INSERT into mapdatatbl (on_hold_time) VALUES (" . $on_hold_time . ")";
$MapdataResult = mysqli_query($connection, $insertMapdata);

echo 'Saved Successfully';

?>