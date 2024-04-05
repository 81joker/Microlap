<?php
ob_start();
require_once('config/config.php');
include('include/headerLogin.php');
require_once('include/herlFull.php');

// Updated
$name = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : '';
$email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';
$password = isset($_POST['password']) ? trim(strip_tags($_POST['password'])) : '';
$confirm = isset($_POST['confirm']) ? trim(strip_tags($_POST['confirm'])) : '';


if (isset($_POST['signup'])) {
    $errors = array();
    if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm'])) {

        $errors[]  = 'You muss provide Email and Password';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[]  = 'You muss Email input' . $email;
    }
    $query = $db->query("SELECT * FROM users WHERE email = '$email' ");
    $user = mysqli_fetch_assoc($query);

    $userCount = mysqli_num_rows($query);


    if ($userCount == 1) {
        $errors[]  = 'Thats email exists is in our database';
    }

    if (strlen($password) < 4) {
        $errors[]  = 'You muss provide Password mohr 4 ';
    }

    if ($password !== $confirm) {

        $errors[] = "Soory Password ist Not Match";
    }
    $shPassword = sha1($password);

    if (!empty($errors)) {
        error_display($errors);
    } else {

        $sql = "INSERT INTO users (name, email , password)
  VALUES ('$name', '$email', '$shPassword')";

        if ($db->query($sql) === TRUE) {
            echo "New record created successfully";
            header('Location: login.php');
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
        $db->close();
    }
}

?>

<style>
    body {
        background-image: url('https://karriere.microlab.at/asset/1500/002667/Entwickler.jpg');
        background-size: 100vw 100vh;
        background-attachment: fixed;
    }

    footer {
        display: none;
    }
</style>

<div id="register-form" class="authentication-form">
    <h2 class="text-center fw-bold font-monospace">Register</h2>
    <hr class="log">
    <?php
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p class='text-danger'> $error</p>";
        }
    }
    ?>
    <div class="card-body">
        <form maction="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="mb-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <div class="float-right">
                    <input type="checkbox" c onclick="passShow()">Show Password
                </div>
            </div>
            <div class="mb-2">
                <label for="confirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm" name="confirm">
                <div class="float-right">
                    <input type="checkbox" onclick="show()">Show Password
                </div>

            </div>
            <input type="submit" value="signup" name="signup" class="btn btn-info" style="padding:10px 30px;border-radius:10px">
        </form>
    </div>
    <div class="d-flex justify-content-between mt-2">
        <p><a href="login.php">Visit Login</a></p>
        <p><a href="index.php">Visit Site</a></p>
    </div>

</div>
<script type="text/javascript">
    const show = () => {
        var x = document.getElementById('confirm');
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    const passShow = () => {
        var x = document.getElementById('password');

        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<?php
include('include/footer.php');
ob_end_flush();
?>