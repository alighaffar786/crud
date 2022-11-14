<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'db.php';
    session_start();
    $_SESSION['login'] = [];
    $name = $fName = $email = $pass  = "";
    //Input fields validation  

    //Email Validation   
    if (empty($_POST["email"])) {
        $_SESSION['login']['email'] = "Email is required";
    } else {
        $email = $_POST["email"];
        // check that the e-mail address is well-formed  
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['login']['email'] = "Invalid email format";
        }
    }
    // password validation  
    if (empty($_POST["pass"])) {
        $_SESSION['login']['pass'] = "pass  is required";
    } else {
        $pass = $_POST["pass"];
        //check  pass length should not be less and greator than 10  
        if (strlen($pass) < 8) {
            $_SESSION['login']['pass'] = "Password no must contain 8 digits.";
        }
    }

    if ($_SESSION['login']['email'] == "" && $_SESSION['login']['pass'] == "") {
        $query = "SELECT id FROM user 
                    WHERE email = '$email' AND password = '$pass'";
        $sql = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($sql);
        if (isset($row)) {
            header('location: userList.php');
        } else {
            $_SESSION['login']['error'] = "Please enter correct Email and password" ;
            header('location: login.php');
        }
        $conn->close();
    }
    else{
        header('location: login.php');
    }

}
else{
    header('location: login.php');
}
?>