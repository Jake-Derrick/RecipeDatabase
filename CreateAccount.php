<?php
    $conn = new mysqli("localhost","root","Foodie101Strong!","recipe");

    if ($conn -> connect_errno) 
    {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    $username = $_POST["username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $salt = bin2hex(random_bytes(4));
    $password = hash('sha256', $salt . $password);

    //TODO: Sanatize and validate user input
    $stmt = $conn->prepare("INSERT INTO user (username, passwordHash, email, name, salt) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $password, $email, $name, $salt);
    $stmt->execute();

    echo "Account has been created!";
    $stmt->close();
    $conn->close();
?>