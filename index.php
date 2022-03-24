<?php require_once('./header.php'); ?>
<head>
    <style>
        header{
            background-color: transparent !important;
        }
    </style>
</head>
<body>
    <section class="banner" id="banner">
        <div class="content">
            <h2 class="titleText">Wooden phone case</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo
                re eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a href="/collection.php" class=button>collections</a>
        </div>
    </section>
    <section class="featured" id="featured">
        <div class="title">
            <h2><span class=titleText>C</span>ategories</h2>
        </div>
        <div class="featuredContent">
            <div class="box">
                <div class="categoriesImg">
                    <img src="images/Apple.jpg">
                </div>
                <div class="text">
                    <h3>Apple</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <a href="/collection.php#apple" class=button>Buy Now!</a>
            </div>
            <div class="box">
                <div class="categoriesImg">
                    <img src="images/Android.jpg" />
                </div>
                <div class="text">
                    <h3>Android</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <a href="/collection.php#android" class=button>Buy Now!</a>
            </div>
            <div class="box">
                <div class="categoriesImg">
                    <img src="images/Blank.jpg">
                </div>
                <div class="text">
                    <h3>Custom</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <a href="#contact" class=button>Contact Us</a>
            </div>
        </div>
    </section>
    <section class="about" id="about">
        <div class="title">
            <h2><span class="titleText">A</span>bout Us</h2>
        </div>
        <div class="aboutContent">
            <div class="aboutImg"><img src="images/about.jpg"></div>
            <div class="text">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
            </div>
        </div>
    </section>
    <section class="contact" id="contact">
        <div class="title">
            <h2><span class="titleText">C</span>ontact Us</h2>
        </div>
        <form action="index.php" method="POST" class="contactForm">
            <div class="titleMessange">
                <h3>Send Messsage</h3>
            </div>
            <div class="inputBox" id="name" name="name">
                <input type="text" placeholder="Name">
            </div>
            <div class="inputBox" id="email" name="email">
                <input type="text" placeholder="Email">
            </div>
            <div class="inputBox">
                <textarea placeholder="Message" id="message" name="message"></textarea>
            </div>
            <div class="inputBox">
                <input type="submit" value="Send">
            </div>
        </form>
    </section>
    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            const header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        });

        function toggleMenu() {
            const menuToggle = document.querySelector(".menuToggle");
            const nav = document.querySelector(".nav")
            menuToggle.classList.toggle('active');
            nav.classList.toggle('active');
        }
    </script>
</body>

</html>