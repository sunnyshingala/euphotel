<?php

include_once('../session.php');
include_once('../constants.php');
include_once('../database.php');

    $post = $_POST;
    $auditTrailQuery = "SELECT at.id, at.data_id, at.message, at.action_by, at.created_at, at.type, u.name as user_name FROM audit_trail as at, users as u WHERE at.action_by = u.id AND at.data_id = " . $post['data_id'];
    if ($post['type'] > 0) {
        $auditTrailQuery = "SELECT at.id, at.data_id, at.message, at.action_by, at.created_at, at.type, u.name as user_name FROM audit_trail as at, users as u WHERE at.action_by = u.id AND at.data_id = " . $post['data_id'] . " AND at.type = " . $post['type'];
    } 
  $auditTrailResult = mysqli_query($connection, $auditTrailQuery);
  $response = '';
  if (mysqli_num_rows($auditTrailResult) > 0) {
    while ($auditTrail = mysqli_fetch_assoc($auditTrailResult)) { 
        $response .= '<li class="w3-bar">';
        $response .= '<div class="w3-bar-item">';
        $response .= '<span class="w3-large">' . ucfirst($auditTrail['user_name']) . '</span><br>';
        $response .= '<span>' . date('d F Y, H:i', strtotime($auditTrail['created_at'])) . '</span>';
            if ($auditTrail['type'] == 3) {
                $response .= '<p>Total Time Spent: '  . gmdate('H:i:s', $auditTrail['message']) . ' hours </p>';
            } else {
                $response .= '<p>' . $auditTrail['message'] . '</p>';
            }
            $response .= '</div>';
            $response .= '</li>';
    }
  }
  echo $response;
  ?>