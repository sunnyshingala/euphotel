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
$created_at = date("Y-m-d H:i:s");
$action_by = $user_data['id'];
$on_hold_time = $post['datetimepicker'];
$updateQuery = "UPDATE mapdatatbl SET data_status = " . $post['status'] . " WHERE map_id = " . $post['data_id'] ;
if($post['status'] == CONTACT_STATUS_LEAD){
    $updateQuery = "UPDATE mapdatatbl SET data_status = " . $post['status'] . ", lead_time = '" . $created_at . "', lead_by = " . $action_by . " WHERE map_id = " . $post['data_id'] ;
}
elseif($post['status'] == CONTACT_STATUS_ON_HOLD){
    $updateQuery = "UPDATE mapdatatbl SET data_status = " . $post['status'] . ", on_hold_time = '" . $on_hold_time . "', on_hold_by = " . $action_by . " WHERE map_id = " . $post['data_id'] ;
}
$updateResult = mysqli_query($connection, $updateQuery);
$type = 2;
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