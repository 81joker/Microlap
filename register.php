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
    .login-form .avatar {
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -50px;
        width: 95px;
        height: 95px;
        border-radius: 50%;

        background: #70c5c0;

        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .login-form .avatar img {
        padding: 0;
        width: 100%;
        height: 100%;
        z-index: 9;
    }
</style>

<header>

    <h2><span> Registerin</span></h2>

</header>
<main>


    <div class="container ">
        <div class="row main">
            <div class="col-md-6  m-auto calander login-form">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <!-- To do Avatar imag in php  -->
                    <div class="avatar">
                        <img src="https://source.unsplash.com/100x100/?woman,men" alt="Avatar" class="rounded-circle">
                    </div>

                    <div>
                        <?php
                        if (!empty($errors)) {
                            foreach ($errors as $error) {
                                echo "<p class='text-danger'> $error</p>";
                            }
                        }
                        ?>

                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                        <div class="float-right">
                            <input type="checkbox" c onclick="passShow()">Show Password
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="confirm">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm" id="confirm">
                        <div class="float-right">
                            <input type="checkbox" onclick="show()">Show Password
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="signup" name="signup" class="btn btn-info" style="padding:10px 30px;border-radius:10px">
                    </div>
                </form>
                <p class="text-right"><a href="index.php">Visit Home</a></p>
            </div>
            <div class="col-md-3 bg-black"></div>
        </div>
    </div>
</main>

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