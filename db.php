<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "color_game";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>