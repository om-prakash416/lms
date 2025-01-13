<?php
require 'C:\xampp\htdocs\caiwl\include\db_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $demo_video = $_POST['demo_video'];
    
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);
    
    $pdf = null;
    if (isset($_FILES['pdf'])) {
        $pdf = $_FILES['pdf']['name'];
        move_uploaded_file($_FILES['pdf']['tmp_name'], 'uploads/' . $pdf);
    }

    $query = "INSERT INTO courses (title, price, description, image, demo_video, pdf) 
              VALUES ('$title', '$price', '$description', '$image', '$demo_video', '$pdf')";
    
    if (mysqli_query($conn, $query)) {
        echo "Course added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    Title: <input type="text" name="title"><br>
    Price: <input type="text" name="price"><br>
    Description: <textarea name="description"></textarea><br>
    Demo Video URL: <input type="text" name="demo_video"><br>
    Image: <input type="file" name="image"><br>
    PDF: <input type="file" name="pdf"><br>
    <button type="submit">Add Course</button>
</form>
