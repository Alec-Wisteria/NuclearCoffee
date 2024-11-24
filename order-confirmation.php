<?php
include 'connect.php'; 


session_start();


$user_id = $_SESSION['user_id'];


$order_query = "SELECT * FROM orders WHERE user_id = $user_id ORDER BY created_at DESC LIMIT 1";
$order_result = $conn->query($order_query);
$order = $order_result->fetch_assoc();

$order_items_query = "SELECT p.name, oi.quantity, oi.price 
                       FROM order_items oi
                       JOIN products p ON oi.product_id = p.id
                       WHERE oi.order_id = {$order['id']}";
$order_items_result = $conn->query($order_items_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style-order-confirmation">
</head>
<body>
    <div class="order-confirmation-container">
        <div class="confirmation-header">
            <h1>Order Confirmed!</h1>
            <p>Your order is being processed. Thank you for your purchase!</p>
        </div>

        <div class="order-details">
            <h2>Order Summary</h2>
            <table class="order-table">
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
            <div class="order-total">
                <p><strong>Total Price: ₱<?php echo number_format($order['total_price'], 2); ?></strong></p>
            </div>
        </div>

        <div class="order-actions">
            <a href="home.php" class="btn">Return to Home</a>
            <a href="orders.php" class="btn">View Your Orders</a>
        </div>
    </div>

    <script src="js/script2.js"></script>
</body>
</html>
