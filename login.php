<?php
session_start();
ob_start();

require_once("config/config.php");
include('include/headerLogin.php');
require_once('include/herlFull.php');
?>
<!-- TO do tempalte or unit the head Nehad -->


<?php
$email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';
$password = isset($_POST['password']) ? trim(strip_tags($_POST['password'])) : '';
$password =  sha1($password);
/***************************** Nehad to do  ************************************/
// check if user already logged in then redirect
// Change hash from database and input in Register this wrong
// $hashPass =  '$2y$10$7kIABb6rhiTMO2/Ceq47gu/hJUP13T3aXVEqEfXx8XdBBiyhQlz1K';
$errors = array();

if ($_POST) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $errors[]  = 'You must provide Email and Password';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[]  = 'You must Email input';
    }
    $query = $db->query("SELECT * FROM users WHERE email = '$email' AND  password='$password' ");
    $user = mysqli_fetch_assoc($query);
    $userCount = mysqli_num_rows($query);
    if ($userCount < 1) {
        $errors[]  = 'The email address or password you entered is incorrect';
    }

    if (strlen($password) < 4) {
        $errors[]  = 'You must provide Password more than 4 characters';
    }


    if (!empty($errors)) {
        error_display($errors);
    } else {

        //Log user in page
        $userlog = $user['id'];
        $usermail = $user['email'];

        login($userlog, $usermail);
    }
}
?>
<style>
    body {
        background-image: url('https://karriere.microlab.at/asset/1500/002667/Entwickler.jpg');
        background-size: 100vw 100vh;
        background-attachment: fixed;
    }

    footer{
        display: none;
    }
</style>

<div id="login-form" class="authentication-form">
    <h1 class="text-center fw-bold font-monospace">Login</h1>
    <hr class="log">
    <?php
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p class='text-danger'> $error</p>";
        }
    }
    ?>
    <form action="login.php" method="POST">
        <div class="form-group mb-2">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="<?= $email;  ?>">
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" value="<?= $password;  ?>">
        </div>
        <div class="form-group mb-2 pt-3">
            <input type="submit" value="Login" class="btn btn-info" style="padding:10px 30px;border-radius:10px ">
        </div>
    </form>
    <div class="d-flex justify-content-between mt-3">
        <p><a href="register.php">Visit Register</a></p>
        <p><a href="index.php">Visit Site</a></p>
    </div>
</div>

<?php
include('include/footer.php');
ob_end_flush();
?>