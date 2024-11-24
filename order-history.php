<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in first'); window.location.href = 'register-login.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM orders WHERE user_id = $user_id ORDER BY created_at DESC";
$result = $conn->query($sql);

echo "<h1>Your Order History</h1>";

if ($result->num_rows > 0) {
    while ($order = $result->fetch_assoc()) {
        echo "<div class='order'>
                <p>Order ID: " . $order['id'] . "</p>
                <p>Total: PHP " . $order['total_price'] . "</p>
                <p>Status: " . $order['status'] . "</p>
                <p>Order Date: " . $order['created_at'] . "</p>
                <a href='view-order.php?id=" . $order['id'] . "'>View Details</a>
              </div>";
    }
} else {
    echo "<p>You have no orders yet.</p>";
}
?>
