<?php
class User {

    // Check if a user exists by email
    public static function checkUserExists($email) {
        global $mydb;

        $sql = "SELECT * FROM tblusers WHERE UEMAIL = '$email'";
        $mydb->setQuery($sql);
        $result = $mydb->loadSingleResult();

        return $result ? true : false; // Return true if user exists
    }

    // Register a new user
    public static function registerUser($name, $email, $password) {
        global $mydb;

        $sql = "INSERT INTO tblusers (NAME, UEMAIL, PASS, TYPE) VALUES ('$name', '$email', '$password', 'User')";
        $mydb->setQuery($sql);

        return $mydb->executeQuery(); // Return true if query was successful
    }
}
?>
