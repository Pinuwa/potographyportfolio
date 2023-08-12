<!DOCTYPE html>
<html>
<head>
    <title>My Project List</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #252323 ;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #F9F5F4  ;
    font-family: calibry;
}

table {
    width: 100%;
    border-collapse: collapse;
    border: 5px solid #ccc;
}
th{
      border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
    text-shadow: 5px;
}
 td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: justify;
    color: #DCD8D7 ;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

img {
    max-width: 100px;
    height: auto;
}

/* Style for responsive table on smaller screens */
@media screen and (max-width: 600px) {
    table {
        font-size: 14px;
    }
    th, td {
        padding: 8px;
    }
}

    </style>
</head>
<body>
    <h2> My Project List</h2>

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

    // Retrieve data from the projects table
    $sql = "SELECT * FROM projects";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Title</th><th>Description</th><th>Images</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['title']}</td>";
            echo "<td>{$row['description']}</td>";
            echo "<td><img src='{$row['images']}' width='100'></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No projects found.";
    }






    // Close the connection
    $conn->close();
    ?>




</body>
</html>
