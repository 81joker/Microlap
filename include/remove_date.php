<?php
require('../config/config.php');


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['rowid'])) {
  $result_message = array('success'=>false, 'message'=>'', 'deleted'=>0);

  $rid = test_input($_POST['rowid']);
  $sql = "DELETE FROM `Kalender` WHERE id='$rid'";
  if ($db->query($sql) === TRUE) {
    $result_message['success'] = true;
    $result_message['message'] = "successfully Deleted Date";
    $result_message['deleted'] = $rid;
  };
  mysqli_close($db);
  print_r(json_encode($result_message));
};
/*
$sql = "INSERT INTO `Kalender`( `description`, `erinnerung`, `datum`, `dattag`, `datyear`, `fulldate`)
	VALUES ('$description','$dateernneurng', '$datemonat', '$datetag', '$dateyear', '$fulldate')";
if ($db->query($sql) === TRUE) {
    $result_message['success'] = true;
    $result_message['message'] = "data inserted: " .  $db->insert_id;
} else {
    $result_message['success'] = false;
    $result_message['message'] = "failed";

}
*/
