
<?php
$current_url = $_SERVER['REQUEST_URI'];
if ($current_url == "/microlap/index.php") {
    header("Location: /microlap/homepage.php");
    exit();
} else {
    header("Location: /microlap/menuüpunkt1.php");
    exit();
}
?>

