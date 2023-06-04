<?php
// Start the session
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "Synkova574574";
$dbname = "meowgle";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="shortcut icon" href="./img/CatWiki_logo.png" type="image/x-icon">
    <title>Meowgle</title>
</head>

<body>
    <nav class="navbar container  is-max-desktop" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
                <img src="./img/CatWiki_logo.png" alt="CatWiki logo">
                <p class="title pl-2">Meowgle</p>
            </a>
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
    </nav>

    <div class="container mt-4 p-4 is-max-desktop">
        <form action="signup.php" method="post">
            <div class="field">
                <label class="label">First Name</label>
                <div class="control">
                    <input class="input" type="text" name="first_name" placeholder="Enter Your First Name">
                </div>
            </div>

            <div class="field">
                <label class="label">Last Name</label>
                <div class="control">
                    <input class="input" type="text" name="last_name" placeholder="Enter Your Last Name">
                </div>
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" type="email" name="email" placeholder="Enter Your Email">
                </div>
            </div>

            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input class="input" type="password" name="password" placeholder="Enter Your Password">
                </div>

                <?php
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Process the signup form
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $first_name = $_POST["first_name"];
                    $last_name = $_POST["last_name"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];

                    // Validate input

                    // Hash the password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    // Check if the email is already registered
                    $sql = "SELECT * FROM user WHERE email = '$email'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Email already exists
                        echo "This email is already registered. Please use a different email.";
                    } else {
                        // Email is available, insert the new user into the database
                        $sql = "INSERT INTO user (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$hashedPassword')";

                        if ($conn->query($sql) === TRUE) {
                            // Signup successful
                            header("Location: login.php");
                        } else {
                            // Error occurred during signup
                            echo "Error: " . $conn->error;
                        }
                    }
                }

                $conn->close();
                ?>

            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link">Submit</button>
                </div>
                <div class="control">
                    <a href="login.php" class="button is-link is-light">Log In</a>
                </div>
            </div>
        </form>

    </div>
    </div>

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