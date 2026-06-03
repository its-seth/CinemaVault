<?php
$servername = "localhost";
$username = "root"; // Default WAMP username is root
$password = ""; // Default WAMP password is empty
$dbname = "ecom"; // You can name your database ecom

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?> 