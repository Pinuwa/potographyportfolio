<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.login-container {
    width: 300px;
    margin: 100px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

label {
    font-weight: bold;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007BFF;
    border: none;
    color: #fff;
    cursor: pointer;
    border-radius: 3px;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

p{
    text-align: center;
    color: red;
}


    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form  method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
    </div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Hardcoded username and password (for demonstration purposes)
    $correctUsername = "Rashi";
    $correctPassword = "123";
    
    if ($username === $correctUsername && $password === $correctPassword) {
        header("Location: table.php");
        exit;
    } else {
        echo "Login failed. Please check your username and password.";
    }
}
?>

<p> this login form for only admin to insert projects, change and watch contac form details </p>

</body>
</html>
