<?php

include_once('../includes/session.php');
include_once('../includes/constants.php');
include_once('../includes/database.php');

$post = $_POST;
$selectQuery = "SELECT data_status FROM mapdatatbl WHERE map_id = " . $post['data_id'];
$selectResult = mysqli_query($connection, $selectQuery);
$currentStatus = 0;
if (mysqli_num_rows($selectResult)) {
    $row = mysqli_fetch_assoc($selectResult);
    $currentStatus = $row['data_status'];
}

$updateQuery = "UPDATE mapdatatbl SET data_status = " . $post['status'] . " WHERE map_id = " . $post['data_id'];
$updateResult = mysqli_query($connection, $updateQuery);

$created_at = date("Y-m-d H:i:s");
$type = 2;
$action_by = $user_data['id'];
$data_id = $post['data_id'];
$statusOld = 'CONTACT_STATUS_' . $currentStatus;
$statusNew = 'CONTACT_STATUS_' . $post['status'];
$message = 'Status changed from ' . constant($statusOld) . ' to ' . constant($statusNew);
if (isset($post['note']) && $post['note'] != '') {
    $type = 1;
    $message = $message . '<br><br>' . $post['note'];
}
$insertQuery = "INSERT into audit_trail (data_id, message, action_by, created_at, type) VALUES (" . $data_id . ", '" . $message . "', " . $action_by . ", '" . $created_at . "', " . $type . ")";
$insertResult = mysqli_query($connection, $insertQuery);

echo 'Contact status was updated successfully';