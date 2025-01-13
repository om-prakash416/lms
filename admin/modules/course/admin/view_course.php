<?php
require 'C:\xampp\htdocs\caiwl\include\db_connection.php';

if (isset($_GET['id'])) {
    $course_id = $_GET['id'];
    $query = "SELECT * FROM courses WHERE id = '$course_id'";
    $result = mysqli_query($conn, $query);
    $course = mysqli_fetch_assoc($result);

    echo "<div class='course-details'>";
    echo "<h1 class='course-title'>{$course['title']}</h1>";
    echo "<div class='course-description'>{$course['description']}</div>";
    echo "<div class='course-media'>";
    echo "<img src='uploads/{$course['image']}' alt='Course Image' class='course-image'>";
    echo "<div class='course-video'>";
    echo "<video src='uploads/{$course['demo_video']}' controls class='course-video-player'></video>";
    echo "</div>";
    if ($course['pdf']) {
        echo "<a href='uploads/{$course['pdf']}' class='download-btn' target='_blank'>Download PDF</a>";
    }
    echo "</div>";
    echo "</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        /* Course Details Container */
.course-details {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
}

/* Title Styling */
.course-title {
    font-size: 2.5em;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

/* Description Styling */
.course-description {
    font-size: 1.1em;
    color: #555;
    line-height: 1.6;
    margin-bottom: 20px;
}

/* Media Section */
.course-media {
    text-align: center;
}

/* Course Image Styling */
.course-image {
    width: 100%;
    max-width: 600px;
    height: auto;
    border-radius: 8px;
    margin-bottom: 20px;
}

/* Video Player Styling */
.course-video-player {
    width: 100%;
    max-width: 600px;
    border-radius: 8px;
    margin-bottom: 20px;
}

/* Download Button Styling */
.download-btn {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 10px;
    color: white;
    background-color: #007bff;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s;
}

.download-btn:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    
</body>
</html>