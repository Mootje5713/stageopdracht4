<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "stage4";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo $_SERVER['REQUEST_URI'];

if (!isset($_SESSION['user_id']) && $_SERVER['REQUEST_URI']!='/stageopdracht4/login.php'
&& $_SERVER['REQUEST_URI']!='/stageopdracht4/register.php'
&& $_SERVER['REQUEST_URI']!='/stageopdracht4/addgroup.php'
&& $_SERVER['REQUEST_URI']!='/stageopdracht4/index.php') {
    header("Location: login.php");
}