<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    
    $servername = "localhost";
    $username = "root";
    $password = "usbw";
    $db ="shop";

    // Create connection
    $conn = new mysqli($servername, $username, $password,$db);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";
?>