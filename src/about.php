<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="shortcut icon" href="./img/logo.png" type="image/png">
    <title>Meowgle</title>
</head>

<body>
    <nav class="navbar container  is-max-desktop" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="../index.php">
                <img src="./img/logo.png" alt="CatWiki logo">
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
                <a class="navbar-item" href="../index.php">
                    Home
                </a>

                <a class="navbar-item is-active">
                    About
                </a>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-primary" href="./login.php">
                            Log in
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <section class="section">
        <div class="container content is-max-desktop">
            <h1 class="title">About</h1>
            <p>This website is my final project in the 3rd year of my studies at Secondary Technical School Ječná (SPŠE
                Ječná).</p>
            <h1 class="title is-5">Technologies Used:</h1>
            <ul>
                <li><strong>PHP:</strong> A server-side scripting language used for dynamic web page development.</li>
                <li><strong>jQuery:</strong> A fast, small, and feature-rich JavaScript library for simplifying HTML
                    document traversal
                    and manipulation.</li>
                <li><strong>JavaScript:</strong> A programming language used to add interactivity and behavior to web
                    pages.</li>
                <li><strong>HTML:</strong> The standard markup language used for creating web pages and applications.
                </li>
                <li><strong>Bulma CSS:</strong> A lightweight CSS framework based on Flexbox that helps in building
                    responsive and modern
                    web
                    interfaces.</li>
            </ul>
        </div>
    </section>

    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                <strong>Cat Wiki</strong> - Your ultimate destination for all things cat-related.<br>
                Created by <a href="https://github.com/OndrejKulhavy">Ondřej Kulhavý</a> in 2023.
            </p>
        </div>
    </footer>

</body>

</html>