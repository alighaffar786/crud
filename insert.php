<?php
// check request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'db.php';
    session_start();
    $_SESSION['singup'] = [];
    $name = $fName = $email = $pass  = "";
    //Input fields validation  

    //name Validation  
    if (empty($_POST["name"])) {
        $_SESSION['singup']['name'] = "Name is required";
    } else {
        $name = $_POST["name"];
        // check if name only contains letters and whitespace  
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $_SESSION['singup']['name'] = "Only alphabets and white space are allowed";
        }
    }
    //father name validation
    if (empty($_POST["f_name"])) {
        $_SESSION['singup']['f_name'] = "Father Name is required";
    } else {
        $fName = $_POST["f_name"];
        // check if name only contains letters and whitespace  
        if (!preg_match("/^[a-zA-Z ]*$/", $fName)) {
            $_SESSION['singup']['f_name'] = "Only alphabets and white space are allowed";
        }
    }
    //Email Validation   
    if (empty($_POST["email"])) {
        $_SESSION['singup']['email'] = "Email is required";
    } else {
        $email = $_POST["email"];
        // check that the e-mail address is well-formed  
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['singup']['email'] = "Invalid email format";
        }
    }
    // password validation  
    if (empty($_POST["pass"])) {
        $_SESSION['singup']['pass'] = "pass  is required";
    } else {
        $pass = $_POST["pass"];
        //check  pass length should not be less and greator than 10  
        if (strlen($pass) < 8) {
            $_SESSION['singup']['pass'] = "Password no must contain 8 digits.";
        }
    }
    // insert data in db

    // check all all error message..
    if ($_SESSION['singup']['name'] == "" && $_SESSION['singup']['f_name'] == "" && $_SESSION['singup']['email'] == "" && $_SESSION['singup']['pass'] == "") {
        $checkUser = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($conn, $checkUser);
        $count  = mysqli_fetch_assoc($result);
        // check duplicate email
        if ($count) {
            $_SESSION['singup']['email'] = "this email is already in use please try another email";
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
