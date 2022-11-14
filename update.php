<?php
// check request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    require 'db.php';
    $id = $_POST['id'];
    $_SESSION['field'] = [];
    $name = $fName = $email = $pass  = "";
   //include  fields validationn  

    require 'validation.php';
    // update in db

    // check all all error message..
    if ($_SESSION['field']['name'] == "" && $_SESSION['field']['f_name'] == "" && $_SESSION['field']['email'] == "" && $_SESSION['field']['pass'] == "") {
        
        
        // check  duplicate  email
        $checkUser = "SELECT * FROM user WHERE NOT (id = '$id') AND email = '$email'";
        $result = mysqli_query($conn, $checkUser);
        $count  = mysqli_fetch_assoc($result);
        if ($count) {
            
            $_SESSION['field']['email'] = " '". $email. "' is already in use please try another email";
            header("location: updateForm.php?id=$id");
        }
        else{
            // Update data query
            $sql = "UPDATE user
                SET name = '$name' , father_name = '$fName' , email = '$email' , password = '$pass'
                WHERE id = '$id'";
                mysqli_query($conn,$sql);
                $_SESSION['success'] = 'your data Updated successfully';
                header('location: userList.php');
        }
            $conn->close();
    } 
    else {
        header("location: updateForm.php?id=$id");
    }
} 
else {
    header("location: userlist.php");
}
