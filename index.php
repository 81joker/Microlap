
<?php
$current_url = $_SERVER['REQUEST_URI'];
if ($current_url == "/Microlap/") {
    header("Location: /microlap/homepage.php");
    exit();
} else {
    header("Location: /microlap/homepage.php");
    // header("Location: /microlap/menuüpunkt1.php");
    exit();
}
?>

