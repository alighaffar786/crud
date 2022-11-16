<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require '@db.php';
    session_start();
    $_SESSION['field'] = [];
    $name = $fatherName = $email = $pass  = "";
    //  fields validation  

   //Email Validation   
    if (empty($_POST["email"])) {
        $_SESSION['field']['email'] = "Email is required";
    } else {
        $email = $_POST["email"];
        // check that the e-mail address is well-formed  
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['field']['email'] = "Invalid email format";
        }
    }
    // password validation  
    if (empty($_POST["pass"])) {
        $_SESSION['field']['pass'] = "pass  is required";
    } else {
        $pass = $_POST["pass"];
        //check  pass length should not be less and greator than 10  
        if (strlen($pass) < 8) {
            $_SESSION['field']['pass'] = "Password no must contain 8 digits.";
        }
    }

    if ($_SESSION['field']['email'] == "" && $_SESSION['field']['pass'] == "") {
        $query = "SELECT * FROM user 
                    WHERE email = '$email' AND password = '$pass'";
        $sql = mysqli_query($conn, $query);
        $detail = mysqli_fetch_assoc($sql);
        $_SESSION['user_detil'] = $detail;
        if (isset($_SESSION['user_detil'])) {
            header('location: userList.php');
        } else {
            $_SESSION['field']['error'] = "Please enter correct Email and password" ;
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