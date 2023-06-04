<?php
// Start the session
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "Synkova574574";
$dbname = "meowgle";

// Check if the user is already logged in
if (isset($_SESSION["email"])) {
    header("Location: main.php");
    exit();
}

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
    </nav>

    <div class="container mt-4 p-4 is-max-desktop">
        <form action="login.php" method="post">
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

                // Process the login form
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $email = $_POST["email"];
                    $password = $_POST["password"];

                    // Validate input

                    // Hash the password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    // Retrieve the user's hashed password from the database
                    $sql = "SELECT password FROM user WHERE email = '$email'";
                    $result = $conn->query($sql);

                    if ($result->num_rows == 1) {
                        $row = $result->fetch_assoc();
                        $storedPassword = $row["password"];

                        // Verify the password
                        if (password_verify($password, $storedPassword)) {
                            // Password is correct, create a session
                            $_SESSION["email"] = $email;

                            header("Location: main.php");
                            exit();
                        } else {
                            // Password is incorrect
                            echo "Invalid email or password.";
                        }
                    } else {
                        // User not found
                        echo "Invalid email or password.";
                    }
                }

                $conn->close();
                ?>
            </div>



            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link">Log In</button>
                </div>
                <div class="control">
                    <a href="../index.php" class="button is-link is-light">Cancel</a>
                </div>
            </div>
            <p class="m-4">
                Don't have an account yet? <a href="signup.php">Sign up</a>
            </p>
        </form>
    </div>



    <footer class="footer">
        <divas class="content has-text-centered">
            <p>
                <strong>Meowgle</strong> - Your ultimate destination for all things cat-related.<br>
                Created by <a href="https://github.com/OndrejKulhavy">Ondřej Kulhavý</a> in 2023.
            </p>
        </divas>
    </footer>

</body>

</html>