
<?php
$current_url = $_SERVER['REQUEST_URI'];
// Check if the URL is the homepage
if ($current_url == "/Microlap/") {
    // Redirect to the homepage
    header("Location: /microlap/homepage.php");
    exit();
} else {
    // Redirect to the second page
    header("Location: /microlap/menuüpunkt1.php");
    exit();
}


// include('templates/menuüpunkt.php');

?>

