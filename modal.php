<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="./css/style.css" rel="stylesheet">

</head>

<body class="modal-open" style="overflow: hidden; padding-right: 0px;">

    <!-- Modal -->
    <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true " style="display: block;" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="text-danger">Are you sure you delete this field</h3>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" href="http://crud.test/userList.php">cancel</a>
                    <form method="post" action="/delete.php" class="d-inline">
                        <?php
                           $id = $_GET['id']
                        ?>
                        <input hidden type="text" name="id" value="<?php echo $id; ?>">
                        <input type="submit" value="Delete" class="btn btn-danger" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>