<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="shortcut icon" href="#" />
    <title>Wood cases</title>
</head>

<body>
    <header style="background-color:#111">
        <a href="#" class="logo"><img src="images/logo.png">Woodland.</a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="nav">
            <li><a href="/index.php">Home</a></li>
            <li><a href="/collection.php">Collection</a></li>
            <li><a href="/index.php#about">About</a></li>
            <li><a href="/index.php#contact">Contact</a></li>
            <li><a href="/cart.php">My Cart
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                        echo "<span id='cartCount'>($count)</span>";
                    } else {
                        echo "<span id='cartCount'>(0)</span>";
                    } ?></a></li>
            <?php
            if (isset($_SESSION['userid'])) {
                if ($_SESSION['userid'] == 1) {
                    echo '<li><a href="/productManager.php">Product manager</a></li>';
                } else if (($_SESSION['userid'] !== 1)) {
                    echo '<li><a href="/profile.php">Profile</a></li>';
                }
                echo '<li><a href="/logout.php">Logout</a></li>';
            }else{
                echo '<li><a href="/register.php">Register/Login</a></li>';
            }
            ?>
        </ul>
    </header>
    <script type="text/javascript">
        function toggleMenu() {
            const menuToggle = document.querySelector(".menuToggle");
            const nav = document.querySelector(".nav")
            menuToggle.classList.toggle('active');
            nav.classList.toggle('active');
        }
    </script>
</body>

</html>