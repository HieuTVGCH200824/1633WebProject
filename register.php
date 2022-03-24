<?php
require_once('./header.php');
require_once('./dbconnect.php');
require_once('./function.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    loginUser($mysqli, $username, $password);
}

if (isset($_POST['register'])) {
    $fullname = $_POST['R_fullname'];
    $email = $_POST['R_email'];
    $username = $_POST['R_username'];
    $password = $_POST['R_password'];
    $rpassword = $_POST['R_repeatPassword'];
    if (invalidEmail($email) !== false) {
        header("location:./register.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($password, $rpassword) !== false) {
        header("location:./register.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($mysqli, $username, $email) !== false) {
        header("location:./register.php?error=uidexist");
        exit();
    }
    createUser($mysqli, $fullname, $email, $username, $password);
}

?>

<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" name="login" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <form id="login" class="input-group" method="POST">
                <input type="text" class="input-field" name="username" placeholder="Username" required>
                <input type="password" class="input-field" name="password" placeholder="Password" required>
                <button type="submit" name="login" class="submit-btn">Log in</button>
            </form>
            <form id="register" class="input-group" method="POST">
                <input type="text" class="input-field" name="R_fullname" placeholder="Full name" required>
                <input type="email" class="input-field" name="R_email" placeholder="Email" required>
                <input type="text" class="input-field" name="R_username" placeholder="Username" required>
                <input type="password" class="input-field" name="R_password" placeholder="Password" required>
                <input type="password" class="input-field" name="R_repeatPassword" placeholder="Repeat your password" required>
                <button type="submit" name="register" class="submit-btn">Register</button>
            </form>
        </div>
    </div>
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'invalidemail') {
            echo '<script>alert(" Invalid email format !");</script>';
        } else if ($_GET['error'] == 'passwordsdontmatch') {
            echo '<script>alert(" Passwords do not match!");</script>';
        } else if ($_GET['error'] == 'uidexist') {
            echo '<script>alert(" Username already taken !");</script>';
        } else if ($_GET['error'] == 'statementfailed') {
            echo '<script>alert(" Something went wrong, please try again!");</script>';
        } else if ($_GET['error'] == 'usernotexists') {
            echo '<script>alert(" User does not exist!");</script>';
        } else if ($_GET['error'] == 'wrongpassword') {
            echo '<script>alert(" Wrong password!");</script>';
        }
    }
    ?>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>
</body>