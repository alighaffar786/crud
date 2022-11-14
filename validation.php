<?php
 //name Validation  
 if (empty($_POST["name"])) {
    $_SESSION['field']['name'] = "Name is required";
} else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace  
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $_SESSION['field']['name'] = "Only alphabets and white space are allowed";
    }
}
//father name validation
if (empty($_POST["f_name"])) {
    $_SESSION['field']['f_name'] = "Father Name is required";
} else {
    $fName = $_POST["f_name"];
    // check if name only contains letters and whitespace  
    if (!preg_match("/^[a-zA-Z ]*$/", $fName)) {
        $_SESSION['field']['f_name'] = "Only alphabets and white space are allowed";
    }
}
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
