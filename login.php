<?php
session_start();
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE phone=?");
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Wrong password.";
        }
    } else {
        echo "User not found.";
    }
}
?>