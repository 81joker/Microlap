<?php
// DB Prams
$db = mysqli_connect('127.0.0.1', 'root', '', 'ch_calendar');
if (mysqli_connect_errno()) {
    echo 'Database connection failed withe follwing errors: ' . mysqli_connect_error();
    die();
}

// check php version
if (version_compare(phpversion(), '5', '>='))
{
      if (session_status() === PHP_SESSION_NONE) {
         session_start();
      };

} else {
     if (session_id() == ''){
        session_start();
     };
};



if (isset($_SESSION['SBUser'])) {
    $userid = $_SESSION['SBUser'];
    $query = $db->query("SELECT * FROM users WHERE id = '$userid' ");
    $userdata = mysqli_fetch_assoc($query);
    $fn = explode(' ', $userdata['name']);


    $firstname = $fn[0];
    $lastname = (count($fn) > 1) ? $fn[1] : '';
};

if (isset($_SESSION['sucess_falsh'])) {
    echo "<div class='bg-success'><p class='text-center text-dark'>" . $_SESSION['sucess_falsh'] . "</p></div>";
    unset($_SESSION['sucess_falsh']);
};

if (isset($_SESSION['error_falsh'])) {
    echo "<div class='bg-danger'><p class='text-center text-white'>" . $_SESSION['error_falsh'] . "</p></div>";
    unset($_SESSION['error_falsh']);
};
