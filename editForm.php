<?php
    session_start();

    
        // require 'form.php';

   
    require 'db.php';
    if(isset($_GET['id'])){
        $uid = $_GET['id'];
        $query = "SELECT * FROM user WHERE id = '$uid' ";
        $sql = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($sql);
        $id = $row[0];
        $name = $row[1];
        $fName = $row[2];
        $email = $row[3];
        $pass = $row[4];
    }
    $url = '/edit.php';
    $heading = "Update Form";
    $method = 'put';
    $btn = "Update";
    require 'form.php';
