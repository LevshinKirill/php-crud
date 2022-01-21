<?php
    $serverName = "db";
    $userName = "root";
    $password = "example";
    $dbName = "db";
    
    $db = new mysqli($serverName, $userName, $password,$dbName);

    if($db->error){
        die("Connection failed: " . $conn->error);
    }
?>