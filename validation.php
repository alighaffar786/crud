<?php
 
$_SESSION['value'] = [];
$name = $fatherName = $email = $pass  = "";
$nameER = $fatherNameER = $emailER = $passER = $notValid  = "";
 
//name Validation 
 if (empty($_POST["name"])) {
    $notValid = $nameER = "Name is required";
} else {
     $name = $_POST["name"];
    // check if name only contains letters and whitespace  
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $notValid = $nameER = "Only alphabets and white space are allowed";
    }
}
//father name validation
if (empty($_POST["f_name"])) {
    $notValid = $fatherNameER = "Father Name is required";
} else {
    $fatherName = $_POST["f_name"];
    // check if name only contains letters and whitespace  
    if (!preg_match("/^[a-zA-Z ]*$/", $fatherName)) {
        $notValid = $fatherNameER = "Only alphabets and white space are allowed";
    }
}
//Email Validation   
if (empty($_POST["email"])) {
    $notValid = $emailER = "Email is required";
} else {
     $email = $_POST["email"];
    // check that the e-mail address is well-formed  
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $notValid = $emailER = "Invalid email format";
    }
}
// password validation  
if (empty($_POST["pass"])) {
    $passER = "pass  is required";
} else {
     $pass = $_POST["pass"];
    //check  pass length should not be less and greator than 10  
    if (strlen($pass) < 8) {
        $notValid = $passER = "Password no must contain 8 digits.";
    }
}
