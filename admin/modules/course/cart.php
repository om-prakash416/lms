<?php
session_start();
require 'db_connection.php';

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $course_ids = implode(',', $cart);
    
    $query = "SELECT * FROM courses WHERE id IN ($course_ids)";
    $result = mysqli_query($conn, $query);
    
    while ($course = mysqli_fetch_assoc($result)) {
        echo "<div class='course-card'>
                <img src='uploads/{$course['image']}' alt='Course Image'>
                <h3>{$course['title']}</h3>
                <p>\${$course['price']}</p>
              </div>";
    }
    
    echo "<a href='checkout.php'>Proceed to Checkout</a>";
} else {
    echo "Your cart is empty.";
}
?>
