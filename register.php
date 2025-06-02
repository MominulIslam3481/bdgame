<?php
require 'db.php';
$msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $ref = $_POST['referral'] ?? '';
    $ref_bonus = $ref ? 20 : 0;
    $check = $conn->prepare("SELECT * FROM users WHERE phone=?");
    $check->bind_param("s", $phone);
    $check->execute();
    $result = $check->get_result();
    if ($result->num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO users (phone, password, balance, referral_code, referred_by) VALUES (?, ?, ?, ?, ?)");
        $my_ref_code = substr(md5(uniqid()), 0, 6);
        $stmt->bind_param("ssiss", $phone, $password, $ref_bonus, $my_ref_code, $ref);
        $stmt->execute();
        header("Location: index.php");
        exit();
    } else {
        $msg = "Phone already exists!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <h2>Register</h2>
    <form method="POST">
        <input type="text" name="phone" placeholder="Phone Number" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="text" name="referral" placeholder="Referral Code (Optional)"><br>
        <button type="submit">Register</button>
    </form>
    <p style="color:red;"><?= $msg ?></p>
    <p>Already have an account? <a href="index.php">Login</a></p>
</div>
</body>
</html>