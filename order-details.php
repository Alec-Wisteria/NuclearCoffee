<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: register-login.php');
    exit();
}

$order_id = $_GET['order_id'] ?? null;
$user_id = $_SESSION['user_id'];

if (!$order_id) {
    echo "Invalid Order ID.";
    exit();
}


$order_query = "SELECT * FROM orders WHERE id = $order_id AND user_id = $user_id";
$order_result = $conn->query($order_query);

if ($order_result->num_rows === 0) {
    echo "Order not found or access denied.";
    exit();
}

$order = $order_result->fetch_assoc();

$order_items_query = "SELECT p.name, oi.quantity, oi.price 
                      FROM order_items oi
                      JOIN products p ON oi.product_id = p.id
                      WHERE oi.order_id = $order_id";
$order_items_result = $conn->query($order_items_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="css/style-view-orders.css">
</head>
<body>
    <div class="order-details-container">
        <h1 class="page-title">Order Details (Order ID: <?php echo $order_id; ?>)</h1>
        <p><strong>Status:</strong> <?php echo htmlspecialchars($order['status']); ?></p>
        <p><strong>Date:</strong> <?php echo htmlspecialchars($order['created_at']); ?></p>

        <h2>Items in this order</h2>
        <table class="order-items-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($item = $order_items_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                        <td>₱<?php echo number_format($item['price'], 2); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <p><strong>Total Price:</strong> ₱<?php echo number_format($order['total_price'], 2); ?></p>
        <a href="orders.php" class="btn">Back to Orders</a>
    </div>
</body>
</html>
