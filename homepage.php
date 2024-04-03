<?php
session_start();
ob_start();
require_once('config/config.php');
include('include/herlFull.php');

if (!is_logged_in()) {
    login_error_redirect();
}
?>

<?php include('include/header.php') ?>

<?php include('templates/main-page.php'); ?>


<?php include('include/footer.php') ?>