<?php

$servername = "localhost";
$username_DB = "root";
$password_DB = "";
$database = "gezondheidsmeter";

// Create connection
$conn = new mysqli($servername, $username_DB, $password_DB , $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>