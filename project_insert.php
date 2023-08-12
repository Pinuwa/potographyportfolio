<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "photography_db"; // Replace with your actual database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
$title = $_POST['title'];
$description = $_POST['description'];

// Handle image upload
$targetDir = "uploads/"; // Specify the directory where you want to store uploaded images
$targetFile = $targetDir . basename($_FILES["images"]["name"]);
move_uploaded_file($_FILES["images"]["tmp_name"], $targetFile);
$images = $targetFile;

// Prepare and bind the INSERT statement
$stmt = $conn->prepare("INSERT INTO projects (title, description, images) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $title, $description, $images);

// Execute the statement
if ($stmt->execute()) {
        echo "<script>alert('New project inserted successfully.');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
