<?php
session_start();
include 'connect.php';


if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in first'); window.location.href = 'register-login.php';</script>";
    exit();
}


$user_id = $_SESSION['user_id'];


if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<script>alert('Your cart is empty!'); window.location.href = 'buy-coffee.php';</script>";
    exit();
}


$total_price = 0;
foreach ($_SESSION['cart'] as $product_id => $quantity) {
    $result = $conn->query("SELECT price FROM products WHERE id = $product_id");
    $product = $result->fetch_assoc();
    $total_price += $product['price'] * $quantity;
}


$sql = "INSERT INTO orders (user_id, total_price) VALUES ($user_id, $total_price)";
if ($conn->query($sql) === TRUE) {
    $order_id = $conn->insert_id;
    

    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $result = $conn->query("SELECT price FROM products WHERE id = $product_id");
        $product = $result->fetch_assoc();
        $price = $product['price'];
        
        $sql = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ($order_id, $product_id, $quantity, $price)";
        $conn->query($sql);
    }


    unset($_SESSION['cart']);
    
    echo "<script>alert('Your order has been placed!'); window.location.href = 'order-confirmation.php?id=$order_id';</script>";
} else {
    echo "Error: " . $conn->error;
}
?>
