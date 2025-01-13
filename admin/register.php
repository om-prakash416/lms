<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start session and include necessary files
session_start();

// Database connection
$host = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'lms';

$connection = new mysqli($host, $dbUser, $dbPass, $dbName);

// Check for database connection error
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Function to display messages
function message($msg, $type = 'success') {
    echo "<div class='alert alert-$type' role='alert'>$msg</div>";
}

$msg = '';  // Default message

// Check if the form is submitted
if (isset($_POST['btnRegister'])) {
    // Get form input data
    $name = trim($_POST['user_name']);
    $email = trim($_POST['user_email']);
    $password = trim($_POST['user_pass']);
    $hashedPassword = sha1($password); // Hash the password

    // Validate input
    if (empty($name) || empty($email) || empty($password)) {
        $msg = "Please fill in all fields.";
    } else {
        // Check if the email already exists
        $query = "SELECT * FROM tblusers WHERE UEMAIL = '$email'";
        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            $msg = "This email is already registered.";
        } else {
            // Insert the new user into the database
            $sql = "INSERT INTO tblusers (NAME, UEMAIL, PASS, TYPE) VALUES ('$name', '$email', '$hashedPassword', 'User')";
            if ($connection->query($sql) === TRUE) {
                $msg = "Registration successful! You can now log in.";
                // Redirect to the login page after success
                header("Location: login.php");
                exit();
            } else {
                $msg = "Error: " . $connection->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin-top: 50px;
        }

        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            padding: 10px;
            font-size: 16px;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            font-size: 16px;
            padding: 12px;
            border-radius: 5px;
            width: 100%;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .text-center {
            margin-top: 15px;
        }

        .text-center a {
            color: #007bff;
        }

        .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Register to Continue</h2>
            <!-- Display message -->
            <p><?php echo isset($msg) ? $msg : ''; ?></p>

            <!-- Registration Form -->
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" name="user_name" class="form-control" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="user_email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="user_pass" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" name="btnRegister" class="btn-custom">Register</button>
            </form>

            <div class="text-center">
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
// Close the database connection
$connection->close();
?>
