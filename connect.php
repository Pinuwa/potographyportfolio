<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "photography_db";

$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nameErr = $emailErr = $phoneErr = $messageErr = "";
$name = $email = $phone = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
    
    // Validate and sanitize name
    if (empty($name)) {
        $nameErr = "Name is required";
    } else {
        $name = sanitizeInput($name);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white spaces allowed";
            echo'<script>alert("Only letters and white spaces allowed")</script>';
        }
    }
    
    // Validate and sanitize email
    if (empty($email)) {
        $emailErr = "Email is required";
    } else {
        $email = sanitizeInput($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            echo'<script>alert("Email Invalid")</script>';
        }
    }
    
    // Validate and sanitize phone
    if (empty($phone)) {
        $phoneErr = "Phone is required";
        echo'<script>alert("Phone is required")</script>';
    } else {
        $phone = sanitizeInput($phone);
        // You can add additional validation for phone number format if needed
    }
    
    // Sanitize message
    if (empty($message)) {
        $messageErr = "Message is required";
        echo'<script>alert("Message is required")</script>';
    } else {
        $message = sanitizeInput($message);
    }
    
    if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($messageErr)) {
        $sql = "INSERT INTO customer_details (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
       if ($connection->query($sql) === TRUE) {
            echo "Data inserted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    }
}

$connection->close();
?>
