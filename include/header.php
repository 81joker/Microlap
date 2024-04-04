<?php
$basName = basename($_SERVER['PHP_SELF']);
$slug = explode('.', $basName);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Site</title>
    <link rel="stylesheet" href="css/style.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <header>
            <span class="sep"></span>
            <h2 class="logo">logo</h2>
    </header>

    <main>
        <div class="container-md">
            <div class="main">
                <div class="row">
                    <?php /* include('include/nav.php') */ ?>
                    <!-- Nav  -->
                    <div class="nav-main flex justify-content-start">
                        <div class="col-md-3">
                            <ul>
                                <li><a href="homepage.php">Home</a></li>
                                <li><a href="menuüpunkt1.php">Menuüpunkt 1</a></li>
                                <li><a href="logout.php"> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- / Nav  -->
                    <div class="col-lg-8 m-auto">
                        <div class="fetch shadow rounded p-5">
                            <h1><?= ucfirst($slug[0])  ?></h1>