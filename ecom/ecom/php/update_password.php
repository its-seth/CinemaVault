<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $token = trim($_POST['token']);
    $password = trim($_POST['password']);
    $password_confirm = trim($_POST['password_confirm']);

    if (empty($email) || empty($token) || empty($password) || empty($password_confirm)) {
        die('Please fill all fields.');
    }

    if ($password !== $password_confirm) {
        die('Passwords do not match.');
    }

    try {
        $sql = "SELECT id, reset_token, reset_token_expiry FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            die('Invalid email address.');
        }

        $token_hash_from_db = $user['reset_token'];
        if (!hash_equals($token_hash_from_db, hash('sha256', $token))) {
            die('Invalid token.');
        }

        $expiry_time = strtotime($user['reset_token_expiry']);
        if (time() > $expiry_time) {
            die('Token has expired.');
        }

        $new_password_hash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "UPDATE users SET password = ?, reset_token = NULL, reset_token_expiry = NULL WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$new_password_hash, $email]);
        
        header("Location: ../login.html?reset=success");
        exit();

    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}
?> 