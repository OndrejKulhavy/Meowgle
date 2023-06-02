<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meowgle";

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
            echo "Sign up successful!";
        } else {
            // Error occurred during signup
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>
