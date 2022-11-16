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

<body class="container my-5">
    <?php
        session_start();
        if (isset($_SESSION['success'])) {
            echo "<div class='w-25 rounded  m-3 text-white fw-bold shadow p-3 bg-success'> " . $_SESSION['success'] . "</div>";
            session_unset();
            session_destroy();
        }
        ?>
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
            $fatherName = $row['father_name'];
            echo "<tr><td>" . $name . "</td><td>" . $fatherName . "</td><td>";
            ?>
            <!-- edit form -->
            <form action="editForm.php" class="d-inline" method="post">
                <input hidden name="id" value = "<?php echo $id; ?> " type="text">
                <input type="submit" class="btn btn-primary" value="Update">
            </form>
            <!-- Delete -->
            <form action="modal.php" class="d-inline" method="post">
                <input hidden name="id" value = "<?php echo $id; ?> " type="text">
                <input type="submit" class=" btn btn-danger" value="Delete">
            </form>
            </td></tr>
            <?php
        }
            ?>
        
    </table>
</body>

</html