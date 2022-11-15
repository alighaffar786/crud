<?php
 session_start();
 require 'db.php';
// check request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $method = $_POST['method'];
   if($method == 'put'){
       
        $id = $_POST['id'];
    //include  fields validationn  

        require 'validation.php';
        // edit in db

        // check all all error message..
        if ($nameER == "" && $fNameER == "" && $emailER == "" && $passER == "") {
            
            
            // check  duplicate  email
            $checkUser = "SELECT * FROM user WHERE NOT (id = '$id') AND email = '$email'";
            $result = mysqli_query($conn, $checkUser);
            $count  = mysqli_fetch_assoc($result);
            if ($count) {
                
                $emailER = " '". $email. "' is already in use please try another email";
                $url = '/edit.php';
                $heading = "Update Form";
                $method = 'put';
                $btn = "Update";
                require 'form.php';
            }
            else{
                // Update data query
                $sql = "UPDATE user
                    SET name = '$name' , father_name = '$fName' , email = '$email' , password = '$pass'
                    WHERE id = '$id'";
                    mysqli_query($conn,$sql);
                    $_SESSION['success'] = 'your data Updated successfully';
                    header("location: userlist.php");
            }
                $conn->close();
                
        } 
        else {
            $url = '/edit.php';
            $heading = "Update Form";
            $method = 'put';
            $btn = "Update";
            require 'form.php';
        }
    }
} 
else {
    header("location: userlist.php");
}
