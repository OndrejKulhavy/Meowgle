<?php
// Start the session
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meowgle";

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

            // Redirect to the protected page
            header("Location: protected.php");
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
