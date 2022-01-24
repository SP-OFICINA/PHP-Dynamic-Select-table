<?php
    // The MySQLi extension will only work with MySQL databases
    // MySQLi (procedural)

    /// Create connection
    $conn = mysqli_connect('localhost:3307','root','root','bd_portugal');

    // Check connection
    if(!$conn){
        die('Connection Failed'.mysqli_connect_error());
    }
?>