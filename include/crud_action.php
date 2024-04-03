<?php

require('../config/config.php');


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


// Add Data
if (isset($_POST['dattag']) && isset($_POST['datmonat']) && isset($_POST['datyear']) && isset($_POST['desc']) && isset($_POST['ernnerung'])) {
$result_message = array("success"=>false, "message"=>'', "data"=>array(), "dataneeded"=>array());

$datetag = $_POST['dattag'];
$datemonat = $_POST['datmonat'];
$dateyear = $_POST['datyear'];
$fulldate = $dateyear . '-' . $datemonat . '-' . $datetag . ' ' . '00:00:00';
$description = $_POST['desc'];
$dateernneurng = $_POST['ernnerung'];

// $city = $_POST['city'];

$sql = "INSERT INTO `Kalender`( `description`, `erinnerung`, `datum`, `dattag`, `datyear`, `fulldate`)
	VALUES ('$description','$dateernneurng', '$datemonat', '$datetag', '$dateyear', '$fulldate')";
if ($db->query($sql) === TRUE) {
    $result_message['success'] = true;
    $result_message['message'] = "data inserted: " .  $db->insert_id;
    //sendMail($datetag, $datemonat, $description, $dateernneurng, $fulldate, $_SESSION['uemail']);
    array_push($result_message['dataneeded'], $datetag, $datemonat, $description, $dateernneurng, $fulldate, $_SESSION['uemail']);
} else {
    $result_message['success'] = false;
    $result_message['message'] = "failed";

}

$sql_return = "SELECT * FROM `Kalender` ORDER BY id DESC";
$result_data = mysqli_query($db, $sql_return);
if ($result_data) {
  while($row = mysqli_fetch_assoc($result_data)) {
    $data = array (
    "id"=> $row['id'],
    "day" => $row['dattag'],
    "month" => $row['datum'],
    "year" => $row['datyear'],
    "desc" => $row['description'],
    "erinnerung" => $row['erinnerung']
  );
    array_push($result_message['data'], $data);
  };
}

mysqli_close($db);
print_r(json_encode($result_message));

};



// update
if (isset($_POST['edit_dattag']) && isset($_POST['edit_datmonat']) && isset($_POST['edit_datyear']) && isset($_POST['edit_desc']) && isset($_POST['edit_ernnerung']) && isset($_POST['rowid'])) {

   $result_message1 = array("success"=>false, "message"=>'', "edited"=>"");

   $update_id = intval(test_input($_POST['rowid']));
   $update_day = test_input($_POST['edit_dattag']);
   $update_month = test_input($_POST['edit_datmonat']);
   $update_year = test_input($_POST['edit_datyear']);
   $update_des = test_input($_POST['edit_desc']);
   $update_ernnerung = test_input($_POST['edit_ernnerung']);

   $update_fullyear = $update_year . '-' . $update_month . '-' . $update_day . ' ' . '00:00:00';

   $sql_update = "UPDATE `kalender` SET `description`='$update_des',`erinnerung`='$update_ernnerung',`datum`='$update_month',`dattag`='$update_day',`datyear`='$update_year',`fulldate`='$update_fullyear' WHERE id=$update_id";

   if ($db->query($sql_update) === TRUE) {
      $result_message1['success'] = true;
      $result_message1['message'] = "successfully Edited";
      $result_message1['edited'] = $update_id;
   };

   mysqli_close($db);
   print_r(json_encode($result_message1));
};
