<?php
session_start();
require 'C:\xampp\htdocs\lms\include\db_connection.php';

$query = "SELECT * FROM courses";
$result = mysqli_query($conn, $query);

while ($course = mysqli_fetch_assoc($result)) {
    echo "<div class='course-card'>
            <img src='uploads/{$course['image']}' alt='Course Image'>
            <h3>{$course['title']}</h3>
            <p>\${$course['price']}</p>
            <a href='view_course.php?id={$course['id']}'>View Details</a>
            <a href='add_to_cart.php?course_id={$course['id']}'>Add to Cart</a>
          </div>";
}
?>
