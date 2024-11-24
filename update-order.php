<?php
include 'connect.php'; 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: register-login.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
    $update_query = "UPDATE orders SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param('si', $status, $order_id);

    if ($stmt->execute()) {
        header('Location: admin-orders-management.php');
    } else {
        echo "Error updating order: " . $conn->error;
    }
}
?>
