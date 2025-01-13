<?php
session_start();
if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
    $_SESSION['cart'][] = $course_id;  // Add course to cart
}
header('Location: cart.php');
?>
