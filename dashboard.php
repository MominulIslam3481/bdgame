<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
<h2>Welcome, <?= $user['phone'] ?></h2>
<p>Balance: <?= $user['balance'] ?> tk</p>
<a href="logout.php">Logout</a>
</body>
</html>