<?php
    $conn = new mysqli("localhost","root","Foodie101Strong!","recipe");

    if ($conn -> connect_errno) 
    {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    $filter = $_GET["filter"];
    $search = $_GET["search"];

    $arr = [];

    $where="";

    if($filter == "Recipe Name");
    {
        if(!empty($search))
        {
            $where .= "name LIKE '%$search'";
        }
        $stmt = "SELECT name, type, totalTime
        FROM recipe
        WHERE $where";

        $result = $conn->query($stmt);

        echo "<table><tr><th>Name</th><th>Type</th><th>Total Time</th></tr>";
        while($row = $result->fetch_array())
        {
            $arr[] = $row;
            list($name, $type, $totalTime) = $row;
            echo "
                <td>$name</td>
                <td>$type</td>
                <td>$totalTime</td>
                </tr>";
        }
    }

    if($filter == "Type");
    {
        if(!empty($search))
        {
            $where .= "type LIKE '%$search'";
        }
        $stmt = "SELECT name, type, totalTime
        FROM recipe
        WHERE $where";

        $result = $conn->query($stmt);

        echo "<table><tr><th>Name</th><th>Type</th><th>Total Time</th></tr>";
        while($row = $result->fetch_array())
        {
            $arr[] = $row;
            list($name, $type, $totalTime) = $row;
            echo "
                <td>$name</td>
                <td>$type</td>
                <td>$totalTime</td>
                </tr>";
        }
    }
    
    

?>