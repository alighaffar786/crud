<?php
require "header.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();
        require 'db.php';
        if(isset($_POST['id'])){
            $uid = $_POST['id'];
            $query = "SELECT * FROM user WHERE id = '$uid' ";
            $sql = mysqli_query($conn,$query);
            $record = mysqli_fetch_assoc($sql);
            $id = $record['id'];
            $name = $record['name'];
            $fatherName = $record['father_name'];
            $email = $record['email'];
            $pass = $record['password'];
        }
        $url = '/update.php';
        $heading = "Update Form";
        $method = 'put';
        $btn = "Update";
        require 'form.php';
} else{
    header('location: userList.php');
}
require "footer.php";
