<?php
// check request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'db.php';
    session_start();
    $_SESSION['field'] = [];
    $name = $fName = $email = $pass  = "";
    //include  fields validation  
    require 'validation.php';
    
    // insert data in db

    // check all all error message..
    if ($_SESSION['field']['name'] == "" && $_SESSION['field']['f_name'] == "" && $_SESSION['field']['email'] == "" && $_SESSION['field']['pass'] == "") {
        $checkUser = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($conn, $checkUser);
        $count  = mysqli_fetch_assoc($result);
        // check duplicate email
        if ($count) {
            $_SESSION['field']['email'] = "this email is already in use please try another email";
            header("location: signup.php");
        } else {
            // insert data query
            $sql = "INSERT INTO user (name, father_name, email,password)VALUES ('$name', '$fName', '$email','$pass')";
            mysqli_query($conn, $sql);
            header('location: login.php');
            $_SESSION['name'] = $name;
        }
        $conn->close();
    } else {
        header("location: signup.php");
    }
} else {
    header("location: signup.php");
}
