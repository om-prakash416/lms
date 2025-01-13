<?php
session_start();
require 'db_connection.php';

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $total_price = 0;
    
    // Calculate total price
    foreach ($cart as $course_id) {
        $query = "SELECT price FROM courses WHERE id = '$course_id'";
        $result = mysqli_query($conn, $query);
        $course = mysqli_fetch_assoc($result);
        $total_price += $course['price'];
    }
    
    // Simulate a payment
    echo "<h2>Total Amount: \$$total_price</h2>";
    echo "<a href='payment_success.php'>Make Payment</a>";
} else {
    echo "Your cart is empty.";
}
?>
