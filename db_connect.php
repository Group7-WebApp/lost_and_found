<?php
$servername = "localhost";
$username = "root";      // Default user for XAMPP
$password = "Group7@php";         
$database = "lost_and_found"; // My database name
$conn = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully!";
?>


