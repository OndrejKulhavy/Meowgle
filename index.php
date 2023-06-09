<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="shortcut icon" href="./src/img/logo.png" type="image/png">
    <title>Meowgle</title>
</head>

<body>
    <nav class="navbar container  is-max-desktop" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="index.php">
                <img src="./src/img/logo.png" alt="CatWiki logo">
                <p class="title pl-2">Meowgle</p>
            </a>
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item is-active">
                    Home
                </a>

                <a class="navbar-item" href="src/about.php">
                    About
                </a>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-primary" href="/src/login.php">
                            <strong>Log In</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <section class="section container is-max-desktop">
        <div class="is-flex">
            <div class="mr-4">
                <h1 class="title">Welcome to the Meowgle !</h1>
                <p class="subtitle">Are you a feline enthusiast? Look no further! This is your ultimate destination
                    for
                    everything cat-related. Whether you're searching for information about different cat breeds, curious
                    about
                    their behaviors, or simply want to admire adorable cat pictures, you've come to the right place.</p>
            </div>
            <img class="image is-128x128" src="/src/img/ilustration.jpg" alt="Cat Ilustration">
        </div>
        <a class="button is-primary mt-4" href="src/login.php">Get Started</a>
    </section>

    <section class="section container  is-max-desktop">
        <h2 class="title is-4">Explore Cat Breeds</h2>
        <p>Discover our extensive collection of articles covering various cat breeds, from the elegant Siamese to
            the
            majestic Maine Coon. Gain insights into their unique characteristics, temperaments, and care
            requirements.
            Our comprehensive guides are perfect for both new cat owners and seasoned enthusiasts looking to expand
            their knowledge.</p>
    </section>

    <section class="section container  is-max-desktop">
        <h2 class="title is-4">Random Cat Images</h2>
        <p>Feeling lucky? Dive into our random cat image generator, where you can discover and admire stunning
            photographs of cats from around the world. From playful kittens to regal adults, each image is sure to
            bring
            a smile to your face and warm your heart.</p>
    </section>

    <section class="section container  is-max-desktop">
        <h2 class="title is-4">Join Our Community</h2>
        <p>Don't forget to create an account to unlock additional features! As a registered user, you can
            personalize
            your profile, participate in discussions, and even contribute your own cat stories and pictures to our
            growing community.</p>
    </section>

    <section class="section container is-max-desktop">
        <h3 class="title is-5">Start Exploring Now!</h3>
        <p>Join us on this exciting journey into the fascinating world of cats. Let these adorable
            creatures
            captivate
            your heart!</p>
    </section>


    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                <strong>Meowgle</strong> - Your ultimate destination for all things cat-related.<br>
                Created by <a href="https://github.com/OndrejKulhavy">Ondřej Kulhavý</a> in 2023.
            </p>
        </div>
    </footer>
    <script>

    </script>
</body>

</html>