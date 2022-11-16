<?php
// check request method is POST
require 'header.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'db.php';
    session_start();
    
    //include  fields validation  
    require 'validation.php';
    
    // insert data in db

    // check all all error message..
    if ($notValid == "") {
        $checkUser = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($conn, $checkUser);
        $count  = mysqli_fetch_assoc($result);
        // check duplicate email
        if ($count) {
            $emailER = "'". $email ."' email is already in use please try another email";
            $url = '/insert.php';
            $heading = "Sign up";
            $btn = "Signup";
            require 'form.php';
        } else {
            // insert data query
            $sql = "INSERT INTO user (name, father_name, email,password)VALUES ('$name', '$fatherName', '$email','$pass')";
            mysqli_query($conn, $sql);
            header('location: login.php');
            $_SESSION['name'] = $name;
        }
        $conn->close();
    } else {
        $url = '/insert.php';
        $heading = "Sign up";
        $btn = "Signup";
        require 'form.php';
        session_unset();
        // session_destroy();
    }
} else {
    header("location: signup.php");
}
require 'footer.php';
?>