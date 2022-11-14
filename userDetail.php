<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="./css/style.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="bg-secondary container mt-5">
    <table style='margin:auto;' class="bg-white table">
        <tr>
            <th>Name</th>
            <th>Father name</th>
            <th>Email</th>
            <th>Option</th>
        </tr>
        <?php
        $id = $_POST['id'];
        require 'db.php';
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($query)) {
            
            $name = $row['name'];
            $fName = $row['father_name'];
            $email = $row['email'];

            echo "<tr><td>" . $name . "</td><td>" . $fName . "</td><td>" . $email. "</td><td>";
        
            ?>
            <form action="/userDetail.php" class="d-inline" method="post">
                <input type="text" hidden name="id" value="<?php echo $id."</td><td>"; ?>">
                <input type="submit"  value="Edite" class=" btn text-white btn-success">
            </form>
            <form action="/modal.php" class="d-inline" method="post">
                <input type="text" hidden name="id" value="<?php echo $id."</td><tr>"; ?>">
                <input type="submit"  value="Delete" class=" btn btn-danger">
            </form>
            
            <?php
        }
            ?>
        
    </table>


    
</body>

</html