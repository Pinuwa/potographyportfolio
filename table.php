<!DOCTYPE html>
<html>
<head>
    <title>Customer Details</title>
    <style>
        h2{
            color: white;
            align-items: center;
            font-size: 45px;
            text-align: center;


        }
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ccc;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

 

        h2 {
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;

            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        textarea {
            resize: vertical;
        }

        button {
            padding: 10px 20px;
            background-color: #007BFF;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 3px;
            align-items: center;
            margin: 0px 50px 0px 50px;
        }

        button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>


<h2>Add New Project</h2>
    <form action="project_insert.php" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br>
        
        <label for="images">Images:</label>
        <input type="file" id="images" name="images"><br>
        
        <input type="submit" value="Add Project">

        <td>

    </form>







<h2>Customer Details</h2>

    <form  method="post">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" ><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" ><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" ><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" ><br>
        <label for="message">Message:</label>
        <textarea id="message" name="message"></textarea><br>

        <button type="submit" name="search">Search</button>
        <button type="submit" name="insert">Insert</button>
        <button type="submit" name="update">Update</button>
        <button type="submit" name="delete">Delete</button>
    </form>

<?php

if(isset($_POST["insert"])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Insert data into the customer_details table
    $sql = "INSERT INTO customer_details (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New customer inserted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}
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


if (isset($_POST['search'])) {
    $searchText = $_POST['searchText'];
    
    // Search for customer details based on name or email
    $sql = "SELECT * FROM customer_details WHERE name LIKE '%$searchText%' OR email LIKE '%$searchText%'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Message</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['phone']}</td>";
            echo "<td>{$row['message']}</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No matching customer details found.";
    }
}


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    // Update data in the customer_details table
    $sql = "UPDATE customer_details SET name='$name', email='$email', phone='$phone', message='$message' WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Customer information updated successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}




if (isset($_POST['search'])) {
    $searchText = $_POST['searchText'];
    
    // Search for customer details based on name or email
    $sql = "SELECT * FROM customer_details WHERE name LIKE '%$searchText%' OR email LIKE '%$searchText%'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Message</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['phone']}</td>";
            echo "<td>{$row['message']}</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No matching customer details found.";
    }
}


?>







    <h2>My Order of Photography</h2>

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

    // Retrieve data from the customer_details table
    $sql = "SELECT * FROM customer_details";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Message</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['phone']}</td>";
            echo "<td>{$row['message']}</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No customer details found.";
    }




    ?>

 


 


</body>
</html>
