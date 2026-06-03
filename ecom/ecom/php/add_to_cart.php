<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'You must be logged in to add items to the cart.']);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['id'];

    try {
        // Check if the product is already in the cart
        $sql = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_id, $product_id]);

        if ($stmt->rowCount() > 0) {
            // Product already in cart, show alert instead of increasing quantity
            echo json_encode(['success' => false, 'message' => 'This product is already in your cart.']);
        } else {
            // Product not in cart, insert new record
            $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$user_id, $product_id]);
            echo json_encode(['success' => true, 'message' => 'Product added to cart successfully.']);
        }

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
}
?> 