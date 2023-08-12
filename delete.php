<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "photography_db";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    
    // Delete data from the customer_details table
    $sql = "DELETE FROM customer_details WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Customer information deleted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
