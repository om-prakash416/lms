<?php
require 'C:\xampp\htdocs\caiwl\include\db_connection.php';

$query = "SELECT * FROM courses";
$result = mysqli_query($conn, $query);

while ($course = mysqli_fetch_assoc($result)) {
    echo "<div class='course-card'>
            <img src='uploads/{$course['image']}' alt='Course Image' class='course-image'>
            <h3>{$course['title']}</h3>
            <p>\${$course['price']}</p>
            <a href='view_course.php?id={$course['id']}' class='course-btn'>View</a>
            <a href='edit_course.php?id={$course['id']}' class='course-btn'>Edit</a>
            <a href='delete_course.php?id={$course['id']}' class='course-btn'>Delete</a>
          </div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* CSS for the course cards */
.course-card {
    width: 250px;
    padding: 20px;
    margin: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    background-color: #f9f9f9;
    transition: transform 0.3s ease;
}

.course-card:hover {
    transform: translateY(-5px);
}

/* Styling for the course image */
.course-image {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 15px;
}

/* Styling for course title and price */
.course-card h3 {
    font-size: 1.2em;
    color: #333;
    margin-bottom: 10px;
}

.course-card p {
    font-size: 1em;
    color: #ff5722;
    margin-bottom: 15px;
}

/* Styling for course buttons */
.course-btn {
    display: inline-block;
    padding: 10px 20px;
    margin: 5px;
    color: white;
    background-color: #007bff;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.course-btn:hover {
    background-color: #0056b3;
}

/* Style for course card container (optional) */
.course-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

  </style>
</head>
<body>
<div class="course-container">
    <?php
    require 'C:\xampp\htdocs\caiwl\include\db_connection.php';

    $query = "SELECT * FROM courses";
    $result = mysqli_query($conn, $query);

    while ($course = mysqli_fetch_assoc($result)) {
        echo "<div class='course-card'>
                <img src='uploads/{$course['image']}' alt='Course Image' class='course-image'>
                <h3>{$course['title']}</h3>
                <p>\${$course['price']}</p>
                <a href='view_course.php?id={$course['id']}' class='course-btn'>View</a>
                <a href='edit_course.php?id={$course['id']}' class='course-btn'>Edit</a>
                <a href='delete_course.php?id={$course['id']}' class='course-btn'>Delete</a>
              </div>";
    }
    ?>
</div>

</body>
</html>