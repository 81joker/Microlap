<?php
session_start();
ob_start();

require_once("config/config.php");
include('include/headerAuth.php');
require_once('include/herlFull.php');

$email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';
$password = isset($_POST['password']) ? trim(strip_tags($_POST['password'])) : '';
$password =  sha1($password);
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
            <input type="text" class="form-control" name="email" id="email" value="<?= $email; ?> " placeholder="Geben Sie Ihren Email Bitte">
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Geben Sie Ihren Password Bitte">
        </div>
        <div class="form-group mb-2 pt-3">
            <input type="submit" value="Login" class="btn btn-dark px-4 rounded-2">

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