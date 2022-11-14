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
            <!-- table heading  -->
            <th>Name</th>
            <th>Father Name</th>
            <th>User Detail</th>
        </tr>
        <?php
        require 'db.php';
        $sql = "SELECT * FROM user";
        $query = mysqli_query($conn, $sql);
        
        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row['id'];
            $name = $row['name'];
            $fName = $row['father_name'];
            echo "<tr><td>" . $name . "</td><td>" . $fName . "</td><td>";
            ?>
            <form action="/userDetail.php" class="d-inline" method="post">
                <input type="text" hidden name="id" value="<?php echo $id."</td><tr>"?>">
                <input type="submit"  value="View" class=" btn btn-primary">
            </form>
            
            <?php
        }
            ?>
        
    </table>
</body>

</html