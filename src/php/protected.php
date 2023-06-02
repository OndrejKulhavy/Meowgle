<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    // User is not logged in, redirect to the login page
    header("Location: ../login.html");
    exit();
}

// Display the protected content
echo "Welcome, " . $_SESSION["username"] . "! This is a protected page.";

// You can perform other actions or display additional content based on the user's session
?>
