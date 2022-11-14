<?php
     $server_name = "localhost";

     $username = "root";
 
     $password = "user1234";
 
     $dbname = "db1";
     // Create connection
     $conn = mysqli_connect($server_name, $username, $password, $dbname);
 
     // Check connectiondffdfd\
 
     if (!$conn) {
         die("Connection Failed:" . mysqli_connect_error());
     }
?>