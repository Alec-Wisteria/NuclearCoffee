<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: register-login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$user_query = "SELECT firstName, lastName, email FROM users WHERE id = ?";
$stmt = $conn->prepare($user_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_result = $stmt->get_result();
$user = $user_result->fetch_assoc();

$order_query = "SELECT id, total_price, status, created_at FROM orders WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($order_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$order_result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link rel="stylesheet" href="css/style-account-settings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<?php session_start(); ?>

<header class="header">
    <div id="menu-btn" class="fas fa-bars"></div>

    <a href="#" class="logo">Nuclear Coffee <i class="fas fa-mug-hot"></i></a>

    <nav class="navbar">
        <a href="home.php" class="navbar-link">Home</a>
        <a href="about.php" class="navbar-link">About</a>
        
        <a href="buy-coffee.php" class="navbar-link">Buy</a>
        <a href="review.php" class="navbar-link">Review</a>
        <a href="account-settings.php" class="navbar-link">Account</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="logout.php" class="navbar-link">Logout</a>
        <?php else: ?>
            <a href="register-login.php" class="navbar-link">Login</a>
        <?php endif; ?>
    </nav>

    <a href="<?php echo isset($_SESSION['user_id']) ? 'logout.php' : 'register-login.php'; ?>" class="btn">
        <?php echo isset($_SESSION['user_id']) ? 'Log Out' : 'Login'; ?>
    </a>
</header>

    <div class="account-container">
        <h1>Account Settings</h1>
        

        <div class="user-info">
            <h2>Account Information</h2>
            <p><strong>First Name:</strong> <?php echo htmlspecialchars($user['firstName']); ?></p>
            <p><strong>Last Name:</strong> <?php echo htmlspecialchars($user['lastName']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        </div>


        <div class="order-history">
            <h2>Order History</h2>
            <?php if ($order_result->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($order = $order_result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['id']); ?></td>
                                <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                                <td><?php echo htmlspecialchars($order['status']); ?></td>
                                <td>₱<?php echo number_format($order['total_price'], 2); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>You have no orders yet.</p>
            <?php endif; ?>
        </div>
        

        <a href="home.php" class="btn">Back to Home</a>
    </div>
</body>
</html>
