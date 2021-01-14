<?php
    $conn = new mysqli("localhost","root","Foodie101Strong!","recipe");

    if ($conn -> connect_errno) 
    {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    $username = $_POST["username"];
    $password = $_POST["password"];
    // Perform query
    $stmt = "SELECT passwordHash, salt
    FROM user
    WHERE username = '".$username. "'";

    $result = $conn->query($stmt);

    while($row = $result->fetch_array())
    {
        $passwordHash = $row['passwordHash'];
        $salt = $row['salt'];
    }
    //TODO: Login/redirect to account specific to user
    if ($passwordHash == hash('sha256', $salt . $password))
    {
        header("Location: http://localhost/SearchPage.html");
        exit;

    }
    else
    {
        echo "The username or password entered is incorrect";
    }
?>