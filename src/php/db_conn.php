<?php
$name = "localhost";
$user = "root";
$dbpass = "";
$dbName = "moewgle";

$conn = mysqli_connect($name, $user, $dbpass, $dbName);

if (!$conn) {
    die("Something went wrong");
}

?>