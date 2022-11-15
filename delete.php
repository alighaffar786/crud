<?php
session_start();
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $method = $_POST['method'];
    
   if($method == 'delete'){
        
        $id = $_POST['id'];
        $query = "DELETE FROM user WHERE id = '$id' ";
        mysqli_query($conn, $query);
        $_SESSION['success'] = 'your data Deleted successfully';
        $conn->close();
        header('location: userList.php');
    }
    
}

?>