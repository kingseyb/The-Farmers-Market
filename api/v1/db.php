<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "farmersmarket";
    
//connect to database
$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {   
    echo "Not Connected";
}

?>
