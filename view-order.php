<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in first'); window.location.href = 'register-login.php';</script>";
    exit();
}

$order_id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM orders WHERE id = $order_id AND user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $order = $result->fetch_assoc();
    echo "<h1>Order Details</h1>";
    echo "<p>Order ID: " . $order['id'] . "</p>";
    echo "<p>Total: PHP " . $order['total_price'] . "</p>";
    echo "<p>Status: " . $order['status'] . "</p>";
    echo "<p>Order Date: " . $order['created_at'] . "</p>";

    $sql_items = "SELECT oi.*, p.name AS product_name FROM order_items oi 
                  JOIN products p ON oi.product_id = p.id 
                  WHERE oi.order_id = $order_id";
    $items_result = $conn->query($sql_items);

    echo "<h2>Items in this Order</h2>";
    while ($item = $items_result->fetch_assoc()) {
        echo "<p>Product: " . $item['product_name'] . ", Quantity: " . $item['quantity'] . ", Price: PHP " . $item['price'] . "</p>";
    }
} else {
    echo "<p>Order not found.</p>";
}
?>
