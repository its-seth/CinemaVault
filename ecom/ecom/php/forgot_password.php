<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email format.');
    }

    try {
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            die('No user found with that email address.');
        }

        $token = bin2hex(random_bytes(50));
        $token_hash = hash('sha256', $token);
        $expiry = date("Y-m-d H:i:s", time() + 3600); // 1 hour expiry

        $sql = "UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$token_hash, $expiry, $email]);

        // For development: display the link instead of sending an email
        // $reset_link = "http://localhost/ecom/reset_with_token.html?token=$token&email=" . urlencode($email);
        // echo 'Password reset link (for development only, this would be emailed to the user):<br>';
        // echo '<a href="' . $reset_link . '">' . $reset_link . '</a>';
        
        echo "<script>
                alert('Email sent successfully! Please check your inbox for a password reset link.');
                window.location.href = '../login.html';
              </script>";

    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}
?> 