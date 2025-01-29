<?php
// Start session
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Check if an order ID is provided
if (!isset($_GET['id'])) {
    echo "Order ID is missing.";
    exit();
}

$order_id = intval($_GET['id']);

// Connect to the database
$conn = new mysqli("localhost", "root", "", "crimsonplate");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start transaction
$conn->begin_transaction();

try {
    // Delete related rows in the order_items table
    $delete_items_stmt = $conn->prepare("DELETE FROM order_items WHERE order_id = ?");
    $delete_items_stmt->bind_param("i", $order_id);
    $delete_items_stmt->execute();
    $delete_items_stmt->close();

    // Delete the order from the orders table
    $delete_order_stmt = $conn->prepare("DELETE FROM orders WHERE id = ?");
    $delete_order_stmt->bind_param("i", $order_id);
    $delete_order_stmt->execute();
    $delete_order_stmt->close();

    // Commit transaction
    $conn->commit();
    echo "Order deleted successfully.";
    header("Location: admin_dashboard.php");
    exit();
} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    echo "Error deleting order: " . $e->getMessage();
}

$conn->close();
?>
