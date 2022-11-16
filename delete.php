<?php
session_start();
require '@db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $method = $_POST['method'];
    
   if($method == 'delete'){
        
        $id = $_POST['id'];
        $query = "DELETE FROM user WHERE id = '$id' ";
        mysqli_query($conn, $query);
        $_SESSION['success'] = 'your data Deleted successfully';
        $conn->close();
        if($_SESSION['user_detil']['id'] == $id){
            session_unset();
            session_destroy();
            header('location: login.php');
        }
        else{
            header('location: userList.php');
        }
    }
    
}
else{
    header('location:login.php');
}

?>